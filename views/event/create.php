<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = 'Create Event';
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <?php $form = ActiveForm::begin(); ?>
	
		<?= $form->field($model, 'name') ?>
		<?= $form->field($model, 'description') ?>
		
		<?= $form->field($model, 'result_id')->dropDownList(ArrayHelper::map($results, 'id', 'name'))->label('Выберите тип результата'); ?>
		
		<?= $form->field($model, 'result_description')->textArea(); ?>

		<div class="form-group">
			<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
