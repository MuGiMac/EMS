<?php 

session_start();
include_once("config.php");
$user_id=$_SESSION['user_id'];



if(isset($_POST['update'])){

	$target="dist/img/".basename($_FILES['img']['name']);
    $img=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],$target);



	$name=$_POST['username'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	

    $query2="UPDATE login set Username='".$name."', Phone='".$phone."', Email='".$email."', Image='".$img."', Password='".$password."' WHERE user_id='".$user_id."' ";
    mysqli_query($db,$query2);
}

$query="SELECT * from login where user_id='".$user_id."'";
$res=mysqli_query($db,$query);
$fet=mysqli_fetch_array($res);

$query11="SELECT * from login ";
$res11=mysqli_query($db,$query11);


$sql="SELECT * from message where frd_id='".$user_id."' ";
$ans=mysqli_query($db,$sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    
	<title>Online | eMS <?=$user_id ?></title>
	
	<link rel="shortcut icon" href="../assets/images/page_icon.png">

	
	<!-- Morris Charts CSS -->
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- vector map CSS -->
	<link href="vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
	
	<!-- Calendar CSS -->
	<link href="vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css"/>
		
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
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
					<a class="active" href="profile.php"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Profile</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
					
				</li>
				
				<li>
					<a href="chats.php"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">chats </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>

				<li>
					<a href="maps.html"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">Maps</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		
		<!-- /Right Sidebar Menu -->
		
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
            <div class="container-fluid pt-25">
					
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-xs-12">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											<div class="fileupload btn btn-default">
												
											</div>
											<div class="profile-image-overlay"></div>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="dist/img/<?=$fet['Image'] ?>" alt="user"/>
												<div class="fileupload btn btn-default">
													
												</div>
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger"><?=$fet['Username'] ?></h5>
											
										</div>	
										<div class="social-info">
											<div class="row">
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">345</span></span>
													<span class="counts-text block">Message</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">246</span></span>
													<span class="counts-text block">Contects</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">898</span></span>
													<span class="counts-text block">Friends</span>
												</div>
											</div>
											<button class="btn btn-default btn-block btn-outline btn-anim mt-30" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i><span class="btn-text">edit profile</span></button>
											<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
														</div>
														<div class="modal-body">
															<!-- Row -->
															<div class="row">
																<div class="col-lg-12">
																	<div class="">
																		<div class="panel-wrapper collapse in">
																			<div class="panel-body pa-0">
																				<div class="col-sm-12 col-xs-12">
																					<div class="form-wrap">
																						<form action="" method="post"  enctype="multipart/form-data">
																							<div class="form-body overflow-hide">
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-user"></i></div>
																										<input type="text" class="form-control" id="exampleInputuname_1" name="username" value="<?=$fet['Username'] ?>">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																										<input type="email" name="email" class="form-control" id="exampleInputEmail_1" value="<?=$fet['Email'] ?>">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputContact_1">Contact number</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-phone"></i></div>
																										<input type="text" name="phone" class="form-control" id="exampleInputContact_1" value="<?=$fet['Phone'] ?>">
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-lock"></i></div>
																										<input type="password" class="form-control" id="exampleInputpwd_1" name="password" placeholder="Enter pwd" value="<?=$fet['Password'] ?>">
																									</div>
																								</div>
																								
																								
																							</div>
																							<div class="form-actions mt-10">			
																								<div class="fileupload btn btn-default">
																									<span class="btn-text">Upload profile</span>
																									<input class="upload" type="file" name="img" >
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
														<div class="modal-footer">
															<button  class="btn btn-success waves-effect" name="update" >Save</button>
															<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
														</div>
													</div>
													</form>
													<!-- /.modal-content -->
												</div>

												<!-- /.modal-dialog -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											
											<li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>Friends<span class="inline-block"></span></span></a></li>
											
											
											
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="col-md-12">
													<div class="pt-20">
														<div class="streamline user-activity">
															
														<?php while ($row=mysqli_fetch_array($ans)): ?>
															<?php 
																$query4="SELECT * from login where user_id='".$row['user_id']."' ";
																$ress=mysqli_query($db,$query4);
																$fetch=mysqli_fetch_array($ress);

															?>
															<div class="sl-item">
																<a href="javascript:void(0)">
																	<div class="sl-avatar avatar avatar-sm avatar-circle">
																		<img class="img-responsive img-circle" src="dist/img/<?=$fetch['Image'] ?>" alt="avatar"/>
																	</div>
																	<div class="sl-content">
																		<p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500"><?=$fetch['Username'] ?></span><span><?=$row['Message'] ?></span></p>
																		<span class="block txt-grey font-12 capitalize-font"><?=$row['tim'] ?></span>
																	</div>
																</a>
															</div>
														<?php endwhile; ?>

															

															
															
														</div>
													</div>
												</div>
											</div>
											
											<div  id="follo_8" class="tab-pane fade" role="tabpanel">
												<div class="row">
													<div class="col-lg-12">
														<div class="followers-wrap">
															<ul class="followers-list-wrap">
																<li class="follow-list">
																	<div class="follo-body">
																	<?php while($row=mysqli_fetch_array($res11)):  ?>
																		<?php if($row['user_id']==$user_id): ?>
																		<?php else: ?>

																		<div class="follo-data">
																			<img class="user-img img-circle"  src="dist/img/<?=$row['Image'] ?>" alt="user"/>
																			<div class="user-data">
																				<span class="name block capitalize-font"><?=$row['Username'] ?></span>
																				
																			</div>
																			<a href="chats.php?id=<?=$row['user_id'] ?>" class="btn btn-success pull-right btn-xs fixed-btn">Message</a>
																			<div class="clearfix"></div>
																		</div>
																		<?php endif; ?>
																	 <?php endwhile; ?>
																	</div>
																</li>
															</ul>
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
    
	<!-- Vector Maps JavaScript -->
    <script src="vendors/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="dist/js/vectormap-data.js"></script>
	
	<!-- Calender JavaScripts -->
	<script src="vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="vendors/jquery-ui.min.js"></script>
	<script src="vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="dist/js/fullcalendar-data.js"></script>
	
	<!-- Counter Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<script src="vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
	<script src="dist/js/skills-counter-data.js"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="dist/js/morris-data.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		
	<!-- Gallery JavaScript -->
	<script src="dist/js/isotope.js"></script>
	<script src="dist/js/lightgallery-all.js"></script>
	<script src="dist/js/froogaloop2.min.js"></script>
	<script src="dist/js/gallery-data.js"></script>
	
	<!-- twitter JavaScript -->
	<script src="dist/js/twitterFetcher.js"></script>
	
	<!-- Spectragram JavaScript -->
	<script src="dist/js/spectragram.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/widgets-data.js"></script>

</body>


</html>
