<?php
	$GLOBALS['get_str']=$_SERVER['QUERY_STRING'];
	if(!$_GET)
	{
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>使用者註冊頁面</title>
<link rel="stylesheet" type="text/css" href="login.css"/>
</head>
<body>
    <img src="homepage.png" width="50" onclick="location.href='home.php'">
    <div id="login_frame">
        <p id="image_logo"><img src="logo.jpg" width="100"></p>
        <form action="signup.php" method="get">
        <p><label class="label_input">帳號</label><input type=text name="name" class="text_field"/></p>
        <p><label class="label_input">密碼</label><input type=password name="password" class="text_field"/></p>
        <div id="login_control">
        <input type="submit" value="註冊">
        <input type ="button" onclick="location.href='login.php'" value="會員登入">
        </div>
        </form>
    </div>
</body>
</html>
<?php
	}
	else
	{
		$GLOBALS['db_src']="ma_ttt";
		include("connect_db.php"); 
		$GLOBALS['this_file_org']="signup.php";
		
		function leave($inuser,$inpw)
		{
			

			$q_str="select * from the_user where user_id=".json_encode($inuser);
			if(!query($q_str)['data'])
			{
				$m_str="insert into the_user(user_id,password_hash,money) values (".json_encode($inuser).",".json_encode($inpw).",'0')";
				sql($m_str);
				header('Location: home.php?'.$GLOBALS['get_str']);
				exit();
			}
			else
			{
				echo "<meta http-equiv=\"refresh\" content=\"0;url=".$GLOBALS['this_file_org']."\" />";
				echo "<p>We Gonna Redirect in 0 seconds.</p>";
				throw new Exception("user_id found");
			}
		}

		
		if(!$_GET['name'])
		{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=".$GLOBALS['this_file_org']."\" />";
			echo "<p>We Gonna Redirect in 0 seconds.</p>";
			throw new Exception("no name it");
		}
		else if(!$_GET['password'])
		{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=".$GLOBALS['this_file_org']."\" />";
			echo "<p>We Gonna Redirect in 0 seconds.</p>";
			throw new Exception("no password it");
		}
		else
			leave($_GET['name'],$_GET['password']);
	}
?>