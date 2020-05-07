<?php

include('includes/config.php');
 $employee="";
 $designation="";
 $department="";
 $joiningdate="";
 $address="";
 $mobile="";
 $emergency="";
 $employementstatus="";
 
if(isset($_POST['submit']))
{
	
    $employee = addslashes($_POST['employee']);
	$designation = addslashes($_POST['designation']);
    $department = addslashes($_POST['department']);
	$joiningdate = addslashes($_POST['joiningdate']);
	$address     = addslashes($_POST['address']);
	$mobile      = addslashes($_POST['mobile']);
	$emergency   = addslashes($_POST['emergency']);
	$employementstatus  = addslashes($_POST['employementstatus']);
	 //echo "INSERT INTO employee (employee,designation,department,joiningdate,address,mobile,emergency,employementstatus)
	//VALUES ('".$employee."','".$designation."','".$department."','".$joiningdate."','".$address."','".$mobile."','".$emergency."','".$employementstatus."'";
	//exit();
    mysqli_query($conn,"INSERT INTO employee (employee,designation,department,joiningdate,address,mobile,emergency,employmentstatus)
	VALUES ('".$employee."','".$designation."','".$department."','".$joiningdate."','".$address."','".$mobile."','".$emergency."','".$employementstatus."')");
      //$query=mysqli_insert_query($conn);
	
$employee = '';
$designation = '';
$department ='';
$joiningdate ='';
$address='';
$mobile='';
$emergency='';
$employementstatus='';
 }   
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Confer Office</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
								<h1><a href="index.html">Pooled</a></h1>
							</div>
					
						 
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="images/in4.jpg" alt=""> </span> 
												<div class="user-name">
													<p>Malorum</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
											<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li> 
											<li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Forms <i class="fa fa-angle-right"></i> Input</li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 		
<!----->

<!---->

<!---->



<!---->
  <div class="grid-form1">
  	       <h3>Form Element</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Employee</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="employee" id="employee" placeholder="Employee">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Designation</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="designation" id="designation" placeholder="Designation">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								<div class="form-group">
									<label for="joinindate" class="col-sm-2 control-label">Joining Date</label>
									<div class="col-sm-8">
										<input type="Date" class="form-control1" name="joiningdate" id="joiningdate" placeholder="Joining Date">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								
								
								<div class="form-group">
									<label for="department" class="col-sm-2 control-label">Department</label>
									<div class="col-sm-8"><select name="department" id="department" class="form-control1">
										<option>IT</option>
										<option>Physiotherapy</option>
										<option>Diagnostic.</option>
										<option>Management</option>
										<option>Human Resources</option>
										<option> Sales & Marketing</option>
										<option> Accounts </option>
										<option> Nursing </option>
										<option> Front Desk </option>
									</select></div>
								</div>
								
								<div class="form-group">
									<label for="address" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8"><textarea name="address" id="address" cols="70" rows="6" class="form-control1"></textarea></div>
								</div>
								
								<div class="form-group">
									<label for="mobile" class="col-sm-2 control-label">Mobile</label>
									<div class="col-sm-8">
										<input type="tel" class="form-control1" name="mobile" id="mobile" placeholder="mobile">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="emergency" class="col-sm-2 control-label">Emeregency Mobile</label>
									<div class="col-sm-8">
										<input type="tel" class="form-control1" name="emergency" id="emergency" placeholder="mobile">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="employementstatus" class="col-sm-2 control-label">Employement Status</label>
									<div class="col-sm-8"><select name="employementstatus" id="employementstatus" class="form-control1">
										<option>Full Time</option>
										<option>Part Time</option>
										
										
									</select></div>
								</div>
								<div class="bs-example" data-example-id="form-validation-states-with-icons">
    
     
      
        <span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value= "Submit" class="btn-primary btn">
				<input type="reset" name="reset" value= "Reset" class="btn-default btn">
				
				
			</div>
		</div>
	 </div>
								
								
							</form>
						</div>
					</div>
					
					<div class="bs-example" data-example-id="form-validation-states">
    
  </div>
  
	
    
  </div>
 	</div>
 	<!--//grid-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Pooled . All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
				<?php include('includes/sidebar.php');
				?>
							  <div class="clearfix"></div>		
							</div>
							
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>