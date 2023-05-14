<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel','kategori_model');
    }

    public function index()
    {
        $data['jumlah_surat'] = $this->kategori_model->countSurat();
        $data['surat_diajukan'] = $this->db->select('kategori.nama_kategori,surat.*')->join('kategori','kategori.id=surat.kategori_id')->where('status',1)->get('surat')->result();
        $this->load->view('layouts/header'); //Header berisi link css dan font serta aset lainya
        $this->load->view('components/navbar/index'); // Navbar berisi navbar
        $this->load->view('components/sidebar/index'); // Sidebar berisi sidebar
        $this->load->view('components/content/start'); // Content berisi content start
        $this->load->view('dashboard/index',$data); // Contant
        $this->load->view('components/content/end'); // Content end verisi div penutup dari content start
        $this->load->view('layouts/footer'); // Footer berisi assets footer
    }
}
