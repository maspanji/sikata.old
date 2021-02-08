<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('status') !== 'admin'){
			redirect('admin/login');
		}

		$data['registrasi'] = $this->Model_mhs->get_status('');
		$data['registrasi_ta'] = $this->Model_mhs->get_status_ta('');
		$this->load->view('admin/header');
		$this->load->view('admin/tabel_registrasi',$data);
		$this->load->view('admin/footer');
	}

	public function keuangan(){
		if($this->session->userdata('status') !== 'admin'){
			redirect('admin/login');
		}
		$data['registrasi'] = $this->Model_mhs->rekap_pkl('Telah disetujui oleh keuangan');
		$data['registrasi_ta'] = $this->Model_mhs->rekap_ta('Telah disetujui oleh keuangan');
		$this->load->view('admin/header');
		$this->load->view('admin/tabel_keuangan',$data);
		$this->load->view('admin/footer');
	}

	public function kaprodi(){
		if($this->session->userdata('status') !== 'admin'){
			redirect('admin/login');
		}
		$data['registrasi'] = $this->Model_mhs->rekap_pkl('Telah disetujui oleh Kaprodi');
		$data['registrasi_ta'] = $this->Model_mhs->rekap_ta('Telah disetujui oleh Kaprodi');
		$this->load->view('admin/header');
		$this->load->view('admin/tabel_kaprodi',$data);
		$this->load->view('admin/footer');
	}

	public function dekanat(){
		if($this->session->userdata('status') !== 'admin'){
			redirect('admin/login');
		}
		$data['registrasi'] = $this->Model_mhs->rekap_pkl('Telah disetujui oleh Dekan. Surat dapat dicetak');
		$data['registrasi_ta'] = $this->Model_mhs->rekap_ta('Telah disetujui oleh Dekan. Surat dapat dicetak');
		$this->load->view('admin/header');
		$this->load->view('admin/tabel_dekanat',$data);
		$this->load->view('admin/footer');
	}

	//menampilkan list tiap user
	public function u_keuangan(){
		if($this->session->userdata('status') !== 'admin'){
			redirect('admin/login');
		}
		$this->load->view('admin/header');
		$data['account'] = $this->Model_keuangan->get();
		$this->load->view('admin/user_keuangan',$data);
		$this->load->view('admin/footer');
	}

	public function u_kaprodi(){
		if($this->session->userdata('status') !== 'admin'){
			redirect('admin/login');
		}
		$this->load->view('admin/header');
		$data['account'] = $this->Model_kaprodi->get();
		$this->load->view('admin/user_kaprodi',$data);
		$this->load->view('admin/footer');
	}

	public function u_dekanat(){
		if($this->session->userdata('status') !== 'admin'){
			redirect('admin/login');
		}
		$this->load->view('admin/header');
		$data['account'] = $this->Model_dekanat->get();
		$this->load->view('admin/user_dekanat',$data);
		$this->load->view('admin/footer');
	}

	public function login()
	{
		if($this->session->userdata('status') == 'admin'){
			redirect('admin');
		}

		$this->load->view('admin/login');
	}

	public function action_login()
	{
		if($this->session->userdata('status') == 'admin'){
			redirect('admin');
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->Model_dekanat->cek_login('user_admin',$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'username' => $username,
				'status' => "admin"
			);
			$this->session->set_userdata($data_session);
			redirect('admin');
		} else{
			$this->session->set_flashdata('login_failed', 'Username / Password Anda Salah!');
			redirect('admin/login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}

}

?>