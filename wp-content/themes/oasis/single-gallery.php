<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content" ng-controller="galleryCtrl as gallery">
                <?php if(have_posts()) { 
                    the_post();
                    $gallery = get_field('gallery', $post->ID);
                    $breadcrumbs = '<a href="/">Головна</a> > <a routerLink="/gallery">Галерея</a> > '.$post->post_title; ?>
                    <div class="breadcrumbs">
                        <?= $breadcrumbs; ?>
                    </div>
                    <h1><?= $post->post_title; ?></h1>
                    <div class="album-gallery">
                        <?php 
                        foreach ($gallery as $key => $img) { ?>
                        <div class="photo" ng-click='gallery.showGallery(<?php echo( json_encode($gallery) .",". $key); ?>);'>
                            <div class="thumbnail">
                                <img src="<?= $img['sizes']['medium']; ?>" alt="">
                                <div class="heading"><?= $img['title']; ?></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="logos">
                <div class="arrow left"></div>
                <div class="logo-box">
                    <ul>
                        <li><img src="/wp-content/themes/oasis-dah<?php bloginfo('template_url'); ?>/img/logo/1.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah<?php bloginfo('template_url'); ?>/img/logo/2.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah<?php bloginfo('template_url'); ?>/img/logo/3.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah<?php bloginfo('template_url'); ?>/img/logo/4.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah<?php bloginfo('template_url'); ?>/img/logo/5.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah<?php bloginfo('template_url'); ?>/img/logo/6.png" alt=""></li>
                    </ul>
                </div>
                <div class="arrow right"></div>
            </div>
            <popup class="img" gallery></popup>
        </div>
    </section>
    <?php get_footer( ); ?>