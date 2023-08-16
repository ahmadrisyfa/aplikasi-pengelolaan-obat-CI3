<?php 
class Obat  extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Obat'); 
        if(!$this->session->userdata('username'))
		{
			redirect('auth');
		}
    }
    public function index()
	{        
        $this->load->model('M_Obat');
        $data['obat'] = $this->M_Obat->get_data();
        $data['jenis_obat'] = $this->M_Obat->get_data_jenis()->result();
        
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('Obat/V_Obat', $data);
        $this->load->view('templates/footer');
        
	}
    public function create() {
        $id_jenis_obat = $this->input->post('id_jenis_obat');
        $nama_obat = $this->input->post('nama_obat');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $tgl_expired = $this->input->post('tgl_expired');
        $data = array(
        'id_jenis_obat' => $id_jenis_obat,
        'nama_obat' => $nama_obat,
        'satuan' => $satuan,
        'harga' => $harga,
        'stok' => $stok,
        'tgl_expired' => $tgl_expired,
        );
        $this->M_Obat->create($data);

    }
    public function edit()
    {
        $id = $this->input->post('id');
        $data = $this->db->where('id',$id)->get('tb_obat')->row_array();
        echo json_encode($data);
    }
    public function update() {

        $Id = $this->input->post('id');
        $ObatData = array(
            'id_jenis_obat' => $this->input->post('id_jenis_obat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'tgl_expired' => $this->input->post('tgl_expired')

        );
        $this->M_Obat->update($Id, $ObatData);
        echo json_encode(array('status' => 'success'));
    }
    public function delete() {
        $ObatId = $this->input->post('id');      
        $this->M_Obat->delete($ObatId);		
    }
}

?>