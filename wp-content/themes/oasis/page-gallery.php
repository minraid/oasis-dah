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
            <?php get_sidebar( 'logos' ); ?>
        </div>
    </section>
    <?php get_footer( ); ?>