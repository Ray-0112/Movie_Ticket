<?php
	$GLOBALS['db_src']="ma_ttt";
	include("connect_db.php"); 
	function get_all_data($inpara)
	{
		return $inpara;
	}


	if(!$_GET)
		throw new Exception("no get it");
	if($_GET['type']=="search")
	{
		$movie_args=json_decode(urldecode($_GET['movie']));
		$theater_args=json_decode(urldecode($_GET['theater']));
		$str="";
		{
			$first=1;
			if(is_array($movie_args)&&count($movie_args)>0)
			{
				$str=$str." (";
				foreach($movie_args as $line)
				{
					if(!$first)
						$str=$str." OR ";
					$str=$str."movie_id=\"".($line)."\"";
					$first=0;
				}
				$str=$str.")";
			}
			else
			{
				$str=$str."(0)";
			} 
			
			$str=$str." AND ";
			if(is_array($theater_args)&&count($theater_args)>0)
			{
				
				$str=$str."(";
				$first=1;
				foreach($theater_args as $line2)
				{
					if(!$first)
						$str=$str." OR ";
					$str=$str."theater_id=\"".($line2)."\"";
					$first=0;
				}
				$str=$str.")";
			}
			else
			{
				$str=$str."0";
			}
		}
		
		$qstr="select * from a_show where 0 OR (". $str.")";
		echo json_encode(query($qstr));
	}
	if($_GET['type']=="myseat")
	{
		if(!$_GET['name'])
			throw new Exception("no name it");
		if(!$_GET['password'])
			throw new Exception("no password it");
		$q_str="select * from the_user where user_id=".json_encode($_GET['name'])." and password_hash=".json_encode($_GET['password']);
		if(!query($q_str)['data'])
			throw new Exception("no right it");
		$qstr="select * from (seat join a_show using(show_id)) where user_id=".json_encode($_GET['name']);
		echo json_encode(query($qstr));
	}
	if($_GET['type']=="show")
	{
		if(!$_GET['show'])
			throw new Exception("no seat it");
		$qstr="select * from seat where show_id=\"".($_GET['show'])."\"";
		echo json_encode(query($qstr));
	}
	if($_GET['type']=="buy")
	{
		if(!$_GET['name'])
			throw new Exception("no name it");
		if(!$_GET['password'])
			throw new Exception("no password it");
		$q_str="select * from the_user where user_id=".json_encode($_GET['name'])." and password_hash=".json_encode($_GET['password']);
		if(!query($q_str)['data'])
			throw new Exception("no right it");
		if(!$_GET['show'])
			throw new Exception("no show it");
		if(!$_GET['seat'])
			throw new Exception("no seat it");
		$qstr="select * from seat where seat_id=".json_encode($_GET['seat'])." and user_id is NULL and show_id='".($_GET['show'])."'";
		json_encode(query($qstr));
		if(!query($qstr)['data'])
			throw new Exception("no empty seated it");
		
		$current_money=intval(query("select money from the_user where user_id=".json_encode($_GET['name']))['data'][0]['money']);
		$cost_amount=intval(query("select price from seat where seat_id=".json_encode($_GET['seat']))['data'][0]['price'])." and show_id='".($_GET['show'])."'";
		if($current_money<$cost_amount)
			throw new Exception("no enough money it");
		
		$new_money=strval($current_money-$cost_amount);
		
		$qstr="UPDATE  seat set user_id=".json_encode($_GET['name'])." where seat_id=".json_encode($_GET['seat'])."and show_id='".($_GET['show'])."'";
		sql($qstr);
		$qstr="UPDATE  the_user set money=".$new_money." where user_id=".json_encode($_GET['name']);
		sql($qstr);
	}
	if($_GET['type']=="refund")
	{
		if(!$_GET['name'])
			throw new Exception("no name it");
		if(!$_GET['password'])
			throw new Exception("no password it");
		$q_str="select * from the_user where user_id=".json_encode($_GET['name'])." and password_hash=".json_encode($_GET['password']);
		if(!query($q_str)['data'])
			throw new Exception("no right it");
		if(!$_GET['show'])
			throw new Exception("no show it");
		if(!$_GET['seat'])
			throw new Exception("no seat it");
		$qstr="select * from seat where seat_id=".json_encode($_GET['seat'])." and user_id=".json_encode($_GET['name'])." and show_id='".($_GET['show'])."'";
		if(!query($qstr)['data'])
			throw new Exception("no get seated it");
		
		$current_money=intval(query("select money from the_user where user_id=".json_encode($_GET['name']))['data'][0]['money']);
		$refund_amount=intval(query("select price from seat where seat_id=".json_encode($_GET['seat']))['data'][0]['price'])." and show_id='".($_GET['show'])."'";
		$new_money=strval($current_money+$refund_amount);
		$qstr="UPDATE  seat set user_id=NULL where seat_id=".json_encode($_GET['seat'])."and show_id='".($_GET['show'])."'";
		sql($qstr);
		$qstr="UPDATE  the_user set money=".$new_money." where user_id=".json_encode($_GET['name']);
		sql($qstr);
		
	}
	if($_GET['type']=="getMoney")
	{
		if(!$_GET['name'])
			throw new Exception("no name it");
		if(!$_GET['money'])
			throw new Exception("no money it");
		$current_money=intval(query("select money from the_user where user_id=".json_encode($_GET['name']))['data'][0]['money']);
		$add_amount=intval($_GET['money']);
		$new_money=strval($current_money+$add_amount);
		$qstr="UPDATE  the_user set money=".$new_money." where user_id=".json_encode($_GET['name']);
		sql($qstr);
		
	}
	if($_GET['type']=="Money")
	{
		if(!$_GET['name'])
			throw new Exception("no name it");
		echo json_encode((query("select money from the_user where user_id=".json_encode($_GET['name']))['data'][0]['money']));
	}
	if($_GET['type']=="getTheaters")
	{

		$qstr="select theater_id from theater";
		echo json_encode(query($qstr));
	}
	if($_GET['type']=="getMovies")
	{

		$qstr="select movie_id from movie";
		echo json_encode(query($qstr));
	}
?>