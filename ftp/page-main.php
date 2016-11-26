<?php 
get_header();
if (have_posts()):
	while(have_posts()):
		the_post();
?>
<!-- MAIN -->
<main> 

	<!-- SLIDER -->
	<?php 
	$show_slider = get_field('show_slider');
	$president_avatar = get_field('president_avatar');
	$president_avatar = $president_avatar['url'];
	$president_name = get_field('president_name');
	if ( $show_slider ):
	?> 
		<div class="main-slider">
			<ul class="bxslider" style="margin: 0;">
				<?php
				//отобразим слайдер
				$slider_images = get_field('slider_images');
				$i = 0;
				while (have_rows("slider_links")):
					the_row();
					$slider_links[$i] = get_sub_field("slider_link");
					$i++;
				endwhile;
				$i = 0;
				foreach ($slider_images as $slider_image):
				?> 
				<li>
					<div class="slider-image">
						<a target="_blank" href="<?= $slider_links[$i] ?>">
							<img src="<?= $slider_image['url']  ?>" alt="">
						</a>
					</div>
				</li>
			  	<?php $i++; endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>
	<!-- END OF SLIDER -->

	<div class="about">
		<div class="container">
			<span class="about-title">О нас</span>
			<div class="about-info-container">
				<div class="about-info clearfix">
					<span class="about-info-pic">
						<img src="<?= $president_avatar ?>" alt="">
					</span>
					<span class="about-info-text">
						<?php 
						the_content();
						?>		 			
					</span> 
				</div>
				<span class="about-info-subtext clearfix">
					<span class="about-info-subtext-text"> 
						Президент Фонда : <?= $president_name ?>
					</span>
				</span>
			</div>
		</div>
	</div>
</main>
<!-- END OF MAIN -->
<?php 
endwhile;
endif;
get_footer(); 
?>