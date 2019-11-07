<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UploadFile_Model extends CI_Model{

    protected $id;
    protected $filename;
    protected $createdAt;

    public function getId(){
        return $this->id;
    }
    public function setFilename($value){
        $this->filename = $value;
    }
    public function getFilename(){
        return $this->filename;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }

    public function __construct(){
        parent::__construct();

        //load Database

        $this->load->database();

        //load dbforge

        $this->load->dbforge();


    }

    public function makeTable(){

        if(!$this->db->table_exists('uploads')){

            $this->dbforge->add_field('id INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
            $this->dbforge->add_field('filename VARCHAR(240) NOT NULL');
            $this->dbforge->add_field('createdAt DATETIME DEFAULT CURRENT_TIMESTAMP');

            $this->dbforge->create_table('uploads');

            return TRUE;

        }else{
            return FALSE;
        }

    }

    public function save(){
        $data = [
            'filename' => $this->filename
        ];

        $this->db->insert('uploads',$data);

    }

    public function getAll(){
        $this->db->select('*');
        $this->db->from('uploads');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        
        return $query->result();
    }
}