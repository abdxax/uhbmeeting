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

	public function login($email,$pass){
		$password=sha1("uhb".$pass);
		$sql=$this->user->prepare("SELECT * FROM user WHERE email=? AND password=?");
		$sql->execute(array($email,$password));
		if($sql->rowCount()==1){
			foreach ($sql as $key ) {
				# code...
				if ($key['role']==1) {
					$_SESSION['email']=$email;
					$_SESSION['pass']=$password;
					$sql_check=$this->user->prepare("SELECT * FROM info WHERE email=?");
					$sql_check->execute(array($email));
					if($sql_check->rowCount()<=0){
						header("location:dean/info.php");
					}
					else{
					header("location:dean/index.php");
				    }

				}
				else if($key['role']==2){
					$_SESSION['email']=$email;
					$_SESSION['pass']=$password;
					header("location:staf/index.php");

				}
				else{
					return "eroor2";

				}
			}

		}
		else{
			return "user error";
		}

	}


}
