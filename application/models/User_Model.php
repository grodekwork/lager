<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class User_Model extends CI_Model{

    protected $login;
    protected $pass;
    protected $mail;
    protected $role;
    protected $active;
    protected $createdAt;

    public function __construct(){

        //load database library

        $this -> load -> database();
        
        //load database utilities

        $this -> load -> dbutil();

        //load dbforge

        $this->load->dbforge();
    }


    public function setLogin($value){
        $this->login=$value;
    }
    public function setPass($value){
        $this->pass=$value;
    }
    public function setMail($value){
        $this->mail=$value;
    }
    public function setActive($value){
        $this->active=$value;
    }
    public function setCreatedAt($value){
        $this->createdAt=$value;
    }

    public function makeTable(){

        if(!$this->db->table_exists('user')){

            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'login' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '240',
                    'null' => FALSE
                ),
                'pass' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '240',
                    'null' => FALSE
                ),
                'mail' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '160',
                    'null' => FALSE
                ),
                'active' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => TRUE
                ),
                'createdAt' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => TRUE
                )
            );

            $this->dbforge->add_key('id',TRUE);
            $this->dbforge->add_field($fields);
            $this->dbforge->create_table('user');

            return TRUE;

        }else{
            return FALSE;
        }


    }

    public function save(){
        
        $today = date('Y-m-d');

        $data = [
            "login"=>$this->login,
            "pass"=>$this->pass,
            "mail"=>$this->mail,
            "active"=>$this->active,
            "createdAt"=>$today
        ];

        $this->db->insert('user',$data);
    }

    public function getUser(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('login',$this->login);
        $this->db->limit("1");

        $query=$this->db->get();

        return $query->row();

    }

    public function ifExists(){

        $this->db->where('login',$this->login);
        $this->db->from('user');
        return $this->db->count_all_results();

    }



}

?>