<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') !== 'login') {
            redirect('/');
        }
        $this->load->model('users_model');
    }

    public function index()
    {
        $data = [
            'title' => "Dashboard",
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('template/footer');
    }

    public function profile()
    {
        $data = [
            'title' => "Profile " . $this->session->userdata('nama'),
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
            'user' => $this->_getProfile($this->session->userdata('id'))
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer');
    }

    private function _getProfile($id)
    {

        return $this->users_model->getUser($id)->result_array();
    }

    public function tambahUser()
    {

        $data = [
            'title' => "Tambah User",
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/tambahuser', $data);
    }

    public function add()
    {
        header('Content-type: application/json');
        $data = array(
            'nama' => $this->input->post('USnama'),
            'username' => $this->input->post('USusername'),
            'password' => password_hash($this->input->post('USpassword'), PASSWORD_DEFAULT),
            'img' => "user.png",
            'status' => "0",
            'role' => $this->input->post('USrole')
        );

        if ($this->users_model->create($data)) {
            echo json_encode('sukses');
        }
    }

    public function get_user()
    {
        $id = $this->input->post('id');
        $user = $this->users_model->getUser($id);
        if ($user->row()) {
            echo json_encode($user->row());
        }
    }

    public function read()
    {
        header('Content-type: application/json');
        $iterasi = 1;
        if ($this->users_model->read()->num_rows() > 0) {
            foreach ($this->users_model->read()->result() as $user) {
                if ($user->role != "1") {
                    $data[] = array(
                        'no' => $iterasi++,
                        'nama' => $user->nama,
                        'username' => $user->username,
                        'role' => $user->role == "2" ? 'Dosen' : "Mahasiswa",
                        'action' => '<button class="btn btn-sm btn-warning" onclick="edit(' . $user->id . ')"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger" onclick="remove(' . $user->id . ')"><i class="fas fa-trash"></i></button>'
                    );
                }
            }
        } else {
            $data = array();
        }
        $user = array(
            'data' => $data
        );
        echo json_encode($user);
    }

    public function listUser()
    {

        $data = [
            'title' => "List User",
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/listuser', $data);
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $password =  $this->input->post('password');

        if ($password === null || $password === "" || empty($password)) {
            $this->db->where('id', $id);
            $this->db->select('password');
            $password = $this->db->get('users')->result_array()[0]["password"];
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $password
        );

        if ($this->users_model->update($id, $data)) {
            echo json_encode('sukses');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($this->users_model->delete($id)) {
            echo json_encode('sukses');
        }
    }

    public function daftar()
    {
        $id = $this->session->userdata('id');

        $password =  $this->input->post('password');
        $username =  $this->input->post('username');
        $nama =  $this->input->post('nama');

        if ($password === null || $password === "" || empty($password)) {
            $this->db->where('id', $id);
            $this->db->select('password');
            $password = $this->db->get('users')->result_array()[0]["password"];
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $config['upload_path'] =  FCPATH . '/assets/image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $id . "_" . $nama;
        $config['max_size'] = 2000;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {

            $error = $this->upload->display_errors();
        } else {

            $uploaded_data = $this->upload->data();
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'img' => $uploaded_data["file_name"]
            );

            if ($this->users_model->update($id, $data)) {
                redirect(base_url('user/profile'));
            }
        }

        $data = [
            'title' => "Profile " . $this->session->userdata('nama'),
            'toko' => "Sistem Absensi",
            'nama' => $this->session->userdata('nama'),
            'user' => $this->_getProfile($this->session->userdata('id')),
            'error' => $error
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer');
    }
}
