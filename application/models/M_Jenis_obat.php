<?php

class M_jenis_obat extends CI_Model{

    public function get_data(){
        return $this->db->get('tb_jenis_obat');
    }
    
    public function create($data) {
     
        $this->db->insert('tb_jenis_obat', $data);
    }
    public function update($id, $data) {
        $this->db->where('id_jenis_obat', $id);
        $this->db->update('tb_jenis_obat', $data);
    }
    public function delete($id) {
        $this->db->where('id_jenis_obat', $id);
        $this->db->delete('tb_jenis_obat');
    }
    
    public function jumlahdata() {
        return $this->db->count_all('tb_jenis_obat');
    }
    
    
}