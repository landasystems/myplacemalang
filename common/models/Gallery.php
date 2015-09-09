<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property integer $gallery_category_id
 * @property string $image
 * @property string $description
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_category_id'], 'integer'],
            [['image', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_category_id' => 'Gallery Category ID',
            'image' => 'Image',
            'description' => 'Description',
        ];
    }
    
    public function foname($id){
       $folder= GalleryCategory::findOne(['id'=>$id]);
        return $folder['alias'];
    }
    
      public function getImgSmall() {
        if (empty($this->image)) {
            return Yii::$app->params['urlImg'] . '/150x150-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . '/gallery/'.$this->foname($this->gallery_category_id) .'/'. $this->id . '-150x150-' . Yii::$app->landa->urlParsing($this->image);
        }
    }

    public function getImgMedium() {
        if (empty($this->image)) {
            return Yii::$app->params['urlImg'] . '/350x350-noimage.jpg';
        } else {
            $folder= GalleryCategory::findOne(['id'=>$this->id]);
        $dd= $folder['alias'];
            return Yii::$app->params['urlImg'] . '/gallery/'.$this->foname($this->gallery_category_id) .'/'. $this->id . '-350x350-' . Yii::$app->landa->urlParsing($this->image);
        }
    }

    public function getImgBig() {
        if (empty($this->image)) {
            return Yii::$app->params['urlImg'] . '/700x700-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . '/gallery/'.$this->foname($this->gallery_category_id) .'/'. $this->id . '-700x700-' . Yii::$app->landa->urlParsing($this->image);
        }
    }
}
