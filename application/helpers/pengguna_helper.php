<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package Codeigniter
 * @subpackage Pengguna
 * @category Helper
 * @author Agung Dirgantara <agungmasda29@gmail.com>
 */

function aktif_sesi()
{
	$ci =& get_instance();
	return $ci->pengguna_model->view($ci->session->userdata('pengguna'));
}

function view_user($id = NULL)
{
	$ci =& get_instance();
	return $ci->pengguna_model->view($id);
}

/* End of file pengguna_helper.php */
/* Location : ./application/helpers/pengguna_helper.php */