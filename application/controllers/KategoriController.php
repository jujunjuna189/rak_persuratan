<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel', 'kategori_model');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_model->get();

        $this->load->view('layouts/header'); //Header berisi link css dan font serta aset lainya
        $this->load->view('components/navbar/index'); // Navbar berisi navbar
        $this->load->view('components/sidebar/index'); // Sidebar berisi sidebar
        $this->load->view('components/content/start'); // Content berisi content start
        $this->load->view('kategori/index', $data); // Contant
        $this->load->view('components/content/end'); // Content end verisi div penutup dari content start
        $this->load->view('components/modal_confirm/index'); // Modal Confirm
        $this->load->view('layouts/footer'); // Footer berisi assets footer
    }

    public function getById()
    {
        $result = $this->kategori_model->getById($this->input->get('id'));
        echo json_encode($result);
    }

    public function data()
    {
        $data['nama_kategori'] = $this->input->post('nama_kategori');

        return $data;
    }

    public function store()
    {
        $data = $this->data();

        $this->kategori_model->store($data);
        $this->session->set_flashdata('success','Berhasil Menambah Data');
        redirect('kategori');
    }

    public function update()
    {
        $data = $this->data();

        $this->kategori_model->update($this->input->post('id'), $data);
        $this->session->set_flashdata('success','Berhasil Mengupdate Data');
        redirect('kategori');
    }

    public function delete()
    {
        $result = $this->kategori_model->delete($this->input->get('id'));
        echo json_encode($result);
    }
}
