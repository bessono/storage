<?php


namespace app\controllers;
use Yii;
use app\models\Managers;
use yii\data\ActiveDataProvider;

class ManagersController extends \yii\web\Controller
{
    
    public function behaviors(){
        return [
            'access' => [
                'class'=> \yii\filters\AccessControl::className(),
                'rules'=> [
                    [
                        'allow'=> true,
                        'roles'=> ['viewAdminPage']
                    ]
                ],
            ],
        ];
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAddForm() {
        $model = new \app\models\Managers();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate(['login'], ['password'], ['name'], ['role'])) {
                $message = $model->addNewUser();
                return $this->render('addAddFormFinish', ['message' => $message]);
            }
        }
        $roles = $model->getRoles();
        return $this->render('addform', [
                    'model' => $model,'roles'=>$roles
        ]);
    }

    public function actionViewForm(){
        $model = new Managers();
        //$result = $model->getAllUsers();
        $provider = new ActiveDataProvider([
            'query' => $model->find(),
            'pagination' => [
                'pageSize' => Yii::$app->params['default_pagesize']
            ]
        ]);
        
        return $this->render('viewForm',['provider'=>$provider,'model'=>$model]);
    }
    
    public function actionDelete(){
        $model = new Managers();
        $message = $model->deleteUser(Yii::$app->request->get("id"));
        return $this->render("delete",['message'=>$message]);    
        
    }
    
    public function actionUpdate() {
        $model = new Managers();
        
        if ($model->load(Yii::$app->request->post())
                && $model->validate(['login', 'name', 'ban', 'id', 'password', 're_password'])){
                    $model->updateUser($password_change = true);
                    return $this->render('updateFinish');
                 
        } else {
            $result = $model->getUserById(Yii::$app->request->get("id"));
            $roles = $model->getRoles();
            return $this->render('updateForm', ['result' => $result,'model'=>$model,'roles'=>$roles]);
        }
    }

}
