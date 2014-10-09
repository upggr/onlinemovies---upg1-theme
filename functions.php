<?php
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

  if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'automatic-feed-links' );
  if ( function_exists( 'register_nav_menu' ) ) register_nav_menu( 'menu', 'Menu' );	
  if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 130, 190, true );
add_image_size( 'test1', 300, 9999 ); 
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_top"><h1>',
		'after_title' => '</h1></div>',
	));
}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 

// x-mad code

scrapmagnets($url,$encoding);
function scrapmagnets($theurl,$encoding) {
	$var = graburl($theurl,$encoding);    
    preg_match_all ("/a[\s]+[^>]*?href[\s]?=[\s\"\']+(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/",$var, $matches);   												    
    $matches = $matches[1];
  //  $list = array();
	echo '<ul>';
    foreach($matches as $var)
    {    	

	if (strpos($var,'magnet') !== false) {
	
    $dtarget= $var;
	$dtitle =  explode( '=', $dtarget );
	$dtitle =  $dtitle[2];
	$dtitle = str_replace("+", " ", $dtitle);
	$dtitle = str_replace("%5D", "]", $dtitle);
	$dtitle = str_replace("%5B", "[", $dtitle);
	$dtitle = str_replace("%28", "(", $dtitle);
	$dtitle = str_replace("%29", ")", $dtitle);
	$dtitle = str_replace("%26amp%3B", " ", $dtitle);
	$dtitle = str_replace("%40", "@", $dtitle);
	$dtitle = str_replace("%2", "-", $dtitle);
	$dtitle = substr($dtitle, 0, -3);
	
   echo "<li><a href='".$dtarget."' title='Download ".$dtitle." via magnet link'>".$dtitle."</a></li>"; 
     
    }
	}

	echo '</ul>';
	}
function graburl($url,$encoding) {
		$ref="";
		 if(function_exists("curl_init")){
            $ch = curl_init();
            $user_agent = "Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3";
            $ch = curl_init();
   //         curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt($ch, CURLOPT_ENCODING , $encoding);
            curl_setopt( $ch, CURLOPT_HTTPGET, true );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );


            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_REFERER, $ref );
            curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
            $html = curl_exec($ch);
            curl_close($ch);
		
        }
        else{
            $hfile = fopen($url,"r");
            if($hfile){
                while(!feof($hfile)){
                    $html.=fgets($hfile,1024);
                }
            }
        }
        return $html;
				
	}	
	
//x-mad code end

add_action('admin_menu', 'upg1_create_menu');
function upg1_create_menu() {
//	$icon = get_template_directory_uri() . '/images/icon.png';
	add_menu_page(__('Just a few settings here for now :)', 'onlinemovies'), __('UPG1 Theme', 'onlinemovies'), 'administrator', 'onlinemovies-theme-settings', 'upg1_settings_page');	
}

/**
* Step 2: Create settings fields.
*/
add_action( 'admin_init', 'register_upg1settings' );
function register_upg1settings() {
	register_setting( 'upg1-settings-general', 'upg1_analytics_code' );
}

/** 
* Step 3: Create the markup for the options page
*/
function upg1_settings_page() {

?>

<div class="wrap">
<h2><?php _e('UPG1 Theme help', 'onlinemovies'); ?></h2>


<iframe src="http://upg.gr/upg1theme/instructions.html" width="100%" height="100%"></iframe>

</div>
<?php }

?>