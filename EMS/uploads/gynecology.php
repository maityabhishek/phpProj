<?php
include("includes/config.php");
$home_page=mysql_fetch_array(mysql_query("select * from administrators where id = '1'"));
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Consultation</title>
<?php include('includes/css_js_script.php'); ?>
</head>
<body>
<?php	
$sql1 = mysql_query("select * from service order by weight asc");
if(mysql_num_rows($sql1) > 0)
{
	while($a1 = mysql_fetch_array($sql1)){
		$name = stripslashes($a1['name']);
		$page_url = stripslashes($a1['page_url']);
		$page_content = stripslashes($a1['description']);
		$image1 = stripslashes($a1['image1']);
		$image2 = stripslashes($a1['image2']);
		$buttontext = stripslashes($a1['buttontext']);
		$buttonurl = stripslashes($a1['buttonurl']);
		?>
		<div id="<?php echo $page_url; ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">
		    	<div class="modal-content">
		      		<div class="modal-body">      			
		      			<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
		      			<img src="<?=WEB_ROOT?>/service/<?php echo $image2;?>" class="img-responsive"/>
		      			<div class="sharethis-inline-share-buttons"></div>
		      			<h2 class="popup-head"><?php echo $name; ?></h2>
		        		<div class="popup-content"><?php echo $page_content; ?></div>
						<a href="<?php echo $buttonurl; ?>" class="cta-btn popup"><?php echo $buttontext; ?></a>
						<div class="clearfix"></div>
		      		</div>
		    	</div>
		    </div>
		</div>
		<?php
	}
}
?>

<?php include('includes/header.php'); ?>


<section class="container-fluid content-wrap">
	<div class="row">
		<div class="container">
			<div class="row">
			<h2>gynecology</h2>
                     <p>Gynecology is the branch of physiology and medicine which deals with the functions and diseases specific to health of the female reproductive system. Our gynecologist provides complete care for women with a wide range of gynecology issues like:</p>
                <div class="bs-example">
     <ul style="color:#999; font-size:16px; margin-left:15px">
                             <li style="list-style-type:disc"> 	Infertility</li>
                             <li style="list-style-type:disc">	Menopause/menstrual condition</li>
                            <li style="list-style-type:disc">	PCOS (Polycystic Ovary Syndrome)</li>
							<li style="list-style-type:disc">	Dysmenorrheal</li>
							<li style="list-style-type:disc">	Ovarian cancer</li>
							<li style="list-style-type:disc">    Cervical cancer</li>
							<li style="list-style-type:disc">	Conception problem</li>
							<li style="list-style-type:disc">	Pregnancy</li>
							
                                   </ul>	
	
	<!--<p><strong>Note:</strong> Click on the linked heading text to expand or collapse accordion panels.</p> -->
</div> 
</div>
            </div>
        </div>	 
			  <div class="clearfix"></div>
</section> <br>
<a href="https://conferkare.com/" class="cta-btn style1">Book an Appointment</a> <br>
<?php include("includes/contactus.php"); ?>
<?php include("includes/footer.php"); ?>
<?php  include('includes/footer_script.php'); ?>
<script src="js/jquery.counterup.min.js"></script> 
<script>
    jQuery(document).ready(function( $ ) {
        $('.count').counterUp({
            delay: 10,
            time: 1000
        });
       
    });
</script>
</body>
</html>