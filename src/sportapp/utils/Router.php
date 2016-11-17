<?php

namespace sportapp\utils;

class Router extends AbstractRouter{

    /*
     * Méthode addRoute : ajoute une route a la liste des route
     *
     * Paramètres :
     *
     * - $url (String)  : l'url de la route
     * - $ctrl (String) : le nom de la classe du Contrôleur
     * - $mth (String)  : le nom de la méthode qui réalise la fonctionalité
     *                     de la route
     * - $level (Integer) : le niveau d'accès nécessaire pour la fonctionnalité
     *
     * Algorythme :
     *
     * - Ajouter le tablau [ $ctrl, $mth, $level ] au tableau $this->route
     *   sous la clé $url
     *
     */

     public function addRoute($url, $ctrl, $mth, $level){
         self::$routes[$url]= [$ctrl, $mth, $level];
     }

    /*
     * Méthode dispatch : execute une route en fonction de la requête
     *
     * Paramètre :
     *
     * - $http_request (HttpRequest) : Une instance de la classe HttpRequest
     *
     * Algorythme :
     *
     * - Si l'attribut $path_info existe dans $http_request
     *   ET si une route existe dans le tableau $route sous le nom $path_info
     *     - créer une instance du controleur de la route
     *     - exécuter la méthode de la route
     * - sinon
     *    - exécuter la route par défaut :
     *        - créer une instance du controleur de la route par défault
     *        - exécuter la méthode de la route par défault
     *
     */

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

/*
   Après l'ajout de toutes les routes, le tableau $route ressemblera à ceci :

Array
(
[/wiki/all/] => Array
    (
        [0] => \wikiapp\control\WikiController
        [1] => listAll
        [2] => -100
    )

[/wiki/view/] => Array
    (
        [0] => \wikiapp\control\WikiController
        [1] => viewPage
        [2] => -100
    )

[default] => Array
    (
        [0] => \wikiapp\control\WikiController
        [1] => listAll
        [2] => -100
    )

)
 */


