<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trener */

$this->title = Yii::t('app', 'Create Trener');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Treners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trener-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
