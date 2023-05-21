<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RakController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RakModel', 'rak_model');
    }

    public function index()
    {
        $data['rak'] = $this->rak_model->get();

        $this->load->view('layouts/header'); //Header berisi link css dan font serta aset lainya
        $this->load->view('components/navbar/index'); // Navbar berisi navbar
        $this->load->view('components/sidebar/index'); // Sidebar berisi sidebar
        $this->load->view('components/content/start'); // Content berisi content start
        $this->load->view('rak/index', $data); // Contant
        $this->load->view('components/content/end'); // Content end verisi div penutup dari content start
        $this->load->view('components/modal_confirm/index'); // Modal Confirm
        $this->load->view('layouts/footer'); // Footer berisi assets footer
    }

    public function getById()
    {
        $result = $this->rak_model->getById($this->input->get('id'));
        echo json_encode($result);
    }

    public function data()
    {
        $data['nama_rak'] = $this->input->post('nama_rak');
        $data['nomor_rak'] = $this->input->post('nomor_rak');

        return $data;
    }

    public function store()
    {
        $data = $this->data();

        $this->rak_model->store($data);
        $this->session->set_flashdata('success','Berhasil Menambah Data');
        redirect('rak');
    }

    public function update()
    {
        $data = $this->data();

        $this->rak_model->update($this->input->post('id'), $data);
        $this->session->set_flashdata('success','Berhasil Mengupdate Data');
        redirect('rak');
    }

    public function delete()
    {
        $result = $this->rak_model->delete($this->input->get('id'));
        echo json_encode($result);
    }
}
