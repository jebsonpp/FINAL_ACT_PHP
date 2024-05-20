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

			//read from database
			$query = "SELECT* FROM users WHERE user_name = '$user_name' LIMIT 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div style="font-size: 20px;margin: 10px;color: black;">Login here</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php"> Don't have an account? Click here to Signup</a><br><br>
		</form>
	</div>
</body>
</html>