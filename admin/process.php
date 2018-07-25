<?php
require_once('../config.php');
require_once('logincheck.php');
date_default_timezone_set('Asia/Manila');
$date_added = date('F d, Y - h:i A');
if(isset($_GET['table'])) {
	$table = $_GET['table'];
	if($table == "posts") {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == "new") {
				if(isset($_POST['post'])) {
					if(isset($_POST['title']) && isset($_POST['content'])) {
						$posted_by = $_POST['posted_by'];
						$title = $_POST['title'];
						$content = $_POST['content'];
						mysql_query("INSERT INTO posts (title, content, date_posted,posted_by) VALUES ('$title', '$content', '$date_added', '$posted_by')");
						header("Location: posts/");
					} else {
						header("Location: http://dlsudlcs.webege.com/lcs");
					}
				} elseif (isset($_POST['preview'])) {
					header("Location: posts/new.php?title=".urlencode($_POST['title'])."&content=".urlencode($_POST['content']));
				} else {
					header("Location: http://dlsudlcs.webege.com/lcs");
				}
			} elseif ($action == "edit") {
				if(isset($_POST['post'])) {
					if(isset($_POST['title']) && isset($_POST['content']) && isset($_GET['id'])) {
						$title = $_POST['title'];
						$id = $_GET['id'];
						$content = $_POST['content'];
						mysql_query("UPDATE posts SET title = '$title', content = '$content' WHERE id = '$id' LIMIT 1");
						header("Location: posts/");
					} else {
						header("Location: http://dlsudlcs.webege.com/lcs");
					}
				} elseif (isset($_POST['preview'])) {
					header("Location: posts/edit.php?id=".$_GET['id']."&title=".urlencode($_POST['title'])."&content=".urlencode($_POST['content']));
				} else {
					header("Location: http://dlsudlcs.webege.com/lcs");
				}
			} elseif ($action == "delete") {
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					mysql_query("DELETE FROM posts WHERE id='$id'");  
					header("Location: posts/");
				} else {
					header("Location: http://dlsudlcs.webege.com/lcs");
				}
			}
		}
	} elseif ($table == "contact") {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == "delete") {
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					$view_e = 1;
					mysql_query("UPDATE contact SET view_e = '$view_e' WHERE id = '$id' LIMIT 1");
					header("Location: contact/");
				} else {
					header("Location: http://dlsudlcs.webege.com/lcs");
				}
			}
		}
	} elseif($table == "forms") {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == "new") {
				if(isset($_POST['title']) && isset($_POST['message'])) {
					$title = $_POST['title'];
					$message = $_POST['message'];
					mysql_query("INSERT INTO forms (title, message, date_added) VALUES ('$title', '$message', '$date_added')");
					header("Location: forms/");
				} else {
					header("Location: http://dlsudlcs.webege.com/lcs");
				}
			} elseif ($action == "edit") {
				if(isset($_POST['title']) && isset($_POST['message']) && isset($_GET['id'])) {
					$title = $_POST['title'];
					$id = $_GET['id'];
					$message = $_POST['message'];
					mysql_query("UPDATE forms SET title = '$title', message = '$message' WHERE id = '$id' LIMIT 1");
					header("Location: forms/");
				} else {
					header("Location: http://dlsudlcs.webege.com/lcs");
				}
			} elseif ($action == "delete") {
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					$delete = 1;
					mysql_query("UPDATE forms SET delet_e = '$delete' WHERE id = '$id' LIMIT 1");
					header("Location: forms/");
				} else {
					header("Location: http://dlsudlcs.webege.com/lcs");
				}
			}
		}
	}
}
?>