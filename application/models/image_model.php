<?php

class Image_model extends CI_Model
{

    function __construct()
    {
        parent :: __construct();
    }

   function getImages()
   {
        $sql = "SELECT id, imgpath FROM images";

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

   function storeImages($data)
   {
        
        $this->db->insert('images', $data);
        return;
   }

   function setUserImg($path,$uid)
   {
    //$q= "UPDATE users SET userIMG = " . $path . " WHERE uid = " . $uid;

    $data = array(
      'userIMG' => $path
      );
    $this->db->where('uid', $uid);
    $this->db->update('users',$data);
            return "done";
   }
   
}


