<?php 

namespace DatabaseConnection;
use PDO;

class DB {

	#######################
	#      ~ STATES ~     #
	####################### 
	private $con;
	private $results; 
	
	
	#######################
	#     ~ METHODS ~     #
	#######################
	
	/***Pseudo Constructor***/
	public function init(){
		
		$this->con = new PDO("mysql:host=localhost;dbname=darthur_Critique", "darthur_critique", "924H67D3b624wy2");
		$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->results = array();
			
		return $this;
	}
	
	
	
	
	/***Generic Methods***/
	public function getInfo(){
		if($this->con === null ) return "No Connection";
		else return "Connected"; 
	}

	public function getResults(){
		return $this->results;
		
	}


	
	
	/***CRUD Methods for Database Manipulation***/
	public function retrieve($param = null){                                   
	
		if($param === null){	 
			$query = $this->con->prepare("SELECT * FROM documents");
			$query->execute(); 
			
			$this->results = array(); 
			
				while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$this->results[] = $row;
				}
				
		}else if($param !== null && is_numeric($param) ){
			$query = $this->con->prepare("SELECT * FROM documents WHERE doc_id=:id");
			$query->bindParam(':id', $param);
			$query->execute();  
			
			$this->results = array();
			
				while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$this->results[] = $row;
				}
		
		}
		
		
		return $this;
	}
	

	
	public function create($param1, $param2, $param3){                                      
		$query = $this->con->prepare("INSERT INTO documents (doc_id, name, image_url) VALUE (:id, :name, :img) ");
		$query->bindParam(":id", $param1);
		$query->bindParam(":name", $param2);
		$query->bindParam(":img", $param3);
		$query->execute();  
			
		return $this;
	
	}
	
	
	public function update($param1, $param2, $param3){                         
		$query = $this->con->prepare("UPDATE documents SET name=:name, image_url=:img WHERE doc_id=:id ");
		$query->bindParam(":id", $param1);
		$query->bindParam(":name", $param2);
		$query->bindParam(":img", $param3);
		$query->execute();  
			
		return $this;
	
	}
	
	public function delete($param){                                            
		$query = $this->con->prepare("DELETE FROM documents WHERE doc_id=:id");
		$query->bindParam(":id", $param);
		$query->execute();  
		
		return $this;
	}
	
	
}


?>