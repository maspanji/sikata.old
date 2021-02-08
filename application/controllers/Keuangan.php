<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('status') != 'keuangan'){
			redirect('keuangan/login');
		}

		$this->load->view('template/header_keu');
		$data['registrasi'] = $this->Model_mhs->get_status('');
		$data['registrasi_ta'] = $this->Model_mhs->get_status_ta('');
		$this->load->view('keuangan/tabel', $data);
		$this->load->view('template/footer');
	}

	public function index_pkl()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->load->view('template/header_keu');
		$data['prodi'] = $this->Model_prodi->get_prodi();	
		$data['registrasi'] = $this->Model_mhs->get_status('');
		$this->load->view('keuangan/tabel_pkl', $data);
		$this->load->view('template/footer');
	}

	public function index_ta()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->load->view('template/header_keu');
		$data['prodi'] = $this->Model_prodi->get_prodi();		
		$data['registrasi_ta'] = $this->Model_mhs->get_status_ta('');
		$this->load->view('keuangan/tabel_ta', $data);
		$this->load->view('template/footer');
	}	

	//ganti status (acc keu)
	public function verif_keu()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->Model_mhs->verif_keu();
		$this->session->set_flashdata('verif_success', 'Verifikasi Berhasil!');
		redirect('keuangan/pkl');
	}

	public function verif_keu_ta()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->Model_mhs->verif_keu_ta();
		$this->session->set_flashdata('verif_success', 'Verifikasi Berhasil!');
		redirect('keuangan/ta');
	}

	public function rekap_keu()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->load->view('template/header_keu');
		$data['registrasi_a'] = $this->Model_mhs->rekap_pkl('Telah disetujui oleh keuangan');
		$data['registrasi_b'] = $this->Model_mhs->rekap_pkl('Telah disetujui oleh Kaprodi');
		$data['registrasi_c'] = $this->Model_mhs->rekap_pkl('Dibatalkan');
		$this->load->view('keuangan/rekap_pkl', $data);
		$this->load->view('template/footer');
	}

	public function rekap_keu_ta()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->load->view('template/header_keu');
		$data['registrasi_a'] = $this->Model_mhs->rekap_ta('Telah disetujui oleh keuangan');
		$data['registrasi_b'] = $this->Model_mhs->rekap_ta('Telah disetujui oleh Kaprodi');
		$data['registrasi_c'] = $this->Model_mhs->rekap_ta('Dibatalkan');
		$this->load->view('keuangan/rekap_ta', $data);
		$this->load->view('template/footer');
	}

	public function cetak_pkl()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$data['registrasi_a'] = $this->Model_mhs->rekap_pkl('Telah disetujui oleh keuangan');
		$data['registrasi_b'] = $this->Model_mhs->rekap_pkl('Telah disetujui oleh Kaprodi');
		$data['registrasi_c'] = $this->Model_mhs->rekap_pkl('Dibatalkan');
		$this->load->view('keuangan/cetak_pkl', $data);
		$this->load->view('template/footer');
	}

	public function cetak_ta()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$data['registrasi_a'] = $this->Model_mhs->rekap_ta('Telah disetujui oleh keuangan');
		$data['registrasi_b'] = $this->Model_mhs->rekap_ta('Telah disetujui oleh Kaprodi');
		$data['registrasi_c'] = $this->Model_mhs->rekap_ta('Dibatalkan');
		$this->load->view('keuangan/cetak_ta', $data);
		$this->load->view('template/footer');
	}

	public function batal_keu()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->Model_mhs->batal($this->input->post('id_registrasi'));
		redirect('keuangan','refresh');
	}

	public function batal_keu_ta()
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->Model_mhs->batal_ta($this->input->post('id_registrasi'));
		redirect('keuangan','refresh');
	}

	public function prodi_pkl($nama_prodi)
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}

		$this->load->view('template/header_keu');
		$data['registrasi'] = $this->Model_mhs->get_prodi('',$nama_prodi);
		$this->load->view('keuangan/prodi_pkl', $data);
		$this->load->view('template/footer');
	}

	public function prodi_ta($nama_prodi)
	{
		if($this->session->userdata('status') !== 'keuangan'){
			redirect('keuangan/login');
		}
					
		$this->load->view('template/header_keu');
		$data['registrasi_ta'] = $this->Model_mhs->get_prodi_ta('',$nama_prodi);
		$this->load->view('keuangan/prodi_ta', $data);
		$this->load->view('template/footer');
	}

	public function login()
	{
		if($this->session->userdata('status') == 'keuangan'){
			redirect('keuangan');
		}

		$this->load->view('keuangan/login');
	}

	public function action_login()
	{
		if($this->session->userdata('status') == 'keuangan'){
			redirect('keuangan');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->Model_keuangan->cek_login('user_keuangan',$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'username' => $username,
				'status' => "keuangan"
			);
			$this->session->set_userdata($data_session);
			redirect('keuangan');
		} else{
			$this->session->set_flashdata('login_failed', 'Username / Password Anda Salah!');
			redirect('keuangan/login');
		}
	}

	public function register()
	{
		$this->load->view('keuangan/register');
	}

	public function register_action()
	{
		$this->db->where('username',$this->input->post('username'));
		$check = $this->db->get('user_keuangan');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('username_existing', 'Username Sudah Terdaftar!');
			redirect('keuangan/register');
		}

		$this->Model_keuangan->register();
		$this->session->set_flashdata('register_success', 'Data Berhasil Ditambahkan!');
		redirect('admin/keuangan');
	}

	public function delete($id_keuangan)
	{
		$this->Model_keuangan->delete($id_keuangan);
		redirect('admin/keuangan');
	}

	public function index_acc()
	{
		$data['account'] = $this->Model_keuangan->get();
		$this->load->view('keuangan/index_acc',$data);
	}

	public function edit($id_keuangan)
	{
		$data['account'] = $this->Model_keuangan->get_id($id_keuangan);
		$this->load->view('keuangan/edit_acc',$data);
	}

	public function edit_action()
	{
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('id_keuangan !=',$this->input->post('id_keuangan'));
		$check = $this->db->get('user_keuangan');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('username_existing', 'Username Sudah Terdaftar!');
			redirect("keuangan/edit/".$this->input->post('id_keuangan'));
		}

		$this->Model_keuangan->update($this->input->post('id_keuangan'));
		redirect('admin/keuangan');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('keuangan/login');
	}

}

?>