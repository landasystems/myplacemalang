<?php
$this->title = 'CONTACT US !!';

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

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Contact US
            </h3>
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">Home</a>
                </li>
                <li class="active">Contact</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-md-8"> 
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.250196616801!2d112.63006650000001!3d-7.973073999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62825137b9a19%3A0xca2e67ac70925bbf!2sMy+Place+Malang!5e0!3m2!1sid!2sid!4v1433928294466" width="100%" height="400px" frameborder="0" style="border:0"></iframe>

        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>Contact Details</h3>
            <p>
                <br>
                <b>My Place Malang - Pub &amp; Karaoke</b><br>
                Jln. Jaksa Agung Suprapto 17, Malang, Jawa Timur<br>
            </p>
            <p><i class="fa fa-phone"></i> 
                <abbr title="Phone">P</abbr>: (0341) 352 209</p>
            <p><i class="fa fa-envelope-o"></i> 
                <abbr title="Email">E</abbr>: <a href="mailto:info@myplacemalang.com">info@myplacemalang.com</a>
            </p>
            <p>
                <a href="#" class="icon-social" title="Instagram"><i class="fa fa-instagram fa-2x"></i></a>
                <a href="#" class="icon-social" title="Facebook"><i class="fa fa-facebook fa-2x"></i></a>
                <a href="#" class="icon-social" title="Twitter"><i class="fa fa-twitter fa-2x"></i></a>
                <a href="#" class="icon-social" title="Youtube"><i class="fa fa-youtube fa-2x"></i></a>
            </p>
        </div>
    </div>


    <hr>

</div>