<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once"../../../../wp-config.php";
include_once"../../../../wp-load.php";
include_once"../../../../wp-includes/wp-db.php";
include("imdb.php"); 

$randomurl="http://www.imdb.com/random/title"; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $randomurl);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$a = curl_exec($ch);
$randomurl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$imdbid = substr($randomurl, -10);
$imdbid = substr($imdbid, 0,-1);
//$imdbid = 'tt'.mt_rand(1000000, 9999999);
$imdb = new Imdb();
$movieArray = $imdb->getMovieInfoById($imdbid);
$title_id = $movieArray['title_id'];
$imdb_url = $movieArray['imdb_url'];
$title = $movieArray['title'];
echo $title;
echo '<br>';
$title = preg_replace("/[^a-zA-Z0-9&+-: ]+/", "", html_entity_decode($title));
echo $title;
echo '<br>';
$year = $movieArray['year'];
$rating = $movieArray['rating'];
$mpaa_rating = $movieArray['mpaa_rating'];
$release_date = $movieArray['release_date'];
$tagline = $movieArray['tagline'];
$plot = $movieArray['plot'];
$poster = $movieArray['poster'];
$poster_large = $movieArray['poster_large'];
$poster_full = $movieArray['poster_full'];
$runtime = $movieArray['runtime'];
$oscars = $movieArray['oscars'];
$awards = $movieArray['awards'];
$nominations = $movieArray['nominations'];
$votes = $movieArray['votes'];
$language = implode(",", $movieArray['language']);
$country = implode(",", $movieArray['country']);
$also_known_as = implode(",", $movieArray['also_known_as']);
$media_images = implode(",", $movieArray['media_images']);
$videos = implode(",", $movieArray['videos']);
$directors = implode(",", $movieArray['directors']);
$writers = implode(",", $movieArray['writers']);


echo $title.'<br>';
echo $year.'<br>';
echo $plot.'<br>';
echo $title_id.'<br>';
echo $imdb_url.'<br>';
echo $rating.'<br>';
echo $mpaa_rating.'<br>';
echo $release_date.'<br>';
echo $tagline.'<br>';
echo $poster.'<br>';
echo $poster_large.'<br>';
echo $poster_full.'<br>';
echo $runtime.'<br>';
echo $oscars.'<br>';
echo $awards.'<br>';
echo $nominations.'<br>';
echo $votes.'<br>';
echo $language.'<br>';
echo $country.'<br>';
echo $also_known_as.'<br>';
//echo $media_images.'<br>';
echo $videos.'<br>';
echo $directors.'<br>';
echo $writers.'<br>';





$my_post = array(
     'post_title' => $title,
     'post_content' => $plot,
     'post_status' => 'publish'
  );

$post_id = wp_insert_post($my_post);
add_post_meta($post_id, 'title_id', $title_id, true);
add_post_meta($post_id, 'imdb_url', $imdb_url, true);
add_post_meta($post_id, 'title', $title, true);
add_post_meta($post_id, 'year', $year, true);
add_post_meta($post_id, 'rating', $rating, true);
add_post_meta($post_id, 'mpaa_rating', $mpaa_rating, true);
add_post_meta($post_id, 'release_date', $release_date, true);
add_post_meta($post_id, 'tagline', $tagline, true);
add_post_meta($post_id, 'plot', $plot, true);
add_post_meta($post_id, 'poster', $poster, true);
add_post_meta($post_id, 'poster_large', $poster_large, true);
add_post_meta($post_id, 'poster_full', $poster_full, true);
add_post_meta($post_id, 'runtime', $runtime, true);
add_post_meta($post_id, 'oscars', $oscars, true);
add_post_meta($post_id, 'awards', $awards, true);
add_post_meta($post_id, 'nominations', $nominations, true);
add_post_meta($post_id, 'votes', $votes, true);
add_post_meta($post_id, 'language', $language, true);
add_post_meta($post_id, 'country', $country, true);
add_post_meta($post_id, 'also_known_as', $also_known_as, true);
//add_post_meta($post_id, 'media_images', $media_images, true);
add_post_meta($post_id, 'videos', $videos, true);
add_post_meta($post_id, 'genres', $genres, true);
add_post_meta($post_id, 'directors', $directors, true);
add_post_meta($post_id, 'writers', $writers, true);
wp_set_post_tags( $post_id, $movieArray['genres'], true );
insertimageandsetdefault($poster_large,$post_id,$title);
echo '<br>-----<br>';

foreach ($movieArray['genres'] as &$genre) {
    insertcategories($post_id,$genre,$title);
	echo $genre;
	echo '<br>';
}

function insertcategories($pid,$cat_name) {
$taxonomy = 'category';
$append = true ;
$cat  = get_term_by('name', $cat_name , $taxonomy);
if($cat == false){
    $cat = wp_insert_term($cat_name, $taxonomy);
    $cat_id = $cat['term_id'] ;
}else{$cat_id = $cat->term_id;}
$res=wp_set_post_terms($pid,array($cat_id),$taxonomy ,$append);
var_dump( $res );
}
$i = 0; 
foreach ($movieArray['media_images'] as &$image) if ($i < 10 ){
 //   justinsertimage($image,$post_id,$title);
	echo $image;
	echo '<br>';
	$i +=1;
}



function insertimageandsetdefault($image,$post_id,$title) {
    		$upload_dir = wp_upload_dir();
            $image_data = file_get_contents($image);
            $filename = basename($image);
            if(wp_mkdir_p($upload_dir['path']))
            $file = $upload_dir['path'] . '/' . $filename;
            else
            $file = $upload_dir['basedir'] . '/' . $filename;
            file_put_contents($file, $image_data);
            $wp_filetype = wp_check_filetype($filename, null );
            $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
            require_once('../../../../wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
            wp_update_attachment_metadata( $attach_id, $attach_data );
            set_post_thumbnail( $post_id, $attach_id );
}

function justinsertimage($image,$post_id,$title) {
    		$upload_dir = wp_upload_dir();
            $image_data = file_get_contents($image);
            $filename = basename($image);
            if(wp_mkdir_p($upload_dir['path']))
            $file = $upload_dir['path'] . '/' . $filename;
            else
            $file = $upload_dir['basedir'] . '/' . $filename;
            file_put_contents($file, $image_data);
            $wp_filetype = wp_check_filetype($filename, null );
            $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => $title,
            'post_content' => '',
            'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
            require_once('../../../../wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
            wp_update_attachment_metadata( $attach_id, $attach_data );
}






?>


