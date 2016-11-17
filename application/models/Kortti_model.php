<?php
class Kortti_model extends CI_Model {

	public function getKortti() {
		$this->db->select('id_asiakas,kortti.id_kortti,etunimi,sukunimi,puh,email,nro,aktivoitu,pinkoodi');
		$this->db->from('kortti');
		$this->db->join('asiakkaat','kortti.id_kortti = asiakkaat.id_kortti');
		return $this->db->get()->result_array();
	} 

	public function updateKortti($active,$id) {
		$data = array(
			'aktivoitu' => $active);

		$this->db->where('id_kortti',$id);
		$this->db->update('kortti',$data);
		$testi=$this->db->affected_rows();
		return $testi;
	}

	public function updatePin($pin,$id) {
		$data = array(
			'pinkoodi' => $pin);

		$this->db->where('id_kortti',$id);
		$this->db->update('kortti',$data);
		$testi=$this->db->affected_rows();
		return $testi;
	}

	public function updateAsiakas($update_data,$id) {
		$this->db->where('id_kortti',$id);
		$this->db->update('asiakkaat',$update_data);
		$testi=$this->db->affected_rows();
		return $testi;
	}
}