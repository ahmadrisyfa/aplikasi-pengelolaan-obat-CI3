<?php 

class M_User extends CI_Model{

    public function get_data(){
        return $this->db->get('tb_user')->result();  
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    }
    public function jumlahdata() {
        return $this->db->count_all('tb_user');
    }
    public function jumlah_data_status($is_active) {
        $this->db->where('is_active', $is_active);
        return $this->db->count_all_results('tb_user');
    }
}
?>