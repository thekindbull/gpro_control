<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserManager */

$this->title = 'Create User Manager';
$this->params['breadcrumbs'][] = ['label' => 'User Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-manager-create">

    <?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'email') ?>

		<?= $form->field($model, 'name') ?>
		
		<?= $form->field($model, 'password') ?>
		
		<?= $form->field($model, 'institution_id')->dropDownList(ArrayHelper::map($institutions, 'id', 'short_name'))->label('Выберите организацию'); ?>
		
		<?= $form->field($model, 'role_id') ?>

		<div class="form-group">
			<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
