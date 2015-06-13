<?php

use common\models\Article;
$this->title = 'ENTERTAIMENT';

 $entertainment = Article::findOne(['id' => 6]);
?>
<div class="container content-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-header">
                        <?=$entertainment->title;?>
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                        <li class="active">Entertainment</li>
                        
                    </ol>
                    
                </div>
            </div>

            <div class="row">

                <div class="col-md-12" >
                    <p>
                        <strong><?=$entertainment->title;?></strong>
                    </p>
                    <div>
                        <div class="">
                           <?php $image= (!empty($entertainment->primary_image)) ? Yii::$app->homeUrl .'/images/article/'.$entertainment->primary_image : Yii::$app->homeUrl . 'images/700x700-noimage.jpg'?>
                            <a data-height="720" data-lighter="<?=$image ?>" data-width="1280" href='<?=$image ?>'>
                                <img class="img-responsive img-hover" src="<?=$image ?>" align="left" style="margin-right:6px; width:20%"  alt="Superglow Band Ngerock Abeeeez !!!"/>
                            </a>
                        </div>
                        <?=$entertainment->content;?>
                    </div>


                </div>
            </div>

        </div>