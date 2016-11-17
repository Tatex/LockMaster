<?php
class Asiakas_model extends CI_Model {

	public function getAsiakas() {
		$this->db->select('id_asiakas,etunimi,sukunimi,osoite,puh,email');
		$this->db->from('asiakkaat');
		return $this->db->get()->result_array();
	} 

	public function getVapaatKortit() {
		$this->db->select('id_kortti');
		$this->db->from('kortti');
		$kaikkiKortit = $this->db->get()->result_array();

		// Muutetaan moniulotteinen kaikkiKortit-taulukko yksiulotteiseksi tmpKaikki-taulukoksi
		foreach($kaikkiKortit as $subArray){
		    foreach($subArray as $val){
		        $tmpKaikki[] = $val;
		    }
		}

		$this->db->select('kortti.id_kortti');
		$this->db->from('asiakkaat');
		$this->db->join('kortti','kortti.id_kortti=asiakkaat.id_kortti');
		$kaytetytKortit = $this->db->get()->result_array();

		// Muutetaan moniulotteinen kaikkiKortit-taulukko yksiulotteiseksi tmpKaikki-taulukoksi
		foreach($kaytetytKortit as $subArray){
		    foreach($subArray as $val) {
		        $tmpKaytetyt[] = $val;
		    }
		}

		// Verrataan taulukkoja ja poistetaan yhteiset tietueet (eli jäljelle jää ne korttien id:t, jotka eivät ole vielä asiakkailla käytössä)
		$vapaatKortit = array_diff($tmpKaikki,$tmpKaytetyt);

		return $vapaatKortit;
	}

	public function addAsiakas($lisaa_asiakas,$korttidata) {
		$this->db->set($lisaa_asiakas);
		$this->db->insert('asiakkaat');
		$testi=$this->db->affected_rows();

		// Muokkaa kortin pin-koodia
		if ($testi) {
			$this->db->where('id_kortti',$korttidata['id_kortti']);
			$this->db->update('kortti',$korttidata);
			$testi=$this->db->affected_rows();
		}

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