<?php
/* @var $this yii\web\View */
$this->title = 'MY PLACE - Is Your Place';

//use common\models\ProductStock;
use common\models\Article;

$session = Yii::$app->session;
?>
<header id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/slider/box_1.jpg">
        </div>
        <div class="item">
            <img src="images/slider/box_2.jpg">
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>
<div class="container content-body">
    <div class="row">
        <div class="col-md-4">
            <h3 class="page-header">Upcoming Events</h3>
            <?php
            $news = Article::find()
                    ->where([
                        'publish' => 1,
                        'article_category_id' => 1
                    ])
                    ->orderBy('created DESC')
                    ->limit(4)
                    ->all();

            foreach ($news as $item) {
                ?>
            
            <div class="row list-event">
                <a href="<?= Yii::$app->urlManager->createUrl('article/' . $item->alias) ?>">
                    <div class="col-md-6" style="overflow: hidden; height:150px">
                        <img src=<?php echo (!empty($item->primary_image)) ?  $item->imgSmall : Yii::$app->homeUrl . 'images/700x700-noimage.jpg'?> style="width: 100%;" class="img-polaroid">
                    </div>
                    <div class="col-md-6">
                        <h3 class="month"><?php echo date('F', strtotime($item->date_event)); ?></h3>
                        <h1 class="date"><?php echo date('d', strtotime($item->date_event)); ?></h1>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-4">
            
            <h3 class="page-header">WUZZ UP MY PLACE !</h3>
            <img src="images/about.jpg" style="width: 100%">
            <p><b>Is Always Be Your Place</b></p>
            <p align="justify">Is Always Be Your Place Have been very well known in the early 90’s, My Place is back to town to be a leading entertainment venue in Malang. The metamorphosis of My Place that turned into “She Pub” then finally Re-Born as My Place, after found its perfect shape of entertainment center, has given more power to gather the entertainment seeker around Malang even more in East Java.  Completed with 9 deluxe room and 2 suite karaoke room, My Place gave a new breeze of entertainment concept. My Place karaoke will indulge you with wide selection of music, comfortable room which are design differently, careful selection of Food & Beverage menus as well as room amenities</p>
            <p align="justify">At My Place bar, you will enjoy most everything that people visit a nightclub for (the great vibe, good music, drinks, and, of course, plenty of good looking women dancing on the floor), but typically won’t have to deal with the headaches of the long lines, packed bars, and over-crowded...</p>
            <a href="<?= Yii::$app->urlManager->createUrl('article/about') ?>"  style="float: right">Read More</a>
        </div>
        <div class="col-md-4">
            
            <?php
            $news = Article::find()
                    ->where([
                        'publish' => 1,
                        'article_category_id' => 36
                    ])
                    ->orderBy('created DESC')
                    ->limit(3)
                    ->all();

            foreach ($news as $item) {
                ?>
            
            <h3 class="page-header"><?=$item->title;?></h3>
            <div class="row">
                <div class="col-md-12">
                    <img class="alignleft size-full" src=<?php echo (!empty($item->primary_image)) ? $item->imgSmall : Yii::$app->homeUrl . 'images/700x700-noimage.jpg'?> width="100">
                    <p align="justify">
                    <?=substr(strip_tags($item->content), 0, 145). " . . ."; ?>
                    </p>
                    <i class="glyphicon glyphicon-calendar">  <?=date('d-m-Y',strtotime($item->created))?></i>
                    <a href="<?= Yii::$app->urlManager->createUrl('article/' . $item->alias) ?>"  style="float: right">Read More</a>
                </div>
            </div>
            <?php
            }
            ?>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3 class="page-header">Our Channel</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3YasJUHOrog" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="page-header">Follow Us</h3>
            <a class="twitter-timeline" href="https://twitter.com/MyPlaceMalang" data-widget-id="608592760799698944">Tweet oleh @MyPlaceMalang</a>

        </div>
        <div class="col-md-3">
            <h3 class="page-header">Contact</h3>
            <div class="row">
                <div class="col-md-12">
                    <b>My Place Malang - Pub &amp; Karaoke</b><br>
                    Jln. Jaksa Agung Suprapto 17, Malang, Jawa Timur<br>
                    Email : <a href="mailto:info@myplacemalang.com">info@myplacemalang.com</a><br>
                    Telephone : (0341) 352 209<br><br>

                    <center>
                        <a href="#" class="icon-social" title="Instagram"><i class="fa fa-instagram fa-2x"></i></a>
                        <a href="#" class="icon-social" title="Facebook"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#" class="icon-social" title="Twitter"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#" class="icon-social" title="Youtube"><i class="fa fa-youtube fa-2x"></i></a>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <h3 class="page-header">Support</h3>
            <div class="row">
                <center>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/34-150x150-margos.jpg" width="95"></a>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/35-150x150-kgh.jpg" width="95"></a>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/38-150x150-la-cool-moments.jpg" width="95"></a>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/34-150x150-margos.jpg" width="95"></a>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/35-150x150-kgh.jpg" width="95"></a>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/38-150x150-la-cool-moments.jpg" width="95"></a>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/34-150x150-margos.jpg" width="95"></a>
                    <a href="#"><img class="alignleft size-full img-bottom" src="app/backend/images/gallery/partner/35-150x150-kgh.jpg" width="95"></a>
                </center>
            </div>
        </div>
        <div class="col-md-7">
            <h3 class="page-header">Daily Event</h3>
            <div class="row">
                <center>
<!--                    <a href="#"><img src="http://www.boshevvipclub.com/bali/images/col_fie.jpg" class="size-full event-bottom"></a>
                    <a href="#"><img src="http://www.boshevvipclub.com/bali/images/locally.jpg" width="95" class="size-full event-bottom"></a>
                    <a href="#"><img src="http://www.boshevvipclub.com/bali/images/iamgo.jpg" width="95" class="size-full event-bottom"></a>
                    <a href="#"><img src="http://www.boshevvipclub.com/bali/images/rr.jpg" width="95" class="size-full event-bottom"></a>
                    <a href="#"><img src="http://www.boshevvipclub.com/bali/images/trackon.jpg" width="95" class="size-full event-bottom"></a>
                    <a href="#"><img src="http://www.boshevvipclub.com/bali/images/wetd.jpg" width="95" class="size-full event-bottom"></a>
                    <a href="#"><img src="http://www.boshevvipclub.com/bali/images/sunday.jpg" width="95" class="size-full event-bottom"></a>-->
                </center>
            </div>
        </div>
    </div>
</div>

