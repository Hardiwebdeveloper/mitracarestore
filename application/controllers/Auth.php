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

            $email = $this->input->post('email', true);
            $data = [

                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
           Anda berhasil registrasi, Silahkan Aktifkan Account anda!
          </div>');
            redirect('auth/index');

        }
    }

    private function _sendEmail($token, $type){

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'abizarkhalidalfarabi@gmail.com',
            'smtp_pass' => 'passwordgmail',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('abizarkhalidalfarabi@gmail.com', 'Hardiwebdeveloper');
        $this->email->to($this->input->post('email'));

        if($type == 'verify'){
            $this->email->subject('Account Veryfication');
            $this->email->message('klik link ini untuk memverifikasi account anda : <a href="'. base_url() . 'auth/verify?email=' .
            $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
            
        }

        if ($this->email->send()){
            return true;

        }else{
            echo $this->email->print_debugger();
            die;
        }

    }

    public function verify(){

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token){

                if(time() - $user_token['date_created'] < (60*60*24)){
                            $this->db->set('is_active', 1);
                            $this->db->where('email', $email);
                            $this->db->update('user');

                            $this->db->delete('user_token', ['email' => $email]);
                            
                            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                        '. $email .' email anda sudah aktif, silahkan login!
                        </div>');
                            redirect('auth');
                }else{

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    akun anda tidak failed! masa berlaku token habis!
                   </div>');
                     redirect('auth');
                }

            } else{
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            akun anda tidak failed! token anda salah!
           </div>');
             redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            akun anda tidak failed! email anda salah!
           </div>');
             redirect('auth');
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

    public function forgotpassword(){

            $data['title'] = 'Lupa password';
            $this->load->view('user/head_user', $data);
            $this->load->view('auth/forgotpassword'); 
    }
}