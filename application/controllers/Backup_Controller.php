<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Backup_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();

        //load models

        $this->load->model('Product_Model','product');
        $this->load->model('Templist_Model','templist');
        $this->load->model('TempProduct_Model','tempproduct');

        

    }


}