<?php
class Ajax extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
    }
 
  public function multipleImage()
  {
    $this->load->view('multiple-image');
  }
 
  public function multipleImageStore()
  {

    

     $nomororder = rand();

       $date_posted=date('Y-m-d h:i:s');
         $ID = $this->ion_auth->user()->row()->id;
         $jml_karakter = strlen($ID);
         $news= $this->input->post('update_news');


           $this->Home_model->insert_news($news,$ID,$date_posted);
           $last_insert_id=$this->db->insert_id();
            



      $countfiles = count($_FILES['files']['name']);
     




  
      for($i=0;$i<$countfiles;$i++){
  
      
  
          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
 
          // Set preference
          $config['upload_path'] = './uploads/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '1000000'; // max_size in kb
          $config['file_name'] = $_FILES['files']['name'][$i];
  
          //Load upload library
          $this->load->library('upload',$config); 
          $arr = array('msg' => 'something went wrong', 'success' => false);
          // File upload
          if($this->upload->do_upload('file')){
           
           $data = $this->upload->data(); 
           $insert['id_news'] = $last_insert_id;
           $insert['file']    = $data['file_name'];
           $this->db->insert('news_dashboard_detail',$insert);
           $get = $this->db->insert_id();
          $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);
 
          }
        
  
      }
      echo json_encode($arr);
  
  }

  function update_data(){

    $kode   =$this->input->post('kode');
    $asu=$this->input->post('asu');
echo $asu;
    var_dump($kode);
    die;

  }
   
}