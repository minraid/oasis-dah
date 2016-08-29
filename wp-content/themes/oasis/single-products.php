<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <?php if(have_posts()) { 
                    the_post();
                    $categories = get_the_category($post->ID);
                    $breadcrumbs = '<a href="/">Головна</a> > ';
                    if(count($categories)>0) {
                        foreach ($categories as $cat) {
                            if($cat->category_parent == 0) {
                                $breadcrumbs .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a> > ';
                            }
                        }
                        foreach ($categories as $cat) {
                            if($cat->category_parent != 0) {
                                $title = $cat->name.' '.$post->post_title;
                                $breadcrumbs .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a> > ';
                            }
                        }
                        if(!$title) {
                            $title = $categories[0]->name;
                        }
                        $breadcrumbs .= $post->post_title;
                    } else {
                        $title = $post->post_title;
                    }
                    ?>
                    <div class="breadcrumbs">
                        <?= $breadcrumbs; ?>
                    </div>
                    <div class="product">
                        <div class="product-main">
                            <div class="product-gallery">
                                <?php $carousel = get_field('color'); ?>
                                <div class="main-img"><img ng-src="{{color.img || '<?= $carousel[0]['sizes']['medium']; ?>'}}"></div>
                                <div class="carousel" carousel>
                                    <div class="arrow left" ng-click="move(true)"></div>
                                    <div class="arrow right" ng-click="move(false)"></div>
                                    <div class="carousel-inner">
                                        <ul class="img-list" style="width: <?= (count($carousel)*25).'%'; ?>">
                                            <?php foreach ($carousel as $color) { ?>
                                                <li style="width: <?= (100/count($carousel)).'%'; ?>">
                                                    <div class="img-box" ng-click="color= {img:'<?php echo $color['sizes']['thumbnail']; ?>', title: '<?php echo $color['title']; ?>'}">
                                                        <img src="<?php echo $color['sizes']['thumbnail']; ?>" alt="<?php echo $color['title']; ?>">
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <h1 ng-bind="'<?= $title; ?> '+(color.title || '<?= $carousel[0]['title']; ?>')"></h1>
                                    <div class="tabs" ng-init="show='description'">
                                        <div class="tab" ng-class="{'active' : show == 'description'}" ng-click="show='description'">Опис</div>
                                        <div class="tab" ng-class="{'active' : show == 'examples'}" ng-click="show='examples'">Приклади застосування</div>
                                        <div class="tab" ng-class="{'active' : show == 'accessories'}" ng-click="show='accessories'">Аксесуари</div>
                                    </div>
                                    <div class="product-specifications">
                                        <?php 
                                        if(have_rows('product_properties')) :
                                            $table = get_field('product_properties'); ?>
                                        <div class="table">
                                            <div class="labels">
                                                <?php foreach ($table as $row) {
                                                    echo('<div class="td">'.$row['property'].'</div>');
                                                } ?>
                                            </div>
                                            <div class="values">
                                                <?php foreach ($table as $row) {
                                                    echo('<div class="td">'.$row['value'].'</div>');
                                                } ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div ng-switch="show">
                            <div class="product-description" ng-switch-when="description">
                                <?php the_content( ); } ?>
                            </div>
                            <div class="use-exmaples" ng-switch-when="examples">
                                <?php $examples = get_field('examples');
                                if($examples) {
                                    foreach ($examples as $example) { ?>
                                        <div class="photo">
                                            <div class="thumbnail"><img src="<?php echo $example['sizes']['medium']; ?>" alt=""></div>
                                        </div>
                                        <?php } 
                                    } ?>
                                </div>
                                <div class="accessories" ng-switch-when="accessories">
                                    <?php $accessories = get_field('accessories');
                                    if($accessories) {
                                        foreach ($accessories as $accessory) { ?>
                                            <div class="photo">
                                                <div class="thumbnail"><img src="<?php echo $accessory['sizes']['medium']; ?>" alt=""></div>
                                            </div>
                                            <?php } 
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="back-link" back-link>Повернутися назад</a>
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
                    <popup class="img" gallery='<?php echo json_encode($examples); ?>'></popup>
                </div>
            </section>
            <?php get_footer( ); ?>