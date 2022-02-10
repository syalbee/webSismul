<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('/');
        }
    }

    public function index()
    {

        $data = [
            'title' => "Setting Waktu Absen",
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
            'pulang' => $this->_getWaktu()[0]["pulang"],
            'datang' => $this->_getWaktu()[0]["datang"],
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/setting', $data);
    }

    public function setting()
    {
        $data = array(
            'pulang' => $this->input->post('pulang'),
            'datang' => $this->input->post('datang'),
        );

        $this->db->where('id', 1);
        $this->db->update("p_absen", $data);
        $this->index();
    }


    private function _getWaktu()
    {
        return $this->db->get('p_absen')->result_array();
    }
}
