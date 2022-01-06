// JavaScript Document
	var http=false;
	http=new XMLHttpRequest();
	
	// ======================Retrieve Customer details in Sales_Item===============================================
	function getQuestionNo(cid)
	{
		http.open("GET","cust.php?cname="+cname,true);
		http.onreadystatechange=function()
		{
			if(http.readyState==4 && http.status==200 )
			{
				document.getElementById("msg1").value=http.responseText;
				
			}
		}
		http.send(null);
	}
	