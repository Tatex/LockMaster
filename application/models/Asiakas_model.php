<?php
class Asiakas_model extends CI_Model {

	public function getAsiakas() {
		$this->db->select('id_asiakas,etunimi,sukunimi,osoite,puh,email');
		$this->db->from('asiakkaat');
		return $this->db->get()->result_array();
	} 

	public function getKaytetytKortit() {
		$this->db->select('kortti.id_kortti');
		$this->db->from('asiakkaat');
		$this->db->join('kortti','kortti.id_kortti=asiakkaat.id_kortti');
		return $this->db->get()->result_array();
	}

	public function getKaikkiKortit() {
		$this->db->select('id_kortti');
		$this->db->from('kortti');
		return $this->db->get()->result_array();
	}

	public function addAsiakas($lisaa_asiakas) {
		$this->db->set($lisaa_asiakas);
		$this->db->insert('asiakkaat');
		$testi=$this->db->affected_rows();
		return $testi;
	}

	public function delAsiakas($id) {
		$this->db->where('id_asiakas',$id);
		$this->db->delete('asiakkaat');
		$testi=$this->db->affected_rows();
		return $testi;
	}

	public function updateAsiakas($update_data,$id) {
		$this->db->where('id_asiakas',$id);
		$this->db->update('asiakkaat',$update_data);
		$testi=$this->db->affected_rows();
		return $testi;
	}
}