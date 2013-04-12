<?php

class Admin_model extends CI_Model
{

    function __construct()
    {
        parent :: __construct();
    }

    public function verify_user($email, $password)
    {
        $this->db
            ->select('uid')
            ->select('first_name')
            ->where('email_address', $email)
            ->where('password' , sha1($password))
            ->limit(1);
        // ->get('users'); //'SELECT id,first_name FROM users WHERE email_address = ?';
        $pass = sha1($password);
        // $q = "SELECT id,first_name FROM users WHERE email_address = '$email' AND password = '$pass'";
        $q = $this->db->get('users');
        if ($q->num_rows > 0) {

            return $q->row();
        }
        return false;
    }

    public function add_user($data)
    {
        $this->db->insert('users', $data);

        return;

    }
}

