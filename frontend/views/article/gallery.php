<?php
$this->title = 'Gallery';

use common\models\ArticleCategory;
use common\models\Article;
use common\models\User;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\data\ActiveDataProvider;
use yii\web\UrlManager;

$session = Yii::$app->session;
?>
<div class="container content-body">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Gallery 
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="<?= Yii::$app->homeUrl ?>">Home</a>
                        </li>
                        <li class="active">Gallery</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Projects Row -->
            <div class="row">
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/1.jpg" data-width="1280" href='./images/galeri/1.jpg'>
                        <img class="img-responsive img-hover" src="./images/galeri/1.jpg" style="width:260px; height:167px" alt="" />
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/2.jpg" data-width="1280" href='./images/galeri/2.jpg'>
                        <img class="img-responsive img-hover" src="./images/galeri/2.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/3.jpg" data-width="1280" href='./images/galeri/3.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/3.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/4.jpg" data-width="1280" href='./images/galeri/4.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/4.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
            </div>
            <!-- /.row -->

            <!-- Projects Row -->
            <div class="row">
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/5.jpg" data-width="1280" href='./images/galeri/5.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/5.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/6.jpg" data-width="1280" href='./images/galeri/6.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/6.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/7.jpg" data-width="1280" href='./images/galeri/7.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/7.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/8.jpg" data-width="1280" href='./images/galeri/8.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/8.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
            </div>
            <!-- /.row -->

            <!-- Projects Row -->
            <div class="row">
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/9.jpg" data-width="1280" href='./images/galeri/9.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/9.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/10.jpg" data-width="1280" href='./images/galeri/10.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/10.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/11.jpg" data-width="1280" href='./images/galeri/11.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/11.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
                <div class="col-md-3 img-portfolio">
                    <a data-height="720" data-lighter="./images/galeri/12.jpg" data-width="1280" href='./images/galeri/12.jpg'>

                        <img class="img-responsive img-hover" src="./images/galeri/12.jpg" style="width:260px; height:167px" alt="">
                    </a>
                </div>
            </div>