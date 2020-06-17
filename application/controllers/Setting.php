<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('pengguna')))
		{
			redirect(base_url('pengguna/daftar'),'refresh');
		}
	}

	public function index()
	{
		if ($this->input->method(TRUE) == 'POST') 
		{
			$this->form_validation->set_rules('upah_angkut', 'Upah Angkut', 'trim|numeric|required');
			$this->form_validation->set_rules('harga_sawit', 'Harga Sawit', 'trim|numeric|required');

			if ($this->form_validation->run() == TRUE)
			{
				$this->setting_model->set_upah_angkut($this->input->post('upah_angkut'));
				$this->setting_model->set_harga_sawit($this->input->post('harga_sawit'));

				redirect(base_url('setting'), 'refresh');
			}
			else
			{
				$data['sub_judul'] = 'Pengaturan';
				$data['upah_angkut'] = $this->setting_model->get_upah_angkut();
				$data['harga_sawit'] = $this->setting_model->get_harga_sawit();
				$this->template->pengguna('pengguna/setting', $data);
			}
		}
		else
		{
			$data['sub_judul'] = 'Pengaturan';
			$data['upah_angkut'] = $this->setting_model->get_upah_angkut();
			$data['harga_sawit'] = $this->setting_model->get_harga_sawit();
			$this->template->pengguna('pengguna/setting', $data);
		}
	}
}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */