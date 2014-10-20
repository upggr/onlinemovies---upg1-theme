<?php include (TEMPLATEPATH . '/header.php'); ?>
 <?php setPostViews(get_the_ID()); ?>
<!-- Main -->


<div class="single1"> 
<div class="singleleftwrapper">
<div class="singleleft"> 
<div class="top"> 
<h1><?php the_title(); ?> <?php echo get_post_meta( $post->ID,'year','true') ?> - <?php echo get_post_meta( $post->ID,'tagline','true') ?> Watch Live Now<strong></strong></h1></div>

<div class="thebody"> 

<table class="play_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;padding-bottom:10px;border:#323232 1px solid;border-top:0px;">
        <tbody><tr>
          <td><div class="play_pic"><a href="http://www.webtrackerplus.com/?page=flowplayerregister&a_aid=5788g1795s84s&a_bid=f2dddc66&q=<?php the_title(); ?>" target="_blank"><?php the_post_thumbnail(); ?></a></div></td>
		  <td><div class="play_about">
				  <ul>
					<li>						
						<div class="movie_about_play">
						  <div class="movie_play_text">							
							Genre: <?php
$categories = get_the_category();
$separator = ' / ';
$output = '';
if($categories){
	foreach($categories as $category) {
		if ($category->term_id != '1'){;
		$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
	}}
echo trim($output, $separator);
}
?><br>
							Release: <?php echo get_post_meta( $post->ID,'release_date','true') ?><br>
							Views: <?php  echo getPostViews(get_the_ID()); ?>
<br>
							IMDB link: <a href="<?php echo get_post_meta( $post->ID,'imdb_url','true') ?>" target="_blank">IMDB</a> </div>
						  <div class="movie_about_rete">
							<div class="vote">
							  <div id="Mark">
								<ul class="unit-rating" style="width:100px; ">
								           <div class="stars">
            <span class="rating-static rating-<?php echo (round((get_post_meta( $post->ID,'rating','true')/2),0,PHP_ROUND_HALF_UP)*10); ?>"></span>
          </div>

								</ul>
								<div id="Maro">IMDB Rating : <?php echo get_post_meta( $post->ID,'rating','true') ?><br>IMDB Votes : <?php echo get_post_meta( $post->ID,'votes','true') ?></div>
                                
                                <div id="Maro">Plot : <?php echo get_post_meta( $post->ID,'plot','true') ?></div>
                                
                               
							  </div> 
                            </div>
                          </div>

                       </div>
					</li>
				  </ul>
			</div></td>
        </tr>
      </tbody></table>
      <div class="addthis_native_toolbox"></div>
      <div><a href="http://www.webtrackerplus.com/?page=flowplayerregister&a_aid=5788g1795s84s&a_bid=f2dddc66&q=<?php the_title(); ?>" target="_top"><img src="https://gs1.wac.edgecastcdn.net/8051D5/affbeat/banners/Movies-Hub/468x60/mov_468x60_2.png" alt="" title="" width="468" height="60" /></a></div>
</div>
<?php //comments_template(); ?>


<div class="singleleft"> 
<div class="top"> 
<h1><a href="http://www.webtrackerplus.com/?page=torrent&a_aid=5788g1795s84s&a_bid=0d823973&q=<?php the_title(); ?>">Download <?php the_title(); ?> <?php echo get_post_meta( $post->ID,'year','true') ?> directly here (some results found)</a><strong></strong></h1></div>

<div class="thebody"> 

<table class="play_table" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;padding-bottom:10px;border:#323232 1px solid;border-top:0px;">    
<tbody>
 <tr>
    <td class="nicelist">
	<?php 
	$thetitle = trim(get_the_title(),'"').' '.get_post_meta( $post->ID,'year','true');
	$theurl = 'https://thepiratebay.se/search/'.$thetitle.'/0/7/0'; 
	//echo $theurl;
	scrapmagnets($theurl,'gzip');  
	 ?></td>
  </tr>
  <tr>
    <td><?php //comments_template(); ?></td>
   
  </tr>
  <tr>
    <td></td>
  
  </tr>
</tbody> 
     </table>
</div>

</div>
</div>
</div>
<div class="singleright"><?php dynamic_sidebar( 'Main Sidebar' ); ?></div>
</div>


 






  </div>
  <!-- end Content --> 
  
  <div class="cl">&nbsp;</div>
</div>
<!-- end Main -->
<!-- begin adf.ly conversion tracking --><img src="http://adf.ly/ad/conv?aid=474528" width="1" height="1" border="0" hspace="0" vspace="0" /><!-- end adf.ly conversion tracking -->
<?php include (TEMPLATEPATH . '/footer.php'); ?>
