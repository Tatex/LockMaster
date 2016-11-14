<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kortti extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
 
 	function kortit()
 	{
	   if($this->session->userdata('logged_in')) {

		    $data['page_content']='kortti/status';
			$this->load->view('menu/content',$data);
	   } else {
	    	//If no session, redirect to login page
	    	redirect('login', 'refresh');
	   }
 	}
}