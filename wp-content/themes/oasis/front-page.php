<?php get_header( ); ?>
<section class="content-inner">
    <?php $banners = get_field('banners', 'options');
        if(!empty($banners)) { ?>
        <div class="banner" slider='<?php echo json_encode($banners); ?>'></div>
        <?php } ?>
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