<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'user_model');
    }

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('auth/login');
        $this->load->view('layouts/footer');
    }

    public function onLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login = $this->user_model->getWhere(['username' => $username, 'password' => $password]);

        if (count($login) > 0) {
            $role = $this->user_model->getRole(['id' => $login[0]->role_id]);
            $this->session->set_userdata(['role' => $role]);
            $this->session->set_userdata(['user' => $login[0]]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error','Periksa Kembali Username & Password');
            redirect('login');
        }
    }

    public function register()
    {
        $this->load->view('layouts/header');
        $this->load->view('auth/register');
        $this->load->view('layouts/footer');
    }

    public function onRegister()
    {
        $data['nama'] = $this->input->post('nama');
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $role = $this->db->get_where('role',['role_key' => 0])->result()[0];
        $data['role_id'] = $role->id;
        $register = $this->user_model->store($data);
        redirect('login');
    }
}
