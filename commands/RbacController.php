<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller{
    public function actionInit(){
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        $admin = $auth->createRole("admin");
        $operator = $auth->createRole("operator");
        $saler = $auth->createRole("saler");
        $auth->add($admin);
        $auth->add($operator);
        $auth->add($saler);
        //====================================
        
        $viewAdminPage = $auth->createPermission("viewAdminPage");
        $viewAdminPage->description = "Просмотр админки";
        
        $readData = $auth->createPermission("readData");
        $readData->description = "Читать данные";
        
        $editData = $auth->createPermission("editData");
        $editData->description = "Изменять данные";
        
        $auth->add($viewAdminPage);
        $auth->add($readData);
        $auth->add($editData);
        //=====================================
        
        $auth->addChild($admin,$viewAdminPage);
        $auth->addChild($admin,$readData);
        $auth->addChild($admin,$editData);
        
        $auth->addChild($operator,$readData);
        $auth->addChild($operator,$editData);
        
        $auth->addChild($saler,$readData);
        
        $auth->assign($admin, 1);
        $auth->assign($operator, 2);
        $auth->assign($saler, 3);
        
    }
}

