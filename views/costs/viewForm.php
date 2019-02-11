<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

print GridView::widget([
    'dataProvider' => $provider,
    'columns'=>[
        ['attribute'=>'cost','label'=>'Цена'],
        ['attribute'=>'description','label'=>'Краткая информаия'],
        ['attribute'=>'can_change', 'label'=>'Может меняться'],
        ['class'=>'yii\grid\ActionColumn','template'=>'{delete}']
                
    ]
]);



