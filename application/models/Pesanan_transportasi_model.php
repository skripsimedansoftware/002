<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_transportasi_model extends CI_Model {

	/**
	 * Get where
	 */
	public function get_where(array $where)
	{
		$pesanan_transportasi = $this->db->get_where('pesanan_transportasi', $where);

		if ($pesanan_transportasi->num_rows() > 0)
		{
			return $pesanan_transportasi->result_array();
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
		return $this->db->count_all('pesanan_transportasi');
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
		$this->db->from('pesanan_transportasi');
		return $this->db->count_all_results();
	}

	/**
	 * List Data
	 * 
	 * @return array
	 */
	public function list()
	{
		$pesanan_transportasi = $this->db->get('pesanan_transportasi');
		
		if ($pesanan_transportasi->num_rows() > 0)
		{
			return $pesanan_transportasi->result_array();
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
		return $this->db->insert('pesanan_transportasi', $data);
	}

	/**
	 * View Data
	 * 
	 * @param  integer $id
	 * @return boolean on fail
	 */
	public function view($id)
	{
		$pesanan_transportasi = $this->db->get_where('pesanan_transportasi', array('id' => $id));

		if ($pesanan_transportasi->num_rows() >= 1)
		{
			return $pesanan_transportasi->row_array();
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
		return $this->db->update('pesanan_transportasi', $data, $where);
	}

	/**
	 * Menghapus Data
	 * 
	 * @param  array  $where
	 * @return boolean
	 */
	public function delete(array $where)
	{
		return $this->db->delete('pesanan_transportasi', $where);
	}
}

/* End of file Pesanan_transportasi_model.php */
/* Location: ./application/models/Pesanan_transportasi_model.php */