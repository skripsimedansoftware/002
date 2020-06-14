<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function index()
	{
		// $now = time();
		// $human = unix_to_human($now);
		// $unix = human_to_unix('2020-05-13 08:08 PM');

		// echo $human.'<br>';
		// echo $unix.'<br>';

		// echo nice_date($human, 'd-m-Y');

		// $this->calendar->
		echo "<pre>";
		print_r ($this->calendar->get_day_names('short'));
		echo "</pre>";
	}

}

/* End of file Testing.php */
/* Location: ./application/controllers/Testing.php */