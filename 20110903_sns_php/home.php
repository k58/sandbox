<?php session_start();
header('Expires: -1');
header('Cache-Control:');
header('Pragma:'); ?>
<!DOCTYPE html>
<HTML>
	<HEAD>
<?php	readfile("inc/meta.html"); ?>
		
		<title>ホーム</title>
	</HEAD>


<BODY>


<?php

// **************************************************
// **  SESSION有効
// **************************************************
if( $_SESSION["id"] !== null ) {
	include 'inc/session_on.php';


	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*
	if( $count === 1 ){ // ******** $data が存在するとき ********
		include 'inc/myhome.php';
		exit; }


	else {
		$msg = "これは謎のエラーです！";
		include 'inc/login.php';
		exit; }
	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*


}
// **************************************************
// **  SESSION有効
// **************************************************





// **************************************************
// **  SESSION無効
// **************************************************
else{
	$id = htmlspecialchars($_POST[ id ], ENT_QUOTES, 'UTF-8');
	$pass = htmlspecialchars($_POST[ pass ], ENT_QUOTES, 'UTF-8');


	// *----------------------------*
	// *	ALL NULL
	// *----------------------------*
	if($id == null && $pass == null) {
		$msg = "セッションの有効期限が切れました。再度ログインしてください。";
		include 'inc/login.php';
		exit; }
	// *----------------------------*
	// *	ALL NULL
	// *----------------------------*



	// *===================================*
	// *	ログインシステム
	// *===================================*

	// *----------------------------*
	// *	DB接続
	// *----------------------------*
	define('DB_INFO', 'mysql:dbname=test;host=localhost'); // DB情報
	try { $dbHandle = new PDO(DB_INFO, "root", "password");

		// DBからデータ取得
		$sql = sprintf( "select pass, name, id from login where id = '%s'", $id );
		$stmt = $dbHandle->query( $sql );
		$data = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$data[] = $row;
		}
	}
	catch (PDOException $e) {
		var_dump($e->getMessage());
	}

	// DB切断
	$dbHandle = null;
	// *----------------------------*
	// *	DB接続
	// *----------------------------*


	$count = 0;
	foreach ($data as $var) { $count++; // $data が存在するとき「$count」の値は「1」、存在しなければ「0」
	// *----------------------------*
	// *	パスワード ERRER
	// *----------------------------*
		if( $pass !== $var['pass'] ){
		$msg = "パスワードが間違っています。";
		include 'inc/login.php';
		exit; }
	// *----------------------------*
	// *	パスワード ERRER
	// *----------------------------*
	}


	// *----------------------------*
	// *	ID ERRER
	// *----------------------------*
	if( $count === 0 ){ // ******** $data が存在しないとき ********
		$msg = "IDが存在しません。";
		include 'inc/login.php';
		exit; }
	// *----------------------------*
	// *	ID ERRER
	// *----------------------------*



	if( $count === 1 ){ // ******** $data が存在するとき ********
		$_SESSION["id"] = $var['id'];
//		session_regenerate_id(true);

		include 'inc/myhome.php';
		exit; }


	else {
		$msg = "これは謎のエラーです！";
		include 'inc/login.php';
		exit; }
// *===================================*
// *	ログインシステム
// *===================================*


}
// **************************************************
// **  SESSION無効
// **************************************************
?>
