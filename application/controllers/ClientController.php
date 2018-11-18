<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ClientController extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('MClient');
        $this->load->model('MProduct');
        $this->lang->load('admin','english');
	}

  
	public function index(){
        //Load the view
        $this->data['header']=$this->load->view('header', '', true);
        $this->data['footer']=$this->load->view('footer', '', true);
        $this->load->view('client', $this->data);  
	}
    
    
    //Add new client or edit client
    public function get_data_client($dniClient=null) {
        $data = array();
        $this->data['header']=$this->load->view('header', '', true);
        $this->data['footer']=$this->load->view('footer', '', true);
        $this->data['client']='';
        $this->data['dniOld']='new';
        
        if ($dniClient!=null) {
            $client=$this->clientByDni($dniClient);
            if ($client!=null && count($client)>0) {
                $this->data['dniOld']=$client[0]->dni;
                $this->data['client']=$client;
            }
        }
        
        $this->load->view('dataClient', $this->data);
    }
    
    public function showProdutsByDni($dniClient=null) {
        $data = array();
        $this->data['header']=$this->load->view('header', '', true);
        $this->data['footer']=$this->load->view('footer', '', true);
        $this->data['dni']=$dniClient;
        $this->load->view('rel_client_product', $this->data);
    }
    
    //Get all clients
    public function clientAll($limit,$start){
        $clients=$this->MClient->get($limit,$start);
        echo json_encode($clients);
	 }
    
    //Get client by dni
    public function clientByDni($dni=NULL){

		 if($dni!=NULL && $dni!=''){
            $client=$this->MClient->getByDNI($dni);
            return $client;
		 } else {
             return false;
         }
	 }
    
    
    public function clientWithProductByDni($dni=null){
        $client=$this->clientByDni($dni);
        $arrayProducts=$this->MProduct->get(null,null);
        
        if ($dni!=null) {
            $arrayRelCP=$this->MClient->relClientProduct($dni);
            if ($arrayRelCP!=null && count($arrayRelCP)>0){
                foreach ($arrayRelCP as $key => $relCP) {
                    array_push($client[0]->arrayProducts,$relCP->code_product);
                }
            }
        }
        
        $data = array(
            'client'=>$client,
            'arrayP'=>$arrayProducts
        );
        echo json_encode($data);
    }
    
    
    //Save new or edit data client
    public function saveDataClient() {
        
        $dniClient=$this->input->post("inputDni");
        $typeOp=$this->input->post("dniClient");
        
        if (strcmp($dniClient,$typeOp)!=0){
            $exist=$this->clientByDni($dniClient);
        }else {
            $exist=null;
        } 
        
        if ($exist!=null && count($exist)>0) {
            echo "exist";
        }else {
            $name=$this->input->post("inputName");
            $surname=$this->input->post("inputSurname");
            $address=$this->input->post("inputAddress");
            $phone=$this->input->post("inputPhone");
            $email=$this->input->post("inputEmail");
            
            $clientData = array(
                CLIENTS_COLUMN_NAME=>$name,
                CLIENTS_COLUMN_SURNAME=>$surname,
                CLIENTS_COLUMN_DNI=>$dniClient,
                CLIENTS_COLUMN_ADDRESS=>$address,
                CLIENTS_COLUMN_PHONE=>$phone,
                CLIENTS_COLUMN_EMAIL=>$email
            );
            
            if ($typeOp!=null && strcmp($typeOp, "new")==0) {
                $client=$this->MClient->newClient($clientData);
                echo json_encode($client);
            }else if($typeOp!=null && strcmp($typeOp, "new")!=0) {
                $client=$this->MClient->updateClient($clientData, $typeOp);
                if(strcmp($dniClient,$typeOp)!=0){
                    $this->MClient->updateRelClientProduct($dniClient, $typeOp);
                }
                echo json_encode($client);
            }else {
                echo "error";
            }
        }
    }
    
    //Delete client
    public function deleteClient($dniClient) {
        $client=$this->MClient->deleteClient($dniClient);
        $this->MClient->deleteRelClientProduct($dniClient,null);
        
        echo json_encode($client);
    }
    
    //Add product -> client
    public function addProductClient(){
        $dni=$this->input->post("dniClient");
        $arrayCode=$this->input->post("selectProducts");
        $res=$this->MClient->addRelClientProduct($dni,$arrayCode);
        echo $res;
    }
    
    //Delete product -> client
    public function deleteProductClient(){
        $dni=$this->input->post("dni");
        $code=$this->input->post("code");
        
        $res=$this->MClient->deleteRelClientProduct($dni,$code);
        echo $res;
    }
    
    
}
