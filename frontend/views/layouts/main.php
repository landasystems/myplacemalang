<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Product;
use yii\bootstrap\ActiveForm;

$session = Yii::$app->session;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <title>My Place - <?= Html::encode($this->title) ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <link rel="shortcut icon" href="<?= Yii::$app->homeUrl ?>images/favicon.ico">
        <?= Html::csrfMetaTags() ?>
        <!-- Bootstrap Core CSS -->
        <link type="text/css" href="<?= Yii::$app->homeUrl ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link type="text/css" href="<?= Yii::$app->homeUrl ?>css/style.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link type="text/css" href="<?= Yii::$app->homeUrl ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- image CSS -->
        <link type="text/css"  href="<?= Yii::$app->homeUrl ?>css/jquery.lighter.css" rel="stylesheet">

    </head>
    <body>
        <?php $this->beginBody() ?>
        <nav class="navbar navbar-inverse navbar-fixed-top background-transparant" role="navigation" >
            <div class="container header-atas atas">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::$app->homeUrl ?>images/logo.png" class="img-responsive logo"></a>
                </div>
                <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?= Yii::$app->homeUrl ?>">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('article/entertainment') ?>">Entertainment</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('article/about') ?>">About Us</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('article/daily') ?>">Daily Events</a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('article/beverages') ?>">Beverages</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('article/myktv') ?>">My KTV</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('article/event') ?>">Event</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('article/index') ?>">News</a>
                        </li>
                        <li>
                            <a href="<?= Yii::$app->urlManager->createUrl('article/contact') ?>">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php echo $content; ?>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 footer">
                        <p><a href="#">MY PLACE MALANG</a> &copy; 2013 • ALL RIGHT RESERVED</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?= Yii::$app->homeUrl ?>js/jquery.js"></script>
        <script src="<?= Yii::$app->homeUrl ?>js/bootstrap.min.js"></script>
        <script src="<?= Yii::$app->homeUrl ?>js/main.js"></script>
        <script src="<?= Yii::$app->homeUrl ?>js/jquery.lighter.js"></script>
    </body>
    <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
