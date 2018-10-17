<?php
	// *----------------------------*
	// *	DB接続
	// *----------------------------*
	define('DB_INFO', 'mysql:dbname=test;host=localhost'); // DB情報
	try { $dbHandle = new PDO(DB_INFO, "root", "password");

		// DBからデータ取得
		$sql = sprintf( "select name, id from login where id = '%s'", $_SESSION["id"] );
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
	foreach ($data as $var) $count++; // $data が存在するとき「$count」の値は「1」、存在しなければ「0」

	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*
	if( $count === 0 ){ // ******** $data が存在しないとき ********
		$msg = "セッションの有効期限が切れました。再度ログインしてください。";
		include 'inc/login.php';
		exit; }
	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*
?>
