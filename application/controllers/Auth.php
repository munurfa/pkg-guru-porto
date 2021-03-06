 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Auth extends CI_Controller {
 
     public function login() {
 
         // Fungsi Login
         $valid = $this->form_validation;
         $username = $this->input->post('username');
         $password = $this->input->post('password');
         $valid->set_rules('username','Username','required');
         $valid->set_rules('password','Password','required');
         
         if($valid->run()) {
            
             $this->simple_login->login($username,$password, base_url('beranda'), base_url('login'));
         }
         // End fungsi login
         if($this->session->userdata('nip') == '') {
 
             //set notifikasi
             // $this->session->set_flashdata('sukses','Anda belum login');
 
             //alihkan ke halaman login
             $this->load->view('login');
         }else{
            $this->session->set_flashdata('sukses','Anda Sudah Login');
          redirect(site_url('beranda/index/'.$this->session->userdata('status')));
         }

         
     }
 
     public function logout(){
         $this->simple_login->logout();
     }        
 }