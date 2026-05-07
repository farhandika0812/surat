<?php
class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    public function index(){

        $level = $this->session->userdata('level');

        if($level == 1){
            $this->load->view('dashboard_admin');
        } else {
            $this->load->view('dashboard_manajemen');
        }
    }
}