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

    public function admin()
    {
        $data['fields'] = $this->field_model->get_fields();
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('lapangan/lapangan_admin', $data);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('lapangan/create_field');
        $this->load->view('layout/footer');
    }

    public function store()
    {
        $data = $this->input->post();
        $this->field_model->insert_field($data);
        redirect('lapangan');
    }

    public function edit($id)
    {
        $data['field'] = $this->field_model->get_field_by_id($id);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('lapangan/edit_field', $data);
        $this->load->view('layout/footer');
    }

    public function update($id)
    {
        $data = $this->input->post();
        $this->field_model->update_field($id, $data);
        redirect('lapangan/admin');
    }

    public function delete($id)
    {
        $this->field_model->delete_field($id);
        redirect('lapangan/admin');
    }

    public function search()
    {
        $search_term = $this->input->get('query');
        $data['fields'] = $this->field_model->get_search_results($search_term);
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('lapangan/lapangan_admin', $data);
        $this->load->view('layout/footer');
    }

    public function get_field_details()
    {
        $this->load->model('field_model');
        $field_id = $this->input->post('id');
        $field_details = $this->field_model->get_field_by_id($field_id);
        echo json_encode($field_details);
    }
}
