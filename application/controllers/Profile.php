<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()){ redirect('login');}
		$this->load->model('Profile_model'); 
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}
	
	public function index()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$data['profile']=$this->Profile_model->get_users($user_id);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('profile/ubah_password',$data);
		$this->load->view('layouts/footer');
		
	}

	public function update_akun()
	{
		$this->load->library('upload');
		$id = $this->input->post('id');
		$passganti = $this->input->post('password');
		$email=$this->input->post('email');

		$new_name = $_FILES["foto"]['name'];   


		$vowels = array(" ", "(", ")", "/", "@", "#", "&", "+");
    	$filename_new=str_replace($vowels, '-', $new_name);
    	

    
		$format = pathinfo($new_name, PATHINFO_EXTENSION);
		


		if($format=="jpg" or $format=="png" or $format=="gif" or $format=="jpeg"){

        $config['upload_path'] = './files/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
        $config['file_name'] = $filename_new;


        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
       
		if(empty($passganti))
		{
			$pass = "";
		}else{
			$pass = $passganti;
		}
        if($new_name){
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'phone'      => $this->input->post('phone'),
					'email'      => $this->input->post('email'),
					'foto'       => $filename_new,
					'password'   => $pass,
					 );
        }else{
                 $data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'phone'      => $this->input->post('phone'),
					'email'      => $this->input->post('email'),
					'password'   => $pass,
					 );

        }
		$this->ion_auth->update($id, $data);
		if(!empty($passganti)){
			echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Password berhasil diubah, silakan login kembali!  
            </b></div>');
        redirect ('Login_User','refresh');
		}else{
			echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Data Akun berhasil diubah  
            </b></div>');
		redirect ('profile','refresh');
	    }

	   }else{

	   	echo $this->session->set_flashdata('message', '<div class="alert alert-info"><b><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
            Foto harus bertipe JPG atau PNG atau GIF atau JPEG
            </b></div>');
		redirect ('profile','refresh');
	   }
	}

	
public function struktur_organisasi(){

    $id_divisi = $this->ion_auth->user()->row()->id_divisi;
	$data['users_divisi'] = $this->Profile_model->users_divisi($id_divisi);
	$divisi = $this->Profile_model->users_divisi($id_divisi);
    foreach($divisi as $di){
    	$data['nama_divisi']=$di->nama_divisi;
    }

   	$this->load->view('layouts/header');
   	$this->load->view('layouts/sidebar');
   	$this->load->view('profile/struktur_organisasi',$data);
   	$this->load->view('layouts/footer');

   }


   public function lihat_user(){

      $user_id = $this->ion_auth->user()->row()->id;
	  $data['profile']=$this->Profile_model->get_users($user_id);
	  $this->load->view('layouts/header');
	  $this->load->view('layouts/sidebar');
	  $this->load->view('profile/profile-basic',$data);
	  $this->load->view('layouts/footer');

   }


    public function create_user(){

      $data['atasan_langsung']=$this->Profile_model->atasan_langsung();
      $data['divisi']=$this->Profile_model->get_divisi();
      $data['jabatan']=$this->Profile_model->get_jabatan();
	  $this->load->view('layouts/header');
	  $this->load->view('layouts/sidebar');
	  $this->load->view('profile/create_user',$data);
	  $this->load->view('layouts/footer');

   }


	public function register(){

		$this->load->library('upload');

		$username	= $this->input->post('first_name');
		$last_name		= $this->input->post('last_name');
		
		
		$id_divisi		= $this->input->post('id_divisi');
		$id_jabatan		= $this->input->post('id_jabatan');
		$phone    		  = $this->input->post('phone');
        $id_line_manajer  = $this->input->post('id_line_manajer');
        $email            = $this->input->post('email');
        $password	= $this->input->post('password');

                     
       

        $foto = $_FILES['foto']['name'];

        $config['upload_path'] = './files/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');

		$additional_data = array(
			'first_name' => $username,
			'last_name'  => $last_name,
			'id_divisi'  => $id_divisi,
			'id_jabatan'  => $id_jabatan,
			'phone'  => $phone,
			'id_line_manajer'  => $id_line_manajer,
			'foto'  => $foto,
			
		);

        /*
		$this->form_validation->set_rules('first_name', 'Nama Depan', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	   */


        	

	        	// Saving data menggunakan library ion_auth
	        	$this->ion_auth->register($username, $password, $email, $additional_data);
	        	

	            $data['message'] = "Anda telah berhasil registrasi";
	            redirect('Auth/index');
			
        

	} 

	 public function edit_user($id){

       	$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('admin/user', 'refresh');
		}

        
		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim|required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === TRUE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'id_divisi' => $this->input->post('id_divisi'),
					'id_jabatan' => $this->input->post('id_jabatan'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData))
					{

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				

				{


					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->redirectUser();

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					$this->redirectUser();

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		
		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);

		$this->data['gelar'] = array(
			'name'  => 'gelar',
			'id'    => 'gelar',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('gelar', $user->gelar),
		);


        $this->data['id_divisi'] = array(
			'name'  => 'id_divisi',
			'id'    => 'id_divisi',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('id_divisi', $user->id_divisi),
		);

		$this->data['id_jabatan'] = array(
			'name'  => 'id_jabatan',
			'id'    => 'id_jabatan',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('id_jabatan', $user->id_jabatan),
		);
		$this->data['id_line_manajer'] = array(
			'name'  => 'id_line_manajer',
			'id'    => 'id_line_manajer',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('id_line_manajer', $user->id_line_manajer),
		);

		$this->data['foto'] = array(
			'name'  => 'foto',
			'id'    => 'foto',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('foto', $user->foto),
		);

		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		
        $this->data['divisi']=$this->Profile_model->get_divisi();
        $this->data['jabatan']=$this->Profile_model->get_jabatan();
        $this->data['atasan_langsung']=$this->Profile_model->atasan_langsung();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
		$this->load->view('profile/edit_user',$this->data);
		$this->load->view('layouts/footer');

   }

   public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')){
			return TRUE;
		}
			return FALSE;
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}
	


	public function update_user(){


		$this->load->library('upload');
		$id = $this->input->post('id');
		$passganti = $this->input->post('password');
		
		$foto = $_FILES['foto']['name'];
        $config['upload_path'] = './files/foto_user/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
       
		if(empty($passganti))
		{
			$pass = "";
		}else{
			$pass = $passganti;
		}
        if($foto){
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'phone'      => $this->input->post('phone'),
					'email'      => $this->input->post('email'),
					'id_divisi'  => $this->input->post('id_divisi'),
					'id_jabatan' => $this->input->post('id_jabatan'),
					'id_line_manajer' => $this->input->post('id_line_manajer'),
					'foto'       => $foto,
					'password'   => $pass,
					 );
        }else{
                 $data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'phone'      => $this->input->post('phone'),
					'email'      => $this->input->post('email'),
					'id_divisi'  => $this->input->post('id_divisi'),
					'id_jabatan' => $this->input->post('id_jabatan'),
					'id_line_manajer' => $this->input->post('id_line_manajer'),
					'password'   => $pass,
					 );

        }

        if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData))
					{

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}
		$this->ion_auth->update($id, $data);
		redirect('Auth/index');
		


	}

	
	

}
