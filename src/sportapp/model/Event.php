<?php
namespace sportapp\model;


use Illuminate\Database\Eloquent\Model;
class event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable= [  'name','description','place','dicipline',
        'date_start',
        'date_end',
        'id_o'];

    public function trials(){
        return $this->hasMany('\sportnet\model\Trial','id_e');
    }

    public function organizers(){
        return $this->belongsTo(Organiser::class,'id');
    }

    public function inscriptions(){
        return $this->belongsTo(Inscription::class,'id');
    }

    public function createEvent($name,$description,$place,$dicipline,$date_start,$date_end,$id_o){
        $e = new Event;
        $e->name = $name;
        $e->description = $description;
        $e->place = $place;
        $e->dicipline = $dicipline;
        $e->date_start=$date_start;
        $e->date_end = $date_end;
        $e->id_o = $id_o;
        $e->save();
    }

    public function findEvent($id){
        $e=Event::find($id);
        //imprime el evento
        var_dump(
            $e->name,
            $e->description,
            $e->place,
            $e->dicipline,
            $e->date_start,
            $e->date_end,
            $e->id_o
        );
        //retorna el evento
        return $e;

    }

    public function updateEvent($id,$name,$description,$place,$dicipline,$date_start,$date_end,$id_o){
        $e = Event::find($id);
        $e->name = $name;
        $e->description = $description;
        $e->place = $place;
        $e->dicipline = $dicipline;
        $e->date_start=$date_start;
        $e->date_end = $date_end;
        $e->id_o = $id_o;
        $e->save();
    }

    public function delateEvent($id){
        $e= Event::find($id);
        $e->delete();
    }

    public function allEvents(){
        foreach (Event::all() as $book)
        {
            echo $book->name;
            echo "<br/>";
        }
    }

    /*
     *
     */
    public function allTrialForEvent($id){
        $evento = Event::find($id);
        $trials = $evento->trials;
        foreach ($trials as $trial){
            echo $trial->name;
            echo "<br/>";
        }
    }
}

