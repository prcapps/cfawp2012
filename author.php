	<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
    <div class="wrap clearfix" id="inner">
    	<div id="maincontent">



<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

		<header class="post-header isolate">
			<h2>Posts by <?php printf( esc_attr__( '%s', 'twentyten' ), get_the_author() ); ?></h2>
			<div id="author-avatar" style="float: left;  margin: 0.5em 0.8em 0px 0px;">
  				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 120 ) ); ?>
  			</div>
  					
  		</header>

  		<p><?php the_author_meta( 'description' ); ?></p>
<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the author archive page to output the authors posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-author.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'author' );
?>

    	</div>
    
	</div>


<?php get_footer(); ?>