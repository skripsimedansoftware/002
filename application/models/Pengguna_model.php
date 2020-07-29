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
		$this->db->or_where('username =', $identity, TRUE);
		$this->db->or_where('seluler =', $identity, TRUE);
		$pengguna = $this->db->get('pengguna');

		if ($pengguna->num_rows() >= 1)
		{
			if ($pengguna->row()->password == md5($password))
			{
				return $pengguna->row_array();
			}
		}

		return FALSE;
	}

	public function pesanan_transportasi($sopir_id = NULL)
	{
		$kendaraan_pengemudi = $this->db->get_where('transportasi', array('pengemudi' => $sopir_id));

		$transportasi = array();

		if ($kendaraan_pengemudi->num_rows() > 0) 
		{
			foreach ($kendaraan_pengemudi->result_array() as $value) 
			{
				array_push($transportasi, $value['id']);
			}
		}

		if (!empty($transportasi)) 
		{			
			$this->db->where_in('transportasi_id', $transportasi);
			$this->db->where_in('status', array('konfirmasi', 'proses', 'selesai'));
			$pesanan_transportasi = $this->db->get('pesanan_transportasi');

			if ($pesanan_transportasi->num_rows() > 0)
			{
				return $pesanan_transportasi->result_array();
			}
		}


		return array();
	}
}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */