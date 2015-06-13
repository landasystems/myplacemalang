<?php
/* @var $this yii\web\View */
$this->title = 'News';

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
        <div class="col-md-12">
            <h3 class="page-header">
                NEWS LIST
            </h3>
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                <li class="active">News</li>
            </ol>
        </div>
    </div>
    <?php
    

    foreach ($model as $item) {
        ?>
        <div class="row">
            <div class="col-md-1 text-center">
                <p><i class="fa fa-file-text fa-4x"></i>
                </p>
                <p><?php echo date('F d, Y', strtotime($item->created)); ?></p>
            </div>
            <div style ='overflow-y: hidden;' class="col-md-3">
                <center>
                <a href="<?= Yii::$app->urlManager->createUrl('article/' . $item->id) ?>" class="">
                    <?php $image = (!empty($item->primary_image)) ? Yii::$app->homeUrl . '/images/event/' . $item->primary_image : Yii::$app->homeUrl . 'images/700x700-noimage.jpg' ?> 

                    <img class="img-responsive img-hover " src="<?= $image; ?>" style="width:80%;" alt="">
                </a>
                    </center>
            </div>
            <div class="col-md-7" style="margin-top: -30px;">
                <h3><a href="<?= Yii::$app->urlManager->createUrl('article/' . $item->id) ?>"><?= $item->title; ?></a>
                </h3>
                <p>by <a href="#">Admin</a>
                </p>
                <p>
                    <?= substr(strip_tags($item->content), 0, 200) . " . . ."; ?>
                </p>
                <a class="btn btn-primary" href="<?= Yii::$app->urlManager->createUrl('article/' . $item->id) ?>">Read More <i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <hr>
        <?php
    }
    ?>
    <div class="b-pagination f-pagination center">
        <?php
        
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>
    </div>
</div>