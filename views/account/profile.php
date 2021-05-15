<?php
    /* @var $this yii\web\View */
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\ArrayHelper;
    use app\models\State;
    use kartik\select2\Select2;

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
                            <div class="col-md-6">
                                <div class="form-group">   
                                    <?= $form->field($model, 'address')->textInput(['autofocus' => true,'placeholder' => 'Address','autocomplete' => 'offgg']) ?>    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php $model->gender = ($model->gender == "Male" || $model->gender == "Female")? $model->gender : Null; ?>
                                    <?= $form->field($model, 'gender')->widget(Select2::classname(), [
                                            'data' => ['Male' => 'Male', 'Female' => 'Female'],
                                            'options' => ['placeholder' => 'Select Gender'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">   
                                    <?= $form->field($model, 'state')->widget(Select2::classname(), [
                                            'data' => ArrayHelper::map(State::find()->all(),'state_name','state_name'),
                                            'options' => ['placeholder' => 'Select State'],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]);
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $form->field($model, 'city')->dropDownList(ArrayHelper::map(State::find()->all(),'state_name','state_name'),
                                        [
                                            //'options' => ['Oman1'=>['Selected'=>'Selected']],
                                            'prompt'=>'Select State',
                                        ]); 
                                    ?>
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