<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutionTaskEvent */

$this->title = 'Update Institution Task Event: ' . $model->task_id;
$this->params['breadcrumbs'][] = ['label' => 'Institution Task Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->task_id, 'url' => ['view', 'task_id' => $model->task_id, 'event_id' => $model->event_id, 'institution_id' => $model->institution_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="institution-task-event-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
