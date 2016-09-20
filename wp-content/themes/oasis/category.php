<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <div class="catalog">
                    <?php 
                    $cat_var = get_query_var('cat');
                    $cat = get_category($cat_var);
                    $categories = get_categories( 'parent='.$cat->term_id );
                    if(count($categories)>0) {
                        ?>
                        <div class="category">
                            <div class="cat-img">
                                <img src="<?php the_field('thumbnail', $cat); ?>" alt="">
                            </div>
                            <div class="cat-description">
                                <h1><?= $cat->name ?></h1>
                                <div class="description" ng-class="{'active':open}">
                                    <?php the_field('content', $cat); ?>
                                </div>
                                <a href="" class="more" ng-click="open=!open"><?php echo __('[:ua]Детальніше[:ru]Подробнее[:]'); ?></a>
                            </div>
                        </div>
                        <?php 
                        foreach ($categories as $category) {
                            $args = [
                            'post_type' => 'products',
                            'tax_query' => [
                            [
                            'taxonomy' => 'category',
                            'terms' => $category->term_id
                            ],
                            ],
                            ];
                            $posts = get_posts($args);
                            ?>
                            <div class="manufacturer">
                                <div class="manufacturer-description">
                                    <div class="logo">
                                        <a href="<?= get_category_link($category->term_id); ?>">
                                            <img src="<?php the_field('thumbnail', $category); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="<?= get_category_link($category->term_id); ?>" class="name"><?= $category->name; ?></a>
                                        <div class="country">
                                            <?php echo __('[:ua]Країна-виробник: [:ru]Страна-производитель: [:]'); ?>
                                            <strong><?php the_field('country', $category); ?></strong>
                                        </div>
                                        <div class="product-length">
                                            <?php echo __('[:ua]Всього позицій: [:ru]Всего позиций: [:]'); ?>
                                            <a href="<?= get_category_link($category->term_id); ?>"><?= count($posts); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="manufacturer-text">
                                    <?php $text = get_field('content', $category); 
                                    echo acf_excerpt($text);
                                    ?>
                                    <a href="<?= get_category_link($category->term_id); ?>" class="more"><?php echo __('[:ua]Детальніше[:ru]Подробнее[:]'); ?></a>
                                </div>
                                <div class="products">
                                    <?php foreach ($posts as $post) { ?>
                                        <a href="<?= $post->guid; ?>" class="product-wrap">
                                            <div class="product">
                                                <div class="img">
                                                    <?= get_the_post_thumbnail($post->ID); ?>
                                                </div>
                                                <div class="name"><?= $post->post_title; ?></div>
                                            </div>
                                        </a>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                            } else { 
                                $args = [
                                'post_type' => 'products',
                                'posts_per_page' => 8,
                                'tax_query' => [
                                [
                                'taxonomy' => 'category',
                                'terms' => $cat->term_id
                                ],
                                ],
                                ];
                                $posts = get_posts($args);
                                ?>
                                <div class="manufacturer">
                                    <div class="manufacturer-description">
                                        <div class="logo">
                                            <img src="<?php the_field('thumbnail', $cat); ?>" alt="">
                                        </div>
                                        <div class="info">
                                            <span class="name"><?= $cat->name ?></span>
                                            <div class="country">
                                                <?php echo __('[:ua]Країна-виробник: [:ru]Страна-производитель: [:]'); ?>
                                                <strong><?php the_field('country', $cat); ?></strong>
                                            </div>
                                            <div class="product-length">
                                                <?php echo __('[:ua]Всього позицій: [:ru]Всего позиций: [:]'); ?>
                                                <span><?= count($posts); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="manufacturer-text">
                                        <div class="description" ng-class="{'active':open}">
                                            <?php the_field('content', $cat); ?>
                                        </div>
                                        <a href="" class="more arrow" ng-click="open=!open"><?php echo __('[:ua]Детальніше[:ru]Подробнее[:]'); ?></a>
                                    </div>
                                    <div class="products">
                                        <?php foreach ($posts as $post) { ?>
                                            <a href="<?= $post->guid; ?>" class="product-wrap">
                                                <div class="product">
                                                    <div class="img">
                                                        <?= get_the_post_thumbnail($post->ID); ?>
                                                    </div>
                                                    <div class="name"><?= $post->post_title; ?></div>
                                                </div>
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <?php 
                                        if(have_rows('downloads', $cat)) :
                                        $downloads = get_field('downloads', $cat); ?>
                                        <div class="manufacturer-downloads">
                                            <h2><?php echo __('[:ua]Файли для завантаження:[:ru]Файлы для загрузки:[:]'); ?></h2>
                                            <?php foreach ($downloads as $row) { ?>
                                            <div class="file">
                                                <i class="icon" icon="'file'"></i>
                                                <div class="details">
                                                    <div class="title"><?= $row['title']; ?></div>
                                                    <a href="<?= $row['file']; ?>" target="_blank"><?php echo __('[:ua]Завантажити[:ru]Скачать[:]'); ?></a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php }; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_sidebar( 'logos' ); ?>
            </div>
        </section>
        <?php get_footer( ); ?>