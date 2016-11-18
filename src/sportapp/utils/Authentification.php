<?php

namespace sportapp\utils;

use sportapp\model\Organiser;


class Authentification extends AbstractAuthentification
{

    public function __construct(){
        if(isset($_SESSION['user_login'])){
            $this->user_login = $_SESSION['user_login'];
            $this->logged_in = true;
            //$this->access_level = $_SESSION['access_level'];
        }else{
            $this->user_login = null;
            $this->logged_in = false;
           // $this->access_level = ACCESS_LEVEL_NONE;
        }
    }


    public function login($login){
        $user = Organiser::findByLogin($login);
        return $user;
    }
/*
    public function login($login){
        $user = User::findByLogin($login);
        return $user;

    }*/


    public function logout()
    {
        unset($_SESSION['user_login']);
        unset($_SESSION['access_level']);
        $this->logged_in = false;
    }
/*
    public function checkAccessRight($requested)
    {
        return ($this->access_level >= $requested);
    }
*/
/*
    function createUser($login, $pass, $accesLevel){
        $user=new User();
        $user->login=$login;
        $phash = password_hash($pass, PASSWORD_DEFAULT);
        $user->pass=$phash;
        $user->level=$accesLevel;
        $user->save();
    }*/
}