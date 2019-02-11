<?php 

use yii\helpers\Html;

print Html::encode($message);
print Html::beginTag("br");
print Html::a("Просмотреть результат",['costs/view-form']);