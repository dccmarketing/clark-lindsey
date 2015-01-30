
		</div><!-- .container -->

		  <br clear="all" />
	</div> <?php // ends cs_content ?>

	<footer class="cs_footer"><?php

		foreach ( range( 1,5 ) as $bar ) {

			?><div id="footer<?php echo $bar ?>" class="widget-area footerwidget" role="complementary"><?php

				dynamic_sidebar( 'footer'.$bar );

			?></div><!-- #footer --><?php

		} // foreach

		do_action( 'site_info' );

	?></footer>
</div><?php

wp_footer();

?></body>
</html>