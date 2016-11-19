<?php


namespace sportapp\control;

use sportapp\model\Event;
use sportapp\utils\HttpRequest;
use sportapp\view\SportnetView;
use sportapp\utils\AppInit;
use \sportapp\model\Organiser;
use \sportapp\model\Trial;
use sportapp\model\Participant;

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
            $event= new Event();
            $event->id=$this->request->get['id'];
            $trial=$event->getTrials();
            $vEvent = new SportnetView($trial);
            $vEvent->render(SPORTNET_VIEW_INSCRIPTION);
        }else{
            $insc = new SportnetView(null);
            $insc->render(SPORTNET_VIEW_ACCUEIL);
        }
    }

    public function addParticipant(){
        $participant=new Participant();
        $participant->firstname=$this->request->post['firstname'];
        $participant->name=$this->request->post['name'];
        $participant->mail=$this->request->post['email'];
        $participant->naissance=$this->request->post['naissance'];
        $participant->save();
        $participant2=Participant::findByEmail($this->request->post['email']);
        for($i=1; $i<=$this->request->post['cont']; $i++){
            $nom='trial'.$i;
            $participant->insertTrials($participant2->id,$this->request->post[$nom]);
        }
        $this->infoParticipant();

   }

    public function descriptionEvent(){
        if(isset($this->request->get['id'])){
            $event=Event::findById($this->request->get['id']);
            $vEvent = new SportnetView($event);
            $vEvent->render(SPORTNET_VIEW_DESCRIPTION);
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

}