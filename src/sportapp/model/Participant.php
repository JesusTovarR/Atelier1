<?php
namespace sportapp\model;

use sportapp\utils\ConnectionFactory;
use sportapp\model\Event;

 class Organiser extends AbstractModel{
     private $id, $firstname, $name, $mail, $naissance;

     public function __construct()
     {
         $this->db = ConnectionFactory::makeConnection();
     }

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

     protected function update()
     {
         $update = 'UPDATE participants SET firstname = :firstname, name = :name, mail = :mail, naissance = :naissance where id = :id';
         $update_prep = $this->db->prepare($update);
         $update_prep->bindParam(':firstname', $this->firstname, \PDO::PARAM_STR);
         $update_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
         $update_prep->bindParam(':naissance', $this->naissance, \PDO::PARAM_STR);
         $update_prep->bindParam(':mail', $this->mail, \PDO::PARAM_STR);
         $update_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lines = $this->db->exec($update_prep);
         return $nb_lines;
     }

     protected function insert()
     {
         $insert = 'INSERT INTO participants values(null, :firstname, :name, :mail, :naissance)';
         $insert_prep = $this->db->prepare($insert);
         $insert_prep->bindParam(':firstname', $this->firstname, \PDO::PARAM_STR);
         $insert_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
         $insert_prep->bindParam(':naissance', $this->naissance, \PDO::PARAM_STR);
         $insert_prep->bindParam(':mail', $this->mail, \PDO::PARAM_STR);
         $nb_lignes = $insert_prep->execute();
         return $nb_lignes;
     }

     public function save()
     {
         if(is_null($this->id)){
             return ($this->insert()>-1);
         }else{
             return $this->update();
         }

     }

     public function delete()
     {
         $delete = 'DELETE FROM participants where id = :id';
         $delete_prep = $this->db->prepare($delete);
         $delete_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lines = $this->db->exec($delete_prep);
         return $nb_lines;
     }

     static public function findById($id)
     {
         $db = ConnectionFactory::makeConnection();
         $selectById = 'SELECT * FROM participants where id = :id';
         $selectById_prep = $db->prepare($selectById);
         $selectById_prep->bindParam(':id', $id, PDO::PARAM_INT);
         if ($selectById_prep->execute()) {
             return $selectById_prep->fetchObject(__CLASS__);
         }else{
             return null;
         }
     }

     static public function findByNom($nom)
     {
         $db = ConnectionFactory::makeConnection();
         $requete = 'SELECT * FROM participants WHERE firstname = :firstname';
         $requete_prep = $db->prepare($requete);
         $requete_prep->bindParam(':firstname', $nom, \PDO::PARAM_STR);
         if ($requete_prep->execute()) {
             return $requete_prep->fetchObject();
         }else{
             return null;
         }
     }

     static public function findAll()
     {
         $db = ConnectionFactory::makeConnection();
         $select = 'SELECT * FROM participants';
         $resultat = $db->query($select);
         if ($resultat) {
             return $resultat->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
         }else{
             return null;
         }
     }

     public function getTrials(){

         $select = 'SELECT * FROM trial inner JOIN trial_participants on trial.id=trial_participants.id_t where participants.id = :id';
         $select_prep = $this->db->prepare($select);
         $select_prep->bindParam(":id", $this->id);
         if($select_prep->execute()){
             return $select_prep->fetchAll(\PDO::FETCH_CLASS);
         }else{
             return null;
         }

     }
 }