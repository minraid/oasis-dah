<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <div class="news">
                    <?php 
                    $args = [
                    'post_type' => 'post'
                    ];
                    query_posts( $args );
                    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="post">
                        <h2>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="post-box">
                            <div class="img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="post-content">
                                <div class="post-details">
                                    <div class="date"><?php the_date(); ?></div>
                                    <div class="comments"><a href="<?php the_permalink(); ?>"><?php comments_number(); ?></a></div>
                                </div>
                                <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="link">Читати далі</a>
                            </div>
                        </div>
                    </div>
                    <!-- post -->
                <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="logos">
    <div class="arrow left"></div>
    <div class="logo-box">
        <ul>
            <li><img src="<?php bloginfo('template_url'); ?>/img/logo/1.png" alt=""></li>
            <li><img src="<?php bloginfo('template_url'); ?>/img/logo/2.png" alt=""></li>
            <li><img src="<?php bloginfo('template_url'); ?>/img/logo/3.png" alt=""></li>
            <li><img src="<?php bloginfo('template_url'); ?>/img/logo/4.png" alt=""></li>
            <li><img src="<?php bloginfo('template_url'); ?>/img/logo/5.png" alt=""></li>
            <li><img src="<?php bloginfo('template_url'); ?>/img/logo/6.png" alt=""></li>
        </ul>
    </div>
    <div class="arrow right"></div>
</div>
</div>
</section>
<?php get_footer( ); ?>