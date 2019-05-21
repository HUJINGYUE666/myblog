<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function login(){
        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->unset_userdata('user', NULL);
        redirect('user/login');
    }

    public function reg(){
        $this->load->view('reg');
    }

    public function check_login(){
        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');

        $this->load->model('user_model');

        $user = $this->user_model->get_by_email_and_pwd($email, $pwd);

        if($user){//查到了用户
            //echo '登录成功';
            //$this->load->view('success');
            //将用户数据存入session
            //$this->session->set_userdata('user', $user);
            redirect('admin/index');
        }else{
            redirect('user/login');
        }

    }

    public function do_reg(){
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');
        $pwd2 = $this->input->post('pwd2');
        $sex = $this->input->post('sex');
        $province = $this->input->post('province');
        $city = $this->input->post('city');

        if($email == ""){//用户未填写email
            redirect('user/reg');
        }

        $this->load->model('user_model');
        $rows = $this->user_model->save_user($email,$username,$pwd,$sex,$province,$city);
        if($rows == 1){ //一行登录页面 不是一行注册页面
            redirect('user/login');
        }else{
            redirect('user/reg');
        }
    }

    public function check_email(){
        $email = $this->input->get('email');
        $this->load->model('user_model'); //接收邮箱
        $row = $this->user_model->get_by_email($email);
        if($row){ //存在fail 不存在true
            echo 'fail';
        }else{
            echo 'success';
        }
    }
}
