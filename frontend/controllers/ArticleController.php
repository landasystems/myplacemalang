<?php

namespace frontend\controllers;

use Yii;
use common\models\Article;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\widgets\LinkPager;

class ArticleController extends Controller {

    public function actionView() {
        $this->layout = 'main';
        $model = Article::findOne($_GET['id']);
        if (empty($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
//            $this->addHits($model);
            return $this->render('view', [
                        'model' => $model,
            ]);
        }
    }

    public function actionIndex() {
        $this->layout = 'main';
        $query = Article::find()
                ->where(array(
                    'publish' => 1
                ))
                ->orderBy('id ASC')
                ->all();

        return $this->render('index', [
                    'models' => $query,
//                    'pages' => $pages,
        ]);
    }

    public function actionVisiMisi() {
        $this->layout = 'main';
        
        return $this->render('visiMisi',[
            
        ]);
    }
    public function actionSarpras() {
        $this->layout = 'main';
        return $this->render('sarpras',[
            
        ]);
    }
    public function actionGuruSiswa() {
        $this->layout = 'main';
        return $this->render('guruSiswa',[
            
        ]);
    }
    public function actionKegiatanSiswa() {
        $this->layout = 'main';
        return $this->render('kegiatanSiswa',[
            
        ]);
    }
    public function actionSejarah() {
        $this->layout = 'main';
        return $this->render('sejarah',[
            
        ]);
    }

}
