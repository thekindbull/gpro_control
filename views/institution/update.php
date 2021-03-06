<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */

$this->title = 'Update Institution: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Institutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<div class="institution-update">
	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'short_name') ?>

		<?= $form->field($model, 'full_name') ?>
		
		<?= $form->field($model, 'address') ?>
		
		<?= $form->field($model, 'parent_id') ?>

		<div class="form-group">
			<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>
</div>
