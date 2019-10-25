<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DBConn extends CI_Model{

    protected $DBName;
    protected $tableNames = array();

    public function __construct(){

        $this->DBName = "dblager";
        parent::__construct();

        $this->load->dbutil();
		$this->load->dbforge();
        $this->load->database();


        $this->tableNames[] = "user";


    }

    public function ifDBExists(){
    
        if($this->dbutil->database_exists($this->DBName)){
            return 1;
        }else{
            return 0;
        }
    }

    public function ifTablesExist(){

        $flag = TRUE;

        foreach($this->tableNames as $table){
            if(!$this->db->table_exists($table)){
                $flag = FALSE;
            }
        }

        return $flag;

    }



}

?>