<?php

session_start();
include_once("config.php");

$query="SELECT * from login";
$res=mysqli_query($db,$query);
if(!empty($_GET['id'])){
$frd_id=$_GET['id'];
}
else{
	$frd_id=0;
}
$user_id=$_SESSION['user_id'];
$msg="";
if(isset($_POST['msg_ins'])){
	$msg=$_POST['send-msg'];
	$s="SELECT * from contact order by id DESC limit 0,1";
        $res=mysqli_query($db,$s);

        $row=mysqli_fetch_array($res);

        if(empty($row['id'])){
            $id=1;
        }
        else{
            $id=$row['id'];
            $id++;
        }
        $date=date("d-m-Y");
        $tim=date("hh-mm");
	$sql="INSERT into message (msg_id,user_id,frd_id,Message,Dat,tim,Status) values('$id','$user_id','$frd_id','$msg','$date','$tim','Sent')";
	mysqli_query($db,$sql);
}
$query1="SELECT * from message where (frd_id='".$frd_id."' OR frd_id='".$user_id."') and (user_id='".$user_id."' OR user_id='".$frd_id."') ";
$res1=mysqli_query($db,$query1);
$query="SELECT * from login";
$res=mysqli_query($db,$query);

$newres="SELECT * from login where user_id='".$frd_id."' ";
$newans=mysqli_query($db,$newres);
$fet=mysqli_fetch_array($newans);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
	<title>Online_Chats | eMS</title>
	
	
	
    <link rel="shortcut icon" href="../assets/images/page_icon.png">
	
	<!-- switchery CSS -->
	<link href="vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	


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

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active pimary-color-green">
		
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="profile.php">
							<b>eMS</b>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					
					
					
					
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="profile.php"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							
							<li class="divider"></li>
							 
							<li>
								<a href="../index.html"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
				<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>eMS</span> 
					<i class="zmdi zmdi-more"></i>
				</li>

				


				<li>
					<a href="profile.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Profile</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					
				</li>
				
				<li>
					<a class="active" href="chats.php"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">chats </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>

				<li>
					<a href="maps.html"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">Maps</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		
		
		
		<!-- Right Setting Menu -->
		<div class="setting-panel">
			<ul class="right-sidebar nicescroll-bar pa-0">
				<li class="layout-switcher-wrap">
					<ul>
						<li>
							<span class="layout-title">Scrollable header</span>
							<span class="layout-switcher">
								<input type="checkbox" id="switch_3" class="js-switch"  data-color="#2ecd99" data-secondary-color="#dedede" data-size="small"/>
							</span>	
							<h6 class="mt-30 mb-15">Theme colors</h6>
							<ul class="theme-option-wrap">
								<li id="theme-1" class="active-theme"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-2"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-3"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-4"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-5"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-6"><i class="zmdi zmdi-check"></i></li>
							</ul>
							<h6 class="mt-30 mb-15">Primary colors</h6>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-green" checked value="pimary-color-green">
								<label for="pimary-color-green"> Green </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-red" value="pimary-color-red">
								<label for="pimary-color-red"> Red </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-blue" value="pimary-color-blue">
								<label for="pimary-color-blue"> Blue </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-yellow" value="pimary-color-yellow">
								<label for="pimary-color-yellow"> Yellow </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-pink" value="pimary-color-pink">
								<label for="pimary-color-pink"> Pink </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-orange" value="pimary-color-orange">
								<label for="pimary-color-orange"> Orange </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-gold" value="pimary-color-gold">
								<label for="pimary-color-gold"> Gold </label>
							</div>
							<div class="radio mb-35">
								<input type="radio" name="radio-primary-color" id="pimary-color-silver" value="pimary-color-silver">
								<label for="pimary-color-silver"> Silver </label>
							</div>
							<button id="reset_setting" class="btn  btn-success btn-xs btn-outline btn-rounded mb-10">reset</button>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<button id="setting_panel_btn" class="btn btn-success btn-circle setting-panel-btn shadow-2dp"><i class="zmdi zmdi-settings"></i></button>
		<!-- /Right Setting Menu -->
		
		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				
				<!-- Row -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default border-panel card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="chat-cmplt-wrap chat-for-widgets-1">
										<div class="chat-box-wrap">
											<div>
												<form role="search" class="chat-search">
													<div class="input-group">
														<input id="example-input1-group21" name="name" class="form-control" placeholder="Search" type="text">
														<span class="input-group-btn">
														<button name="search" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
														</span>
													</div>
												</form>
												<div class="chatapp-nicescroll-bar">
													<ul class="chat-list-wrap">
														<li class="chat-list">
															<div class="chat-body">
															
																
																<a href="chats.php?id=<?=$row['user_id'] ?>">
																	<div class="chat-data">
																		<img class="user-img img-circle"  src="dist/img/<?=$fet['Image'] ?>" alt="user"/>
																		<div class="user-data">

																			<span class="name block capitalize-font"><?=$fet['Username'] ?></span>
																			<span class="time block truncate txt-grey">Click to view The message</span> 
																		</div>
																		
																		<div class="clearfix"></div>
																	</div>
																</a>
																
																
															</div>
														</li>
													</ul>
												</div> 
											</div>
										</div>

										<div class="recent-chat-box-wrap">
											<div class="recent-chat-wrap">
												<div class="panel-heading ma-0 pt-15">
													<div class="goto-back">
														<a   href="contact-list.php" class="inline-block txt-grey">
															<i class="zmdi zmdi-account-add"></i>
														</a>	
														<span class="inline-block txt-dark">Messages</span>
														<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="panel-wrapper collapse in">
													<div class="panel-body pa-0">
														<div class="chat-content">
															<ul class="chatapp-chat-nicescroll-bar pt-20">
																
																<?php while($row1=mysqli_fetch_array($res1)): ?>
																<?php if($row1['frd_id']==$frd_id): ?>
																<li class="self">
																	<div class="self-msg-wrap">
																		<div class="msg block pull-right">  <p><?=$row1['Message'] ?></p>
																			<div class="msg-per-detail text-right">
																				<span class="msg-time txt-grey">2:31 pm</span>
																			</div>
																		</div>
																		<div class="clearfix"></div>
																	</div>	
																</li>
																
															<?php else: ?>
																<li class="friend">
																	<div class="friend-msg-wrap">
																		<img class="user-img img-circle block pull-left"  src="dist/img/<?=$fet['Image'] ?>" alt="user"/>
																		<div class="msg pull-left"> 
																			<p><?=$row1['Message'] ?></p>
																			<div class="msg-per-detail  text-right">
																				<span class="msg-time txt-grey"><?=$row1['tim'] ?></span>
																			</div>
																		</div>
																		<div class="clearfix"></div>
																	</div>	
																</li>
															<?php endif; ?>
															<?php endwhile; ?>
															</ul>
														</div>
														<div class="input-group">
														<form method="post" action="">
															<input type="text"  name="send-msg" class="input-msg-send form-control" placeholder="Type something">
															<input type="submit" name="msg_ins">
														</form>
															
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
				
				<!-- Row -->
			
			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>&copy; Copyrighted by eMS. All rights reserved | Design by <a href="http://www.youtube.com/c/MugeshMac/" target="_blank">HBK Mugesh</a></p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
</body>

</html>
