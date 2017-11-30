<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_settings".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property integer $active
 * @property integer $is_json
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['active', 'is_json'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 500],
            [['name'], 'unique'],
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
            'value' => 'Value',
            'active' => 'Active',
            'is_json' => 'Is Json',
        ];
    }
}
