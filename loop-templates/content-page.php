<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="title-block">
			<h1 class="dlinq-title">
				<span class="dig-title">Digital</span>
				Teaching &amp; Learning<span class="fellows-title">Fellows</span>
			</h1>
		</div>
		<div id="read-me" class="main-body">
			<?php
			the_content();
			understrap_link_pages();
			?>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
