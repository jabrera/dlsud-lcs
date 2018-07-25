<!----------------------------
  -- Copyright Juvar Abrera --
  ---------------------------->
  
<?php
require_once('../config.php');
require_once('logincheck.php');
?>
<html>
<head>
<title>LCS - Lasallian Computer Society</title>
<link rel="stylesheet" media="all" href="../styles/style.css" type="text/css">
</head>
<body>
<center>
<div id="container">
	<div id="top_bg">
		<div id="top">
			<a href="http://www.dlsudlcs.webege.com/"><div id="logo">
			
			</div></a>
			<div id="navigation">
			<?php
			$querynav = mysql_query("SELECT * FROM navigation ORDER BY id ASC");
			while($row = mysql_fetch_array($querynav)) {
				echo '<a href="'.$row['url'].'" class="nav">'.$row['name'].'</a>';
			}
			?>
			</div>
		</div>
	</div>
	<div id="content">
			<?php
			if($ok == 0) {
				if(isset($_POST['username']) && isset($_POST['password'])) {
					$myuser = $_POST['username'];
					$mypass = $_POST['password'];
					if((!$myuser) || (!$mypass)) {
						echo '
		<div id="title_con">
			<div id="title">
			Administration Login
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20">
			<center>
			<form action="index.php" method="post">
			<table cellpadding="10">
				<tr>
					<td colspan="2"><span class="log_error">Error: Fields aren\'t properly fill up.</span></td>
				</tr>
				<tr>
					<td>Username</td><td><input type="text" class="i_text" name="username" placeholder="Username"></td>
				</tr>
				<tr>
					<td>Password</td><td><input type="password" class="i_text" name="password" placeholder="Password"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" class="button" value="SIGN IN"></td>
				</tr>
			</table>
			</form>
			</div>
		</div>
			';
					} else {
						$usercheck = mysql_query("SELECT * FROM officers WHERE username = '$myuser' AND password = '$mypass'");
						$count = mysql_num_rows($usercheck);
						if($count == 1) {
							$_SESSION['username'] = $myuser;
							$_SESSION['password'] = $mypass;
							$_SESSION['userrecord'] = mysql_fetch_assoc($sql);
							header("Location: index.php");
						} else {
							echo '
		<div id="title_con">
			<div id="title">
			Administration Login
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20">
			<center>
			<form action="index.php" method="post">
			<table cellpadding="10">
				<tr>
					<td colspan="2"><span class="log_error">Incorrect username or password.</span></td>
				</tr>
				<tr>
					<td>Username</td><td><input type="text" class="i_text" name="username" placeholder="Username"></td>
				</tr>
				<tr>
					<td>Password</td><td><input type="password" class="i_text" name="password" placeholder="Password"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" class="button" value="SIGN IN"></td>
				</tr>
			</table>
			</form>
			</div>
		</div>
			';
						}
					}
				} else {
					 echo '
		<div id="title_con">
			<div id="title">
			Administration Login
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20">
			<center>
			<form action="index.php" method="post">
			<table cellpadding="10">
				<tr>
					<td colspan="2"><span class="log_message">Log in with your account.</span></td>
				</tr>
				<tr>
					<td>Username</td><td><input type="text" class="i_text" name="username" placeholder="Username"></td>
				</tr>
				<tr>
					<td>Password</td><td><input type="password" class="i_text" name="password" placeholder="Password"></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" class="button" value="SIGN IN"></td>
				</tr>
			</table>
			</form>
			</div>
		</div>
			';
				}
			} else {
				$sql = mysql_query("SELECT * FROM officers WHERE username = '$loggeduser' LIMIT 1");
				while($row = mysql_fetch_array($sql)) {
					$loggedfirstname = $row['firstname'];
					$loggedlastname = $row['lastname'];
					$loggedposition = $row['position'];
				}
				$sql1 = mysql_query("SELECT * FROM posts");
				$sql2 = mysql_query("SELECT * FROM contact WHERE read_e = '1'");
				$sql3 = mysql_query("SELECT * FROM forms WHERE delet_e = '0'");
				$posts_num = mysql_num_rows($sql1);
				$contact_num = mysql_num_rows($sql2);
				$forms_num = mysql_num_rows($sql3);
				echo '
		<div id="user_account">
			<table>
				<tr>
					<td>Welcome, '.$loggedfirstname.' '.$loggedlastname.' ('.$loggedposition.')</td>
					<td align="right"><a href="logout.php" class="button">LOGOUT</a></td>
				</tr>
			</table>
		</div>
		<div id="title_con">
			<div id="title">
			Menu
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20"><br>
			<table width="100%" class="menu" cellspacing="0px" cellpadding="8px">
				<tr>
					<th colspan="2">Menus</th>
				</tr>
				<tr>
					<td>Posts ('.$posts_num.' total posts)</td>
					<td align="right"><a href="posts/">Open</a></td>
				</tr>
				<tr>
					<td>Contact ('.$contact_num.' new message/s)</td>
					<td align="right"><a href="contact/">Open</a></td>
				</tr>
				<tr>
					<td>Forms ('.$forms_num.' total forms)</td>
					<td align="right"><a href="forms/">Open</a></td>
				</tr>
			</table>
			</div>
		</div>';
			}
			?>
	</div>
	<div id="footer_divider">
		<div id="footer_divider_base">
			<a href="http://www.dlsudlcs.webege.com/contact.php?feedback"><div id="feedback_button"></div></a>
			<a href="http://www.facebook.com/LasallianComputerSociety" target="_new"><div id="facebook_button"></div></a>
		</div>
	</div>
	<div id="footercon">
		<div id="footer_base">
			<div id="contact_info">
			<b>Lasallian Computer Society</b><br>
			De La Salle University - Dasmari&ntilde;as,<br>DBB-B Dasmari&ntilde;as, Cavite<br>Philippines 4115<br>
			<b>Cel:</b> Jam Rendor, President (09057910306)<br>
			Jhunel Era<span style="font-family:trebuchet ms;">&ntilde;</span>a, PRO Internal  (09177200653)<br>
			Mary Anne Ramos, PRO External (09179326231)<br><br>
			Email us at <a href="mailto:lasalliancompsoc@yahoo.com">lasalliancompsoc@yahoo.com</a>!
			</div>
			<div id="chibi">
			
			</div>
			<div id="copyright">
			<img src="http://www.dlsudlcs.webege.com/images/resources/logo2.png" width="60px">Copyright 2013. Web design by <a href="http://www.fb.com/juvar.abrera" target="_new">Juvar Abrera</a>.
			</div>
			<div id="quote">
			<i>There are 10 types of people. Those who understand binary, and those who don't</i>
			</div>
		</div>
	</div>
</div>
</body>
</html>