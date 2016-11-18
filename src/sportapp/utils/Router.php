<?php

namespace sportapp\utils;

class Router extends AbstractRouter{

  /*   public function addRoute($url, $ctrl, $mth, $level){
         self::$routes[$url]= [$ctrl, $mth, $level];
     }*/

     public function addRoute($url, $ctrl, $mth){
         self::$routes[$url]= [$ctrl, $mth];
     }


    public function dispatch(HttpRequest $http_request){
        if(!is_null($http_request->path_info)&&isset(self::$routes[$http_request->path_info])){
            $controleur=self::$routes[$http_request->path_info][0];
            $executer=self::$routes[$http_request->path_info][1];
        }else{
            $controleur=self::$routes['default'][0];
            $executer=self::$routes['default'][1];
        }
        $ctrl=new $controleur($http_request);
        $ctrl->$executer();

    }

}


