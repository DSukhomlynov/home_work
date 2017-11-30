<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use \yii\db\ActiveRecord;

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
class Users extends ActiveRecord implements IdentityInterface
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
            [['first_name', 'last_name', 'email', 'password', 'refferal_code'], 'required'],
            [['first_name', 'last_name', 'phone', 'email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 500],
            [['refferal_code'], 'string', 'max' => 50],
            [['group'], 'string', 'max' => 25],
            [['email'], 'unique'],
            [['refferal_code'], 'unique'],
            [['authKey','accessToken'],'safe']
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

    public function createRefferalCode()
    {
        if (!empty($this->refferal_code)) {
            return false;
        }

        while (true) {
            $refferal_code = strtoupper(uniqid('', false));
            $check_user = Users::find()->where(['refferal_code' => $refferal_code])->asArray()->select(['id'])->one();
            if (!empty($check_user)) {
                unset($check_user, $refferal_code);
                continue;
            }
            $this->refferal_code = $refferal_code;
            break;
        }
        return true;
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        //var_dump('findIdentity');die;
        $users = Users::find()->all();
        if (!empty($users) && is_array($users)) {
            foreach ($users as $user) {
                if ($user instanceOf Users && $user->id === $id) {
                    return new static($user->toArray());
                }
            }
        }

        return null;
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $manager the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $manager = false)
    {
        //var_dump('findIdentityByAccessToken');die;
        $users = Users::find()->where(['is_manager' => $manager])->all();
        if (!empty($users) && is_array($users)) {
            foreach ($users as $user) {
                if ($user instanceOf Users && $user->accessToken === $token) {
                    return new static($user->toArray());
                }
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $users = Users::find()->all();
        if (!empty($users) && is_array($users)) {
            foreach ($users as $user) {
                if ($user instanceOf Users && $user->email === $username) {
                    return new static($user->toArray());
                }
            }
        }

        return null;
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        //var_dump('getAuthKey', $this->authKey);die;
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        //var_dump('validateAuthKey');die;
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        //var_dump('validatePassword', Yii::$app->getSecurity()->validatePassword($password, $hash));die;
        return Yii::$app->getSecurity()->validatePassword($password, $hash);
    }
}