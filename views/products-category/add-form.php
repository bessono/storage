<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$html = new Html();
$form = new ActiveForm();
$form->begin();

	array_unshift($parents_array,'Не пренадлежит, является главной группой');
	print $form->field($model,'category_name')->label('Имя категории');
	print $form->field($model,'parent')->dropDownList($parents_array)->label('К какой группе принадлежит?');
	print $form->field($model,'description')->label('Описание категории');
	print $form->field($model,'special_group')->dropDownList(['n'=>'Обычная группа','y'=>'Специальная группа товара'])->label("Специальная группа товара");
	print $html->submitButton('Создать');
$form->end();
