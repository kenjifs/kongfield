<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('field_model');
    }

    public function index()
    {
        $data['fields'] = $this->field_model->get_fields();
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('lapangan/lapangan', $data);
        $this->load->view('layout/footer');
    }
}
