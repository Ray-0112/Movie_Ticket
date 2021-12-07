<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="home.css"/>
</head>
<body>

<ul>
  <li><a href="home.php?<?php echo $_SERVER['QUERY_STRING'];?>">首頁</a></li>
  <li><a href="movieview.php?<?php echo $_SERVER['QUERY_STRING'];?>">查詢電影</a></li>
  <li><a href="index.php?<?php echo $_SERVER['QUERY_STRING'];?>">搜尋系統</a></li>
  <li><a href="theater.php?<?php echo $_SERVER['QUERY_STRING'];?>">查詢影城</a></li>
	<?php
  		if($_GET)
  		{
  			if(!$_GET['name'])
  				throw new Exception("name missed");
  			if(!$_GET['password'])
  				throw new Exception("password missed");
	  		$inuser=$_GET['name'];
	  		$inpw=$_GET['password'];
			$GLOBALS['db_src']="ma_ttt";
			include("connect_db.php"); 
	  		$q_str="select * from the_user where user_id=".json_encode($inuser)." and password_hash=".json_encode($inpw);
			if(query($q_str)['data'])
			{
  				echo "<div id=loginout><li style=\"float:right\"><a class=\"active\" href=\"home.php\">登出</a></li></div>";
  			}
			if(query($q_str)['data'])
			{
				echo "<div id=user_button style=\"float:right\"><a class=\"active\" href=\"delseat.php?".$_SERVER['QUERY_STRING']."\"><img src=\"user_logo.png\"width=20px; >$inuser</a>";
			}
			
		}
		else{
  				echo "<li style=\"float:right\"><a class=\"active\" href=\"login.php?".$_SERVER['QUERY_STRING']."\">登入/註冊</a></li>";
  			}
?>
  
</ul>

</body>
</html>

