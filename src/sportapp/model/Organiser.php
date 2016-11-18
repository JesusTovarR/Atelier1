<?php
namespace sportapp\model;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $table ='organizer';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable=['last_name','name','email','password','birthday'];

    public function events(){
        return $this->hasMany(Event::class,'id_o');
    }

    public function trials(){
        return $this->hasMany(Trial::class,'id_o');
    }


    public function createOrganizer($last_name,$name,$email,$password,$birthday){
        $o = new Organizer();
        $o->last_name = $last_name;
        $o->name = $name;
        $o->email = $email;
        $o->password = $password;
        $o->birthday=$birthday;
        $o->save();
    }


    public function findOrganizer($id){
        $o=Organizer::find($id);
        //imprime el organizador
        var_dump(
            $o->last_name,
            $o->name,
            $o->email,
            $o->password,
            $o->birthday
        );
        //retorna el organizador
        return $o;

    }

    public function updateOrganizer($id,$last_name,$name,$email,$password,$birthday){
        $o = Organizer::find($id);
        $o->last_name = $last_name;
        $o->name = $name;
        $o->email = $email;
        $o->password=$password;
        $o->birthday = $birthday;
        $o->save();
    }

    public function delateOrganizer($id){
        $o= Organizer::find($id);
        $o->delete();
    }

    public function allOrganizers(){
        foreach (Organizer::all() as $organizer)
        {
            echo $organizer->name;
            echo "<br/>";
        }
    }

}