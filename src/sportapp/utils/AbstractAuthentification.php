<?php

namespace sportapp\utils;

abstract class AbstractAuthentification {

    /* l'identifiant de l'utilisateur connecté */ 
    protected $user_login   = null;

    /* son niveau d'accès */
   // protected $access_level = ACCESS_LEVEL_NONE;

    /* vrai s'il connecté */
    protected $logged_in    = false;
    
    public function __get($attr_name) {
        if (property_exists( __CLASS__, $attr_name))
            return $this->$attr_name;
        $emess = __CLASS__ . ": unknown member $attr_name (__get)";
        throw new \Exception($emess);
    }
    
    public function __set($attr_name, $attr_val) {
        if (property_exists( __CLASS__, $attr_name)) 
            $this->$attr_name=$attr_val; 
        else{
            $emess = __CLASS__ . ": unknown member $attr_name (__set)";
            throw new \Exception($emess);
        }
    }

    public function __toString(){
        $prop = get_object_vars ($this);
        $str="";
        foreach ($prop as $name => $val){
            if( !is_array($val) ) 
                $str .= "$name : $val <br> ";
            else
                $str .= "$name : ". print_r($val, TRUE)."<br>";
        }
        return $str;
    } 

}