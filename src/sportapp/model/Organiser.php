<?php
namespace sportapp\model;

use sportapp\utils\ConnectionFactory;
use sportapp\model\Event;

 class Organiser extends AbstractModel{
     private $id, $firstname, $name, $naissance, $mail, $password;

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
         $update = 'UPDATE organiser SET firstname = :firstname, name = :name, naissance = :naissance, mail = :mail, password = :password where id = :id';
         $update_prep = $this->db->prepare($update);
         $update_prep->bindParam(':firstname', $this->firstname, \PDO::PARAM_STR);
         $update_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
         $update_prep->bindParam(':naissance', $this->naissance, \PDO::PARAM_STR);
         $update_prep->bindParam(':mail', $this->mail, \PDO::PARAM_STR);
         $update_prep->bindParam(':password', $this->password, \PDO::PARAM_STR);
         $update_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lines = $this->db->exec($update_prep);
         return $nb_lines;
     }

     protected function insert()
     {
         $insert = 'INSERT INTO organiser values(null, :firstname, :name, :naissance, :mail, :password)';
         $insert_prep = $this->db->prepare($insert);
        // $p_hash = password_hash($this->pass, PASSWORD_DEFAULT);
      //   echo $p_hash;
         $insert_prep->bindParam(':firstname', $this->firstname, \PDO::PARAM_STR);
         $insert_prep->bindParam(':name', $this->name, \PDO::PARAM_STR);
         $insert_prep->bindParam(':naissance', $this->naissance, \PDO::PARAM_STR);
         $insert_prep->bindParam(':mail', $this->mail, \PDO::PARAM_STR);
      //   $insert_prep->bindParam(':password', $p_hash, \PDO::PARAM_STR);
         $insert_prep->bindParam(':password', $this->password, \PDO::PARAM_STR);
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
         $delete = 'DELETE FROM organiser where id = :id';
         $delete_prep = $this->db->prepare($delete);
         $delete_prep->bindParam(':id', $this->id, \PDO::PARAM_INT);
         $nb_lines = $this->db->exec($delete_prep);
         return $nb_lines;
     }

     static public function findById($id)
     {
         $db = ConnectionFactory::makeConnection();
         $selectById = 'SELECT * FROM organiser where id = :id';
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
         $requete = 'SELECT * FROM organiser WHERE mail = :mail';
         $requete_prep = $db->prepare($requete);
         $requete_prep->bindParam(':mail', $login, \PDO::PARAM_STR);
         if ($requete_prep->execute()) {
             return $requete_prep->fetchObject();
         }else{
             return null;
         }
     }

     static public function findAll()
     {
         $db = ConnectionFactory::makeConnection();
         $select = 'SELECT * FROM organiser';
         $resultat = $db->query($select);
         if ($resultat) {
             return $resultat->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
         }else{
             return null;
         }
     }

     public function getEvents(){

         $select = 'SELECT * FROM tblevent where id_organiser = :id';
         $select_prep = $this->db->prepare($select);
         $select_prep->bindParam(":id", $this->id);
         if($select_prep->execute()){
             return $select_prep->fetchAll(\PDO::FETCH_CLASS);
         }else{
             return null;
         }

     }

     public function addFile($submit){

         try{
         if (isset($submit)) {
             $fname = $_FILES['sel_file']['name'];
             $chk_ext = explode(".", $fname);

             if (strtolower(end($chk_ext)) == "csv") {
                 $filename = $_FILES['sel_file']['tmp_name'];
                 $handle = fopen($filename, "r");
                 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                     $sql = "INSERT into participant(last_name,name,email,birthday,nb_participant) values(:last_name, :name, :email, :birthday)";
                     // cambiar el valor de conexion
                     $insert_prep = $this->db->prepare($sql);
                     $insert_prep->bindParam(':last_name',$data[1], \PDO::PARAM_STR);
                     $insert_prep->bindParam(':name',$data[2], \PDO::PARAM_STR);
                     $insert_prep->bindParam(':email',$data[3], \PDO::PARAM_STR);
                     $insert_prep->bindParam(':birthday',$data[4], \PDO::PARAM_STR);
                     $insert_prep->execute();
                 }

                 fclose($handle);
                 //echo "Importación exitosa!";

             } else {
                // echo "Archivo invalido!";
             }
         }
     }catch(PDOException $e){
 echo $e->getMessage();
 exit;
 }
     }



 }