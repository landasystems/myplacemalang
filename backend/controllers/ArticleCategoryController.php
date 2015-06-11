<?php

class ArticleCategoryController extends Controller {

    public $breadcrumbs;

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'main';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('*'),
                'users' => array('@'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        cs()->registerScript('read', '
                    $("form input, form textarea, form select").each(function(){
                    $(this).prop("disabled", true);
                });');
        $_GET['v'] = true;
        $this->actionUpdate($id);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ArticleCategory;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ArticleCategory'])) {
            if ($_POST['ArticleCategory']['parent_id']) {
                $root = $model->findByPk($_POST['ArticleCategory']['parent_id']);

                $child = new ArticleCategory;
                $child->attributes = $_POST['ArticleCategory'];

                if ($child->appendTo($root))
                    $this->redirect(array('view', 'id' => $child->id));
            }else {
                $model->attributes = $_POST['ArticleCategory'];
                if ($model->saveNode())
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
//        if (isset($_POST['ArticleCategory'])) {
//            if ($_POST['parentid']) {
//                # code...
//                echo 'aaaaaa';
//            } else {
//                echo 'bbbbbb';
//            }
//            $model->attributes = $_POST['ArticleCategory'];
//            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->id));
//        }
        if (isset($_POST['ArticleCategory'])) {
            if ($_POST['ArticleCategory']['parent_id']) {
                $root = $model->findByPk($_POST['ArticleCategory']['parent_id']);
                
                $model->attributes = $_POST['ArticleCategory'];
                
                if ($model->saveNode()) {
                    $model->moveAsFirst($root);
                    $this->redirect(array('view', 'id' => $model->id));
                }
            } else {
                $model->attributes = $_POST['ArticleCategory'];
                $model->saveNode();
                if (!($model->isRoot()))
                    $model->moveAsRoot();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) 
            {
		if (Yii::app()->request->isPostRequest) {

            $model = $this->loadModel($id);

            //delete download where have child
            $descendants = $model->children()->findAll();
            $sWhere[] = $id;
            foreach ($descendants as $o) {
                $sWhere[] = $o->id;
            }
           // Article::model()->deleteAll(array('condition'=>'article_category_id'.$sWhere));
           // landa()->deleteDir('images/' . $model->path);
            Article::model()->deleteAll(array('condition'=>'article_category_id IN (' . implode(',', $sWhere) . ')'));
//            cmd('DELETE FROM acca_article WHERE )->query();

            // we only allow deletion via POST request
            $model->deleteNode();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $session = new CHttpSession;
        $session->open();
        $criteria = new CDbCriteria();

        $model = new ArticleCategory('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['ArticleCategory'])) {
            $model->attributes = $_GET['ArticleCategory'];

            if (!empty($model->id))
                $criteria->addCondition('id = "' . $model->id . '"');


            if (!empty($model->name))
                $criteria->addCondition('name = "' . $model->name . '"');
        }

        $session['ArticleCategory_records'] = ArticleCategory::model()->findAll($criteria);

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ArticleCategory('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ArticleCategory']))
            $model->attributes = $_GET['ArticleCategory'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = ArticleCategory::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'Article-category-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
