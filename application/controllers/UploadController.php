<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UploadController extends CI_Controller{

        public function __construct(){
        parent::__construct();

        $this->load->model('Info','info');

        $this->load->model('UploadFile_Model','uploadModel');
        $this->load->model('TempList_Model','templist');
        $this->load->model('TempProduct_Model','tempproduct');
        

        //libraries

        $this->load->library("session");

        //helpers

        $this->load->helpers('url');
        $this->load->helpers('form');

        if(!$this->session->userdata('isLogged')){
            redirect(base_url());
        }

    }

    public function main(){

        //config
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'csv';
                //$config['allowed_types']        = 'csv|xlsx|xls';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

        //-----------------------------------------------------------------------------

        $data['pageTitle'] = $this->info->getPageTitle() . " - Upload";
        
        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");

        if($this->input->post('doUpload')){

            if($this->upload->do_upload('bestandFile')){

                $data = array('upload_data' => $this->upload->data());
                $this->load->view("upload/uploadcomplete",$data);
               
                //set only name from array

                $this->uploadModel->setFilename($data['upload_data']['file_name']);
                
                $this->uploadModel->setStatus('new');

                //save into database

                $this->uploadModel->save();

            }else{

                //error page
                $data['error'] = $this->upload->display_errors();

                $this->load->view('upload/errormsg',$data);

                $this->load->view("upload/main",$data);
            }
            
        }else{
            $this->load->view("upload/main");
        }

        $this->load->view("templates/footer");


    }

    public function reload($id){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Die Produkte reload";

        $file = $this->uploadModel->getOne('id',$id);

        //-- if file doesn't exists

        if(!$file){

            $data['msg'] = "Datei nicht gefunden!";
            $data['link'] = base_url() . "index.php/upload/raport";
            $data['linkAlt'] = "Zurück.";
            
        
            $this->load->view("templates/header",$data);
            $this->load->view("templates/menu");
            $this->load->view("templates/warnings/info",$data);
            $this->load->view("templates/footer");

        
            //else, set the File

        }else{

            $filePath = base_url() . "uploads/".$file->filename;

            $this->uploadModel->setFilename($filePath);

            $data['fileId'] = $file->id;
            $data['filename'] = $file->filename;

            //MAKE shIT DONE!

            $data['productsFromFile'] = $this->uploadModel->readCSV();

            //if($this->input->post('setIt')){

                $this->load->model('TempList_Model','templist');
                $this->load->model('TempProduct_Model','tempproduct');

                //change status of uploaded file
                $this->uploadModel->setId($file->id);
                $this->uploadModel->setStatus('added');
                $this->uploadModel->update();

                $this->templist->setSourceFile($file->filename);

                $this->templist->setInfo("TEST 1");

                $code = rand(1000,99999);

                $this->templist->setCheckcode($code);

                $this->templist->save();

                //echo "<p>".$this->templist->getSourceFile()."</p>";

                foreach($data['productsFromFile'] as $file => $value){

                    $this->tempproduct->setEan($value[1]);
                    $this->tempproduct->setItem($value[2]);
                    $this->tempproduct->setOrigin($value[3]);
                    $this->tempproduct->setType($value[4]);
                    $this->tempproduct->setAge($value[5]);
                    $this->tempproduct->setPackage($value[6]);
                    $this->tempproduct->setPlan($value[7]);
                    $this->tempproduct->setAmount($value[8]);
                    $this->tempproduct->setWeight($value[9]);
                    //$this->tempproduct->setTotal($value[10]);
                    $this->tempproduct->setTempList_id($code);

                    $this->tempproduct->save();

                }


                $url = base_url() . "index.php/upload/warteliste";

                redirect($url);



           // }

                $this->load->view("templates/header",$data);
                $this->load->view("templates/menu");
                $this->load->view('upload/fileSetup');
                $this->load->view("templates/footer");

            
            


        }


    }

    public function raport(){

        $data['files'] = $this->uploadModel->getAll();

        $data['pageTitle'] = $this->info->getPageTitle() . " - Files Uploaded";
        
        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        $this->load->view('upload/raport',$data);
        $this->load->view("templates/footer");
    }

    //Function wchich delete File from server and database

    public function deleteFile($fileId){

        $data['pageTitle'] = $this->info->getPageTitle() . " - File delete";
        $data['fileId'] = $fileId;

        $data['file'] = $this->uploadModel->getOne('id',$fileId);

        if($this->input->post('deleteFile')){
            
            $this->uploadModel->setId($this->input->post('fileId'));
            $this->uploadModel->setFilename($this->input->post('filename'));

            //echo "<p>".$this->uploadModel->getId()."</p>";

            $url = base_url() . "uploads/".$this->uploadModel->getFilename();

            //$newurl =  base_url() . "uploads/temp".$this->uploadModel->getFilename();
            //copy($url,$newurl)
            //$newurl =  base_url() . "uploads/temp".$this->uploadModel->getFilename().".tmp";
            
            
            if(unlink($url)){
                echo "File Deleted.";
                
                //delete from Database

                $this->uploadModel->delete();
            }

            //for testing

            $this->uploadModel->delete();
            


        }

        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        $this->load->view('upload/delete',$data);
        $this->load->view("templates/footer");

    }

    public function warteliste(){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Warteliste";

        $data['wartelisten'] = $this->templist->getAll();


        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        $this->load->view('upload/warteliste');
        $this->load->view("templates/footer");
    }

    public function wartelisteDetails($listId){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Warteliste";

        $listId = $this->templist->getOne('id',$listId);

        $data['products'] = $this->tempproduct->getProductsFromList($listId->checkcode);
        
        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        
        $this->load->view("templates/footer");


    }


}