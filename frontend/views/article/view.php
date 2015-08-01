<?php

use common\models\User;

$this->title = $model->title;
?>
<div class="container content-body">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <?= $this->title ?>
            </h3>
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">Home</a>
                </li>
                <li><a href="<?= Yii::$app->urlManager->createUrl('article/index') ?>">News</a>
                </li>
                <li class="active"><?= $this->title ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <hr>

            <!-- Date/Time -->
            <p><i class="fa fa-clock-o"></i> Posted on <?php echo date('F d, Y', strtotime($model->created)); ?></p>

            <hr>
            <?php if (!empty($model->primary_image)) { ?>
                <!-- Preview Image -->
                <center><img class="img-responsive" src="<?= $model->ImgMedium ?>" alt=""></center>
                <hr>
            <?php } ?>



            <?= $model->content ?>
                <!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>-->

            <hr>

            <!-- Blog Comments -->


            <!-- Posted Comments -->

            <!-- Comment -->


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <hr>
            <h4>Berita Terbaru</h4>
            <hr>

            <?php
            $news = common\models\Article::find()
                    ->where([
                        'publish' => 1,
                        'article_category_id' => [1, 36]
                    ])
                    ->orderBy('created DESC')
                    ->limit(3)
                    ->all();

            foreach ($news as $item) {
                ?>


                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= Yii::$app->urlManager->createUrl('article/' . $item->alias) ?>" >
                            <img class="alignleft size-full" src=<?php echo (!empty($item->primary_image)) ?  $item->ImgSmall : Yii::$app->homeUrl . 'images/700x700-noimage.jpg' ?> width="100">
                            <p align="justify"><b><?= $item->title; ?></b></p>
                        </a>
                        <i class="glyphicon glyphicon-calendar"></i>  <?= date('d-m-Y', strtotime($item->created)) ?>



                    </div>
                </div>
                <hr>
            <?php } ?>

        </div>

    </div>

</div>