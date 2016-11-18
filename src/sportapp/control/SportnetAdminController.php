<?php

namespace sportapp\control;

use sportapp\model\Organiser;
use sportapp\utils\Authentification;
use sportapp\model\Event;
use \sportapp\model\Trial;
use sportapp\view\SportnetView;
use sportapp\view\SportnetAdminView;

class SportnetAdminController {
    private $request=null; 
    
    public function __construct(\sportapp\utils\HttpRequest $http_req){
        $this->request = $http_req ;
    }

    public function loginUser() {

        $form = new SportnetAdminView();
        $form->render(SPORTNET_VIEW_LOGIN);
        
    }

    public function newEvent(){

        $newevent = new SportnetView(null);
        $newevent->render(SPORTNET_VIEW_NEWEVENT);

    }

    public function newTrial(){
        $connexion=new Authentification();
        if($connexion->logged_in==true){
            $organise = Organiser::findByLogin($_SESSION['user_login']);
            $events=new Organiser();
            $events->id=$organise->id;
            $eventUser=$events->getEvents();
            $newevent = new SportnetView($eventUser);
            $newevent->render(SPORTNET_VIEW_NEWTRIAL);;

        }

    }

    public function gestion(){

        $newevent = new SportnetView(null);
        $newevent->render(SPORTNET_VIEW_GESTION);

    }

    public function checkUser(){

        if($this->request->post['login']!='' && $this->request->post['pass']!='' && isset($this->request->post['login']) && isset($this->request->post['pass'])){
            $user= new Authentification();
            $u=$user->login($this->request->post['login']);
            if(!is_null($u)){
                //if($u->login==$this->request->post['login'] && password_verify($this->request->post['pass'], $u->pass)){
                if($u->mail==$this->request->post['login'] && $this->request->post['pass']==$u->password){
                    $_SESSION['user_login']=$u->mail;
                    // $_SESSION['access_level']=$u->level;
                    $this->MyEvents();
                }else{
                    $form = new SportnetAdminView(null);
                    $form->render(SPORTNET_VIEW_LOGIN);
                }

            }else{
                $form = new SportnetAdminView(null);
                $form->render(SPORTNET_VIEW_LOGIN);
            }
        }else{
            $form = new SportnetAdminView(null);
            $form->render(SPORTNET_VIEW_LOGIN);
        }

    }

    
    public function logoutUser(){

        $desc=new Authentification();
        $desc->logout();
        $default = new SportnetController($this->request);
        $default->accueil();
        
     }

    public function createUser(){
        $form = new SportnetAdminView();
        $form->render(SPORTNET_VIEW_COMPTE);
    }

    public function addUser(){
            $user=new Organiser();
            $user->firstname=$this->request->post['firstname'];
            $user->name=$this->request->post['name'];
            $user->naissance=$this->request->post['naissance'];
            $user->mail=$this->request->post['login'];
            $user->password=$this->request->post['pass'];
            $user->save();
            $this->checkUser();
    }

    public function addEvent(){
        $event=new Event();
        $event->name=$this->request->post['name'];
        $event->place=$this->request->post['palce'];
        $event->dicipline=$this->request->post['discipline'];
        $event->star_date=$this->request->post['star_date'];
        $event->end_date=$this->request->post['end_date'];
        $event->description=$this->request->post['descritpion'];
        $organiser=Organiser::findByLogin($_SESSION['user_login']);
        $event->organiser=$organiser->id;
        $event->save();
        $this->MyEvents();

    }
    public function addTrial(){
        $event=new Trial();
        $event->name=$this->request->post['name'];
        $event->description=$this->request->post['descritpion'];
        $event->date_trial=$this->request->post['date'];
        $event->price=$this->request->post['price'];
        $event->id_event=$this->request->post['event'];
        $event->save();
        $this->newTrial();

    }

    public function MyEvents(){

        $connexion=new Authentification();
        if($connexion->logged_in==true){
            $organise = Organiser::findByLogin($_SESSION['user_login']);
            $events=new Organiser();
            $events->id=$organise->id;
            $eventUser=$events->getEvents();
            $spaceP = new SportnetView($eventUser);
            $spaceP->render(SPORTNET_VIEW_MYEVENTS);

        }
    }
    
}