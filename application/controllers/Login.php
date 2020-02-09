<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

	public function index()
	{
		$this->load->view('login_vw');
	}
/*
	public function aksi_login(){

		$identity                = $this->input->post('identity');
        $password          = $this->input->post('password');
        $ldap['user'] = $identity;
        $ldap['pass'] = $password;
$ldap['host']   = '10.250.0.254';
$ldap['port']   = 389;

$ldap['conn'] = ldap_connect( $ldap['host'], $ldap['port'] )
	or die("Could not conenct to {$ldap['host']}" );

ldap_set_option($ldap['conn'], LDAP_OPT_PROTOCOL_VERSION, 3);
$bind = ldap_bind($ldap['conn'], $ldap['user'], $ldap['pass']);
   if ($bind) {
        $filter="(sAMAccountName=$identity)";
        $result = ldap_search($ldap,"dc=skvgroup,dc=id",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            var_dump($info);
            echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 
        }
        @ldap_close($ldap);
    } else {
        $msg = "Invalid email address / password";
        echo $msg;
    }
    }


    */
public function aksi_login(){
    
    $username = $_POST['identity'];
    $password = $_POST['password'];
   


    $ldap['user'] = $username;
$ldap['pass'] = $password;
$ldap['host']   = '10.250.0.254';
$ldap['port']   = 389;

$ldap['conn'] = ldap_connect( $ldap['host'], $ldap['port'] )
	or die("Could not conenct to {$ldap['host']}" );

ldap_set_option($ldap['conn'], LDAP_OPT_PROTOCOL_VERSION, 3);
$bind = ldap_bind($ldap['conn'], $ldap['user'], $ldap['pass']);

    if ($bind) {
        /*
        $filter="(sAMAccountName=$username)";
        

        $result = ldap_search($ldap['conn'],"dc=skvgroup,dc=id",$filter);
        

        @ldap_sort($ldap['conn'],$result,"sn");
        $info = ldap_get_entries($ldap['conn'], $result);
       



        for ($i=0; $i<count($info); $i++)
        {


            if(count($info) > 1)
                break;
            
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            
            echo '</pre>';
            


            
            $userDn = $info[$i]["distinguishedname"][0]; 


        }
        
        
        */
ldap_close($ldap['conn']);
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() === TRUE)
        {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                
            }
        }


         redirect('beranda');
    } else {

        $this->session->set_flashdata('message', $this->ion_auth->errors());
                echo $this->session->set_flashdata('message', '<div class="alert alert-success alert-block">Username atau Password salah</div>');
                redirect('Login_User', 'refresh');
    }
}
}
