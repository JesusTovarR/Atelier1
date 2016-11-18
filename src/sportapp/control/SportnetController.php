<?php


namespace sportapp\control;

use sportapp\model\Event;
use sportapp\utils\HttpRequest;
use sportapp\view\SportnetView;
use sportapp\utils\AppInit;
use \sportapp\model\Organizer;
use \sportapp\model\Trial;
use sportapp\model\Participant;
use \Illuminate\Database\Capsule\Manager as DB;

AppInit::bootEloquent('conf/conf.ini');
DB::connection()->enableQueryLog();


$queries = DB::getQueryLog();

foreach ($queries as $query){
    var_dump($query);
}

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
        $vEvents = new SportnetView(Event::all());
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

}