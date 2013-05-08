<?php

class Upload extends CI_Controller {

	function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function doit()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = 'application/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '';
		$config['max_height']  = '';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			//$this->load->view('upload_success', $data);
			$this->load->view('settings', $data);

			
			foreach ($data as $item => $value)	 
			$path = $value['full_path'];
			
		}
	}
}
?>