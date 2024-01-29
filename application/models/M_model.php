<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends CI_Model {

    public function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get($table)
    {
        $this->db->ORDER_BY('id', 'DESC');
        return $this->db->get($table);
    }

    public function join ($table, $tbljoin, $join)
    {
        $this->db->JOIN($tbljoin,$join);
        return $this->db->get($table);
    }

    public function getpgw($table)
    {
        $this->db->ORDER_BY('nip', 'DESC');
        return $this->db->get($table);
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function update($where, $data, $table)
    {
        
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}