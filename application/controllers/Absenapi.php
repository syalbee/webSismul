<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Absenapi extends RestController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Absen_model', 'aModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function absen_post()
    {
        $id_user = $this->post('id');

        $data = [
            'id_user' => $id_user,
            'status' => $this->_waktu()['status'],
            'jenis' => $this->_waktu()['jenis']
        ];

        if ($this->aModel->addAbsen($data)) {

            $this->response([
                'status' => true,
                'message' => "Succes absen"
            ], 200);
        }
    }


    private function _waktu()
    {
        $waktu = $this->db->get('p_absen')->result_array();

        $sekarang = strtotime(date('H:i'));
        $pagi = strtotime($waktu[0]["datang"]);
        $sore = strtotime('15:50');


        $beginD = new DateTime(date('H:i'));
        $endD = new DateTime($waktu[0]["datang"]);
        $diffD = $beginD->diff($endD);
        $jamD = (int) $diffD->format("%h");
        $menitD = (int) $diffD->format("%i");

        $beginP = new DateTime(date('H:i'));
        $endP = new DateTime($waktu[0]["pulang"]);
        $diffP = $beginP->diff($endP);
        $jamP = (int) $diffP->format("%h");
        $menitP = (int) $diffP->format("%i");
        $status = "";
        $jenis = "not valid";


        if ($sekarang >= $pagi && $sekarang < strtotime('12:00')) {
            $jenis = "Datang";
            if (($jamD > 0 && $menitD > 5) || ($jamD === 0 && $menitD > 5)) {
                $status = "t";
            } else {
                $status = "h";
            }
        } else if ($sekarang >= $sore && $sekarang >= strtotime($waktu[0]["pulang"])) {
            if (($jamP > 0 && $menitP > 5) || ($jamP === 0 && $menitP > 5)) {
                $status = "t";
            } else {
                $status = "h";
            }
            $jenis = "Pulang";
        }

        $data = [
            'jenis' => $jenis,
            'status' => $status
        ];

        return $data;
    }
}
