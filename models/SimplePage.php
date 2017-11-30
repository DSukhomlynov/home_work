<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_simple_page".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $content
 * @property string $custom_template
 * @property integer $active
 * @property integer $delete
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 */
class SimplePage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_simple_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['content'], 'string'],
            [['active', 'delete'], 'integer'],
            [['name', 'alias', 'custom_template', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['alias'], 'unique'],
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
            'content' => 'Content',
            'custom_template' => 'Custom Template',
            'active' => 'Active',
            'delete' => 'Delete',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
        ];
    }
}
