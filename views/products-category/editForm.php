<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsCategory */
/* @var $form ActiveForm */
?>
<div class="products-category-editForm">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'parent') ?>
        <?= $form->field($model, 'category_name') ?>
        <?= $form->field($model, 'description') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- products-category-editForm -->
