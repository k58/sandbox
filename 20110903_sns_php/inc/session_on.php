<?php
	// *----------------------------*
	// *	DB�ڑ�
	// *----------------------------*
	define('DB_INFO', 'mysql:dbname=test;host=localhost'); // DB���
	try { $dbHandle = new PDO(DB_INFO, "root", "password");

		// DB����f�[�^�擾
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

	// DB�ؒf
	$dbHandle = null;
	// *----------------------------*
	// *	DB�ڑ�
	// *----------------------------*


	$count = 0;
	foreach ($data as $var) $count++; // $data �����݂���Ƃ��u$count�v�̒l�́u1�v�A���݂��Ȃ���΁u0�v

	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*
	if( $count === 0 ){ // ******** $data �����݂��Ȃ��Ƃ� ********
		$msg = "�Z�b�V�����̗L���������؂�܂����B�ēx���O�C�����Ă��������B";
		include 'inc/login.php';
		exit; }
	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*
?>
