<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Indicator */

$this->title = 'Новый показатель';
$this->params['breadcrumbs'][] = ['label' => 'Показатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indicator-create">

     <?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'name') ?>
		
		<?= $form->field($model, 'unit_id')->dropDownList(ArrayHelper::map($units, 'id', 'name'))->label('Выберите единицу измерения'); ?>

		<div class="form-group">
			<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
