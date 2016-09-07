<div class="logos" carousel>
    <div class="arrow left" ng-click="move(true)">
        <i class="icon" icon="'arrow-left'"></i>
    </div>
    <div class="logo-box">
        <?php $logos = get_field('logos', 'options');
        if(!empty($logos)) {
            echo '<ul style="width: '.(count($logos)*20).'%">';
            foreach ($logos as $logo) {
                echo '<li style="width:'.(100/count($logos)).'%"><a href="'.$logo['link'].'" target="_blank"><img src="'.$logo['img']['url'].'" alt="'.$logo['img']['alt'].'"></a></li>';
            }
        } ?>
    </div>
    <div class="arrow right" ng-click="move(false)">
        <i class="icon" icon="'arrow-right'"></i>
    </div>
</div>