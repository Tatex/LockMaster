<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asiakas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Asiakas_model');
        $this->load->library('user_agent');
        $this->load->helper('url');
    }

public function lisaa() {
	if($this->session->userdata('logged_in')) {
		$data['kaikkiKortit']=$this->Asiakas_model->getKaikkiKortit();
		$data['kaytetytKortit']=$this->Asiakas_model->getKaytetytKortit();
		
		$btn=$this->input->post('btnTallenna');

		$lisaa_asiakas=array(
			"etunimi"=>$this->input->post('en'),
			"sukunimi"=>$this->input->post('sn'),
			"email"=>$this->input->post('em'),
			"osoite"=>$this->input->post('os'),
			"puh"=>$this->input->post('puh')
			);

		$kortti = $this->input->post('kortti_id');
		$pinkoodi = $this->input->post('pin');

		if(isset($btn)) {
			//Tarkistaa, että pin-koodi syötetään nelinumeroisena lukuna
			if($pincode >= 1000 && $pincode < 9999) {
				$lisays=$this->Asiakas_model->addAsiakas($lisaa_asiakas);
				if($lisays>0) {
					// Asetetaan success-viesti, jolla ilmotetaan onnistuneesta poistosta
					$this->session->set_flashdata('success_msg','success');
					redirect('asiakas/lisaa');
				} else {
					echo '<script>alert("Lisäys epäonnistui")</script>';
				}
			} else {
				echo '<script>alert("Pin-koodi väärä, syötä luku väliltä 1000 - 9999.")</script>';
			}
		}

		$data['page_content']='asiakas/lisaa';
		$this->load->view('menu/content',$data);
	} else {
		//If no session, redirect to login page
		redirect('login', 'refresh');
	}
}

public function nayta_muokattavat_asiakkaat() {
	if($this->session->userdata('logged_in')) {
		$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
		$data['page_content']='asiakas/nayta_muokattavat_asiakkaat';
		$this->load->view('menu/content',$data);
	} else {
		//If no session, redirect to login page
		redirect('login', 'refresh');
	}
}

public function paivita_asiakkaat() {
	if($this->session->userdata('logged_in')) {
		$btn=$this->input->post('btnTallenna');
		//jos tallenna-painiketta painettu
		if (isset($btn))
		 {
			$id=$this->input->post('id');
			$enimi=$this->input->post('en');
			$snimi=$this->input->post('sn');
			$email=$this->input->post('email');
			$osoite=$this->input->post('os');
			$puh=$this->input->post('puh');

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
					"email"=>$email[$x],
					"osoite"=>$osoite[$x],
					"puh"=>$puh[$x]
					);
				$testi= $this->Asiakas_model->updateAsiakas($update_data,$id[$x]);
			}

			// Asetetaan success-viesti, jolla ilmotetaan onnistuneesta tietokantalisäyksestä
			$this->session->set_flashdata('success_msg','success');
			redirect('asiakas/nayta_muokattavat_asiakkaat');
		}
	} else {
		//If no session, redirect to login page
		redirect('login', 'refresh');
	}
}

public function poista($id) {
	if($this->session->userdata('logged_in')) {
		$poista=$this->Asiakas_model->delAsiakas($id);

		// Asetetaan success-viesti, jolla ilmotetaan onnistuneesta poistosta
		$this->session->set_flashdata('success_msg','deleted');
		redirect('asiakas/nayta_muokattavat_asiakkaat');
	} else {
		//If no session, redirect to login page
		redirect('login', 'refresh');
	}
}

}