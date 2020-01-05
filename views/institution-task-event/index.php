<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitutionTaskEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institution Task Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-task-event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institution Task Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'tableOptions' => ['class' => 'table table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'task.name',
            'event.name',
            //'institution_id',
			'date_start',
			'date_finish',
			'is_invariant',

            ['class' => 'yii\grid\ActionColumn'],
        ],
		'rowOptions' => function ($model, $key, $index, $grid) {
			if ($model->is_invariant) {
				return ['class' => 'text-primary'];
			}
			//Если дата сегодня больше или равна дате окончания, то строка подсветится красным
			$datetime1 =  new Datetime($model->date_finish);
			$datetime2 =  new Datetime(date("Y-m-d H:i:s"));
			$interval = $datetime1->diff($datetime2)->days;
			if ($datetime1 <= $datetime2 && !$model->result) {
				return ['class' => 'bg-danger'];
			};
			
			if ($datetime1 <= $datetime2 && $model->result) {
				return ['class' => 'bg-success'];
			};
			
			
		},
    ]); ?>


</div>
