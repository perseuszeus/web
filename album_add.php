<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=2;
if(filter_input(INPUT_POST,'submit')){
	$aname=filter_input(INPUT_POST,'aname');
	$sql="SELECT Max(aid) AS mxid FROM album";
	$result = $db->query($sql);
	$row_cut = $result->num_rows;
	if($row_cut>0){
		$row = $result->fetch_array();
		$aid = $row[0]+1;
		}else{
			$aid=1;
			}
		for($i=0;$i<count($_FILES['imageupload']['name']);$i++){
		
	$imageupload = isset($_FILES['imageupload']['tmp_name'][$i])?$_FILES['imageupload']['tmp_name'][$i]: "";
	$imageupload_name = isset($_FILES['imageupload']['name'][$i])?$_FILES['imageupload']['name'][$i] : "";

	if($imageupload){
		$arraypic = explode(".",$imageupload_name); // Explode คือตัวแบ่งไฟล์กับนามสกุลออกจากกัน
		
		$filename = $arraypic[0]; //ชื่อไฟล์
		$filetype = $arraypic[1]; //นามสกุลไฟล์
		
		if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif")
		{
			if($i==0){
				$newimage = $aid.".".$filetype;
				$newimage1 = $newimage;
			}else{
				$newimage = $aid."_".$i.".".$filetype;
				$sql= "insert into album_pic (aid,ppic)values('$aid','$newimage')";
				$result =$db->query($sql);
 }
			 //รวมชื่อกับนามสกุลเข้าด้วยกัน
			copy($imageupload,"uploadnews/".$newimage); //โฟเดอเกบรูป
		}
		else{
			echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพ</h3>";
	        }
	  
	    }
		}
	$sql="insert into album (aid,aname,pic)values('$aid','$aname','$newimage1')";
	$result = $db->query("$sql");
	header('Location: album.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CAKE</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!--

Template 2076 Zentro

http://www.tooplate.com/view/2076-zentro

-->
	<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
</head>
<body>
 <?php include "include/headerr.php";?>
<div id="wrapper">
		<div id="featured" class="container">
        <form class="form-basic" method="post" enctype="multipart/form-data" action="#">
<br/><br/>
            <div class="form-title-row">
                <h1>เพิ่มข้อมูลภาพกิจกรรม</h1>
            <div class="form-row"><br/><br/>
                <label>
                    <span>ชื่อภาพกิจกรรม</span>
                    <input type="text" name="aname" required>
                </label>
            <div class="form-row" align="center">
                <label>
                    <span>รูป</span>
                    <input type="file" name="imageupload[]" >
                </label>
            </div>
              <div class="form-row" align="center">
                <label>
                    <span>รูปอื่นๆ</span>
                   <input type="file" name="imageupload[]" ><br>
                   <input type="file" name="imageupload[]" ><br>
                   <input type="file" name="imageupload[]" ><br>
                   <input type="file" name="imageupload[]" ><br>
                   <input type="file" name="imageupload[]" >
                </label>
            </div>
           
            <div class="form-row">
                <button type="submit" name="submit" value="submit">บันทึก</button>
            </div>

        </form>
		</div> 
</div>

</body>
</html>
