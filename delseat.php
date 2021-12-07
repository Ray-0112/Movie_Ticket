<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="home.css"/>
		<script type="text/javascript" src="query.js"></script>
		<script>
			let key_str="name=<?php echo $_GET['name']?>&password=<?php echo $_GET['password']?>";
			let current_state;
			let money;
			function update()
			{
				let qstr="querySys.php?type=myseat&"+key_str;
				//console.log(qstr);
				current_state=JSON.parse(new connection("post",qstr).send(""));
				console.log(current_state);
				
				qstr="querySys.php?type=Money&<?php echo $_SERVER['QUERY_STRING']?>";
				//console.log(qstr);
				money=JSON.parse(new connection("post",qstr).send(""));
				return;
			};
			update();
			setInterval(update,500);
			
			
			
			function refund(inpos,show_id)
			{
				//console.log(show_id,inpos);
				let qstr="querySys.php?type=refund&"+key_str+"&seat="+JSON.stringify(inpos)+"&show="+show_id;
				//console.log(qstr);
				return new connection("post",qstr).send("");
			};
			
			
			function update_table()
			{
				
				let content_str="";
				
					content_str+="<tr>";
					for(let key of current_state.row)
					{
						content_str+="<td>";
						content_str+=key;
						content_str+="</td>";
					}
						content_str+="<td>";
						content_str+="</td>";
					content_str+="</tr>";
				
				for(let line of current_state.data)
				{
					content_str+="<tr>";
					console.log(line);
					for(let key of current_state.row)
					{
						content_str+="<td>";
						content_str+=line[key];
						content_str+="</td>";
					}
					content_str+="<td>";
						content_str+="<button style=\"background-color:red;color:white;\" onclick=\"refund("+line["seat_id"]+",&quot;"+line["show_id"]+"&quot;);\">"+"退票"+"</button>";
					content_str+="</td>";
					content_str+="</tr>";
				}
				document.getElementById("youseat").innerHTML=content_str;
				document.getElementById("money").innerHTML=money;
				return content_str;
			};
			setInterval(update_table,1000);
		</script>
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
  
</ul><br /><br /><br />
<div style="background-color:lightblue">
<br /><br /><br /><br /><br /><p>
			你目前有<a id="money"></a>元。
		</p>
		<table id="youseat">
		</table><br /><br /><br /><br /><br /><br />
		</div>
	</body>
	<script>
		update_table();
	</script>

</html>