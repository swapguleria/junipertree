<?php

/**
 * This is the model base class for the table "{{banner}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Banner".
 *
 * Columns in table "{{banner}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $url_id
 * @property string $name
 * @property string $tagline
 * @property string $image
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 *
 */
abstract class BaseBanner extends GxActiveRecord
    {

    public static function getStatusOptions($id = null)
        {
        $list = array("Draft", "Published", "Archive");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    public static function getTypeOptions($id = null)
        {
        $list = array("TYPE1", "TYPE2", "TYPE3");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    public function beforeValidate()
        {
        if ($this->isNewRecord)
            {
            if (!isset($this->create_time)) $this->create_time = date('Y-m-d H:i:s');
            if (!isset($this->create_user_id)) $this->create_user_id = Yii::app()->user->id;
            }else
            {
            
            }
        return parent::beforeValidate();
        }

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    public function tableName()
        {
        return '{{banner}}';
        }

    public static function label($n = 1)
        {
        return Yii::t('app', 'Banner|Banners', $n);
        }

    public static function representingColumn()
        {
        return 'name';
        }

    public function rules()
        {
        return array(
            array('url_id, name, tagline, image, create_time, create_user_id', 'required'),
            array('url_id, state_id, type_id, create_user_id', 'numerical', 'integerOnly' => true),
            array('name, tagline, image', 'length', 'max' => 255),
            array('id, url_id, name, tagline, image, state_id, type_id, create_time, update_time, create_user_id', 'safe', 'on' => 'search'),
        );
        }

    public function relations()
        {
        return array(
            'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
            'url' => array(self::BELONGS_TO, 'Url', 'url_id'),
        );
        }

    public function pivotModels()
        {
        return array(
        );
        }

    public function attributeLabels()
        {
        return array(
            'id' => Yii::t('app', 'ID'),
            'url_id' => Yii::t('app', 'Url'),
            'name' => Yii::t('app', 'Name'),
            'tagline' => Yii::t('app', 'Tagline'),
            'image' => Yii::t('app', 'Image'),
            'state_id' => Yii::t('app', 'State'),
            'type_id' => Yii::t('app', 'Type'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'create_user_id' => Yii::t('app', 'Create User'),
        );
        }

    public function search()
        {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('url_id', $this->url_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('tagline', $this->tagline, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('create_user_id', $this->create_user_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        }

    }
