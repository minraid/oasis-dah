<?php get_header( ); ?>
<section class="content-inner">
    <div class="banner" slider>
        <?php $banners = get_field('banners', 'options');
        if(!empty($banners)) {
            echo '<ul style="width: '.(count($banners)*100).'%">';
            foreach ($banners as $banner) { ?>
                <li style="width:<?= (100/count($banners)); ?>%">
                    <div class="img">
                        <img src="<?= $banner['img']['url']; ?>"/>
                    </div>
                    <div class="cover-handler">
                        <div class="container">
                            <div class="arrow left" ng-click="slide(true)">
                                <i class="icon" icon="'arrow-left'"></i>
                            </div>
                            <div class="cover">
                                <div class="text-box">
                                    <h2><?= $banner['heading']; ?></h2>
                                    <p><?= $banner['text'] ?></p>
                                </div>
                            </div>
                            <div class="arrow right" ng-click="slide(false)">
                                <i class="icon" icon="'arrow-right'"></i>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
        } ?>
    </div>
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <?php 
                if(have_posts()) { 
                    the_post(); ?>
                    <h1><?php the_title( ); ?></h1>
                    <div><?php the_content( ); ?></div>
                    <?php 
                }; 
                ?>
            </div>
        </div>
        <?php get_sidebar( 'logos' ); ?>
    </div>
</section>
<?php get_footer( ); ?>