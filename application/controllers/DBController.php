<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBController extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->helper('url');

        $this->load->dbforge();

        $this->load->dbutil();

        $this->load->database();

        $this->load->model('DBConn','dbconn');

        $this->load->model('User_Model','user');

    }

    public function index(){

    }

    public function makeDB(){

        if($this->dbforge->create_database('DBlager')){
            redirect(base_url());
        }


    }

    public function makeTables(){

        //here create all tables, we need

        //create table user

        $this->user->makeTable();



        //-------------------------------------------------------------------

        //set user as admin

        $this->user->setLogin('admin');

        //if admin user doesn't exist, create admin user

        if(!$this->user->ifExists()){

            $this->insertAdmin();

        }

        //redirext to base url

        redirect(base_url());
        
    }

    public function insertAdmin(){

        $this->user->setLogin("admin");
        $this->user->setPass(password_hash("admin",PASSWORD_BCRYPT));
        $this->user->setMail('lukasz.grodek@wjwgmbh.de');
        $this->user->setActive(1);
        $this->user->save();

    }




}

?>