<?php 
include "include/conn.php"; 
session_start();
$msg="";
if(filter_input(INPUT_POST,'submit')){
	$uname = (filter_input(INPUT_POST,'username'));
	$pwd = (filter_input(INPUT_POST,'password'));
	$sql = "SELECT * FROM tbl_user WHERE user_name='$uname'";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;
	
	if ($row_cnt>0){
		$row = $result->fetch_array();
		if($pwd==$row['pass_word']){
			$_SESSION['username']=$uname;
			header('Location: products.php');
			}else{
				$msg = "รหัสผ่านไม่ถูกต้อง";
				}
		}else{
			$msg = "ไม่พบ Username : $uname";
			}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Payao Bakery</title>

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
<header>

<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="home.php" class="navbar-brand">CAKE</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="home.php" class="smoothScroll">HOME</a></li>
		    </ul>
		</div>
	</div>
</section>
</header>
<!-- contact section -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
				<h1 class="heading">LOG IN</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
				<form action="#" method="post">
					<div class="col-md-6 col-sm-6">
						<input type="text" name="username"  class="form-control" placeholder="username" required>
				  </div>
					<div class="col-md-6 col-sm-6">
						<input type="password" name="password"  class="form-control" placeholder="password" required>
				  </div>
					<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="Submit">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>
<?php include "include/footer.php"; ?>
</body>
