<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUserManager */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Managers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-manager-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Manager', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'name',
            'password',
            'institution.short_name',
            'role.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
