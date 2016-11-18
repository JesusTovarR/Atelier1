<?php
/**
 * Created by PhpStorm.
 * User: dano
 * Date: 17/11/16
 * Time: 03:40 PM
 */

namespace sportnet\model;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participant';
    protected $primaryKey = 'id';
    protected $fillable = ['last_name','name','email','birthday','nb_participant'];
    public $timestamps=false;

   public function createParticipant($last_name,$name,$email,$birthday){

        $p = new Participant;
        $p->last_name = $last_name;
        $p->name = $name;
        $p->email = $email;
        $p->birthday = $birthday;
        $p->nb_participant=allParticipants();;
        $p->save();
    }


   public function findParticipant($nb_participant){
        $p=Participant::find($nb_participant);
        //imprime el participante
        var_dump(   $p->last_name,
            $p->name,
            $p->email,
            $p->birthday,
            $p->nb_participant
        );
        //retorna el participante
        return $p;

    }

   public function updateParticipant($id,$last_name,$name,$email,$birthday,$nb_participant){
        $participant = Participant::find($id);
        $participant->last_name = $last_name;
        $participant->name = $name;
        $participant->email = $email;
        $participant->birthday = $birthday;
        $participant->nb_participant=$nb_participant;
        $participant->save();
    }


   public function delateParticipant($id){
        $p = Participant::find($id);
        $p->delete();
    }

    function allParticipants(){
        $count=0;
        foreach (Participant::all() as $participant)
        {
            $count=$count+1;
            // imprime el nombre del participante
            echo $participant->name;
            echo "<br/>";
        }
        // regresa el numero total de participantes del sistema
        return $count+1;
    }

}