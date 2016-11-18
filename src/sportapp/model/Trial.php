<?php 
namespace sportapp\model;


use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $table = 'trial';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable= ['name','description','date','time','id_e','id_o'];

    public function event(){
        return $this->belongsTo('\sportnet\model\Event','id_e');
    }



    function createTrial($name,$description,$date,$time,$id_e,$id_o){
        $o = new Trial();
        $o->name = $name;
        $o->description= $description;
        $o->date = $date;
        $o->time=$time;
        $o->id_e=$id_e;
        $o->id_o=$id_o;
        $o->save();
    }

    function findTrial($id){
        $o=Trial::find($id);
        //imprime el organizador
        var_dump(
            $o->name,
            $o->description,
            $o->date,
            $o->time,
            $o->id_e,
            $o->id_o
        );
        //retorna el organizador
        return $o;
    }

    function updateTrial($id,$name,$description,$date,$time,$id_e,$id_o){
        $o = Trial::find($id);
        $o->name = $name;
        $o->description= $description;
        $o->date = $date;
        $o->time=$time;
        $o->id_e=$id_e;
        $o->id_o=$id_o;
        $o->save();
    }

    function delateTrial($id){
        $o= Trial::find($id);
        $o->delete();
    }

    function allTrials(){
        foreach (Trial::all() as $trial)
        {
            echo $trial->name;
            echo "<br/>";
        }
    }

}