<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitutionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'short_name',
            'full_name',
            'address',
            'parent_id',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {create} {index}',
            'buttons' => [
                'create' => function ($url,$model,$key) {
                    return Html::a(
                    '<span class="glyphicon glyphicon-plus-sign"></span>', 
                    $url);
                },
				],
			],
        ],
    ]); ?>


</div>
