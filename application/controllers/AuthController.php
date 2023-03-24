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
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', [
                'message' => 'Gagal login',
            ]);
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

        $register = $this->user_model->store($data);
        redirect('login');
    }
}
