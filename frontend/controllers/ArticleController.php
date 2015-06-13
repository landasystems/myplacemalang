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
            $this->addHits($model);
            return $this->render('view', [
                        'model' => $model,
            ]);
        }
    }

    public function actionIndex() {
        $this->layout = 'main';
        $query = Article::find()
                ->where(['article_category_id' => [1,36]])
                ->orderBy('created DESC');
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        $model = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', [
                    'model' => $model,
//                    'alias' => $alias,
                    'pagination' => $pagination,
        ]);
    }

    public function actionEntertainment() {
        $this->layout = 'main';

        return $this->render('entertainment', [
        ]);
    }

    public function actionAbout() {
        $this->layout = 'main';
        return $this->render('about', [
        ]);
    }

    public function actionGuruSiswa() {
        $this->layout = 'main';
        $model = Article::findOne([
                    'id' => 17
        ]);
        $this->addHits($model);
        return $this->render('guruSiswa', [
                    'model' => $model
        ]);
    }

    public function actionGallery() {
        $this->layout = 'main';
        return $this->render('gallery', [
        ]);
    }

    public function actionContact() {
        $this->layout = 'main';
        return $this->render('contact', [
        ]);
    }
    public function actionMyktv() {
        $this->layout = 'main';
        return $this->render('myktv', [
        ]);
    }

    public function actionBeverages() {
        $this->layout = 'main';
        return $this->render('beverages', [
        ]);
    }

    public function addHits($model) {
        $model->hits++;
        $model->save();
    }

}
