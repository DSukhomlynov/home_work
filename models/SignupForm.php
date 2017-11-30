<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.11.2017
 * Time: 17:07
 */

namespace app\models;
use yii\base\Model;

class SignupForm extends Model{

    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;

    public function rules() {
        return [
            [['email', 'password', 'first_name', 'last_name', 'phone'], 'required', 'message' => 'Заполните поле'],
            ['email', 'unique', 'targetClass' => User::className(),  'message' => 'Эта почта уже занята'],
            ['email','email'],
        ];
    }

    public function attributeLabels() {
        return [
            'email' => 'Почта',
            'password' => 'Пароль',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'phone' => 'Номер телефона',
        ];
    }

}