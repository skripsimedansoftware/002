<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	/**
	 * @param numeric
	 */
	public function set_upah_angkut($harga = NULL) {
		$where = array('name' => 'upah_angkut');

		$setting = $this->db->get_where('setting', $where);
		
		if ($setting->num_rows() >= 1) {
			return $this->db->update('setting', array('value' => $harga), $where);
		} else {
			return $this->db->insert('setting', array_merge($where, array('value' => $harga)));
		}
	}

	/**
	 * @param numeric
	 */
	public function set_harga_sawit($harga = NULL) {
		$where = array('name' => 'harga_sawit');

		$setting = $this->db->get_where('setting', $where);
		
		if ($setting->num_rows() >= 1) {
			return $this->db->update('setting', array('value' => $harga), $where);
		} else {
			return $this->db->insert('setting', array_merge($where, array('value' => $harga)));
		}
	}

	public function get_upah_angkut() {
		$where = array('name' => 'upah_angkut');

		$setting = $this->db->get_where('setting', $where);
		
		if ($setting->num_rows() >= 1) {
			return $setting->row_array();
		}

		return FALSE;
	}

	public function get_harga_sawit() {
		$where = array('name' => 'harga_sawit');

		$setting = $this->db->get_where('setting', $where);
		
		if ($setting->num_rows() >= 1) {
			return $setting->row_array();
		}

		return FALSE;
	}

}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */