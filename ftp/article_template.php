<?php 
/*
Template Name Posts:Новость Архива
*/
function _s_styles_archive(){
	// Контакты главные
	wp_register_style('light_gallery_css', get_template_directory_uri(). '/css/lightgallery.css');
	wp_enqueue_style('light_gallery_css', get_template_directory_uri(). '/css/lightgallery.css');
}
add_action('wp_enqueue_scripts', '_s_styles_archive');

function _s_scripts_archive(){
	wp_register_script('gallery_script',  get_template_directory_uri(). '/js/lightgallery.js', array("jquery"));
	wp_enqueue_script('gallery_script');
}

add_action('wp_enqueue_scripts', '_s_scripts_archive');


get_header();
?>

<script>
	jQuery(document).ready(function(){

		$("#the_gallery").lightGallery({
				thumbnail: true,
				animateThumb: true,
				showThumbByDefault: false
			});

	});
</script>

<!-- MAIN -->
<main> 
	<?php 
		// запрашиваем категорию "Архив" 
		// getting Fields
		$archive_video_link = get_field("archive_video_link");
		$archive_photos = get_field("archive_photos");
		if (have_posts()):
			the_post();
	 ?>
	<!-- ARTICLE -->
	<div class="article">
		<div class="container clearfix">
			<div class="article-info">
				<span class="article-info-title">
					<?php the_title(); ?>
				</span>
				<span class="article-info-text">
					<?php the_content(); ?>
				</span>
			</div>

			<div class="article-right">
				<div class="article-right-video clearfix">
					<iframe class="youtube" width="720" height="480" src="<?= $archive_video_link ?>" frameborder="0" allowfullscreen></iframe>
				</div>

				<div class="article-right-photos clearfix" id="the_gallery">
				<?php 
					// отображаем фотки
					if ($archive_photos):
					foreach($archive_photos as $photo):
				 ?>
					<a class="article-right-photos-element" href="<?= $photo['url'] ?>">
						<img src="<?= $photo['url'] ?>" class="article-right-photos-element-pic">
					</a>
				<?php 
					endforeach;
					endif;
				 ?>
				</div>
			</div>
		</div>
		<div class="article-date-container">
			<span class="article-date">
				<?php the_date('d-m-Y'); ?>
			</span>
		</div>
	</div>
	<!-- END OF ARTICLE -->
	<?php endif; //end getting post ?>
	<!-- CATEGORIES -->
	<div class="categories">
		<div class="container clearfix">
		<?php 
			// запрашиваем категорию "Архив"
			$post_categories = wp_get_post_categories( get_the_ID() );
			$current_category_ID = $post_categories[0];
			$archive_posts = new WP_Query('cat='.$current_category_ID."&posts_per_page=18");
		if ($archive_posts->have_posts()):
			while ($archive_posts->have_posts()):
				$archive_posts->the_post();
		?>
			<a class="categories-element" href="<?php the_permalink(); ?>">
				<img src="<?php the_post_thumbnail_url(); ?>" class="categories-element-pic">
			</a>
		<?php 
			// have_posts()
			endwhile;
			wp_reset_postdata();
		endif;
		?>
		</div>
	</div>
	<!-- END OF CATEGORIES -->
</main>
<!-- END OF MAIN -->


<?php 
get_footer();
?>