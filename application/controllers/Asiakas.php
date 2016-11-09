<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asiakas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Asiakas_model');
    }


public function listaa() {
	$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
	$data['sivun_sisalto']='asiakas/listaa';
	$this->load->view('menu/sisalto',$data);
}

public function lisaa() {
	$btn=$this->input->post('btnTallenna');
	$lisaa_asiakas=array(
		"etunimi"=>$this->input->post('en'),
		"sukunimi"=>$this->input->post('sn'),
		"email"=>$this->input->post('em')
		);
	if(isset($btn)) {
			$lisays=$this->Asiakas_model->addAsiakas($lisaa_asiakas);
			if($lisays>0) {
				echo '<script>alert("Lisäys onnistui")</script>';
			}
	}
	$data['sivun_sisalto']='asiakas/lisaa';
	$this->load->view('menu/sisalto',$data);
}

public function nayta_poistettavat() {
	$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
	$data['sivun_sisalto']='asiakas/poista';
	$this->load->view('menu/sisalto',$data);
}

public function poista($id) {
	$poista=$this->Asiakas_model->delAsiakas($id);
	if($poista>0) {
		echo '<script>alert("Poisto onnistui")</script>';
	}

	$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
	$data['sivun_sisalto']='asiakas/listaa';
	$this->load->view('menu/sisalto',$data);
}

public function etsi_tilaus() {
	$id=$this->input->post('valittu_id');
	$btn=$this->input->post('btnEtsi');

	$this->load->model('Tilaus_model');
	$data['asiakkaat']=$this->Asiakas_model->getAsiakas();

	if(isset($btn)) {
		$data['tilaus']=$this->Tilaus_model->searchTilaus($id);
	}
	$data['sivun_sisalto']='asiakas/etsi_tilaus';
	$this->load->view('menu/sisalto',$data);
}

public function nayta_muokattavat_asiakkaat() {
	$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
	$data['sivun_sisalto']='asiakas/nayta_muokattavat_asiakkaat';
	$this->load->view('menu/sisalto',$data);
}

public function paivita_asiakkaat() {
	$btn=$this->input->post('btnTallenna');
	//jos tallenna painiketta painettu
	if (isset($btn))
	 {
		$id=$this->input->post('id');
		$enimi=$this->input->post('en');
		$snimi=$this->input->post('sn');
		$email=$this->input->post('email');

		//lasketaan rivit
		$lkm=0;
		foreach ($id as $rivi) {
			$lkm++;
		}
		//päivitetaan tietokantaa rivi kerrallaan
		for ($x=0; $x<$lkm; $x++) {
			$update_data= array(
				"etunimi"=>$enimi[$x],
				"sukunimi"=>$snimi[$x],
				"email"=>$email[$x]
				);
			$testi= $this->Asiakas_model->updateAsiakas($update_data,$id[$x]);
		}
		$this->listaa();
	}
}

public function nayta_muokattava_asiakas($id) {
	$data['asiakas']=$this->Asiakas_model->getValittuAsiakas($id);
	$data['sivun_sisalto']='asiakas/nayta_muokattava_asiakas';
	$this->load->view('menu/sisalto',$data);
}

public function paivita_asiakas(){
	$btn=$this->input->post('btnTallenna');
	//jos tallenna painiketta painettu
	if(isset($btn))
	 {
	 	$id=$this->input->post('id');
		$update_data = array(
		"etunimi"=>$this->input->post('en'),
		"sukunimi"=>$this->input->post('sn'),
		"email"=>$this->input->post('email')
		);
		 $testi= $this->Asiakas_model->updateAsiakas($update_data,$id);
		 $this->listaa();
	}

}

}