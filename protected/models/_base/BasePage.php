<?php

/**
 * This is the model base class for the table "{{page}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Page".
 *
 * Columns in table "{{page}}" available as properties of the model,
 * followed by relations of table "{{page}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 *
 * @property User $createUser
 */
abstract class BasePage extends GxActiveRecord {
	const PAGE_ABOUT = 0;
	const PAGE_TERM_CONDITION = 1;
	const PAGE_PRIVACY_POLICY = 2;

	public static function getStatusOptions($id = null)
	{
		$list = array("Draft","Init","Execute","Release","Close");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}
	public static function getTypeOptions($id = null)
	{
		$list = array(
		self::PAGE_ABOUT => 'About Us',
		self::PAGE_TERM_CONDITION => 'Terms & Conditions',
		self::PAGE_PRIVACY_POLICY => 'Privacy Policy',
		);
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}
	public function beforeValidate()
	{
		if($this->isNewRecord)
		{
			if ( !isset( $this->create_time )) $this->create_time = date( 'Y-m-d H:i:s');
			if ( !isset( $this->create_user_id )) $this->create_user_id = Yii::app()->user->id;
		}else{
		}
		return parent::beforeValidate();
	}


	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{page}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Page|Pages', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
		//array('title', 'required'),
		array('state_id, type_id, create_user_id', 'numerical', 'integerOnly'=>true),
		array('title','captiliseWord'),
		array('title', 'length', 'max'=>256),
		array('description, create_time, update_time', 'safe'),
		array('description, state_id, type_id, create_time, update_time, create_user_id', 'default', 'setOnEmpty' => true, 'value' => null),
		array('id, title, description, state_id, type_id, create_time, update_time, create_user_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'description' => Yii::t('app', 'Description'),
			'state_id' => Yii::t('app', 'State'),
			'type_id' => Yii::t('app', 'Type of Page'),
			'create_time' => Yii::t('app', 'Create Time'),
			'update_time' => Yii::t('app', 'Update Time'),
			'create_user_id' => null,
			'createUser' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
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