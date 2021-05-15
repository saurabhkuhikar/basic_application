<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property int $mobile
 * @property string|null $dob
 * @property string|null $gender
 * @property string|null $address
 * @property string|null $state
 * @property string|null $city
 * @property string|null $status
 * @property string|null $created
 * @property string|null $updated
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            //[['email', 'password', 'auth_key', 'mobile'], 'required'],
            [['first_name','last_name','email', 'mobile','address','gender','state','city'], 'required','on'=>'updateProfile'],
            [['mobile'], 'integer'],
            [['email'], 'email'],
            [['created', 'updated','dob'], 'safe'],
            [['first_name', 'last_name', 'email', 'password', 'address', 'status'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['gender'], 'string', 'max' => 15],
            [['state', 'city'], 'string', 'max' => 50],
            [['first_name','last_name'], 'match', 'pattern' => '/^[a-zA-Z_ ]*$/', 'message' => 'Only alphabetic characters allowed'],
            ['mobile', 'match', 'pattern' =>'/^[0-9]{10}$/','message' => 'Mobile Number Must be Exactly 10 Digit.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'mobile' => 'Mobile',
            'dob' => 'Date of Birth',
            'gender' => 'Gender',
            'address' => 'Address',
            'state' => 'State',
            'city' => 'City',
            'status' => 'Status',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
