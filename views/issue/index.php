<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;



/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Issue */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Issue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'project_id',
            [
                'attribute' => 'type_id',
                'value' => 'type.name',
                'filter' => $searchModel->typeArray,
            ],
            'subject',
            [
                'attribute' => 'descr',
                'headerOptions' => ['width' => 300],
                'contentOptions' => ['width' => 300, 'style' => 'max-width: 300px; overflow:hidden; white-space: nowrap; text-overflow:ellipsis'],
            ],




            // 'status_id',
            // 'assigned_to_id',
            // 'author_id',
            // 'created_on',
            // 'updated_on',
            // 'parent_id',
            [
                'attribute' => 'start_date',
                'headerOptions' => ['width' => 120],
                'contentOptions' => ['class' => 'text-center'],
                'value' => 'startedAt'
            ],
            // 'due_date',
            // 'closed_on',

            ['class' => 'yii\grid\ActionColumn', 'headerOptions' => ['width' => 80],],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
