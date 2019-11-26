<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller{

    public function __construct(){
        parent::__construct();

        //helpers

        $this->load->helper('url');

        $this->load->library('session');

        $this->load->model("User_Model","model");

    }

    public function auth(){

        if(($this->input->post('login'))&&($this->input->post('logIn'))){
           
            $pass = password_hash($this->input->post('pass'),PASSWORD_BCRYPT);

            $this->model->setLogin($this->input->post('login'));
            $this->model->setPass($pass);
            
            $user=$this->model->getUser();

            if(password_verify($this->input->post('pass'), $user->pass)){
                
                $newData = array(
                    'isLogged' => TRUE,
                    'username' => $user->login                    
                );

                $this->session->set_userdata($newData);

                echo $this->session->userdata('isLogged');
                
                $url = base_url();

                redirect($url);

            }else{
                redirect(base_url());
            }

           
        }else{

            redirect(base_url());

        }
        

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

}