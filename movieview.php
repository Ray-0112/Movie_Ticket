<?php
	$str='';
	if($_GET)
		$str='name='.$_GET['name'].'&password='.$_GET['password'];
	else
		$str='';
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="movieview.css"/>
		<script>
		function invert(infrom)
		{
			for(i=0;i<2;i++)
			{
				const node=document.getElementById(infrom).getElementsByClassName("viewbox"+i)[0];
				console.log("viewbox"+i,node.style.visibility);
				if(node.style.visibility=="hidden")
				{
					node.style.display="";
					node.style.visibility="";
				}
				else
				{
					node.style.display="none";
					node.style.visibility="hidden";
				}
			}
			return;
				
		}
		</script>
	</head>
	<body>
		<p><img src="homepage.png" width="50" onclick="location.href='home.php?<?php echo $str; ?>'"></p>
		<p><img src="log.png" style="width:30"></p>
<?php
	$GLOBALS['db_src']="ma_ttt";
	include("connect_db.php"); 
	$q_str="select * from movie";
	if($result=query($q_str))
	{
		foreach($result['data'] as $line)
		{
		?>
		<div class="unit">
			<div class="viewbox0">
				<table style="width:48%;margin:0.5%;padding:10px 2px;
				font-size:12px;border:5px solid rgb(47, 226, 226);
				border-radius:20px;border-style: double;background: #cce8de">
					<tr>
						<td rowspan="4">
							<img src="<?php echo $line['movie_id'];?>.jpg" style="width:175px;height:250px;border:2px solid white">
						</td>
						<td style="font-size:15px"></td>
					</tr>
					<tr>
						<td><h1><?php echo $line['movie_id'];?></h1></td>
					</tr>
					<tr>
						<td>
							<h3>分級:</h3>
							<img src="普遍級.png" style="width:50px;vertical-align:middle">
						</td>
					</tr>
					<tr>
						<td><h3>上映日期:2020/10/16</h3></td>
					</tr>
				</table>
			</div>
			<div class="viewbox1">
				<table style="width:48%;margin:0.5%;padding:10px 2px;
				font-size:12px;border:5px solid rgb(47, 226, 226);
				border-radius:20px;border-style: double;background: #cce8de">
					<tr>
						<td rowspan="4">
							<img src="<?php echo $line['movie_id'];?>.jpg" style="width:175px;height:250px;border:2px solid white">
						</td>
						<td style="font-size:15px"></td>
					</tr>
					<tr>
						<td><h1><?php echo $line['movie_id'];?></h1></td>
					</tr>
					<tr>
						<td>
							<h2>劇情簡介:</h2>
							<h4><?php echo $line['movie_info'];?></h4>
						</td>
					</tr>
				</table>
			</div>
			<button class="button1 inverter" onclick="">劇情簡介</button>
			<!-- search.php? -->
			<button class="button1"onclick="location.href=&quot;index.php?type=search<?php if($_SERVER['QUERY_STRING']){ echo ('&'.$_SERVER['QUERY_STRING']);} echo '&movie=[&bsol;&quot;'.$line['movie_id'].'&bsol;&quot;]';?>	&quot;;">線上訂票</button>
		</div>
		<?php
		}
		
	}
?>
	
	</body>
	<script>
		{
		let i=0;
		for(let node of document.getElementsByClassName("unit"))
		{
			node.id="unit"+i;
			console.log(node.id);
			i++;
			node.getElementsByClassName("inverter")[0].setAttribute("onclick","invert("+JSON.stringify(node.id)+")");
			
			node.getElementsByClassName("viewbox1")[0].style.display="none";
			node.getElementsByClassName("viewbox1")[0].style.visibility="hidden";
		}
		}
	</script>
</html>