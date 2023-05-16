<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaModel extends CI_Model
{
    private $table = 'users';

    public function store($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function get()
    {
        $this->db->select('users.*,role.role');
        $this->db->from('users');
        $this->db->join('role','role.id=users.role_id');
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

    public function countSurat()
    {
        $this->db->select('COUNT(surat.id) as total,kategori.nama_kategori');
        $this->db->group_by('surat.kategori_id');
        $this->db->join('kategori','surat.kategori_id=kategori.id');
        $query = $this->db->get('surat');
        return $query->result();
    }
}
