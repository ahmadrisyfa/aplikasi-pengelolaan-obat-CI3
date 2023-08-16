<?php 
class Auth extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    public function index()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->session->userdata('username'))
		{
			redirect('dashboard');
		}
        if($this->form_validation->run() == false){

            $this->load->view('templates/login/index');
        }else{
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user',['username'=> $username])->row_array();
        if($user){
            if($user['is_active'] == "Aktif"){
                if(password_verify($password, $user['password'])){
                        $data = [
                            'username' =>$user['username'],
                            'fullname' =>$user['fullname'],
                            'role' =>$user['role'],

                        ];
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }else{
                        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                        Gagal Login!, Silahkan Coba Lagi !
                        </div>');
                            redirect('auth');
                    }
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Akun Anda Belum Aktif !
                </div>');
                redirect('auth');

            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
           Username Yang Anda Masukan Belum R egistrasi !
            </div>');
                redirect('auth');

        }
        
    }
    public function register()
    {

        $this->form_validation->set_rules('fullname','Fullname','required');
        $this->form_validation->set_rules('username','Username','required|is_unique[tb_user.fullname]');
        $this->form_validation->set_rules('password','Password','required|min_length[3]');
        if($this->session->userdata('username'))
		{
			redirect('dashboard');
		}
        if($this->form_validation->run() == false){
        $this->load->view('templates/register/index');
        }else{
        $data = [
            'username' => htmlspecialchars($this->input->post('username',true)),
            'fullname' => htmlspecialchars($this->input->post('fullname',true)),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'role' => 0,
            'is_active' => 'Non Aktif',


        ];
        $this->db->insert('tb_user',$data);
        $this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">
        Berhasil registrasi, Silahkan Login !
        </div>');
        redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Berhasil Log Out !
        </div>');
        redirect('auth');
    }
}
?>