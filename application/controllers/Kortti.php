<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kortti extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kortti_model');
	}
 
 	function nayta_kortit()
 	{
	   if($this->session->userdata('logged_in')) {
	   		$data['kortit']=$this->Kortti_model->getKortti();
		    $data['page_content']='kortti/status';
			$this->load->view('menu/content',$data);
	   } else {
	    	//If no session, redirect to login page
	    	redirect('login', 'refresh');
	   }
 	}

 	function paivita_kortit()
 	{
 		if($this->session->userdata('logged_in')) {		
 			$deakt = $this->input->post('btnDeaktivoi');
 			$akt = $this->input->post('btnAktivoi');
 			$id = $this->input->post('id');

 			// Painetaan aktivoitu-painiketta
 			if (isset($deakt))
 			{
 				// Haetaan asiakkaan id-numero hidden-riviltä
 				$id_asiakas = $id[key($deakt)];
 				
 				$testi = $this->Kortti_model->updateKortti(0,$id_asiakas);

 				redirect('kortti/nayta_kortit');
 			}

 			// Painetaan deaktivoitu-painiketta
 			if (isset($akt))
 			{
 				// Haetaan asiakkaan id-numero hidden-riviltä
 				$id_asiakas = $id[key($akt)];
 				
 				$testi = $this->Kortti_model->updateKortti(1,$id_asiakas);

 				redirect('kortti/nayta_kortit');

 			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
 	}
}