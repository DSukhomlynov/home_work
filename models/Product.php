<?php

namespace app\models;

use Yii;
use himiklab\yii2\search\behaviors\SearchBehavior;

/**
 * This is the model class for table "tk_product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $alias
 * @property integer $active
 * @property integer $delete
 * @property string $price
 * @property string $old_price
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $taste
 * @property string $complect
 * @property string $content
 * @property string $ingredients
 * @property string $shipping_returns
 * @property string $advice
 * @property integer $hit
 * @property integer $sale
 * @property integer $only_components_kit
 * @property integer $is_packing
 * @property integer $update
 *
 * @property TkRecentlyViewed[] $tkRecentlyVieweds
 * @property TkWishlist[] $tkWishlists
 */
class Product extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'search' => [
                'class' => SearchBehavior::className(),
                'searchScope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['name', 'content', 'id', 'alias']);
                    //$model->andWhere(['indexed' => true]);
                },
                'searchFields' => function ($model) {
                    /** @var self $model */
                    return [
                        ['name' => 'title', 'value' => $model->name],
                        ['name' => 'body', 'value' => strip_tags($model->content)],
                        ['name' => 'url', 'value' => '/blog/'.$model->id.'-'.$this->alias, 'type' => SearchBehavior::FIELD_KEYWORD],
                        // ['name' => 'model', 'value' => 'page', 'type' => SearchBehavior::FIELD_UNSTORED],
                    ];
                }
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent', 'active', 'delete', 'hit', 'sale', 'only_components_kit', 'is_packing', 'update'], 'integer'],
            [['price', 'old_price'], 'number'],
            [['content', 'ingredients', 'shipping_returns', 'advice'], 'string'],
            [['name', 'alias', 'meta_title', 'meta_description', 'meta_keywords', 'complect'], 'string', 'max' => 255],
            [['taste'], 'string', 'max' => 500],
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
            'parent' => 'Parent',
            'alias' => 'Alias',
            'active' => 'Active',
            'delete' => 'Delete',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'taste' => 'Taste',
            'complect' => 'Complect',
            'content' => 'Content',
            'ingredients' => 'Ingredients',
            'shipping_returns' => 'Shipping Returns',
            'advice' => 'Advice',
            'hit' => 'Hit',
            'sale' => 'Sale',
            'only_components_kit' => 'Only Components Kit',
            'is_packing' => 'Is Packing',
            'update' => 'Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkRecentlyVieweds()
    {
        return $this->hasMany(TkRecentlyViewed::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkWishlists()
    {
        return $this->hasMany(TkWishlist::className(), ['id_product' => 'id']);
    }
}
