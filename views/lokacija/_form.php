<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lokacija */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lokacija-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'trener_id')->textInput() ?>

    <?= $form->field($model, 'lokacija')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_teretana')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
