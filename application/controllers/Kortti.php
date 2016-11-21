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
 			$cardBtn = $this->input->post('cardSaveBtn');
 			$cardSelect = $this->input->post('korttiSelector');
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

 			// Painetaan tallenna-painiketta kortin vaihdossa
 			if (isset($cardBtn))
 			{
 				// Haetaan kortin id-numero buttonin keyn avulla
 				$id_kortti = $id[key($cardBtn)];
 				$id_uusi_kortti = $cardSelect[key($cardBtn)];

 				$update_data= array(
					"id_kortti"=>$id_uusi_kortti
					);

 				$testi = $this->Kortti_model->updateAsiakas($update_data,$id_kortti);

 				$this->session->set_flashdata('success_msg','success');
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
 	public function lisaakortti(){

 		if($this->session->userdata('logged_in')) {

 			$btn2 = $this->input->post('btnTallennakortti');

 			$lisaa_kortti=array(
 				"nro"=>$this->input->post('num'),
 				"pinkoodi"=>$this->input->post('pincode'),
 				
 				
 				);
 		if (isset($btn2))

 		{
 			if($lisaa_kortti['pinkoodi']>=1000 && $lisaa_kortti['pinkoodi'] < 9999){

 				$lisays2=$this->Kortti_model->addKortti($lisaa_kortti);

 				echo '<script>alert("Kortin lisäys onnistui")</script>';

 			}

 			else{

 				echo '<script>alert("Pin-koodi väärä, syötä luku väliltä 1000 - 9999.")</script>';
 			}
 		}

 		$data['page_content']='kortti/lisaakortti';
		$this->load->view('menu/content',$data);
 	}
}
}