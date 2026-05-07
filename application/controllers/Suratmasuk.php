<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Suratmasuk_model');

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    public function index(){
        $data['surat'] = $this->Suratmasuk_model->get_all();
        $this->load->view('suratmasuk/index', $data);
    }

    public function tambah(){
        $this->load->view('suratmasuk/tambah');
    }

    public function simpan(){

    $file_name = '';

    if(isset($_FILES['file_surat']) && $_FILES['file_surat']['name'] != ''){

        $config['upload_path']   = FCPATH.'uploads/surat_masuk/';
        $config['allowed_types'] = '*';
        $config['max_size']      = 0; // 0 = unlimited
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_surat')){

            // 🔥 tampilkan error biar jelas
            echo $this->upload->display_errors();
            exit;

        } else {
            $upload = $this->upload->data();
            $file_name = $upload['file_name'];
        }
    }

    $data = [
        'no_surat'   => $this->input->post('no_surat'),
        'asal_surat' => $this->input->post('asal_surat'),
        'tgl_masuk'  => $this->input->post('tgl_masuk'),
        'penerima'   => $this->input->post('penerima'),
        'perihal'    => $this->input->post('perihal'),
        'file_surat' => $file_name
    ];

    $this->Suratmasuk_model->insert($data);

    redirect('index.php/suratmasuk');
}

    public function edit($id){
        $data['surat'] = $this->Suratmasuk_model->get_by_id($id);
        $this->load->view('suratmasuk/edit', $data);
    }

    public function update($id){

        $surat = $this->Suratmasuk_model->get_by_id($id);
        $file_name = $surat->file_surat;

        if(!empty($_FILES['file_surat']['name'])){

            $config['upload_path']   = FCPATH.'uploads/surat_masuk/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 0; // 0 = unlimited
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file_surat')){

                // hapus file lama
                if($file_name && file_exists('./uploads/surat_masuk/'.$file_name)){
                    unlink('./uploads/surat_masuk/'.$file_name);
                }

                $file = $this->upload->data();
                $file_name = $file['file_name'];
            }
        }

        $data = [
            'no_surat'   => $this->input->post('no_surat'),
            'asal_surat' => $this->input->post('asal_surat'),
            'tgl_masuk'  => $this->input->post('tgl_masuk'),
            'penerima'   => $this->input->post('penerima'),
            'perihal'    => $this->input->post('perihal'),
            'file_surat' => $file_name
        ];

        $this->Suratmasuk_model->update($id, $data);

        redirect('index.php/suratmasuk');
    }

    public function hapus($id){
        $surat = $this->Suratmasuk_model->get_by_id($id);

        if($surat->file_surat && file_exists('./uploads/surat_masuk/'.$surat->file_surat)){
            unlink('./uploads/surat_masuk/'.$surat->file_surat);
        }

        $this->Suratmasuk_model->delete($id);
        redirect('index.php/suratmasuk');
    }
}