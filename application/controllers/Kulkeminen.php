<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kulkeminen extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kulkeminen_model');
	}
 
 	function nayta_kulkemiset()
 	{
	   if($this->session->userdata('logged_in')) {
	   		$data['kulkemiset']=$this->Kulkeminen_model->getKulkemiset();
		    $data['page_content']='kulkeminen/historia';
			$this->load->view('menu/content',$data);
	   } else {
	    	//If no session, redirect to login page
	    	redirect('login', 'refresh');
	   }
 	}

 	function paivita_halytys()
 	{
 		
 	}
}