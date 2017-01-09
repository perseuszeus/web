<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=3;
$imageupload = isset($_FILES['imageupload']['tmp_name'])? $_FILES['imageupload']['tmp_name']: "";
$imageupload_name = isset($_FILES['imageupload']['name'])? $_FILES['imageupload']['name'] : "";
if(filter_input(INPUT_POST,'submit')){
	$n_date= filter_input(INPUT_POST,'n_date');
	$n_title = filter_input(INPUT_POST,'n_title');
	$n_detaill = filter_input(INPUT_POST,'n_detaill');
	$sql = "select max(n_id) as mxid FROM news";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;
	if ($row_cnt>0){
	$row = $result->fetch_array();
	$n_id = $row[0]+1 ;
	}else{
	$n_id = 1;
	}	
	if($imageupload){
		$arraypic = explode(".",$imageupload_name); // Explode คือตัวแบ่งไฟล์กับนามสกุลออกจากกัน
		
		$filename = $arraypic[0]; //ชื่อไฟล์
		$filetype = $arraypic[1]; //นามสกุลไฟล์
		
		if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif")
		{
			$newimage = "N".$n_id.".".$filetype; //รวมชื่อกับนามสกุลเข้าด้วยกัน
			copy($imageupload,"upload/".$newimage); //โฟเดอเกบรูป
		}else{
			echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพ</h3>";
	  }
		}
	$sql= "insert into news(n_id,n_date,n_title,n_detaill,n_image)values('$n_id','$n_date','$n_title','$n_detaill','$newimage')";
	$result =$db->query("$sql");
 	header('location: news.php');
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
    <form class="form-basic" method="post" action="#" enctype="multipart/form-data">
    <br/><br/>
      <div class="form-title-row">
        <h1>เพิ่มข้อมูลข่าวสาร</h1>
      </div>
      <div class="form-row">
        <label ><span>โปรดเลือกวันที่ข่าวสาร</span>
          <input type="date" name="n_date" required>
          </label>
      </div>
      <div class="form-row">
        <label> <span>หัวข้อข่าว</span>
          <input type="text" name="n_title" required>
        </label>
      </div>
      <div class="form-row">
        <label> <span>รายละเอียด</span>
          <input type="text" name="n_detaill" required>
        </label>
      </div>  
      <div class="form-row">
        <label><span>รูปภาพ</span>
          <input name="imageupload" type="file">
        </label>
      </div>
      <div class="form-row">
   <button type="submit" name="submit" value="submit">บันทึก</button>
      </div>
    </form>
  </div>


</body>
</html>

 