<?php
require "../config/connect.php";

/**
 * 
 */
class Staf extends DBConnect
{
	private $dean;
	function __construct()
	{
		# code...
		parent::__construct('uhbmeeting','root','','localhost');
		$this->dean=$this->db;
	}

	

	

	public function display(){
		$sql =$this->dean->prepare("SELECT * FROM subject LEFT JOIN info ON subject.email=info.email");
		$sql->execute();
		return $sql;
	}

	public function getNabe($email){
		$sql=$this->dean->prepare("SELECT name FROM info WHERE email=?");
		$sql->execute(array($email));
		if($sql->rowCount()==1){
			foreach ($sql as $key ) {
				# code...
				return $key['name'];
			}
		}
		else{
			return "";
		}
	}

	public function displayData(){
		$sql =$this->dean->prepare("SELECT * FROM info");
		$sql->execute();
		return $sql;
	}

	public function checkPerm($email,$pass){
		$sql=$this->dean->prepare("SELECT * FROM user WHERE email=? AND password=? AND role='2'");
		$sql->execute(array($email,$pass));
		$rowcount=$sql->rowCount();
		if($rowcount==1){
          return true;
		}
		return false;

	}


}