<?php
namespace sportapp\model;

use sportapp\utils\ConnectionFactory;
use sportapp\model\Trial;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
class Event extends Model
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
       Event::all();
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
=======
 class Event extends AbstractModel{
>>>>>>> 7a1084fd3885424dbb4b37c764e529f928d7854e

     private $id, $name, $description, $place, $dicipline, $star_date, $end_date, $organiser;

     public function __get($attr_name) {
         if (property_exists( __CLASS__, $attr_name))
             return $this->$attr_name;
         $emess = __CLASS__ . ": unknown member $attr_name (__get)";
         throw new \Exception($emess);
     }

     public function __set($attr_name, $attr_val) {
         if (property_exists( __CLASS__, $attr_name))
             $this->$attr_name=$attr_val;
         else{
             $emess = __CLASS__ . ": unknown member $attr_name (__set)";
             throw new \Exception($emess);
         }
     }

     public function __construct(){
         $this->db=ConnectionFactory::makeConnection();
     }

     protected function update(){

         $update = 'UPDATE tblevent SET name= :name, description = :description, place = :place, dicipline= :dicipline, star_date = :star_date, end_date = :end_date, id_organiser = :organiser where id = :id';
         $update_prep = $this->db->prepare($update);
         $update_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
         $update_prep->bindParam(':description', $this->description, \PDO::PARAM_STR);
         $update_prep->bindParam(':place', $this->place, \PDO::PARAM_STR);
         $update_prep->bindParam(':dicipline', $this->dicipline, \PDO::PARAM_STR);
         $update_prep->bindParam(':star_date', $this->star_date, \PDO::PARAM_STR);
         $update_prep->bindParam(':end_date', $this->end_date, \PDO::PARAM_STR);
         $update_prep->bindParam(':organiser', $this->organiser, \PDO::PARAM_INT);
         $update_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lines = $update_prep->execute();
         return $nb_lines;
     }

     protected function insert(){
         $insert = 'INSERT INTO tblevent values(null, :name, :description, :place, :dicipline, :star_date, :end_date, :organiser )';
         $insert_prep = $this->db->prepare($insert);
         $insert_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
         $insert_prep->bindParam(':description', $this->description, \PDO::PARAM_STR);
         $insert_prep->bindParam(':place', $this->place, \PDO::PARAM_STR);
         $insert_prep->bindParam(':dicipline', $this->dicipline, \PDO::PARAM_STR);
         $insert_prep->bindParam(':star_date', $this->star_date, \PDO::PARAM_STR);
         $insert_prep->bindParam(':end_date', $this->end_date, \PDO::PARAM_STR);
         $insert_prep->bindParam(':organiser', $this->organiser, \PDO::PARAM_INT);
         $nb_lignes = $insert_prep->execute();
         return $nb_lignes;
     }

     public function save(){
         if(is_null($this->id)){
             return ($this->insert()>-1);
         }else{
             return $this->update();
         }
     }

     public function delete(){
         $delete = 'DELETE FROM tblevent where id = :id';
         $delete_prep = $this->db->prepare($delete);
         $delete_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lignes = $delete_prep->execute();
         return $nb_lignes;
     }

     static public function findById($id){
         $db=ConnectionFactory::makeConnection();
         $selectById = 'SELECT * FROM tblevent where id = :id';
         $selectById_prep = $db->prepare($selectById);
         $selectById_prep->bindParam(':id', $id, \PDO::PARAM_INT);
         if($selectById_prep->execute()){
             return $selectById_prep->fetchObject();
         }else{
             return null;
         }
     }

     static public function findByName($evenName){
         $db = ConnectionFactory::makeConnection();
         $requete = 'SELECT * FROM tblevent WHERE name = :name';
         $requete_prep = $db->prepare($requete);
         $requete_prep->bindParam(':name', $evenName, \PDO::PARAM_STR);
         if ($requete_prep->execute()) {
             return $requete_prep->fetchObject(__CLASS__);
         }else{
             return null;
         }
     }

     static public function findAll(){
         $db=ConnectionFactory::makeConnection();
         $select = 'SELECT * FROM tblevent';
         $resultat = $db->query($select);
         if($resultat){
             return $resultat->fetchAll(\PDO::FETCH_CLASS);
         }else{
             return null;
         }
     }

     public function getTrials(){
         $select = 'SELECT * FROM trial where id_event = :id';
         $select_prep = $this->db->prepare($select);
         $select_prep->bindParam(":id", $this->id);
         if($select_prep->execute()){
             return $select_prep->fetchAll(\PDO::FETCH_CLASS);
         }else{
             return null;
         }

     }
 }
