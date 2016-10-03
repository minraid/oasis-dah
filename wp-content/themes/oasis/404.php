<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content error-page">
                <h3>Вибачте, цієї сторінки не існує</h3>
                <p>Ви бачите це повідомлення тому, що перейшли за посиланням на сторінку, якої більше не існує на нашому сайті.  Будь ласка, скористайтеся навігацією в меню або виконайте наступні дії:</p>
                <a href="/" class="main-link">Перейти на Головну сторінку</a>
            </div>
        </div>
        <?php get_sidebar( 'logos' ); ?>
    </div>
</section>
<?php get_footer( ); ?>