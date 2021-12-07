<?php

date_default_timezone_set("Asia/Taipei");

$GLOBALS['db']=mysqli_connect("localhost","root","12345678");
mysqli_select_db($GLOBALS['db'],$GLOBALS['db_src']);

function hasRowInSQL($instr)
{
	$r=mysqli_query($GLOBALS['db'],$instr);
	return mysqli_num_rows($r)>0;
};

function sql($instr)
{
	mysqli_query($GLOBALS['db'],$instr);
	return;
};

function query($instr)
{
	//this function is ugly but useful;
	
	
	//init
	$result=mysqli_query($GLOBALS['db'],$instr);
	$str="";

	//first row will be field;
	$a=[];
	$a['row']=[];
	while($rf=mysqli_fetch_field($result))
	{
		foreach($rf as $w)
		{
			array_push($a['row'],$w);
			break;
		}
	}
	
	//and rest of row will be data;
	$i=0;
	$a['data']=[];
	while($row = mysqli_fetch_row($result))
	{
		$j=0;
		$a['data'][$i]=[];
		foreach($row as $w)
		{
			$key=$a['row'][$j];
			$a['data'][$i][$key]=$w;
			$j++;
		}
		$i++;
	}
	
	return $a;
};






?>