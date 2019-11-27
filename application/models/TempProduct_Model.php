<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TempProduct_Model extends CI_Model{

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
    protected $status;          //status, for example: check needed
    protected $tempList_id;
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
    public function setStatus($value){
        $this->status = $value;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getTempList_id(){
        return $this->tempList_id;
    }
    public function setTempList_id($value){
        $this->tempList_id = $value;
    }


    public function __construct(){
        parent::__construct();

        //load database
        $this->load->database();

        //load dbforge

        $this->load->dbforge();

    }

    public function makeTable(){

        if(!$this->db->table_exists('tempproduct')){

            $this->dbforge->add_field('id INT NOT NULL AUTO_INCREMENT PRIMARY KEY');
            $this->dbforge->add_field('ean VARCHAR(244) NULL');
            $this->dbforge->add_field('item VARCHAR(244) NULL');
            $this->dbforge->add_field('origin VARCHAR(244) NULL');
            $this->dbforge->add_field('type VARCHAR(120) NULL');
            $this->dbforge->add_field('age VARCHAR(120) NULL');
            $this->dbforge->add_field('package VARCHAR(120) NULL');
            $this->dbforge->add_field('plan VARCHAR(120) NULL');
            $this->dbforge->add_field('amount FLOAT(50) NULL');
            $this->dbforge->add_field('weight FLOAT(50) NULL');
            $this->dbforge->add_field('total FLOAT(50) NULL');
            $this->dbforge->add_field('status VARCHAR(240) NULL');
            $this->dbforge->add_field('tempList_id INT');
            $this->dbforge->add_field('createdAt DATETIME DEFAULT CURRENT_TIMESTAMP');
            $this->dbforge->add_field('updateAt DATETIME DEFAULT CURRENT_TIMESTAMP');

        
            
            $this->dbforge->create_table('tempproduct');

            return TRUE;

        }else{

            return FALSE;

        }

    }

    public function save(){
        
        $amount = $this->switcher($this->amount);
        $weight = $this->switcher($this->weight);
        //$total = $amount * $weight;
        $total = 0;
    
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
            "total"=>$total,
            "tempList_id"=>$this->tempList_id
        ];

        $this->db->insert('tempproduct',$data);

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
        $this->db->update('tempproduct', $data);

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