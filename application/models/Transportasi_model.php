<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transportasi_model extends CI_Model {

	/**
	 * Get where
	 */
	public function get_where(array $where)
	{
		$transportasi = $this->db->get_where('transportasi', $where);

		if ($transportasi->num_rows() > 0)
		{
			return $transportasi->result_array();
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
		return $this->db->count_all('transportasi');
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
		$this->db->from('transportasi');
		return $this->db->count_all_results();
	}

	/**
	 * List Data
	 * 
	 * @return array
	 */
	public function list()
	{
		$transportasi = $this->db->get('transportasi');
		
		if ($transportasi->num_rows() > 0)
		{
			return $transportasi->result_array();
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
		return $this->db->insert('transportasi', $data);
	}

	/**
	 * View Data
	 * 
	 * @param  integer $id
	 * @return boolean on fail
	 */
	public function view($id)
	{
		$transportasi = $this->db->get_where('transportasi', array('id' => $id));

		if ($transportasi->num_rows() >= 1)
		{
			return $transportasi->row_array();
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
		return $this->db->update('transportasi', $data, $where);
	}

	/**
	 * Menghapus Data
	 * 
	 * @param  array  $where
	 * @return boolean
	 */
	public function delete(array $where)
	{
		return $this->db->delete('transportasi', $where);
	}
}

/* End of file Transportasi_model.php */
/* Location: ./application/models/Transportasi_model.php */