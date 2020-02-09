<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
	
class Login_Api extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->database();
		$this->load->model('Login_model');
	}
	
	//Menampilkan data kontak
	function index_get()
	{
		$id = $this->get('id');
		if($id == ''){
			$login = $this->Login_model->getAllUsers();
		} else {
			$this->db->where('id', $id);
			$login = $this->Login_model->getAllUsers();
		}
		$this->response($login, 200);
	}
	
	//Menampilkan data kontak
	function logins_get()
	{
		$id = $this->get('id');
		if($id == ''){
			$login = $this->Login_model->getAllUsers_email();
		} else {
			$this->db->where('id', $id);
			$login = $this->Login_model->getAllUsers_email();
		}
		$this->response($login, 200);
	}
	
	//Menampilkan data kontak
	function logins_post()
	{
		$email = $this->post('email');
        $password = $this->post('password');
        $user="";
		
        if ($this->Login_model->getAllUsers_id($email, $password)){
			$user=1;
        }else{
			$user=0;
        }
		
		if ($user){
		   $user = $this->Login_model->getAllUsers_id($email, $password);
			// Set the response and exit
			$this->response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}else{
			// Set the response and exit
			$this->response($user, REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
			
		//$this->response($login, 200);
	}
	
	 public function loginess_post(){
      $this->load->library('ion_auth');
         //TI1021399
        // $username = $this->post('email');
        // $password = $this->post('password');

        $identity = $this->post('email');
        $password = $this->post('password');
        $remember = TRUE; // remember the user
        $user="";
        if ($this->ion_auth->login($identity, $password, $remember)){
               $user=1;
        }else{
           $user=0;
        }
      
       if ($user)
            {
               $user =$this->ion_auth->user()->row();
                // Set the response and exit
                $this->response($user,REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
				$user = "Data Tidak Ditemukan!";
                // Set the response and exit
                $this->response($user,REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
    }
	
	//Mengirim atau menambah data kontak baru
	function jabatan_post(){
		
		$email = $this->post('email');
		$password = $this->post('password');
		
		if(($email == '')&&($password == '')){
			$login = $this->Login_model->getAllUsers();
		} else {
			
			$login = $this->Login_model->getAllUsers_id($email, $password);
		}
		$this->response($login, 200);
		
	}
}
?>