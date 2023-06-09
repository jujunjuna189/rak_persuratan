<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SuratModel', 'surat_model');
        $this->load->model('KategoriModel','kategori_model');
        $this->load->model('RakModel', 'rak_model');
        
    }

    public function index()
    {
        $this->db->select('surat.*,kategori.nama_kategori,rak.nama_rak');
        $this->db->from('surat');
        $this->db->join('kategori','kategori.id = surat.kategori_id');
        $this->db->join('rak','rak.id = surat.rak_id');
        if(isset($_GET['filter_rak_id'])){
            if($_GET['filter_rak_id'] != ''){
                $this->db->where('surat.rak_id',$_GET['filter_rak_id']);
            }
        }
        if(isset($_GET['filter_kategori_id'])){
            if($_GET['filter_kategori_id'] != ''){
            $this->db->where('surat.kategori_id',$_GET['filter_kategori_id']);
            }
        }
        if(isset($_GET['date_awal'])){
            if($_GET['date_awal'] != '' && $_GET['date_akhir'] != ''){
            $this->db->where('surat.tanggal_surat >= ',$_GET['date_awal']);
            $this->db->where('surat.tanggal_surat <= ',$_GET['date_akhir']);
            }
        }

        $query = $this->db->get()->result();
        $data['surat'] = $query;
        $data['kategori'] = $this->kategori_model->get();
        $data['rak'] = $this->rak_model->get();
        if(isset($_GET['download'])){
            $this->load->view('laporan/pdf', $data); // Contant
        }else{

        $this->load->view('layouts/header'); //Header berisi link css dan font serta aset lainya
        $this->load->view('components/navbar/index'); // Navbar berisi navbar
        $this->load->view('components/sidebar/index'); // Sidebar berisi sidebar
        $this->load->view('components/content/start'); // Content berisi content start
        $this->load->view('laporan/index', $data); // Contant
        $this->load->view('components/content/end'); // Content end verisi div penutup dari content start
        $this->load->view('components/modal_confirm/index'); // Modal Confirm
        $this->load->view('layouts/footer'); // Footer berisi assets footer
        }
    }

    

    public function getById()
    {
        $result = $this->surat_model->getById($this->input->get('id'));
        echo json_encode($result);
    }

    public function data()
    {
        $data['nama_surat'] = $this->input->post('nama_surat');
        $data['kategori_id'] = $this->input->post('kategori_id');
        $data['rak_id'] = $this->input->post('rak_id');
        $data['tanggal_surat'] = $this->input->post('tanggal_surat');
        
        return $data;
    }

    public function store()
    {
        $data = $this->data();
        $config['upload_path'] = FCPATH .'/uploads/';
        $config['allowed_types'] = 'pdf|docx|doc|xlsx';
        $config['file_name'] =  rand(0,9999);
        $this->load->library('upload', $config);
        $this->upload->do_upload('file_surat');
        $uploaded_data = $this->upload->data();
        $data['file_surat'] = $uploaded_data['file_name'];
        $this->surat_model->store($data);
        redirect('surat');
    }

    function ajaxImageStore()  
    {  
         if(isset($_FILES["image_file"]["name"]))  
         {  
              $config['upload_path'] = './uploads/';  
              $config['allowed_types'] = 'jpg|jpeg|png|gif';  
              $this->load->library('upload', $config);  
              if(!$this->upload->do_upload('image_file'))  
              {  
                  $error =  $this->upload->display_errors(); 
                  echo json_encode(array('msg' => $error, 'success' => false));
              }  
              else  
              {  
                   $data = $this->upload->data(); 
                   $insert['name'] = $data['file_name'];
                   $this->db->insert('images',$insert);
                   $getId = $this->db->insert_id();

                   $arr = array('msg' => 'Image has not uploaded successfully', 'success' => false);

                   if($getId){
                    $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);
                   }
                   echo json_encode($arr);
              }  
         }  
    } 

    public function update()
    {
        $data = $this->data();
        if($this->input->post('file_surat') != NULL){
            $config['upload_path'] = FCPATH .'/uploads/';
            $config['allowed_types'] = 'pdf|docx|doc|xlsx';
            $config['file_name'] =  rand(0,9999);
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_surat');
            $uploaded_data = $this->upload->data();
            $data['file_surat'] = $uploaded_data['file_name'];
        }
        $this->surat_model->update($this->input->post('id'), $data);
        redirect('surat');
    }

    public function delete()
    {
        $result = $this->surat_model->delete($this->input->get('id'));
        echo json_encode($result);
    }

}
