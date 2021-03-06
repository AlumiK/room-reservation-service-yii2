<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Application */

$this->title = '冲突申请详情';
$this->params['breadcrumbs'][] = ['label' => '预约房间', 'url' => ['room/index']];
$this->params['breadcrumbs'][] = $model->room->id;
$this->params['breadcrumbs'][] = '冲突申请';
$this->params['breadcrumbs'][] = $model->id;
?>

<div class="application-view">
    <h1><?= Html::encode($this->title); ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'room_number',
                'label' => '房间号',
                'value' => $model->room->room_number . $model->room->getColoredStatusStr(),
                'captionOptions' => ['width' => '20%'],
                'format' => 'raw',
            ],
            [
                'attribute' => 'campus',
                'label' => '校区',
                'value' => $model->room->campus0->campus_name,
            ],
            [
                'attribute' => 'applicant_student_id',
                'label' => '申请人学号',
                'value' => $model->applicant->student_id,
            ],
            [
                'attribute' => 'applicant_name',
                'label' => '申请人姓名',
                'value' => $model->applicant->username,
            ],
            'organization_name',
            [
                'attribute' => 'start_time',
                'format' => ['date', 'php: Y-m-d H:i'],
            ],
            [
                'attribute' => 'end_time',
                'format' => ['date', 'php: Y-m-d H:i'],
            ],
            [
                'attribute' => 'status',
                'value' => $model->getStatusStr(),
                'contentOptions' => $model->getStatusBg(),
            ],
            'event:ntext',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php: Y-m-d H:i'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php: Y-m-d H:i'],
            ],
        ],
    ]); ?>
    <?= Html::a('返回', Yii::$app->request->referrer, ['class' => 'btn btn-primary']); ?>
</div>
