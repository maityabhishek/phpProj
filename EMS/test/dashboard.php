<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
//session_start();
include("includes/config.php");
//echo "hello";
//exit;
//include("includes/functions.php");
echo $_SESSION['login_user']['id'];
exit();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Home :: w3layouts</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



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
                <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>User</h3>
								<h4> 24,420  </h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Clients</h3>
								<h4>15,520</h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Projects</h3>
								<h4>12,430</h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Old Projects</h3>
								<h4>14,430</h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->
<!--agileinfo-grap-->

	<!--//agileinfo-grap-->
<!--photoday-section-->	
			
                        
                    	
                        
                        <div class="col-sm-4 w3-agileits-crd">
						
                            <div class="card card-contact-list">
							<div class="agileinfo-cdr">
                                <div class="card-header">
                                    <h3>Contacts</h3>
                                </div>
                                <div class="card-body p-b-20">
                                    <div class="list-group">
                                        <a class="list-group-item media" href="">
                                             <div class="pull-left">
                                                <img class="lg-item-img" src="images/in1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                	<div class="lg-item-heading">Lorem</div>
                                                	<small class="lg-item-text">lorem@gmail.com</small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading">Ceo</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item media" href="">
                                            <div class="pull-left">
                                                <img class="lg-item-img" src="images/in2.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                	<div class="lg-item-heading">Ipsum</div>
                                                	<small class="lg-item-text">ipsum@hotmail.com</small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading">Director</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item media" href="">
                                            <div class="pull-left">
                                                <img class="lg-item-img" src="images/in3.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                	<div class="lg-item-heading">Unknown</div>
                                                	<small class="lg-item-text">unknown@gmail.com</small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading">Manager</div>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="list-group-item media" href="">
                                            <div class="pull-left">
                                                <img class="lg-item-img" src="images/in4.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                            	<div class="pull-left">
                                                	<div class="lg-item-heading">Specimen</div>
                                                	<small class="lg-item-text">specimen@hotmail.com</small>
                                                </div>
                                                <div class="pull-right">
                                                	<div class="lg-item-heading">Assistan</div>
                                                </div>
                                            </div>
                                        </a>
                                       
                                        
                                   	</div>
                                </div>
                            </div>
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
        lineWidth: 0,
        fillOpacity:0.85,
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