<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;



$form = new ActiveForm();
$form->begin();
?>
<h1>Имменение параметров пользователя</h1>
<p>
Измените данные вашего пользователя и сохраните нажав на кнопку "Сохранить"
</p>
<?php    
print $form->field($model,'id')->hiddenInput(['value'=>$result->id])->label("");
print $form->field($model, 'name')->textInput(['value'=>$result->name])->label("ФИО");
print $form->field($model, 'login')->textInput(['value'=>$result->login])->label("Логин");
print $form->field($model, 'password')->passwordInput(['value'=>$result->password])->label("Пароль");
print $form->field($model, 're_password')->passwordInput(['value'=>''])->label("Повторить пароль для смены");
print $form->field($model, 'ban')->checkbox(['value'=>'y','checked'=>$result->ban])->label("Забанить");
print $form->field($model,'role')->dropDownList($roles,
[
    'options' => [
        $result->role=>['Selected'=>true]
    ]
]
        );
print Html::submitButton("Сохранить");


$form->end();
