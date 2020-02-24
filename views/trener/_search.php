<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TrenerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trener-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'korisnik_id') ?>

    <?= $form->field($model, 'ime') ?>

    <?= $form->field($model, 'prezime') ?>

    <?= $form->field($model, 'slika') ?>

    <?php // echo $form->field($model, 'opis') ?>

    <?php // echo $form->field($model, 'pol') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    

</div>
