<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('auth');
		}
		
	}
	public function index()
	{
		$this->load->model('M_jenis_obat'); 
		$this->load->model('M_Obat');
		$this->load->model('M_User');
		$data['total_jenis_obat'] = $this->M_jenis_obat->jumlahdata();
		$data['total_obat'] = $this->M_Obat->jumlahdata();
		$data['total_user'] = $this->M_User->jumlahdata();
		$data['jumlah_data_sudah_expired'] = $this->M_Obat->jumlah_data_sudah_expired();
		$data['jumlah_data_belum_expired'] = $this->M_Obat->jumlah_data_belum_expired();
		$data['jumlah_user_sudah_aktif'] = $this->M_User->jumlah_data_status('Aktif');
		$data['jumlah_user_belum_aktif'] = $this->M_User->jumlah_data_status('Non Aktif');
		$this->load->model('M_Obat');
        $data['obat'] = $this->M_Obat->get_data();
		$expired_dates = array_column($data['obat'], 'tgl_expired');
		array_multisort($expired_dates, SORT_DESC, $data['obat']);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
	}
}
