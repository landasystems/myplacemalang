<?php
/* @var $this SiteController */
$this->pageTitle = 'Dashboard - Selamat Datang di Area Administrator';
?>
<div class="row-fluid">
    <div class="span8">
        <div class="row-fluid">
            <div class="box">
                <div class="title">

                    <h4>
                        <span class="icon16 iconic-icon-bars"></span>
                        <span>Popular Articles </span>
                    </h4>
                    <a href="#" class="minimize" style="display: none;">Minimize</a>
                </div>
                <div class="content">

                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Popular Items</th>
                                <th>Created</th>
                                <th>Hits</th>
                            </tr>
                            <?php
                            $oArticles = Article::model()->findAll(array('order' => 'hits DESC', 'limit' => '5'));
                            foreach ($oArticles as $oArticle) {
                                echo '<tr>
                                        <td>' . $oArticle->title . '</td>
                                        <td>' . date('d F Y', strtotime($oArticle->created)) . '</td>
                                        <td>' . $oArticle->hits . '</td>
                                      </tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div><!-- End .box -->  
            <div class="box">
                <div class="title">

                    <h4>
                        <span class="icon16 iconic-icon-bars"></span>
                        <span>Recently Added Articles </span>
                    </h4>
                    <a href="#" class="minimize" style="display: none;">Minimize</a>
                </div>
                <div class="content">

                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Latest Items</th>
                                <th>Created</th>
                                <th>Hits</th>
                            </tr>
                            <?php
                            $oArticles = Article::model()->findAll(array('order' => 'created DESC', 'limit' => '5'));
                            foreach ($oArticles as $oArticle) {
                                echo '<tr>
                                        <td>' . $oArticle->title . '</td>
                                        <td>' . date('d F Y', strtotime($oArticle->created)) . '</td>
                                        <td>' . $oArticle->hits . '</td>
                                      </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- End .box -->  

        </div>
    </div>
    <div class="span4">
        <div class="row-fluid">
            <div class="box">
                <div class="title">

                    <h4>
                        <span class="icon16 silk-icon-office"></span>
                        <span><?php echo param('clientName'); ?></span>
                    </h4>
                </div>
                <div class="content">
                    <?php
                    echo '<img src="logo.jpg" class="img-polaroid" width="100%"/>';
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
