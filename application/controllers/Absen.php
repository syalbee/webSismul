<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('/');
        }

        $this->load->model('absen_model');
    }

    public function rekapAbsen()
    {

        $data = [
            'title' => "Rekap Absensi",
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/rekapabsen', $data);
    }

    public function rekapUser()
    {

        $data = [
            'title' => "Rekap Absensi " . $this->session->userdata('nama'),
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/rekapabsen', $data);
    }


    public function read()
    {
        header('Content-type: application/json');
        if ($this->absen_model->readrekap()->num_rows() > 0) {
            foreach ($this->absen_model->readrekap()->result() as $absen) {
                $data[] = array(
                    'nama' => $absen->nama,
                    'tanggal' => substr($absen->waktu, 0, 10),
                    'jam' => substr($absen->waktu, 11),
                    'jenis' => $absen->jenis,
                    'status' => $absen->status == "t" ? 'Telat' : "Tepat Waktu",
                );
            }
        } else {
            $data = array();
        }

        $absen = array(
            'data' => $data
        );
        echo json_encode($absen);
    }

    public function readUser()
    {
        header('Content-type: application/json');
        $id = $this->session->userdata('id');
        if ($this->absen_model->readrekapUser($id)->num_rows() > 0) {
            foreach ($this->absen_model->readrekapUser($id)->result() as $absen) {
                $data[] = array(
                    'tanggal' => substr($absen->waktu, 0, 10),
                    'jam' => substr($absen->waktu, 11),
                    'jenis' => $absen->jenis,
                    'status' => $absen->status == "t" ? 'Telat' : "Tepat Waktu",
                );
            }
        } else {
            $data = array();
        }

        $absen = array(
            'data' => $data
        );
        echo json_encode($absen);
    }


}
