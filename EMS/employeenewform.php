
<?php 
include('userrole.php');
include("config.php");
if(!isset($_SESSION['login_user']))
{

	header("location: index.php");
}
include('includes/config.php');
$emp_name='';
//$empid='';
$email='';
$designation='';
$department='';
$joiningdate='';
$address='';
$mobile='';
$emergency='';
$employmentstatus='';

if(isset($_POST['submit']))
{
$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);



if (isset($name)) {

$path= 'uploads/';

if (!empty($name)){
if (move_uploaded_file($tmp_name,$path.$name)) {
echo 'Uploaded!';

}
}
}
//$conn = new mysqli("localhost","root","","conferemployee");
$conn2 = new mysqli("localhost","root","","conferemployee");
//$conn3 = new mysqli("localhost","root","","conferemployee");

	if(isset($_POST['manager']))
	{
		$c_person ="NO Concerned Person";
		$manager =1;
	}
	else
	{
	$c_person = addslashes($_POST['c_person']);
	$manager =0;
	}
    $emp_name = addslashes($_POST['emp_name']);
	$joiningdate = addslashes($_POST['doj']);
	$mobile = addslashes($_POST['mob_no']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $password=md5($password);
    $designation = addslashes($_POST['designation']);
	$department = addslashes($_POST['department']);
	$dob=addslashes($_POST['dob']);
	//$dob=date("Y-m-d",$dob);
	$doj=addslashes($_POST['doj']);
	//$doj=date("Y-m-d",$doj);
	$address = addslashes($_POST['address']);
	$gender= addslashes($_POST['gender']);
	$bloodgroup=addslashes($_POST['bloodgroup']);
	$dt= date("Y-m-d");
	$employmentstatus = addslashes($_POST['empsts']);
	$location = addslashes($_POST['location']);
	
//	echo"INSERT INTO employee (emp_name,email,password,designation,department,status,create_date,update_date) VALUES ('".$emp_name."','".$email."','".$password."','".$designation."',".$department.",'".$employmentstatus."','".$dt."','".$dt."')";
	//exit;
	
	$sql="INSERT INTO employee (emp_name,email,password,designation,department,status,create_date,update_date,manager,concerned_person) VALUES ('".$emp_name."','".$email."','".$password."','".$designation."','".$department."','".$employmentstatus."','".$dt."','".$dt."','".$manager."','".$c_person."')";
	
		
	mysqli_query($conn2,$sql);
		//generating employee id 
	
	$last_id = $conn2->insert_id;
	$dept_res=mysqli_query($conn2,"Select dept_name from department where dept_id=' ".$department."'");
	
	
	$row=mysqli_fetch_array($dept_res);
	$dept=$row['dept_name'];
	
	$dept.=$last_id;
	
	$sql3="UPDATE employee SET emp_id = '".$dept."' WHERE id='".$last_id."'";
	mysqli_query($conn2,$sql3);
	//echo "INSERT INTO emp_dertails(dob,doj,address,gender,blood_group,mobile) VALUES ('".$dob."','".$doj."','".$address."','".$gender."','".$bloodgroup."','".$mobile."')";
	//exit;
	$sql2="INSERT INTO emp_dertails(dob,doj,address,gender,blood_group,mobile) VALUES ('".$dob."','".$doj."','".$address."','".$gender."','".$bloodgroup."','".$mobile."')";
	mysqli_query($conn2,$sql2);

	
	
	
	
	$sql3 = "INSERT INTO employee_details(emp_name,gender,blood_group,mobile,email,password,date_of_birth,date_of_joining,designation,department,location,address,employment_status,files) VALUES ('".$emp_name."','".$gender."','".$bloodgroup."','".$mobile."','".$email."','".$password."','".$doj."','".$joiningdate."','".$designation."','".$department."','".$location."','".$address."','".$employmentstatus."','".$path.$name."')";
    mysqli_query($conn2,$sql3);
	//echo $sql3;
	$_SESSION['success']='User created successfully.'; 
	
$emp_name='';
//$empid='';
$email='';
$designation='';
$department='';
$joiningdate='';
$address='';
$mobile='';
$emergency='';
$employmentstatus='';

 }   
 //to get list of all department 
 $department_query=mysqli_query($conn,"SELECT * from department");
 
 //to get list of all designation
 
 $designation_query=mysqli_query($conn,"SELECT * from dept_designation");
 $concerned_Person_query=mysqli_query($conn,"SELECT * FROM employee WHERE manager=1");
 

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
                <li class="breadcrumb-item"><a href="home.php">Home</a><i class="fa fa-angle-right"></i>Forms <i class="fa fa-angle-right"></i> Input</li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 		
<!----->

<!---->

<!---->



<!---->
  <div class="grid-form1">
  	       <h3>Employee Registration Form</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post" name="employee_form" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Employee Name:</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="emp_name" id="emp_name" placeholder="Full Name">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="employementstatus" class="col-sm-2 control-label">Gender</label>
									<div class="col-sm-8"><select name="gender" id="emp_gender" class="form-control1">
										<option value=" ">select</option>
										
										<option value="F">Female</option>
										<option value="M">Male</option>
										<option value="O">Other</option>
										
										
									</select></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Blood Group</label>
									<div class="col-sm-8"><select name="bloodgroup" id="bloodgroup" class="form-control1">
										<option value=" ">select</option>
										
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										
										
										
									</select></div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No:</label>
									<div class="col-sm-8">
										<input type="number" class="form-control1" name="mob_no" id="mob_no" onkeyup="numcheck()" placeholder="XXXXXXXXXX" min="0" >
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email:</label>
									<div class="col-sm-8">
										<input type="email" class="form-control1" name="email" id="email"  placeholder="someone@company"  >
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Password:</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" name="password" id="password"  placeholder="password"  >
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date of Birth:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="dob" id="dob" placeholder="DD-MM-YYYY">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Date of Joining:</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="doj" id="doj" placeholder="DD-MM-YYYY">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
						<div class="form-group">
							<label for="department" class="col-sm-2 control-label" >Department</label>
			                <div class="col-sm-8">
							<select name="department" id="department" class="form-control1" onchange="getdesignation(this.value)">
									<option value="0">Select a Department</option>
							<?php while($row = mysqli_fetch_array($department_query))
								{   	
							?>
								<option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<!-- End of department-->
					
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Designation</label>
									<div class="col-sm-8">
							<select name="designation" id="designation" class="form-control1">
								<span id="desgdiv">
								</span>
							</select>
									</div>
								</div>
								
								
								
								
							
					
								
								
								<div class="form-group">
									<label for="joinindate" class="col-sm-2 control-label">Location</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="location" id="location" placeholder="City/Town/Village">
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								
								
								
								<div class="form-group">
									<label for="address" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8"><textarea name="address" id="address" cols="70" rows="6" class="form-control1"></textarea></div>
								</div>
								
								<div class="clearfix"> </div>
											<div class="col-md-12 form-group">
											
											<div class="checkbox1">
											<label class="col-sm-2 control-label">Managing Power 
											</label>
											<input type="checkbox" name="manager" id="manager" value="1" onclick="statusCkbox()" ng-model="model.winner"  class="ng-invalid ng-invalid-required">
												
										</div>
										</div>
										<div class="clearfix"> </div>
										<div class="form-group">
											<label for="department" class="col-sm-2 control-label" >Concerned Person</label>
											<div class="col-sm-8">
												<select name="c_person" id="c_person" class="form-control1">
													<option value="">Concerned Person</option>
													<?php while($row = mysqli_fetch_array($concerned_Person_query))
														{   	
													?>
													<option value="<?php echo $row['emp_id']; ?>"><?php echo $row['emp_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
								
								
								<div class="form-group">
									<label for="employementstatus" class="col-sm-2 control-label">Employement Status</label>
									<div class="col-sm-8"><select name="empsts" id="empsts" class="form-control1">
										<option value="Full Time">Full Time</option>
										<option value="Part Time">Part Time</option>
										
										
									</select></div>
								</div>
								<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<input type="file" name="file"><br>
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


<script>
//script to get the designation of the selected department 
function getdesignation(deptid)
{
	 if (deptid == 0) 
	{
		var optn = document.createElement("OPTION");
		optn.text = "Select Designation";
		optn.value = "0";
		document.employee_form.designation.options.add(optn);
	}
	else
	{
		var xhttp = new XMLHttpRequest();
	  
		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) 
		{
			var ary = JSON.parse(this.responseText);
			//deleting the pervious data 
			for(j=document.employee_form.designation.options.length-1;j>=0;j--)
				{
					document.employee_form.designation.remove(j);
				}
				
			for (i=0;i<ary.data.length;i++)
				{
					
					var optn = document.createElement("OPTION");
					optn.text = ""+ary.data[i].optiontxt;
					optn.value =""+ ary.data[i].optionval;
					document.employee_form.designation.options.add(optn);

				} 	
				
			
		}
		};	
		xhttp.open("GET", "designationrequest.php?q="+deptid, true);
		xhttp.send();
	
	}
  
}


</script>
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

</body>
</html>