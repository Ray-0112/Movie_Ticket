<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="index1.css"/>
		<link rel="stylesheet" type="text/css" href="index2.css"/>
		<link rel="stylesheet" type="text/css" href="index3.css"/>
		<script type="text/javascript" src="query.js"></script>
		<script>
			function show()
			{
				document.getElementById("show_current").innerHTML=JSON.stringify(option);
				document.getElementById("show_current2").innerHTML=JSON.stringify(option2);
				let optstr="";
				if(option!=[])
					optstr+="&movie="+JSON.stringify(option);
				if(option2!=[])
					optstr+="&theater="+JSON.stringify(option2);
				let content=JSON.parse(new connection("post","querySys.php?type=search"+optstr).send(""));
				console.log(content.data);
				
				let n_content=""
					n_content+="<tr>";
						for(let key of content.row)
						{
							n_content+="<td>"+key+"</td>";
						}
						n_content+="<td>"+"</td>";
					n_content+="</tr>";
				for(let ele of content.data)
				{
					
					n_content+="<tr>";
						for(let key of content.row)
						{
							n_content+="<td>"+ele[key]+"</td>";
						}
						n_content+=
							"<td>"
								+"<button onclick='location.href=&quot;login2.php?"
								+"show="+ele.show_id
								+"&<?php echo $_SERVER['QUERY_STRING'];?>"
								+"&quot;;'>"+"GetSeatIng"+"</button>"
							+"</td>";
					n_content+="</tr>";
				}
				console.log(n_content);
				document.getElementById("show_table").innerHTML=n_content;
			};
			let all_button_name=function()
			{
				let x=JSON.parse(new connection("post","querySys.php?type=getMovies").send("")).data;
				let retlist=[];
				console.log(x);
				for(let line of x)
				{
					retlist.push(line.movie_id)
					console.log(line);
				}
				return retlist;
			}();
			let all_button_name2=function()
			{
				let x=JSON.parse(new connection("post","querySys.php?type=getTheaters").send("")).data;
				let retlist=[];
				console.log(x);
				for(let line of x)
				{
					retlist.push(line.theater_id)
					console.log(line);
				}
				return retlist;
			}();
			let option=[];
			let option2=[];
			
			function update(instr)
			{
				if(option.includes(instr))
					option=option.filter((word)=>(word!=instr));
				else
					option.push(instr);
				show();
			}
			function update2(instr)
			{
				if(option2.includes(instr))
					option2=option2.filter((word)=>(word!=instr));
				else
					option2.push(instr);
				show();
			}
		</script>
	</head>
	<body>
	<div class="tm-page-wrap mx-auto">
    
                <div class="tm-container-outer tm-banner-bg">
                    
                        <div class=" tm-banner-row-header">
                            <div class="col-xs-12">
								<div class="tm-banner-header">
        							<h1 class="text-uppercase tm-banner-title">歡迎威尼斯影城</h1>
            						<img src="dots-3.png" alt="Dots">
                					<p class="tm-banner-subtitle">電影選擇</p>
    							</div> 
							<div class="row tm-banner-row" id="tm-section-search">
        						<div class="tm-search-form tm-section-pad-2">
            						<div class="form-row tm-search-form-row">                                
                						<div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
											<p id="show_current"></p>
											<div id="buttons"><button onclick="option=all_button_name;show();">全選</button><button onclick="option=[];show();">全不選</button></div>
											<p id="show_current2"></p>
											<div id="buttons2"><button onclick="option2=all_button_name2;show();">全選</button><button onclick="option2=[];show();">全不選</button></div>
										<div class="form-row tm-search-form-row">
											<div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
												<button class="btn btn-primary tm-btn tm-btn-search text-uppercase" onclick="show();">更新表</button>
											</div>
										</div>
										<table id="show_table"></table>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>

		
	</body>
	<script>
			for(let an_button_name of all_button_name)
			{
				let str="<button onclick='update("+JSON.stringify(an_button_name)+")'>"+an_button_name+"</button>";
				document.getElementById("buttons").innerHTML+=str;
			}
			for(let an_button_name of all_button_name2)
			{
				let str="<button onclick='update2("+JSON.stringify(an_button_name)+")'>"+an_button_name+"</button>";
				document.getElementById("buttons2").innerHTML+=str;
			}
			show();
	</script>
</html>