<?php if ( comments_open() ) : ?>
        <div id="fbcomments"><div id="fb-root"></div><script src="http://connect.facebook.net/en_EN/all.js#xfbml=1"></script><fb:comments href="<?php the_permalink(); ?>" ></fb:comments></div>
    <?php endif; ?>
</div>