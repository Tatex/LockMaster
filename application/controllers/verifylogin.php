<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('tunnus', 'Username', 'trim|required');
   $this->form_validation->set_rules('salasana', 'Password', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login/login_view');
   }
   else
   {
     //Go to private area
     redirect('Etusivu', 'refresh');
   }
 
 }
 
 function check_database($salasana)
 {
   //Field validation succeeded.  Validate against database
   $tunnus = $this->input->post('tunnus');
 
   //query the database
   $result = $this->user->login($tunnus, $salasana);

   if($result)
   {
    // Set user data to session array to be used on the frontpage
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id_webtiedot' => $row->id_webtiedot,
         'tunnus' => $row->tunnus,
         'etunimi' => $row->etunimi,
         'sukunimi' => $row->sukunimi
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return true;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');

     return false;
   }
 }
}
?>