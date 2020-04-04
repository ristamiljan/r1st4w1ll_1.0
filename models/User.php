<?php 
namespace Users;

use Connections\Connection as Connection;

class User
{
	private $firstname;
	private $lastname;
	private $email;


	public function printUser($color="blue"){
		echo "<center style='color:".$color."'><h3>".$this->firstname." ".$this->lastname." ".$this->email."</h3>";
	}

	public static function all(){
		return Connection::getAllUsers();
	}
}