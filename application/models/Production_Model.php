<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Production_Model extends CI_Model{

    protected $id;
    protected $productionDate;
    protected $productionVolume;    //produktionsmenge
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
    public function getProductionDate(){
        return $this->productionDate;
    }
    public function setProductionVolume($value){
        $this->productionVolume = $value;
    }
    public function getProductionVolume(){
        return $this->productionVolume;
    }
    public function setWeight($value){
        $this->weight = $value;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function setInfo($value){
        $this->info = $value;
    }
    public function getInfo(){
        return $this->info;
    }
    public function setProductId($value){
        $this->productId = $value;
    }
    public function getProductionId(){
        return $this->productId;
    }

    public function makeTable(){

        if(!$this->db->table_exists('production')){

            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'productionVolume' => array(
                    'type' => 'INT',
                    'constraint' => 7,
                    'null' => FALSE
                ),
                'weight' => array(
                    'type' => 'FLOAT',
                    'constarint' => 5,
                    'null' => FALSE
                ),
                'info' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '244',
                ),
                'productId' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'null' => FALSE
                )
            );
            $this->dbforge->add_key('id',TRUE);
            $this->dbforge->add_field($fields);
            $this->dbforge->add_field('createdAt DATETIME DEFAULT CURRENT_TIMESTAMP');
            $this->dbforge->create_table('production');
            
            return TRUE;

        }else{

            return FALSE;

        }

     }

     public function save(){

        $weight = $this->switcher($this->weight);

        $data = [
            'productionVolume' => $this->productionVolume,
            'weight' => $weight,
            'info' => $this->info,
            'productId' => $this->productId
        ];

        $this->db->insert('production',$data);


     }

     public function getAllProduction(){
         
           
        $this->db->select('*, production.createdAt as proCreatedAt, production.weight as ProductionWeight, productionVolume as volume');
        $this->db->from('production');
        $this->db->join('product','product.id=production.productId');

        $this->db->order_by('proCreatedAt','DESC');
        $query = $this->db->get();
     
        return $query->result();
     }

     public function getAllDismount(){
         
           
        $this->db->select('*, dismount.createdAt as proCreatedAt, dismount.weight as ProductionWeight, dismountVolume as volume');
        $this->db->from('dismount');
        
        $this->db->join('product','product.id=dismount.productId');

        $this->db->order_by('proCreatedAt','DESC');

        $query = $this->db->get();
     
        return $query->result();
     }

     public function switcher($value){


        $data = explode(",",$value);

        if(sizeof($data)==2){
            return implode(".",$data);
        }

        $data2 = explode(".",$value);

        if(sizeof($data2)==2){
            return $value;
        }

        if(sizeof($data)==1||sizeof($data2)==1){
            return $value;
        }



    }






}