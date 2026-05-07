<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library('session'); // <-- tambah ini
    $this->load->helper('url');
    
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->cek_login($username, $password);

        if($user){

            $data = [
                'username' => $user->username,
                'nama'     => $user->nama,
                'level'    => $user->level,
                'login'    => true
            ];

            $this->session->set_userdata($data);
            redirect('index.php/dashboard');

        } else {
            $this->session->set_flashdata('error','Username / Password salah');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}