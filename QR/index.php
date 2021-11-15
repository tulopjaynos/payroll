<?php
require_once(dirname(__FILE__) . '/config.php'); 
$f = "visit.php";
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}
 
include('libs/phpqrcode/qrlib.php'); 

function getUsernameFromEmail($email) {
	$find = '@';
	$pos = strpos($email, $find);
	$username = substr($email, 0, $pos);
	return $username;
}

if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$email = $_POST['mail'];
	$subject =  $_POST['subject'];
	$filename = getUsernameFromEmail($email);
	$body =  $_POST['msg'];
	$codeContents = $email.strtolower($subject); 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	<title>(QR) Code Generator</title>
	<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="libs/style.css">
	<script src="libs/navbarclock.js"></script>
	</head>
	<body onload="startTime()" style="background:#00162A">
		<nav class="navbar-inverse" style="background-color:#777777" role="navigation" >
			<a href="<?php echo BASE_URL; ?>"><h1 style="color:white; margin-left: 15px">OPMS</h1></a>
			<!--div id="clockdate">
				<div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"><?php echo date('l, F j, Y'); ?></div>
				</div>
			</div-->
		</nav>
		<div class="myoutput">
			<h3 style="color: white;"><strong>(QR) Code Generator</strong></h3>
			<div class="input-field">
				<h3 style="color: white; margin-top: 50px">Please Fill-out All Fields</h3>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="form-group">
						<label style="color: white;">Employee Code</label>
						<input type="text" class="form-control" name="mail" style="width:20em;" placeholder="Enter your Email" value="<?php echo @$email; ?>" required />
					</div>
					<div class="form-group">
						<label style="color: white;">Employee Password Mask</label>
						<input type="text" class="form-control" name="subject" style="width:20em; text-transform:lowercase;" placeholder="Enter your Email Subject" value="<?php echo @$subject; ?>"/>
					</div>
					<!--div class="form-group">
						<label>Message</label>
						<input type="text" class="form-control" name="msg" style="width:20em;" value="<?php echo @$body; ?>"placeholder="Enter your message"></textarea>
					</div-->
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" />
					</div>
				</form>
			</div>
			<?php
			if(!isset($filename)){
				$filename = "author";
			}
			?>
			<div class="qr-field">
				<h2 style="text-align:center;color: white">QR Code Result: </h2>
				<center>
					<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
							<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
					</div>
					<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
				</center>
			</div>
			
		</div>
	</body>
	<footer></footer>
</html>