<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property string $refferal_code
 * @property string $authKey
 * @property string $accessToken
 * @property string $group
 *
 * @property TkCooments[] $tkCooments
 * @property TkCooments[] $tkCooments0
 * @property TkOrderBonus[] $tkOrderBonuses
 * @property TkPaymentCards[] $tkPaymentCards
 * @property TkRecentlyViewed[] $tkRecentlyVieweds
 * @property TkRefferalBonus[] $tkRefferalBonuses
 * @property TkUserAddresses[] $tkUserAddresses
 * @property TkUserBalance $tkUserBalance
 * @property TkUserGroupDiscount[] $tkUserGroupDiscounts
 * @property TkUserSubscription[] $tkUserSubscriptions
 * @property TkWishlist[] $tkWishlists
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'password'], 'required'],
            [['first_name', 'last_name', 'phone', 'email', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 500],
            [['refferal_code'], 'string', 'max' => 50],
            [['group'], 'string', 'max' => 25],
            [['email'], 'unique'],
            [['refferal_code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
            'refferal_code' => 'Refferal Code',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'group' => 'Group',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkCooments()
    {
        return $this->hasMany(TkCooments::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkCooments0()
    {
        return $this->hasMany(TkCooments::className(), ['id_answer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkOrderBonuses()
    {
        return $this->hasMany(TkOrderBonus::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkPaymentCards()
    {
        return $this->hasMany(TkPaymentCards::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkRecentlyVieweds()
    {
        return $this->hasMany(TkRecentlyViewed::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkRefferalBonuses()
    {
        return $this->hasMany(TkRefferalBonus::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkUserAddresses()
    {
        return $this->hasMany(TkUserAddresses::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkUserBalance()
    {
        return $this->hasOne(TkUserBalance::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkUserGroupDiscounts()
    {
        return $this->hasMany(TkUserGroupDiscount::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkUserSubscriptions()
    {
        return $this->hasMany(TkUserSubscription::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTkWishlists()
    {
        return $this->hasMany(TkWishlist::className(), ['id_user' => 'id']);
    }
}
