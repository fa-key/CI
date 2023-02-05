<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index(){
        $data['judul'] = 'Admin-page';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer-sisemo');
    }
    public function inputKatalog(){
        if($this->session->userdata('username')){
            redirect('user');
        }
        $data['judul'] = 'Input Katalog';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
        
        $this->form_validation->set_rules('Merk', 'Merk', 'required|trim');
        

        if($this->form_validation->run() == false){
            $data['judul'] = 'Input Katalog';
            $this->load->view('templates/header-sisemo', $data);
            $this->load->view('templates/sidebar-sisemo', $data);
            $this->load->view('templates/topbar-sisemo', $data);
            $this->load->view('input katalog/index', $data);
            $this->load->view('templates/footer-sisemo');
        } else {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 10000;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        echo "gagal tambah!";
                        
                }
                else
                {
                        $gambar = $this->upload->data();
                        $gambar = $gambar['file_name'];
                        $Merk = $this->input->post('Merk', TRUE);
                        $Warna = $this->input->post('Warna', TRUE);
                        $Lokasi = $this->input->post('Lokasi', TRUE);
                        $Kapasitas = $this->input->post('Kapasitas');
                        $Harga = $this->input->post('Harga', TRUE);
                        $Stok = $this->input->post('Stok', TRUE);

                        $dataMobil = array(
                            'merk' => $Merk,
                            'lokasi' => $Lokasi,
                            'kapasitas' => $Kapasitas,
                            'warna' => $Warna,
                            'gambar' => $gambar,
                            'harga' => $Harga,
                            'stok' => $Stok
                       
                        );
                        $this->db->insert('mobil', $dataMobil);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                            Data Mobil Berhasil dimasukkan
                            </div>');
                         redirect('admin/index');
                }
            
        }
      


    }
    public function dataPesan(){
        if($this->session->userdata('username')){
            redirect('user');
        }
        $data['judul'] = 'Data Pemesanan';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
        
        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('Data Pesan/index', $data);
        $this->load->view('templates/footer-sisemo');
    }
    public function dataKatalog(){
        if($this->session->userdata('username')){
            redirect('user');
        }
        $data['judul'] = 'Data Katalog';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
        
        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('Data katalog/index', $data);
        $this->load->view('templates/footer-sisemo');
        
    }
    public function edit(){
        if($this->session->userdata('username')){
            redirect('user');
        }
        
        $data['judul'] = 'Edit Data Mobil';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
        $id = $_GET['id'];
        $this->form_validation->set_rules('Merk', 'Merk', 'required|trim');
        if($this->form_validation->run() == false){
        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer-sisemo');
        } else{
           
           
            $upload_image = $_FILES['userfile']['name'];
            if($upload_image){
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 10000;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if($this->upload->do_upload('userfile')){
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else{
                    echo $this->upload->display_errors();
                }
            }




            // cek jika ada gambar yg di update
            $upload_image = $_FILES['userfile'];
            $merk = $this->input->post('Merk');
            $lokasi = $this->input->post('Lokasi');
            $kapasitas = $this->input->post('Kapasitas');
            $warna = $this->input->post('Warna');
            $harga = $this->input->post('Harga');
            $stok = $this->input->post('Stok');

            $this->db->set('merk', $merk);
            $this->db->set('lokasi', $lokasi);
            $this->db->set('kapasitas', $kapasitas);
            $this->db->set('warna', $warna);
            $this->db->set('harga', $harga);
            $this->db->set('stok', $stok);

            $this->db->where('id', $id);
            $this->db->update('mobil');
            $this->session->set_flashdata('pesanedit', '<div class="alert alert-success" role="alert">
                Data Mobil sudah diubah
                </div>');
                 redirect('admin');
        }
        
    }
    public function hapus(){

        $id = $_GET['id'];
        $this->db->where('id', $id);
        $this->db->delete('mobil');
        redirect('admin');

    }
    public function bayar(){

        $id = $_GET['id'];
        $bayar = 1;
        $this->db->set('pembayaran', $bayar);
        $this->db->where('id', $id);
        $this->db->update('sewamobil');
        redirect('admin/dataPesan');

    }
    public function status(){
        $id = $_GET['id'];
        $status = 1;
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        if($this->db->update('sewamobil')){
            $sewa= $this->db->query("SELECT * FROM sewamobil WHERE id = $id");
            foreach ($sewa->result_array() as $sw) {
                $idm = $sw['id_mobil'];
                $this->db->query("UPDATE mobil SET stok = stok + 1 WHERE id = $idm");
            }
        }
        redirect('admin/dataPesan');
    }
    public function hapusPesan(){
        $id = $_GET['id'];
        $this->db->where('id', $id);
        $this->db->delete('sewamobil');
        redirect('admin/dataPesan');
    }
    public function cetakdataPesan(){

        $this->load->view('cetak/dataPesan');

       
    }
    public function cetakdataKatalog(){
        
        $this->load->view('cetak/dataKatalog');

       
    }
    
    public function profile(){
        if($this->session->userdata('username')){
            redirect('user');
        }
        
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();

        $this->form_validation->set_rules('Nama', 'Nama', 'required|trim');
        if($this->form_validation->run() == false){
        $data['judul'] = 'Profile';
        $this->load->view('templates/header-sisemo', $data);
        $this->load->view('templates/sidebar-sisemo', $data);
        $this->load->view('templates/topbar-sisemo', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer-sisemo');
    } else {
        $data = [
            'id_user' => $this->input->post('iduser'),
            'nama_admin' => htmlspecialchars($this->input->post('Nama', true)),
            'no_telpon' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('Alamat'),
            'is_active' => 1
        ];
        
        $this->db->insert('pihak_rental', $data);
        $this->session->set_flashdata('messageProfile', '<div class="alert alert-success" role="alert">
        Anda Telah Terdata Sebagai Admin
      </div>');
        redirect('admin');
    }
 }

 public function dataMember(){
    $data['judul'] = 'Data Member';
    $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('nama')])->row_array();
    
    $this->load->view('templates/header-sisemo', $data);
    $this->load->view('templates/sidebar-sisemo', $data);
    $this->load->view('templates/topbar-sisemo', $data);
    $this->load->view('dataMember/dataMember', $data);
    $this->load->view('templates/footer-sisemo');
}
public function cetakdataMember(){
    $this->load->view('cetak/dataMember');
}

}