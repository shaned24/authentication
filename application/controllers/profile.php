<?php
require_once('admin.php');

class Profile extends CI_Controller
{
	public function __construct()
	{

		session_start();
		parent :: __construct();
		$this->load->model('image_model');
		$this->load->model('settings_model');
		$this->load->model('im_model');
		$dir = "C:\wamp\www\authentication\application\img";
		foreach(scandir($dir) as $file)
		{
 			// ..print '<a href="'.$dir.$file.'">'.$file.'</a><br>';
			$data['imgpath'] = $file;
			$this->image_model->storeImages($data);
		}
		if (!isset($_SESSION['username'])) {
			redirect('admin');
		}
	}
	

	public function index()
	{
		$dir = "C:\wamp\www\authentication\application\img";
		foreach(scandir($dir) as $file)
		{
 			// print '<a href="'.$dir.$file.'">'.$file.'</a><br>';
			$data[] = $file;
		}	
		$myArray['rows'] = $data;
		$this->load->view('image_view', $myArray);
	}

	public function settings()
	{	
		//get the uid of the person logged in
		//get the image that they have set
		//pass this data to the view
		$this->load->model('settings_model');
		$data['rows'] = $this->settings_model->getUserData($_SESSION['uid']);
		$this->load->view('settings',$data);
	}

	public function chooseOrUpload()
	{

		$this->load->view('chooseOrUpload.php');
	}
	public function displayImage()
	{   
		$dir = "C:\wamp\www\authentication\application\img";
		foreach(scandir($dir) as $file)
		{
            // print '<a href="'.$dir.$file.'">'.$file.'</a><br>';
			$data[] = $file;
		}   
        // here i filter out two items that get returned from the first array about that i dont need. '.' and '..'
		for($i=2;$i<count($data);$i++)
		{
			$rows[]= $data[$i];		
		}	
		$myArray['rows'] = $rows;
		$this->load->view('choose_view', $myArray);
	}
    //after user clicks on an image, the name of the image gets posted to the url after the classname/method/imageName
    //
	public function chooseImage()
	{
		$this->load->model('image_model');
		$userIMG = $this->uri->segment(3); 

		$tellme = $this->input->post('q');
		$this->image_model->setUserImg($this->input->post('q') ,$_SESSION['uid']);            
        //$this->image_model->setUserImg($userIMG,$_SESSION['uid']);
        //redirect('profile/settings');
		echo $tellme;

	}

	function uploadImg()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$msg = "";
		$status = "";
		$file_element_name = 'userfile';

		$config['upload_path'] = 'application/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '20000';
		$config['max_height']  = '20000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($file_element_name))
		{
			/*$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);*/
			$msg = $this->upload->display_errors('', '');
			$status = 'error';
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$data = $this->upload->data();


			$file_id = $this->image_model->setUserImg($data['file_name'],$_SESSION['uid']);
			if($file_id)
			{
				$status = "success";
            	$msg = "File successfully uploaded";
         	}
         	else
         	{
	            //unlink($data['full_path']);
	            $status = "error";
	            $msg = "Something went wrong when saving the file, please try again.";
	         }
	      }
      		//@unlink($_FILES[$file_element_name]);
   	
  		 echo json_encode(array('status' => $status, 'msg' => $msg));	

			


			//$this->load->view('upload_success', $data);
			//$this->load->view('settings', $data);
		//	redirect('profile/settings');

			//$data1['rows'] = $this->settings_model->getUserData($_SESSION['uid']);
			//$data1['success'] = "Upload Successful";

			//foreach ($data as $item => $value)	 
			//	$path = $value['file_name'];
			

			//$this->image_model->setUserImg($path,$_SESSION['uid']);
			//$this->load->view('settings',$data);
			
			//redirect('profile/settings');
			
			
	}

	function post_im(){

		$data = array(
            'message' => $this->input->post('message'),
            'uid' => $_SESSION['uid']
        );
		$this->im_model->store_message($data);
		echo $this->input->post('message');
	}

	function get_im(){
		$data['rows'] = $this->im_model->get_message($_SESSION['uid']);
		$this->load->view('im_view',$data);
	}
}

