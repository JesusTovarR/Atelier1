<?php
namespace sportapp\model;

use sportapp\utils\ConnectionFactory;
use sportapp\model\User;

 class Page extends AbstractModel{

	protected $id, $title, $text, $date, $author;

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
 	 	$requete = 'UPDATE page SET title = :attti, text = :attte, date = :attd, author = :atta  WHERE id = :attid ';
 		$requete_prep = $this->db->prepare($requete);
		$requete_prep->bindParam(':attti', $this->title, \PDO::PARAM_STR);
		$requete_prep->bindParam(':attte', $this->text, \PDO::PARAM_STR);
        $requete_prep->bindParam(':attd', $this->date, \PDO::PARAM_STR);
        $requete_prep->bindParam(':atta', $this->author,\PDO::PARAM_INT);
        $requete_prep->bindParam(':attid', $this->id, \PDO::PARAM_INT);
        $num_ligne=$requete_prep->execute();
        return $num_ligne;
 	 }

	protected function insert(){
	$requete='INSERT INTO page VALUES (null, :title, :text, :date1, :author)';
	$requete_prep = $this->db->prepare($requete);
	$requete_prep->bindParam(':title', $this->title, \PDO::PARAM_STR);
	$requete_prep->bindParam(':text', $this->text, \PDO::PARAM_STR);
	$requete_prep->bindParam(':date1', $this->date, \PDO::PARAM_STR);
	$requete_prep->bindParam(':author', $this->author, \PDO::PARAM_INT);
    $num_ligne=$requete_prep->execute();
    return $num_ligne;
	}

	public function save(){
	    /*
		if(isset($this->id)){
		$r=$this->update();
		}else{
			$id=$this->insert();
			$r=isset($id);
		}
		return $r;
		*/
        if(is_null($this->id)){
            return ($this->insert()>-1);
        }else{
            return $this->update();
        }
	}

    public function delete(){
            $requete = 'DELETE FROM page WHERE id=:idp';
            $requete_prep = $this->db->prepare($requete);
            $requete_prep->bindParam(':idp', $this->id, PDO::PARAM_INT);
            $num_ligne=$requete_prep->execute();
            return $num_ligne;
    }


	static public function findById($id){
        $db=ConnectionFactory::makeConnection();
		$requete = 'SELECT * FROM page WHERE id=:id';
        $requete_prep = $db->prepare( $requete ) ;
        $requete_prep->bindParam(':id', $id, \PDO::PARAM_INT);
		if($requete_prep->execute()){
			return $requete_prep->fetchObject(__CLASS__);
		}else{
			return  null;
		}
	}




     static public function findByTitle($title){
         $db = ConnectionFactory::makeConnection();
         $requete = 'SELECT * FROM page WHERE title = :title';
         $requete_prep = $db->prepare($requete);
         $requete_prep->bindParam(':title', $title, \PDO::PARAM_STR);
         if ($requete_prep->execute()) {
             return $requete_prep->fetchObject(__CLASS__);
         }else{
             return null;
         }
     }
    
    static public function findAll(){
        $db=ConnectionFactory::makeConnection();
        $requete = 'SELECT * FROM page';
        $requete_prep = $db->query( $requete ) ;
        if($requete_prep){
            return $requete_prep->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        }else{
            return null;
        }

    }

    public function getAuthor(){
        $requete = 'SELECT * FROM user WHERE id=:id';
        $requete_prep = $this->db->prepare( $requete ) ;
        $requete_prep->bindParam(":id", $this->author);
        if($requete_prep->execute()){
             return $requete_prep->fetchObject();
        }else{
            return null;
        }
    }

 }