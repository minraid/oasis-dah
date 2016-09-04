<div class="logos" carousel>
    <div class="arrow left" ng-click="move(true)">
        <i class="icon" icon="'arrow-left'"></i>
    </div>
    <div class="logo-box">
        <?php $logos = get_field('logos', 'options');
        if(!empty($logos)) {
            echo '<ul style="width: '.(count($logos)*20).'%">';
            foreach ($logos as $logo) {
                echo '<li style="width:'.(100/count($logos)).'%"><img src="'.$logo['sizes']['thumbnail'].'" alt="'.$logo['alt'].'"></li>';
            }
        } ?>
    </div>
    <div class="arrow right" ng-click="move(false)">
        <i class="icon" icon="'arrow-right'"></i>
    </div>
</div>