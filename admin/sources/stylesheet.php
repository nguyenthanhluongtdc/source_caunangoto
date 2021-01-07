<?php
if ($user['type'] != "master")
	show_error();
if(isset($_POST['savebtn'])) {
	file_put_contents(getThemeURL("../assets/css/style.css", true), $_POST['style']);
	redirect(getCurrentPageURL());
}
$template = "stylesheet";
?>
