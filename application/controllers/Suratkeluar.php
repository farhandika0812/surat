<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Suratkeluar_model');

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    public function index(){
        $data['surat'] = $this->Suratkeluar_model->get_all();
        $this->load->view('suratkeluar/index', $data);
    }

    public function tambah(){
        $this->load->view('suratkeluar/tambah');
    }

    public function simpan(){

        $file_name = '';

        if(!empty($_FILES['file_surat']['name'])){

            $config['upload_path']   = FCPATH.'uploads/surat_keluar/';
            $config['allowed_types'] = '*';
            $config['encrypt_name']  = TRUE;
            $config['max_size']      = 0;

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file_surat')){
                $file = $this->upload->data();
                $file_name = $file['file_name'];
            }
        }

        $data = [
            'no_surat'   => $this->input->post('no_surat'),
            'asal_surat' => $this->input->post('asal_surat'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'penerbit'   => $this->input->post('penerbit'),
            'perihal'    => $this->input->post('perihal'),
            'file_surat' => $file_name
        ];

        $this->Suratkeluar_model->insert($data);

        redirect('index.php/suratkeluar');
    }

    public function edit($id){
        $data['surat'] = $this->Suratkeluar_model->get_by_id($id);
        $this->load->view('suratkeluar/edit', $data);
    }

    public function update($id){

        $surat = $this->Suratkeluar_model->get_by_id($id);
        $file_name = $surat->file_surat;

        if(!empty($_FILES['file_surat']['name'])){

            $config['upload_path']   = FCPATH.'uploads/surat_keluar/';
            $config['allowed_types'] = '*';
            $config['encrypt_name']  = TRUE;
            $config['max_size']      = 0;

            $this->load->library('upload', $config);

            if($this->upload->do_upload('file_surat')){

                if($file_name && file_exists('./uploads/surat_keluar/'.$file_name)){
                    unlink('./uploads/surat_keluar/'.$file_name);
                }

                $file = $this->upload->data();
                $file_name = $file['file_name'];
            }
        }

        $data = [
            'no_surat'   => $this->input->post('no_surat'),
            'asal_surat' => $this->input->post('asal_surat'),
            'tgl_keluar' => $this->input->post('tgl_keluar'),
            'penerbit'   => $this->input->post('penerbit'),
            'perihal'    => $this->input->post('perihal'),
            'file_surat' => $file_name
        ];

        $this->Suratkeluar_model->update($id, $data);

        redirect('index.php/suratkeluar');
    }

    public function hapus($id){
        $surat = $this->Suratkeluar_model->get_by_id($id);

        if($surat->file_surat && file_exists('./uploads/surat_keluar/'.$surat->file_surat)){
            unlink('./uploads/surat_keluar/'.$surat->file_surat);
        }

        $this->Suratkeluar_model->delete($id);

        redirect('index.php/suratkeluar');
    }
}