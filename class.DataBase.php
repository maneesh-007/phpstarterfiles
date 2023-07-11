<?php

/**
 * 
 */
class DataBase 
{   
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
    private $dbname = "student";
    private $conn;

	function __construct()
	{
		try{
			$this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e){
			return $e->getMessage();
		}
	}
	public function select($sql,$parameters = []){
        $statement = $this->conn->prepare($sql);
		$count = 1;
		foreach ($parameters as $parameter) { 
			$statement->bindValue($count++,$parameter["field"],$parameter["type"]);
		}        
        try {
		   $statement->execute();	
		} catch(Exception $e){
			return $e->getMessage();
		}
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
	}
	public function get($sql,$parameters){
        $statement = $this->conn->prepare($sql);
		$count = 1;
		foreach ($parameters as $parameter) { 
			$statement->bindValue($count++,$parameter["field"],$parameter["type"]);
		}        
        try {
		   $statement->execute();	
		} catch(Exception $e){
			return $e->getMessage();
		}
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
	}
	public function insert($sql,$parameters){ 
        $statement = $this->conn->prepare($sql);
		$count = 1;
		foreach ($parameters as $parameter) { 
			$statement->bindValue($count++,$parameter["field"],$parameter["type"]);
		}        
        try {
		   $statement->execute();	
		} catch(Exception $e){
			return $e->getMessage();
		}
        $result = $this->conn->lastInsertId();
        return $result;
	}
}