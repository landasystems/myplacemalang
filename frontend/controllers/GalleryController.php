<?php

namespace frontend\controllers;

use Yii;
use common\models\Gallery;
use common\models\GalleryCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use yii\helpers\Html;
use yii\widgets\LinkPager;

class GalleryController extends Controller {

    public function actionView() {
        $this->layout = 'main';
        $idcat= GalleryCategory::findOne(["alias"=> $_GET['alias']]);
//        echo $idcat['id'];
        $model = Gallery::find()
                ->where("gallery_category_id = ".$idcat['id'])
                ->all();
        if (empty($model)) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
//            $this->addHits($model);
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
//        $query = \common\models\GalleryCategory::find()
        $query  = GalleryCategory::find()
                ->orderBy('id ASC');
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
        Yii::error($query->count());
        $model = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', [
                    'model' => $model,
                    'pagination' => $pagination,
        ]);
    }

    
    public function addHits($model) {
        $model->hits++;
        $model->save();
    }

}
