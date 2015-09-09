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
        $model = Article::findOne(['alias' => $_GET['alias']]);
        if (empty($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            $this->addHits($model);
            return $this->render('view', [
                        'model' => $model,
            ]);
        }
    }

    public function actionEvent() {
        $this->layout = 'main';
        return $this->render('event');
    }

    public function actionIndex() {
        $this->layout = 'main';
        $query = Article::find()
                ->where(['article_category_id' => 36])
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

    public function actionDaily() {
        $this->layout = 'main';
        return $this->render('daily', [
        ]);
    }

//    public function actionGallery() {
//        $this->layout = 'main';
//        return $this->render('gallery', [
//        ]);
//    }

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

    public function actionGetevent() {
        $query = Article::find()
                        ->where(['article_category_id' => 1, 'publish' => 1])
                        ->orderBy('date_event DESC')->all();
        $data = array();
        foreach ($query as $val) {
            $data[] = array('title' => $val->title, 'start' => $val->date_event, 'url' => Yii::$app->urlManager->createUrl('article/' . $val->alias));
        }

        return json_encode($data);
    }

}
