<?php
require "../config/connect.php";

/**
 * 
 */
class Dean extends DBConnect
{
	private $dean;
	function __construct()
	{
		# code...
		parent::__construct('uhbmeeting','root','','localhost');
		$this->dean=$this->db;
	}

	public function addInfo($name,$unvv,$car,$hotil,$tik,$Ttime,$checkout,$phone,$email){

        $sql=$this->dean->prepare("INSERT INTO info (name,email,phone,unviersity,airport,hotel,timeariv,dateariv,datecheck)VALUES(?,?,?,?,?,?,?,?,?)");
        if ($sql->execute(array($name,$email,$phone,$unvv,$car,$hotil,$Ttime,$tik,$checkout))) {
        	header("location:index.php");
        }
        else{
        	echo "string";
        }
	}

	public function addTitle($email,$tit,$ds){
		$sql=$this->dean->prepare("INSERT INTO subject(email,title,descr)VALUES(?,?,?)");
		if ($sql->execute(array($email,$tit,$ds))) {
			return "donet";
		}
		return "no";
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

	public function displayData($email){
		$sql =$this->dean->prepare("SELECT * FROM info WHERE email=?");
		$sql->execute(array($email));
		return $sql;
	}

	public function checkinfo($email){
		$sql=$this->dean->prepare("SELECT * FROM info WHERE email=?");
		$sql->execute(array($email));
		if ($sql->rowCount()==1) {
			# code...
			return true;
		}
		else{
			return false ;
		}
	}

	public function updateInfo($name,$phone,$dat1,$dat2,$email){
		$sql=$this->dean->prepare("UPDATE info SET name=?,phone=?,dateariv=?,datecheck=? WHERE email=?");
		
		if($sql->execute(array($name,$phone,$dat1,$dat2,$email))){
			return "done update";
		}else{
			return 'error update';
		}

	}

	public function deleteSub($id){
		$sql=$this->dean->prepare("DELETE FROM subject WHERE id_s=?");
		if ($sql->execute(array($id))) {
			# code...
			return 'done dele';
		}
		else{
			return 'error';
		}
	}


	public function checkPerm($email,$pass){
		$sql=$this->dean->prepare("SELECT * FROM user WHERE email=? AND password=? AND role='1'");
		$sql->execute(array($email,$pass));
		$rowcount=$sql->rowCount();
		if($rowcount==1){
          return true;
		}
		return false;

	}


}