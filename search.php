<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>搜尋系統</title>
    <link rel="stylesheet" href="index1.css">                
    <link rel="stylesheet" href="index2.css">                                      
    <link rel="stylesheet" href="index3.css">
    <script>
            function print_value() 
        {
	        document.getElementById("result").innerHTML = document.getElementById("Movie").value;
            var x=document.getElementById("theValue");
                x.value=document.getElementById("result").innerHTML;
        }
        function deleteOption(list){
	        var index=list.selectedIndex;
	        if (index>=0)
		    list.options[index]=null;
	        else
		    alert("沒有選擇的電影！");
        }
        function addOption(list, text, value)
        {
	        var index=list.options.length;
	        list.options[index]=new Option(text, value);
            list.selectedIndex=index;
        }
    </script>                                  
</head>
      <body>
        <div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg">
                    <div class="container">
                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
                                    <h1 class="text-uppercase tm-banner-title">歡迎威尼斯影城</h1>
                                    <img src="dots-3.png" alt="Dots">
                                    <p class="tm-banner-subtitle">票種選擇</p>
                                </div>    
                            </div>  <!-- col-xs-12 -->                      
                        </div> <!-- row -->
                        <div class="row tm-banner-row" id="tm-section-search">
                            <form action="index.html" method="get" class="tm-search-form tm-section-pad-2">
                                <div class="form-row tm-search-form-row">                                
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="inputmovie">選擇你所要看的電影</label>
                                        <select name="Movie" class="form-control tm-select" id="Movie" onchange="print_value()">
                                            <option value="鬼滅之刃劇場版 無限列車" selected>鬼滅之刃劇場版 無限列車</option>
                                            <option value="返校 習近平的恐懼">返校 習近平的恐懼</option>
                                            <option value="波多野結衣">波多野結衣</option>
                                        </select>
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="inputmovie">想要觀看的電影清單</label>
                                        <select id=theList size=5 class="form-control tm-select"></select>
                                        您已選擇的電影: <input type="text" id="theValue" value=""><br>
                                        <input type="button" value="新增電影清單" onclick="addOption(theList, theValue.value)">
                                        <input type="button" value="刪除所選電影" onclick="deleteOption(theList)">
                                        <div id="result"></div>
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="inputmovie">選擇時間</label>
                                        <input type="date" class="form-control tm-select" id="inputDate">
                                    </div>
                                </div> <!-- form-row -->
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="btnSubmit">&nbsp;</label>
                                        <button type="submit" class="btn btn-primary tm-btn tm-btn-search text-uppercase" id="btnSubmit">查詢</button>
                                    </div>
                                </div>                              
                            </form>                             
                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div>  <!-- .container -->                   
                </div>     <!-- .tm-container-outer -->                 
            </section>
        </div>
    </body>

            