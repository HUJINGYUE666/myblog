<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_by_user_and_pwd($uname,$pwd){
        return $this->db->get_where('t_user',array(
            'username'=>$uname,
            'password'=>$pwd
        ))->row();
    }
}
