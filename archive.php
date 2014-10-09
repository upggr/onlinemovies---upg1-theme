<?php include (TEMPLATEPATH . '/header.php'); ?>

<!-- Main -->
<?php echo 'ffffffffff';?>

    <!-- end Box -->
<div class="single1"> 
<div class="singleleft"> 
    <!-- Box -->
    <div class="box box2">
      <?php $i=1; ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
          <span class="comments">12</span> </div>
      </div>
      <?php }?>
      <?php endwhile; ?>
      <?php else : ?>
      <?php endif; wp_reset_query(); ?>
      <!-- end Movie -->
      <div class="cl">&nbsp;</div>
    </div>
    <!-- end Box -->
    <?php 
?>
  </div>
  <!-- end Content --> <div class="singleright"><?php dynamic_sidebar( 'Main Sidebar' ); ?></div>
  </div>
  

</div>
<div class="cl">&nbsp;</div>
</div>
<!-- end Main -->

<?php include (TEMPLATEPATH . '/footer.php'); ?>
