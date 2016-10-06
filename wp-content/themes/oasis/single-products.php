<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <?php if(have_posts()) { 
                    the_post();
                    $categories = get_the_category($post->ID);
                    $breadcrumbs = '<a href="/">' . __('[:ua]Головна[:ru]Главная[:]') . '</a> > ';
                    if(count($categories)>0) {
                        foreach ($categories as $cat) {
                            if($cat->category_parent == 0) {
                                $breadcrumbs .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a> > ';
                            }
                        }
                        foreach ($categories as $cat) {
                            if($cat->category_parent != 0) {
                                $breadcrumbs .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a> > ';
                                $backLink = get_category_link($cat->term_id);
                            }
                        }
                        $breadcrumbs .= $post->post_title;
                    }
                    $title = $post->post_title;
                    ?>
                    <div class="breadcrumbs">
                        <?= $breadcrumbs; ?>
                    </div>
                    <div class="product" ng-controller="productCtrl as product">
                        <div class="product-main">
                            <div class="product-gallery">
                                <?php $carousel = get_field('color'); ?>
                                <div class="main-img" ng-click='product.showGallery(<?= json_encode( $carousel ); ?>, color.index || 0);'><img ng-src="{{color.img || '<?= $carousel[0]['sizes']['medium']; ?>'}}"></div>
                                <div class="carousel" carousel>
                                    <div class="arrow left" ng-click="move(true)"></div>
                                    <div class="arrow right" ng-click="move(false)"></div>
                                    <div class="carousel-inner">
                                        <ul class="img-list" style="width: <?= (count($carousel)*25).'%'; ?>">
                                            <?php 
                                            if(!empty($carousel)) {
                                                foreach ($carousel as $index => $color) { ?>
                                                    <li style="width: <?= (100/count($carousel)).'%'; ?>">
                                                        <div class="img-box" ng-click="color= {img:'<?php echo $color['sizes']['medium']; ?>', title: '<?php echo $color['title']; ?>', index: <?= $index; ?>}">
                                                            <img src="<?php echo $color['sizes']['medium']; ?>" alt="<?php echo $color['title']; ?>">
                                                        </div>
                                                    </li>
                                                    <?php 
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details">
                                <h1 ng-bind="'<?= $title; ?> '+(color.title || '<?= $carousel[0]['title']; ?>')"></h1>
                                <div class="tabs" ng-init="show='description'">
                                    <div class="tab" ng-class="{'active' : show == 'description'}" ng-click="show='description'">
                                    <?php echo __('[:ua]Опис[:ru]Описание[:]'); ?>
                                    </div>
                                    <div class="tab" ng-class="{'active' : show == 'examples'}" ng-click="show='examples'">
                                    <?php echo __('[:ua]Приклади застосування[:ru]Примеры применения[:]'); ?>
                                    </div>
                                    <div class="tab" ng-class="{'active' : show == 'accessories'}" ng-click="show='accessories'">
                                    <?php echo __('[:ua]Аксесуари[:ru]Аксессуары[:]'); ?>
                                    </div>
                                </div>
                                <div class="product-specifications">
                                    <?php 
                                    if(have_rows('product_properties')) :
                                        $table = get_field('product_properties'); ?>
                                    <div class="table">
                                        <?php foreach ($table as $row) {
                                            echo('<div class="tr"><div class="td">'.$row['property'].'</div>');
                                            echo('<div class="td">'.$row['value'].'</div></div>');
                                        } ?>
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
                                foreach ($examples as $key => $example) { ?>
                                    <div class="photo">
                                        <div class="medium" ng-click='product.showGallery(<?php echo( json_encode($examples) .",". $key); ?>);'>
    <img src="<?php echo $example['sizes']['medium']; ?>" alt=""></div>
</div>
<?php } 
} ?>
</div>
<div class="accessories" ng-switch-when="accessories">
    <?php $accessories = get_field('accessories');
    if($accessories) {
        foreach ($accessories as $key => $accessory) { ?>
            <div class="photo">
                <div class="medium" ng-click='product.showGallery(<?php echo( json_encode($accessories) .",". $key); ?>);'><img src="<?php echo $accessory['sizes']['medium']; ?>" alt=""></div>
</div>
<?php } 
} ?>
</div>
</div>
</div>
<a href="<?= $backLink; ?>" class="back-link">
<?php echo __('[:ua]Повернутися назад[:ru]Вернуться назад[:]'); ?>
</a>
</div>
</div>
<?php get_sidebar( 'logos' ); ?>
<popup class="img" gallery></popup>
</div>
</section>
<?php get_footer( ); ?>