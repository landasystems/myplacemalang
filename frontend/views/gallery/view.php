<?php
$this->title = 'Gallery';

use common\models\Gallery;
use common\models\GalleryCategory;
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
            <h3 class="page-header">Gallery Category
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
        <?php
        foreach ($model as $item) {
//            echo $item->id;
            ?>

            <div class="col-md-3 img-portfolio">
                <?php 
                $imageMed = (!empty($item->image)) ? $item->imgMedium : Yii::$app->homeUrl . 'images/700x700-noimage.jpg';
                $imagehigh = (!empty($item->image)) ? $item->imgBig : Yii::$app->homeUrl . 'images/700x700-noimage.jpg';
                ?> 
                    
                    <a data-height="720" data-lighter="<?=$imagehigh?>" data-width="1280" href='<?=$imagehigh?>'>
                 
                    <img class="img-responsive img-hover" src="<?=$imageMed?>" style="width:260px; height:167px" alt="" />
               
                    </a>

            </div>


        <?php } ?>
    </div>
   
</div>