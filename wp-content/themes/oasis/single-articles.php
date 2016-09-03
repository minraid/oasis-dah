<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="content">
                <div class="breadcrumbs">
                    <a href="/">Головна</a>
                    >
                    <a href="/articles">Статті</a>
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
                            <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="next-link">Наступна стаття</a>
                        </div>
                    <?php endif; ?>
                    <div class="comments">
                        <div class="comment-count">1 коментар </div>
                        <div class="comment">
                            <div class="comment-details">
                                <div class="author-img"></div>
                                <div class="comment-info">
                                    <div class="name">Оксана</div>
                                    <div class="date">Червень 07, 2016 о 14:25</div>
                                </div>
                            </div>
                            <div class="comment-content">Це чудово! Вітаю компанію зі здобуттям нових знань! Успіхів вам та процвітання!</div>
                        </div>
                        <form class="comment-form">
                            <h2>Залишити відгук:</h2>
                            <textarea placeholder="Напишіть Ваш відгук тут..."></textarea>
                            <div class="hint-box">
                                <div class="hint">Заповніть Вашу інформацію нижче, або натисніть на іконку, щоб пройти верифікацію</div>
                                <div class="social">
                                    <div class="fb"></div>
                                    <div class="g"></div>
                                    <div class="vk"></div>
                                </div>  
                            </div>
                            <div class="author-form">
                                <div class="author-img"></div>
                                <div class="author-inputs">
                                    <input type="text" placeholder="Введіть Ваше ім’я">
                                    <input type="text" placeholder="Введіть Ваш Email">
                                </div>
                            </div>
                            <button type="submit">Відправити коментар</button>
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
        <div class="logos">
            <div class="arrow left"></div>
            <div class="logo-box">
                <ul>
                    <li><img src="/img/logo/1.png" alt=""></li>
                    <li><img src="/img/logo/2.png" alt=""></li>
                    <li><img src="/img/logo/3.png" alt=""></li>
                    <li><img src="/img/logo/4.png" alt=""></li>
                    <li><img src="/img/logo/5.png" alt=""></li>
                    <li><img src="/img/logo/6.png" alt=""></li>
                </ul>
            </div>
            <div class="arrow right"></div>
        </div>
    </div>
</section>
<?php get_footer( ); ?>