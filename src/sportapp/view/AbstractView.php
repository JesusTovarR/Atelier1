<?php

namespace sportapp\view;
use sportapp\utils\HttpRequest;

abstract class AbstractView {

    
    protected $app_root = null;    /* répertoire racine de l'application */
    protected $script_name = null; /* le chemin vers le script */
    protected $data = null ;       /* une page ou un tableau de page */
    
    /* Constructeur 
    *
    * Prend en paramète une variable (un objet page ou un tableau de page)
    * 
    * - Stock la variable dans l'attribut $data
    * - Recupérer la racine de l'application depuis un objet HttpRequest, 
    *   pour construire les URL des liens  et des actions des formulaire 
    *   et le nom du scripte pour les stocker and les attributs 
    *   $app_root et $script_name
    *
    */
    public function __construct($data){
        $this->data = $data;
        
        $http = new HttpRequest();
        $this->script_name  = $http->script_name;
        $this->app_root     = $http->getRoot();
    }
    
    public function __get($attr_name) {
        if (property_exists( $this, $attr_name)) 
            return $this->$attr_name;
        $emess = __CLASS__ . ": unknown member $attr_name (__get)";
        throw new \Exception($emess);
    }
    
    public function __set($attr_name, $attr_val) {
        if (property_exists($this , $attr_name)) 
            $this->$attr_name=$attr_val; 
        else{
            $emess = __CLASS__ . ": unknown member $attr_name (__set)";
            throw new \Exception($emess);
        }
    }

    public function __toString(){
        $prop = get_object_vars ($this);
        $str = "";
        foreach ($prop as $name => $val){
            if( !is_array($val) ) 
                $str .= "$name : $val <br> ";
            else
                $str .= "$name :". print_r($val, TRUE)."<br>";
        }
        return $str;
    }


    /* 
     *  Crée le fragment HTML de l'entête 
     *
     */ 
    protected function renderHeader(){
        $html ='<h1>SportNet</h1>';
        return $html;
    }

    /*
     * Crée le fragment HTML du bas de la page
     *
     */
    protected function renderFooter(){
        $html = '<div>SportNet une app créée pour l&#39;atelier &copy; 2016</div>';
        $html.= '<div>A propos</div>';
        $html.= '<div>Nous contacter</div>';
        return $html;
    }


    /*
     * Crée le fragment HTML dumenu
     *
     */
    protected function renderMenu(){
        $html  = '<h2>Menu</h2>';
        $html .= '<ul>';
        $html .= '<li><a href="'.$this->script_name.'/sportnet/default/">Accueil</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/sportnet/events/">Nos événements</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/sportnet/all/">Tous les articles</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/admin/login/">Connexion</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/sportnet/create/">Créer un compte organisateur</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/sportnet/default/">Contact</a></li>';
        $html .= "</ul>"; 
        return $html;
    }

    protected function renderMenu2(){
        $html  = '<h2>Menu</h2>';
        $html .= '<ul>';
        $html .= '<li><a href="'.$this->script_name.'/admin/myEvents/">Tous mes événements</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/sportnet/new/">Créer une page</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/admin/newEvent/">Créer un événement</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/admin/newTail/">Créer une épreuve</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/admin/gestion/">Gérer</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/admin/myEvents/">Votre Space</a></li>';
        $html .= '<li><a href="'.$this->script_name.'/admin/logout/">Desconexion</a></li>';
        $html .= "</ul>";
        return $html;
    }




    /*
     * Affiche une page HTML complète.
     *
     * A definir dans les classe concrètes
     *
     */
    abstract public function render($selector);
    
    

}