
<?php 

include('includes/config.php');
$emp_name='';
//$empid='';
$email='';
$designation='';
$department='';
$joiningdate='';
$address='';
$mobile='';
$emergency='';
$employmentstatus='';

if(isset($_POST['submit']))
{
	
$start = 'CNF01'; 
//$characters = array_merge(range('A','Z'), range('0','9'));
$characters = array_merge(range('A','Z'),range('0','9'));
for ($i = 0; $i < 7; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $start .= $characters[$rand];
}
    $emp_name = addslashes($_POST['emp_name']);
	$empid=$start;
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $password=md5($password);
    $designation = addslashes($_POST['designation']);
	$department = addslashes($_POST['department']);
	$joiningdate = addslashes($_POST['joiningdate']);
	$address = addslashes($_POST['address']);
	$mobile = addslashes($_POST['mobile']);
	$emergency = addslashes($_POST['emergency']);
	$employmentstatus = addslashes($_POST['employmentstatus']);
	

	
    mysqli_query($conn,"INSERT INTO employee (emp_name,empid,email,password,designation,department,joiningdate,address,mobile,emergency,employmentstatus,createdDt,updatedDt)
	VALUES ('".$emp_name."','".$empid."','".$email."','".$password."','".$designation."',
	'".$department."','".$joiningdate."','".$address."','".$mobile."','".$emergency."','".$employmentstatus."',NOW(),NOW())");
      $idId=mysqli_insert_id($conn);

   
    $_SESSION['success']='User created successfully.'; 
	
$emp_name='';
//$empid='';
$email='';
$designation='';
$department='';
$joiningdate='';
$address='';
$mobile='';
$emergency='';
$employmentstatus='';
 }   
$department_query=mysqli_query($conn,"select * from department");

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

</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
	   <?php include('includes/header.php'); ?>
				<?php include('includes/scripts.php'); ?>
				
				<?php include('includes/sidebar.php'); ?>
              <!--header start here-->
				
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
										<input type="text" class="form-control1" name="emp_name" id="emp_name" placeholder="Employee">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input type="email" class="form-control1" name="email" id="email" placeholder="Email">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" name="password" id="password" placeholder="Password">
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
							<label for="department" class="col-sm-2 control-label" >Department</label>
			                        <div class="col-sm-8">
							<select name="department" id="department" class="form-control1">
									<option value="">Select a Department</option>
							<?php while($row = mysqli_fetch_array($department_query))
                              {   	
						?>
				<option value=<?php echo $row['id']; ?>><?php echo $row['name']; ?></option>
								<?php } ?>
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
<?php include('includes/footer.php'); ?>
<?php include('includes/footer_scripts.php'); ?>
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