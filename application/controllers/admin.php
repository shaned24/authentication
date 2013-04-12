<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


    function __construct()
    {
        parent :: __construct();
        session_start();
    }

    //login functionality
    public function index()
    {

        $msg = "Incorrect Email or Password, Please try again!";
        if(isset($_SESSION['uid'])){
            redirect('welcome/index');
        }
        //form validation rules go here
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');


        if( $this->form_validation->run() == true)
        {
            //compare with database , 
            $this->load->model('admin_model');
            //then validate the user, get from the DB,log this bitch in
            $result = $this->admin_model->verify_user($this->input->post('email_address'),$this->input->post('password'));

            if($result !== false)
            {
                //the person has an account
                // $cookie = array (
                //       'username' => $result->first_name,
                //       'uid' => $result->id
                //    );
                //sets the session variables used for distinguishing the blogs bai
               $_SESSION['username'] = $result->first_name;
               $_SESSION['uid'] = $result->uid;
            
                redirect('welcome/index');
            }
            else echo "<div class='errors'>".$msg."</div>";
        }
        $this->load->view('login_view');
    }

    public function new_user()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|');
        $this->form_validation->set_rules('confirm_password', 'Confirm-Password', 'matches[password]');

        if( $this->form_validation->run() == true)
        {
            //load the database functions for use
            $this->load->model('admin_model');
            //then insert the user, into the DB
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_address' => $this->input->post('email_address'),
                'password' => sha1($this->input->post('password')),
            );
            $this->admin_model->add_user($data);
            redirect('admin/index');
        }

        $this->load->view('new_user');
    }

    public function logout(){

        session_destroy();
        redirect('admin/index');
    }

    public static function is_logged_in(){

      //  $is_logged_in = $this->session->
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */