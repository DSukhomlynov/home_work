<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_event_calendar".
 *
 * @property integer $id
 * @property string $name
 * @property integer $date
 * @property integer $time
 * @property string $type
 * @property string $price
 * @property string $old_price
 * @property string $location
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 */
class EventCalendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_event_calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'type', 'location','alias'], 'required'],
            [['date'], 'integer'],
            [['price', 'old_price'], 'number'],
            [['content'], 'string'],
            [['name', 'meta_title', 'meta_description', 'meta_keywords', 'time', 'alias'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 45],
            [['location'], 'string', 'max' => 500],
            [['name', 'alias'], 'unique'],
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
            'alias' => 'Alias',
            'date' => 'Date',
            'time' => 'Time',
            'type' => 'Type',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'location' => 'Location',
            'content' => 'Content',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
        ];
    }
}
