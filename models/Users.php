<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $password_confirm
 * @property string $registration_date
 * @property string|null $last_login_date
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password_confirm;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_login_date'], 'default', 'value' => null],
            [['username', 'password', 'password_confirm'], 'required'],
            ['username','unique'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password'],
            [['registration_date', 'last_login_date'], 'safe'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 552],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Senha',
            'password_confirm' => 'Confirmar senha',
            'registration_date' => 'Registration Date',
            'last_login_date' => 'Last Login Date',
        ];
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentity($id)
    {
        return self::find()->andWhere(['id' => $id])->one();
    }

    public function validatePassword($password)
    {
        return $this->password === hash('sha256',$password);
    }
}
