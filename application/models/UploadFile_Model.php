<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UploadFile_Model extends CI_Model{

    protected $id;
    protected $filename;
    protected $createdAt;

    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this->id = $value;
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

    public function delete(){

        $this->db->where('id',$this->id);
        $this->db->delete('uploads');

    }

    public function getOne($feld,$value){
        $this->db->select('*');
        $this->db->from('uploads');
        $this->db->where($feld,$value);
        $this->db->limit('1');
        $query = $this->db->get();

        return $query->row();
    }

    public function readCSV(){

        $exportData = array();

        $row = 0;

        if($handle = fopen($this->filename, "r")){

            while(($data = fgetcsv($handle, 1000, ";"))!==FALSE){
                
                $num = count($data);

                //echo "<p>$num Felder in Zeile $row: <br /></p>\n";
                
                
                for($c=0;$c<$num;$c++){
                    //echo $data[$c] . " ";
                    if($data[$c]!="#NV"){
                        $exportData[$row][$c] = $this->convert($data[$c]);
                    }
                    
                }

                $row++;
                //echo "<br />\n";
            }

            fclose($handle);

            //echo "<pre>";
            //print_r($exportData);
            //echo "</pre>";
            
            

            return $exportData;

        }
        
    }
    
    //Convert into Windows UTF-9

    public function convert( $str ) {
        return iconv( "Windows-1252", "UTF-8", $str );
    }

}