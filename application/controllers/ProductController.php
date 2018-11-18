<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('MProduct');
        $this->lang->load('admin','english');
//        $languages = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
//        $this->lang->load('admin',$languages[0]);
	}

  
	public function index(){
        //Load the view
        $this->data['header']=$this->load->view('headerInit', '', true);
        $this->data['footer']=$this->load->view('footer', '', true);
        $this->load->view('mainPage', $this->data);  
	}
    
    public function chargeFile(){
        $name = $_FILES['file']['name'];
        $now = new DateTime();

        $config['upload_path'] = 'application/files/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10000000'; //10MB
        $config['file_name'] = $name;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        

       if ($this->upload->do_upload('file')){
            $data = $this->upload->data();
            $totSegments = $this->uri->total_segments();
            $dataSave = array(
                'projectID' => $this->uri->segment($totSegments),
                'url' => $name,
                'size' => $data['file_size'],
                'unixStamp' => $now->getTimestamp(),
            );

           //Guardar en BD
            $fileJSON = file_get_contents("application/files/".$name);
            $products = json_decode($fileJSON);
            foreach($products as $key=> $p){
                $res=$this->MProduct->saveProducts($p);
            }
           echo json_encode($products);

        } else{
            $error = array('error' => $this->upload->display_errors('',''));
            echo json_encode(array($error));
        }
    }
    
    public function showListProducts(){
        //Load the view
        $this->data['header']=$this->load->view('header', '', true);
        $this->data['footer']=$this->load->view('footer', '', true);
        $this->load->view('product', $this->data);  
    }
    
    
    //Get all products
    public function productsAll($limit,$start){
        $products=$this->MProduct->get($limit,$start);
        echo json_encode($products);
	 }
    
    //Get product by code
    public function productByCode($code=NULL){
		 if($code!=NULL && $code!=''){
            $product=$this->MProduct->getByCode($code);
            echo json_encode($product);
		 } else {
             echo false;
         }
	 }

    //Save list products
    public function saveListProducts(){
        $arrayProducts=$this->input->post("arrayProducts");
        $res=$this->MProduct->saveProducts($arrayProducts);
    }
}
