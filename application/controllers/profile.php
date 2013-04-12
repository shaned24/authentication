<?php


class Profile extends CI_Controller
{
	
	function __construct()
    {
        parent :: __construct();
        $this->load->model('image_model');
		$dir = "C:\wamp\www\authentication\application\img";
		foreach(scandir($dir) as $file)
		{
 			// print '<a href="'.$dir.$file.'">'.$file.'</a><br>';
  			$data['imgpath'] = $file;
  			$this->image_model->storeImages($data);
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

	public function storeImages()
	{	
		
	}
	public function chooseImage()
	{	

		// i need to get the image references from the DB
		// i need to pass them to the view
		// i need to make a choose button




		$dir = "C:\wamp\www\authentication\application\img";
		foreach(scandir($dir) as $file)
		{
 			// print '<a href="'.$dir.$file.'">'.$file.'</a><br>';
  			$data[] = $file;
		}	
		$myArray['rows'] = $data;
		$this->load->view('choose_view', $myArray);



	}
}
?>