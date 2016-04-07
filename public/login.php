<?php
	session_start();

		$conn = new PDO('mysql:host=localhost;dbname=assighnment','root','');

		if(isset($_POST['login'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = $conn->prepare("SELECT roll FROM user WHERE username = '$username' AND password = '$password' ");
			$query->execute();

			$roll = $query->fetchColumn();


			if($roll == "student"){
				$_SESSION['username'] = $username;
				$_SESSION['loggedIn'] = true;

				header('location:student.php');
			}
			else if($roll == "lecturer"){
				$_SESSION['username'] = $username;
				$_SESSION['loggedIn'] = true;
				header('location:lecturer.php');

			}else if($roll == "employer"){
				$_SESSION['username'] = $username;
				$_SESSION['loggedIn'] = true;
				header('location:employer.php');

			}
			else{
				$message = "wrong answer";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
	}
