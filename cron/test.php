<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
include_once"../../../../wp-config.php";
include_once"../../../../wp-load.php";
include_once"../../../../wp-includes/wp-db.php";
//$imdbid = $_GET["imdbid"];
include("imdb.php"); 

$title = 'Girlds';

echo $title;

function wp_exist_post_by_title($title_str) {
global $wpdb;
$daresult = $wpdb->get_row("SELECT * FROM wp_posts WHERE post_title = '" . $title_str . "'", 'ARRAY_A');
if(count($daresult) > 0)
{
    echo 'Error';
}
else
{
    echo 'No Error';
}
}

wp_exist_post_by_title($title);
?>


