<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model{

    protected $ean;
    protected $item;
    protected $origin;          //Kuh | Ziege | Schaf
    protected $type;            //Frisch | Weich | Schnitt | Hart
    protected $age;             //In Reife | Jung | Mittel | Alt
    protected $packege;         //Laibgross | Laibklein | Glas
    protected $plan;            //Aktuell | Nicht mehr produziert
    protected $amount;          //bestandsmenge
    protected $weight;          //gewicht
    protected $total;           //gesamt
    protected $createdAt;
    protected $updatedAt;


    public function setEan($value){
        $this->ean = $value;
    }
    public function setItem($value){
        $this->item = $value;
    }
    public function setOrigin($value){
        $this->origin = $value;
    }
    public function setType($value){
        $this->type = $value;
    }
    public function setAge($value){
        $this->age = $value;
    }
    public function setPackege($value){
        $this->packege = $value;
    }
    public function setPlan($value){
        $this->plan = $value;
    }
    public function setAmount($value){
        $this->amount = $value;
    }
    public function setWeight($value){
        $this->weight = $value;
    }
    public function setTotal($value){
        $this->total = $value;
    }


    public function __construct(){
        parent::__construct();

        //load database
        $this->load->database();

        //load dbforge

        $this->load->dbforge();

    }

    public function makeTable(){

        if(!$this->db->table_exists('product')){

            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'ean' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '240',
                    'null' => FALSE
                ),
                'item' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '240',
                    'null' => FALSE
                ),
                'origin' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120',
                    'null' => FALSE,
                ),
                'type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120',
                    'null' => FALSE,
                ),
                'age' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120',
                    'null' => FALSE
                ),
                'packege' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120',
                    'null' => FALSE
                ),
                'plan' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120',
                    'null' => FALSE
                ),
                'amount' => array(
                    'type' => 'FLOAT',
                    'constraint' => '50',
                    'null' => FALSE
                ),
                'weight' => array(
                    'type' => 'FLOAT',
                    'constraint' => '50',
                    'null' => FALSE
                ),
                'total' => array(
                    'type' => 'FLOAT',
                    'constraint' => '50',
                    'null' => FALSE
                ),
                'createdAt' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'null' => FALSE
                ),
                'updatedAt' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'null' => FALSE
                )
            );

            $this->dbforge->add_key('id',TRUE);
            $this->dbforge->add_field($fields);
            $this->dbforge->create_table('product');

            return TRUE;

        }else{

            return FALSE;

        }

    }

    public function save(){
        $today = date('Y-m-d');

        $data = [
            "ean"=>$this->ean,
            "item"=>$this->item,
            "origin"=>$this->origin,
            "type"=>$this->type,
            "age"=>$this->age,
            "packege"=>$this->packege,
            "plan"=>$this->plan,
            "amount"=>$this->amount,
            "weight"=>$this->weight,
            "total"=>$this->total,
            "createdAt"=>$today,
            "updatedAt"=>$today
        ];

        $this->db->insert('product',$data);

    }




}