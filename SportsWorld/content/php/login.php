<?php	
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['user']) && isset($_POST['pass']))
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
	
			$handle = file_get_contents("users.txt", "r") or die('Users list not found!');
			
			$found = false;
			$json_content = json_decode($handle, true);
			foreach ($json_content["myusers"] as &$json_value)
			{
				if ($json_value["myuser"] == $user && $json_value["mypass"] == $pass )
				{
					$_SESSION['user'] = $user;
					$_SESSION['email'] = $json_value["email"];
					$_SESSION['avt'] = $json_value["avt"];
					$_SESSION['team'] = $json_value["team"];
					$_SESSION['age']= $json_value['age'];
					$_SESSION['found']=true;
					break;
				}
			}
				
			if (!$found)
			{
				$_SESSION['error'] = "Username or password incorrect !"; 
				header("Location: ../index.php");
			}
			else
			{
				header("Location: ../index.php");
				exit();
			}
	}
	

?>