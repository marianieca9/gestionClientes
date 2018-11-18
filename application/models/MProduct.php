<?php

require_once('class/class.product.php');


class MProduct extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function mapperRow($row){
        $rowarray = json_decode(json_encode($row), true);
        $product = new Product();

        $product->name = $rowarray[PRODUCTS_COLUMN_NAME];
        $product->code = $rowarray[PRODUCTS_COLUMN_CODE];
        $product->dscrp = $rowarray[PRODUCTS_COLUMN_DESCRIPTION];

        return $product;
    }

    private function mapperArray($data){
      if (isset($data)){
          $products = array();
          foreach ($data->result() as $row){
              $product = $this->mapperRow($row);
              array_push($products,$product);
          }

          return $products;
      }else{
          return false;
      }
    }


    public function get($limit=1000,$start=0,$query=NULL){
        $query = "select * from ".TABLE_PRODUCTS;
        $data = $this->db->query($query);
        $this->db->flush_cache();
        $products = $this->mapperArray($data);

        return $products;
    }

    public function getByCode($code){
        $query = "select * from ".TABLE_PRODUCTS." where ".PRODUCTS_COLUMN_CODE."='".$code."'";
        $data = $this->db->query($query);
        $this->db->flush_cache();
        $products = $this->mapperArray($data);
        
        return $products;
    }

    public function saveProducts($arrayProducts){

        $res = $this->db->insert(TABLE_PRODUCTS,$arrayProducts);
        $this->db->flush_cache();
        
        return  true;
    }
}

?>