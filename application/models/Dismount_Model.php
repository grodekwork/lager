<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dismount_Model extends CI_Model{

    protected $id;
    protected $dismountDate;
    protected $dismountVolume;
    protected $weight;
    protected $info;
    protected $productId;


    public function __construct(){
        parent::__construct();

        //load database
        $this->load->database();

        //load dbforge

        $this->load->dbforge();

    }

    public function setId($value){
        $this->id = $value;
    }
    public function getId(){
        return $this->id;
    }
    public function setDismountVolume($value){
        $this->dismountVolume=$value;
    }
    public function getDismountVolume(){
        return $this->dismountVolume;
    }
    public function setWeight($value){
        $this->weight = $value;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function setProductId($value){
        $this->productId = $value;
    }
    public function setInfo($value){
        $this->info = $value;
    }
    public function getInfo(){
        return $this->info;
    }
    public function getProductId(){
        return $this->productId;
    }

    public function makeTable(){

        if(!$this->db->table_exists('dismount')){
            
            $this->dbforge->add_field('id INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
            $this->dbforge->add_field('createdAt DATETIME DEFAULT CURRENT_TIMESTAMP');
            $this->dbforge->add_field('dismountVolume INT(10) NOT NULL');
            $this->dbforge->add_field('weight FLOAT(10) NOT NULL');
            $this->dbforge->add_field('info VARCHAR(244)');
            $this->dbforge->add_field('productId INT(5) NOT NULL');

            $this->dbforge->create_table('dismount');

            return TRUE;

        }else{

            return FALSE;

        }
    }

    public function save(){

        

        $data = [
            'dismountVolume' => $this->dismountVolume,
            'weight' => $this->weight,
            'info' => $this->info,
            'productId' => $this->productId
        ];

        $this->db->insert('dismount',$data);


     }


}