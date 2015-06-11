<?php

/**
 * This is the model class for table "{{m_user}}".
 *
 * The followings are the available columns in table '{{m_user}}':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $employeenum
 * @property string $name
 * @property integer $city_id
 * @property string $address
 * @property string $phone
 * @property string $created
 * @property integer $created_user_id
 * @property string $modified
 */
class User extends CActiveRecord {

    public $cache;
    public $verifyCode;

//    public function __construct() {
//        $this->cache = Yii::app()->cache;
//    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
//    public function getDbConnection() {
//        return Yii::app()->db2;
//    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('created_user_id', 'numerical', 'integerOnly' => true),
            array('username, phone', 'length', 'max' => 20),
            array('name, password, name,description, address', 'length', 'max' => 255),
            array('modified, enabled', 'safe'),
            array('username, email', 'unique', 'message' => '{attribute} : {value} already exists!'),
            array('username, email', 'safe', 'message' => '{attribute} : {value} already exists!', 'on' => 'notAllow'),
            array('id, username, email, password, name, address, phone, created, created_user_id, modified,description', 'safe', 'on' => 'search'),
            array('avatar_img', 'unsafe'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'register'),
        );
    }

    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'name' => 'Name',
            'city_id' => 'city_id',
            'address' => 'Address',
            'phone' => 'Phone',
            'created' => 'Created',
            'created_user_id' => 'Created Userid',
            'modified' => 'Modified',
            'verifyCode' => 'Verification Code',
        );
    }

    public function search($type = 'user') {
        $criteria = new CDbCriteria;
        $criteria->together = true;

        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('phone', $this->phone, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.id DESC')
        ));
    }

    public function listUser() {
        if (!app()->session['listUser']) {
            $result = array();
            $users = $this->findAll(array('index' => 'id'));
            app()->session['listUser'] = $users;
        }

        return app()->session['listUser'];
    }

    public function listUserPhone() {
        if (!app()->session['listUserPhone']) {
            $result = array();
            $users = $this->findAll(array('index' => 'phone'));
            app()->session['listUserPhone'] = $users;
        }

        return app()->session['listUserPhone'];
    }

    public function roles() {
        $result = Roles::model()->findAll();
        return $result;
    }

    public function role($user_id) {
        $role = User::model()->findByPk($user_id);

        if (isset($role->Roles->name)) {
            $result = $role->Roles->name;
        } else {
            $result = '';
        }

        return $result;
    }

    public function listUsers($type = '') {
        $siteConfig = SiteConfig::model()->listSiteConfig();
        $sResult = User::model()->with('Roles')->findAll(array('condition' => 'Roles.is_allow_login=1'));
        return $sResult;
    }

    public function typeRoles($sType = 'user') {
        $siteConfig = SiteConfig::model()->listSiteConfig();
        $result = array();

            if (Yii::app()->user->roles_id == -1) {
                $array = array(-1 => 'Super User');
            } else {
                $array = array();
            }

            $sResult = Roles::model()->findAll(array('condition' => 'is_allow_login=1'));
            $result = $array + Chtml::listdata($sResult, 'id', 'name');


        return $result;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        return $this->hashPassword($password) === $this->password;
    }

    public function behaviors() {
        return array(
            'timestamps' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created',
                'updateAttribute' => 'modified',
                'setUpdateOnCreate' => true,
            ),
        );
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    public function hashPassword($password) {
        return sha1($password);
    }

    public function getUrlFull() {
        return param('urlImg') . $this->DownloadCategory->path . $this->url;
    }

    public function getUrlDel() {
        return createUrl('download/' . $this->Download->id);
    }

    public function getImgUrl() {
        return landa()->urlImg('avatar/', $this->avatar_img, $this->id);
    }

    public function getUrl() {

        return url('user/' . $this->id);
    }

    public function getTagImg() {
        return '<img src="' . $this->imgUrl['small'] . '" class="img-polaroid img-rounded"/><br>';
    }

    public function getMediumImage() {
        return '<img src="' . $this->imgUrl['medium'] . '" class="img-polaroid"/><br>';
    }

   

    function getFullName() {
        return '[' . $this->roles . '] ' . $this->name;
    }

    function getFullContact() {
        return $this->name . ' (0' . $this->phone . ')';
    }

    function getNamePhone() {
        return $this->name . ' (0' . $this->phone . ')';
    }

   
}
