<?php
/*

// define some variables that the attalitemplate.php will need
// __DIR__ is something like '/homepages/20/d93584634/htdocs/attali/France/Day 1'
// ROOT will be something like '/homepages/20/d93584634/htdocs/attali/'
$attaliIdx = strpos(__DIR__, 'attali');
$root = substr(__DIR__, 0, $attaliIdx+strlen('attali'));
define(ROOT, $root . '/');
define(IMAGES_DIR, '/.images/');
define(DIR, __DIR__);

// use the generic template that we built 
require ROOT . '.attalitemplate.php';

*/


?>

<html>

<head>
<style type="text/css">
body {
	background: url(data:image/jpeg;base64,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);
	font-family: arial;
	font-size:1.5em;
	margin:10px;
	text-align:center;
	position:relative;
}

.mainpagelink {
	display:inline-block;
	font-size:1.5em;
	margin: 15px 50px 30px;
	border: 1px solid #AAAAAA;
	color: #444444;
	text-shadow: 0 1px 0 #FFF;
	text-align: center;
	border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	padding: 11px 27px;
	font-weight:bold;
	text-decoration: none !important;
	cursor: pointer;
	background: #D5D5D5;
	background: -webkit-gradient(linear, center top, center bottom, from(#F5F5F5), to(#D5D5D5));
	background: -moz-linear-gradient(top, #F5F5F5, #D5D5D5);
	background: -ms-linear-gradient(top, #F5F5F5, #D5D5D5);
	background: linear-gradient(top, #F5F5F5, #D5D5D5);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#F5F5F5', endColorstr='#D5D5D5',GradientType=0 );
}
.mainpagelink:hover {
	background: -webkit-gradient(linear, center top, center bottom, from(#FAFAFA), to(#E0E0E0));
}
.mainpagelink:active {
	box-shadow: inset 0 0 3px #BBB;
	background: #E5E5E5;
}

</style>
</head>

<body>

<a class="mainpagelink" href="/friends">Friends</a>
<a class="mainpagelink" href="/family">Family</a>
<div style="clear:both;"></div>
<img src="/.images/attaliweb.JPG" width="700" />

<a style="position:absolute;bottom:0;right:0;font-size:0.6em;" href="/dindex.php">.</a>

</body>

</html>
