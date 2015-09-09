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
                <li>Gallery </li><li class="active">Category</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <?php
        foreach ($model as $item) {
            $gambar = Gallery::find()
                    ->where("gallery_category_id=". $item->id)
                    ->one();
            ?>

            <div class="col-md-3 img-portfolio" style='text-align: center'>
                <a href="<?= Yii::$app->urlManager->createUrl('gallery/' . $item->alias) ?>">
                    <?php $image = (!empty($gambar['image'])) ? $gambar->imgMedium : Yii::$app->homeUrl . 'images/700x700-noimage.jpg' ?> 
                
                    <img style='width: 150px; height: 150px; -webkit-border-radius: 75px; -moz-border-radius: 75px;-ms-border-radius: 75px; -o-border-radius: 75px;border-radius: 75px;' src="<?=$image?>"  alt="" />
                </a>
               <h5><b> Album : <?=$item->name; ?></b></h5>
                
                    
            </div>


        <?php } ?>
    </div>
   
</div>