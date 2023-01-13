<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tb_kategori');

        if ($id != null) {
            $this->db->where('id_kategori', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('tb_kategori');
    }

    public function add($post)
    {
        $params = [
            'nama' => $post['nama']
        ];

        $this->db->insert('tb_kategori', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama']
        ];


        $this->db->where('id_kategori', $post['id']);
        $this->db->update('tb_kategori', $params);
    }

    public function getKeyword($keyword)
    {
        $this->db->select('*');

        $this->db->from('tb_kategori');

        $this->db->like('nama', $keyword);

        return $this->db->get()->result();
    }
}
