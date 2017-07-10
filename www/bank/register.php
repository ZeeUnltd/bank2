<?php
	include('include/db.php');
	//include('include/function.php');
	$error=array();

	if(array_key_exists('submit', $_POST)){

		if(empty($_POST['username'])){
			$error['username']="Enter a username";
		}

		if(empty($_POST['password'])){
			$error['password']="Enter a password";
		}

		if($_POST['pword']!=$_POST['password']){
			$error['pword']="Password mismatch";
		}

		if(empty($error)){
			$clean=array_map('trim', $_POST);
			//print_r($clean); exit();
			$hash=password_hash($clean['password'], PASSWORD_BCRYPT);
			$stmt = $conn->prepare("INSERT INTO admin(username, hash) VALUES(:us, :pwrd)");
			$data = [

				":us"=>$clean['username'],

			":pwrd"=> $hash
		];

			$stmt->execute($data);

			echo "Registration Successful";


		}
	}

?>


<html>
	<head>
		<title>Register</title>
	<style>

			body{
				background: linear-gradient(to bottom, #403B4A, #e7e9bb);
			}
			#register{
				text-align: center;
			}

			input[type=text], input[type=password], input[type="submit"]{
				position: relative;
				top: -40px;
				font-family: Montserrat;
				margin: 10px;
				padding: 20px 15px;
				border: 1px solid #ccc;
				border-radius: 10px;
				width: 70%;
			}

			div{
				background-color: white;
				height: 80%;
				width: 50%;
				display: block;
				margin: auto;
				border-radius: 30px;
				position: relative;
				top: 50px;
			}

			h1{
				color: black;
				font-family: montserrat;
				text-align: center;
				font-size: 90px;
			}

			input[type=submit]:hover{
				background-color: black;
				color: white;
				transition: 0.4s ease-in-out;
			}
		</style>
	</head>
	<body>
		<div>
			<h1>Register</h1>
			<form action="register.php" method="post" id="register">
				<p><input type="text" name="username" placeholder="Username"></p>
				<p><input type="password" name="password" placeholder="Password"></p>
				<p><input type="password" name="pword" placeholder="Confirm Password"></p>
				<p><input type="submit" name="submit" value="Register"></p>
	</form>
		</div>
	</body>
</html>
