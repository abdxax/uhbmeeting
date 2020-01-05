<?php

/**
 * 
 */
class DBConnect 
{

	protected $db;
	function __construct($db,$user,$pass,$host)
	{

		//connection.
		$this->db=new PDO("mysql:host=$host;dbname=$db",$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
	}
}