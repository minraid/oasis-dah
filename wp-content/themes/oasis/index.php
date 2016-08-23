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
                </div>
            </div>
            <div class="logos">
                <div class="arrow left"></div>
                <div class="logo-box">
                    <ul>
                        <li><img src="/wp-content/themes/oasis-dah/img/logo/1.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah/img/logo/2.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah/img/logo/3.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah/img/logo/4.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah/img/logo/5.png" alt=""></li>
                        <li><img src="/wp-content/themes/oasis-dah/img/logo/6.png" alt=""></li>
                    </ul>
                </div>
                <div class="arrow right"></div>
            </div>
        </div>
    </section>
    <?php get_footer( ); ?>