<?php

namespace app\models;

use app\core\base\BaseActiveRecord;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends BaseActiveRecord implements IdentityInterface
{
    public $password;
    public $rememberMe;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'password'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            ['password', 'validatePassword']
        ];
    }

    public function scenarios()
    {
        $parent = parent::scenarios();
        $parent['login'] = ['username', 'password'];
        $parent['register'] = ['username', 'password', 'email'];
        return $parent;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if(is_null($user) || !$this->validatePasswordHash($this->password)){

            }
        }
    }

    public function validatePasswordHash($password){
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function getUser(){
        $user = User::findOne(['username' => $this->username]);
        $this->password_hash = $user->password_hash;
        return $user;
    }

    public function login()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = $this->getUser();

        if (!is_null($user)) {
            if ($this->validatePasswordHash($this->password, $user->password_hash)) {
                Yii::$app->user->login($user, 50000);
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
}
