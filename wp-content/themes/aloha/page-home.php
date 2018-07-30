<?php
/* Template Name: Home Page */
/**
 * The template for displaying the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aloha
 */

get_header();
?>

	<div id="primary" class="content-area home">
		<main id="main" class="site-main">



		<?php
		while ( have_posts() ) : the_post();
?>
			<section>
				<?php the_content(); ?>
			</section>			
<?php

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
