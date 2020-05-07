<?php
 if(isset($_REQUEST["q"]))
 {
	 
	 $deptid=$_REQUEST["q"];
	 $conn = mysqli_connect("localhost","root","","conferemployee");
	 $query="select * from dept_designation where dept_id='".$deptid."'";
	 $result = mysqli_query($conn,$query);
	  
	  $response='{"data":[{"optiontxt":"Select Desigantion","optionval":""}';
	  
	  if(mysqli_num_rows($result) > 0)  
      {
		 
		 while($row = mysqli_fetch_array($result))  
		 {
			 $response.=',{"optiontxt":"'.$row['designation'].'","optionval":"'.$row['id'].'"}';
			
			// $response.="ID =".$row['id']." Desigantion name =".$row['designation'];
		 }
		  
	  }
	  else
	  {
		  $response.="<option value=''> No Records Found</option>";
	  }
	  
	  $response.="]}";
	  echo $response;
	  
	 
 }
 







?>
