<?php 
$desid = $_REQUEST['desid'];

if(isset($_POST['submit']))
{
	

	
	$conn = new mysqli("localhost","root","","conferemployee");
    $designation_name = addslashes($_POST['desname']);
	$chngdes_id=addslashes($_POST['editdes_id']);
    

	$sqlqry="UPDATE dept_designation SET designation = '".$designation_name."'  WHERE id ='".$desid."' ";
	mysqli_query($conn,$sqlqry);
      
	

 }  


?>
<?php


$conn = new mysqli("localhost","root","","conferemployee");

$sql = $conn->query("select * from dept_designation where id=".$desid);
$result = mysqli_fetch_assoc($sql);
//print_r($result);
//exit;

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
 
  	       <h3>Edit Designation</h3>
  	         <div class="tab-content">
							
							
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								<div class="col-sm-1">
										
									</div>
								
								
					<div id="addDepartmentForm"  >			
							<form class="form-horizontal" method="post" action="">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Designation Name</label>

									<div class="col-sm-8">
										<input type="text" class="form-control1" name="desname" id="desname" value="<?php echo $result['designation']; ?>">
										
										<input type="text" hidden class="form-control1" name="editdes_id" id="editdes_id" value="<?php echo $result['desid']; ?>">
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