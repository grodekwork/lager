<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller{

    public function __construct(){
        parent::__construct();

        

        //helpers

        $this->load->model('Info','info');

        //helpers

        $this->load->helpers('url');

        //libraries

        $this->load->library("session");

        if(!$this->session->userdata('isLogged')){
            redirect(base_url());
        }


    }


    public function index(){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Produkte";


        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        $this->load->view("product/content");
        $this->load->view("templates/footer");



    }

}