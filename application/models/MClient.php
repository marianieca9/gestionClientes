<?php

require_once('class/class.client.php');
require_once('class/class.relCP.php');

class MClient extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function mapperRow($row){
        $rowarray = json_decode(json_encode($row), true);
        $client = new Client();

        $client->name = $rowarray[CLIENTS_COLUMN_NAME];
        $client->surname = $rowarray[CLIENTS_COLUMN_SURNAME];
        $client->dni = $rowarray[CLIENTS_COLUMN_DNI];
        $client->address = $rowarray[CLIENTS_COLUMN_ADDRESS];
        $client->phone = $rowarray[CLIENTS_COLUMN_PHONE];
        $client->email = $rowarray[CLIENTS_COLUMN_EMAIL];

        return $client;
    }

    private function mapperArray($data){
      if (isset($data)){
          $clients = array();
          foreach ($data->result() as $row){
              $client = $this->mapperRow($row);
              array_push($clients,$client);
          }

          return $clients;
      }else{
          return false;
      }
    }

    private function mapperArrayRelCP($data){
      if (isset($data)){
          $arrayRelcp = array();
          foreach ($data->result() as $row){
                $rowarray = json_decode(json_encode($row), true);
                $relcp = new RelCP();

                $relcp->dni_client = $rowarray[REL_CP_COLUMN_DNI];
                $relcp->code_product = $rowarray[REL_CP_COLUMN_CODE];
                array_push($arrayRelcp,$relcp);
          }

          return $arrayRelcp;
      }else{
          return false;
      }
    }
    
    public function get($limit=1000,$start=0){
        $query = "select * from ".TABLE_CLIENTS;
        $data = $this->db->query($query);
        $this->db->flush_cache();
        $clients = $this->mapperArray($data);

        return $clients;
    }

    public function getByDNI($dni){
        $query = "select * from ".TABLE_CLIENTS." where ".CLIENTS_COLUMN_DNI."='".$dni."'";
        $data = $this->db->query($query);
        $this->db->flush_cache();
        $clients = $this->mapperArray($data);

        return $clients;
    }

    public function newClient($client){
        $res = $this->db->insert(TABLE_CLIENTS,$client);
        $this->db->flush_cache();
        
        return  true;
    }

    public function updateClient($client,$dniOld){
        
        $this->db->where(CLIENTS_COLUMN_DNI, $dniOld);
        $res = $this->db->update(TABLE_CLIENTS, $client);

        $this->db->flush_cache();
        return $res;
    }
    
    public function deleteClient($dni){
        $this->db->where(CLIENTS_COLUMN_DNI, $dni);
        $this->db->delete(TABLE_CLIENTS);

        $this->db->flush_cache();
        return true;
    }
    
    public function relClientProduct($dni){
        $query = "select * from ".TABLE_REL_CLIENTS_PRODUCTS." where ".REL_CP_COLUMN_DNI."='".$dni."'";
        $data = $this->db->query($query);
        $this->db->flush_cache();
        $arrayCP = $this->mapperArrayRelCP($data);

        return $arrayCP;
    }
    
    public function addRelClientProduct($dni,$arrayP){
        $this->db->where(REL_CP_COLUMN_DNI,$dni);
        $this->db->delete(TABLE_REL_CLIENTS_PRODUCTS);


        $str = 'insert into '.TABLE_REL_CLIENTS_PRODUCTS.'('.REL_CP_COLUMN_DNI.','.REL_CP_COLUMN_CODE.') values ';

        $num = count($arrayP);
        for($i=0; $i<$num; $i++){
            $str = $str."('".$dni."','".$arrayP[$i]."')";
            if ($i<$num-1){
                $str = $str.',';
            }
        }

        $res = $this->db->query($str);
        $this->db->flush_cache();
        return true;
    }
    
    public function updateRelClientProduct($dniNew, $dniOld){
        
        $this->db->set(REL_CP_COLUMN_DNI, $dniNew);
        $this->db->where(REL_CP_COLUMN_DNI, $dniOld);
        $this->db->update(TABLE_REL_CLIENTS_PRODUCTS); 
    
        $this->db->flush_cache();
        return true;
    }
    
    public function deleteRelClientProduct($dni,$code){
        
        if($dni!=null){
            $this->db->where(REL_CP_COLUMN_DNI, $dni);
        }
        if($code!=null){
            $this->db->where(REL_CP_COLUMN_CODE, $code);
        }
    
        $this->db->delete(TABLE_REL_CLIENTS_PRODUCTS);

        $this->db->flush_cache();
        return true;
    }
    

}

?>
