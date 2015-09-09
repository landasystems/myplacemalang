<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gallery_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $level
 * @property integer $lft
 * @property integer $rgt
 * @property integer $root
 * @property string $path
 * @property integer $parent_id
 */
class GalleryCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'lft', 'rgt', 'root', 'parent_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['image', 'path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'level' => 'Level',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'root' => 'Root',
            'path' => 'Path',
            'parent_id' => 'Parent ID',
        ];
    }
    
    
      public function getImgSmall() {
        if (empty($this->image)) {
            return Yii::$app->params['urlImg'] . '/150x150-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . $this->path .'/'. $this->id . '-150x150-' . Yii::$app->landa->urlParsing($this->image);
        }
    }

    public function getImgMedium() {
        if (empty($this->image)) {
            return Yii::$app->params['urlImg'] . '/350x350-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . $this->path .'/'. $this->id . '-350x350-' . Yii::$app->landa->urlParsing($this->image);
        }
    }

    public function getImgBig() {
        if (empty($this->image)) {
            return Yii::$app->params['urlImg'] . '/700x700-noimage.jpg';
        } else {
            return Yii::$app->params['urlImg'] . $this->path .'/'. $this->id . '-700x700-' . Yii::$app->landa->urlParsing($this->image);
        }
    }
}
