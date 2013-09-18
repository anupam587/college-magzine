<?php
include ('../../include/dbconnect.php');
function ajax()
{
	if(isset($_POST['email']))
	{
		if(empty($_POST['email']))
		{
			echo 'empty';
		}
	   elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	    {
		    $query=mysql_query("select * from users where email=\"".$_POST['email']."\"");
			if(mysql_num_rows($query)>=1)
			{
				echo 'error';
			}
			else
	  		 echo 'ok';
	    }
	  else
	    {
	    echo 'invalid';
	    }

	   
	}
}

if(isset($_POST['email'])&&$_POST['func']=='ajax')
{
	ajax();
}
?>
