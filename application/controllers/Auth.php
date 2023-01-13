<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_auth');
    }

    public function login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);

        if ($this->form_validation->run() == FALSE) {;
            $this->load->view('auth/login');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong?>Login Error! Username / Password Anda salah. </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                </div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('name', $auth->name);

                switch ($auth->role_id) {
                    case 1:
                        redirect('administrator/dashboard');
                        break;
                    case 2:
                        redirect('user/home_user');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $params = array('username', 'role_id', 'name');
        $this->session->sess_destroy($params);

        redirect('auth/login');
    }



    public function registrasi()
    {

        $this->form_validation->set_rules('name', 'Name', 'required', ['required' => 'Name wajib diisi!']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi!']);
        $this->form_validation->set_rules(
            'password_1',
            'Password',
            'required|matches[password_2]',
            [
                'required' => 'Password wajib diisi!',
                'matches' => 'Password tidak cocok!'
            ]
        );
        $this->form_validation->set_rules('password_2', 'Password', 'required | matches[password_1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = array(
                'id' => '',
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post(sha1('password_1')),
                'role_id' => 2,
            );
            $this->db->insert('user', $data);
            redirect('auth/login');
        }
    }
}
