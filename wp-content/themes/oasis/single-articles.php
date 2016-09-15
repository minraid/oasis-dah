<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="content">
                    <div class="breadcrumbs">
                        <a href="/"><?php echo __('[:ua]Головна[:ru]Главная[:]'); ?></a>
                        >
                        <a href="/articles"><?php echo __('[:ua]Статті[:ru]Статьи[:]'); ?></a>
                        >
                        <?php the_title( ); ?>
                    </div>
                    <div class="post">
                        <h2><?php the_title(); ?></h2>
                        <div class="post-box">
                            <div class="post-details">
                                <div class="date"><?php the_date( ); ?></div>
                                <div class="comments"><?php comments_number( ); ?></div>
                            </div>
                            <div class="post-images">
                                <div class="img-wrap">
                                    <?php the_post_thumbnail( ); ?>
                                </div>
                            </div>
                            <div class="post-content">
                                <?php the_content( ); ?>
                            </div>
                        </div>
                        <?php $prev_post = get_previous_post();
                        if (!empty( $prev_post )): ?>
                        <div class="next-wrap">
                            <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="next-link"><?php echo __('[:ua]Наступна стаття[:ru]Следующая статья[:]'); ?></a>
                        </div>
                    <?php endif; ?>
                    <div id="comments" class="comments" ng-controller="commentsCtrl as vm">
                        <div class="comment-count"><?php comments_number( ); ?></div>
                        <div class="comments-handler" ng-init='vm.init(<?php echo json_encode(get_comments(["post_id"=>$post->ID])); ?>, <?= $post->ID; ?>)'>
                            <div class="comment" ng-repeat="comment in vm.comments| orderBy:'comment_date'">
                                <div class="comment-details">
                                    <div class="author-img">
                                        <i class="icon" icon="'profile'"></i>
                                        <!-- <img ng-if="comment.comment_author_url" ng-src="{{comment.comment_author_url}}"> -->
                                    </div>
                                    <div class="comment-info">
                                        <div class="name" ng-bind="comment.comment_author"></div>
                                        <div class="date" ng-bind="comment.comment_date| date:'dd MMMM yyyy, о HH:mm'"></div>
                                    </div>
                                </div>
                                <div class="comment-content" ng-bind="comment.comment_content"></div>
                            </div>
                        </div>
                        <form class="comment-form" name="comment" ng-submit="vm.send(comment)" novalidate>
                            <h2><?php echo __('[:ua]Залишити відгук:[:ru]Оставить отзыв:[:]'); ?></h2>
                            <textarea placeholder="Напишіть Ваш відгук тут..." ng-model="vm.data.comment_content" required></textarea>
                            <div class="hint-box">
                                <div class="hint"><?php echo __('[:ua]Заповніть Вашу інформацію нижче, або натисніть на іконку, щоб пройти верифікацію[:ru]Заполните Вашу информацию ниже, или нажмите на иконку, чтобы пройти верификацию[:]'); ?></div>
                                <div class="social">
                                    <i class="icon" icon="'fb'"></i>
                                    <i class="icon" icon="'gp'"></i>
                                    <i class="icon" icon="'vk'"></i>
                                </div>  
                            </div>
                            <div class="author-form">
                                <div class="author-img">
                                    <i class="icon" icon="'profile'"></i>
                                </div>
                                <div class="author-inputs">
                                    <input type="text" placeholder="Введіть Ваше ім’я" ng-model="vm.data.comment_author" required>
                                    <input type="email" placeholder="Введіть Ваш Email" ng-model="vm.data.comment_author_email" required>
                                </div>
                            </div>
                            <button type="submit" class="disabled" ng-class="{'disabled':comment.$invalid}">
                                <span ng-if="!vm.loading"><?php echo __('[:ua]Відправити коментар[:ru]Отправить комментарий[:]'); ?></span>
                                <i class="icon" ng-class="{'loading': vm.loading}" icon="'arrow-red'"></i>
                            </button>
                            <div class="message"><?php echo __('[:ua]Заповніть, будь ласка, обов`язкові поля[:ru]Заполните, пожалуйста, обязательные поля[:]'); ?></div>
                            <div class="message hidden" ng-if="!comment.$submitted" ng-class="{'hidden' : !vm.error && !vm.sent, 'error' : vm.error, 'success' : vm.sent}" ng-bind="vm.sent ? 'Ваше повідомлення надіслано! Дякуємо!' : 'Виникла помилка! Будь ласка, спробуйте ще.'"></div>
                        </form>
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
<?php get_sidebar( 'logos' ); ?>
</div>
</section>
<?php get_footer( ); ?>