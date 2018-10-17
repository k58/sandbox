<?php session_start(); ?>
<!DOCTYPE html>
<HTML>
	<HEAD>
<?php
readfile("../inc/meta.html");


$id = htmlspecialchars($_GET[ id ], ENT_QUOTES, 'UTF-8');
// *----------------------------*
// *	DB接続
// *----------------------------*
define('DB_INFO', 'mysql:dbname=test;host=localhost'); // DB情報
try { $dbHandle = new PDO(DB_INFO, "root", "password");

	// DBからデータ取得
	$sql = sprintf( "select name from login where id = '%s'", $id );
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
if( $count === 0 ) header("Location:../");
 ?>
		
		<title><?php print($var['name']); ?></title>
	</HEAD>


<BODY>


<?php
if( $_SESSION["id"] !== null ) {
	// *----------------------------*
	// *	DB接続
	// *----------------------------*
	define('DB_INFO', 'pgsql:host=192.168.180.61 port=5432 dbname=test'); // DB情報
	try { $dbHandle = new PDO(DB_INFO, "test", "test");

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
	$count2 = 0;
	foreach ($data as $var2) $count2++; // $data が存在するとき「$count」の値は「1」、存在しなければ「0」


	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*
	if( $count2 === 1 ){ // ******** $data が存在するとき ********
?>
<!-- **************************************************
     **  TOP MENU 
     ************************************************** -->
<?php	include '../inc/t-menu.php'; ?>
<!-- **************************************************
     **  TOP MENU 
     ************************************************** -->
<?php
	}
}
	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*



if( $count === 1 ){ // ******** $data が存在するとき ********
	include '../inc/userpage.php';
}
else header("Location:../");
 ?>
