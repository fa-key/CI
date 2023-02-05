<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = 'Home';

        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
       
        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer-sisemo');
    }
    public function katalog(){
        $data['judul'] = 'Katalog';

        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
       
        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('user/katalog', $data);
        $this->load->view('templates/footer-sisemo');
    }

public function pinjam(){

        $data['judul'] = 'form peminjaman';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('user/pinjam', $data);
        $this->load->view('templates/footer-sisemo');
        
    }

    public function pembayaran(){

        $data['judul'] = 'Pembayaran';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('user/pembayaran', $data);
        $this->load->view('templates/footer-sisemo');
        
    }

}