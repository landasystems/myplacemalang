<script type="text/javascript" language="javascript"
        src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCfVS1-Dv9bQNOIXsQhTSvj7jaDX7Oocvs"></script>
        
        <script src="<?= Yii::$app->homeUrl ?>js/modules/maps-google.js"></script>
<?php

use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Kontak Kami';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page">
    <div class="b-inner-page-header__content">
        <div class="container">
            <h1 class="f-primary-l c-default">Contact us</h1>
        </div>
    </div>
</div>

<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>
    <section class="b-google-map map-theme b-bord-box" data-location-set="contact-us">
        <div class="b-google-map__map-view b-google-map__map-height">
            <!-- Google map load -->
        </div>
        <img data-retina src="img/google-map-marker-default.png" data-label="" class="marker-template hidden" />
        <div class="b-google-map__info-window-template hidden"
             data-selected-marker="0"
             data-width="250">
            <div class="b-google-map__info-window f-center b-google-map__info-office f-google-map__info-office">
                <h4 class="f-primary-b">SMA Taman Harapan</h4>
                <small>Heading Office</small>
            </div>
        </div>
    </section>
    <div class="b-desc-section-container">
        <section class="container b-welcome-box">
            <div class="row">
                <div class="col-md-offset-2 col-md-10">
                    <h1 class="is-global-title f-center">Sekolah Standart Nasional (SSN) Terakreditasi A</h1>
                    <p class="f-center">Terwujudnya Sekolah favorit/unggul berlandaskan IMTAQ
                        dan IPTEK yang berwawasan perdamaian.</p>
                    <ul class="list-unstyled">
                        <li class="col-xs-4">
                            <div class="b-google-map__info-window-address-icon f-center pull-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div>
                                <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                    SMA TAMAN HARAPAN
                                </div>
                                <div class="desc">Jl. Majapahit 1, Malang.</div>
                            </div>
                        </li>
                        <li class="col-xs-4">
                            <div class="b-google-map__info-window-address-icon f-center pull-left">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div>
                                <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                    email
                                </div>
                                <div class="desc">info@smatamanharapan.sch.id</div>
                            </div>
                        </li>
                        <li class="col-xs-4">
                            <div class="b-google-map__info-window-address-icon f-center pull-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div>
                                <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                    Telepon
                                </div>
                                <div class="desc">(0341) 362 400</div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>
