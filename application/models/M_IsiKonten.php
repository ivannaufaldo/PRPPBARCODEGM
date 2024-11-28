<?php 

class M_IsiKonten extends CI_Model{
    public function tampil_isikonten($where){
        return $this->db-> get_where('isi_konten', $where);
    }
    public function tambah_IsiKonten($data,$table){
        $this->db->insert($table,$data);
    }
    public function get_IsiKonten($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function update_IsiKonten($where, $data , $table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function delete_isiKonten($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>