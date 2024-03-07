<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    private function cek_login(){
        if (!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan Login Terlebih Dahulu</div>');
            redirect('auth/login');
        }
    }

    private function cek_user(){
        $user_level = $this->session->userdata('user_level');
        if ($user_level == 'Admin' || $user_level == 'Petugas'){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Anda Tidak Bisa Masuk Kehalaman Tersebut</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $this->cek_user();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/content');
        $this->load->view('templates/footer');
    }
}
