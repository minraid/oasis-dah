<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <?php if(have_posts()) { the_post(); ?>
                    <h1><?php the_title( ); ?></h1>
                    <div><?php the_content( ); ?></div>
                    <?php }; ?>
                <div class="links">
                    <div class="link-wrap">
                        <a href="/dealer" class="link">
                            <i class="icon dealer" icon="'dealer'"></i>
                            <span><!--:uk-->Дилерам<!--:--><!--:ru-->Диллерам<!--:--></span>
                            <i class="icon arrow" icon="'arrow-red'"></i>
                        </a>
                    </div>
                    <div class="link-wrap">
                        <a href="/architect" class="link">
                            <i class="icon architect" icon="'architect'"></i>
                            <span><!--:uk-->Архітекторам та будівельникам<!--:--><!--:ru-->Архитекторам и строителям<!--:--></span>
                            <i class="icon arrow" icon="'arrow-red'"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php get_sidebar( 'logos' ); ?>
    </div>
</section>
<?php get_footer( ); ?>