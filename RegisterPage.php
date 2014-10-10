<?php require "top.php";
$tbs_isNav = 1;
?>
<body>
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0" class="tableBorder">
	<head><script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>
<meta charset='utf-8' />
<title>Build your Personalized Training Program - Lumosity</title>
<meta content='initial-scale=1.0, maximum-scale=1.0, width=device-width' name='viewport' />
<meta content="app-id=577232024" name="apple-itunes-app"></meta>

<link href="http://static.sl.lumosity.com/compiled/v5/application-0937a3947eeb9d5c3c307dc681bac57d.css" media="screen, projection, print" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->
<meta content="authenticity_token" name="csrf-param" />
<meta content="iMU1EIzCAM8UdBVxnmZiSwwkdy30eDYJBWb4NsOHbP4=" name="csrf-token" />
</head>
<body class='trainer_app personalization results edit'>
<div class='pull-right' id='account-login'>
<span class='hidden-phone'>Already have an account?</span>
<a href="http://devweb.tc.columbia.edu/php/spring13/gquanhui/final/index.php" class="btn btn-inverse btn-small" rel="nofollow">Log in
</a>
</div>



<div id='personalization-survey'>
<section id='breadcrumb-wrapper'>
<div class="container"><h1>Find your personalized brain training games</h1>

</div>
</div></section>
	<tr>
		<td bgcolor="#FFFFFF">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td valign="top" bgcolor="#FFFFFF" style="padding:15px;">
						<form action="response.php"  method="POST" enctype="multipart/form-data" name="sendemail" >
				    <p><label>Username:<input type="text" name="userid" size="20" maxlength="40"/></label></p>
				    <p><label>Password:<input type="password" name="pwd" size="20" maxlength="40"/></label></p><div><img alt="Feature_games" class="pull-right featurette-image" src="http://wbgu.org/programming/braingame/img117222.jpg" width="300" /></div>
				    <p><label>First Name:<input type="text" name="firstname" size="20" maxlength="40"/></label></p>
					<p><label>Last Name:<input type="text" name="lastname" size="20" maxlength="40"/></label></p>
					<p><label for="sex">Gender:</label><input type="radio" name="sex" value="Male" checked />Male<br /><input type="radio" name="sex" value="Female"/>Female</p>

					<p><label>How old are you?</p></label>
               
                    <?php
						$sql = mysql_query("select * from age");
						$info = mysql_fetch_array($sql);
						$i = 1;
						do
						{
					?>
					<input type="checkbox" name="location" value=<?=$info["Title"]?>><?=$info["Title"]?><br />
                    <?php
						 $i=$i+1;
						 }while($info = mysql_fetch_array($sql));
					?>
                    <br />
                    <br /> 
					<p><label>Select all kinds of brain skills you want to train?</p></label>
				
					<?php
						$sql = mysql_query("select * from skills");
						$info = mysql_fetch_array($sql);
						$i = 1;
						do
						{
					?>
					<input type="checkbox" name="tool[]" value=<?=$info["Title"]?>><?=$info["Title"]?><br />
                    <?php
						 $i=$i+1;
						 }while($info = mysql_fetch_array($sql));
					?>
					<br />
					<br />
                    <p><label>Which devices do you often use to play games?</p></label>
				
					<?php
						$sql = mysql_query("select * from preference");
						$info = mysql_fetch_array($sql);
						$i = 1;
						do
						{
					?>
					<input type="checkbox" name="style[]" value=<?=$info["ID"]?>><?=$info["Title"]?><br />
                    <?php
						 $i=$i+1;
						 }while($info = mysql_fetch_array($sql));
					?>
					<br />
					<br />
                    <p><label>Upload an avatar to your profile (use JPG or GIF files please):</p></label>
                    <input type="file" name="Photo" id="Photo">
                    <br />
                    <br />
					<p><label>Your eamil address(optional):</p></label>
					
					<textarea name="comments" rows="2" cols="20" ></textarea>
					<br /><br />
					<p align="left"><input type="submit" value="Register Now!"/></p></form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>

