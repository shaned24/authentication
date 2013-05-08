<?php

class settings_model extends CI_Model
{

    function __construct()
    {
        parent :: __construct();
    }

   public function getUserData($uid){


    $sql = "SELECT first_name,last_name,userIMG FROM users WHERE uid = ?";
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


