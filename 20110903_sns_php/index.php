<?php
	session_start();
	$out = htmlspecialchars($_GET[ logout ], ENT_QUOTES, 'UTF-8'); // ログアウトが押された時
	if($out == y){
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-999, '/');
		session_destroy();
	}

	if( $_SESSION["id"] !== null ) { // セッション有効時、home.phpへ移動
		header("Location:home.php");
	}
 ?>
<!DOCTYPE html>
<HTML>
	<HEAD>
<?php	readfile("inc/meta.html"); ?>
		
		<title>TITLE</title>
	</HEAD>


<BODY>
<?php	include 'inc/login.php'; ?>