<?php
session_start();
include '../../include/dbconnect.php';
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password'])  && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['branch']) && isset($_POST['year']) && isset($_POST['mobile']))
		           {
						$fname = htmlspecialchars($_POST['firstname']);
						$lname = htmlspecialchars($_POST['lastname']);
						$password = htmlspecialchars($_POST['password']);
						$password_hash=md5($password);
						$email = htmlspecialchars($_POST['email']);
						$branch = htmlspecialchars($_POST['branch']);
						$address = htmlspecialchars($_POST['address']);
						$year = htmlspecialchars($_POST['year']);
						$university = htmlspecialchars($_POST['university']);
						$mobile = htmlspecialchars($_POST['mobile']);
						if (!empty($fname) && !empty($lname) && !empty($password) && !empty($email) &&  !empty($university))
						{
							//echo "INSERT INTO `users`(`firstname`, `lastname`, `password`, `email`, `address`, `branch`, `year`, `mobile`, `university`) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['password']."','".$_POST['email']."','".$_POST['address']."','".$_POST['branch']."','".$_POST['year']."','".$_POST['mobile']."','".$_POST['university']."')";
							$query = mysql_query("INSERT INTO `users`(`firstname`, `lastname`, `password`, `email`, `address`, `branch`, `year`, `mobile`, `university`) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['password']."','".$_POST['email']."','".$_POST['address']."','".$_POST['branch']."','".$_POST['year']."','".$_POST['mobile']."','".$_POST['university']."')");
							//echo "select * from `users` where `email` = '".$email."'";
							$query = mysql_query("select * from `users` where `email` = '".$email."'");
							//die();
							$q = mysql_fetch_assoc($query);
							//die();
							$_SESSION['userID'] = $q['userid'];
							$_SESSION['username'] = $q['firstname'];
							header('Location:dashboard.php');
						}
}
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	  <title>College Magazine</title>

	
	<link rel="stylesheet" type="text/css" href="../../css/homepage/style.css" media="screen" />
	   <script type="text/javascript" language="javascript" src="../../js/jquery.js"></script>

   <script type="text/javascript" language="javascript" src="../../js/jquery-1.2.6.js"></script>
	<script src="../../js/form-fun.jquery.js" type="text/javascript" charset="utf-8"></script>
	
	
		<style type="text/css">
			legend { 
				position: relative;
				top: -30px;
			}
			
			fieldset {
				margin: 30px 10px 0 0;
			}
		</style>
		
		<script type="text/javascript">
			
		</script>
</head>


<body>
	
	<div id="page-wrap">
		
		<h1>User <span>Registration</span></h1>

		<form action="#" method="post">

			<fieldset id="step_1" class="boxes">
			
				<legend>Step 1</legend>
				<div id="email-div">
				<label id="pass-label">
					<h3>Email:</h3>
				</label>
				<input style="float:left" type="email" required name="email" id="email" class="name_input"></input>
				<div id="msg" style="display:none;">error</div>
				</div>
				<br />
				<div style="clear:both;"></div>
				<div id="pass-div">
				<label id="pass-label">
					<h3>Password:</h3>
				</label>
				<input style="float:left" type="password" required name="password" id="pass" class="name_input"></input>
				</div>
				<br />
			</fieldset>
		
			<fieldset id="step_2" class="boxes">
			
				<legend>Step 2</legend>
			
				<div id="details-div">
				<label >First Name:</label>
				<input type="text" id="firstname" name="firstname" required class="name_input step2field"></input><br />
				<label >Last Name:</label>
				<input type="text" id="lastname" name="lastname" required class="name_input step2field"></input><br />
				<label >Address:</label>
				<textarea rows="10" cols="30" id="address" name="address" class="step2field"></textarea><br />
				<label >Universtiy:</label>
				<input type="text" id="university" name="university" required class="name_input step2field"></input><br />
				<label >Branch:</label>
				<input type="text" id="branch" name="branch" required class="name_input step2field"></input><br />
				<label >Year:</label>
				<input type="text" id="year" name="year" required class="name_input step2field"></input><br />
				<label >Mobile:</label>
				<input type="text" id="mobile" name="mobile" class="name_input step2field"></input><br />
				</div>
				<br />
			
			</fieldset>
		
			<fieldset id="step_3" class="boxes">
				<legend>Step 3</legend>
			
				<label>
					You Are All Done !
				</label>
				<br />
				<input type="submit" id="submit_button" class="push" value="Register"></input>
			</fieldset>

		</form>
	
	</div>

</body>

</html>