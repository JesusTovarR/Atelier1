<?php

namespace sportapp\control;

use sportapp\model\Event;
use sportapp\model\User;
use sportapp\model\Page;
use sportapp\utils\HttpRequest;
use sportapp\view\SportnetView;


class SportnetController {

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

    public function accueil(){

        $accueil = new SportnetView(null);
        $accueil->render(SPORTNET_VIEW_ACCUEIL);

    }

    public function allEvents(){
        $events = Event::findAll();
        $vEvents = new SportnetView($events);
        $vEvents->render(SPORTNET_VIEW_EVENTS);

    }

    public function inscriptionEvent(){
        if(isset($this->request->get['id'])){
            $event=Event::findById($this->request->get['id']);
            $vEvent = new SportnetView($event);
            $vEvent->render(SPORTNET_VIEW_INSCRIPTION);
        }else{
            $insc = new SportnetView(null);
            $insc->render(SPORTNET_VIEW_ACCUEIL);
        }
    }
    public function infoParticipant(){

        $info = new SportnetView(null);
        $info->render(SPORTNET_VIEW_INFOPARTICIPANT);

    }

    public function resultats(){

        $res = new SportnetView(null);
        $res->render(SPORTNET_VIEW_RESULTATS);

    }

    public function editPage(){
        $mypage = Page::findByTitle($this->request->get['title']);
        $vEdit = new SportnetView($mypage);
        $vEdit->render(SPORTNET_VIEW_EDIT);

    }
}