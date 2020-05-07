<?php
include('includes/config.php');
include('userrole.php');
include("config.php");
if(!isset($_SESSION['login_user'])){

header("location: index.php");
}

$conn = new mysqli("localhost","root","","conferemployee");
 if(isset($_REQUEST['leave_search']))
 {
		$searchBy = $_REQUEST['searchby'];
		if($searchBy==1)
		{
				$tocomp='employee.emp_name';
				$str = $_REQUEST['searchText'];
				$qry="SELECT emp_leave.leave_id , emp_leave.emp_id ,emp_leave.doa ,emp_leave.leave_type ,emp_leave.start_dt ,emp_leave.end_dt ,employee.emp_name from emp_leave left join employee ON employee.emp_id = emp_leave.emp_id where ".$tocomp." LIKE '".$str."%' order by emp_leave.leave_id ";
				//echo $qry;
		}
		else if($searchBy==2)
		{
			$tocomp='emp_leave.emp_id';
			$str = $_REQUEST['searchText'];
			$qry="SELECT emp_leave.leave_id , emp_leave.emp_id ,emp_leave.doa ,emp_leave.leave_type ,emp_leave.start_dt ,emp_leave.end_dt ,employee.emp_name from emp_leave left join employee ON employee.emp_id = emp_leave.emp_id where ".$tocomp." LIKE '".$str."%' order by leave_id ";
			
			
			
		}
		else if($searchBy==3)
		{
			$beg = $_REQUEST['begdate'];
			$end = $_REQUEST['enddate'];
			$qry="SELECT emp_leave.leave_id , emp_leave.emp_id ,emp_leave.doa ,emp_leave.leave_type ,emp_leave.start_dt ,emp_leave.end_dt ,employee.emp_name from emp_leave left join employee ON employee.emp_id = emp_leave.emp_id where start_dt BETWEEN '".$beg."'AND '".$end."' OR end_dt BETWEEN '".$beg."' AND '".$end."' order by leave_id ";
			
		}
			
		
 }
 else
 {
 $qry="SELECT emp_leave.leave_id , emp_leave.emp_id ,emp_leave.doa ,emp_leave.leave_type ,emp_leave.start_dt ,emp_leave.end_dt ,employee.emp_name from emp_leave left join employee ON employee.emp_id = emp_leave.emp_id order by leave_id ";
 //echo $qry;
 //exit;
 
 }
$sql=mysqli_query($conn,$qry);

//$row=mysqli_fetch_array($sql);

//print_r($row);
//exit;
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
		<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Leave List</h2>
					  
					  <div class="table-responsive">
					  <span>
					
							<form >
								
								<div class="col-md-2  form-group "style="padding-right: 0px;">
								<select  name="searchby" onchange="searchchange(this.value)" style="border:none; padding:2.5px; ">
								<option value="">Search By:</option>
								<option value="1">Employee Name:</option>
								<option value="2">Employee ID:</option>
								<option value="3">Date:</option>
													
								</select>
								
								</div>
								<div class="col-md-7 form-group " style="padding-left: 0px;">
							    
								<span id="search_box2" style="display:none;">
								
								Start Date:<input type="Date"  name="begdate" style="border:none none solid none ;width:25%;margin:0px;">
								
								End Date:<input type="Date" name="enddate" style="border:none none solid none ;width:25%;margin:0px;">
								
								</span>
								<span id="search_box" style="display:none;">
								<input type="text" placeholder="Search" name="searchText" style="border:none none solid none ;width:50%;margin:0px;">
								
								</span>
								<button type="submit" name="leave_search"><i class="fa fa-search"></i></button>
								</div>
							</form>
								
					  </span>
					  
					    <table id="table">
						<thead>
						  <tr>
							<th>Employee</th>
							<th>Date of Application </th>
							<th>Leave Type</th>
							<th>Start Date</th>
							<th>End Date</th>
							
						  </tr>
						</thead>
						<?php 
						while($result = mysqli_fetch_assoc($sql)){
						
						?>
						<tbody>
						  <tr>
							<td><?php echo $result['emp_name']; ?></td>
							<td><?php echo $result['doa']; ?></td>
							<td><?php echo $result['leave_type']; ?></td>
							<td><?php echo $result['start_dt']; ?></td>
							<td><?php echo $result['end_dt']; ?></td>
							
						  </tr>
						<?php } ?>
						</tbody>
					  </table>
					</div>
				</div>
				<!-- //tables -->
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
<script>
	function searchchange(searchtype)
	{
		if(searchtype==3)
		{
			document.getElementById("search_box").style.display="none";
			document.getElementById("search_box2").style.display="inline";
		}
		else 
		{
			document.getElementById("search_box2").style.display="none";
			document.getElementById("search_box").style.display="inline";
		}
	}
	</script>
	
	</body>
</html>