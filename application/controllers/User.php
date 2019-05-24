<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function reg(){
        $this->load->view('reg'); //访问注册页面
    }
    public function do_reg(){
        $email = $this->input->post('email'); //接收用户输入框数据
        $username = $this->input->post('username');
        $pwd = $this->input->post('pwd');
        $pwd2 = $this->input->post('pwd2');
        $sex = $this->input->post('sex');
        $province = $this->input->post('province');
        $city = $this->input->post('city');

//        if($email == ""){ //用户未填email
//            redirect('user/reg'); //重定向注册页面
//        }

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
        if($row){ //查到了邮箱失败 查不到邮箱成功
            echo 'fail';
        }else{
            echo 'success';
        }
    }

    public function login(){
        $this->load->view('login'); //访问登录页面
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
            $this->session->set_userdata('user', $user);
            redirect('admin/index'); //登录成功 跳转博客页面
        }else{
            redirect('user/login');
        }

    }
    public function logout() //清空session 加载登录页
    {
        $this->session->unset_userdata('user', NULL);
        redirect('user/login');
    }
}
