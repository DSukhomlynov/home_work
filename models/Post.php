<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_post".
 *
 * @property integer $id
 * @property string $name
 * @property integer $published
 * @property integer $active
 * @property integer $delete
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $alias
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'published', 'alias'], 'required'],
            [['published', 'active', 'delete'], 'integer'],
            [['content'], 'string'],
            [['name', 'meta_title', 'meta_description', 'meta_keywords', 'alias'], 'string', 'max' => 255],
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
            'published' => 'Published',
            'active' => 'Active',
            'delete' => 'Delete',
            'content' => 'Content',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'alias' => 'Alias',
        ];
    }
}
