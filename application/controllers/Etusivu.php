<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Etusivu extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
 
 	function index()
 	{
	   if($this->session->userdata('logged_in')) {
		    $session_data = $this->session->userdata('logged_in');
		    $data['tunnus'] = $session_data['tunnus'];
		    $data['etunimi'] = $session_data['etunimi'];
		    $data['sukunimi'] = $session_data['sukunimi'];
		    $data['page_content']='etusivu/index';
			$this->load->view('menu/content',$data);
	   } else {
	    	//If no session, redirect to login page
	    	redirect('login', 'refresh');
	   }
 	}
 
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('etusivu', 'refresh');
	}
}