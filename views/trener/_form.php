<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\Trener */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trener-form">

    <?php $form = ActiveForm::begin();
    $model->korisnik_id = Yii::$app->user->id;

    ?>

    <?php
    echo Html::activeHiddenInput($model,'korisnik_id');
    echo Yii::$app->user->id;
    ?>


    <?= $form->field($model, 'ime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prezime')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model,'file')->fileInput();?>

    <?= $form->field($model, 'opis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pol')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
