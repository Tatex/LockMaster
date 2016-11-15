<?php
class Kulkeminen_model extends CI_Model {

	public function getKulkemiset() {
		$this->db->select('*');
		$this->db->from('kulkeminen');
		$this->db->join('asiakkaat','kulkeminen.id_asiakas = asiakkaat.id_asiakas');
		return $this->db->get()->result_array();
	} 
}