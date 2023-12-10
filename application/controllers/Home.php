<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $data = array(
            'title' => "Dashboard",
            'config' => $this->Home_model->konfigurasi(),
            'konten' => $this->Home_model->konten_home(),
            'kategori' => $this->Home_model->kategori(),
            'recent_post' => $this->Home_model->recent_post(),
            'caraousel' => $this->Home_model->caraousel()
        );
        $this->load->view('home/index', $data);
    }
    public function detail($slug)
    {
        $data = array(
            'title' => "Detail",
            'detail' => $this->Home_model->detail($slug),
            'kategori' => $this->Home_model->kategori(),
            'config' => $this->Home_model->konfigurasi(),
            'komen' => $this->Home_model->get_komen($slug)
        );
        $this->load->view('home/detail', $data);
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data = array(
            'result' => $this->Home_model->search($keyword),
            'title' => "Search",
            'recent_post' => $this->Home_model->recent_post(),
            'config' => $this->Home_model->konfigurasi(),
            'kategori' => $this->Home_model->kategori()
        );
        $this->load->view('home/search', $data);
    }
    public function saran()
    {
        $this->Home_model->saran();
        redirect('home');
    }
    public function konten()
    {
        $config['base_url'] = base_url('home/konten');
        $config['total_rows'] = $this->Home_model->jumlah_konten(); // Mengambil total jumlah konten dari model
        $config['per_page'] = 6; // Jumlah item yang ditampilkan per halaman
        $config['uri_segment'] = 3; // Segmen URI yang berisi nomor halaman
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['links'] = $this->pagination->create_links();
        $this->pagination->initialize($config);
        $data = array(
            'title' => "Konten",
            'config' => $this->Home_model->konfigurasi(),
            'konten' => $this->Home_model->get_konten_paginated($config['per_page'], $page),
            'kategori' => $this->Home_model->kategori(),
            'links' =>  $this->pagination->create_links(),
            'recent_post' => $this->Home_model->recent_post(),
        );
        $this->load->view('home/all_konten', $data);
    }
    public function gallery()
    {
        $data = array(
            'title' => "Gallery",
            'config' => $this->Home_model->konfigurasi(),
            'galeri' => $this->Home_model->get_gallery(),
            'kategori' => $this->Home_model->kategori(),
            'recent_post' => $this->Home_model->recent_post(),
        );
        $this->load->view('home/gallery', $data);
    }
    public function about()
    {
        $data = array(
            'title' => "Konten",
            'config' => $this->Home_model->konfigurasi(),
            'kategori' => $this->Home_model->kategori()

        );
        $this->load->view('home/about', $data);
    }
    public function kategori()
    {
        $data = array(
            'title' => "Kategori",
            'config' => $this->Home_model->konfigurasi(),
            'result' => $this->Home_model->all_kategori(),
            'kategori' => $this->Home_model->kategori(),
            'recent_post' => $this->Home_model->recent_post(),
        );
        $this->load->view('home/kategori', $data);
    }
    public function by_kategori($keyword)
    {
        $data = array(
            'result' => $this->Home_model->search_kategori($keyword),
            'title' => "Kategori" . $this->input->post('kategori'),
            'config' => $this->Home_model->konfigurasi(),
            'recent_post' => $this->Home_model->recent_post(),
            'kategori' => $this->Home_model->kategori()
        );
        $this->load->view('home/search', $data);
    }
    public function komen()
    {
        $data = array(
            'komen' => $this->input->post('komentar'),
            'tanggal' => date('Y-m-d'),
            'username' => $this->session->userdata('username'),
            'slug' => $this->input->post('slug'),
            'id_konten' => $this->input->post('id_konten')
        );
        $this->Home_model->komen($data);
        redirect("home/detail/{$data['slug']}");
    }
}
