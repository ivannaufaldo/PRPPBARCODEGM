<?php 

class M_Konten extends CI_Model{
    public function tampil_konten($where){
        return $this->db-> get_where('konten', $where);
    }

    public function tambah_Konten($data,$table){
        $this->db->insert($table,$data);
    }

    public function get_Konten($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function update_Konten($where, $data , $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function delete_Koten($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>