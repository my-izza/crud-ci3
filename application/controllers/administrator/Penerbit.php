<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerbit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Memanggil Model
        $this->load->model('model_penerbit');
    }

    public function index()
    {
        $data['row'] = $this->model_penerbit->get();

        $this->template->load('template', 'admin/penerbit/penerbit_data', $data);
    }

    public function add()
    {
        $penerbit = new stdClass();
        $penerbit->id_penerbit = null;
        $penerbit->nama = null;
        $penerbit->alamat = null;
        $penerbit->kota = null;
        $penerbit->telp = null;

        $data = array(
            'page' => 'add',
            'row'  => $penerbit
        );

        $this->template->load('template', 'admin/penerbit/penerbit_form', $data);
    }

    public function edit($id)
    {
        $query = $this->model_penerbit->get($id);
        if ($query->num_rows() > 0) {
            $penerbit = $query->row();

            $data = array(
                'page' => 'edit',
                'row'  => $penerbit
            );

            $this->template->load('template', 'admin/penerbit/penerbit_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('administrator/penerbit') . "';</script>";
        }
    }


    // Fungsi Hapus
    public function del($id)
    {

        $this->model_penerbit->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil dihapus');";
        }
        echo "window.location='" . base_url('administrator/penerbit') . "';</script>";
    }


    public function process()
    {


        $post = $this->input->post(null, TRUE);

        // Proses Tambah Data
        if (isset($_POST['add'])) {

            $this->model_penerbit->add($post);

            // Proses Edit Data
        } elseif (isset($_POST['edit'])) {
            $this->model_penerbit->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil disimpan');";
        }
        echo "window.location='" . base_url('administrator/penerbit') . "';</script>";
    }

    public function search()
    {

        $keyword = $this->input->post('keyword');

        $data['penerbit'] = $this->model_penerbit->getKeyword($keyword);

        $this->template->load('template', 'admin/penerbit/penerbit_cari', $data);
    }
}
