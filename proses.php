<?php 
	// define database related variables
	$database = 'dbgrowth';
	$host = 'localhost';
	$user = 'root';
	$pass = '';
 
	// try to conncet to database
	$dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);
 
	if(!$dbh){
 
	   echo "unable to connect to database";
	}
	
	$email = "";
	
	if(isset($_GET['email'])){
		$email = $_GET['email'];
	}
	
	$q = 'SELECT * FROM tbakun WHERE email LIKE :email';

	$query = $dbh->prepare($q);

	$query->execute(array(':email' => $email));

	if($query->rowCount() == 0){
		echo "Available";
	}else{
		echo "Username not available";
	}
?>