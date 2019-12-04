<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BackupController extends CI_Controller{

    public function __construct(){
        parent::__construct();

        //load models

        $this->load->model('Product_Model','product');
        $this->load->model('Templist_Model','templist');
        $this->load->model('TempProduct_Model','tempproduct');
            
        //load helpers

        $this->load->helper('url');

        if(!$this->session->userdata('isLogged')){
            redirect(base_url());
        }
        

    }

    //make a backup of table Products

    public function backup(){



    }

    //switch table Products with one of waiting table

    public function reloadTables(){

        if($this->input->post('reloadTablesBtn')){

            //make first backup

            //make new waiting list

            $this->templist->setInfo('Backup');
            $this->templist->setSourceFile('--');

            $code = "B".rand(1000,99999);

            $this->templist->setCheckcode($code);

            $this->templist->save();

            // save all products from main table into waiting list
            // with ckeckcode $code

            $products = $this->product->getAll();

            foreach($products as $product){

                $this->tempproduct->setEan($product->ean);
                $this->tempproduct->setItem($product->item);
                $this->tempproduct->setOrigin($product->origin);
                $this->tempproduct->setType($product->type);
                $this->tempproduct->setAge($product->age);
                $this->tempproduct->setPackage($product->package);
                $this->tempproduct->setPlan($product->plan);
                $this->tempproduct->setAmount($product->amount);
                $this->tempproduct->setWeight($product->weight);
                $this->tempproduct->setTotal($product->total);
                $this->tempproduct->setTempList_id($code);

                $this->tempproduct->save();



            }


            //delete all products from main table

            $this->product->deleteAll();

            //find waiting list by id

            $templist = $this->templist->getOne('id',$this->input->post('waitingListId'));

            // access to checkcode: $templist->checkcode;


            //set new products to main table from waiting list

            $tempproducts = $this->tempproduct->getProductsFromList($templist->checkcode);

            

            foreach($tempproducts as $tempproduct){

                $this->product->setEan($tempproduct->ean);
                $this->product->setItem($tempproduct->item);
                $this->product->setOrigin($tempproduct->origin);
                $this->product->setType($tempproduct->type);
                $this->product->setAge($tempproduct->age);
                $this->product->setPackage($tempproduct->package);
                $this->product->setPlan($tempproduct->plan);
                $this->product->setAmount($tempproduct->amount);
                $this->product->setWeight($tempproduct->weight);
                $this->product->setTotal($tempproduct->total);

                $this->product->save();

            }

            //echo "<pre>";
            //print_r($tempproducts);
            //echo "</pre>";



            $data['pageTitle'] ="Die alle Produkte sind erfolgreich gelöscht geworden <br> Beckup eingerichtet und die Produkte von Warteliste zurückgestetzt.";

            $data['msg'] = "Die alle Produkte sind erfolgreich gelöscht geworden";
                $data['link'] = base_url();
                $data['linkAlt'] = "zurück";

                

            $this->load->view("templates/header",$data);
            $this->load->view("templates/menu");
            $this->load->view("templates/warnings/info",$data);
            $this->load->view("templates/footer");

            

        }else{

            $waitingListId = $this->input->post('waitingListId');

            $data['pageTitle'] = "Reload!!";

            $data['msg'] = "Sind Sie sicher? Möchten Sie die Haupt Tabelle austauschen?";
            $data['actionUrl'] = base_url() . "index.php/backup/reloadtables";
            $data['buttonValue'] = "Ja, zurücksetzen.";
            $data['buttonName'] = "reloadTablesBtn";

            $data['input1'] = array(
                'name' => 'waitingListId',
                'value' => $waitingListId
            );
            
                

            $this->load->view("templates/header",$data);
            $this->load->view("templates/menu");
            $this->load->view("backup/reloadForm",$data);
            $this->load->view("templates/footer");
        }

    }

    public function updateTableProducts(){

        if($this->input->post('updateTablesBtn')){

            
            $waitingListId = $this->input->post('waitingListId');

            $getList = $this->templist->getOne('id',$waitingListId);

            $checkcode = $getList->checkcode;

            $tempProducts = $this->tempproduct->getProductsFromList($checkcode);

            $howManyUpdated = 0;
            $howManyAdded = 0;

            foreach($tempProducts as $tempproduct){

                $ean = $tempproduct->ean;
                
                if($this->product->ifExists('ean',$ean)){

                    //if product already exists
                    //update the states

                    //find product id

                    $currentProduct = $this->product->getOne('ean',$ean);

                    $productId = $currentProduct->id;


                    $this->product->setId($productId);
                    $this->product->setAmount($tempproduct->amount+$currentProduct->amount);
                    $this->product->setweight($tempproduct->weight+$currentProduct->weight);
                    $this->product->setTotal($tempproduct->total+$currentProduct->total);

                    $this->product->updateFromProduction();

                    $howManyUpdated++;
                    

                }else{

                    //if product doesn't exists
                    //add as new product


                    $this->product->setEan($tempproduct->ean);
                    $this->product->setItem($tempproduct->item);
                    $this->product->setOrigin($tempproduct->origin);
                    $this->product->setType($tempproduct->type);
                    $this->product->setAge($tempproduct->age);
                    $this->product->setPackage($tempproduct->package);
                    $this->product->setPlan($tempproduct->plan);
                    $this->product->setAmount($tempproduct->amount);
                    $this->product->setWeight($tempproduct->weight);

                    $this->product->save();

                    $howManyAdded++;


                }

            
            }

                $data['pageTitle'] = "Updated";
 
                $this->load->view("templates/header",$data);
                $this->load->view("templates/menu");
                
                $data['msg'] = "<p>" . $howManyUpdated . " Produkte sind erfolgreich aktualisiert!</p><p>" . $howManyAdded . " Produkte sind erfolgreich hinzugefügt!</p>";
                $data['link'] = base_url();
                $data['linkAlt'] = "zurück";

                $this->load->view("templates/warnings/info",$data);

                $this->load->view("templates/footer");




            
        }else{

        


            $waitingListId = $this->input->post('waitingListId');

            $data['pageTitle'] = $waitingListId . "Reload!!";

            $data['msg'] = "Sind Sie sicher? Möchten Sie die Haupt Tabelle aktualisieren?";
            $data['actionUrl'] = base_url() . "index.php/backup/updatetables";
            $data['buttonValue'] = "Ja, aktualisieren.";
            $data['buttonName'] = "updateTablesBtn";

            $data['input1'] = array(
                'name' => 'waitingListId',
                'value' => $waitingListId
            );
            
                

            $this->load->view("templates/header",$data);
            $this->load->view("templates/menu");
            $this->load->view("backup/reloadForm",$data);
            $this->load->view("templates/footer");
        
        
        }


    }




}