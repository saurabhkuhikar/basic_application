<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\SignupForm;


class AccountController extends \yii\web\Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout','dashboard'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionSignup()
    {
        $model = new SignupForm();

        if($model->load(Yii::$app->request->post()) && $model->signup()){
            //Helper::SetSession(['name'=> Yii::$app->user->identity->first_name." ".Yii::$app->user->identity->last_name,'client_id'=> Yii::$app->user->identity->id,'account_type'=> Yii::$app->user->identity->account_type,'mentor_id'=> Yii::$app->user->identity->referral_id,'otp'=> "2222"]);
            return $this->redirect(['account/dashboard']);
        }
        return $this->render('signup', ['model' => $model]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDashboard()
    {
        return $this->render('dashboard');
    }
}
