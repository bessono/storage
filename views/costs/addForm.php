<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = new ActiveForm;
$html = new Html();
$form->begin();
print $form->field($model, 'cost')->textInput(['value'=>''])->label("Наименование цены");
print $form->field($model, 'description')->textInput(['value'=>''])->label("Описание цены");
print $form->field($model, 'can_change')->radioList(['y'=>'Может меняться','n'=>'Не может меняться'])->label("Возможно ли изменение");
print $html->submitButton("Создать цену");
$form->end();
