<?php
//$conn = new mysqli("localhost","root","","conferemployee");
include('includes/config.php');
$id = $_REQUEST['id'];
if(isset($_POST['submit']))
{
	$applicant = addslashes($_POST['applicant']);
	$post_applied = addslashes($_POST['post_applied']);
	//$applicationdate= addslashes($_POST['applicationdate']);
	$doi= addslashes($_POST['doi']);
	$status= addslashes($_POST['status']);
	//$eligiblity= addslashes($_POST['eligiblity']);
	//$notice= addslashes($_POST['notice']);
	//$jobtype= addslashes($_POST['jobtype']);
	//$emptype= addslashes($_POST['emptype']);
	$reference= addslashes($_POST['reference']);

	
	$query="UPDATE prerecruitment SET Applicant = '".$applicant."',Post_Applied= '".$post_applied."',Interview_Date= '".$doi."',Status= '".$status."',Reference= '".$reference."'  WHERE id ='".$id."'";
	$result=mysqli_query($conn,$query);
	
}		


?>



<?php


$conn = new mysqli("localhost","root","","conferemployee");
$sql=$conn->query("select * from prerecruitment WHERE id='".$id."' ");

//echo "select * from prerecruitment order by id ";
$result = mysqli_fetch_assoc($sql);
//print_r($result);
//exit;

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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Forms <i class="fa fa-angle-right"></i> Edit Pre-Recruitment</li>
            </ol>
<!--grid-->

  <div class="grid-form1">
   <p id="p1">
 
  	       <h3>Edit</h3>
  	         <div class="tab-content">
							
							
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								
								
								
					<div id="addForm"  >			
							<form class="form-horizontal" method="post" action="">
							   
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" >Applicant:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="applicant" id="applicant" value="<?php echo $result['Applicant']; ?>">
										
									</div>
                                    <div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Position:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="post_applied" value="<?php echo $result['Post_Applied']; ?>">
									
									</div>
                                    <div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Interview Date:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="doi" value="<?php echo $result['Interview_Date']; ?>">
										
									</div>
                                    <div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Status:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="status" value="<?php echo $result['Status']; ?>">
										
									</div>
                                    <div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">References:</label>
									<div class="col-sm-6">
										<input type="text" class="form-control1" name="reference" value="<?php echo $result['Reference']; ?>">
										
									</div>
                                    <div class="col-sm-2">
									
									</div>
								</div>

									
     
      <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="submit" value= "Update" class="btn-primary btn">
				<input type="reset" name="reset" value= "Reset" class="btn-default btn">
				
				
			</div>
		</div>
	 </div>
					
								
							</form>
						
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
function showform()
							{
								document.getElementById("addForm").style.display='inline';
							}
</script>
   
</body>
</html>