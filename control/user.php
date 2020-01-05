<?php
require "config/connect.php";

/**
 * 
 */
class User extends DBConnect
{
	private $user;
	function __construct()
	{
		# code...
		parent::__construct('uhbmeeting','root','','localhost');
		$this->user=$this->db;
	}

	public function register($email,$pass){
		$sql=$this->user->prepare("INSERT INTO user (email,password,role)VALUES(?,?,?)");
		if($sql->execute(array($email,$pass,'1'))){
              return "done";
		}else{
          return "eroor2";
		}
		return null;
	}


}
