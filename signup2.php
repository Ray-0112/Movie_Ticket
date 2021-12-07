<?php
	$show=$_GET['show'];
	if((!$_GET)||(!$_GET['name'])||(!$_GET['password']))
	{
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>使用者註冊頁面</title>
<link rel="stylesheet" type="text/css" href="login.css"/>
<script>
	function getn()
	{return document.getElementById("n").value;};
	function getp()
	{return document.getElementById("p").value;};
</script>
</head>
<body>
    <img src="homepage.png" width="50" onclick="location.href='home.php'">
    <div id="login_frame">
        <p id="image_logo"><img src="logo.jpg" width="100"></p>
       
        <p><label class="label_input">帳號</label><input type=text name="name" class="text_field" id="n"/></p>
        <p><label class="label_input">密碼</label><input type=password name="password" class="text_field" id="p"/></p>
        <div id="login_control">
       <input type="submit" onclick="location.href='signup2.php?'+'name='+getn()+'&password='+getp()+'&show=<?php echo $show;?>'" value="註冊">
    <input type ="button" onclick="location.href='login2.php?'+'name='+getn()+'&password='+getp()+'&show=<?php echo $show;?>'" value="登入帳號">
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
		$GLOBALS['this_file_org']="signup2.php";
		
		function leave($inuser,$inpw)
		{
			

			$q_str="select * from the_user where user_id=".json_encode($inuser);
			if(!query($q_str)['data'])
			{
				$m_str="insert into the_user(user_id,password_hash,money) values (".json_encode($inuser).",".json_encode($inpw).",'0')";
				sql($m_str);
				header("Location: seat_button.php?name=".$_GET['name']."&password=".$_GET['password']."&show=".$_GET['show']);
				exit();
			}
			else
			{
				echo "<meta http-equiv=\"refresh\" content=\"0;url=".$GLOBALS['this_file_org']."?show=".$_GET['show']."\" />";
				echo "<p>We Gonna Redirect in 0 seconds.</p>";
				throw new Exception("no get it");
			}
		}

		
		if(!$_GET['name'])
		{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=".$GLOBALS['this_file_org']."?show=".$show."\" />";
			echo "<p>We Gonna Redirect in 0 seconds.</p>";
			throw new Exception("no name it");
		}
		else if(!$_GET['password'])
		{
			echo "<meta http-equiv=\"refresh\" content=\"0;url=".$GLOBALS['this_file_org']."?show=".$show."\" />";
			echo "<p>We Gonna Redirect in 0 seconds.</p>";
			throw new Exception("no password it");
		}
		else
			leave($_GET['name'],$_GET['password']);
	}
?>