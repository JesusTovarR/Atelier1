<?php
namespace sportapp\model;

use sportapp\utils\ConnectionFactory;
use sportapp\model\Page;

 class User extends AbstractModel{
     private $id, $login, $pass, $level;

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
         $update = 'UPDATE user SET login = :login, pass = :pass, level = :level where id = :id';
         $update_prep = $this->db->prepare($update);
         $update_prep->bindParam(':login', $this->login, \PDO::PARAM_STR);
         $update_prep->bindParam(':pass', $this->pass, \PDO::PARAM_STR);
         $update_prep->bindParam(':level', $this->level, \PDO::PARAM_INT);
         $update_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lines = $update_prep->execute();
         return $nb_lines;
     }

     protected function insert()
     {
      //   $p_hash = password_hash($this->pass, PASSWORD_DEFAULT);
         $insert = 'INSERT INTO user values(null, :login, :pass, :level)';
         $insert_prep = $this->db->prepare($insert);
         $insert_prep->bindParam(':login', $this->login, \PDO::PARAM_STR);
        // $insert_prep->bindParam(':pass', $p_hash, \PDO::PARAM_STR);
         $insert_prep->bindParam(':pass', $this->pass, \PDO::PARAM_STR);
         $insert_prep->bindParam(':level', $this->level,\PDO::PARAM_INT);
         $nb_lines = $insert_prep->execute();
         return $nb_lines;
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
         $delete = 'DELETE FROM user where id = :id';
         $delete_prep = $this->db->prepare($delete);
         $delete_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lines =$delete_prep->execute();
         return $nb_lines;
     }

     static public function findById($id)
     {
         $db = ConnectionFactory::makeConnection();
         $selectById = 'SELECT * FROM user where id = :id';
         $selectById_prep = $db->prepare($selectById);
         $selectById_prep->bindParam(':id', $id, PDO::PARAM_INT);
         if ($selectById_prep->execute()) {
             return $selectById_prep->fetchObject(__CLASS__);
         }else{
             return null;
         }
     }

     static public function findByLogin($login)
     {
         $db = ConnectionFactory::makeConnection();
         $requete = 'SELECT * FROM user WHERE login = :login';
         $requete_prep = $db->prepare($requete);
         $requete_prep->bindParam(':login', $login, \PDO::PARAM_STR);
         if ($requete_prep->execute()) {
             return $requete_prep->fetchObject(__CLASS__);
         }else{
             return null;
         }
     }

     static public function findAll()
     {
         $db = ConnectionFactory::makeConnection();
         $select = 'SELECT * FROM user';
         $resultat = $db->query($select);
         if ($resultat) {
             return $resultat->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
         }else{
             return null;
         }
     }

     public function getPages(){

         $select = 'SELECT * FROM page where author = :id';
         $select_prep = $this->db->prepare($select);
         $select_prep->bindParam(":id", $this->id);
         if($select_prep->execute()){
            return $select_prep->fetchAll(\PDO::FETCH_CLASS);
         }else{
             return null;
         }

     }
 }