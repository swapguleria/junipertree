<?php

/**
 * This is the model base class for the table "{{book_table}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "BookTable".
 *
 * Columns in table "{{book_table}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $date
 * @property string $time
 * @property integer $party_size
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $phone_no
 * @property string $special_request
 * @property string $email_subscription
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 *
 */
abstract class BaseBookTable extends GxActiveRecord
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
        return '{{book_table}}';
        }

    public static function label($n = 1)
        {
        return Yii::t('app', 'Book Table|Book Tables', $n);
        }

    public static function representingColumn()
        {
        return 'first_name';
        }

    public function rules()
        {
        return array(
            array('date, time, party_size, create_time', 'required'),
            array('party_size, phone_no, state_id, type_id, create_user_id', 'numerical', 'integerOnly' => true),
            array('first_name, last_name, email, email_subscription', 'length', 'max' => 255),
            array('id, date, time, party_size, first_name, last_name, email, phone_no, special_request, email_subscription, state_id, type_id, create_time, update_time, create_user_id', 'safe', 'on' => 'search'), array(
                'password,password_2',
                'required',
                'on' => 'book'
            ),
        );
        }

    public function relations()
        {
        return array(
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
            'date' => Yii::t('app', 'Date'),
            'time' => Yii::t('app', 'Time'),
            'party_size' => Yii::t('app', 'Party Size'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'phone_no' => Yii::t('app', 'Phone No'),
            'special_request' => Yii::t('app', 'Special Request'),
            'email_subscription' => Yii::t('app', 'Email Subscription'),
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
        $criteria->compare('date', $this->date, true);
        $criteria->compare('time', $this->time, true);
        $criteria->compare('party_size', $this->party_size);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone_no', $this->phone_no);
        $criteria->compare('special_request', $this->special_request, true);
        $criteria->compare('email_subscription', $this->email_subscription, true);
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
