
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
$conn = new mysqli("localhost","root","","conferemployee");
$empid = $_REQUEST['empid'];
//echo $empid;
//exit;
if(isset($_POST['submit']))
{
	
	
	$emp_id = addslashes($_POST['emp_id']);
	
    $emp_name = addslashes($_POST['emp_name']);
	
	//$joiningdate = addslashes($_POST['doj']);
	
    $email = addslashes($_POST['email']);
    //$password = addslashes($_POST['password']);
    //$password=md5($password);
    $designation = addslashes($_POST['designation']);
	//$department = addslashes($_POST['department']);
	$mobile=addslashes($_POST['mobile']);
	$address = addslashes($_POST['address']);
	$emg_no=addslashes($_POST['emg_no']);
	
	$sqlqry="UPDATE employee SET emp_name = '".$emp_name."', email= '".$email."'  WHERE id ='".$empid."'";
	mysqli_query($conn,$sqlqry);
	
	$sqlqry2="UPDATE emp_dertails SET address = '".$address."', mobile= '".$mobile."',Em_no='".$emg_no."'   WHERE id ='".$empid."'";
	
	mysqli_query($conn,$sqlqry2);

	}

?>



<?php

$conn = new mysqli("localhost","root","","conferemployee");
//$sql = $conn->query("select employee.emp_id,employee.emp_name,employee.email,emp_dertails.address,emp_dertails.mobile,emp_dertails.em_no,employee.designation from employee inner join emp_dertails on employee.id=emp_dertails.id  where employee.id=".$empid.");
//$res= mysqli_query($conn,"select employee.emp_id,employee.emp_name,employee.email,emp_dertails.address,emp_dertails.mobile,emp_dertails.em_no,employee.designation from employee inner join emp_dertails on employee.id=emp_dertails.id  where employee.id=".$empid);
$sql = $conn->query("select employee.emp_id,employee.emp_name,employee.email,emp_dertails.address,emp_dertails.mobile,emp_dertails.em_no from employee inner join emp_dertails on employee.id=emp_dertails.id  where employee.id=".$empid);
$result = mysqli_fetch_assoc($sql);

//fetching designation from the deignation table by joining 

$sql2=$conn->query("select * from dept_designation ");
$res = mysqli_fetch_assoc($sql);



?>





<!DOCTYPE HTML>
<html>
<head>
<title>Confer Office</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->



</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<?php include('includes/header.php'); ?>
				<?php include('includes/scripts.php'); ?>
				
				<?php include('includes/sidebar.php'); ?>
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Forms <i class="fa fa-angle-right"></i> Validation</li>
            </ol>
<!--grid-->
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	<!---->
  	    
        <form method="post" action="">
         	<div class="vali-form">
			<div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Employee Id</label>
              <input readonly type="text" name="emp_id" value="<?php echo $result['emp_id']; ?>" required="">
            </div>
            <div class="col-md-6 form-group1">
              <label class="control-label">Name</label>
              <input readonly type="text" name="emp_name" value="<?php echo $result['emp_name']; ?>" required="">
            </div>
            
            <div class="clearfix"> </div>
            </div>
            
            <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Email</label>
              <input type="text" name="email" value="<?php echo $result['email']; ?>" required="">
            </div>
			<div class="col-md-6 form-group1 group-mail">
              <label class="control-label">Mobile</label>
              <input type="text" name="mobile" value="<?php echo $result['mobile']; ?>" required="">
            </div>
			<div class="col-md-6 form-group1 form-last">
              <label class="control-label">Emergency Contact Number</label>
              <input type="text" name="emg_no" value="<?php echo $result['em_no']; ?>"  required="">
            </div>
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 ">
              <label class="control-label">Address</label>
              <textarea  name="address" required=""><?php echo $result['address']; ?></textarea>
            </div>
             <div class="clearfix"> </div>
              
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 form-last">
              <label class="control-label">Designation</label>
              <input type="text" name="designation" value="<?php echo $res['designation']; ?>" required="">
            </div>
             <div class="clearfix"> </div>
            <div class="vali-form">
            
           
            <div class="clearfix"> </div>
            </div>
             <div class="vali-form vali-form1">
           
            <div class="clearfix"> </div>
            </div>
             
             <div class="clearfix"> </div>
           
            
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group">
             
            </div>
             <div class="clearfix"> </div>
              
             <div class="clearfix"> </div>
          
            <div class="col-md-12 form-group">
              <input type="submit" name="submit" class="btn btn-primary" value="Update">
              
            </div>
          <div class="clearfix"> </div>
        </form>
    
 	<!---->
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
				
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   
   <!-- /Bootstrap Core JavaScript -->	   

<script>
function numcheck()
{
	var phoneno = document.getElementById("userNo").value;
	var lastno= phoneno.charCodeAt(phoneno.length-1);
	var phoneno1=phoneno.substring(0,phoneno.length-1);
	var flg=true;
		
		if((phoneno.length == 1) && (lastno == 43))
			{
				flg=false;
			}	
	
	if((lastno<48 || lastno>57) && flg )
		{
			document.getElementById("userNo").value=phoneno1;	
		}		
	

}
</script>
   
</body>
</html>