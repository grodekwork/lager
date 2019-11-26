<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TempList_Model extends CI_Model{

    protected $id;
    protected $createdAt;
    protected $info;
    protected $sourceFile;

    public function __conmstruct(){

        parent::__construct();
        
        $this->load->database();

        $this->load->dbforge();

    }

    public function setId($value){
        $this->id=$value;
    }
    public function getId(){
        return $this->id;
    }
    public function setCreatedAt($value){
        $this->createdAt = $value;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    public function setInfo($value){
        $this->info = $value;
    }
    public function getInfo(){
        return $this->info;
    }

    public function makeTable(){

        if(!$this->db->table_exists('templist')){

            $this->dbforge->add_field('id INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
            $this->dbforge->add_field('createdAt DATETIME DEFAULT CURRENT_TIMESTAMP');
            $this->dbforge->add_field('info VARCHAR(240) NULL');
            $this->dbforge->add_field('sourceInfo VARCHAR(240) NULL');

            $this->dbforge->create_table('templist');
            
        }
    }


}