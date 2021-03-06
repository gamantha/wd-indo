<?php

namespace App\Http\Services;

use DB;
use App\Http\Models\IndicatorCategory;
use App\Http\Models\Indicator;
use App\Http\Models\ReportTemplate;
use App\Http\Models\Report;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * ReportService manage report
 */
class ReportService extends BaseService
{
    private $categoryModel;
    private $indicatorModel;

    function __construct($model)
    {
        parent::__construct($model);
        $this->categoryModel = new IndicatorCategory();
        $this->indicatorModel = new Indicator();
    }

    /**
     * save
     * save report record and initiate all related indicator value
     */
    function saveReport($reportTemplateId, $reportName, $reportDate, $author) {
        DB::beginTransaction();
        try {
            $reportTemplate =  ReportTemplate::where(['id' => $reportTemplateId])->first();
            if (!$reportTemplate) {
                throw "report template not found";
            }
            $data = new Report();
            $data->report_template_id = $reportTemplateId;
            $data->report_date = $reportDate;
            $data->name = $reportName;
            $data->status = 1;
            $data->author_id = $author;
            $data->save();
            // initiate every indicator value
            $indicators = $reportTemplate->indicators()->get();
            $indicatorToSave = [];
            foreach ($indicators as $index => $indicator){
                array_push($indicatorToSave, [
                    'indicator_id' => $indicator->id,
                    'value' => '',
                    'report_id' => $data->id,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
            DB::table('indicator_value')->insert($indicatorToSave);
            DB::commit();
            return $data;
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            throw $th;
        }
    }

    /**
    * override get method
    * get get all row paginated. Built resource url are:
    * /resource?filters[key]=value&filters[keyA]=valueA&sort=-Field
    * @param $page Integer page number
    * @param $limit Integer maximum number of item to return
    * @param $condition [Array] conditional : ex: [["name", "Andy"], ["category_id", 1]]
    * @param $sort [Array['key', 'value']] sort by. value being either `ASC` or `DESC`
    * @return ['total', 'data']. total: total of row in the database
    */
    function get($page = 1, $limit = 10, $condition=[], $sort=['created_at', 'DESC']) {
        $total = $this->model::count();
        $data = $this->model::where($condition)->limit($limit)
            ->offset(($page-1)*$limit)->orderBy($sort[0], $sort[1])
            ->with(['template.indicators', 'indicatorValues'])
            ->get()->toArray();
        return [
            'total' => $total,
            'data' => $data,
        ];
    }

    function findDetail($id) {
        $data = $this->model::where(['id' => $id])
            ->with(['template.indicators', 'indicatorValues'])
            ->first();
        if (!$data) {
            return null;
        }
        $response = [];
        $ivs = [];
        foreach($data->indicatorValues as $iv) {
            $ivs[$iv->indicator_id] = $iv;
        }
        $indicators = [];
        foreach($data->template->indicators as $rim) {
            $rim['indicator_value'] = array_key_exists($rim->id, $ivs) ? $ivs[$rim->id]: null;
            array_push($indicators, $rim);
        }
        $data['indicators'] = $indicators;
        unset($data['indicatorValues']);
        return $data;
    }

    public function fetchReportingData($id) {
        $data = $this->model::where([['id', $id]])
            ->with(['template.indicators', 'indicatorValues', 'template.indicatorCategories'])
            ->orderBy('id', 'ASC')->first();

        if (!$data) {
            return null;
        }

        $ivs = [];
        foreach($data->indicatorValues as $iv) {
            $ivs[$iv->indicator_id] = $iv->toArray();
        }
        $indicators = [];
        $categorizedIndicators = collect($data->template->indicators)->groupBy('pivot.category_id')->toArray();
        // nesting indicator to indicator parents
        // grouping indicators to category
        foreach($categorizedIndicators as $catInd) { // loop through every category
            $categoryId = $catInd[0]['pivot']['category_id'];
            $catInds = $this->categoryModel::where('id', $categoryId)->first()->toArray();; // get current category object
            $temp = [];
            foreach($catInd as $ind) { // loop through every indicator in current category and bind them key:value
                $ind['indicator_value'] = array_key_exists($ind['id'], $ivs) ? $ivs[$ind['id']]: null;
                $ind['order'] = $ind['pivot']['order'];
                array_push($temp, $ind);
            }
            // nest indicator to its parent
            $inds = collect($temp)->groupBy('indicator_parent_id')->toArray();
            $indicatorList = [];
            foreach($inds as $ind) {
                $indicatorParent = $ind[0]['indicator_parent_id'] != null ? $this->indicatorModel::where('id', $ind[0]['indicator_parent_id'])->first() : null;

                if ($indicatorParent == null) {
                    // flatten
                    foreach($ind as $i) {
                        array_push($indicatorList, $i);
                    }
                } else {
                    $indicatorParentArr = $indicatorParent->toArray();
                    $indicatorParentArr['child'] = $ind;
                    array_push($indicatorList, $indicatorParentArr);
                }
            }
            $catInds['indicators'] = $indicatorList; // glue indicators to current category object
            array_push($indicators, $catInds);
        }
        $parentCategory = collect($indicators)->groupBy('parent_category_id');
        $parentCategories = [];
        // nesting categories to parent categories
        foreach($parentCategory->toArray() as $pc) {
            $pcTemp = $pc[0]['parent_category_id'] != null ? $this->categoryModel::where('id', $pc[0]['parent_category_id'])->first() : null;
            if ($pcTemp == null) {
                foreach($pc as $p) {
                    array_push($parentCategories, $p);
                }
            } else {
                $pcTempArr = $pcTemp->toArray();
                $pcTempArr['child'] = $pc;
                array_push($parentCategories, $pcTempArr);
            }
        }
        $data['categories'] = $parentCategories;
        unset($data['indicatorValues']);
        unset($data['template']);
        return $data;
    }
}
