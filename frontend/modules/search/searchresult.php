<style type="text/css">
.style1 {
	text-decoration: underline;
}
</style>
<?php
session_start();
include ('../../include/dbconnect.php');
?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>College Magazine</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="../../css/app.css">
  <link rel="stylesheet" href="../../css/presentation.css">
  <link rel="stylesheet" href="../../css/homepage/index.css">
  <link rel="stylesheet" href="../../css/foundation.min.css">
  <link rel="stylesheet" href="../../css/post-article/post-article.css"/>
  <link rel="stylesheet" type="text/css" href="../../../common/plugins/datatable/css/jquery.dataTables.css" />
  <link rel="stylesheet" type="text/css" href="../../../common/plugins/datatable/css/jquery.dataTables_themeroller.css" />
   <link href="../../../common/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" language="javascript" src="../../js/jquery.js"></script>
  <script language="javascript" src="../../../common/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="../../../common/plugins/datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" src="../../js/postarticle.js"></script>

</head>
<body class="off-canvas">
  
  <?php 
  	if(isset($_SESSION['userID']) && !empty($_SESSION['userID']))
  	include ('../../include/header-login.php');
  else 
  	include ('../../include/header.php');
  ?>
  <div class="row article-wrapper">
    <div class="tweleve columns">
	     <fieldset>
	     	<legend class="style1">Search Results</legend>
	     	<span class="style1">
	     	<?php
			$query = "";
			if(isset($_POST['search']))
			{
				echo 'select * from article where `title` like \'%'.$_POST['search'].'%\' or `content` like \'%'.$_POST['search'].'%\' or `authors` like \'%'.$_POST['search'].'%\' or `category` like \'%'.$_POST['search'].'%\'';
				$query = mysql_query('select * from article where `title` like \'%'.$_POST['search'].'%\' or `content` like \'%'.$_POST['search'].'%\' or `authors` like \'%'.$_POST['search'].'%\' or `category` like \'%'.$_POST['search'].'%\'');
			}
			else if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_POST['authors'])) 
			{
				$query = mysql_query('select * from article where `title` like \'%'.$_POST['title'].'%\'or `content` like \'%'.$_POST['content'].'%\' or `authors` like \'%'.$_POST['authors'].'%\' or `category` like \'%'.$_POST['category'].'%\'');
			}
			else 
				header('Location:search.php');
			?>
			</span>
			<div class="yum-datatable article-datatable">
		     	<table>
					<thead>
						<tr>
							<th style="width: 40px;" class="style1">S.No</th>
							<th style="width: 300px;" class="style1">Title</th>
							<th style="width: 270px;" class="style1">Content</th>
						</tr>
					</thead>
				<tbody>
	     	<?php
	     	$i = 0;
	     	while($q = mysql_fetch_assoc($query))
	     	{
	     		echo '
						<tr>
							<td style="width: 40px;">'.($i+1).'</td>
							<td style="width: 300px;">'.$q['title'].'</td>
							<td style="width: 270px;">'.$q['content'].'</td>
						</tr>';
				$i++;
	     	}
	     	?>
	     	</tbody>
	     	</table>
	     	</div>
	     </fieldset>
    </div>
  </div>
</body>
</html>	 
