<?php

namespace app\models;
use Yii;
use yii\base\Model;
use app\models\User;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "hospital".
 *
 * @property int $id
 * @property string $first_name
 * @property string $spectialization
 * @property string $created
 */
class Account extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['first_name','last_name','email', 'password','confirm_password','mobile'], 'required'],
            ['email','email'],
            [['password','confirm_password'], 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Confirm Passwords don't match with password." ],
            [['first_name','last_name'], 'match', 'pattern' => '/^[a-zA-Z_ ]*$/', 'message' => 'Only alphabetic characters allowed'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email is already registered with us.'],
            [['mobile'],'number'],
            ['mobile', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This mobile already registered with us.'],
            ['mobile', 'match', 'pattern' =>'/^[0-9]{10}$/','message' => 'Mobile Number Must be Exactly 10 Digit.'],
        ];
    }
   

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email'=>'Email',
            'mobile' => 'Mobile'
        ];
    }
}
