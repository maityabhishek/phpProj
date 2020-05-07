<?php 
include('userrole.php');
include("config.php");
if(isset($_POST['submit']))
{
	

	
	$conn = new mysqli("localhost","root","","conferemployee");
    $name = addslashes($_POST['hol_name']);
	$date = addslashes($_POST['hol_date']);
	$type = addslashes($_POST['hol_type']);
    

	$conn ->query("INSERT INTO holiday_lists (id,holiday_name,holiday_date,holiday_type)
	VALUES (NULL,'".$name."','".$date."','".$type."');");
      

   
    $_SESSION['success']='Department Added successfully.'; 
	
$name='';
	
	echo '<script type="text/javascript"> document.getElementById("p1").innerHTML="Department Added Sucessfully" </script>';



 }  


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Confer Office</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Employee <i class="fa fa-angle-right"></i> Add Employee</li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 		
<!----->

<!---->

<!---->



<!---->
  <div class="grid-form1">
  	       <h3>Holidays List Form</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Holidays Name:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="hol_name" id="hol_name" placeholder="Name" required>
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								
																
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Holidays Date:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="hol_date" id="hol_date" placeholder="DD-MM-YYYY" required>
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Holidays Type: </label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="hol_type" id="hol_type" placeholder="Type">
									</div>
									<div class="col-sm-2">
										
									</div>
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
<script src="js/phoneno.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   
   <!-- /Bootstrap Core JavaScript -->	   

  <script>
  function statusCkbox()
  {
	  	  alert("HI");
		  return false;
	  if(document.getElementById("myCheck").checked == true)
	  {
		  //deactivated the Concerned Person field
		  
		  
	  }
	  else
	  {
		  // activate the Concerned Person's Filed 
	  }
	  
)
	  
  }
</script>  
</body>
</html>