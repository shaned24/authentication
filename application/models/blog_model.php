<?php

class Blog_Model extends CI_Model {


    //active records

    function getAll ()
    {
       $sql=  "SELECT blog.uid, blog.id, blog.title, blog.contents,users.first_name,users.last_name, users.userIMG FROM users JOIN blog ON users.uid = blog.uid ORDER BY id desc";
      //$sql = "SELECT id, title, contents,userIMG FROM blog ORDER BY id desc";
        $q = $this->db->query($sql);
        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
    }               
  }

    function get_records()
    {
        $query = $this->db->get('blog');
        return $query->result();
    }

    function add_record($data)
    {
        $this->db->insert('blog', $data);
            return;
    }

    function update_record($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('blog', $data);
    }

    function delete_row()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('blog');
    }

//selecting certain rows
    function getSome ($id)
    {
      /*  $this->db->select('title', 'contents' );
        $this->db->from('blog');
        $this->db->where('id', $id );

        $q = $this->db->get('blog');*/

        $sql = "SELECT title, contents, id FROM blog where id = ?";
        $q = $this->db->query($sql, $id);

        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;

        }


    }
//specific SQL
   /* function getAll(){

        $sql = "SELECT title, contents FROM blog where id = ?";
        $q = $this->db->query($sql, 1);


               if($q->num_rows() > 0)
               {
                   foreach($q->result() as $row)
                   {
                       $data[] = $row;
                   }
                   return $data;
               }
                else echo "no results";
    }*/

    /*   function getAll(){

            $q = $this->db->query("SELECT * FROM blog");
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }

        }
        }

     //specific active rows
        function getAll ()
            {
                $q = $this->db->get('blog');
                if($q->num_rows() > 0)
                {
                    foreach($q->result() as $row)
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
            }*/


        function addUserBlog($data)
        {
            $this->db->insert('blog', $data);
            return;
        }

        function getUserBlog($uid)
        {

           // $sql = "SELECT id, title, contents FROM blog WHERE uid = ? ORDER BY id desc";

              $sql = "SELECT id, title, contents, userIMG FROM users JOIN blog ON users.uid = blog.uid WHERE blog.uid = ? ORDER BY id desc";
            $q = $this->db->query($sql, $uid);
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
        }
        function getLatestBlog($uid)
        {
            $sql = "SELECT blog.id, blog.title, blog.contents,users.first_name,users.last_name, users.userIMG FROM users JOIN blog ON users.uid = blog.uid WHERE blog.uid = ? AND blog.id = (SELECT max(blog.id) from blog) LIMIT 1"; 

            $q = $this->db->query($sql, $uid);
            if($q->num_rows() > 0)
            {
                foreach($q->result() as $row)
                {
                    $data[] = $row;
                }
                return $data;
            }
        }



}