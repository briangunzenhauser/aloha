<?php
/* Template Name: Work Page */
/**
 * The template for displaying the work page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aloha
 */

get_header();
?>

	<div id="primary" class="content-area work">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();
?>
			
			<section>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?> 
			</section>			
<?php

			// Loop through Projects.
			if(have_rows("projects")): ?>
			<div class="projects"> 
<?php
				while(have_rows("projects")): the_row();
					$project = get_sub_field('project');
					if($project):
						$post = $project;
						setup_postdata($post);

						// Get thumbnail
						$thumbnail = get_field("thumbnail");

		?>

		<a class="project" href="<?php the_permalink(); ?>">
			
			<img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>">
			<h3><?php the_title(); ?></h3>
			<span class="type"><?php the_field("project_type"); ?></span>
			<!-- <button>View Project</button> -->
		</a> <!-- .staff-member -->

		<?php
						wp_reset_postdata();
					endif;
				endwhile; ?>
				</div>
<?php				
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
