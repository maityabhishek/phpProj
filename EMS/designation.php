<?php
include('includes/config.php');
include("config.php");
include('userrole.php');
if(!isset($_SESSION['login_user'])){

header("location: index.php");
}


$conn = new mysqli("localhost","root","","conferemployee");
if(isset($_REQUEST['designation_search']))
{
	$searchBy = $_REQUEST['searchby'];
	$str = $_REQUEST['searchText'];
	if($searchBy==1)
	{
		$tocomp="designation";
		
	}
	else if($searchBy==2)
	{
		$tocomp="dept_name";
		
	}
	
	$sql=mysqli_query($conn,"select * from dept_designation where ".$tocomp." LIKE '".$str."%' order by dept_id ");

}
else
{
	$sql=mysqli_query($conn,"select * from dept_designation order by id ");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Tabels :: w3layouts</title>
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
<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i>Tabels</li>
            </ol>
<!--four-grids here-->

		<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Designation List</h2>
							
							<span>
					
							<form >
								
								<div class="col-md-2  form-group "style="padding-right: 0px;">
								<select  name="searchby" style="border:none; padding:2.5px; ">
								<option value="">Search By:</option>
								<option value="1">Designation:</option>
								<option value="2">Department:</option>
													
								</select>
								
								</div>
								<div class="col-md-6 form-group " style="padding-left: 0px;">
							    <input type="text" placeholder="Search" name="searchText" style="border:none none solid none ;width:50%;margin:0px;">
								<button type="submit" name="designation_search"><i class="fa fa-search"></i></button>
								</div>
							</form>
								
					  </span>
					  
									<?php 
									
										if($permission_ary[designation][add]==1)
										{
											echo'<div class="col-sm-4"><div  class="bg-primary text-white fw600 text-center" style="padding-top:10px;padding-bottom:10px;" ><a style="color:white !important;" href="adddesignation.php" >Add Designation</a></div></div>';
									    }
									?>
					    <table id="table">
						<thead>
						  <tr>
						  <th> Department Name</th>
							<th> Designation Name</th>
							<?php 
									
										if($permission_ary[designation][edit]==1)
										{
											echo'<th colspan="2">Action</th>';
										}
							?>
						  </tr>
						</thead>
						<?php 
						while($result = mysqli_fetch_assoc($sql)){
						
						?>
						<tbody>
						  <tr>
						  <td><?php echo $result['dept_name'];?></td>
							<td><?php echo $result['designation']; ?></td>
							<?php 
							if($permission_ary[designation][edit]==1)
							{
							echo'<td><div class="icon-box col-md-6 col-sm-6" style=" width:auto;  height:30%; padding:0px 0px; border:1px;"> <a class="agile-icon" href="editdesignation.php?desid='.$result['id'].'"><i class="fa fa-pencil-square"></i>EDIT</a></div></td>
			<td><div class="icon-box col-md-6 col-sm-6" style=" width:auto;  height:30%; padding:0px 0px; border:1px;"><button type="button" class="agile-icon"  onclick="deleteitem('.$result['id'].')" ><i class="fa fa-trash-o"></i></button></div></td>
								';
							}
							?>
							
						  </tr>
						  <script language="javascript">
					  function deleteitem(delid)
					  {
						  if(confirm("Do you want to delete this item!"))
						  {
							  window.location.href='.'delete.php?del_id='.' +delid+' ';
							  return true;
						  }
					  }
					  </script>
						<?php } ?>
						</tbody>
						
					  </table>
					  
					</div>
				</div>
				<!-- //tables -->
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