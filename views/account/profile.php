<?php
    /* @var $this yii\web\View */
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

    $this->title = 'My Profile';
    $this->params['breadcrumbs'][] = $this->title;
?> 

<div class="site-login">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-pro">
            <div class="panel-heading"><?= Html::encode($this->title) ?></div>
                <div class="panel-body">
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php $form = ActiveForm::begin(['id' => 'update-profile','method' => 'post','action' => '/account/profile']); ?>
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
                            <div class="col-md-12">  
                                <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>