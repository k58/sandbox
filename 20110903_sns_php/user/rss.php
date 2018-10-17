<?php
// *===================================*
// *	RSS
// *===================================*

	// *----------------------------*
	// *	DB接続
	// *----------------------------*
	define('DB_INFO', 'mysql:dbname=test;host=localhost'); // DB情報
	try { $dbHandle = new PDO(DB_INFO, "root", "password");

		// DBからデータ取得
		$data = array();
		$sql = sprintf( "select rss from login where id = '%s'", $id ); // 一部ユーザー
		$stmt = $dbHandle->query( $sql );
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



define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
require_once '../inc/magpie/rss_fetch.inc';

$sort = array();
foreach ($data as $var) {
	$rss = fetch_rss( $var['rss'] );

	for($i=0 ; $i<$page ; $i++){
	$title = htmlspecialchars($rss->items[$i][title], ENT_QUOTES, 'UTF-8');
	$title = mb_convert_encoding($title, "UTF-8", "auto");
	$url = htmlspecialchars($rss->items[$i][link], ENT_QUOTES, 'UTF-8');

	$time = htmlspecialchars($rss->items[$i][date_timestamp], ENT_QUOTES, 'UTF-8');
		if ( $time == null ){
		$time = $rss->items[$i][pubdate];
		$time = strtotime( $time );
			if ( $time == null ){
			$time = $rss->items[$i][date];
			$time = strtotime( $time );
				if ( $time == null ){
				$time = $rss->items[$i]['dc']['date'];
				$time = strtotime( $time );
					if ( $time == null ){
					$time = $rss->items[$i][published];
					$time = strtotime( $time );
						if ( $time == null ){
						$time = $rss->items[$i][created];
						$time = strtotime( $time );
						}
					}
				}
			}
		}
	if( $time == null ) break; // 記事がない場合
	$date = date('Y/n/j', $time); // UNIX時間 → 年/月/日

	$des = $rss->items[$i][description];
	$des = mb_convert_encoding($des, "UTF-8", "auto");
	$des = htmlspecialchars(strip_tags($des), ENT_QUOTES, 'UTF-8');
	mb_internal_encoding("UTF-8");
	if (  mb_strlen( $des )>200 ) $des = mb_substr($des, 0, 200). "...";
	$des = ereg_replace( "(\r\n|\r|\n)" , "<br>" , $des );
	$des = ereg_replace("\t", "", $des);


	$txt = "\t\t\t\t<h2><a href=\"$url\">◆ $title\n\t\t\t\t [$date] </a></h2>\n\t\t\t\t<h3>{$des}</h3>\n";
	$sort["{$time}"] = $txt;
	}

}
krsort($sort);


$count = 1;
foreach ($sort as $new) {
	print($new);
	if( $count == $page ) break;
	$count++;
}
// *===================================*
// *	RSS
// *===================================*
?>
