<?php

class Im_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}

	public function store_message($data){
		$this->db->insert('im', $data);
		return;

	}

	public function get_message($uid){

		//$sql = "SELECT uid, message FROM im";
		$sql= "SELECT id, uid, message FROM im WHERE uid !=" . $uid ." AND   timestamp >= (SELECT DATE_SUB( now(), INTERVAL 5 SECOND ))";
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

	
}