<!-- **************************************************
     **  TOP MENU 
     ************************************************** -->
<?php	include 'inc/t-menu.php'; ?>
<!-- **************************************************
     **  TOP MENU 
     ************************************************** -->



<!-- **************************************************
     **  LEFT MENU 
     ************************************************** -->
<?php
// *----------------------------*
// *	DB接続
// *----------------------------*
define('DB_INFO', 'mysql:dbname=test;host=localhost'); // DB情報
try { $dbHandle = new PDO(DB_INFO, "root", "password");

	// DBからデータ取得
	$sql = sprintf( "select id from follow where myid = '%s'", $_SESSION["id"] );
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
$c = 0;
$id = array();
foreach ($data as $var2) {
	$id[$c] = $var2['id']; // followIDに後で変える
	$c++;
}

include 'inc/my_l-menu.php';
 ?>
<!-- **************************************************
     **  LEFT MENU 
     ************************************************** -->



<!-- **************************************************
     **  CONTENTS 
     ************************************************** -->
	<div class="contents">
		<noscript>
			<p>JavaScriptが有効でないため、正常に動作しないことがあります。</p>
		</noscript>

		<hgroup>
			<h1>新着RSS</h1>
			<div class="art1">
<?php
if( $c === 0 ) print("まだ誰もフォローしていません。");
else { // ******** $data が存在するとき ********
	$def = 1;
	$page = 4;
	include 'inc/rss.php';
}
?>
			</div>
			<div class="motto"><a href="">もっと見る</a></div>
			
			<h1>新着記事</h1>
			<div class="art1">
				<h2><a href="">★　どこそこのページ</a>　by <a href="">誰某 <img src="sunset.jpg" alt="誰某"></a></h2>
				<h3>はてなブックマークはオンラインにブックマークを無料で保存できるソーシャルブックマークサービスです。みんながブックマークしたインターネット上の旬なニュースや情報が集ま...</h3>
				<h2><a href="">★　どこそこのページ</a>　by <a href="">誰某 <img src="sunset.jpg" alt="誰某"></a></h2>
				<h3>はてなブックマークはオンラインにブックマークを無料で保存できるソーシャルブックマークサービスです。みんながブックマークしたインターネット上の旬なニュースや情報が集ま...</h3>
				<h2><a href="">★　どこそこのページ</a>　by <a href="">あああ <img src="sunset.jpg" alt="誰某"></a></h2>
				<h3>はてなブックマークはオンラインにブックマークを無料で保存できるソーシャルブックマークサービスです。みんながブックマークしたインターネット上の旬なニュースや情報が集ま...</h3>
			</div>
			<div class="motto"><a href="">もっと見る</a></div>

			<h1>新着画像</h1>
			<div class="art2">
				<div><a href=""><img src="page.png" alt=""><br>ページレイアウト</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				<div><a href=""><img src="page.png" alt=""><br>ページレイアウト</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				
				<div><a href=""><img src="page.png" alt=""><br>ページレイアウト</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				<div><a href=""><img src="page.png" alt=""><br>ページレイアウト</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				
				<div><a href=""><img src="page.png" alt=""><br>ページレイアウト</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				<div><a href=""><img src="page.png" alt=""><br>ページレイアウト</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
				<div><a href=""><img src="sunset.jpg" alt=""><br>マイピクチャ</a></div>
			<br clear="all">
			</div>
			<div class="motto"><a href="">もっと見る</a></div>
		</hgroup>
		<div class="foot"></div>
	</div>
<!-- **************************************************
     **  CONTENTS 
     ************************************************** -->

</BODY>
</HTML>
