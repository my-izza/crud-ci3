<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_penerbit extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('tbl_penerbit');

        if ($id != null) {
            $this->db->where('id_penerbit', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_penerbit', $id);
        $this->db->delete('tbl_penerbit');
    }

    public function add($post)
    {
        $params = [
            'id_penerbit' => $post['id_penerbit'],
            'nama' => $post['nama'],
            'alamat' => $post['alamat'],
            'kota' => $post['kota'],
            'telp' => $post['telp']
        ];

        $this->db->insert('tbl_penerbit', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'alamat' => $post['alamat'],
            'kota' => $post['kota'],
            'telp' => $post['telp']
        ];


        $this->db->where('id_penerbit', $post['id']);
        $this->db->update('tbl_penerbit', $params);
    }

    public function getKeyword($keyword)
    {
        $this->db->select('*');

        $this->db->from('tbl_penerbit');

        $this->db->like('nama', $keyword);
        $this->db->or_like('id_penerbit', $keyword);

        return $this->db->get()->result();
    }
}
