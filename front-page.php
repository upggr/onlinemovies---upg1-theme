<?php include (TEMPLATEPATH . '/header.php'); ?>

<!-- Main -->


    <!-- end Box -->
    <?php 
  $args = array(
  'orderby' => 'name',
  'parent' => 0
  );
$categories = get_categories( $args );
foreach ( $categories as $category ) {
	if ($category->term_id != '1'){;
	$category_link = get_category_link( $category->term_id  );
	?>
    
    <!-- Box -->
    <div class="box">
      <div class="head">
        <h2>LATEST ADDITIONS IN THE <a href="<?php echo esc_url( $category_link ); ?>"><?php echo strtoupper($category->name);?></a> CATEGORY</h2>
        <p class="text-right"><a href="<?php echo esc_url( $category_link ); ?>">See all</a></p>
      </div>
      <?php $i=1; ?>
      <?php query_posts('cat='.$category->term_id.'&showposts=6'); if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php if ( has_post_thumbnail() ) { ?>
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
      <?php $i++; }?>
      <?php endwhile; ?>
      <?php else : ?>
      <?php endif; wp_reset_query(); ?>
      <!-- end Movie -->
      <div class="cl">&nbsp;</div>
    </div>
    <!-- end Box -->
    <?php } }
?>
  </div>
  <!-- end Content --> 
  
 
  <!-- end Coming -->
  <div class="cl">&nbsp;</div>
</div>
<!-- end Main -->

<?php include (TEMPLATEPATH . '/footer.php'); ?>
