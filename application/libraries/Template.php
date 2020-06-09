<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function pengguna($page = '', $data = array())
	{
		$data['page'] = $this->ci->load->view('pengguna/'.$page, $data, TRUE);
		$this->ci->load->view('pengguna/base', $data);
	}
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */