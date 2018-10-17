<?php session_start();

$fname = htmlspecialchars( $_FILES["imgfile"]["name"], ENT_QUOTES, 'UTF-8');	// ファイル名
$fsize = htmlspecialchars( $_FILES["imgfile"]["size"], ENT_QUOTES, 'UTF-8');	// サイズ
$ftmp = htmlspecialchars( $_FILES["imgfile"]["tmp_name"], ENT_QUOTES, 'UTF-8');	// 一時ファイルの場所

$mime = getimagesize( $ftmp );
$fname = str_replace( "/", "", $fname );								// ファイル名に「/」が存在した場合削除 http://d.hatena.ne.jp/ockeghem/20110620/p1
list(,$itype) = explode( ".", $fname );									// $itype … 拡張子
    if( $fsize>300075 ) { $msg="ファイルサイズが大きすぎます。"; }
elseif( $itype!=="jpg" && $itype!=="jpeg" && $itype!=="png" && $itype!=="gif" && $itype!=="JPEG" && $itype!=="JPG" && $itype!=="PNG" && $itype!=="GIF" ){
	$msg="アップロードできるファイルは、JPEG、PNG、GIFのみです。"; }
elseif( preg_quote($fname) !== str_replace( ".", "\.", $fname ) ) { $msg="ファイル名に特殊記号（ \ + * ? [ ^ ] $ ( ) { } = ! < > | : ）が使われています。"; }
elseif( $mime["mime"]!=="image/jpeg" && $mime["mime"]!=="image/pjpeg" && $mime["mime"]!=="image/png" && $mime["mime"]!=="image/x-png" && $mime["mime"]!=="image/gif" ) {
	$msg="アップロードできるファイルは、JPEG、PNG、GIFのみです。"; }
elseif( $mime == null ) { $msg="ファイルデータが異常です。"; }
else {
	if( is_uploaded_file( $ftmp ) ) {
		$mt = explode(" ",microtime());									// 時間取得
		$time = $mt[1];													// imgテーブルの「time」
		$mt[1] = $mt[1] . sprintf( "%02d", floor($mt[0] * pow(10,2)) );	// 秒以下2桁整数化、小数点以下切捨て
		$mt[1] = base_convert( $mt[1], 10, 36 );						// 36進数変換
		$date = $mt[1] . $_SESSION["id"];								// imgテーブル、ファイル名用、「date」
		$fname = $date . "." . $itype;									// ファイル名変更

		$place = "/home/test/public_html/img/file/$fname";			// アップロード先
		$result = move_uploaded_file( $ftmp, $place );					// 移動
		$fname = "img/file/" . $fname;
	}
}
 ?>
<!DOCTYPE html>
<HTML>
	<HEAD>
<?php	readfile("inc/meta.html"); ?>
		
		<title>画像の投稿</title>
	</HEAD>


<BODY>


<?php
if( $_SESSION["id"] !== null ) {
	include 'inc/session_on.php';


	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*
	if( $count === 1 ){ // ******** $data が存在するとき ********
?>
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
<?php	include 'inc/my_l-menu.php'; ?>
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

<?php	if( $msg !== null ){ ?>
		<h1 style="background:red;">ERROR!</h1>
		<div class="art1 bold big">アップロードに失敗しました。<br><?php print htmlspecialchars( $msg, ENT_QUOTES, 'UTF-8' ); ?></div><br>
<?php	} unset( $msg ); ?>
		
		<hgroup>
			<h1>画像投稿</h1>
			<div class="art3">
			投稿できる画像のファイルサイズは、300KBまでです。
			<form action="img_sub.php" method="post" enctype="multipart/form-data" class="center">
				<input type="hidden" name="MAX_FILE_SIZE" value="300074">
				<p><input class="imgsub" type="file" accept="image/jpeg,image/pjpeg,image/png,image/x-png,image/gif" name="imgfile" required><br>
				<input class="submit imgsub" type="submit" value="送信"></p>
			</form>
			<?php 	print( "<a href=\"" );
					print( $fname );
					print( "\" target=\"_blank\"><img src=\"" );
					print( $fname );
					print("\"></a>");
if ( $result === true ) echo "アップロードしました。";
else { echo "アップロードに失敗しました。<br>" . $msg; }
 ?>
			</div>
		</hgroup>
		<div class="foot"></div>
	</div>
<!-- **************************************************
     **  CONTENTS 
     ************************************************** -->

</BODY>
</HTML>
<?php
	}


	else {
		$msg = "これは謎のエラーです！";
		include 'inc/login.php';
		exit; }
	// *----------------------------*
	// *	SESSION ID CHECK
	// *----------------------------*


}
if($_SESSION["id"] == null) {
	$msg = "セッションの有効期限が切れました。再度ログインしてください。";
	include 'inc/login.php';
	exit; }
?>