
<?php 

include('includes/config.php');
$name='';


if(isset($_POST['submit']))
{
	
	$conn = new mysqli("localhost","root","","conferemployee");
    $name = addslashes($_POST['deptname']);
	
    
	
	

	
    mysqli_query($conn,"INSERT INTO department (dept_id,dept_name)
	VALUES (NULL,'".$name.");");
      $idId=mysqli_insert_id($conn);

   
    $_SESSION['success']='Department Added successfully.'; 
	
$name='';

 }   
//$department_query=mysqli_query($conn,"select * from department");

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
 	
 		
<!----->

<!---->

<!---->



<!---->
  <div class="grid-form1">
		<h3>Department</h3>
  	         <div class="tab-content">
							
						<div class="tab-pane active" id="horizontal-form">
						
							  	       
							<form class="form-horizontal" method="post" action="">
								<div class="col-sm-1">
										
									</div>
									<div class="col-sm-4">
									<div  class="bg-primary  text-white fw600 text-center" style="padding-top:10px;padding-bottom:10px;">
										<a style="color:white !important;" href="employee3.php" >Add Department</a>
								
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
								$("#addDepartmentForm").fadeIn();
        
									});
									});	
							*/			
							function showform()
							{
								document.getElementById("addDepartmentForm").style.display='inline';
							}

							
										
							</script>
				
</body>
</html>