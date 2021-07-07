<?php
$i=0;
include_once("config.php");
session_start();

$u_id=$_SESSION['user_id'];

if(isset($_POST['save'])){
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$age=$_POST['age'];
$dob=$_POST['dob'];
$type=$_POST['type'];
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
$query="INSERT into  contact (id,user_id,Name,Phone,Email,Age,Dob,Role) values('$id','$u_id','$name','$phone','$email','$age','$dob','$type')";
mysqli_query($db,$query);



}

$sql="SELECT * from contact where user_id='".$u_id."' order by id ";
$res=mysqli_query($db,$sql);



if(isset($_POST['all'])){
	$sql="SELECT * from contact order by id ";
	$res=mysqli_query($db,$sql);
}
if(isset($_POST['work'])){
	$sql="SELECT * from contact where Role='".'Work'."'";
	$res=mysqli_query($db,$sql);
}
if(isset($_POST['family'])){
	$sql="SELECT * from contact where Role='".'Family'."'";
	$res=mysqli_query($db,$sql);
}
if(isset($_POST['friends'])){
	$sql="SELECT * from contact where Role='".'Friends'."'";
	$res=mysqli_query($db,$sql);
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    
	<title>Online_Add-Contacts | eMS</title>
	
	
	<link rel="shortcut icon" href="../assets/images/page_icon.png">
	
	<!-- Bootstrap Wysihtml5 css -->
	<link rel="stylesheet" href="vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css" />
		
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
								<a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
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
		
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<!-- Title -->
				
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="contact-list">
										<div class="row">
											<aside class="col-lg-2 col-md-4 pr-0">
												<div class="mt-20 mb-20 ml-15 mr-15">
													<a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-success btn-block">
													Add new contact
													</a>
													<!-- Modal -->
													<div aria-hidden="true" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
																	<h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
																</div>
																<div class="modal-body">
																	<form method="post" action="" class="form-horizontal form-material">
																		<div class="form-group">
																			<div class="col-md-12 mb-20">
																				<input type="text" name="name" class="form-control" placeholder="name">
																			</div>
																			<div class="col-md-12 mb-20">
																				<input type="text" name="email" class="form-control" placeholder="Email">
																			</div>
																			<div class="col-md-12 mb-20">
																				<input type="text" name="phone" class="form-control" placeholder="Phone">
																			</div>
																			<div class="col-md-12 mb-20">
																				<input type="text" name="dob" class="form-control" placeholder="Date of birth">
																			</div>
																			<div class="col-md-12 mb-20">
																				<input type="text" name="age" class="form-control" placeholder="Age">
																			</div>
																			<div class="col-md-12 mb-20">
																				<select class="form-control" name="type">
																					
																					<option>Family</option>
																					<option>Friends</option>
																					<option>Work</option>
																					<option>Others</option>

																				</select>
																			</div>
																			
																			
																		</div>
																	
																</div>
																<div class="modal-footer">
																	<button name="save" class="btn btn-info waves-effect" >Save</button>
																	<button type="button"  class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
																</div>
																</form>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>
													<!-- /.modal -->
												</div>
												
												
												
											</aside>
											
											<aside class="col-lg-10 col-md-8 pl-0">
												<div class="panel pa-0">
												<div class="panel-wrapper collapse in">
												<div class="panel-body  pa-0">
													<div class="table-responsive mb-30">
														<table id="datable_1" class="table  display table-hover mb-30" data-page-size="10">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Name</th>
																	<th>Email</th>
																	<th>Phone</th>
																	<th>Role</th>
																	<th>Age</th>
																	
																	<th>Action</th>
																</tr>
															</thead>
															<tbody>
															<?php while($row=mysqli_fetch_array($res)): ?>
																<tr>
																	<?php $i++; ?>
																	<td><?=$i ?></td>
																	<td><a href="#"><?=$row['Name'] ?></a></td>
																	<td><?=$row['Email'] ?></td>
																	<td><?=$row['Phone'] ?></td>
																	<?php if($row['Role']=='Family'): ?>
																	<td><span class="label label-warning"><?=$row['Role'] ?></span> </td>
																	<?php elseif($row['Role']=='Work'): ?>
																	<td><span class="label label-primary"><?=$row['Role'] ?></span> </td>
																	<?php elseif($row['Role']=='Friends'): ?>
																	<td><span class="label label-info"><?=$row['Role'] ?></span> </td>
																	<?php else: ?>
																	<td><span class="label label-default"><?=$row['Role'] ?></span> </td>
																	<?php endif; ?>
																	<td><?=$row['Age'] ?></td>
																	
																	<td><a href="javascript:void(0)" class="text-inverse pr-10" title="Edit" data-toggle="tooltip"><i class="zmdi zmdi-edit txt-warning"></i></a><a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="zmdi zmdi-delete txt-danger"></i></a></td>
																</tr>
																<?php endwhile; ?>
																
															</tbody>
														</table>
													</div>
												</div>
												</div>
												</div>
											</aside>
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
	
	<!-- wysuhtml5 Plugin JavaScript -->
	<script src="vendors/bower_components/wysihtml5x/dist/wysihtml5x.min.js"></script>
	
	<script src="vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Bootstrap Wysuhtml5 Init JavaScript -->
	<script src="dist/js/bootstrap-wysuhtml5-data.js"></script>
	
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="dist/js/dataTables-data.js"></script>	
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
</body>

</html>
