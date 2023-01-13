<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Memanggil Model
        $this->load->model('model_kategori');
    }

    public function index()
    {
        $data['row'] = $this->model_kategori->get();

        $this->template->load('template', 'admin/kategori/kategori_data', $data);
    }

    public function add()
    {
        $kategori = new stdClass();
        $kategori->id_kategori = null;
        $kategori->nama = null;

        $data = array(
            'page' => 'add',
            'row'  => $kategori
        );

        $this->template->load('template', 'admin/kategori/kategori_form', $data);
    }

    public function edit($id)
    {
        $query = $this->model_kategori->get($id);
        if ($query->num_rows() > 0) {
            $kategori = $query->row();

            $data = array(
                'page' => 'edit',
                'row'  => $kategori
            );

            $this->template->load('template', 'admin/kategori/kategori_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('administrator/kategori') . "';</script>";
        }
    }


    // Fungsi Hapus
    public function del($id)
    {

        $this->model_kategori->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil dihapus');";
        }
        echo "window.location='" . base_url('administrator/kategori') . "';</script>";
    }


    public function process()
    {


        $post = $this->input->post(null, TRUE);

        // Proses Tambah Data
        if (isset($_POST['add'])) {

            $this->model_kategori->add($post);

            // Proses Edit Data
        } elseif (isset($_POST['edit'])) {
            $this->model_kategori->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil disimpan');";
        }
        echo "window.location='" . base_url('administrator/kategori') . "';</script>";
    }

    public function search()
    {

        $keyword = $this->input->post('keyword');

        $data['kategori'] = $this->model_kategori->getKeyword($keyword);

        $this->template->load('template', 'admin/kategori/kategori_cari', $data);
    }
}
