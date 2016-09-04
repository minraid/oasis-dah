<?php get_header( ); ?>
<section class="content-inner">
    <div class="banner">
        <div class="img"></div>
        <div class="cover-handler">
            <div class="container">
                <div class="cover">
                    <div class="text-box">
                        <h2>Елітні покрівельні матеріали найвищої якості</h2>
                        <p>Продаж, монтаж, доставка та надання довідкової інформації про елітні покрівельні матеріали високої якості</p>
                    </div>
                </div>
            </div>
        </div>
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