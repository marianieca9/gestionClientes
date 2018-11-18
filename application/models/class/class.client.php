<?php

class Client {

    public $name;
    public $surname;
    public $dni;
    public $address;
    public $phone;
    public $email;
    public $arrayProducts=array();

    public function __construct(){
        $this->name=NULL;
        $this->surname=NULL;
        $this->dni=NULL;
        $this->address=NULL;
        $this->phone=NULL;
        $this->email=NULL;
        $this->arrayProducts=array();
    }

}

?>
