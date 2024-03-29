<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html><head>
<title>HTML KickStart Elements</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="description" content="" />
<meta name="copyright" content="" />
<link rel="stylesheet" type="text/css" href="css/kickstart.css" media="all" />                  <!-- KICKSTART -->
<link rel="stylesheet" type="text/css" href="style.css" media="all" />                          <!-- CUSTOM STYLES -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/kickstart.js"></script>                                  <!-- KICKSTART -->
</head><body>

<!-- Menu Horizontal -->
<ul class="menu">
<li class="current"><a href="">Item 1</a></li>
<li><a href="">Item 2</a></li>
<li><a href=""><span class="icon" data-icon="R"></span>Item 3</a>
	<ul>
	<li><a href=""><i class="fa fa-car"></i> Sub Item</a></li>
	<li><a href=""><i class="fa fa-arrow-circle-right"></i> Sub Item</a>
		<ul>
		<li><a href=""><i class="fa fa-comments"></i> Sub Item</a></li>
		<li><a href=""><i class="fa fa-check"></i> Sub Item</a></li>
		<li><a href=""><i class="fa fa-cutlery"></i> Sub Item</a></li>
		<li><a href=""><i class="fa fa-cube"></i> Sub Item</a></li>
		</ul>
	</li>
	<li class="divider"><a href=""><i class="fa fa-file"></i> li.divider</a></li>
	</ul>
</li>
<li><a href="">Item 4</a></li>
</ul>

<div class="grid">
	
<!-- ===================================== END HEADER ===================================== -->
	 
<div class="col_12">
	<div class="col_9">
	<h3>Paragraphs</h3>
	<p><img class="align-left" src="http://placehold.it/180x150/4D99E0/ffffff.png&text=180x150" width="180" height="150" />
	Lorem ipsum dolor sit amet, consectetuer <em>adipiscing elit</em>, sed diam nonummy nibh euismod 
	tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis 
	nostrud exerci tation <strong>ullamcorper suscipit lobortis</strong> nisl ut aliquip ex ea commodo consequat. 
	Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>

	<p>El illum dolore eu <span class="icon" data-icon="2"></span> feugiat nulla facilisis at vero eros et accumsan et iusto odio 
	dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam 
	liber tempor cum soluta nobis eleifend <code>&lt;h1&gt;Sample Code&lt;/h1&gt;</code> option 
	congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
	
	<p>
	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis 
	nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse 
	molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim 
	qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum 
	soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
	</div>
	
	<div class="col_3">
	<h5>Icon List</h5>
	<ul class="icons">
	<li><i class="fa fa-li fa-check"></i> Apple</li>
	<li><i class="fa fa-li fa-check"></i> Banana</li>
	<li><i class="fa fa-li fa-check"></i> Orange</li>
	<li><i class="fa fa-li fa-check"></i> Pear</li>
	</ul>
	
	<h5>Sample Icons</h5>
	<i class="fa fa-twitter-square fa-3x"></i> 
	<i class="fa fa-facebook-square fa-3x"></i>
	<i class="fa fa-linkedin-square fa-3x"></i>
	<i class="fa fa-github-square fa-3x"></i>
	
	<h5>Button w/Icon</h5>
	<a class="button orange small" href="#"><i class="fa fa-rss"></i> RSS</a>
	</div>
	
	<hr />
	
	<div class="col_3">
	<h4>Column</h4>
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
	</div>
	
	<div class="col_3">
	<h4>Column</h4>
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
	</div>
	
	<div class="col_3">
	<h4>Column</h4>
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
	</div>
	
	<div class="col_3">
	<h4>Column</h4>
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis</p>
	</div>
</div>

</div><!-- END GRID -->

<!-- ===================================== START FOOTER ===================================== -->
<div class="clear"></div>
<div id="footer">
&copy; Copyright 2011–2012 All Rights Reserved. This website was built with <a href="http://www.99lime.com">HTML KickStart</a>
</div>

</body></html>