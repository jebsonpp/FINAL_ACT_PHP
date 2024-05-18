<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(10);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

<style type="text/css">

	
	#text {
    height: 30px;
    border-radius: 8px;
    padding: 6px 10px;
    border: solid 1px #ccc;
    width: 100%;
    font-size: 16px;
    box-sizing: border-box;
}

#button {
    padding: 12px 20px;
    color: white;
    background-color: #007BFF;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

#button:hover {
    background-color: #0056b3;
}

#box {
    background-color: #f9f9f9;
    margin: 50px auto;
    width: 320px;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e9e9e9;
            margin: 0;
        }
	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Sign up here</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click here to Login</a><br><br>
		</form>
	</div>
</body>
</html>