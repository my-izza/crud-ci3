<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Memanggil Model
        $this->load->model(['model_buku', 'model_kategori', 'model_penerbit']);
    }

    public function index()
    {

        $buku = $this->model_buku->get()->result();
        $data = ['buku' => $buku];

        $data['buku'] = $this->model_buku->getPengadaan();

        $this->template->load('template', 'admin/pengadaan/pengadaan_data', $data);
    }

    // public function add()
    // {
    //     $buku = new stdClass();
    //     $buku->id_buku = null;
    //     $buku->id_kategori = null;
    //     $buku->nama_buku = null;
    //     $buku->harga = null;
    //     $buku->stok = null;
    //     $buku->detail = null;
    //     $buku->gambar = null;
    //     $buku->tahun = null;

    //     // Combobox
    //     $query_kategori = $this->model_kategori->get();

    //     $query_penerbit = $this->model_penerbit->get();
    //     $penerbit[null] = '- Pilih Penerbit -';
    //     foreach ($query_penerbit->result() as $terbit) {
    //         $penerbit[$terbit->id_penerbit] = $terbit->nama;
    //     }

    //     $data = array(
    //         'page' => 'add',
    //         'row'  => $buku,
    //         'kategori' => $query_kategori,
    //         'penerbit' => $penerbit, 'selectedpenerbit' => null,
    //     );

    //     $this->template->load('template', 'admin/buku/pengadaan_form', $data);
    // }

    public function edit($id)
    {

        $buku = new stdClass();
        $buku->id_buku = null;
        $buku->id_kategori = null;
        $buku->nama_buku = null;
        $buku->harga = null;
        $buku->stok = null;
        $buku->detail = null;
        $buku->gambar = null;
        $buku->tahun = null;

        $query = $this->model_buku->get($id);
        if ($query->num_rows() > 0) {
            $buku = $query->row();

            // Combobox
            $query_kategori = $this->model_kategori->get();

            $query_penerbit = $this->model_penerbit->get();
            $penerbit[null] = '- Pilih Penerbit -';
            foreach ($query_penerbit->result() as $terbit) {
                $penerbit[$terbit->id_penerbit] = $terbit->nama;
            }

            $data = array(
                'page' => 'edit',
                'row'  => $buku,
                'kategori' => $query_kategori,
                'penerbit' => $penerbit, 'selectedpenerbit' => $buku->id_penerbit,
            );

            $this->template->load('template', 'admin/buku/pengadaan_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('administrator/pengadaan') . "';</script>";
        }
    }


    // Fungsi Hapus
    public function del($id)
    {

        $item =  $this->model_buku->get($id)->row();
        if ($item->gambar != null) {
            $target_file = 'images/uploads/' . $item->gambar;
            unlink($target_file);
        }

        $this->model_buku->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil dihapus');";
        }
        echo "window.location='" . base_url('administrator/pengadaan') . "';</script>";
    }


    public function process()
    {

        $config['upload_path'] = 'images/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']     = 20000;

        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {

            if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->model_buku->add($post);
                    if ($this->db->affected_rows() > 0) {
                        echo "<script> alert('Data berhasil disimpan');";
                    }
                    redirect('administrator/pengadaan');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('administrator/pengadaan');
                }
            } else {

                $post['gambar'] = null;
                $this->model_buku->add($post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script> alert('Data berhasil disimpan');";
                }
                redirect('administrator/pengadaan');
            }
        } else if (isset($_POST['edit'])) {

            if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {

                    $item =  $this->model_buku->get($post['id'])->row();
                    if ($item->gambar != null) {
                        $target_file = 'images/uploads/' . $item->gambar;
                        unlink($target_file);
                    }

                    $post['gambar'] = $this->upload->data('file_name');
                    $this->model_buku->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        echo "<script> alert('Data berhasil disimpan');";
                    }
                    redirect('administrator/pengadaan');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('administrator/pengadaan');
                }
            } else {

                $post['gambar'] = null;
                $this->model_buku->edit($post);
                if ($this->db->affected_rows() > 0) {
                    echo "<script> alert('Data berhasil disimpan');";
                }
                redirect('administrator/pengadaan');
            }
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script> alert('Data berhasil disimpan');";
        }
        echo "window.location='" . base_url('administrator/pengadaan') . "';</script>";
    }


    public function search()
    {

        $keyword = $this->input->post('keyword');

        $data['buku'] = $this->model_buku->getKeyword($keyword);

        $this->template->load('template', 'admin/pengadaan/pengadaan_cari', $data);
    }
}
