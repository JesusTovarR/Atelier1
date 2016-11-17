<?php
namespace sportapp\utils;

class HttpRequest extends AbstractHttpRequest{

    public function __construct(){
            $this->get = $_GET;
            $this->post = $_POST;
        if(isset($_SERVER['PATH_INFO'])){
            $this->path_info = $_SERVER['PATH_INFO'];
        }
        if(isset($_SERVER['REQUEST_METHOD'])){
            $this->method = $_SERVER['REQUEST_METHOD'];
        }

        if(isset($_SERVER['QUERY_STRING'])) {
            $this->query = $_SERVER['QUERY_STRING'];
        }
        if(isset($_SERVER['SCRIPT_NAME'])){
            $this->script_name = $_SERVER['SCRIPT_NAME'];
        }
    }

    public function getRoot(){
        return dirname($this->script_name);
    }

    //strops trouve la valeur donnee dans le string et retourne un numero int avec sa position. On commence a compter depuis 0.
    //Il peut aussi commencer compter depuis certaine positione si on lui donne la valeur comme deuxieme parametre
    //substr returne la chaine de caractere d'un string qui se trouve entre les positiones des deux valeurs donnes.
    public function getController(){
        $delimiter = "/";
        $pos1 = strpos($this->path_info, $delimiter);
        $pos2 = strpos($this->path_info, $delimiter, $pos1+1);
        return substr($this->path_info, $pos1+1, ($pos2)-1);
    }
    //strlen returne le numero de caracteres qui a un string en commencant par 1

    public function getAction(){
        $delimiter = "/";
        $pos1 = strpos($this->path_info, $delimiter);
        $pos2 = strpos($this->path_info, $delimiter, $pos1+1);
        return substr($this->path_info, $pos2+1, strlen($this->path_info)-$pos2);
    }
}

