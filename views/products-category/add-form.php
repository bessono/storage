<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$html = new Html();
$form = new ActiveForm();
print $html->beginTag("fieldset");
print $html->beginTag("legend");
print "Добавление группы товара";
print $html->endTag("legend");

$form->begin();
	//array_unshift($parents_array[0],'0','Не пренадлежит, является главной группой');
	//exit(var_dump($parents_array));
	
	print $form->field($model,'category_name')->label('Имя категории');
	print $form->field($model,'parent')->dropDownList($parents_array)->label('К какой группе принадлежит?');
	print $form->field($model,'description')->label('Описание категории');
	print $form->field($model,'special_group')->dropDownList(['n'=>'Обычная группа','y'=>'Специальная группа товара'])->label("Специальная группа товара");
	print $html->submitButton('Создать');
$form->end();
print $html->beginTag("br");
print $html->endTag("/fieldset");


print $html->beginTag("fieldset");
print $html->beginTag("legend");
print "Просмотр дерева групп";
print $html->endTag("legend");
print $groupe_tree;
print $html->endTag("/fieldset");
