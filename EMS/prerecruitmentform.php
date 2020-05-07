<?php 
include('userrole.php');
include('config.php');
       $servername = "localhost";  
       $username = "root";  
       $password = "";  
       $conn = mysqli_connect($servername , $username , $password) or die("unable to connect to host");  
       mysqli_select_db($conn,"conferemployee") or die("unable to connect to database");
       if(isset($_POST['submit']))
		   
{
     $applicant=$_POST['applicant'];
     $post_applied=$_POST['post_applied'];
	 $applicationdate=$_POST['applicationdate'];
	 $doi=$_POST['doi'];
	 $status=$_POST['status'];
	 $eligiblity=$_POST['eligiblity'];
	 $notice=$_POST['notice'];
	 $jobtype=$_POST['jobtype'];
	 $emptype=$_POST['emptype'];
	 $reference=$_POST['reference'];

    $query = "INSERT INTO prerecruitment  (Applicant,Post_Applied,Application_Date,Interview_Date,Status,Eligiblity,Notice_Period,Job_Type,Employee_Type,Reference)
	VALUES ('".$applicant."','".$post_applied."','".$applicationdate."','".$doi."','".$status."','".$eligiblity."','".$notice."','".$jobtype."','".$emptype."','".$reference."');";
		//exit;
		//echo $query;

        $result= mysqli_query($conn,$query);
		
        /*if ($result)
		{
          echo "form submitted successfully";
        }
		else
		{
        echo "error";
	   }*/  
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

<link rel="stylesheet" href="css\style2.css">

</head> 
<body>
   <div class="page-container sidebar-collapsed-back">
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
		<div id="Pre recruitment Form"  >			
            <div class="grid-form1">
  	       <h3>Pre Recruitment Form</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
											
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" style="text-align: left;"> Applicant:</label>
									<div class="col-sm-8">
									<input type="text" class="form-control1" name="applicant" id="applicant" placeholder="Full Name" required>	
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" style="text-align: left;">Post Applied For:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="post_applied" id="post_applied"  placeholder="Post Applied For" required >
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" style="text-align: left;">Date of Application:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="applicationdate" id="applicationdate" placeholder="DD-MM-YYYY">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
							    <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" style="text-align: left;">Date of Interview:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="doi" id="doi" placeholder="DD-MM-YYYY">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
	                            <div class="form-group">
									<label for="employementstatus" class="col-sm-2 control-label" style="text-align: left;">Status:</label>
									<div class="col-sm-8"><select name="status" id="status" class="form-control1">
										<option value=" ">select</option>
										
										<option value="Recommended">Recommended</option>
										<option value="Hold">Hold</option>
										<option value="Rejected">Rejected</option>																
									</select></div>
								</div>
                                <div class="form-group">
									<label for="employementstatus" class="col-sm-2 control-label" style="text-align: left;">Eligiblity:</label>
									<div class="col-sm-8"><select name="eligiblity" id="eligiblity" class="form-control1">
										<option value=" ">select</option>
										
										<option value="Experienced">Experienced</option>
										<option value="Fresher">Fresher</option>							
									</select></div>
								</div>								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" style="text-align: left;">Notice Period:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="notice" id="notice" placeholder="Notice Period">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>						
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" style="text-align: left;">Type of Job:</label>
									<div class="col-sm-8">
										<input name="jobtype" type="radio" value="Full Time" checked="checked" /> Full Time      
										<input name="jobtype" type="radio" value="Part Time" /> Part Time      
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
							    <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label" style="text-align: left;">Type of Employee:</label>
									<div class="col-sm-8">
										<input name="emptype" type="radio" value="Full Time" checked="checked" /> Full Time      
										<input name="emptype" type="radio" value="Intern" /> Intern     
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>								
								<div class="form-group">
									<label for="references" class="col-sm-2 control-label" style="text-align: left;">References:</label>
									<div class="col-sm-8"><textarea name="reference" id="reference" cols="70" rows="6" class="form-control1"></textarea></div>
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
 	</div>
 	<!--//grid-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("form").submit(function(){
        alert("Submitted");
    });
});
</script>
</head>	


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
</p>
</div>
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
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
										
						/*		

							$(document).ready(function(){
								$("#addDept").click(function(){
								$("#prerecruitmentform").fadeIn();
        
									});
									});	
							*/			
							function showform()
							{
								document.getElementById("prerecruitmentForm").style.display='inline';
							}

							
										
							</script>
				
</body>
</html>