<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aloha
 */

get_header();
?>

	<div id="primary" class="content-area work-single">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();
?>
			<section>
				<h2><?php the_title(); ?></h2>

				<section class="project-meta">
					<dl>
						<dt>Project Type</dt>
						<dd><?php the_field("project_type"); ?></dd>
					</dl>
					<dl>
						<dt>Date Launched</dt>
						<dd><?php the_field("date_launched"); ?></dd>
					</dl>
					<?php 
						$partners = get_field("partners");
						if($partners):
					?>
					<dl>
						<dt>Partners</dt>
						<dd><?php the_field("partners"); ?></dd>
					</dl>
					<?php 
						endif;
					?>
				</section>

			</section>

<?php
			if(have_rows("content")):
				while(have_rows("content")): the_row();
					$content_image = get_sub_field("image_content");
					if(get_row_layout() == "image"):
?>						

			<div class="project-image">
				<figure>
					<img src="<?php echo $content_image['url'] ?>" alt="<?php echo $content_image['alt']; ?>
					">
					<figcaption><?php echo $content_image['caption'] ?></figcaption>
				</figure>
			</div>
<?php 
					elseif(get_row_layout() == "text_content"):
?>
			<div class="project-content">
				<?php the_sub_field("text_content"); ?>
			</div>								
<?php
					endif;					
				endwhile;
			endif;

			$link = get_field("project_link");
?>
			<div class="view-project">
				<a href="<?php echo $link['link_url']; ?>" target="_blank" class="button view"><?php echo $link['link_text']; ?></a>
			</div>
<?php							
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
