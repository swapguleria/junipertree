<?php

/**
 * This is the model base class for the table "{{homepage}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Homepage".
 *
 * Columns in table "{{homepage}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $tab_1_title
 * @property string $tab_1_sub_title
 * @property string $tab_1_description
 * @property string $tab_1_image
 * @property string $box_1_title
 * @property string $box_1_description
 * @property string $box_1_button_text
 * @property string $box_1_link
 * @property string $box_1_background
 * @property string $box_2_title
 * @property string $box_2_description
 * @property string $box_2_button_text
 * @property string $box_2_link
 * @property string $box_2_background
 * @property string $tab_2_title
 * @property string $tab_2_text
 * @property string $tab_2_link
 * @property string $tab_2_button_text
 * @property string $tab_2_background
 * @property string $tab_3_title_1
 * @property string $tab_3_sub_title_1
 * @property string $tab_3_description
 * @property string $tab_3_title_2
 * @property string $tab_3_sub_title_2
 * @property string $tab_3_background
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 *
 */
abstract class BaseHomepage extends GxActiveRecord
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
        return '{{homepage}}';
        }

    public static function label($n = 1)
        {
        return Yii::t('app', 'Homepage|Homepages', $n);
        }

    public static function representingColumn()
        {
        return 'tab_1_title';
        }

    public function rules()
        {
        return array(
            array('tab_1_title, tab_1_sub_title, tab_1_description, tab_1_image, box_1_title, box_1_description, box_1_button_text, box_1_link, box_2_title, box_2_description, box_2_button_text, box_2_link, tab_2_title, tab_2_text, tab_2_link, tab_2_button_text, tab_3_title_1, tab_3_sub_title_1, tab_3_description, tab_3_title_2, tab_3_sub_title_2', 'required'),
            array('state_id, type_id, create_user_id', 'numerical', 'integerOnly' => true),
            array('tab_1_title, tab_1_sub_title, tab_1_image, box_1_title, box_1_button_text, box_1_link, box_1_background, box_2_title, box_2_button_text, box_2_link, box_2_background, tab_2_title, tab_2_text, tab_2_link, tab_2_button_text, tab_2_background, tab_3_title_1, tab_3_sub_title_1, tab_3_title_2, tab_3_sub_title_2, tab_3_background,tab_3_background_right', 'length', 'max' => 255),
            array('id, tab_1_title, tab_1_sub_title, tab_1_description, tab_1_image, box_1_title, box_1_description, box_1_button_text, box_1_link, box_1_background, box_2_title, box_2_description, box_2_button_text, box_2_link, box_2_background, tab_2_title, tab_2_text, tab_2_link, tab_2_button_text, tab_2_background, tab_3_title_1, tab_3_sub_title_1, tab_3_description, tab_3_title_2, tab_3_sub_title_2, tab_3_background, tab_3_background_right, state_id, type_id, create_time, update_time, create_user_id', 'safe', 'on' => 'search'),
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
            'tab_1_title' => Yii::t('app', 'Title'),
            'tab_1_sub_title' => Yii::t('app', 'Sub Title'),
            'tab_1_description' => Yii::t('app', 'Description'),
            'tab_1_image' => Yii::t('app', 'Image'),
            'box_1_title' => Yii::t('app', 'Box 1 Title'),
            'box_1_description' => Yii::t('app', 'Box 1 Description'),
            'box_1_button_text' => Yii::t('app', 'Box 1 Button Text'),
            'box_1_link' => Yii::t('app', 'Box 1 Link'),
            'box_1_background' => Yii::t('app', 'Box 1 Image'),
            'box_2_title' => Yii::t('app', 'Box 2 Title'),
            'box_2_description' => Yii::t('app', 'Box 2 Description'),
            'box_2_button_text' => Yii::t('app', 'Box 2 Button Text'),
            'box_2_link' => Yii::t('app', 'Box 2 Link'),
            'box_2_background' => Yii::t('app', 'Box 2 Image'),
            
            'tab_2_title' => Yii::t('app', 'Title'),
            'tab_2_text' => Yii::t('app', 'Text'),
            'tab_2_link' => Yii::t('app', 'Link'),
            'tab_2_button_text' => Yii::t('app', 'Button Text'),
            'tab_2_background' => Yii::t('app', 'Image'),
            'tab_3_title_1' => Yii::t('app', 'Title 1'),
            'tab_3_sub_title_1' => Yii::t('app', 'Sub Title 1'),
            'tab_3_description' => Yii::t('app', 'Description'),
            'tab_3_title_2' => Yii::t('app', 'Title 2'),
            'tab_3_sub_title_2' => Yii::t('app', 'Sub Title 2'),
            'tab_3_background' => Yii::t('app', 'Image Left'),
            'tab_3_background_right' => Yii::t('app', 'Image Right'),
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
        $criteria->compare('tab_1_title', $this->tab_1_title, true);
        $criteria->compare('tab_1_sub_title', $this->tab_1_sub_title, true);
        $criteria->compare('tab_1_description', $this->tab_1_description, true);
        $criteria->compare('tab_1_image', $this->tab_1_image, true);
        $criteria->compare('box_1_title', $this->box_1_title, true);
        $criteria->compare('box_1_description', $this->box_1_description, true);
        $criteria->compare('box_1_button_text', $this->box_1_button_text, true);
        $criteria->compare('box_1_link', $this->box_1_link, true);
        $criteria->compare('box_1_background', $this->box_1_background, true);
        $criteria->compare('box_2_title', $this->box_2_title, true);
        $criteria->compare('box_2_description', $this->box_2_description, true);
        $criteria->compare('box_2_button_text', $this->box_2_button_text, true);
        $criteria->compare('box_2_link', $this->box_2_link, true);
        $criteria->compare('box_2_background', $this->box_2_background, true);
        $criteria->compare('tab_2_title', $this->tab_2_title, true);
        $criteria->compare('tab_2_text', $this->tab_2_text, true);
        $criteria->compare('tab_2_link', $this->tab_2_link, true);
        $criteria->compare('tab_2_button_text', $this->tab_2_button_text, true);
        $criteria->compare('tab_2_background', $this->tab_2_background, true);
        $criteria->compare('tab_3_title_1', $this->tab_3_title_1, true);
        $criteria->compare('tab_3_sub_title_1', $this->tab_3_sub_title_1, true);
        $criteria->compare('tab_3_description', $this->tab_3_description, true);
        $criteria->compare('tab_3_title_2', $this->tab_3_title_2, true);
        $criteria->compare('tab_3_sub_title_2', $this->tab_3_sub_title_2, true);
        $criteria->compare('tab_3_background', $this->tab_3_background, true);
        $criteria->compare('tab_3_background_right', $this->tab_3_background_right, true);
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
