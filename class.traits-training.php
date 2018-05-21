<?php

trait User {
    public $username = 'Developer';
    private $pass = '123';
    abstract function setUsername($name);
    abstract function getUsername($id);
}

trait Talk {
    protected function message($msg) {
        echo $msg;
    }
}

class Person {
    use User, Talk;
    
    public function setUsername($name) {
        $this->username = $name;
    }

    public function getUsername($id){
        $this->message($this->username.' - '.$id);
    }
}

$person = new Person();
$person->setUsername('customer');
$person->getUsername(10);
