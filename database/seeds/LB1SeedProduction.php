<?php

use Illuminate\Database\Seeder;

class LB1SeedProduction extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // f_ indicate female
        // m_ indicate male
        $categories = [
            'f_0_7d', 'm_0_7d',
            'f_8_28d', 'm_8_28d',
            'f_1_12m', 'm_1_12m',
            'f_1_4y', 'm_1_4y',
            'f_10_14y', 'm_10_14y',
            'f_15_19y', 'm_10_19y',
            'f_20_44y', 'm_20_44y',
            'f_45_54y', 'm_45_54y',
            'f_55_59y', 'm_55_59y',
            'f_60_69y', 'm_60_69y',
            'f_70y', 'm_70y',
        ];
        // fill parent first
        DB::table('indicator')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'penyakit_infeksi_pada_usus',
                    'label' => 'PENYAKIT INFEKSI PADA USUS (Intestinal infection disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 2,
                    'name' => 'penyakit_tuberkulosis',
                    'label' => 'PENYAKIT TUBERKULOSIS (TB)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 3,
                    'name' => 'penyakit_bakteri',
                    'label' => 'PENYAKIT BAKTERI (BACTERIAL DISEASE)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 4,
                    'name' => 'penyakit_virus',
                    'label' => 'PENYAKIT VIRUS (VIRAL DISEASE)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 5,
                    'name' => 'riketsiasis_dan_penyakit_karena_arthropoda_lain',
                    'label' => 'RIKETSIASIS DAN PENYAKIT KARENA ARTHROPODA LAIN (Richettsia and other arthropode disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 6,
                    'name' => 'penyakit_kelamin',
                    'label' => 'PENYAKIT KELAMIN (Sexual Tansmitted Infection)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 7,
                    'name' => 'penyakit_infeksi_parasit_dan_akibat_kemudian',
                    'label' => 'PENYAKIT INFEKSI PARASIT DAN AKIBAT KEMUDIAN (Parasite infection and its sequele)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 8,
                    'name' => 'gangguan_mental',
                    'label' => 'GANGGUAN MENTAL (Mental disorder)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 9,
                    'name' => 'penyakit_susunan_saraf',
                    'label' => 'PENYAKIT SUSUNAN SARAF (Neurological disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 10,
                    'name' => 'penyakit_mata_dan_adeneksa',
                    'label' => 'PENYAKIT MATA DAN ADENEKSA (Eye disease/disorder)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 11,
                    'name' => 'penyakit_telinga_dan_mastoid',
                    'label' => 'PENYAKIT TELINGA DAN MASTOID (Ear and mastoid disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 12,
                    'name' => 'penyakit_tekanan_darah_tinggi',
                    'label' => 'PENYAKIT TEKANAN DARAH TINGGI (Hypertension)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 13,
                    'name' => 'penyakit_lain_pada_saluran_pernafasan_atas',
                    'label' => 'PENYAKIT LAIN PADA SALURAN PERNAFASAN ATAS (Upper respiratory tract infection)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 14,
                    'name' => 'pneumonia',
                    'label' => 'Pneumonia',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 15,
                    'name' => 'penyakit_di_rongga_mulut',
                    'label' => 'PENYAKIT DI RONGGA MULUT (Mouth and dental disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 16,
                    'name' => 'penyakit_pada_saluran_kencing',
                    'label' => 'PENYAKIT PADA SALURAN KENCING (Urinary tract infection)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 17,
                    'name' => 'sebab_kelainan_kebidanan_langsung',
                    'label' => 'SEBAB KELAINAN KEBIDANAN LANGSUNG (Obstetric disorder)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 18,
                    'name' => 'keadaan_tertentu_pada_masa_perinatal',
                    'label' => 'KEADAAN TERTENTU PADA MASA PERINATAL (Certain condition during perinatal)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 19,
                    'name' => 'kecelakaan_dan_keracunan',
                    'label' => 'KECELAKAAN DAN KERACUNAN (Accident & intoxication)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 20,
                    'name' => 'penyakit_kulit_dan_jaringan_subkutan_lainnya',
                    'label' => 'PENYAKIT KULIT DAN JARINGAN SUBKUTAN LAINNYA (Skin and other sub cutaneous disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 21,
                    'name' => 'penyakit_pada_sistem_otot_dan_jaringan_pengikat',
                    'label' => 'PENYAKIT PADA SISTEM OTOT DAN JARINGAN PENGIKAT (PENYAKIT TULANG BELAKANG, RADANG SENDI TERMASUK REMATIK ( Bone & muscle disease, including back bone disease, joint disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
                [
                    'id' => 22,
                    'name' => 'penyakit_lainnya',
                    'label' => 'PENYAKIT LAINNYA (other disease)',
                    'is_parent' => true,
                    'indicator_parent_id' => null,
                    'unit_label' => 'orang',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ],
            ]
        );
        // fill child
        $childs = [ // name => label
            [ // parent 1 childs
                'kolera' => 'Kolera (Cholera)',
                'diare_termasuk_tersangka_kolera' => 'Diare (termasuk tersangka kolera) (Diarrhea, including suspect of Cholera)',
                'disentry' => 'Disentri (Dysentery)',
                'infeksi_penyakit_usus_lain' => 'Infeksi penyakit usus lain (other intestinal infection)',
            ],
            [ // parent 2 childs
                'tb_paru' => 'TB Paru (Lung TB)',
                'tb_selain_paru' => 'TB selain paru (TB Extra pulmoner)',
            ],
            [ // parent 3 childs
                'kusta_mb' => 'Kusta MB (Leprosy Multi Basiler)',
                'kusta_pb' => 'Kusta PB (Leprosy Pausi Basiler)',
                'difteria' => 'Difteria (Diphtheria)',
                'batuk_rejan' => 'Batuk rejan (Whooping cough)',
                'tetanus' => 'Tetanus',
                'plaque' => 'Pes (Plaque)',
            ],
            [ // parent 4 childs
                'poliomyelitis_akut' => 'Poliomyelitis akut (Acute poliomyelitis)',
                'campak' => 'Campak (Measles)',
                'rabies' => 'Rabies',
                'dhf_demam_berdarah_dengue' => 'DHF/Demam berdarah dengue (Dengue Hemorrhagic fever)',
                'cacar_air' => 'Cacar air (Chicken pox)',
            ],
            [ // parent 5 childs
                'malaria_dengan_pemeriksaan_lab' => 'Malaria dengan pemeriksaan lab (Malaria with lab test)',
                'malaria_tropika' => 'Malaria tropika (P.Falciparum)',
                'malaria_tanpa_pemeriksaan_lab' => 'Malaria tanpa pemeriksaan lab / malaria klinis (Clinical malaria)',
                'anthrax' => 'Anthrax',
            ],
        ];
        foreach ($categories as $category) {
            $c = [
                'id' => 1,
                'name' => 'penyakit_infeksi_pada_usus',
                'label' => 'PENYAKIT INFEKSI PADA USUS (Intestinal infection disease)',
                'is_parent' => true,
                'indicator_parent_id' => null,
                'unit_label' => 'orang',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }
    }
}
