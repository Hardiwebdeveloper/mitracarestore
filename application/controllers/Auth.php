<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        
        parent::__construct();
        $this->load->library('form_validation');
       
    }

    public function index(){

        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false){
            $data['title'] = 'Login Page';
            $this->load->view('user/head_user', $data);
            $this->load->view('auth/login'); 
        } else {
            $this->_login();
        }
    }
    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        
     
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        //jika user ada
        if ($user){
            //jika user aktif
           if($user['is_active'] == 1){
                    //cek password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                            redirect('admin');
                    }else{         
                            redirect('user');
                    }
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
                    password salah!
                    </div>');
                    redirect('auth');
                }
           }else{
            $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">
            email anda belum diaktifkan!
           </div>');
           redirect('auth');
           }
            
        } else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            email anda belum terdaftar!
           </div>');
             redirect('auth');
            //  echo 'dua';
        }
    }
    public function register(){

        if($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('name','Name', 'required|trim');
        $this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'password terlalu pendek'
        ]);

        if ($this->form_validation->run() == false){
            $data['title'] = 'register user';
            $this->load->view('user/head_user', $data);
            $this->load->view('auth/register');

        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
           Anda berhasil registrasi, Silahkan Login!
          </div>');
            redirect('auth/index');

        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Anda berhasil logout!
       </div>');
         redirect('auth');
    }

    public function blocked(){
        
        $data['title'] = 'Blocked';
        $this->load->view('user/head_user', $data);
        $this->load->view('auth/blocked');
    }
}