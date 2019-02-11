<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Costs;
use yii\data\ActiveDataProvider;

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
            $message = $model->addNewCost();
            return $this->render("addFormFinish",['message'=>$message]);
        } else {
            return $this->render("addForm",['model'=>$model]);
        }
    }
    

    public function actionViewForm(){
        $model = new Costs();
        $provider = new ActiveDataProvider(
                [
                    'query'=>$model->find(),
                    'pagination'=>[
                        'pageSize' => Yii::$app->params['default_pagesize']
                    ]
                ]
                );
        return $this->render("viewForm",['model'=>$model,'provider'=>$provider]);
    }
    
    function actionDelete(){
            $model = new Costs();
            $message = $model->deleteCost(Yii::$app->request->get("id"));
            return $this->render("deleteFinish",['message'=>$message]);
        
    }

}
