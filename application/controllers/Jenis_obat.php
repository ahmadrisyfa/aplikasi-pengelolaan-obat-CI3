<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_obat extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('M_Jenis_obat'); 
        if(!$this->session->userdata('username'))
		{
			redirect('auth');
		}
    }
	
	public function index()
	{
        $data['jenis_obat'] = $this->M_jenis_obat->get_data()->result();
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('JenisObat/V_jenis_obat',$data);
		$this->load->view('templates/footer');
	}
	
	public function create() {
        $nama_jenis_obat = $this->input->post('nama_jenis_obat');
        $data = array(
            'nama_jenis_obat' => $nama_jenis_obat,
        );
        $this->M_Jenis_obat->create($data);

    }
	public function update() {

        $jenisId = $this->input->post('id');
        $jenisObatData = array(
            'nama_jenis_obat' => $this->input->post('nama_jenis_obat')
        );
        $this->M_Jenis_obat->update($jenisId, $jenisObatData);
    }

	public function delete() {
        $jenisId = $this->input->post('id');      
        $this->M_Jenis_obat->delete($jenisId);    
        echo json_encode(array('status' => 'success'));
    }
    
    
    
   
}
