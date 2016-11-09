<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tilaus extends CI_Controller {

	public function listaa() {
	$this->load->model('Tilaus_model');
	$data['tilaukset']=$this->Tilaus_model->getTilaus();
	$data['sivun_sisalto']='tilaus/listaa';
	$this->load->view('menu/sisalto',$data);
	}

}