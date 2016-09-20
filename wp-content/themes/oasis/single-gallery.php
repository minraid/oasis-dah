<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content" ng-controller="galleryCtrl as gallery">
                <?php if(have_posts()) { 
                    the_post();
                    $gallery = get_field('gallery', $post->ID);
                    $breadcrumbs = '<a href="/">' . __('[:ua]Головна[:ru]Главная[:]') . '</a> > <a href="/gallery">' . __('[:ua]Галерея[:ru]Галерея[:]') . '</a> > '.$post->post_title; ?>
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
            <?php get_sidebar( 'logos' ); ?>
            <popup class="img" gallery></popup>
        </div>
    </section>
    <?php get_footer( ); ?>