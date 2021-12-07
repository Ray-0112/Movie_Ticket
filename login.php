<?php
	$GLOBALS['get_str']=$_SERVER['QUERY_STRING'];
	if(!$_GET)
	{
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>登入頁面</title>
<link rel="stylesheet" type="text/css" href="login.css"/>
</head>
<body>
    <img src="homepage.png" width="50" onclick="location.href='home.php'">
    <div id="login_frame">
    <p id="image_logo"><img src="logo.jpg" width="100"></p>
    <form name="login.php" action="login.php" method="get">
    <p><label class="label_input">帳號</label><input type=text name="name" class="text_field"/></p>
    <p><label class="label_input">密碼</label><input type=password name="password" class="text_field"/></p>
    <div id="login_control">
    <input type="submit" value="登入">
    <input type ="button" onclick="location.href='signup.php'" value="註冊帳號">
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
		$GLOBALS['this_file_org']="login.php";
		
		function leave($inuser,$inpw)
		{
			
			$q_str="select * from the_user where user_id=".json_encode($inuser)." and password_hash=".json_encode($inpw);
			if(query($q_str)['data'])
			{
				//echo "Location: home.php?".$GLOBALS['get_str'];
				header('Location: home.php?'.$GLOBALS['get_str']);
				exit();
			}
			else
			{
				echo "<meta http-equiv=\"refresh\" content=\"0;url=".$GLOBALS['this_file_org']."\" />";
				echo "<p>We Gonna Redirect in 0 seconds.</p>";
				throw new Exception("no get it");
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
