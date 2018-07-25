<!----------------------------
  -- Copyright Juvar Abrera --
  ---------------------------->
  
<?php
require_once('config.php');

// l2c0s1w2
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>LCS - Lasallian Computer Society</title>
	<link rel="stylesheet" media="all" href="styles/style.css" type="text/css">
	<meta name="description" content="Lasallian Computer Society" />
	<meta name="keywords" content="lcs, lasallian computer society, lasallian, computer, society" />
	<meta name="author" content="Juvar Abrera" />
	<meta name="copyright" content="2013 LCS" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<script type="text/javascript">
	Image1= new Image(78,35)
	Image1.src = "images/skin/default/bg/nav_hov.png"
	</script>
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
		<div id="header">
		
		</div>
		<div id="title_con">
			<div id="title">
			LCS Officers
			</div>
			<div id="detail">
			List of LCS Officers 2012-2013
			</div>
		</div>
		<div id="text_content">
			<div id="padding20">
			<table width="100%" class="menu" cellpadding="8px" cellspacing="0px">
				<tr>
					<th>Position</th>
					<th>Full Name</th>
					<th>CYS</th>
					<th>Contact No.</th>
				</tr>
				<?php
				$sql = mysql_query("SELECT * FROM officers ORDER BY id ASC");
				while($row = mysql_fetch_array($sql)) {
					$position = $row['position'];
					$firstname = $row['firstname'];
					$lastname = $row['lastname'];
					$fullname = $firstname.' '.$lastname;
					$cys = $row['cys'];
					$fb = $row['fb_url'];
					$contact = $row['contact'];
					if($row['id'] != "18") {
						echo '<tr>
						<td>'.$position.'</td>
						<td><a href="'.$fb.'" target="_blank"><img src="images/resources/fblogo.png"></a> '.$fullname.'</td>
						<td>'.$cys.'</td>
						<td>'.$contact.'</td>
					</tr>
						';
					}
				}
				?>
			</table>
			</div>
		</div>
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