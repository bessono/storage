<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Costs;

class CostsController extends Controller{
    
    public function behaviors(){
        return [
            'access' => [
                'class'=> \yii\filters\AccessControl::className(),
                'rules'=> [
                    [
                        'allow'=> true,
                        'roles'=> ['viewAdminPage','editData']
                    ]
                ],
            ],
        ];
    }
    
    public function actionAddForm(){
        $model = new Costs();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            
        } else {
            return $this->render("addForm",['model'=>$model]);
        }
    }
    
}