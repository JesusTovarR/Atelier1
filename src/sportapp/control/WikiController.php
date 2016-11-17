<?php

namespace sportapp\control;
use sportapp\model\User;
use sportapp\model\Page;
use sportapp\utils\HttpRequest;
use sportapp\view\AbstractView;
use sportapp\view\WikiView;


class WikiController {

    /* Attribut pour stocker l'objet HttpRequest */ 
    private $request=null; 

    /*
     * Constructeur :
     * 
     * Reçoit une instance de la classe HttRequest et la stocke dans l'attribut
     *    $request 
     *
     */
    
    public function __construct(HttpRequest $http_req){
        $this->request = $http_req ;
    }

    /* 
     * Méthode listAll 
     *  
     * Réalise la fonctionnalité : "afficher l’ensemble des articles" 
     *
     */ 

    public function listAll(){
         /*
         * Algorithme :  
         * 
         * - Récupérer une liste de toutes les pages (Page::findAll)
         * - Afficher une liste des titres des article 
         *  
         */
        $pages = Page::findAll();
        //$user = new User::findAll();
        //$all = new WikiView($user);
        $all = new WikiView($pages);
        $all->render(SPORTNET_VIEW_ALL);
    }
    
    /* 
     * Méthode viewPage
     *  
     * Réalise la fonctionnalité : "afficher un article" 
     *
     */ 

    public function viewPage(){
        
        /*
         * Algorithme :  
         * 
         * - Le titre de la page est dans le paramètre de l'URL ($_GET)
         * - Récupérer la page en question (Page::findByTitle)
         * - Afficher le contenu de l'article
         * - Afficher la date de modification de la page et le nom de l'auteur 
         * 
         */

        if(isset($this->request->get['title'])){
            $page = Page::findByTitle($this->request->get['title']);
           $vPage = new WikiView($page);
            $vPage->render(SPORTNET_VIEW_PAGE);
        }
        
    }

    public function newPage(){

        $form = new WikiView(null);
        $form->render(SPORTNET_VIEW_NEW);

    }

    public function accueil(){

        $accueil = new WikiView(null);
        $accueil->render(SPORTNET_VIEW_ACCUEIL);

    }

    public function allEvents(){

        $events = new WikiView(null);
        $events->render(SPORTNET_VIEW_EVENTS);

    }

    public function inscriptionEvent(){

        $insc = new WikiView(null);
        $insc->render(SPORTNET_VIEW_INSCRIPTION);

    }
    public function infoParticipant(){

        $info = new WikiView(null);
        $info->render(SPORTNET_VIEW_INFOPARTICIPANT);

    }

    public function resultats(){

        $res = new WikiView(null);
        $res->render(SPORTNET_VIEW_RESULTATS);

    }

    public function savePage(){
        $page=new Page();
        $page->id= $this->request->post['id'];
        $page->title=$this->request->post['title'];
        $page->text=$this->request->post['article'];
        $page->date=date("Y-m-d");
        $user=User::findByLogin($_SESSION['user_login']);
        $page->author=$user->id;
        $page->save();
        $mypage = Page::findByTitle($this->request->post['title']);
        $vPage = new WikiView($mypage);
        $vPage->render(SPORTNET_VIEW_PAGE);

    }

    public function editPage(){
        $mypage = Page::findByTitle($this->request->get['title']);
        $vEdit = new WikiView($mypage);
        $vEdit->render(SPORTNET_VIEW_EDIT);

    }
}