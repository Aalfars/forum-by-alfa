<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Configuration extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('template');

        if ( $this->session->userdata('level') !== 'Admin') {;
            
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong> Login dulu bosku</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times</span>
            </button>
        </div>;
            ');
            redirect('Auth');  
            
        };
    }
    public function index(){
        $data = array(
            'konfig'  =>  $this->db->get('konfigurasi')->result(),
            'title'     => "Konfigurasi",
        );
        $this->template->load('template_admin','admin/configuration',$data);
        
        
    }
    public function update(){
        $data = array(
            'judul_website' => $this->input->post('judul_website'),
            'instagram' => $this->input->post('instagram'),
            'twitter' => $this->input->post('twitter'),
            'email' => $this->input->post('email'),
            'github' => $this->input->post('github'),
            'linkedln' => $this->input->post('linkedln'),
            'facebook' => $this->input->post('facebook'),
        );
        $this->db->update('konfigurasi', $data);
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text">Konfigurasi berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/configuration');
    }
}
    