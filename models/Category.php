<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $alias
 * @property integer $active
 * @property integer $delete
 * @property string $content
 * @property string $image
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['parent', 'active', 'delete'], 'integer'],
            [['content'], 'string'],
            [['name', 'alias', 'image', 'meta_title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
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
            'parent' => 'Parent',
            'alias' => 'Alias',
            'active' => 'Active',
            'delete' => 'Delete',
            'content' => 'Content',
            'image' => 'Image',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
        ];
    }
}
