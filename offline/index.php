<?php

$name="";
$Phone="";
$Message="";

$i=0;

if(isset($_POST['submit']))
			{
				$name=$_POST['name'];
				$Phone=$_POST['phone'];
				$Message=$_POST['msg'];
				$msg="Name:$name \r\n $Message";

				$usernumber="9600443225";
				$userpass="mugimugimugi";

			    $i=1;
			
			}
?>

<html>
<head>
<title>eMS | MuGi</title>

<link href="//fonts.googleapis.com/css?family=Muli:300,400" rel="stylesheet">

<link href="css/bootstrap.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style.css" rel="stylesheet" type='text/css' media="all" />

<body>

<h1 class="sms">eMessaging Service</h1>

	<div class="sms-c">
		<form action="#" method="post" data-toggle="validator" role="form">
			<div class="form-group sms-c1">
				<label for="firstname" class="control-label">Your Name</label>
				<input type="text" class="form-control" id="firstname" name="name" value="<?php echo "$name"; ?>" placeholder="Name" data-error="Enter Your Name" required>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group sms-c1">
				<label for="Phone" class="control-label">Phone Number of receiver</label>
				<input type="text" class="form-control" id="Phone" name="phone" value="<?php echo "$Phone"; ?>" placeholder="Phone" data-error="Enter Your victem Phone Number" required>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group sms-c1">
				<label for="Phone" class="control-label">Message</label>
				<textarea name="msg" class="form-control" id="Phone" placeholder="Your Message" data-error="Enter Your Message" required> <?php echo "$Message"; ?></textarea>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group" >
				<button type="submit" name="submit" class="btn btn-lg">Submit</button>
			</div>
		</form>

		    <?php if($i==1): ?>

			  <div class="form-group" align="center">
			      <a target="_blank" href="https://smsapi.engineeringtgr.com/send/?Mobile=<?php echo $usernumber; ?>&Password=<?php echo $userpass; ?>&Message=<?php echo $msg; ?>&To=<?php echo $Phone; ?>&Key=mugesGtmSUdIj6lCNkX2ORwxy"><input type="submit" name="next" value="next" class="btn-lg"></a>
			  </div>

			<?php endif; ?>

    </div>

<p class="copyright-sms">© eMS. All rights reserved | Designed by <a href="https://facebook.com/mugeshmac/" target="_blank">MugeshMac</a></p>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>

</body>
</html>
