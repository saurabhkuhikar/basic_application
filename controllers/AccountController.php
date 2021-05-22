<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\SignupForm;
use app\models\Profile;
use app\models\Account;
use yii\web\UploadedFile;

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

    // UploadedFile
    public function actionProfile()
    {  
        $model = $this->findProfile(Yii::$app->user->identity->id);
        $model->setScenario('updateProfile');
        $profilePic = (isset($model->profile) && !empty($model->profile))? $model->profile : Null;

        if ($model->load(Yii::$app->request->post())) {
            $profilePictureObject = UploadedFile::getInstance($model,'profile');
            if(!empty($profilePictureObject)){
                $model->profile = $profilePictureObject;
                $fileName = time().'.'.$model->profile->extension;
                $model->profile->saveAs('upload/'.$fileName);
                $profilePic = $fileName;
            }

            $model->profile = $profilePic;
            if($model->save()){
                Yii::$app->session->setFlash('success', "Profile updated successfully.");
            }
        }
        return $this->render('profile', ['model' => $model]); 
    } 
    

    /**
     * Find Profile Model.
     * @param id
     * @return string
    */
    protected function findProfile($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}