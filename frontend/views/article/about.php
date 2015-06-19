<?php
$this->title = 'Wuzz Up My Place !';

use common\models\ArticleCategory;
use common\models\Article;
use common\models\User;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\data\ActiveDataProvider;
use yii\web\UrlManager;

$session = Yii::$app->session;

                $about = Article::findOne(['id' => 4]);
?>
 <div class="container content-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-header">
                        <?=$about->title;?>
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                        <li class="active">About</li>
                    </ol>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12" >
                    <?=$about->content?>
                </div>
            </div>

        </div>