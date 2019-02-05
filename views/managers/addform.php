<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Managers */
/* @var $form ActiveForm */
?>

<div class="managers-addform">
    <h1><?= Html::encode("Добавление нового пользователя"); ?></h1>
    <p>
        В этой форме вы можете добавить нового пользователя. 
    <ul>
        <li>Укажите логин пользователя с помощью которого он будет входить в программу</li>
        <li>Укажите пароль пользователя для авторизации логина</li>
        <li>Напишите Имя пользователя или полное Ф.И.О.</li>
        <li>Закрепите за пользователем его роль в программе (внимание от роли зависит уровень
            доступа пользователя к разным частям функционала)</li>
    </ul>
    </p>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login')->label("Логин"); ?>
        <?= $form->field($model, 'password')->passwordInput()->label("Пароль"); ?>
        <?= $form->field($model, 'name')->label("Имя пользователя"); ?>
        <?= $form->field($model, 'role')->dropDownList($roles); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Создать нового', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- managers-addform -->
