<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_bank_model extends CI_Model {

	/**
	 * Get where
	 */
	public function get_where(array $where)
	{
		$akun_bank = $this->db->get_where('akun_bank', $where);

		if ($akun_bank->num_rows() > 0)
		{
			return $akun_bank->result_array();
		}

		return array();
	}

	/**
	 * Count all
	 * 
	 * @return integer
	 */
	public function count_all()
	{
		return $this->db->count_all('akun_bank');
	}

	/**
	 * Count where
	 * 
	 * @param  array  $where
	 * @return integer
	 */
	public function count_where($where = array())
	{
		$this->db->where($where);
		$this->db->from('akun_bank');
		return $this->db->count_all_results();
	}

	/**
	 * List Data
	 * 
	 * @return array
	 */
	public function list()
	{
		$akun_bank = $this->db->get('akun_bank');
		
		if ($akun_bank->num_rows() > 0)
		{
			return $akun_bank->result_array();
		}

		return array();
	}

	/**
	 * Create Data
	 * 
	 * @param  array  $data
	 * @return boolean
	 */
	public function create(array $data)
	{
		return $this->db->insert('akun_bank', $data);
	}

	/**
	 * View Data
	 * 
	 * @param  integer $id
	 * @return boolean on fail
	 */
	public function view($id)
	{
		$akun_bank = $this->db->get_where('akun_bank', array('id' => $id));

		if ($akun_bank->num_rows() >= 1)
		{
			return $akun_bank->row_array();
		}

		return FALSE;
	}

	/**
	 * Update Data
	 * 
	 * @param  array  $data
	 * @param  array  $where
	 * @return boolean
	 */
	public function update(array $data, array $where)
	{
		return $this->db->update('akun_bank', $data, $where);
	}

	/**
	 * Menghapus Data
	 * 
	 * @param  array  $where
	 * @return boolean
	 */
	public function delete(array $where)
	{
		return $this->db->delete('akun_bank', $where);
	}	

}

/* End of file Akun_bank_model.php */
/* Location: ./application/models/Akun_bank_model.php */