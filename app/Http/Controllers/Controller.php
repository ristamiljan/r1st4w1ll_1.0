<?php 
namespace Controllers;

use Users\User as User;
use Connections\Connection as Connection;

class Controller {

	public static function openWelcomeView(){
		$title="R1ST4W1LL__1.0 HOME";  //works simillar to sections in laravel(you can put everything you want in variable, and in view you will see it)
		require_once "../resources/views/welcome.view.php";
		echo "<center style='color:green'><h3>Welcome to homepage!</h3>";
		Connection::createTable("users"); //if you open project for the first time this will create table for you
	}
	public static function openUsersView(){
		$title="R1ST4W1LL__1.0 USERS";
		require_once "../resources/views/welcome.view.php";
		/*$res=Connection::selectAll();
		echo "<center>";
		while ($row = $res->fetch()) {
			$user= new User($row['firstname'],$row['lastname'],$row['email']);
			$user->printUser("grey");
		}*/
		$users=User::all();   //Connection::getAllUsers();
		foreach($users as $user){
			$user->printUser("grey");
		}
		
	}

	
	public static function openUserView($id){
		$title="R1ST4W1LL__1.0 USER:".$id;
		require_once "../resources/views/welcome.view.php";
		$id=preg_replace('~\D~', '', $id);
		/*$res=Connection::selectById($id);
		if($row=$res->fetch()){
			$user= new User($row['firstname'],$row['lastname'],$row['email']);
			$user->printUser();
		}
		else {
			echo "<center style='color:red'><h3>Looks like there is no user with id ".$id.".</h3>";
		}*/
		$user=Connection::getUserById($id);
		$user->printUser();
	}

	public static function openContactView(){
		$title="R1ST4W1LL__1.0 CONTACT";
		require_once "../resources/views/welcome.view.php";
		echo '<center><br><br><form method="post"><textarea name="content" rows="4" cols="50"></textarea><br><input type="submit" value="Send mail!" /></form>';
	}
	public static function reopenContactView($text){
		$title="R1ST4W1LL__1.0 CONTACT";
		require_once "../resources/views/welcome.view.php";
		echo '<center><h3 style="color:green">Success!</h3>Mail sent with content('.$text['content'].");";
	}

	public static function openAddView(){
		$title="R1ST4W1LL__1.0 ADD USER";
		require_once "../resources/views/welcome.view.php";
		echo "<center><h3 style='color:#EDB906'>Fill the form bellow to add user:</h3>";
		echo "<form method='post'>".
		"<input type='text' name='firstname' placeholder='First name'><br>".
		"<input type='text' name='lastname' placeholder='Last name'><br>".
		"<input type='mail' name='email' placeholder='Email'><br>".
		"<input type='submit' value='Add user'></form>";
	}

	public static function openAddedView(){
		$title="R1ST4W1LL__1.0 USER ADDED";
		require_once "../resources/views/welcome.view.php";
		Connection::addUser($_POST);
		echo "<center><h3 style='color:green'>User added successfully!</h3>";
		
	}

	public static function pathNotFound(){
		require_once "../resources/views/welcome.view.php";
		echo "<center style='color:red'><h3>Hmm. We’re having trouble finding that site.</h3>";
		echo "<h3 style='color:red'>Back to known page: <a style='color:green' href='/'>Home </a> </h3>";
	}
}
