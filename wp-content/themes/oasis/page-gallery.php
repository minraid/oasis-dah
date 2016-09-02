<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <div class="gallery">
                    <?php 
                    $args = ['post_type' => 'gallery', 'posts_per_page' => 8]; 
                    $posts = get_posts($args);
                    foreach($posts as $post) { ?>
                        <div class="album">
                            <a href="<?= $post->guid; ?>">
                                <div class="thumbnail">
                                    <?= get_the_post_thumbnail($post); ?>
                                    <div class="heading"><?= $post->post_title; ?></div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
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
        </div>
    </section>
    <?php get_footer( ); ?>