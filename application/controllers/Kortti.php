<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kortti extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kortti_model');
		$this->load->helper('url');
	}
 
 	function nayta_kortit()
 	{
	   if($this->session->userdata('logged_in')) {
	   		$this->load->model('Asiakas_model');
	   		$data['vapaatKortit'] = $this->Asiakas_model->getVapaatKortit();

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
 			$pinBtn = $this->input->post('pinSaveBtn');
 			$newPin = $this->input->post('textNewPin');

 			// Painetaan aktivoitu-painiketta
 			if (isset($deakt))
 			{
 				// Haetaan kortin id-numero buttonin keyn avulla
 				$id_kortti = $id[key($deakt)];
 				
 				$testi = $this->Kortti_model->updateKortti(0,$id_kortti);

 				redirect('kortti/nayta_kortit');
 			}

 			// Painetaan deaktivoitu-painiketta
 			if (isset($akt))
 			{
 				// Haetaan kortin id-numero buttonin keyn avulla
 				$id_kortti = $id[key($akt)];
 
 				$testi = $this->Kortti_model->updateKortti(1,$id_kortti);

 				redirect('kortti/nayta_kortit');

 			}

 			if (isset($pinBtn))
 			{
 				// Haetaan kortin id-numero buttonin keyn avulla
 				$id_kortti = $id[key($pinBtn)];
 				$uusiPin = $newPin[key($pinBtn)];

 				$testi = $this->Kortti_model->updatePin($uusiPin,$id_kortti);

 				$this->session->set_flashdata('success_msg','success');
 				redirect('kortti/nayta_kortit');
 			}

		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
 	}
}