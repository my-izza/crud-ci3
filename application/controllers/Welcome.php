<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();

		$this->load->model('model_buku');
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
