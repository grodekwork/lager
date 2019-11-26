<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller{

    public function __construct(){
        parent::__construct();

        

        //helpers

        $this->load->model('Info','info');

        //helpers

        $this->load->helpers('url');

        //libraries

        $this->load->library("session");

        //models

        $this->load->model('Product_Model','product');

        $this->load->model('Production_Model','production');

        $this->load->model('Dismount_Model','dismount');


        if(!$this->session->userdata('isLogged')){
            redirect(base_url());
        }


    }


    public function index(){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Produkte";
        $data['products'] = $this->product->getAll();

        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        $this->load->view("product/content");
        $this->load->view("templates/footer");



    }

    public function addProduct(){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Produkt Hinzufügen";


        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");

        if($this->input->post('addProduct')){

            $this->product->setEan($this->input->post('ean'));
            $this->product->setItem($this->input->post('item'));
            $this->product->setOrigin($this->input->post('origin'));
            $this->product->setType($this->input->post('type'));
            $this->product->setAge($this->input->post('age'));
            $this->product->setPackage($this->input->post('package'));
            $this->product->setPlan($this->input->post('plan'));
            $this->product->setAmount($this->input->post('amount'));
            $this->product->setWeight($this->input->post('weight'));
            //$this->product->setTotal($this->input->post('amount')*$this->input->post('weight'));
            
            if(!$this->product->ifExists('ean',$this->input->post('ean'))){

                $this->product->save();
                
                $url = base_url()."index.php/produkte";

                redirect($url);

            }else{

                $data['msg'] = "Produkt existiert: <strong>EAN/PLU Konflikt!</strong>";
                $data['link'] = base_url();

                $this->load->view('templates/warnings/info',$data);

                $data['product'] = $this->product;

                $this->load->view('product/reAddProduct',$data);

            }
            

            

        }else
            $this->load->view("product/addForm");


        $this->load->view("templates/footer");


    }


    public function updateProduct($id){

        if($this->product->ifExists('id',$id)){

            $data['product'] = $this->product->getOne('id',$id);

            $data['pageTitle'] = $this->info->getPageTitle() . " - Produkt Aktualisieren";


            $this->load->view("templates/header",$data);
            $this->load->view("templates/menu");

            if($this->input->post('updateProduct')){

                //if(!$this->product->ifExists('ean',$this->input->post('ean'))){

                $this->product->setId($this->input->post('id'));
                $this->product->setEan($this->input->post('ean'));
                $this->product->setItem($this->input->post('item'));
                $this->product->setOrigin($this->input->post('origin'));
                $this->product->setType($this->input->post('type'));
                $this->product->setAge($this->input->post('age'));
                $this->product->setPackage($this->input->post('package'));
                $this->product->setPlan($this->input->post('plan'));
                $this->product->setAmount($this->input->post('amount'));
                $this->product->setWeight($this->input->post('weight'));

                $this->product->update();

                $url = base_url() . "index.php/produkte";
                redirect($url);

                //}else{

                    $data['msg'] = "Produkt kann nicht aktualisiert werden. <strong>EAN/PLU existiert!</strong><br>Bitte richtige EAN/PLU Nummer schreiben.";
                    $data['link'] = base_url();

                    $this->load->view('templates/warnings/info',$data);

                    $this->load->view("product/editForm",$data);

                //}

                
            }else{
             
                $this->load->view("product/editForm",$data);

            }
            $this->load->view("templates/footer");

            


        }else{
            redirect(base_url());
        }


    }

    public function find(){

        if($this->input->post('findProduct')){
        
            $findCriterium = $this->input->post('product');

            $data['products'] = $this->product->getAll2($findCriterium); 

            //echo "<pre>";
            //print_r( $data['results']);
            //echo "</pre>";

        }

        $data['pageTitle'] = $this->info->getPageTitle() . " - Produktion";

        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");
        $this->load->view('product/findProductForm');

        if(!empty($data['products'])){
            $this->load->view('product/content',$data);
        }

        $this->load->view("templates/footer");


    }

    public function production(){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Produktion";
        $data['items'] = $this->product->getAll();

        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");

        if($this->input->post('saveProduction')){

                if(is_string($this->input->post('productionVolume'))){
                    //echo "Volume is String";
                }


                //$this->production->setProductionVolume($this->input->post('productionVolume'));
                $this->production->setProductionVolume($this->input->post('productionVolume'));
                
                //$this->production->setWeight($this->input->post('weight'));
                $this->production->setWeight($this->input->post('weight'));

                $this->production->setProductId($this->input->post('productId'));

                $this->production->setInfo($this->input->post('info'));

                $this->production->save();


                //get a product to update 

                $currentProduct = $this->product->getOne('id',$this->input->post('productId'));
                
                $newWeight = $currentProduct->weight + $this->switcher($this->production->getWeight());
                //$newAmount = $currentProduct->amount + $this->switcher($this->production->getProductionVolume());
                //$this->input->post('productionVolume')

                $newAmount = $currentProduct->amount + $this->switcher($this->input->post('productionVolume'));


                $productionTotal = $this->switcher($this->production->getProductionVolume()) * $this->switcher($this->production->getWeight());

                //$productionTotal = $this->switcher($this->input->post('productionVolume')) * $this->production->setWeight($this->input->post('weight'));


                $newTotal = $currentProduct->total + $productionTotal;

                $this->product->setId($this->input->post('productId'));
                $this->product->setAmount($newAmount);
                $this->product->setWeight($newWeight);
                $this->product->setTotal($newTotal);
                $this->product->updateFromProduction();

                $data['msg'] = "Produkt erfolgreich aktualisiert";
                $data['link'] = base_url() . "index.php/produkte";
                $data['linkAlt'] = "zurück";
        
                $this->load->view("templates/warnings/info",$data);


         

        }

        $this->load->view('production/newProduction',$data);

        $this->load->view("templates/footer");
    }

    public function giveAway(){

        $data['pageTitle'] = $this->info->getPageTitle() . " - Abgang";
        $data['items'] = $this->product->getAll();

        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");

        if($this->input->post('saveDismount')){
            
            //set Dismount Volume
            $this->dismount->setDismountVolume($this->switcher($this->input->post('dismountVolume')));
            
            //echo "A:".$this->dismount->getDismountVolume();

            //set Dismount weight
            $this->dismount->setWeight($this->switcher($this->input->post('weight')));

            //echo "<br>W:";
            //echo $this->dismount->getWeight();

            //set Info
            $this->dismount->setInfo($this->input->post('info'));


            //get Product to update
            $currentProduct = $this->product->getOne('id',$this->input->post('productId'));
            //echo "<br>";
            
            // new Weight
            $newWeight = $currentProduct->weight - $this->dismount->getWeight();

            //echo "Weight: Old: ". $currentProduct->weight . ", New: ". $newWeight;

            //new Amount
            $newAmount = $currentProduct->amount - $this->dismount->getDismountVolume();

            //echo "<br>Amount: Old: ". $currentProduct->amount . ", New: ". $newAmount;

            //Dismount
            $dismountTotal = $this->dismount->getWeight() * $this->dismount->getDismountVolume();

            //echo "<br>Amount Total: ". $dismountTotal;

            //echo "<br>Total: Old: ". $currentProduct->total . ", New: ". ($currentProduct->total - $dismountTotal);


            $this->dismount->setProductID($this->input->post('productId'));
            $this->dismount->save();

            $newTotal = $currentProduct->total - $dismountTotal;

            $this->product->setId($this->input->post('productId'));
            $this->product->setAmount($newAmount);
            $this->product->setWeight($newWeight);
            $this->product->setTotal($newTotal);
            $this->product->updateFromProduction();

            $data['msg'] = "Produkt erfolgreich aktualisiert";
            $data['link'] = base_url() . "index.php/produkte";
            $data['linkAlt'] = "zurück";
        
            $this->load->view("templates/warnings/info",$data);

            


        }
        $this->load->view("production/newDismount");
        $this->load->view("templates/footer");

    }


    public function bericht($value){

        $data['pageTitle'] = $this->info->getPageTitle() . " - " . $value;

        $this->load->view("templates/header",$data);
        $this->load->view("templates/menu");

        if($value=="abgang"){
            $data['title'] = "Abgang";
            $data['entires'] = $this->production->getAllDismount();
            
        }else{
            $data['title'] = "Produktion";
            $data['entires'] = $this->production->getAllProduction();

        }
        

        

        $this->load->view('production/raport',$data);
        $this->load->view("templates/footer");

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