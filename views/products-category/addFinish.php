<?php

use yii\helpers\Html;

print Html::encode($message);
print Html::beginTag("br");
print Html::a("Назад",['products-category/add-form']);