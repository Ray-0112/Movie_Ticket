<?php
	$str='';
	if($_GET)
		$str='name='.$_GET['name'].'&password='.$_GET['password'];
	else
		$str='';
?>
<html>
<head>
  <meta charset="utf-8">
  <style>
   button 
   {
    font-size: 120px;
   }
   
  </style>
  <script type="text/javascript" src="query.js"></script>
  <script>
   let usr_id="<?php echo $_GET['name']?>";
   let current_state;
   let money;
   function update()
   {
    let qstr="querySys.php?type=show&<?php echo $_SERVER['QUERY_STRING']?>";
    //console.log(qstr);
    let x=JSON.parse(new connection("post",qstr).send(""));
    //console.log(current_state);
    current_state=x;
    
    qstr="querySys.php?type=Money&<?php echo $_SERVER['QUERY_STRING']?>";
    //console.log(qstr);
    money=JSON.parse(new connection("post",qstr).send(""));
    return;
   };
   update();
   setInterval(update,1000);
   
   function all_seat()
   {
    let list=[];
    const fixed=current_state.data;
    
    for(let line of fixed)
     list.push(JSON.parse(line.seat_id));
    
    return list;
   };
   function all_empty_seat()
   {
    let list=[];
    const fixed=current_state.data;
    
    for(let line of fixed)
     if(line.user_id==null)
      list.push(JSON.parse(line.seat_id));
    
    return list;
   };
   function all_my_seat()
   {
    let list=[];
    const fixed=current_state.data;
    
    for(let line of fixed)
     if(line.user_id==usr_id)
      list.push(JSON.parse(line.seat_id));
    
    return list;
   };
   function maxofindex(index)
   {
    let x=0;
    for(let line of all_seat())
     x=Math.max(x,line[index]);
    return x;
   }
   function islseq(ls1,ls2)
   {
    if(ls1.length!=ls2.length)
     return 0;
    for(let i in ls1)
     if(ls1[i]!=ls2[i])
      return 0;
    return 1;
   }
   
   function isin(ls,inpos)
   {
    for(let line of ls)
    {
     if(islseq(line,inpos))
     {
      return 1;
     }
    }
    return 0;
   }
   
   function getmoney()
   {
    let qstr="querySys.php?type=getMoney&<?php echo $_SERVER['QUERY_STRING']?>&money=100";
    new connection("post",qstr).send("");
   };
   function record(inpos)
   {
    let qstr="querySys.php?type=buy&<?php echo $_SERVER['QUERY_STRING']?>&seat="+JSON.stringify(inpos);
    new connection("post",qstr).send("");
   };
   function refund(inpos)
   {
    let qstr="querySys.php?type=refund&<?php echo $_SERVER['QUERY_STRING']?>&seat="+JSON.stringify(inpos);
    new connection("post",qstr).send("");
   };
   
   
   function update_table()
   {
    let tr_max=maxofindex(0);
    let td_max=maxofindex(1);
    let content_str="";
    
    for(let i=0;i<=tr_max;i++)
    {
     content_str+="<tr>";
     for(let j=0;j<=td_max;j++)
     {
      content_str+="<td>";
      if(isin(all_my_seat(),[i,j]))
        content_str+="<button style=\"background-color:yellow;color:black;size=200%;\" onclick=\"refund("+JSON.stringify([i,j])+")\">"+JSON.stringify([i,j])+"</button>";
      else if(isin(all_empty_seat(),[i,j]))
       content_str+="<button style=\"background-color:white;color:black;size=200%\" onclick=\"record("+JSON.stringify([i,j])+")\">"+JSON.stringify([i,j])+"</button>";
      else if(isin(all_seat(),[i,j]))
       content_str+="<button style=\"background-color:grey;color:black;\">"+JSON.stringify([i,j])+"</button>";
      else
       content_str+="<button style=\"background-color:black;color:black;\">　　</button>";
      content_str+="</td>";
     }
     content_str+="</tr>";
    }
    document.getElementById("all_seats").innerHTML=content_str;
    document.getElementById("money").innerHTML=money;
    return content_str;
   };
   setInterval(update_table,1000);
   
   
  </script>
 </head>
	
	<body>
	<img src="homepage.png" width="50" onclick="location.href='home.php?<?php echo $str; ?>'">
		<div class="p">
			<p style="color:black">你目前有<a id="money"></a>元。
		</div>
		<button class="myButton" onclick="getmoney()">即時線上儲值</button>
		<table id="all_seats"></table>
	</body>
	<div id=login_frame>
		<script>
		update_table();
		</script>
	</div>
	
</html>