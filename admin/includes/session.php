<?php
/**
 * Created by PhpStorm.
 * User: Lumy
 * Date: 6/08/2015
 * Time: 11:31 AM
 */
class Session{

    private  $signed_in = false;
    public  $id;
    //constructor
    function __construct(){
        //auto run session when it is called
        session_start();
        //call the method
        $this->check_the_login();

    }
    public function is_signed_in(){
        return $this->signed_in;
    }

    public function login($user){
        if($user){
            $this->user_id = $_SESSION['id'] =$user->id;
            $this->signed_in = true;
        }
    }

    public function logout($user){
        unset($this->id);
        unset($_SESSION['id']);
        $this->signed_in = false;

        session_destroy();

    }
    private function check_the_login(){

        if(isset($_SESSION['id'])){
            $this->id = $_SESSION['id'];
            $this->signed_in = true;

        }else{
           unset($this->id);
           $this->signed_in = false;
        }
    }

}

$session = new Session();

