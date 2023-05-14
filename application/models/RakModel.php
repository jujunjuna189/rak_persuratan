<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RakModel extends CI_Model
{
    private $table = 'rak';

    public function store($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function get()
    {
        $query = $this->db->get($this->table);
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
    
    public function getSurat($id)
    {
        $this->db->select('surat.*,kategori.nama_kategori,rak.nama_rak');
        $this->db->from('surat');
        $this->db->join('kategori','kategori.id = surat.kategori_id');
        $this->db->join('rak','rak.id = surat.rak_id');
        $this->db->where('surat.rak_id',$id);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result();
    }

}
