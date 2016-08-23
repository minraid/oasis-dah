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
                                <div class="desctiption">
                                    <?php the_field('content', $cat); ?>
                                </div>
                                <a href="#" class="more">Детальніше</a>
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
                                        <a>
                                            <img src="<?php the_field('thumbnail', $category); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="<?= get_category_link($category->term_id); ?>" class="name"><?= $category->name; ?></a>
                                        <div class="country">
                                            Країна-виробник: 
                                            <strong><?php the_field('country', $category); ?></strong>
                                        </div>
                                        <div class="product-length">
                                            Всього позицій:
                                            <a href="#"><?= count($posts); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="manufacturer-text">
                                    <?php the_field('content', $category); ?>
                                    <a href="<?= get_category_link($category->term_id); ?>">>></a>
                                </div>
                                <div class="products">
                                    <?php foreach ($posts as $post) { ?>
                                        <a href="<?= $post->guid; ?>" class="product-wrap">
                                            <div class="product">
                                                <div class="img">
                                                    <img src="<?php bloginfo( 'template_url' ); ?>/img/products/1.jpg" alt="">
                                                </div>
                                                <div class="name"><?= $post->post_title; ?></div>
                                            </div>
                                        </a>
                                        <?php } ?>
                                <!-- <div class="pagination">
                                    <a href="#" class="disabled">1</a>
                                    <a href="#">2</a>
                                    <span>...</span>
                                    <a href="#">5</a>
                                </div> -->
                            </div>
                            <?php
                        }
                    } else { 
                        $args = [
                        'post_type' => 'products',
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
                                        Країна-виробник: 
                                        <strong><?php the_field('country', $cat); ?></strong>
                                    </div>
                                    <div class="product-length">
                                        Всього позицій:
                                        <span><?= count($posts); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="manufacturer-text">
                                <?php the_field('content', $cat); ?>
                                <a href="#">>></a>
                            </div>
                            <div class="products">
                                <?php foreach ($posts as $post) { ?>
                                    <a href="<?= $post->guid; ?>" class="product-wrap">
                                        <div class="product">
                                            <div class="img">
                                                <img src="<?php bloginfo( 'template_url' ); ?>/img/products/1.jpg" alt="">
                                            </div>
                                            <div class="name"><?= $post->post_title; ?></div>
                                        </div>
                                    </a>
                                    <?php } ?>
                                </div>
                                <div class="manufacturer-downloads">
                                    <h2>Файли для завантаження:</h2>
                                    <div class="file">
                                        <i class="icon"></i>
                                        <div class="details">
                                            <div class="title">Інструкція з укладання</div>
                                            <a href="#">Завантажити</a>
                                        </div>
                                    </div>
                                    <div class="file">
                                        <i class="icon"></i>
                                        <div class="details">
                                            <div class="title">Сертифікат якості</div>
                                            <a href="#">Завантажити</a>
                                        </div>
                                    </div>
                                    <div class="file">
                                        <i class="icon"></i>
                                        <div class="details">
                                            <div class="title">Сертифікат відповідності</div>
                                            <a href="#">Завантажити</a>
                                        </div>
                                    </div>
                                    <div class="file">
                                        <i class="icon"></i>
                                        <div class="details">
                                            <div class="title">Інструкція з обслуговування</div>
                                            <a href="#">Завантажити</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="logos">
            <div class="arrow left"></div>
            <div class="logo-box">
                <ul>
                    <li><img src="<?php bloginfo( 'template_url' ); ?>/img/logo/1.png" alt=""></li>
                    <li><img src="<?php bloginfo( 'template_url' ); ?>/img/logo/2.png" alt=""></li>
                    <li><img src="<?php bloginfo( 'template_url' ); ?>/img/logo/3.png" alt=""></li>
                    <li><img src="<?php bloginfo( 'template_url' ); ?>/img/logo/4.png" alt=""></li>
                    <li><img src="<?php bloginfo( 'template_url' ); ?>/img/logo/5.png" alt=""></li>
                    <li><img src="<?php bloginfo( 'template_url' ); ?>/img/logo/6.png" alt=""></li>
                </ul>
            </div>
            <div class="arrow right"></div>
        </div>
    </div>
</section>
<?php get_footer( ); ?>