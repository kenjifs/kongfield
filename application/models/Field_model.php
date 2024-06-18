<?php
class Field_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_fields()
    {
        $query = $this->db->get('fields');
        return $query->result_array();
    }
}
