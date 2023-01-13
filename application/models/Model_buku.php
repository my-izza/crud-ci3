<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_buku extends CI_Model
{
    public function get($id = null)
    {
        // Deklarasi field
        $this->db->select('tbl_buku.*, tb_kategori.nama as nama_kategori, tbl_penerbit.nama as nama_penerbit');
        $this->db->from('tbl_buku');
        // join tabel untuk menampilkan data
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tbl_buku.id_kategori');
        $this->db->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit');

        if ($id != null) {
            $this->db->where('id_buku', $id);
        }

        $this->db->order_by('id_buku', 'asc');

        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('tbl_buku');
    }

    public function add($post)
    {
        $params = [
            'id_buku' => $post['id_buku'],
            'id_kategori' => $post['kategori'],
            'nama_buku' => $post['nama_buku'],
            'harga' => $post['harga'],
            'stok' => $post['stok'],
            'id_penerbit' => $post['penerbit'],
            'detail' => $post['detail'],
            'gambar' => $post['gambar'],
            'tahun' => $post['tahun']
        ];

        $this->db->insert('tbl_buku', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_buku' => $post['id_buku'],
            'id_kategori' => $post['kategori'],
            'nama_buku' => $post['nama_buku'],
            'harga' => $post['harga'],
            'stok' => $post['stok'],
            'id_penerbit' => $post['penerbit'],
            'detail' => $post['detail'],
            'gambar' => $post['gambar'],
            'tahun' => $post['tahun'],
        ];

        if ($post['gambar'] != null) {
            $params['gambar'] = $post['gambar'];
        }

        $this->db->where('id_buku', $post['id']);
        $this->db->update('tbl_buku', $params);
    }


    public function getKeyword($keyword)
    {
        $this->db->select('*');

        $this->db->from('tbl_buku');

        $this->db->like('nama_buku', $keyword);
        $this->db->or_like('id_buku', $keyword);

        return $this->db->get()->result();
    }

    public function getPengadaan()
    {

        // Deklarasi field
        $this->db->select('tbl_buku.*, tb_kategori.nama as nama_kategori, tbl_penerbit.nama as nama_penerbit');
        $this->db->from('tbl_buku');
        // join tabel untuk menampilkan data
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tbl_buku.id_kategori');
        $this->db->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit');

        $this->db->order_by('stok', 'asc');

        //desc
        return $this->db->get()->result();
    }

    public function detail($id)
    {

        $result = $this->db->where('id_buku', $id)->get('tbl_buku');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
