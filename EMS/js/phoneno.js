


function numcheck()
{
	var phoneno = document.getElementById("userNo").value;
	var lastno= phoneno.charCodeAt(phoneno.length-1);
	var phoneno1=phoneno.substring(0,phoneno.length-1);
	var flg=true;
		
		if((phoneno.length == 1) && (lastno == 43))
			{
				flg=false;
			}	
	
	if((lastno<48 || lastno>57) && flg )
		{
			document.getElementById("userNo").value=phoneno1;	
		}		
	

}

