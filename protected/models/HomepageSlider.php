<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $description
 * @property string $image
 * @property string $link
 * @property string $link_label
 * @property integer $order
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseHomepageSlider');

class HomepageSlider extends BaseHomepageSlider
    {

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    public function getImage()
        {
        if (!empty($this->image))
            {
            $image = $this->image;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    }
