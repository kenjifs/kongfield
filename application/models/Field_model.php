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

    public function get_field_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('fields');
        return $query->row_array();
    }

    public function insert_field($data)
    {
        return $this->db->insert('fields', $data);
    }

    public function update_field($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('fields', $data);
    }

    public function delete_field($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('fields');
    }
}
