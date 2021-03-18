<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
    }


    public function index(){

       $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata
       ('email')])->row_array();
       
       $data['title'] = 'My Profile';
       $this->load->view('user/head_user', $data);
       $this->load->view('user/index', $data);
       
    }

    public function edit(){

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata
        ('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if($this->form_validation->run() == false){
            
            $data['title'] = 'Edit Profile';
            $this->load->view('user/head_user', $data);
            $this->load->view('user/index_profile', $data);
            
        }else{

            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang diupload
            $upload_image = $_FILES['image']['name'];
            
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2024';
                $config['upload_path'] = './image/profile/';
                
                $this->load->library('upload', $config);
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    data berhasil diubah!
                    </div>');
            redirect('user');


        }
    }
}