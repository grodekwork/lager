<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model{

    protected $ean;
    protected $item;
    protected $origin;          //Kuh | Ziege | Schaf
    protected $type;            //Frisch | Weich | Schnitt | Hart
    protected $age;             //In Reife | Jung | Mittel | Alt
    protected $package;         //Laibgross | Laibklein | Glas
    protected $plan;            //Aktuell | Nicht mehr produziert
    protected $amount;          //bestandsmenge
    protected $weight;          //gewicht
    protected $total;           //gesamt
    protected $createdAt;
    protected $updatedAt;


    public function setId($value){
        $this->id = $value;
    }
    public function getId(){
        return $this->id;
    }
    public function setEan($value){
        $this->ean = $value;
    }
    public function getEan(){
        return $this->ean;
    }
    public function setItem($value){
        $this->item = $value;
    }
    public function getItem(){
        return $this->item;
    }
    public function setOrigin($value){
        $this->origin = $value;
    }
    public function getOrigin(){
        return $this->origin;
    }
    public function setType($value){
        $this->type = $value;
    }
    public function getType(){
        return $this->type;
    }
    public function setAge($value){
        $this->age = $value;
    }
    public function getAge(){
        return $this->age;
    }
    public function setPackage($value){
        $this->package = $value;
    }
    public function getPackage(){
        return $this->package;
    }
    public function setPlan($value){
        $this->plan = $value;
    }
    public function getPlan(){
        return $this->plan;
    }
    public function setAmount($value){
        $this->amount = $value;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function setWeight($value){
        $this->weight = $value;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function setTotal($value){
        $this->total = $value;
    }
    public function getTotal(){
        return $this->total;
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
                'package' => array(
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
                    'constraint' => '50',
                    'null' => FALSE
                ),
                'updatedAt' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '50',
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
        
        $amount = $this->switcher($this->amount);
        $weight = $this->switcher($this->weight);
        $total = $amount * $weight;

    
        $data = [
            "ean"=>$this->ean,
            "item"=>$this->item,
            "origin"=>$this->origin,
            "type"=>$this->type,
            "age"=>$this->age,
            "package"=>$this->package,
            "plan"=>$this->plan,
            "amount"=>$amount,
            "weight"=>$weight,
            "total"=>$total
        ];

        $this->db->insert('product',$data);

    }

    public function update(){

        $amount = $this->switcher($this->amount);
        $weight = $this->switcher($this->weight);
        $total = $amount * $weight;

        $data = [
            "ean"=>$this->ean,
            "item"=>$this->item,
            "origin"=>$this->origin,
            "type"=>$this->type,
            "age"=>$this->age,
            "package"=>$this->package,
            "plan"=>$this->plan,
            "amount"=>$amount,
            "weight"=>$weight,
            "total"=>$total
        ];

        $this->db->where('id', $this->id);
        $this->db->update('product', $data);

    }

    public function updateFromProduction(){

        
        $data = [
            "amount"=>$this->amount,
            "weight"=>$this->weight,
            "total"=>$this->total
        ];

        $this->db->where('id', $this->id);
        $this->db->update('product', $data);


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

    public function getAll(){
        
        $this->db->select('*');
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result();

    }

    public function getOne($field,$value){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where($field,$value);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function ifExists($field,$value){
        $this->db->where($field,$value);
        $this->db->from('product');
        if($this->db->count_all_results()==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }




}