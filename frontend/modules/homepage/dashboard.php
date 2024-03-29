<?php
session_start();
include '../../include/dbconnect.php';
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
  <link rel="stylesheet" href="../../css/homepage/editorpick.css"/>
	<link rel="stylesheet" href="../../css/homepage/rating.css"/>
<link rel="stylesheet" href="../../css/homepage/editorcontent.css"/>
	<link rel="stylesheet" href="../../css/homepage/article.css"/> 

<link href="../../../common/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>

<script src="../../js/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
   <script type="text/javascript" language="javascript" src="../../js/jquery.js"></script>
    <script src="../../js/foundation.min.js"></script>
  <script src="../../js/modernizr.foundation.js"></script>
	      <script type="text/javascript" src="../../js/jquery.rating.js"></script>
			<script src="../../js/article.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
	  	 	$('.category').live('click',function(){
		  		var id = $(this).attr('id');
		  		$('#content').load('editorcontent.php?categoryid='+id);
		  	});
	});
  </script>
  <script src="../../js/app.js"></script>
    <script>
    $(document).ready(function(){
      $("#featured").orbit();
    });
    </script>
    <script type="text/javascript" language="javascript" src="../../../common/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" language="javascript">
 $(document).ready(function(){
$(".trigger-fancybox-login").fancybox(
	{
      
	});
});
</script>
   
</head>
<body class="off-canvas">
  
  <?php 
  	include ('../../include/header-login.php');
  ?>
  
  <div class="row article-wrapper">
    <div class="tweleve columns ">
	    <dl class="tabs margin-left">
	        <dd class="active"><a href="#simple1">College News</a></dd>
	        <dd><a href="#simple4">Recent Article's</a></dd>
	        
	      </dl>
	      <ul class="tabs-content">
	        <li class="active" id="simple1Tab">  
	        	<div class="slide-show">	
		        	<div id="featured">
				        <img src="../../images/slide-show1.jpg" alt="slide image">
				        <img src="../../images/slide-show2.jpg" alt="slide image">
				        <img src="../../images/slide-show1.jpg" alt="slide image">
				   </div>
				 </div>
			   <div class="content-title">
			   	Latest News
			   </div>
			   <div class="content-div">
			   	 Lorem ipsum dolor sit amet, consectetur adipiscing elit.
			   	 Vivamus in erat sed sem euismod ultrices commodo sed ligula. 
			   	 Donec condimentum, est accumsan lacinia viverra, massa tellus 
			   	 luctus tortor, sed varius nibh est sit amet nisl. Suspendisse 
			   	 porta commodo augue in semper. Maecenas auctor auctor pulvinar. 
			   	 Mauris porta adipiscing tortor, at bibendum dui lobortis a. Aliquam 
			   	 commodo odio vitae urna blandit malesuada. Ut sit amet tellus ut libero 
			   	 suscipit pharetra in a odio. Curabitur pulvinar ornare nibh, rutrum pulvinar nulla adipiscing ut.
			   </div>
	        </li>
	        <li id="simple2Tab">
	        	<div class="content-title">
			   	Editor's Pick
			   </div>
			   <div class="content-div">
			   <?php
			   	include('editorpick.php');
			   ?>
			   </div>
	        </li>
	        <li id="simple3Tab">
	        	<div class="content-title">
			   	Most Read Article's
			   </div>
			   <div class="content-div">
			   <?php
			   include('mostreadarticle.php');
			   ?>
			   	</div>
	        </li>
	        <li id="simple4Tab">
	        	<div class="content-title">
			   	Recent Article's
			   </div>
			   <div class="content-div">
			   <?php
			   include('recentarticle.php');
			   ?>

			   </div>
	        </li>
	        <li id="simple5Tab">
	          <div class="content-title">
			     Other's
			   </div>
			   <!--  -->
			  <div class="float-div">
				 <ul class="tabs vertical float-left left-nav ">
					    <li class="active" ><a href="">Highest Rated Article</a></li>
					    <li><a href="#month">Month of article</a></li>
					    <li ><a href="">Thought of the Day</a></li>
					    <li ><a href="">Word of the Day</a></li>
					    <li ><a href="">Article of the Day</a></li>
	  			</ul>		   
				   <div class="content-div float-right overwrite1">
				   	 Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				   	 Vivamus in erat sed sem euismod ultrices commodo sed ligula. 
				   	 Donec condimentum, est accumsan lacinia viverra, massa tellus 
				   	 luctus tortor, sed varius nibh est sit amet nisl. Suspendisse 
				   	 porta commodo augue in semper. Maecenas auctor auctor pulvinar. 
				   	 Mauris porta adipiscing tortor, at bibendum dui lobortis a. Aliquam 
				   	 commodo odio vitae urna blandit malesuada. Ut sit amet tellus ut libero 
				   	 suscipit pharetra in a odio. Curabitur pulvinar ornare nibh, rutrum pulvinar nulla adipiscing ut.
				   </div>
				   <li id="month">
				   <div class="content-div float-right">
				   <?php
				   include('montharticle.php');
				   ?>
	        	   </div>
	               </li>

				   <div class="clear"></div>
			 </div>
	        </li>
	      </ul>
	      <!--  -->
    </div>
  </div>
  <!-- Included JS Files (Uncompressed) -->
  <!--
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  <script src="javascripts/jquery.foundation.forms.js"></script>
  <script src="javascripts/jquery.event.move.js"></script>
  <script src="javascripts/jquery.event.swipe.js"></script>
  <script src="javascripts/jquery.foundation.reveal.js"></script>
  <script src="javascripts/jquery.foundation.orbit.js"></script>
  <script src="javascripts/jquery.foundation.navigation.js"></script>
  <script src="javascripts/jquery.foundation.buttons.js"></script>
  <script src="javascripts/jquery.foundation.tabs.js"></script>
  <script src="javascripts/jquery.foundation.tooltips.js"></script>
  <script src="javascripts/jquery.foundation.accordion.js"></script>
  <script src="javascripts/jquery.placeholder.js"></script>
  <script src="javascripts/jquery.foundation.alerts.js"></script>
  <script src="javascripts/jquery.foundation.topbar.js"></script>
  <script src="javascripts/jquery.foundation.joyride.js"></script>
  <script src="javascripts/jquery.foundation.clearing.js"></script>
  <script src="javascripts/jquery.foundation.magellan.js"></script>
  -->
  
  <!-- Included JS Files (Compressed) -->
   
  
</body>
</html>
