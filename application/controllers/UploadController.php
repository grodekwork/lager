<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UploadController extends CI_Controller{

        public function __construct(){
        parent::__construct();

        $this->load->model('Info','info');

        $this->load->model('UploadFile_Model','uploadModel');

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

        $filePath = base_url() . "uploads/".$file->filename;

        $this->uploadModel->setFilename($filePath);

        $data['fileId'] = $file->id;

        $data['productsFromFile'] = $this->uploadModel->readCSV();

        
        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        $this->load->view('upload/fileSetup');
        $this->load->view("templates/footer");
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


}