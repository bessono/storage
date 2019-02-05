<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\grid\GridView;

?>
<h1>Редактирование/Просмотр пользователя</h1>
<p>
В этом интерфейсе вы можете редактировать пользователей. На данный момент вы видите 
всех пользователей вашего магазина. Для редактирования или удаления воспользуйтесь
соответствующими кнопками в правой части таблицы
</p>
<?php

print GridView::widget(
        [
            'dataProvider' => $provider,
            //'filterModel' => $model,
            'columns'=>[
                ['attribute' => 'login', 'label' => 'Логин'],
                ['attribute' => 'name', 'label' => 'ФИО'],
                ['attribute' => 'ban', 'label' => 'Забанен'],
                ['attribute' => 'role', 'label'=> 'Права'],
                ['class'=>'yii\grid\ActionColumn','template'=>'{update}&nbsp;&nbsp;&nbsp;{delete}']
                ]
            
        ]
        );
