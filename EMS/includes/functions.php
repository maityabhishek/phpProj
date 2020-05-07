<?php

$basename=basename($_SERVER['PHP_SELF']); 

if(trim($basename)!=''){ 
    $basename=str_replace('.php','', $basename);
	
}
/*
if(($basename!='login' ) && isset($_SESSION['suser']['name']) && trim($_SESSION['suser']['name'])!='')
{

  $query = mysqli_query($conn,"Select * from employee")
  $row = mysqli_fetch_array($query);
  $numrows1 = mysqli_num_rows($row);
  if($numrows1 == 0)
  {
  	$_SESSION = array();
	unset($_SESSION['suser']);
	$_SESSION['error']='Session expires. Kindly login again.';
	
    header("location:".WEB_ROOT."/login");
    exit();
  }	
}
*/
if($basename!='login' && $basename!='signup' && $basename!='index' && $basename==''){
	
	header("location:".WEB_ROOT."/login");
    exit();
}
$permAdd = "Y";
$permView = "Y";
$permEdit = "Y";
$permDelete = "Y";
$uid='';

		
if(isset($_SESSION['suser']['id']) && trim($_SESSION['suser']['id'])!=''){
	$uid=$_SESSION['suser']['id'];
	$rid = $_SESSION['suser']['roleId'];
	 //$utypeid = $_SESSION['suser']['userTypeId'];
	
	
	//print_r($_SESSION['suser']);
	$permArr=array();
	if($_SESSION['suser']['roleId'] == 5) {
		
		$query="select lableId as mname from module ";
		$result=mysqli_query($conn,$query);
	 
	 
	 while($row=mysqli_fetch_assoc($result))
	 {
		
	 	$permArr[$row['mname']]=array('view'=>'N','add'=>'N','edit'=>'N','delete'=>'N');
		
		//print_r($permArr);
		
		 //$moduleId = $row['moduleId'];
		 //echo $moduleId;
		
		
	 }
	} else {
		//echo "SELECT rm.*,r.name as role,r.id as rid,u.status,m.lableId as mname FROM `user` as u  LEFT JOIN userroles as ur on u.id in(ur.userId) LEFT JOIN role as r on ur.roleid=r.id 
          // LEFT JOIN rolemodules as rm on r.id in(rm.roleId) left join module as m on rm.moduleId=m.id where u.id= $uid group by rm.id";
		   //exit();
	
           $query="SELECT rm.*,r.name as role,r.id as rid,u.status,m.lableId as mname FROM `user` as u  LEFT JOIN userroles as ur on u.id in(ur.userId) 
			LEFT JOIN role as r on ur.roleid in(r.id )
           LEFT JOIN rolemodules as rm on r.id in(rm.roleId) left join module as m on rm.moduleId=m.id where u.id= $uid  group by rm.id";
		   //exit();
		   
     $result=mysqli_query($conn,$query);
	 
	 
	 while($row=mysqli_fetch_assoc($result))
	 {
		
		$view=$row['view'];
		$add=$row['add'];
		$edit=$row['edit'];
		$delete=$row['delete'];
		if( $view=='N'){ $view='N'; }elseif(isset($permArr[$row['mname']]['view']) && $permArr[$row['mname']]['view']=='N' && $view=='Y'){ $view='N'; }else{	$view=='Y';	}
		if( $add=='N'){ $add='N'; }elseif(isset($permArr[$row['mname']]['add']) && $permArr[$row['mname']]['add']=='N' && $add=='Y'){ $add='N'; }else{	$add='N';	}
		if( $edit=='N'){ $edit='N'; }elseif(isset($permArr[$row['mname']]['edit']) && $permArr[$row['mname']]['edit']=='N' && $edit=='Y'){ $edit='N'; }else{	$edit='Y';	}
		if( $delete=='N'){ $delete='N'; }elseif(isset($permArr[$row['mname']]['delete']) && $permArr[$row['mname']]['delete']=='N' && $delete=='Y'){ $delete='N'; }else{ $delete='Y'; }
	 	 $permArr[$row['mname']]=array('view'=>$view,'add'=>$add,'edit'=>$edit,'delete'=>$delete);
		// $moduleId = $row['moduleId'];
		 //echo $moduleId;
		//exit();
		//exit();
	 }
	 
	}
	
	/*echo "<pre>";
	print_r($permArr);*/
	//exit;
	 if(isset($_REQUEST['mod']) && trim($_REQUEST['mod'])!=''){
	 $_REQUEST['mod'];
    	
	 
	  $moduleId=$_REQUEST['mod'];
	 
	 //($permArr[$moduleId]);
	      $permAdd = $permArr[$moduleId]['add'];
		 
		 $permView = $permArr[$moduleId]['view'];
		 $permEdit = $permArr[$moduleId]['edit'];
		 $permDelete = $permArr[$moduleId]['delete'];
		 //exit();
	 }
		
	
	
	// print_r($permArr);
	//exit();
	 
	 /*
	 $pageArr=array();
	 $pageArr[1]=array('users','add-users','edit-users','roles','add-roles','edit-roles','markets','add-markets','edit-markets','channels','add-channels','edit-channels',
	                    'applications','add-applications','edit-applications');
	$arrIndex=0;
	foreach ($pageArr as $key => $item) {
	  if(in_array($basename, $item)){
		$arrIndex=$key;
		
	  	break;
	  }
	}	
	*/
	
}


$modulename='';
$moduleid='';
if(isset($_GET['module']) && trim($_GET['module'])!=''){
  $modulename=$_GET['module'];
  
  if(isset($_GET['id']) && trim($_GET['id'])!=''){
    $moduleid=$_GET['id'];
  }
}
$token='';
if(isset($_SESSION['suser']['token']) && trim($_SESSION['suser']['token'])!=''){
	$token=$_SESSION['suser']['token'];
}


#upload image for home page flash
function imageUpload($inputName, $uploadDir,$url='')
{
	$image     = $_FILES[$inputName];
	$file_name = '';
	
	// if a file is given
	// get the image extension
	$ext = substr(strrchr($image['name'], "."), 1); 
	
	// generate a random new file name to avoid name conflict
	
	
	// check the image width. if it exceed the maximum
	// width we must resize it
	$size = getimagesize($image['tmp_name']);
	if($ext!='')
	{
		$file_name = md5(rand() * time()) . ".$ext";
			move_uploaded_file($image['tmp_name'],$uploadDir.$file_name);
			chmod($uploadDir.$file_name,0644);
			
	}
	else{
		$file_name='';
	}
return $file_name;
}
function userage($dob)
{
	$dob_arr = explode('-',$dob);
	$ageTime = mktime(0, 0, 0, $dob_arr[1], $dob_arr[2], $dob_arr[0]); // Get the person's birthday timestamp
	$t = time(); // Store current time for consistency
	$age = ($ageTime < 0) ? ( $t + ($ageTime * -1) ) : $t - $ageTime;
	$year = 60 * 60 * 24 * 365;
	$ageYears = $age / $year;
	$agetoret = floor($ageYears).' Years';
	return $agetoret;
}


function getPagingQuery($sql, $itemPerPage = 10)
{
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}
	
	// start fetching from this row number
	$offset = ($page - 1) * $itemPerPage;
	
	return $sql . " LIMIT $offset, $itemPerPage";
}

/*
	Get the links to navigate between one result page to another.
	Supply a value for $strGet if the page url already contain some
	GET values for example if the original page url is like this :
	
	http://www.phpwebcommerce.com/plaincart/index.php?c=12
	
	use "c=12" as the value for $strGet. But if the url is like this :
	
	http://www.phpwebcommerce.com/plaincart/index.php
	
	then there's no need to set a value for $strGet
	
	
*/

function getPagingLink($conn,$sql, $itemPerPage = 10, $strGet = '')
{
	$result        = mysqli_query($conn,$sql);
	$pagingLink    = '';
	$totalResults  = mysqli_num_rows($result);
	$totalPages    = ceil($totalResults / $itemPerPage);
	// how many link pages to show
	$numLinks      = 10;

		
	// create the paging links only if we have more than one page of results
	
	if ($totalPages > 1) {
	
		$self = WEB_ROOT;//'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}

		$mod='';
		if (isset($_GET['mod']) && trim($_GET['mod'])!='') {
			$mod = "/".$_GET['mod'];
		}
		$self=$self.$mod;

		// print 'previous' link only if we're not
		// on page one
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				if($strGet != "")
				{
					$prev = "<li><a href=\"$self/$page&$strGet/\">&laquo; Prevss</a></li>";
				}
				else
				{
					$prev = "<li><a href=\"$self/$page\">&laquo; Prev</a></li>";
				}
			} else {
				if($strGet != "")
				{
					$prev = "<li><a href=\"$self$strGet\"  >&laquo; Prev</a></li>";
				}
				else
				{
					$prev = "<li><a href=\"$self/$page\"  >&laquo; Prev</a></li>";
				}
			}	
			if($strGet != "")
			{	
				$first = "<li><a href=\"$self$strGet\" >First</a></li>";
			}
			else
			{
				$first = "<li><a href=\"$self\" >First</a></li>";
			}
		} else {
			$prev  = '<li><a class="disabled" >&laquo; Prev</a></li>'; // we're on page one, don't show 'previous' link
			$first = ''; // nor 'first page' link
		}
	
		// print 'next' link only if we're not
		// on the last page
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			if($strGet != "")
			{
				$next = "<li><a href=\"$self/$page&$strGet\" class=\"prevnext\">Next &raquo;</a></li>";
				$last = "<li><a href=\"$self/$totalPages&$strGet\">Last</a></li>";
			}
			else
			{
				$next = "<li><a href=\"$self/$page\" class=\"prevnext\">Next &raquo;</a></li>";
				$last = "<li><a href=\"$self/$totalPages\">Last</a></li>";
			}
		} else {
			$next = '<li><a class="disabled" > Next &raquo;</a></li>'; // we're on the last page, don't show 'next' link
			$last = ''; // nor 'last page' link
		}

		$start = $pageNumber - ($pageNumber % $numLinks) + 1;
		$end   = $start + $numLinks - 1;		
		
		$end   = min($totalPages, $end);
		
		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
				$pagingLink[] = "<li class=\"active\"><a href=\"#\"> $page </a></li>";   // no need to create a link to current page
			} else {
				if ($page == 1) {
					if($strGet != "")
					{
						$pagingLink[] = "<li><a href=\"$self$strGet\"> $page </a></li>";
					}
					else
					{
						$pagingLink[] = "<li><a href=\"$self\"> $page </a></li>";
					}
				} else {	
					if($strGet != "")
					{
						$pagingLink[] = "<li><a href=\"$self/$page&$strGet\"> $page </a></li>";
					}
					else
					{
						$pagingLink[] = "<li><a href=\"$self/$page\"> $page </a></li>";
					}
				}	
			}
			
			$moresing=($totalPages!=$page) ? '. . . .  '.'<li class="active"><a href=\"#\" >'.$totalPages.'</span></li>' : '';
		}
		
		$pagingLink = implode('', $pagingLink);
		// return the page navigation link
		$pagingLink = $prev .$pagingLink .$moresing. $next;
	}
		
	return $pagingLink;
}


function getStylePagingLink($sql, $itemPerPage = 10, $strGet = '')
{
	$result        = mysqli_query($conn,$sql);
	$pagingLink    = '';
	$totalResults  = mysqli_num_rows($result);
	$totalPages    = ceil($totalResults / $itemPerPage);
	
	// how many link pages to show
	$numLinks      = 10;

		
	// create the paging links only if we have more than one page of results
	
	if ($totalPages > 0) {
	
		$self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
		
		$self = str_replace("/index.php","",$self);
		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}
		
		// print 'previous' link only if we're not
		// on page one
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				if($strGet != "")
				{
					$prev = "<a href=\"$self/$strGet/page/$page\"  class=\"nextprev\">&laquo; Previous</a>";
				}
				else
				{
					$prev = "<a href=\"$self/page/$page\"  class=\"nextprev\">&laquo; Previous</a>";
				}
			} else {
				if($strGet != "")
				{
					$prev = "<a href=\"$self/$strGet\"  class=\"nextprev\">&laquo; Previous</a>";
				}
				else
				{
					$prev = "<a href=\"$self\"  class=\"nextprev\">&laquo; Previous</a>";
				}
			}	
			if($strGet != "")
			{	
				$first = "<a href=\"$self\" >First</a>";
			}
		} else {
			$prev  = '<span class="nextprev">&laquo; Previous</span>'; // we're on page one, don't show 'previous' link
			$first = ''; // nor 'first page' link
		}
	
		// print 'next' link only if we're not
		// on the last page
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			if($strGet != "")
			{
				$next = "<a href=\"$self/$strGet/page/$page\"  class=\"nextprev\">next &raquo;</a>";
				$last = "<a href=\"$self/$strGet/page/$totalPages\"  class=\"nextprev\">Last</a>";
			}
			else
			{
				$next = "<a href=\"$self/page/$page\"  class=\"nextprev\">next &raquo;</a>";
				$last = "<a href=\"$self/page/$totalPages\"  class=\"nextprev\">Last</a>";
			}
		} else {
			$next = '<span  class="nextprev"> next &raquo;</span>'; // we're on the last page, don't show 'next' link
			$last = ''; // nor 'last page' link
		}

		$start = $pageNumber - ($pageNumber % $numLinks) + 1;
		$end   = $start + $numLinks - 1;		
		
		$end   = min($totalPages, $end);
		
		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
				$pagingLink[] = "<span class=\"current\"> $page </span>";   // no need to create a link to current page
			} else {
				if ($page == 1) {
					if($strGet != "")
					{
						$pagingLink[] = "<a href=\"$self/$strGet\"> $page </a>";
					}
					else
					{
						$pagingLink[] = "<a href=\"$self\"> $page </a>";
					}
				} else {	
					if($strGet != "")
					{
						$pagingLink[] = "<a href=\"$self/$strGet/page/$page\"> $page </a>";
					}
					else
					{
						$pagingLink[] = "<a href=\"$self/page/$page\"> $page </a>";
					}
				}	
			}
			
			$moresing=($totalPages!=$page) ? '. . . .  '.'<span class="active_tnt_link">'.$totalPages.'</span>' : '';
		}
		
		$pagingLink = implode('', $pagingLink);
		// return the page navigation link
		$pagingLink = $prev .$pagingLink .$moresing. $next;
	}
		
	return $pagingLink;
}

/* Works out the time since the entry post, takes a an argument in unix time (seconds) */
function time_since($original) {
    // array of time period chunks
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
    );
    
    $today = time(); /* Current unix time  */
    $since = $today - $original;
    
    // $j saves performing the count function each time around the loop
    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        
        // finding the biggest chunk (if the chunk fits, break)
        if (($count = floor($since / $seconds)) != 0) {
            // DEBUG print "<!-- It's $name -->\n";
            break;
        }
    }
    
    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    
    if ($i + 1 < $j) {
        // now getting the second item
        $seconds2 = $chunks[$i + 1][0];
        $name2 = $chunks[$i + 1][1];
        
        // add second item if it's greater than 0
        if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
            $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        }
    }
    return $print;
}



/** 
 * xml2array() will convert the given XML text to an array in the XML structure. 
 * Link: http://www.bin-co.com/php/scripts/xml2array/ 
 * Arguments : $contents - The XML text 
 *                $get_attributes - 1 or 0. If this is 1 the function will get the attributes as well as the tag values - this results in a different array structure in the return value.
 *                $priority - Can be 'tag' or 'attribute'. This will change the way the resulting array sturcture. For 'tag', the tags are given more importance.
 * Return: The parsed XML in an array form. Use print_r() to see the resulting array structure. 
 * Examples: $array =  xml2array(file_get_contents('feed.xml')); 
 *              $array =  xml2array(file_get_contents('feed.xml', 1, 'attribute')); 
 */ 
function xml2array($contents, $get_attributes=1, $priority = 'tag') { 
    if(!$contents) return array(); 

    if(!function_exists('xml_parser_create')) { 
        //print "'xml_parser_create()' function not found!"; 
        return array(); 
    } 

    //Get the XML parser of PHP - PHP must have this module for the parser to work 
    $parser = xml_parser_create(''); 
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss 
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0); 
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1); 
    xml_parse_into_struct($parser, trim($contents), $xml_values); 
    xml_parser_free($parser); 

    if(!$xml_values) return;//Hmm... 

    //Initializations 
    $xml_array = array(); 
    $parents = array(); 
    $opened_tags = array(); 
    $arr = array(); 

    $current = &$xml_array; //Refference 

    //Go through the tags. 
    $repeated_tag_index = array();//Multiple tags with same name will be turned into an array 
    foreach($xml_values as $data) { 
        unset($attributes,$value);//Remove existing values, or there will be trouble 

        //This command will extract these variables into the foreach scope 
        // tag(string), type(string), level(int), attributes(array). 
        extract($data);//We could use the array by itself, but this cooler. 

        $result = array(); 
        $attributes_data = array(); 
         
        if(isset($value)) { 
            if($priority == 'tag') $result = $value; 
            else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
        } 

        //Set the attributes too. 
        if(isset($attributes) and $get_attributes) { 
            foreach($attributes as $attr => $val) { 
                if($priority == 'tag') $attributes_data[$attr] = $val; 
                else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr' 
            } 
        } 

        //See tag status and do the needed. 
        if($type == "open") {//The starting of the tag '<tag>' 
            $parent[$level-1] = &$current; 
            if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag 
                $current[$tag] = $result; 
                if($attributes_data) $current[$tag. '_attr'] = $attributes_data; 
                $repeated_tag_index[$tag.'_'.$level] = 1; 

                $current = &$current[$tag]; 

            } else { //There was another element with the same tag name 

                if(isset($current[$tag][0])) {//If there is a 0th element it is already an array 
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result; 
                    $repeated_tag_index[$tag.'_'.$level]++; 
                } else {//This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag.'_'.$level] = 2; 
                     
                    if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag.'_attr']; 
                        unset($current[$tag.'_attr']); 
                    } 

                } 
                $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1; 
                $current = &$current[$tag][$last_item_index]; 
            } 

        } elseif($type == "complete") { //Tags that ends in 1 line '<tag />' 
            //See if the key is already taken. 
            if(!isset($current[$tag])) { //New Key 
                $current[$tag] = $result; 
                $repeated_tag_index[$tag.'_'.$level] = 1; 
                if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data; 

            } else { //If taken, put all things inside a list(array) 
                if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array... 

                    // ...push the new element into that array. 
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result; 
                     
                    if($priority == 'tag' and $get_attributes and $attributes_data) { 
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data; 
                    } 
                    $repeated_tag_index[$tag.'_'.$level]++; 

                } else { //If it is not an array... 
                    $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag.'_'.$level] = 1; 
                    if($priority == 'tag' and $get_attributes) { 
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                             
                            $current[$tag]['0_attr'] = $current[$tag.'_attr']; 
                            unset($current[$tag.'_attr']); 
                        } 
                         
                        if($attributes_data) { 
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                        } 
                    } 
                    $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken 
                } 
            } 

        } elseif($type == 'close') { //End of tag '</tag>' 
            $current = &$parent[$level-1]; 
        } 
    } 
     
    return($xml_array); 
}  

function tep_string_convert($string,$type)
{
	if(is_string($string))
	{
		if($type=='base64')
		{
			return base64_decode($string);
		}
		if($type=='url'){
			return urldecode($string);
		}
	}
	
}

function tep_rand($min = null, $max = null) {
    static $seeded;

    if (!isset($seeded)) {
      mt_srand((double)microtime()*1000000);
      $seeded = true;
    }

    if (isset($min) && isset($max)) {
      if ($min >= $max) {
        return $min;
      } else {
        return mt_rand($min, $max);
      }
    } else {
      return mt_rand();
    }
  }

   function tep_create_random_value($length, $type = 'mixed') {
    if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) return false;

    $rand_value = '';
    while (strlen($rand_value) < $length) {
      if ($type == 'digits') {
        $char = tep_rand(0,9);
      } else {
        $char = chr(tep_rand(0,255));
      }
      if ($type == 'mixed') {
        if (preg_match('/^[a-z0-9]$/', $char)) $rand_value .= $char;
      } elseif ($type == 'chars') {
        if (preg_match('/^[a-z]$/', $char)) $rand_value .= $char;
      } elseif ($type == 'digits') {
        if (preg_match('/^[0-9]$/', $char)) $rand_value .= $char;
      }
    }

    return $rand_value;
  }


  #admin details here
function adminDetails()
{
	 $query="SELECT * FROM administrators where id  = '1'";
	 $result=mysqli_query($conn,$query);
	 $row	=mysqli_fetch_assoc($result);	
	 define("ADMIN_MAIL",$row['email']);
	 define("ADMIN_LOGIN_DATE",$row['login_date']);
	 define("ADMIN_UNSUCCESS_DATE",$row['un_date']);
	 define("ADMIN_IP_ADDRESS",$row['login_ip']);
	 //define("ADMIN_UNSUCCESS_IP",$row['un_ipaddress']);
	 //define("USER_TYPE",$row['user_type']);
	 //define("PHONE",$row['phone']);
	 define("FACEBOOK_LINK",$row['facebook_link']);
	 define("TWITTER_LINK",$row['twitter_link']);
	 define("LINKEDIN_LINK",$row['linkedin_link']);
	 define("YOUTUBE_LINK",$row['youtube_link']);
	 define("GOOGLEPLUS_LINK",$row['googleplus_link']);
	 define("HOME_META_TITLE",$row['home_meta_title']);
	 define("HOME_META_DESC",$row['home_meta_desc']);
	 define("HOME_META_KEYWORD",$row['home_meta_keyword']);
	 //define("HOME_VIDEO",$row['home_video']);
	 //define("PAYPAL_ACCOUNT",$row['paypal_account']);
	 //define("PAYPAL_LIVE_FLAG",$row['paypal_live_flag']);
	 
}
function getPagingLink11($sql, $itemPerPage = 10, $strGet = '')
{
	$result        = mysqli_query($conn,$sql);
	$pagingLink    = '';
	$totalResults  = mysqli_num_rows($result);
	$totalPages    = ceil($totalResults / $itemPerPage);
	
	// how many link pages to show
	$numLinks      = 10;

		
	// create the paging links only if we have more than one page of results
	
	if ($totalPages > 1) {
	
		$self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;
		

		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}
		
		// print 'previous' link only if we're not
		// on page one
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				if($strGet != "")
				{
					$prev = "<a href=\"$self/$page&$strGet/\"><li class='prev'><i class='l-arrow'></i></li></a>";
				}
				else
				{
					$prev = "<a href=\"$self/$page/\"><li class='prev'><i class='l-arrow'></i></li></a>";
				}
			} else {
				if($strGet != "")
				{
					$prev = "<a href=\"$self$strGet\"  ><li class='prev'><i class='l-arrow'></i></li></a>";
				}
				else
				{
					$prev = "<a href=\"$self\"  ><li class='prev'><i class='l-arrow'></i></li></a>";
				}
			}	
			if($strGet != "")
			{	
				$first = "<a href=\"$self$strGet\" ><li class='prev'>First</li></a>";
			}
			else
			{
				$first = "<a href=\"$self\" >First</a>";
			}
		} else {
			$prev  = '<li class="prev"><i class="l-arrow"></i></li>'; // we're on page one, don't show 'previous' link
			$first = ''; // nor 'first page' link
		}
	
		// print 'next' link only if we're not
		// on the last page
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			if($strGet != "")
			{
				$next = "<a href=\"$self/$page&$strGet\" class=\"\"><li class='next'><i class='r-arrow'></i></li></a>";
				$last = "<a href=\"$self/$totalPages&$strGet\"><li class='next'><i class='r-arrow'></i></li></a>";
			}
			else
			{
				$next = "<a href=\"$self/$page\" class=\"\"><li class='next'><i class='r-arrow'></i></li></a>";
				$last = "<a href=\"$self/$totalPages\"><li class='next'><i class='r-arrow'></i></li></a>";
			}
		} else {
			$next = '<li class="next"><i class="r-arrow"></i></li>'; // we're on the last page, don't show 'next' link
			$last = ''; // nor 'last page' link
		}

		$start = $pageNumber - ($pageNumber % $numLinks) + 1;
		$end   = $start + $numLinks - 1;		
		
		$end   = min($totalPages, $end);
		
		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
				$pagingLink[] = "<li class=\"active_tnt_link\"> $page </li>";   // no need to create a link to current page
			} else {
				if ($page == 1) {
					if($strGet != "")
					{
						$pagingLink[] = "<a href=\"$self$strGet\"><li> $page </li></a>";
					}
					else
					{
						$pagingLink[] = "<a href=\"$self\"><li> $page </li></a>";
					}
				} else {	
					if($strGet != "")
					{
						$pagingLink[] = "<a href=\"$self/$page&$strGet\"><li> $page </li></a>";
					}
					else
					{
						$pagingLink[] = "<a href=\"$self/$page\"><li> $page </li></a>";
					}
				}	
			}
			
			$moresing=($totalPages!=$page) ? '. . . .  '.'<span class="active_tnt_link">'.$totalPages.'</span>' : '';
		}
		
		$pagingLink = implode('', $pagingLink);
		// return the page navigation link
		$pagingLink = $prev .$pagingLink .$moresing. $next;
	}
		
	return $pagingLink;
}
function resize($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = 'project/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function resizeone($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image1']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image1']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = 'service/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image1']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image1']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function resizetwo($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image2']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image2']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = 'service/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image2']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image2']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function resizethree($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = 'admin/patient/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function resizeFour($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = 'physician/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function resizeBlog($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = 'blogimages/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function resizenews($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = 'newsimg/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}
function resizeUsers($width, $height){
	/* Get original image x y*/
	list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
	/* calculate new image size with ratio */
	$ratio = max($width/$w, $height/$h);
	$h = ceil($height / $ratio);
	$x = ($w - $width / $ratio) / 2;
	$w = ceil($width / $ratio);
	/* new file name */
	$file_name = md5(rand() * time());
	$bbb=$_FILES['image']['name'];
	$aaa=str_replace(" ","",$bbb);
	$path = '../../images/usersimg/'.$file_name.'_'.$aaa;
	/* read binary data from image file */
	$imgString = file_get_contents($_FILES['image']['tmp_name']);
	/* create image from string */
	$image = imagecreatefromstring($imgString);
	$tmp = imagecreatetruecolor($width, $height);
	imagecopyresampled($tmp, $image,
  	0, 0,
  	$x, 0,
  	$width, $height,
  	$w, $h);
	/* Save image */
	switch ($_FILES['image']['type']) {
		case 'image/jpeg':
			imagejpeg($tmp, $path, 100);
			break;
		case 'image/png':
			imagepng($tmp, $path, 0);
			break;
		case 'image/gif':
			imagegif($tmp, $path);
			break;
		default:
			exit;
			break;
	}
	return $path;
	/* cleanup memory */
	imagedestroy($image);
	imagedestroy($tmp);
}

function otp(){
   $string = '0123456789';
   $string_shuffled = str_shuffle($string);
   $otp_pass = substr($string_shuffled, 1, 4);
   return $otp_pass;
}

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
	curl_close($curl);
    return $result;
}
?>
