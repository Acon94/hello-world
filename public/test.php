<html>
<body>
<?php
session_start();

	$conn = new PDO('mysql:host=localhost;dbname=assighnment','root','');

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = $conn->prepare("SELECT COUNT(id) FROM user WHERE username = '$username' AND password = '$password' ");
		$query->execute();

		$count = $query->fetchColumn();


		if($count == "1"){
			$_SESSION['username'] = $username;
			header('location:eee.php');
		}else{
			$message = "wrong answer";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}

?>

<form method="post" name="login">
username: <input type="text" name="username" /><br>
password: <input type="password" name="password"/><br>
<input type="submit" name= "login" value="login"  >

</form>
</table>
</body>
</html>