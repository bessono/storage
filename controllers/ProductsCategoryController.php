<?php

namespace app\controllers;
use Yii;
use app\models\ProductsCategory;
use yii\helpers\ArrayHelper;

class ProductsCategoryController extends \yii\web\Controller
{

	public function behaviors(){
		return [
			'access'=>[
				'class'=> \yii\filters\AccessControl::className(),
				'rules'=>[
					[
						'allow'=>true,
						'roles'=> ['viewAdminPage','editData']
					]
				]
			]
		];
	}

    public function actionAddForm()
    {
    	$model = new ProductsCategory();
    	$parent = $model->getCategoriesInArray();
    	$groupe_tree = $model->getGroupeTree();
    	if($model->load(Yii::$app->request->post()) && $model->validate()){
    		$message = $model->addCategory();
    		return $this->render("addFinish",['message'=>$message]);
    	} else {
    		return $this->render('add-form',['groupe_tree'=>$groupe_tree,'model'=>$model,'parents_array'=>$parent]);
    	}
    }

    public function actionEditForm(){
    	$model = new ProductsCategory();
    	return $this->render("editForm",['model'=>$model]);
    }

}
