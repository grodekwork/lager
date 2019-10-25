<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller{

    protected $isLogged;

    public function __construct(){
        parent::__construct();

        //helpers

        $this->load->helper('url');

        //models

        $this->load->model("Info","info");
        $this->load->model("DBConn","dbconn");
        

        //libraries

        $this->load->library("session");
       


        //$this->isLogged = FALSE;

        $this->isLogged = $this->session->userdata('isLogged');


    }


    public function index(){
    

        $data['pageTitle'] = $this->info->getPageTitle();


        $this->load->view("templates/header",$data);

        
        if(!$this->dbconn->ifDBExists()){
        
            
            $data['msg'] = "Datenbank ist nicht bekannt";
            $data['link'] = base_url() . "index.php/makeDB";
            $data['linkAlt'] = "make Datenbank";
        
            $this->load->view("templates/warnings/info",$data);
        
        }else{

            if(!$this->dbconn->ifTablesExist()){
                
                $data['msg'] = "Alle Tabellen müssen installiert sein! <strong class='warning'>App kann nicht richtig funktionieren!</strong>";
                $data['link'] = base_url() . "index.php/makeTables";
                $data['linkAlt'] = "instal the Tables";
            
                $this->load->view("templates/warnings/info",$data);
            }
        
            if($this->isLogged){ 

               
                $this->load->view("templates/menu");
                $this->load->view("templates/content");
           

            }else{

                $this->load->view("login/loginForm");

            }
        }

    
        $this->load->view("templates/footer");

    }



}

?>