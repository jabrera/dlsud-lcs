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
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					$editPost = mysql_query("SELECT * FROM posts WHERE id = '$id' LIMIT 1");
					$n = 0;
					while($row = mysql_fetch_array($editPost)) {
						$title = $row['title'];
						$content = $row['content'];
						if(isset($_GET['title']) && isset($_GET['content'])) {
							$title = $_GET['title'];
							$content = $_GET['content'];
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
			'.$title.'
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20">
			'.nl2br($content).'
			</div>
		</div>
		<div id="title_con">
			<div id="title">
			Edit Post
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20"><br>
			<table width="100%">
				<tr>
					<td></td>
					<td align="right"><a href="index.php" class="button">BACK</a></td>
				</tr>
			</table>
			<br><hr><br>
			<form action="../process.php?table=posts&action=edit&id='.$id.'" method="post">
			<table width="100%" cellspacing="0px" cellpadding="8px">
				<tr>
					<td>Title</td>
					<td><input type="text" class="i_text" name="title" placeholder="Title" value="'.$title.'"></td>
				</tr>
				<tr valign="top">
					<td>Content</td>
					<td><textarea class="i_text" name="content" placeholder="Message">'.$content.'</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="button" name="post" value="EDIT"><input type="submit" class="button" name="preview" value="PREVIEW"></td>
				</tr>
			</table>
			</form>
			</div>
		</div>';
						} else {
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
			Edit Post
			</div>
			<div id="detail">
			
			</div>
		</div>
		<div id="text_content">
			<div id="padding20"><br>
			<table width="100%">
				<tr>
					<td></td>
					<td align="right"><a href="index.php" class="button">BACK</a></td>
				</tr>
			</table>
			<br><hr><br>
			<form action="../process.php?table=posts&action=edit&id='.$id.'" method="post">
			<table width="100%" cellspacing="0px" cellpadding="8px">
				<tr>
					<td>Title</td>
					<td><input type="text" class="i_text" name="title" placeholder="Title" value="'.$title.'"></td>
				</tr>
				<tr valign="top">
					<td>Content</td>
					<td><textarea class="i_text" name="content" placeholder="Message">'.$content.'</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="button" name="post" value="EDIT"><input type="submit" class="button" name="preview" value="PREVIEW"></td>
				</tr>
			</table>
			</form>
			</div>
		</div>';	
						}
						$n = 1;
					}
					if($n == 0) {
						header("Location: http://dlsudlcs.webege.com/lcs");
					}
				}
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