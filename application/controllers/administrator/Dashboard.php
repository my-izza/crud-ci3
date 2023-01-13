<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('model_buku');

        // Check Session
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong?>Anda Belum Login! </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            </div>');

            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['buku'] = $this->model_buku->get()->result();

        $this->template->load('template', 'admin/dashboard/dashboard', $data);
    }

    public function search()
    {

        $keyword = $this->input->post('keyword');

        $data['buku'] = $this->model_buku->getKeyword($keyword);

        $this->template->load('template', 'admin/dashboard/dashboard', $data);
    }

    public function detailBuku($id)
    {

        $data['buku'] = $this->model_buku->detail($id);

        $this->template->load('template', 'admin/dashboard/detail', $data);
    }
}
