<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_by_email($email){ //前端邮箱 数据库邮箱是否存在
        return $this->db->get_where('t_user', array('email'=>$email))->row();
    }

    public function save_user($email, $username, $pwd, $sex, $province, $city){
        //$sql = "insert into t_user(email, username, password, sex, province, city)
        // values('$email', '$username', '$pwd', '$sex', '$province', '$city')";

        $this->db->insert('t_user', array( //向数据库传值
            'email'=>$email,
            'username'=>$username,
            'password'=>$pwd,
            'sex'=>$sex,
            'province'=>$province,
            'city'=>$city
        ));
        return $this->db->affected_rows();//返回当前操作影响的行数
    }

    public function get_by_email_and_pwd($email, $pwd){
        //select * from t_user where email=$email and password=$pwd
        return $this->db->get_where('t_user', array(
            'email'=>$email,
            'password'=>$pwd
        ))->row();
    }
}
