<?php 
namespace sportapp\model;

use sportapp\utils\ConnectionFactory as ConnectionFactory;
use sportapp\model\Event;

class Trial extends AbstractModel{

    protected $id, $name, $description, $date_trial, $id_event;

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

        $update = 'UPDATE trial SET name= :name, description = :description, date_trial = :date_trial, id_event = :event where id = :id';
        $update_prep = $this->db->prepare($update);
        $update_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
        $update_prep->bindParam(':description', $this->description, \PDO::PARAM_STR);
        $update_prep->bindParam(':date_trial', $this->date_trial, \PDO::PARAM_STR);
        $update_prep->bindParam(':event', $this->id_event, \PDO::PARAM_INT);
        $update_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
        $nb_lines = $update_prep->execute();
        return $nb_lines;
    }

    protected function insert(){
        $insert = 'INSERT INTO trial values(null, :name, :description, :date_trial, :event )';
        $insert_prep = $this->db->prepare($insert);
        $insert_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
        $insert_prep->bindParam(':description', $this->description, \PDO::PARAM_STR);
        $insert_prep->bindParam(':date_trial', $this->date_trial, \PDO::PARAM_STR);
        $insert_prep->bindParam(':event', $this->id_event, \PDO::PARAM_INT);
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
        $delete = 'DELETE FROM trial where id = :id';
        $delete_prep = $this->db->prepare($delete);
        $delete_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
        $nb_lignes = $delete_prep->execute();
        return $nb_lignes;
    }

    static public function findById($id){
        $db=ConnectionFactory::makeConnection();
        $selectById = 'SELECT * FROM trial where id = :id';
        $selectById_prep = $db->prepare($selectById);
        $selectById_prep->bindParam(':id', $id, PDO::PARAM_INT);
        if($selectById_prep->execute()){
            return $selectById_prep->fetchObject(__CLASS__);
        }else{
            return null;
        }
    }

    static public function findByName($trialName){
        $db = ConnectionFactory::makeConnection();
        $requete = 'SELECT * FROM trial WHERE name = :name';
        $requete_prep = $db->prepare($requete);
        $requete_prep->bindParam(':name', $trialName, \PDO::PARAM_STR);
        if ($requete_prep->execute()) {
            return $requete_prep->fetchObject(__CLASS__);
        }else{
            return null;
        }
    }

    static public function findAll(){
        $db=ConnectionFactory::makeConnection();
        $select = 'SELECT * FROM trial';
        $resultat = $db->query($select);
        if($resultat){
            return $resultat->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        }else{
            return null;
        }
    }

    public function getEvents(){
        $select = 'SELECT * FROM tblevent where id = :id';
        $select_prep = $this->db->prepare($select);
        $select_prep->bindParam(":id", $this->id_event);
        if($select_prep->execute()){
            return $select_prep->fetchAll(\PDO::FETCH_CLASS);
        }else{
            return null;
        }

    }
}