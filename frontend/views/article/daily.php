<?php
$this->title = 'Daily Event';

use common\models\ArticleCategory;
use common\models\Article;
use common\models\User;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\data\ActiveDataProvider;
use yii\web\UrlManager;

$session = Yii::$app->session;
$daily = Article::findOne(['id' => 229]);
?>
<div class="container content-body">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                <?php echo $daily->title; ?>
            </h3>
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                <li class="active">Daily Event</li>
            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12" >
            <?= $daily->content; ?>
        </div>
    </div>

</div>