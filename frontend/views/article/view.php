<?php

use common\models\User;

$this->title = $model->title;
?>
<div class="j-menu-container"></div>

<div class="l-main-container">
    <div class="b-breadcrumbs f-breadcrumbs">
        <div class="container">
            <ul>
                <li><a href=""><i class="fa fa-home"></i>Home</a></li>
                <li><i class="fa fa-angle-right"></i><?= $this->title ?></li>
            </ul>
        </div>
    </div>
    <div class="l-inner-page-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <?php if (!empty($model->primary_image)) { ?>
                        <div class="b-slidercontainer">
                            <div class="j-contentwidthslider">
                                <ul>
                                    <li>
                                        <img data-retina src="<?= Yii::$app->homeUrl . 'images/article/' . $model->primary_image; ?>">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="b-article-box">
                        <div class="f-article_title f-primary-l b-title-b-hr">
                            <?= $model->title ?>
                        </div>
                        <div class="f-infoblock-with-icon__info_text b-infoblock-with-icon__info_text f-primary-b">
                            Oleh <a href="#" class="f-more"><?= $model->user->name ?></a> Kategori :  <a href="" class="f-more"><?= $model->category->name ?></a> Dispoting pada <?= date('d F Y', strtotime($model->created)) ?>
                            <!--<a href="" class="f-more b-blog-listing__additional-text f-primary"><i class="fa fa-comment"></i>12 Comments</a>-->
                        </div>
                        <div class="b-article__description">
                            <?= $model->content ?>
                        </div>

                    </div>

                </div>
                <div class="col-md-3 col-md-pull-9">

                    <div class="row b-col-default-indent">
                        <div class="col-md-12">
                            <h4 class="f-primary-b b-h4-special f-h4-special--gray f-h4-special">Informasi Terbaru</h4>

                            <div class="b-blog-short-post b-blog-short-post--img-hover-bordered b-blog-short-post--w-img f-blog-short-post--w-img row">
                                <div class="b-blog-short-post b-blog-short-post--img-hover-bordered b-blog-short-post--w-img f-blog-short-post--w-img row-fluid">
                                    <?php
                                    $lastPost = common\models\Article::find()
                                            ->where([
                                                'publish' => 1,
                                                'article_category_id' => ['14', '10']
                                            ])
                                            ->orderBy('created DESC')
                                            ->limit(10)
                                            ->all();
                                    foreach ($lastPost as $isi):
                                        ?>
                                        <div class="b-blog-short-post--popular col-md-12  col-xs-12 f-primary-b">
                                            <div class="b-blog-short-post__item_img">
                                                <a href="#"><img class="img-thumbnail" data-retina src="<?= (!empty($isi->primary_image)) ? Yii::$app->homeUrl . 'images/article/' . $isi->primary_image : Yii::$app->homeUrl . 'images/700x700-noimage.jpg' ?>" width="70px" height="70px" alt=""/></a>
                                            </div>
                                            <div class="b-remaining">
                                                <div class="b-blog-short-post__item_text f-blog-short-post__item_text">
                                                    <a href="<?= Yii::$app->urlManager->createUrl('article/' . $isi->id) ?>"><?= $isi->title ?></a>
                                                </div>
                                                <div class="b-blog-short-post__item_date f-blog-short-post__item_date f-primary-it">
                                                    <?= date('d F Y', strtotime($isi->created)) ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
