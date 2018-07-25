<!----------------------------
  -- Copyright Juvar Abrera --
  ---------------------------->
  
<?php
require_once('config.php');

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
		<?php
		if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['title'])) {
			$title = mysql_real_escape_string($_POST['title']);
			$message = $_POST['message'];
			$fullname = mysql_real_escape_string($_POST['fullname']);
			$email = mysql_real_escape_string($_POST['email']);
			$title = mysql_real_escape_string($_POST['title']);
			$searchEmailAt = strpos($email, '@');
			$searchEmailDot = strpos($email, '.');
			if($searchEmailAt == 0) {
				header("Location: contact.php?error");
			} else if ($searchEmailDot == 0) {
				header("Location: contact.php?error");
			} else {
				date_default_timezone_set('Asia/Manila');
				$date = date('F d Y - h:i:s A');
				$emailTitle = $title;
				$read_e = 0;
				$view_e = 0;
				mysql_query("INSERT INTO contact (fullname, email, title, message, date, read_e, view_e) VALUES ('$fullname', '$email', '$title', '$message', '$date', '$read_e', '$view_e')");
				$emailMessage = nl2br($message);
				$emailSubject = "LCS - ".$emailTitle;
				$webmaster = 'lasalliancompsoc@yahoo.com';
				$emailContent = '<span style="font-family:trebuchet ms;font-size:17px;"><b>Date Received:</b>'.$date.'<br><br><b>Full Name:</b> '.$fullname.'<br><br><b>Email:</b> '.$email.'<br><br><b>Message:</b><br><br>'.$emailMessage.'<br><br><br>Lasallian Computer Society &copy; 2013</span>';
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: LCS <lasalliancompsoc@yahoo.com>\r\n"; 
				mail($webmaster, $emailSubject, $emailContent, $headers);
				header("Location: contact.php?success");
			}
		} else {
		// error fill up the fields correctly.
		}
		?>
		<div id="title_con">
			<div id="title">
				Contact Us!
			</div>
			<div id="detail">
				Send us a comment, suggestion, or inquiries.
			</div>
		</div>
		<div id="text_content">
			<div id="padding20">
			<form action="contact.php" method="post">
			<table width="550px" cellpadding="8px">
			<?php
			if(isset($_GET['error'])) {
				echo '
				<tr>
					<td colspan="2"><span class="log_error">Error! Incorrect textfields.</span></td>
				</tr>
				';
			} elseif (isset($_GET['success'])) {
				echo '
				<tr>
					<td colspan="2"><span class="log_message">Your message has been sent!</td>
				</tr>
				';
			} else {
				echo '
				<tr>
					<td colspan="2"><span class="log_message">Please fill up the form below. <span class="red">*</span> - required</span></td>
				</tr>
				';
			}
			?>
				<tr>
					<td width="120px"><span class="red">*</span>Full name: </td><td><input type="text" class="i_text" name="fullname" placeholder="Full Name"></td>
				</tr>
				<tr>
					<td><span class="red">*</span>Email: </td><td><input type="text" class="i_text" name="email" placeholder="Email"></td>
				</tr>
				<tr>
					<td><span class="red">*</span>Title: </td><td><input type="text" class="i_text" name="title" placeholder="Title" <?php if(isset($_GET['feedback'])) { echo 'value="Feedback"'; }?>></td>
				</tr>
				<tr valign="top">
					<td><span class="red">*</span>Message: </td><td><textarea class="i_text" name="message" placeholder="Message"></textarea></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" class="button" value="SEND"></td>
				</tr>
			</table>
			</form>
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