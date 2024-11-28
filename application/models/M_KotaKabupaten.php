<?php 
class M_KotaKabupaten extends CI_Model{
    public function tampil_KoKab()
    {
        return $this -> db -> get('kota_kabupaten');
    } 

    public function tampil_Kokab_limit($limit, $start, $keyword = null){
        if($keyword){
            $this->db->like('KotaKabupaten', $keyword);
        }
        return $this -> db -> get('kota_kabupaten', $limit, $start);
    }
    public function jumlah_Kokab(){
        return $this -> db -> get('kota_kabupaten')->num_rows();
    }
    public function tampil_DataKoKab($where){
        return $this->db->get_where('konten', $where);
    }
    public function tampil_nama_KoKab($where){
        return $this->db->get_where('kota_kabupaten', $where);    
    }
    public function tampil_Sub_Konten($where){
        return $this->db->get_where('konten',$where);
    }

    // dashboard (kota kabupaten tabel)
    public function tambah_Kokab($data, $table){
        $this->db->insert($table,$data);
    }
    public function get_Kokab($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function update_Kokab($where, $data ,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function delete_Kokab($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>