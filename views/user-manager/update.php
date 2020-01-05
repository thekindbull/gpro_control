<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserManager */

$this->title = 'Update User Manager: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-manager-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
