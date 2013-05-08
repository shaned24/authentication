<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {

        session_start();
        parent :: __construct();
       // $this->admin->is_logged_in;
        if (!isset($_SESSION['username'])) {
            redirect('admin');
        }
        $this->load->model('blog_model');
    }

    public function index()
    {

        
        $data['rows'] = $this->blog_model->getAll();
        $this->load->view('home_page', $data);
    }

    public function refresh_home()
    {
        $data['rows'] = $this->blog_model->getLatestBlog($_SESSION['uid']);
        $this->load->view('home_page_ajax', $data);
    }
    
    public function myBlog(){
      // if(isset($_SESSION['uid']))
              // {
        $data['rows'] = $this->blog_model->getUserBlog($_SESSION['uid']);
        $this->load->view('welcome_message', $data);
             //  }
              // else echo "no uid set for session";
    }

    public function create()
    {
        $this->load->view('create_ajax');
    }

    public function createPost()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'contents' => $this->input->post('contents'),
            'uid' => $_SESSION['uid']
        );
        $this->blog_model->add_record($data);
        //redirect('/welcome/index');
        //create
    }

    public function edit()
    {
        $blog_id = $this->uri->segment(3);
        $blog = $this->blog_model->getSome($blog_id);

       foreach($blog as $value)
       {
           $data['a']= $value->id;
           $data['b']= $value->title;
           $data['c']= $value->contents;
        };
       $this->load->view('edit', $data);
    }

    public function editPost()
    {
        //edit
       $id = $this->uri->segment(3);
       echo $id;
       //$id = $this->input>post('id');
        $data = array(
            'title' => $this->input->post('title'),
            'contents' => $this->input->post('contents'),

        );
        $this->blog_model->update_record($data,$id);
        
        /*$this->db->where('id', $id);
        $this->db->update('blog', $data);*/
redirect('/welcome/myBlog');
    }

    public function deletePost()
    {
        //delete
        $this->blog_model->delete_row();
        redirect('/welcome/myBlog');
    }

    


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */