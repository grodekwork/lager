<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TempList_Model extends CI_Model{

    protected $id;
    protected $createdAt;
    protected $info;
    protected $sourceInfo;
    protected $checkcode;

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
    public function setSourceFile($value){
        $this->sourceInfo = $value;
    }
    public function getSourceFile(){
        return $this->sourceInfo;
    }
    public function setCheckcode($value){
        $this->checkcode = $value;
    }
    public function getCheckcode(){
        return $this->checkcode;
    }

    public function makeTable(){

        if(!$this->db->table_exists('templist')){

            $this->dbforge->add_field('id INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
            $this->dbforge->add_field('createdAt DATETIME DEFAULT CURRENT_TIMESTAMP');
            $this->dbforge->add_field('info VARCHAR(240) NULL');
            $this->dbforge->add_field('sourceInfo VARCHAR(240) NULL');
            $this->dbforge->add_field('checkcode VARCHAR(240) NOT NULL');
            $this->dbforge->create_table('templist');
            
        }
    }

    public function save(){

        $data = array(
            'info' => $this->info,
            'sourceInfo' => $this->sourceInfo,
            'checkcode' => $this->checkcode
        );

        $this->db->insert('templist',$data);

    }

    public function getAll(){

        $this->db->select('*');
        $this->db->from('templist');
        $this->db->order_by('createdAt','DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function getOne($field,$value){

        $this->db->select('*');
        $this->db->from('templist');
        $this->db->where($field,$value);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }


}