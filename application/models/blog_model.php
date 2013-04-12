<?php

class Blog_Model extends CI_Model {


    //active records

    function getAll ()
    {
         $sql=     "SELECT id, title, contents, userIMG FROM users JOIN blog ON users.uid = blog.uid ORDER BY id desc";
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

    function update_record($data)
    {
        $this->db->where('id','1');
        $this->db->update('data', $data);
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
        function getIMG(){
            

        }



}