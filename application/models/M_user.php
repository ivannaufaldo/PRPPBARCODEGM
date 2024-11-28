<?php

class M_user extends CI_Model {
    public function get_Users($where)
    {
        return $this -> db -> get_where('admin', $where);
    }
    public function get_user($where, $table){
        return $this->db->get_where($table,$where);
    }
    public function tambah_User($data,$table){
        $this->db->insert($table,$data);
    }
    public function update_Password($where, $data , $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function delete_User($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    
}

?>