<?php

//Interface

interface Rebirth {
    public function liveAsHuman();
    public function dieAsHuman();
    public function goToEarth($balance);
}

//Interfaces extend from Interfaces

interface Karma extends Rebirth {

}

//Abstrac Class

abstract class Human {
    
    abstract public function breath();

    //we can call static function without instance of a Class
    //must use Human::inhale('String') or self::inhale('String')
    //Static attr|method cannot access common class attrs
    public static function inhale($msg) {
        print "Breath In";
    }

    public static function exhale($msg) {
        print "Breath Out";
    }

    public static function say($msg) {
        print $msg;
    }
}


// OOP
//Class extends from Abstract Class and implements Interface
class Person extends Human implements Karma{
    
    //accesible on local & child object
    public $age;
    public $name;
    public $address;
    
    //accesible local and child objects
    protected $nickname;
    protected $config = array();
    protected $mood = array();
    
    //accessible local class use
    private $pass;
    private $personality = array();
    private $skills = array();

    //access by self::$staticVar
    //Cannot be accessed by common class methods | Static method only access
    public static $staticVar = 'Default Message - Okay. Pura vida.';

    public function __construct($name, $nickname, $age) {
        //Uncomment this if you want to inherit from parent Class Construct Method
        //parent::__construct();

        self::inhale('string');
        self::speak("Good morning I'm awake! </br>");
        
        //emulate a db interaction
        $this->pass = 'itrustyou';
    }

    public function __destruct() {
        print "Time to sleep... </br>";
    }

    public function run($km) {
        for($i = 0; $i <= $km; $i++){
            echo "Running distance $i </br>";
        }
    }

    public static function speak($msg) {
        print $msg;
    }

    public function tellSecret($pass) {
        
        if($this->pass == $pass) {
            self::speak("I trust you. My secret is I love you.</br>");
        } else {
            self::speak("I won't tell my secret.</br>");
        }
    }

    public function setSkill($name, $var) {
        $this->skills[$name] = $var;
    }

    public function study($level) {
        
        if($level <= 10) {
            $this->setSkill('New Skill', 'value');
        } else {
            self::speak("I'm studing & training this new skill...");
        }
    }


    //implements interface and abstrac class methods

    public function breath() {

    }

    public function liveAsHuman() {
        
    }

    public function dieAsHuman() {
        
    }

    public function goToEarth($balance = true) {
        
    }
}
//access to static function
Person::speak("Static functions don't instance the containing class");

$person = new Person($name = 'Name', $nickname = 'Nickname', $age = 28);
$person->run($km = 5);
//static functions work like helpers - they don't instance a class
$person::speak("Hey'all. </br>");
$person->tellSecret('imastranger');
$person->tellSecret('itrustyou');

//Destroy Class Object
unset($person);

//Documentation for Autoload classes
//http://php.net/manual/es/function.spl-autoload-register.php
