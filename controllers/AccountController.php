<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\SignupForm;
use app\models\MyProfile;
use app\models\Account;




class AccountController extends Controller
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


    public function actionProfile()
    {  
        $model = new MyProfile(); 
        if($model->load(Yii::$app->request->post()) && $model->profile()){
            //Helper::SetSession(['name'=> Yii::$app->user->identity->first_name." ".Yii::$app->user->identity->last_name,'client_id'=> Yii::$app->user->identity->id,'account_type'=> Yii::$app->user->identity->account_type,'mentor_id'=> Yii::$app->user->identity->referral_id,'otp'=> "2222"]);
            return $this->redirect(['account/_form','id' => $model->id]);
            
        }             
        return $this->render('profile', ['model' => $model]);
        
    } 

    
    protected function findModel($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Updates an existing Hospital model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['dashboard', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    
}