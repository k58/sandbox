	<div class="l-menu">
		<div class="center">

			<?php
			print( "<a href=\"user/?id=" );
			print htmlspecialchars( $var['id'], ENT_QUOTES, 'UTF-8' );
			print( "\"><img src=\"" );
			print( "sunset.jpg" );
			print( "\" alt=\"" );
			print htmlspecialchars( $var['name'], ENT_QUOTES, 'UTF-8' );
			print( "\"><br>" );
			print htmlspecialchars( $var['name'], ENT_QUOTES, 'UTF-8' );
			print( "</a>\n" );
			 ?>

		</div>
		
		<div class="lm-list">
			<ul>
				<li><a href="">フォロー一覧とか</a></li>
				<li><a href="">フォロー一覧とか</a></li>
			</ul>
		</div>
		<div class="foot"></div>
	</div>
