## IMDB SCRAPER - WORDPRESS IMPORTER - MAGNET CRAWLER
This is a wordpress theme! (UPG1)
Upload it to a clean wordpress installation with no posts and follow instructions in the theme's control panel.

What is special with this theme ?
It spiders IMDB and get lots of information, thumbnails etc as posts. 

You can see an example here : [onlinemovies.pw](http://onlinemovies.pw)

![](/screenshot.png)

## Here are some basic instructions about theme, after you install it :


### There are just a few points :

- You can change the logo at : wp-content/themes/upg1/logo.png
- You should enter your own "add this" code at line 12 of file wp-content/themes/upg1/header.php
- To fill your site with information from IMDB you need to set a cron job to run at regular intervals (or run it manually). The script that fills the database is at : wp-content/themes/upg1/cron/enter.php You can set web cron jobs at setcronjob.com
- You need to edit line 63 and 70 of single-post.php with your affiliate codes
- Remove all widgets, leave only the categories one!
- Rename the Uncategorized category to All


### Possible errors :

This will work on any enviroment. I have run it on mutliple server versions on digital droplets on [digital ocean](https://www.digitalocean.com/?refcode=6e83df0e17c6) and worked fine.
If you receive an error about curl_opt and open base dirs, make sure your php.ini does not limit your base dir to anything (open_basedir = none)




