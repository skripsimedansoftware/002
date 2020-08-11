<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	protected $bank_penerbit = array(
		'Mandiri', 'BRI', 'Bank Sumut'
	);

	public function __construct()
	{
		parent::__construct();

		if (!in_array($this->router->fetch_method(), ['daftar' ,'masuk', 'keluar']))
		{
			if (empty($this->session->userdata('pengguna')))
			{
				redirect(base_url('pengguna/daftar'),'refresh');
			}
		}
	}

	public function index()
	{
		$data['sub_judul'] = 'Beranda';
		switch (aktif_sesi()['role']) {
			case 'sopir':
				$data['sub_judul'] = 'Pesanan Transportasi';
				$data['pesanan_transportasi'] = $this->pengguna_model->pesanan_transportasi(aktif_sesi()['id']);
				$this->template->pengguna('pengguna/beranda-sopir', $data);
			break;

			case 'petani':
				$data['upah_angkut'] = $this->setting_model->get_upah_angkut();
				$data['harga_sawit'] = $this->setting_model->get_harga_sawit();
				$this->template->pengguna('pengguna/beranda-petani', $data);
			break;
			
			default:
				$this->template->pengguna('pengguna/beranda', $data);
			break;
		}
	}

	public function tambah()
	{
		if ($this->input->method(TRUE) == 'POST') 
		{
			$this->form_validation->set_rules('role', 'Role', 'trim|in_list[admin,petani,sopir]|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[pengguna.email]|required', array('is_unique' => 'Email sudah terdaftar'));
			$this->form_validation->set_rules('seluler', 'Seluler', 'trim|max_length[15]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|in_list[aktif,non-aktif]|required');
			
			if ($this->form_validation->run() == TRUE)
			{
				$pengguna = $this->pengguna_model->create(array(
					'role' => $this->input->post('role'),
					'email' => $this->input->post('email'),
					'seluler' => $this->input->post('seluler'),
					'password' => md5($this->input->post('password')),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'alamat' => $this->input->post('alamat'),
					'status' => $this->input->post('status')
				));

				if ($pengguna) 
				{
					$this->session->set_flashdata('flash_message', array('status' => 'success', 'message' => 'Pengguna berhasil ditambahkan'));
				}
				else
				{
					$this->session->set_flashdata('flash_message', array('status' => 'warning', 'message' => 'Gagal menambahkan pengguna'));
				}

				redirect(base_url('pengguna/semua'), 'refresh');
			}
			else
			{
				$data['sub_judul'] = 'Tambah Pengguna';
				$this->template->pengguna('pengguna/tambah', $data);
			}
		}
		else
		{
			$data['sub_judul'] = 'Tambah Pengguna';
			$this->template->pengguna('pengguna/tambah', $data);
		}
	}

	public function profil($pengguna_id = NULL)
	{
		$data['sub_judul'] = 'Profil Pengguna';
		$data['pengguna'] = $this->pengguna_model->view($pengguna_id?$pengguna_id:$this->session->userdata('pengguna'));
		$data['akun_bank'] = $this->akun_bank_model->get_where(array('pengguna_id' => $pengguna_id));
		$this->template->pengguna('pengguna/profil', $data);
	}

	public function sunting($pengguna_id = NULL)
	{
		if (aktif_sesi()['role'] == 'admin' OR aktif_sesi()['id'] == $pengguna_id)
		{
			$pengguna_id = ($pengguna_id)?$pengguna_id:aktif_sesi()['id'];
			$pengguna = $this->pengguna_model->view($pengguna_id);

			if ($pengguna)
			{
				if ($this->input->method(TRUE) == 'POST')
				{
					$password = (!empty($this->input->post('password')))?md5($this->input->post('password')):$pengguna['password'];

					$this->pengguna_model->update(array(
						'role' => $this->input->post('role'),
						'email' => $this->input->post('email'),
						'seluler' => $this->input->post('seluler'),
						'username' => $this->input->post('username'),
						'password' => $password,
						'nama_lengkap' => $this->input->post('nama_lengkap'),
						'alamat' => $this->input->post('alamat'),
						'status' => $this->input->post('status')
					), array('id' => $this->uri->segment(3)));

					$this->session->set_flashdata('flash_message', array('status' => 'success', 'message' => 'Profil pengguna berhasil diperbaharui'));
					redirect(base_url('pengguna/sunting/'.$pengguna_id) ,'refresh');
				}
				else
				{
					$data['sub_judul'] = 'Sunting Pengguna';
					$data['pengguna'] = $pengguna;
					$this->template->pengguna('pengguna/sunting', $data);
				}
			}
			else
			{
				show_404();
			}
		}
		else
		{
			show_error('Anda tidak memiliki hak untuk melakukannya', 401 , 'Unauthorized action');
		}
	}

	public function hapus($pengguna_id = NULL)
	{
		if (aktif_sesi()['role'] == 'admin')
		{
			if ($this->pengguna_model->delete(array('id' => $pengguna_id)))
			{
				$this->session->set_flashdata('flash_message', array('status' => 'success', 'message' => 'Pengguna telah dihapus'));
			}
			else 
			{
				$this->session->set_flashdata('flash_message', array('status' => 'warning', 'message' => 'Gagal menghapus pengguna'));
			}
		}
		else
		{
			$this->session->set_flashdata('flash_message', array('status' => 'danger', 'message' => 'Anda tidak memiliki hak untuk melakukannya'));
		}

		redirect(base_url('pengguna/semua'), 'refresh');
	}

	public function semua()
	{
		$data['sub_judul'] = 'Daftar Pengguna';
		$data['pengguna'] = $this->pengguna_model->list();
		$this->template->pengguna('pengguna/semua', $data);
	}

	public function daftar()
	{
		if ($this->input->method(TRUE) == 'POST')
		{
			$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[pengguna.email]|required', array('is_unique' => 'Email sudah terdaftar'));
			$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');

			if ($this->form_validation->run() == TRUE) 
			{
				$this->pengguna_model->create(array(
					'role' => !empty($this->input->post('role'))?$this->input->post('role'):'petani',
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'nama_lengkap' => $this->input->post('full_name'),
					'alamat' => $this->input->post('alamat'),
					'status' => !empty($this->input->post('status'))?$this->input->post('status'):'aktif'
				));

				$this->session->set_flashdata('daftar', 'Pendaftaran berhasil!');
				redirect(base_url('pengguna/masuk'),'refresh');
			}
			else 
			{
				$data['sub_judul'] = 'Pendaftaran';
				$this->load->view('pengguna/daftar', $data);
			}
		}
		else
		{
			$data['sub_judul'] = 'Pendaftaran';
			$this->load->view('pengguna/daftar', $data);
		}
	}

	public function akun_bank($id = NULL)
	{
		$data['sub_judul'] = 'Nomor Rekening';
		if (!empty($id))
		{
			$data['akun_bank'] = $this->akun_bank_model->get_where(array('id' => $id));
			$this->template->pengguna('akun_bank/lihat', $data);
		}
		else
		{
			$data['akun_bank'] = $this->akun_bank_model->get_where(array('pengguna_id' => aktif_sesi()['id']));
			$this->template->pengguna('akun_bank/list', $data);
		}
	}

	public function tambah_akun_bank()
	{
		$data['sub_judul'] = 'Tambah Nomor Rekening';
		$data['bank_penerbit'] = $this->bank_penerbit;
		if ($this->input->method(TRUE) == 'POST')
		{
			$this->akun_bank_model->create(array(
				'pengguna_id' => aktif_sesi()['id'],
				'nomor_rekening' => $this->input->post('nomor_rekening'),
				'nama_pemilik' => $this->input->post('nama_pemilik'),
				'bank_penerbit' => $this->input->post('bank_penerbit')
			));

			$this->session->set_flashdata('flash_message', array('status' => 'success', 'message' => 'Nomor rekening telah ditambahkan'));
			redirect(base_url('pengguna/akun_bank'), 'refresh');
		}
		else
		{
			$this->template->pengguna('akun_bank/tambah', $data);
		}
	}

	public function sunting_akun_bank($id = NULL)
	{
		if ($this->input->method(TRUE) == 'POST')
		{
			$this->akun_bank_model->update(array(
				'nomor_rekening' => $this->input->post('nomor_rekening'),
				'nama_pemilik' => $this->input->post('nama_pemilik'),
				'bank_penerbit' => $this->input->post('bank_penerbit')
			), array('id' => $id));

			$this->session->set_flashdata('flash_message', array('status' => 'success', 'message' => 'Nomor rekening telah diperbaharui'));
			redirect(base_url('pengguna/akun_bank'), 'refresh');
		}
		else
		{
			$data['sub_judul'] = 'Sunting Nomor Rekening';
			$data['bank_penerbit'] = $this->bank_penerbit;
			$data['akun_bank'] = $this->akun_bank_model->view($id);
			$this->template->pengguna('akun_bank/sunting', $data);
		}
	}

	public function masuk()
	{
		if ($this->input->method(TRUE) == 'POST')
		{
			$this->form_validation->set_rules('identity', 'Email / Nama Pengguna', 'trim|required');
			$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');

			if ($this->form_validation->run() == TRUE) 
			{
				$masuk = $this->pengguna_model->sign_in($this->input->post('identity'), $this->input->post('password'));

				if (!empty($masuk))
				{
					switch ($masuk['status'])
					{
						case 'aktif':
							$this->session->set_userdata('pengguna', $masuk['id']);
							redirect(base_url(),'refresh');
						break;

						case 'non-aktif':
							$this->session->set_flashdata('masuk', 'Akun anda tidak aktif, silahkan hubungi admin');
							redirect(base_url('pengguna/masuk'),'refresh');
						break;
						
						default:
							$this->session->set_flashdata('masuk', 'Akun anda diblokir, silahkan hubungi admin');
							redirect(base_url('pengguna/masuk'),'refresh');
						break;
					}
				}
				else
				{
					$this->session->set_flashdata('masuk', 'Email / Kata Sandi yang digunakan tidak sesuai');
					redirect(base_url('pengguna/masuk'),'refresh');
				}
			}
			else
			{
				$data['sub_judul'] = 'Masuk';
				$this->load->view('pengguna/masuk', $data);
			}
		}
		else
		{
			$data['sub_judul'] = 'Masuk';
			$this->load->view('pengguna/masuk', $data);
		}
	}

	public function keluar()
	{
		session_destroy();
		redirect(base_url('pengguna/masuk'),'refresh');
	}
}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */