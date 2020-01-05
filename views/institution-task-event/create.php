<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstitutionTaskEvent */

$this->title = 'Create Institution Task Event';
$this->params['breadcrumbs'][] = ['label' => 'Institution Task Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-task-event-create">

    <?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'task_id')->dropDownList(ArrayHelper::map($tasks, 'id', 'name'))->label('Выберите задачу'); ?>
		
		<div class="form-group">
		<?= $form->field($model, 'event_id')->dropDownList(ArrayHelper::map($events, 'id', 'name'))->label('Выберите мероприятие'); ?>
		<?= Html::a('Добавить мероприятие', ['event/create']); ?>
		</div>
		
		<?= $form->field($model, 'date_start')->textInput(['type' => 'date']); ?>
		
		<?= $form->field($model, 'date_finish')->textInput(['type' => 'date']); ?>
		
		<?= $form->field($model, 'is_invariant')->checkbox() ?>

		<div class="form-group">
			<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
