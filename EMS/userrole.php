<?php

include("config.php");
$permission_ary=array();


$basename=basename($_SERVER['PHP_SELF']);
if(trim($basename)!='')
{
    $basename=str_replace('.php','', $basename);

}

if(isset($_SESSION['login_user']['id']) && trim($_SESSION['login_user']['id'])!='')
{

	//$uid=$_SESSION['login_user']['emp_id'];
	$des_id=$_SESSION['login_user']['deisgnation_id'];

	$qry="select m.module_name,p.* FROM permission as p INNER JOIN module as m ON p.module_id=m.module_id where p.designation_id='".$des_id."'";
	$result=mysqli_query($conn,$qry);
	
	while($row=mysqli_fetch_assoc($result))
	{
		
		$permission_ary[$row['module_name']]['view']=$row['p_view'];
		$permission_ary[$row['module_name']]['edit']=$row['p_edit'];
		$permission_ary[$row['module_name']]['add']=$row['p_add'];
		$permission_ary[$row['module_name']]['delete']=$row['p_delete'];
		$permission_ary[$row['module_name']]['module_id']=$row['module_id'];
		
		
	}
	
	
	$p_view=$permission_ary[$basename]['view'];
	$p_edit=$permission_ary[$row['module_name']]['edit'];
	$p_add=$permission_ary[$row['module_name']]['add'];
	$p_delete=$permission_ary[$row['module_name']]['delete'];
	
}
		

?>
