<?php 
	session_start();
	include("connect.php");
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	$State = $_COOKIE['LoginState'];
	$UserName = $_COOKIE['UserName'];

	if(!$State){
		echo "<script>alert('請先登入！');</script>";
        header("refresh:0;url = index.php");
	}
    
    $RestaurantName = @$_POST["RestaurantName"];
    $RestaurantBranch = @$_POST["RestaurantBranch"];
    $Station = @$_POST["Station"];

    $StationID = '';

    $sqlStation = "SELECT * FROM `MRTStation` WHERE `StationName`='$Station'";
    $resultStation = $connect->query($sqlStation);
    if ($resultStation->num_rows > 0) {
        while ($rowStation = $resultStation->fetch_assoc()){
            $StationID = $rowStation['StationID'];
        }
    }

    $sqlMyMap = "SELECT * FROM `MyMap` ORDER BY `MyRestaurantID` DESC LIMIT 0, 1";
    $ResultCount = $connect->query($sqlMyMap);
    if ($ResultCount->num_rows> 0) {
        while ($rowCount = $ResultCount->fetch_assoc())
        {
            $Count = $rowCount["MyRestaurantID"];
        }
    }
    $Count1 = substr($Count, 1, 6) + 1;
    $Count = str_pad($Count1,6,"0",STR_PAD_LEFT);
    $Count = "Y".$Count;
    
    $sqlMap =  "INSERT INTO `MyMap`(`MyRestaurantID`, `Account`, `MyRestaurantName`, `MyRestaurantBranch`, `StationID`) 
                      VALUES ('$Count','$UserName','$RestaurantName','$RestaurantBranch','$StationID')";
    //echo "$sqlMap";
    $ResultMap= $connect->query($sqlMap);
        
    echo "<script>alert('新增成功！');</script>";
    header("refresh:0;url = 'UserMapInfo.php?StationID=$StationID'");
    $connect->close();
?>
