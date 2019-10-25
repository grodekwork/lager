<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Model{
    
    protected $pageTitle;

    public function __construct(){
        parent::__construct();

        $this->pageTitle = "Lager";
    }

    public function getPageTitle():String{
        return $this->pageTitle;
    }


}