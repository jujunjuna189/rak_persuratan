<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel', 'pengguna_model');
    }

    public function index()
    {
        $data['pengguna'] = $this->pengguna_model->get();
        $data['role'] = $this->db->get('role')->result();
        $this->load->view('layouts/header'); //Header berisi link css dan font serta aset lainya
        $this->load->view('components/navbar/index'); // Navbar berisi navbar
        $this->load->view('components/sidebar/index'); // Sidebar berisi sidebar
        $this->load->view('components/content/start'); // Content berisi content start
        $this->load->view('pengguna/index', $data); // Contant
        $this->load->view('components/content/end'); // Content end verisi div penutup dari content start
        $this->load->view('components/modal_confirm/index'); // Modal Confirm
        $this->load->view('layouts/footer'); // Footer berisi assets footer
    }

    public function getById()
    {
        $result = $this->pengguna_model->getById($this->input->get('id'));
        echo json_encode($result);
    }

    public function data()
    {
        $data['nama'] = $this->input->post('nama');
        $data['username'] = $this->input->post('username');
        $data['role_id'] = $this->input->post('role_id');
        $data['password'] = $this->input->post('password');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');

        return $data;
    }

    public function store()
    {
        $data = $this->data();
        $query = $this->db->get_where('users',['username' => $data['username']])->result();
        if($query){
            $this->session->set_flashdata('error','Username telah digunakan');
            redirect('pengguna');
        }

        $this->pengguna_model->store($data);
        $this->session->set_flashdata('success','Berhasil Menambah Data');
        redirect('pengguna');
    }

    public function update()
    {
        $data = $this->data();
        $query = $this->db->get_where('users',['id' => $this->input->post('id')])->result()[0];
        if($query){
            if($query->username != $data['username']){
                $this->session->set_flashdata('error','Username telah digunakan');
                redirect('pengguna');
            }
        }
        $this->pengguna_model->update($this->input->post('id'), $data);
        $this->session->set_flashdata('success','Berhasil Mengupdate Data');
        redirect('pengguna');
    }

    public function delete()
    {
        $result = $this->pengguna_model->delete($this->input->get('id'));
        echo json_encode($result);
    }
}
