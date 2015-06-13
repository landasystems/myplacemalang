<?php
/* @var $this yii\web\View */
$this->title = 'My House Kickers';

use common\models\ArticleCategory;
use common\models\Article;
use common\models\User;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\data\ActiveDataProvider;
use yii\web\UrlManager;

$session = Yii::$app->session;
 $beverages = Article::findOne(['id' => 3]);
?>
<div class="container content-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-header">
                        Beverages
                    </h3>
                    <ol class="breadcrumb">
                        <li><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                        <li class="active">Beverages</li>

                    </ol>

                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                <?=$beverages->content?>
                </div>
            </div>
            
            
            <!-- /.row -->


           

        </div>