<?php 
/**
 * 
 */
class Registrasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['registrasi'] = $this->db->get('registrasi');
		$this->load->view('registrasi/index', $data);
	}

	public function add()
	{
		$data['prodi'] = $this->Model_prodi->get_prodi();
		
		$this->load->view('registrasi/add_registrasi',$data);
	}

	public function action_add()
	{
		$this->db->where('nim_mhs',$this->input->post('nim_mhs'));
		$this->db->where('status_registrasi !=','Dibatalkan');
		$check = $this->db->get('registrasi');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('nim_existing', 'Mahasiswa Sudah Terdaftar!');
			redirect('registrasi/add');
		}
		if ($this->input->post('nama_prodi') == 'default') {
			$this->session->set_flashdata('pilih_prodi', 'Program Studi Belum Terpilih!');
			redirect('registrasi/add');
		}
		if ($this->input->post('tahun') == 'default') {
			$this->session->set_flashdata('pilih_tahun', 'Tahun Akademik Belum Terpilih!');
			redirect('registrasi/add');
		}

		// Upload bukti bayar
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1000';
		$config['file_name'] = url_title($this->input->post('nim_mhs'),'-',TRUE).'_';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('bukti_bayar')){
			$this->session->set_flashdata('bukti_bayar', 'File Bukti Pembayaran Tidak Sesuai Format!');
			redirect('registrasi/add');
			// $errors = array('error' => $this->upload->display_errors());

		} else {
			$data = array('upload_data' => $this->upload->data('bukti_bayar'));
			$bukti_bayar = $this->upload->data('file_name');
		}

		// Upload monitoring
		$config2['upload_path'] = './assets/img';
		$config2['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config2['max_size'] = '2000';
		$config2['file_name'] = url_title($this->input->post('nim_mhs'),'-',TRUE).'_';

		$this->load->library('upload', $config2);

		if(!$this->upload->do_upload('monitoring')){
			$this->session->set_flashdata('monitoring', 'File Monitoring Nilai Tidak Sesuai Format!');
			redirect('registrasi/add');
			// $errors = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data('monitoring'));

			$monitoring = $this->upload->data('file_name');
		}

		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'judul_pkl' => $this->input->post('judul_pkl'),
			'nama_prodi' => $this->input->post('nama_prodi'),
			'tahun' => $this->input->post('tahun'),
			'bukti_bayar' => $bukti_bayar,
			'monitoring' => $monitoring
		);
		$this->db->insert('registrasi', $data);
		$this->session->set_flashdata('registrasi_success', 'Regitrasi Berhasil!');
		redirect('registrasi', 'refresh');
	}

	public function add_ta()
	{
		$data['prodi'] = $this->Model_prodi->get_prodi();
		$this->load->view('registrasi/add_regista',$data);
	}

	public function action_add_ta()
	{
		$this->db->where('nim_mhs',$this->input->post('nim_mhs'));
		$this->db->where('status_registrasi !=','Dibatalkan');
		$check = $this->db->get('registrasi_ta');
		if($check->num_rows() > 0){
			$this->session->set_flashdata('nim_existing', 'Mahasiswa Sudah Terdaftar!');
			redirect('registrasi/add_ta');
		}
		if ($this->input->post('nama_prodi') == 'default') {
			$this->session->set_flashdata('pilih_prodi', 'Program Studi Belum Terpilih!');
			redirect('registrasi/add_ta');
		}
		if ($this->input->post('tahun') == 'default') {
			$this->session->set_flashdata('pilih_tahun', 'Tahun Akademik Belum Terpilih!');
			redirect('registrasi/add_ta');
		}
		if ($this->input->post('nama_dosbim1') == 'default') {
			$this->session->set_flashdata('pilih_dosbim1', 'Dosen Pembimbing Pilihan Belum Terpilih!');
			redirect('registrasi/add_ta');
		}

		// Upload bukti bayar
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '1000';
		$config['file_name'] = url_title($this->input->post('nim_mhs'),'-',TRUE).'_';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('bukti_bayar')){
			$this->session->set_flashdata('bukti_bayar', 'File Bukti Pembayaran Tidak Sesuai Format!');
			redirect('registrasi/add_ta');
			// $errors = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data('bukti_bayar'));
			$bukti_bayar = $this->upload->data('file_name');
		}

		// Upload monitoring
		$config2['upload_path'] = './assets/img';
		$config2['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config2['max_size'] = '2000';
		$config2['file_name'] = url_title($this->input->post('nim_mhs'),'-',TRUE).'_';

		$this->load->library('upload', $config2);

		if(!$this->upload->do_upload('monitoring')){
			$this->session->set_flashdata('monitoring', 'File Monitoring Nilai Tidak Sesuai Format!');
			redirect('registrasi/add_ta');
			// $errors = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data('monitoring'));

			$monitoring = $this->upload->data('file_name');
		}
		
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'judul_ta' => $this->input->post('judul_pkl'),
			'nama_prodi' => $this->input->post('nama_prodi'),
			'tahun' => $this->input->post('tahun'),
			'nama_dosbim1' => $this->input->post('nama_dosbim1'),
			'bukti_bayar' => $bukti_bayar,
			'monitoring' => $monitoring
		);
		$this->db->insert('registrasi_ta', $data);
		$this->session->set_flashdata('registrasi_success', 'Regitrasi Berhasil!');
		redirect('registrasi', 'refresh');
	}

	public function delete($id = NULL){
		$this->db->where('id_registrasi',$id);
		$this->db->delete('registrasi');
		redirect('registrasi','refresh');
	}
	
	public function update($id = NULL){
		$this->db->where('id_registrasi', $id);
		$data['registrasi'] = $this->db->get('registrasi');
		$this->load->view('registrasi/update_registrasi', $data);
	}

	public function action_update($id = ''){
		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'judul_pkl' => $this->input->post('judul_pkl'),
			'nama_prodi' => $this->input->post('nama_prodi'),
			'tahun' => $this->input->post('tahun'),
			'bukti_bayar' => $this->input->post('bukti_bayar'),
			'monitoring' => $this->input->post('monitoring')
		);
		$this->db->where('id_registrasi',$id);
		$this->db->update('registrasi',$data);

		redirect('registrasi','refresh');
	}

	public function perpanjangan_pkl()
	{
		$data['prodi'] = $this->Model_prodi->get_prodi();
		
		$this->load->view('registrasi/perpanjangan_pkl',$data);
	}

	public function action_pp_pkl()
	{
		$nim = $this->Model_mhs->get_nim($this->input->post('nim_mhs'));
		if (count($nim) == 0) {
			redirect('registrasi/add');
		}

		// Upload monitoring
		$config2['upload_path'] = './assets/img';
		$config2['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config2['max_size'] = '2000';
		$config2['file_name'] = url_title($this->input->post('nim_mhs'),'-',TRUE).'_';

		$this->load->library('upload', $config2);

		if(!$this->upload->do_upload('monitoring')){
			$errors = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data('monitoring'));

			$monitoring = $this->upload->data('file_name');
		}

		$data = array(
			'nama_mhs' => $this->input->post('nama_mhs'),
			'nim_mhs' => $this->input->post('nim_mhs'),
			'judul_pkl' => $this->input->post('judul_pkl'),
			'nama_prodi' => $this->input->post('nama_prodi'),
			'tahun' => $this->input->post('tahun'),
			'bukti_bayar' => 'perpanjangan.jpg',
			'monitoring' => $monitoring
		);
		$this->db->insert('registrasi', $data);
		redirect('registrasi', 'refresh');
	}

}

?>