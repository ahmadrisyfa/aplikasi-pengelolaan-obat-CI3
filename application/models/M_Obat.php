<?php 
class M_Obat extends CI_Model{
    public function get_data(){

        $this->db->select('tb_obat.*, tb_jenis_obat.nama_jenis_obat');
        $this->db->from('tb_obat');
        $this->db->join('tb_jenis_obat', 'tb_obat.id_jenis_obat = tb_jenis_obat.id_jenis_obat', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_data_jenis(){
        return $this->db->get('tb_jenis_obat');    
    }
    public function create($data) {
     
        $this->db->insert('tb_obat', $data);
    }
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('tb_obat', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('tb_obat');
    }
    public function jumlahdata() {
        return $this->db->count_all('tb_obat');
    }
    public function jumlah_data_sudah_expired() {
        $today = date('Y-m-d');
        $this->db->where('tgl_expired <=', $today);
        return $this->db->count_all_results('tb_obat');
    }

    public function jumlah_data_belum_expired() {
        $today = date('Y-m-d');
        $this->db->where('tgl_expired >', $today);
        return $this->db->count_all_results('tb_obat');
    }
}
?>