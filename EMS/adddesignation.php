<?php 
include('userrole.php');
include("config.php");
if(!isset($_SESSION['login_user'])){

header("location: index.php");
}


$conn = new mysqli("localhost","root","","conferemployee");

 $query="SELECT * FROM department";
	$res = mysqli_query($conn,$query);
	//$row = mysqli_fetch_assoc($res);
if(isset($_POST['submit']))
{
	

	
	$conn = new mysqli("localhost","root","","conferemployee");
    $dept_id = addslashes($_POST['dept2name']);
	$designation_name = addslashes($_POST['designation_name']);
	$sql2="SELECT dept_name FROM department WHERE dept_id= $dept_id";
	$res2 = mysqli_Query($conn,$sql2);
	$dname = mysqli_fetch_assoc($res2);
	$conn ->query("INSERT INTO dept_designation (id,dept_id,dept_name,designation)
	VALUES (NULL,'".$dept_id."','".$dname['dept_name']."','".$designation_name."');");
    
    $_SESSION['success']='Designation Added successfully.'; 
	
	$designation_name='';
	
	echo '<script type="text/javascript"> document.getElementById("p1").innerHTML="Designation Added Sucessfully" </script>';



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
  <div class="grid-form1">
   <p id="p1">
 
  	       <h3>Add Designation</h3>
  	         <div class="tab-content">
							
							
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								<div class="col-sm-1">
										
									</div>
								
								
					<div id="addDesignationForm" >			
							<form class="form-horizontal" method="post" action="adddesignation.php">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Designation Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="designation_name" id="desname" placeholder="Designation Name">
									</div>
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label" style="margin-left:105px">Department Name</label>
										<div class="col-sm-8">
										<select  class="form-control2" name="dept2name" id="dept2name" >
										<option value="" >Select Your Department</option>
										<?php
										while($row=mysqli_fetch_assoc($res))
										{
											?>
										<option value="<?php echo $row['dept_id']?>"><?php echo $row['dept_name']?></option>
										<?php
										}
										?>
										</select>
										
									</div>
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