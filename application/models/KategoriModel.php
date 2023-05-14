<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{
    private $table = 'kategori';

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

    public function countSurat()
    {
        $this->db->select('COUNT(surat.id) as total,kategori.nama_kategori');
        $this->db->group_by('surat.kategori_id');
        $this->db->join('kategori','surat.kategori_id=kategori.id');
        $query = $this->db->get('surat');
        return $query->result();
    }
}
