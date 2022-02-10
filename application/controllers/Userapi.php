<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Userapi extends RestController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'uModel');
    }

    public function getUserall_get()
    {

        $data = $this->uModel->read()->result_array();
        foreach ($data as $d) {
            if ($d["id"] !== '1') {
                $user[] = array(
                    'id' => $d["id"],
                    'photo' => $d["img"],
                    'downloaded' => $d["status"] == "1" ? true : false,
                );
            }
        }

        $this->response([
            'status' => true,
            'code' => 200,
            'message' => "OK",
            'errors' => null,
            'data' => $user
        ], 200);
    }


    public function vehicleprofile_get()
    {

        $id_mot = $this->get('id_mot');
        $profile = $this->vModel->vehicleprofile($id_mot);

        $this->response([
            'status' => TRUE,
            'message' => 'Request success',
            'data' => $profile
        ], 200);
    }
}
