<?php

class Im extends CI_Controller
{

	function __construct()
	{
		session_start();
		parent :: __construct();
		$this->load->model('im_model');

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

	function get_im_users(){
			$data['rows'] = $this->im_model->get_im_users($_SESSION['uid']);
			$this->load->view('im_users', $data);
	}
}
