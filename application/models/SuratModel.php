<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratModel extends CI_Model
{
    private $table = 'surat';

    public function store($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function get()
    {
        $this->db->select('surat.*,kategori.nama_kategori,rak.nama_rak');
        $this->db->from($this->table);
        $this->db->join('kategori','kategori.id = surat.kategori_id');
        $this->db->join('rak','rak.id = surat.rak_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->result()[0];
    }

    public function update($id, $data)
    {
        $this->db->update($this->table, $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $result = $this->db->delete($this->table, ['id' => $id]);
        return $result;
    }

    

}
