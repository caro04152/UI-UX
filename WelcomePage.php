<?php
session_start();
require "top.php";
if($_POST["action"]=="ok")
{
	$userid    = $_POST["userid"];
	if(trim($userid)==""){ $db->alert("please enter your Userid!"); die();}
	$pwd    = $_POST["pwd"];
	if(trim($pwd)==""){ $db->alert("please enter your Pwd!"); die();}
	$fs = mysql_fetch_assoc($db->query("select id from member where userid = '{$userid}' and pwd = '{$pwd}'"));
	if(!is_array($fs)) { $db->alert("Account or password error!"); die();}
	$_SESSION["userid"] = $userid;
	echo "<script>alert('Login successful!');window.location.href='list.php'</script>";
	exit();
}
$tbs_isNav = 1;
?>

<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">

<head><script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
<meta charset='utf-8' />

<meta content='initial-scale=1.0, maximum-scale=1.0, width=device-width' name='viewport' />
<meta content="app-id=577232024" name="apple-itunes-app"></meta>
<link href="http://static.sl.lumosity.com/favicon.ico" rel="shortcut icon" />
<link href="http://static.sl.lumosity.com/compiled/v5/application-0937a3947eeb9d5c3c307dc681bac57d.css" media="screen, projection, print" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->
<meta content="authenticity_token" name="csrf-param" />
<meta content="iMU1EIzCAM8UdBVxnmZiSwwkdy30eDYJBWb4NsOHbP4=" name="csrf-token" />
</head>
<body class='trainer_app personalization results edit'>
<div class='pull-left' id='account-login'>
<span class='hidden-phone'>Welcome please login</span>
<a href="http://devweb.tc.columbia.edu/php/spring13/gquanhui/final/index.php" class="btn btn-inverse btn-small" rel="nofollow">Login
</a>
</div>	
<div class='pull-right' id='account-register'>
<span class='hidden-phone'>Creat a new account?</span>
<a href="http://devweb.tc.columbia.edu/php/spring13/gquanhui/final/reg.php" class="btn btn-inverse btn-small" rel="nofollow">Register
</a>
</div>



<div id='personalization-survey'>
<section id='breadcrumb-wrapper'>
<div class="container"><h1>Find your personalized brain training games</h1>

</div>

<div class="container"><div class='featurette'>
<img alt="Feature_head" class="pull-left featurette-image" src="http://wbgu.org/programming/braingame/img117222.jpg" width="400" />
<div class='details'>
<h2>Deeply personalized training</h2>
<h5>
Your brain's abilities are unique. That's why this training program adapts to fit your brain and your life goals.
</h5>
</div>
</div>

			</table>
			</form>
		</td>
	</tr>
</table>
</body>
</html>
