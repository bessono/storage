<?php

namespace app\controllers;
use Yii;
use app\models\ProductsCategory;
use yii\helpers\ArrayHelper;

class ProductsCategoryController extends \yii\web\Controller
{
    public function actionAddForm()
    {
    	$model = new ProductsCategory();
    	$parent = $model->getCategories();
    	if($model->load(Yii::$app->request->post()) && $model->validate()){
    		$message = $model->addCategory();
    		return $this->render("addFinish",['message'=>$message]);
    	} else {
    		return $this->render('add-form',['model'=>$model,'parents_array'=>ArrayHelper::map($parent,'id','category_name')]);
    	}
    }

}
