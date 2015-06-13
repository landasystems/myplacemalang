<?php
$this->title = 'My KTV';

use common\models\ArticleCategory;
use common\models\Article;
use common\models\User;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\data\ActiveDataProvider;
use yii\web\UrlManager;

$session = Yii::$app->session;
$myktv = Article::findOne(['id' => 2]);
?>
 <div class="container content-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-header">
                        <?=$myktv->title;?>
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                        <li class="active">My KTV</li>
                    </ol>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12" >
                    <?=$myktv->content?>
                </div>
            </div>

        </div>