
<?php 
include('userrole.php');
include('includes/config.php');
$name='';
//$empid='';
$contact='';
$email='';
$qualification='';
$experience='';
$department='';
$position='';
$interview_date='';
$interview_mode='';
$status='';
$source='';
$remark='';
if(isset($_POST['submit']))
{
	

    $name = addslashes($_POST['name']);
	$contact = addslashes($_POST['contact']);
    $email = addslashes($_POST['email']);
	$qualification = addslashes($_POST['qualification']);
	$experience = addslashes($_POST['experience']);
	$department = addslashes($_POST['department']);
	$position = addslashes($_POST['position']);
	$interview_date = addslashes($_POST['interview_date']);
	$interview_mode = addslashes($_POST['interview_mode']);
	$status = addslashes($_POST['status']);
	$source = addslashes($_POST['source']);
	$remark = addslashes($_POST['remark']);
	
 
	
    mysqli_query($conn,"INSERT INTO recruitment (name,contact,email,qualification,experience,department,position,interview_date,interview_mode,
	status,source,remark,createdDt,updatedDt)
	VALUES ('".$name."','".$contact."','".$email."','".$qualification."','".$experience."',
	'".$department."','".$position."','".$interview_date."','".$interview_mode."','".$status."','".$source."','".$remark."',NOW(),NOW())");
      $idId=mysqli_insert_id($conn);

   
    $_SESSION['success']='Candidate Added Successfully.'; 
	$name='';
//$empid='';
$contact='';
$email='';
$qualification='';
$experience='';
$department='';
$position='';
$interview_date='';
$interview_mode='';
$status='';
$source='';
$remark='';

 }   
//$department_query=mysqli_query($conn,"select * from department");

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Tabels :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i>Tabels</li>
            </ol>
<!--four-grids here-->
		<div class="grid-form1">
  	       <h3>Form Element</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" action="">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="name" id="name" placeholder="Employee">
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
									<label for="focusedinput" class="col-sm-2 control-label">Contact</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" name="contact" id="contact" placeholder="Contact">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Qualification</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="qualification" id="qualification" placeholder="Qualification">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Experience</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="experience" id="experience" placeholder="Experience">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Department</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="department" id="department" placeholder="Experience">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Position</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="position" id="position" placeholder="Position">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								<div class="form-group">
									<label for="joinindate" class="col-sm-2 control-label">Interview_date</label>
									<div class="col-sm-8">
										<input type="Date" class="form-control1" name="interview_date" id="interview_date" placeholder="Joining Date">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="employementstatus" class="col-sm-2 control-label">Interview Mode</label>
									<div class="col-sm-8"><select name="interview_mode" id="interview_mode" class="form-control1">
										<option>Face to Face</option>
										<option>Online</option>
										
										
									</select></div>
								</div>
								<div class="form-group">
									<label for="employementstatus" class="col-sm-2 control-label">Status</label>
									<div class="col-sm-8"><select name="status" id="status" class="form-control1">
										<option>On Hold</option>
										<option>Recommended</option>
										<option>Not Recommended</option>
										
										
									</select></div>
								</div>
								
								<div class="form-group">
									<label for="mobile" class="col-sm-2 control-label">Source</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="source" id="source" placeholder="mobile">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								
								<div class="form-group">
									<label for="address" class="col-sm-2 control-label">Remarks</label>
									<div class="col-sm-8"><textarea name="remark" id="remark" cols="70" rows="6" class="form-control1"></textarea></div>
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
         
						<div class="clearfix"></div>
                   
	<!--//photoday-section-->	
	<!--w3-agileits-pane-->	
				<!-- /.list-group --> 
				
			  </div>
			  <!-- /.panel-body --> 
			
		
	  <!--//w3-agileits-pane-->	
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

<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php'); ?>
<?php include('includes/footer_scripts.php'); ?>
<!--COPY rights end here-->
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
							</script>

<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        fillOpacity:0.85,
        lineWidth: 0,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
</body>
</html>