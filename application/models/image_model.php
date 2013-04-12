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
   
}


