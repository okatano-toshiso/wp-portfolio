<?php
/*
Template Name: garally
*/
?>
<?php get_header(); ?>
<?php
     //URLとして渡されたパラメータを取得し、
     //$par01という変数に入れておく。
     $brand = $_GET['brand'];
?>
<style>
.<?php echo $brand ?> {
	background-color: #ccc;
}
.a<?php echo $price ?> {
	background-color: #ccc;
}
.<?php echo $type ?> {
	background-color: #ccc;
}
</style>


<div id="slideimage2" style="background-image:url(<?php the_field('logo',247); ?>)" class="text-center">
	<div class="takasa60 hidden-lg hidden-md hidden-xs"></div>
	<h1>
		GARALLY
	</h1>
</div>




<div class="takasa30"></div>
<div class="brand2">
	<div class="contensimage2">
		<div class="wrapper">
				<div class="takasa15"></div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
						<div style=" height: 270px; width: 100%; background-size: cover; background-position: center center; background-repeat: no-repeat; background-image: url(<?php the_field('logo',108); ?>);"></div>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">
						<div class="haba90">
							<div class="takasa15 hidden-lg hidden-md"></div>
							<div class="takasa15"></div>
							<h2 class="text-left zero">絞り込み</h2>
							<div class="takasa15"></div>
							<div class="haba90" style="clear: both;">
								<p class="text-left zero filter">
									制作種別から絞り込む
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
											<a href="<?php echo home_url(); ?>/works/?brand=WEB" class="brand_btn WEB">WEB</a>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
											<a href="<?php echo home_url(); ?>/works/?brand=BANNER" class="brand_btn BANNER">BANNER</a>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
											<a href="<?php echo home_url(); ?>/works/?brand=LP" class="brand_btn LP">LP</a>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 text-center">
											<a href="<?php echo home_url(); ?>/works/?brand=PROPOSAL" class="brand_btn PROPOSAL">PROPOSAL</a>
										</div>
									</div>
								</p>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
									<div class="haba90">
										<p class="text-left filter">
											全て表示
										</p>
										<a href="<?php echo home_url(); ?>/works/" class="brand_btn">ALL</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<div class="takasa15"></div>
<hr />
<div class="wrapper text-center">
	<h2>一覧</h2>
	
	<section id="wrapper" style="background-color: #fff;">
<?php
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
$args = Array(
	'post_type' => 'post',
	'posts_per_page' => 8,
	'paged' => $paged,
	'category' => 6,
	'meta_query' => array(array(
	'key' => 'brand',
	'value' => $brand,
	'compare' =>'LIKE',
	),
	'relation' => 'AND'
	),
    );
query_posts($args); 
if (have_posts()) :
while(have_posts()) : the_post();
?>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-left" style="min-height: 420px; overflow: hidden;">
			<div class="yokohaba95">
				<a href="<?php the_permalink(); ?>">
					<!-- img src="<?php the_field('image'); ?>" class="garallysize" / -->
					<div class="frame">
						<div class="garallyimg" style="background-image: url(<?php the_field('image'); ?>);"></div>
					</div>
				</a>
				<p class="case_title text-center" style="height: 30px; line-height: 30px; overflow: hidden; margin: 0 ;">
					<strong><?php echo mb_substr($post->post_title, 0, 20); ?>...</strong><br />
				</p>
				<p class="text-left zero comment">
					<?php echo mb_substr((post_custom('information')),0,80); ?>...
				</p>
				<div class="takasa15"></div>
				<div class="text-center">
					<a href="<?php the_permalink(); ?>" class="detail">
						詳細はこちら　<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="takasa15"></div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else: ?>
		<?php endif; ?>
		</div><!--row-->
		<div class="takasa45"></div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="background-color: #fff;">
			<div class="pagenavi" style="display: inline-block;">
				<?php if (function_exists("pagination")) {
				pagination($additional_loop->max_num_pages);
				} ?>
			</div>
		</div>
	</section>	
	<div class="takasa60"></div>
</div>
<?php get_footer(); ?>
