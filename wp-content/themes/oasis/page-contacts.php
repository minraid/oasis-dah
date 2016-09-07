<?php get_header( ); ?>
<section class="content-inner">
    <div class="container">
        <div class="content-box">
            <?php get_sidebar( ); ?>
            <div class="content">
                <div class="contacts">
                    <h1>ТЗоВ «Оазис Дах»</h1>
                    <div class="adress">
                        <?php the_field('address', 'options'); ?>
                    </div>
                    <div class="staff">
                        <?php
                        if( have_rows('contacts', 'options') ):
                            while ( have_rows('contacts', 'options') ) : the_row();
                                $img = get_sub_field('photo');
                        ?>
                        <div class="contact">
                            <div class="img-box">
                                <img src="<?= $img['sizes']['thumbnail']; ?>">
                            </div>
                            <div class="contact-details">
                                <div class="name"><?php the_sub_field('name'); ?></div>
                                <div class="details">
                                    <p><?php the_sub_field('phone'); ?></p>
                                    <p><?php the_sub_field('position'); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        endif;
                        ?>
                        <div class="email">
                            <i class="icon"></i>
                            <div class="contact-details">
                                <div class="details">
                                    <div class="title">E-mail</div>
                                    <p><?php the_field('email', 'options'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="map"></div>
                </div>
                <div class="contact-form" ng-controller="contactCtrl as vm">
                    <h2>Написати нам</h2>
                    <div class="hint">* - поля, обов’язкові для заповнення</div>
                    <form class="contact" name="contact" ng-submit="vm.send(contact)" novalidate>
                        <div class="inputs">
                            <div class="input-form">
                                <label for="">Ваше ім’я *</label>
                                <input type="text" ng-model="vm.data.name" required>
                            </div>
                            <div class="input-form">
                                <label for="">Ваш Email*</label>
                                <input type="email" ng-model="vm.data.email" required>
                            </div>
                        </div>
                        <div class="input-form">
                            <label for="">Тема Вашого звернення</label>
                            <input type="text" ng-model="vm.data.subject">
                        </div>
                        <div class="input-form">
                            <label for="">Ваше повідомлення*</label>
                            <textarea ng-model="vm.data.message" required></textarea>
                        </div>
                        <button type="submit" class="disabled" ng-class="{'disabled' : contact.$invalid}">
                            <span ng-if="!vm.loading">Надіслати</span>
                            <i class="icon" ng-class="{'loading': vm.loading}" icon="'arrow-red'"></i>
                        </button>
                        <div class="message">Заповніть, будь ласка, обов`язкові поля</div>
                        <div class="message hidden" ng-class="{'hidden' : !vm.error && !vm.sent, 'error' : vm.error, 'success' : vm.sent}" ng-bind="vm.sent ? 'Ваше повідомлення надіслано! Дякуємо!' : 'Виникла помилка! Будь ласка, спробуйте ще.'"></div>
                    </form>
                </div>
            </div>
        </div>
        <?php get_sidebar( 'logos' ); ?>
    </div>
</section>
<script>
    function initMap() {
        var mapDiv = document.getElementById('map');
        var myLatLng = {lat: 49.824509, lng: 23.905083};
        var map = new google.maps.Map(mapDiv, {
            center: myLatLng,
            zoom: 14
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }
</script>
<?php get_footer( ); ?>