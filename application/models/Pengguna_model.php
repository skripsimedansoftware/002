<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	/**
	 * Get where
	 */
	public function get_where(array $where)
	{
		$pengguna = $this->db->get_where('pengguna', $where);

		if ($pengguna->num_rows() > 0)
		{
			return $pengguna->result_array();
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
		return $this->db->count_all('pengguna');
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
		$this->db->from('pengguna');
		return $this->db->count_all_results();
	}

	/**
	 * List Data
	 * 
	 * @return array
	 */
	public function list()
	{
		$pengguna = $this->db->get('pengguna');
		
		if ($pengguna->num_rows() > 0)
		{
			return $pengguna->result_array();
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
		return $this->db->insert('pengguna', $data);
	}

	/**
	 * View Data
	 * 
	 * @param  integer $id
	 * @return boolean on fail
	 */
	public function view($id)
	{
		$pengguna = $this->db->get_where('pengguna', array('id' => $id));

		if ($pengguna->num_rows() >= 1)
		{
			return $pengguna->row_array();
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
		return $this->db->update('pengguna', $data, $where);
	}

	/**
	 * Menghapus Data
	 * 
	 * @param  array  $where
	 * @return boolean
	 */
	public function delete(array $where)
	{
		return $this->db->delete('pengguna', $where);
	}

	/**
	 * Sign In
	 * 
	 * @param  string $identity
	 * @param  string $password
	 * @return boolean on fail
	 */
	public function sign_in($identity, $password)
	{
		$this->db->where('email', $identity);
		$this->db->where('password', md5($password));
		$this->db->or_where('username', $identity);
		$this->db->or_where('seluler', $identity);

		$pengguna = $this->db->get('pengguna');

		if ($pengguna->num_rows() >= 1)
		{
			return $pengguna->row_array();
		}

		return FALSE;
	}
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */