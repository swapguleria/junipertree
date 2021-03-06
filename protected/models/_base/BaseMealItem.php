<?php

 
/**
 * This is the model base class for the table "{{meal_item}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "MealItem".
 *
 * Columns in table "{{meal_item}}" available as properties of the model,
 * followed by relations of table "{{meal_item}}" available as properties of the model.
 *
 * @property integer $id
 * @property integer $meal_id
 * @property string $title
 * @property string $sub_title
 * @property integer $price
 * @property string $image
 * @property string $background_image
 * @property string $description
 * @property integer $state_id
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 * @property string $update_time
 *
 * @property User $createUser
 * @property Meal $meal
 */
abstract class BaseMealItem extends GxActiveRecord {

	
	public static function getStatusOptions($id = null)
	{
		$list = array("Draft","Published","Archive");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}	
	public static function getTypeOptions($id = null)
	{
		$list = array("TYPE1","TYPE2","TYPE3");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}
 	public function beforeValidate()
	{
		if($this->isNewRecord)
		{
			if ( !isset( $this->create_user_id )) $this->create_user_id = Yii::app()->user->id;			
		if ( !isset( $this->create_time )) $this->create_time = date( 'Y-m-d H:i:s');
			}else{
					}
		return parent::beforeValidate();
	}

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{meal_item}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Meal Item|Meal Items', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('meal_id, title, sub_title, create_user_id, create_time', 'required'),
			array('meal_id, state_id, type_id, create_user_id', 'numerical', 'integerOnly'=>true),
			array('title, sub_title,price, image, background_image', 'length', 'max'=>256),
			array('price, state_id, type_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, meal_id, title, sub_title, price, image, background_image, description, state_id, type_id, create_user_id, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
			'meal' => array(self::BELONGS_TO, 'Meal', 'meal_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'meal_id' => null,
			'title' => Yii::t('app', 'Title'),
			'sub_title' => Yii::t('app', 'Sub Title'),
			'price' => Yii::t('app', 'Price'),
			'image' => Yii::t('app', 'Image'),
			'background_image' => Yii::t('app', 'Background Image'),
			'description' => Yii::t('app', 'Description'),
			'state_id' => Yii::t('app', 'State'),
			'type_id' => Yii::t('app', 'Type'),
			'create_user_id' => null,
			'create_time' => Yii::t('app', 'Create Time'),
			'update_time' => Yii::t('app', 'Update Time'),
			'createUser' => null,
			'meal' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('meal_id', $this->meal_id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('sub_title', $this->sub_title, true);
		$criteria->compare('price', $this->price);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('background_image', $this->background_image, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('state_id', $this->state_id);
		$criteria->compare('type_id', $this->type_id);
		$criteria->compare('create_user_id', $this->create_user_id);
		$criteria->compare('create_time', $this->create_time, true);
		$criteria->compare('update_time', $this->update_time, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}