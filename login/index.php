<?php

include_once("../db.php");
session_start();

if(isset($_POST['Login']))
{
  $un=$_POST['username'];
  $pass=$_POST['password'];

  $query="SELECT * FROM login WHERE Email='$un' and Password='$pass' ";

  $result=mysqli_query($db,$query);

  $fetch=mysqli_fetch_array($result);
  $_SESSION['user_id']=$fetch['user_id'];
  if(empty($fetch))
  {
  	echo "<script>alert('Wrong Password');</script>";
  }

  else{
  	header("location:../selection/index.html");
  }

}

if(isset($_POST['Sign-in']))
{
	$un=$_POST['username'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	$dob=$_POST['date'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
		$s="SELECT * from login order by user_id DESC limit 0,1";
        $res=mysqli_query($db,$s);

        $row=mysqli_fetch_array($res);

        if(empty($row['user_id'])){
            $id=1;
        }
        else{
            $id=$row['user_id'];
            $id++;
        }
	
	$query="INSERT INTO login (user_id,Image,Username,Password,DOB,Email,Phone) VALUES ('$id','avatar.png','$un','$pass','$dob','$email','$phone')";
   mysqli_query($db,$query);
	
   


}

?>


<html>

<head>
<title>Login | eMS</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.9.1.min.js"></script>
<!--// js -->
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css" />
 <link href="http://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

 <link rel="shortcut icon" href="../assets/images/page_icon.png">

   
	<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5CqmuxB0lpEMt12nqe2I3Mp9bnQZfG1A";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

 
</head>
<body class="bg agileinfo">



 <h1 class="agile_head text-center"> Stay Tuned</h1>
 
  <div class="w3layouts_main wrap">
    <!--Horizontal Tab-->
        <div id="parentHorizontalTab_agile">
            <ul class="resp-tabs-list hor_1">
                <li>LogIn</li>
                <li>SignUp</li>
            </ul>
            <div class="resp-tabs-container hor_1">
               <div class="w3_agile_login">
                    <form action="" method="post" class="agile_form">
					  <p>Email</p>
					  <input type="email" name="username" required="required" />
					  <p>Password</p>
					  <input type="password" name="password" required="required" class="password" /> 
					  
					  <input type="submit" value="LogIn" name="Login" class="agileinfo" />
					</form>
					 <div class="login_w3ls">
				        <a href="#">Forgot Password</a>
					 </div>
                    
                </div>
                <div class="agile_its_registration">
                    <form action="" method="post" class="agile_form">
					  <p>Username</p>
					  <input type="text" name="username" required="required" />
					  <p>DOB</p>
					  <input type="date" name="date" required="required" />
					  <p>PhoneNumber</p>
					  <input type="text" name="phone" required="required" pattern=".{10}" required title="plz enter a valid PhoneNumber"/>
					  <p>Email</p>
					  <input type="email" name="email" required="required" />
					  <p>Password</p>
					  <input type="password" name="password" id="password1"  required="required" pattern=".{8,12}" required title="8 to 12 characters">
					  <p>Confirm Password</p>
					  <input type="password" name="cpassword" id="password2"  required="required">
         	  			<div class="check w3_agileits">
							<label class="checkbox w3"><input type="checkbox" name="checkbox" required="required" ><i> </i>I accept the terms and conditions</label>
						</div>
					   <input type="submit" name="Sign-in" value="Signup"/>
					   <input type="reset" value="Reset" />
					</form> 
				</div>
            </div>
        </div>
		 <!-- //Horizontal Tab -->
    </div>
	<!--728x90-->
	<div class="agileits_w3layouts_copyright text-center">
			<p>&copy; Copyrighted by eMS. All rights reserved | Design by <a href="http://www.youtube.com/c/MugeshMac/" target="_blank">HBK Mugesh</a></p>
	</div>
<!--tabs-->
<script src="js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//Horizontal Tab
	$('#parentHorizontalTab_agile').easyResponsiveTabs({
		type: 'default', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true, // 100% fit in a container
		tabidentify: 'hor_1', // The tab groups identifier
		activate: function(event) { // Callback function if tab is switched
			var $tab = $(this);
			var $info = $('#nested-tabInfo');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});
});
</script>
<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}
		function validatePassword(){
			var pass2=document.getElementById("password2").value;
			var pass1=document.getElementById("password1").value;
			if(pass1!=pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');	 
				//empty string means no validation error
		}

</script>
<!--//tabs-->
</body>

</html>

