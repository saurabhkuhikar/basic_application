<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-pro">
            <div class="panel-heading"><?= Html::encode($this->title) ?></div>
                <div class="panel-body">
                    <p>Please fill out the following fields to Register:</p>

                    <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true,'placeholder' => 'First Name']) ?>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'last_name')->textInput(['autofocus' => true,'placeholder' => 'Last Name']) ?>    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder' => 'Email']) ?>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'mobile')->textInput(['autofocus' => true,'placeholder' => 'Mobile']) ?>    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true,'placeholder' => 'Password']); ?>  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'confirm_password')->passwordInput(['autofocus' => true,'placeholder' => 'Confirm Password']); ?>  
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            </div>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>