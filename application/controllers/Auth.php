<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index(){
        if($this->session->userdata('username')){
            redirect('user');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == false){
        $data['judul'] = 'Halaman Login';
        $this->load->view('templates/Auth_header', $data) ;
        $this->load->view('auth/login');
        $this->load->view('templates/Auth_footer') ;
        } else {
            // validasi sukses
            $this->_login();

        }
    }

    private function _login(){
        $nama = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['nama' => $nama])->row_array();
        if($user){
            // jika user aktif
            if($user['is_active']== 1) {
                if(password_verify($password, $user['password'])){
                    $data = [
                        'nama' => $user['nama'],
                        'role_id' => $user['role_id'],
                        'No_telpon' => $user['No_telpon'],
                        'alamat' => $user['alamat']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id']== 1){
                        redirect('admin');
                    }else{
                        redirect('user');
                    }
                    redirect('user');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    your password is wrong
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                this user has not activated
                 </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User not available
          </div>');
            redirect('auth');
        }
    }
 
    public function registration(){
        if($this->session->userdata('username')){
            redirect('user');
        }
        $this->form_validation->set_rules('nama', 'Name', 'required|trim|is_unique[user.nama]', [
            'is_unique' => 'you have already register'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont matches!',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('notelp', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('tgllahir', 'Birth Date', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
        if($this->form_validation->run() == false){
        $data['judul'] = 'Halaman Regist';
        $this->load->view('templates/Auth_header', $data) ;
        $this->load->view('auth/registration');
        $this->load->view('templates/Auth_footer') ;
    } else {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT) ,
            'No_telpon' => $this->input->post('notelp'),
            'tanggal_lahir' => $this->input->post('tgllahir'),
            'alamat' => $this->input->post('alamat'),
            'level' => $this->input->post('level'),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];
        $dataPeminjam = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'No_telpon' => $this->input->post('notelp'),
            'tanggal_lahir' => $this->input->post('tgllahir'),
            'alamat' => $this->input->post('alamat')
        ];

        $this->db->insert('user', $data);
        $this->db->insert('peminjam', $dataPeminjam);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Account has been created. Please Login
      </div>');
        redirect('auth');
    }
 }

 public function logout(){
     $this->session->unset_userdata('nama');
     $this->session->unset_userdata('role_id');
     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out
      </div>');
        redirect('auth');
 }
}
