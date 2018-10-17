<!-- **************************************************
     **  LEFT MENU
     ************************************************** -->
	<div class="l-menu">
		<div class="center">

			<?php
			print( "<a href=\"?id=" );
			print htmlspecialchars( $id, ENT_QUOTES, 'UTF-8' );
			print( "\"><img src=\"" );
			print( "../sunset.jpg" );
			print( "\" alt=\"" );
			print htmlspecialchars( $var['name'], ENT_QUOTES, 'UTF-8' );
			print( "\"><br>" );
			print htmlspecialchars( $var['name'], ENT_QUOTES, 'UTF-8' );
			print( "</a>\n" );
			 ?>

		</div>
		
		<div class="lm-list">
			<ul>
				<li><a href="">なにか</a></li>
				<li><a href="">メニューとか</a></li>
			</ul>
		</div>
		<div class="foot"></div>
	</div>
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
$page = 2;
include 'rss.php';
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
