<!----------------------------
  -- Copyright Juvar Abrera --
  ---------------------------->
  
<?php
require_once('../../config.php');
require_once('../logincheck.php');
?>
<html>
<head>
<title>LCS - Lasallian Computer Society</title>
<link rel="stylesheet" media="all" href="../../styles/style.css" type="text/css">
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
				header("Location: http://dlsudlcs.webege.com/lcs");
			} else {
				$sql = mysql_query("SELECT * FROM officers WHERE username = '$loggeduser' LIMIT 1");
				while($row = mysql_fetch_array($sql)) {
					$loggedfirstname = $row['firstname'];
					$loggedlastname = $row['lastname'];
					$loggedposition = $row['position'];
				}
				echo '
		<div id="user_account">
			<table>
				<tr>
					<td>Welcome, '.$loggedfirstname.' '.$loggedlastname.' ('.$loggedposition.')</td>
					<td align="right"><a href="../logout.php" class="button">LOGOUT</a></td>
				</tr>
			</table>
		</div>
		<div id="title_con">
			<div id="title">
			Contacts Menu
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20"><br>
			<table width="100%">
				<tr>
					<td></td>
					<td align="right"><a href="../" class="button">BACK</a></td>
				</tr>
			</table>
			<br><hr><br>
			<table width="100%" class="menu" cellspacing="0px" cellpadding="8px">
				<tr>
					<th width="500px">Subject</th>
					<th colspan="2">Actions</th>';
				$getPost = mysql_query("SELECT * FROM contact ORDER BY id DESC");
				$z = 0;
				while($row = mysql_fetch_array($getPost)) {
					$id = $row['id'];
					$fullname = $row['fullname'];
					$email = $row['email'];
					$title = $row['title'];
					$read_e = $row['read_e'];
					$view_e = $row['view_e'];
					if($view_e == 0) {
						if($read_e == 1) {
							echo '
				<tr>
					<td width="500px"><b>'.$title.' || by '.$fullname.'</b></td>';
						} else {
							echo '
				<tr>
					<td width="500px">'.$title.' || by '.$fullname.'</td>';
						}
						echo '
					<td><a href="view.php?id='.$id.'">View</a></td>
					<td><a href="../process.php?table=contact&action=delete&id='.$id.'">Delete</a></td>
				<tr>';
						$z = 1;
					}
				}
				if($z == 0) {
					echo '
				<tr>
					<td colspan="2"><center>No contacts.</td>
				</tr>';
				}
				echo '
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