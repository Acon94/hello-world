<?php
/**
 * login file
 */
	session_start();

	$conn = new PDO('mysql:host=localhost;dbname=assighnment','root','');

	if(isset($_POST['login'])){

		$username=$_POST['useername'];
		$password=$_POST['password'];

		$query = $conn->prepare("SELECT * FROM users WHERE username='$username'");
		$query->execute();

		$roll = $query->fetchColumn();


		if($roll == "student")
		{
			$_SESSION['username'] = $username;

			header('location:eee.php');
		}
	}
