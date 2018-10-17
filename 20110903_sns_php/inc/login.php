<!-- **************************************************
     **  LEFT MENU
     ************************************************** -->
	<div class="l-menu">
		<div class="center">
			なんかSNS
		</div><br>
		<div class="art1">
			<form action="home.php" method="post" enctype="multipart/form-data" class="login center">
				<!--[if lt IE 9]><div class="disp"><![endif]-->
					<input type="text" maxlength="12" class="ime" name="id" placeholder="ID" required autofocus>
					<input type="password" maxlength="12" name="pass" placeholder="パスワード" required>
				<!--[if lt IE 9]></div><![endif]-->
				<!--[if lt IE 9]>
					<input type="text" class="ime" value="ID" maxlength="12" name="id" onfocus="if (this.value == 'ID') {this.value = '';}" onblur="if (this.value == '') {this.value = 'ID';}">
					<input type="text" value="パスワード" maxlength="12" name="pass" onfocus="if (this.value == 'パスワード') {this.value = '';}" onblur="if (this.value == '') {this.value = 'パスワード';}">
				<![endif]-->
				<input type="submit" value="ログイン" class="submit">
			</form>
		</div>
		<div class="lm-list">
			<ul>
				<li><a href="home.php">会員登録</a></li>
				<li><a href="index.html">パスワードを忘れた</a></li>
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
<?php
// *===================================*
// *	ERROR MESSAGE
// *===================================*
if( $msg !== null ){
?>
		<h1 style="background:red;">ERROR!</h1>
		<div class="art1 bold big"><?php print htmlspecialchars( $msg, ENT_QUOTES, 'UTF-8' ); ?></div><br>
<?php
	unset( $msg );
	$_SESSION = array();
	session_destroy();
}
// *===================================*
// *	ERROR MESSAGE
// *===================================*
?>
		<noscript>
			<p>JavaScriptが有効でないため、正常に動作しないことがあります。</p>
		</noscript>
		
		<hgroup>
			<h1>新着RSS</h1>
			<div class="art1">
<?php
$def = 0;
$page = 7;
include 'inc/rss.php';
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
