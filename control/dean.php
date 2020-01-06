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
}