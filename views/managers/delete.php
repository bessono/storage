<?php

use yii\helpers\Html;

Html::beginTag("span", ['style'=>'margin:auto']);
Html::encode($message);
Html::endTag("span");