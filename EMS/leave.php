<?php
include("config.php");
include("userrole.php");
if(!isset($_SESSION['login_user'])){

header("location: index.php");
}

include('includes/config.php');
$conn = new mysqli("localhost","root","","conferemployee");


$concern_person_qry=mysqli_query($conn,"select concerned_person from employee where emp_id='".$_SESSION['login_user']['emp_id']."' ");
$cpersondata=mysqli_fetch_array($concern_person_qry);

$concern_person_data=mysqli_query($conn,"select emp_id, emp_name from employee where emp_id='".$cpersondata['concerned_person']."' ");
$c_person=mysqli_fetch_array($concern_person_data);


if(isset($_POST['submit']))
{
	
	$conn = new mysqli("localhost","root","","conferemployee");
    $em_id = addslashes($_POST['emp_id']);
	$appdate = date("Y-m-d");
	$emp_id_cp=addslashes($_POST['emp_id_concern_person']);
    $leavetype = addslashes($_POST['leave_type']);
	$begdt =  addslashes($_POST['start_date']);
	$enddt = addslashes($_POST['end_date']);
	
	$cause      = addslashes($_POST['cause']);
	$conc_person=addslashes($_POST['concern_person']);
	 
	$sql="INSERT INTO emp_leave (emp_id,doa,leave_type,start_dt,end_dt,cause,concerned_person,concerned_person_id) VALUES ('".$em_id."','".$appdate."','".$leavetype."','".$begdt."','".$enddt."','".$cause."','".$conc_person."','".$emp_id_cp."')" ;
	//exit;
	mysqli_query($conn,$sql);
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
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i> Leave Application</li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 		
<!----->

<!---->

<!---->



<!---->
  <div class="grid-form1">
  	       <h3>Leave Form</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Employee ID</label>
									<div class="col-sm-8">
										<input type="text" readonly class="form-control1" name="emp_id" id="emp_id" value="<?php echo $_SESSION['login_user']['emp_id']?>">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								
								<div class="form-group">
	<label  class="col-sm-2 control-label" >Leave Type</label>
				<div class="col-sm-8"><select name="leave_type" id="bloodgroup" class="form-control1">
										<option value=" ">select</option>
										<option value="Casual">Casual Leave</option>
										<option value="Sick">Sick Leave</option>
										
										</select>																								
	</div>
	</div>
								
								
								<div class="form-group">
						<label for="inputPassword" class="col-sm-2 control-label">Start Date </label>
	     <div class="col-sm-8">
			<input type="Date" class="form-control1" id="start_date" name="start_date" placeholder="Start Date">
							</div>
		</div>
		<div class="form-group">
						<label for="inputPassword" class="col-sm-2 control-label">End Date </label>
	     <div class="col-sm-8">
			<input type="Date" class="form-control1" id="end_date" name="end_date" placeholder="End Date">
							</div>
		</div>
		<div class="form-group">
				<label for="address" class="col-sm-2 control-label">Causes</label>
									<div class="col-sm-8"><textarea name="cause" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
							</div>
							<div class="form-group">
							<label for="employee name" class="col-sm-2 control-label">Concerned Person </label>
				<div class="col-sm-8">
					<input type="text" class="form-control1" readonly id="concern_person" name="concern_person" value="<?php echo $c_person['emp_name']; ?> ">
										</div>
																											
						</div>
						<div class="form-group">
							<label for="employee name" class="col-sm-2 control-label"> Employee Id of Concerned Person </label>
				<div class="col-sm-8">
					<input type="text" class="form-control1" readonly  id="emp_id_concern_person" name="emp_id_concern_person" value="<?php echo $c_person['emp_name']; ?> ">
										</div>
																											
						</div>
						
								<div class="bs-example" data-example-id="form-validation-states-with-icons">
    
     
      
        <span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
      </div>
     
      <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value= "Apply" class="btn-primary btn">
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