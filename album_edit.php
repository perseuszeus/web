<?php 
session_start();
include "include/conn.php";
include "include/function.php";
chkLogn();
$act=3;
if(filter_input(INPUT_POST,'submit')){
	$aid= filter_input(INPUT_POST,'id');
	$picid = intval($aid);
	$aname = filter_input(INPUT_POST,'aname');

	for($i=0;$i<count($_FILES['imageupload']['name']);$i++)
	{
	$pic = "ppic".$i;
	$ppic = (filter_input(INPUT_POST,$pic));
	$imageupload = isset($_FILES['imageupload']['tmp_name'][$i])?$_FILES['imageupload']['tmp_name'][$i]: "";
	$imageupload_name = isset($_FILES['imageupload']['name'][$i])?$_FILES['imageupload']['name'][$i] : "";

	if($imageupload){
		$arraypic = explode(".",$imageupload_name); // Explode คือตัวแบ่งไฟล์กับนามสกุลออกจากกัน
		
		$filename = $arraypic[0]; //ชื่อไฟล์
		$filetype = $arraypic[1]; //นามสกุลไฟล์
		
		if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif")
		{
			if($i==0){
				$newimage =$picid.".".$filetype;
				$newimage1 = $newimage;			
			$sql="UPDATE album set aname='$aname',pic='$newimage1' where aid ='$aid'";
			$result = $db->query($sql); //$result = $db->query("$sql");
			}else{
				$newimage = $picid."_".$i.".".$filetype;
				$sql= "UPDATE album_pic SET ppic = '$newimage' WHERE aid = '$aid' AND ppic = '$ppic'";
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
	$sql="update album set aname='$aname' where aid ='$aid'";
	$result =$db->query("$sql");
 	header('location: album.php');
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
      <div class="form-title-row">
        <h1>แก้ไขข้อมูลรูปภาพ</h1>
      </div>
<?php
$id = filter_input(INPUT_GET,'id');
$sql = "select * from album where aid='$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
$aname=$row['aname'];
?>

 <div class="form-row">
        <label ><span>โปรดเลือกวันที่ข่าวสาร</span>
          <input type="file" name="imageupload[]" >รูปเดิม <img src = "upload/<?php echo $pic?>" width="200">
          </label>
          
      </div>
      <div class="form-row">
        <label ><span>โปรดเลือกวันที่ข่าวสาร</span>
           <?php
					$sql="select * from album_pic where aid='$id'";						  
							$result =$db->query($sql);
					  		while($row = $result->fetch_array()){
					?>
						<li><input type="file" name="imageupload[]" ><br>รูปเดิม <img src = "upload/<?php echo $row['ppic'];?>" width="200"><br>                     
                     <?php } ?>
          </label>
          
      </div>
      <div class="form-row">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <button type="submit" name="submit" value="submit">บันทึก</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>

 