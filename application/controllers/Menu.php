<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged_in();
    }


    public function index(){

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata
        ('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu','Menu','required');
        
        if ($this->form_validation->run() == false){

            $data['title'] = 'Menu Management';
            $this->load->view('user/head_user', $data);
            $this->load->view('menu/index_menu', $data);
        }else{
            $this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Menu berhasil ditambahkan!
           </div>');
          redirect('menu');
        }       
    }
    public function submenu(){

        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata
        ('email')])->row_array();
        
        $this->load->model('M_Menu', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('menu_id','Menu','required');
        $this->form_validation->set_rules('url','Url','required');
        $this->form_validation->set_rules('icon','Icon','required');

        if($this->form_validation->run() == false){

          
            $this->load->view('user/head_user', $data);
            $this->load->view('menu/index_submenu', $data);
        }else{

            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data berhasil ditambahkan!
           </div>');
          redirect('menu/submenu');
        }
        
     
    }
}