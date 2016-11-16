<?php
class Kortti_model extends CI_Model {

	public function getKortti() {
		$this->db->select('id_asiakas,etunimi,sukunimi,puh,aktivoitu,pinkoodi, email');
		$this->db->from('asiakkaat');
		return $this->db->get()->result_array();
	} 

	public function updateKortti($active,$id) {
		$data = array(
			'aktivoitu' => $active);

		$this->db->where('id_asiakas',$id);
		$this->db->update('asiakkaat',$data);
		$testi=$this->db->affected_rows();
		return $testi;
	}

	public function updatePin($pin,$id) {
		$data = array(
			'pinkoodi' => $pin);

		$this->db->where('id_asiakas',$id);
		$this->db->update('asiakkaat',$data);
		$testi=$this->db->affected_rows();
		return $testi;
	}
}