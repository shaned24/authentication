<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller {
    public $uid;

    function __construct()
    {
        parent :: __construct();
        session_start();
        
    }

    //login functionality
    public function index()
    {
        if(isset($_SESSION['uid']))
       {
            redirect('welcome/index');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|');
        $this->form_validation->set_rules('confirm_password', 'Confirm-Password', 'matches[password]');
        $this->load->view('login_view');
    }
    public function login()
    {

        $msg = "Incorrect Email or Password, Please try again!";
       
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
        $this->form_validation->set_rules('confirm_password', 'Confirm-Password', 'required|matches[password]');

        if( $this->form_validation->run() == true)
        {
            
            $bg_color = "#FFA";
            //load the database functions for use
            $this->load->model('admin_model');
            //then insert the user, into the DB
           
            $data = array(
                'first_name' => $this->input->post('first_name',true),
                'last_name' => $this->input->post('last_name',true),
                'email_address' => $this->input->post('email_address',true),
                'password' => sha1($this->input->post('password',true)),
            );
            $this->admin_model->add_user($data);
            $message = "Created Account Sucessfully.";
        }
        else
        {
            $message = 'Could not create an account.';
            
        }
    
    $data = array(
        'message' => $message,
        'validation' => validation_errors());

   // echo json_encode($data);
    //echo $data;
    echo $message;
      //echo validation_errors();      
      // $this->load->view('login_view');
    }

    public function logout(){

        session_destroy();
        redirect('admin/index');
    }

    public static function who_is_logged_in()
    {
        
      //  $is_logged_in = $this->session->
    }

    
    public function getUid()
    {
        return $_SESSION['uid'];
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */