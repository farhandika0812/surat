<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Suratmasuk_model');
        $this->load->model('Suratkeluar_model');

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    public function suratmasuk(){

        // ambil semua data surat masuk
        $data['surat'] = $this->Suratmasuk_model->get_all();

        $this->load->view('laporan/suratmasuk', $data);
    }

    public function suratkeluar(){

    $data['surat'] = $this->Suratkeluar_model->get_all();
    $this->load->view('laporan/suratkeluar', $data);
}

   public function cetak_suratmasuk(){

    $data['surat'] = $this->Suratmasuk_model->get_all();

    $html = $this->load->view('laporan/pdf_suratmasuk', $data, true);

    require_once FCPATH . 'vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($html);

    $mpdf->Output('laporan_surat_masuk.pdf', 'I');
}

public function cetak_suratkeluar(){

    $data['surat'] = $this->Suratkeluar_model->get_all();

    $html = $this->load->view('laporan/pdf_suratkeluar', $data, true);

    require_once FCPATH . 'vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($html);

    $mpdf->Output('laporan_surat_keluar.pdf', 'I');
}
}