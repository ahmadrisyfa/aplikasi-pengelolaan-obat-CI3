<?php 
class User extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('M_User');
        if(!$this->session->userdata('username'))
		{
			redirect('auth');
		} elseif ($this->session->userdata('role') !== '1') {
            
            redirect('dashboard'); 
        }
    }
    public function index()
	{        
        $this->load->model('M_User');
        $data['user'] = $this->M_User->get_data();
        // $data['jenis_obat'] = $this->M_Obat->get_data_jenis()->result();
        
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('User/V_User', $data);
        $this->load->view('templates/footer');
        
	}
    public function edit()
    {
        $id = $this->input->post('id');
        $data = $this->db->where('id',$id)->get('tb_user')->row_array();
        echo json_encode($data);
    }
    public function update() {

        $Id = $this->input->post('id');
        $user = array(
            'is_active' => $this->input->post('is_active')

        );
        $this->M_User->update($Id, $user);
        echo json_encode(array('status' => 'success'));
    }
}
?>