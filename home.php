<?php
session_start();
include "include/conn.php";
include "include/function.php";
$act=3;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Payao bakey</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!--

Template 2076 Zentro

http://www.tooplate.com/view/2076-zentro

-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
</head>
<body>
<?php include "include/header.php";?>
<!-- home section -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>PAYAO BAKEY</h1>
				
				<a href="#gallery" class="smoothScroll btn btn-default">รายละเอียดข้อมูล</a>
			</div>
		</div>
	</div>		
</section>


<!-- gallery section -->

<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">สินค้า</h1>
				<hr>
			</div>
			
             <?php
$sql = "select * from product order by pid DESC LIMIT 6";	
$result = $db->query($sql);
while($row = $result->fetch_array()){
	$pid=$row['pid'];
    $pname=$row['pname'];
    $price=$row['price'];
    $pid=$row['pic'];
	
?>
<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
				<a href="upload/<?php echo $row['pic'];?>" data-lightbox-gallery="zenda-gallery"><img src="upload/<?php echo $row['pic'];?>" alt="gallery img"></a>
                <?php echo $row['pname'];?>
                <?php echo $row['price'];?>
		  </div>
			 <?php }?>
			
		</div>
  </div>
</section>

<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">ภาพกิจกรรม</h1><a name="#menu1"></a>
				<hr>
			</div>
			
             <?php
$sql = "select * from album order by aid DESC LIMIT 6";	
$result = $db->query($sql);
while($row = $result->fetch_array()){
	$pid=$row['aid'];
    $pname=$row['aname'];
    $pid=$row['pic'];
	
?>
<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
				<img src="upload/<?php echo $row['pic'];?>" alt="gallery img"></a>
                <?php echo $row['aname'];?>
			</div>
			 <?php }?>
			
		</div>
	</div>
</section>


<!-- contact section -->
<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">
			<div text-center">
				<h1 class="heading">ข่าวประชาสัมพันธ์</h1>
				<hr>
			</div>

            <?php
$sql = "select * from news order by n_id DESC LIMIT 1";	
$result = $db->query($sql);
$row = $result->fetch_array();
	$n_id=$row['n_id'];
    $n_title=$row['n_title'];
	$n_date=$row['n_date'];
    $n_detaill=$row['n_detaill'];
	$n_image=$row['n_image'];
?>
<div data-wow-delay="0.9s">
<h2><?php echo $row['n_title'];?></h2>
				<img src="upload/<?php echo $row['n_image'];?>" class="img-responsive center-block" alt="team img">
				<h4><?php echo $row['n_date'];?></h4><br>
				<h3><?php echo $row['n_detaill'];?></h3>
			</div>
		</div>
	</div>

</section>

<?php include "include/footer.php";?>


<!-- copyright section -->
<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>ZENTRO</h3>
				<p>Copyright © Zentro Restaurant and Cafe 
                
                | Design: <a rel="nofollow" href="https://www.facebook.com/" target="_parent">facebook</a></p>
			</div>
		</div>
	</div>
</section>

<!-- JAVASCRIPT JS FILES -->	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>