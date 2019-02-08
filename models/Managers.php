<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

class Managers extends \yii\db\ActiveRecord implements IdentityInterface {

    /**
     * @inheritdoc
     */
    public $user = false;
    public $re_password;
    
    public static function tableName() {
        return 'managers';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['login', 'password'], 'required'],
            [['login', 'password'], 'string', 'max' => 50],
            //['password', 'validatePassword'],
            ['name', 'string', 'min' => '5'],
            ['name', 'required'],
            [['login', 'password'], 'string', 'min' => 3],
            ['role', 'required'],
            ['ban','required'],
            ['id','integer'],
            ['re_password','string','min'=>5]
        ];
    }

    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            if (!$this->getUser()) {
                $this->addError($attribute, 'Неверный пароль');
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function login() {
        if ($this->validate(['login', 'password'])) {
            return Yii::$app->user->login($this->getUser());
        }
    }

    public function getUser() {
        if ($this->user === false) {
            $this->user = $this->findOne(['login' => $this->login,
                'password' => md5($this->password)]);
        }

        return $this->user;
    }

    public function checkBan() {
        if($result = $this->findOne(['login' => $this->login, 'password' => md5($this->password)])){
        
        Yii::debug("B@E models/Managers::checkBan ban=" . $result->ban);
        if ($result->ban == 'y') {
            $this->addError("login", "Пользователь в бане");
            return false;
        } else {
            return true;
        }
        } else {
            return false;
        }
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'name' => 'Name',
            'ban' => 'Ban',
            'role' => 'Role',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    public function addNewUser() {
        $this->password = md5($this->password);
        $result = $this->findOne(['login' => $this->login]);
        if ($result != null) {
            return "Пользователь с таким логином \"" . $this->login . "\" существует";
        }
        
        $result = $this->save(false);
        //exit(var_dump($this->role));
        


        // Назначаем роль в методе afterSave модели User
        
        $auth = Yii::$app->authManager;
        $editor = $auth->getRole($this->role); // Получаем роль editor
        
        $viewAdminPage = $auth->createPermission("viewAdminPage");
        $viewAdminPage = $auth->createPermission("editData");
        $viewAdminPage = $auth->createPermission("viewData");
        
        $auth->addChild($editor,$viewAdminPage);
        $auth->addChild($editor,$readData);
        $auth->addChild($editor,$editData);
        $auth->assign($editor, $this->id); // Назначаем пользователю, которому принадлежит модель User

        if ($this->errors == null) {
            return "Пользователь добавлен";
        } else {
            return "Ошибка добавления пользователя";
        }
    }
    
    public function getRoles(){
        return array(
            'admin'=>'Администратор (полный доступ)',
            'operator'=>'Оператор базы данных (изменение номенклатуры и цен)',
            'saler'=>'Продавец (только просматривает товар и продаёт)'
            ); 

    }

    public function getAllUsers() {
        return $this->find(['login', 'id', 'password', 'role', 'name'])->all();
    }

    public function deleteUser($id) {
        $id = intval($id);
        if($this->deleteAll("id=" . $id)){
            return "Удаление произведенно успешно";
        } else {
            return "Ошибка удаления пользователя";
        }
    }

    public function getUserById($id){
        return $this->find(['id','login','password','name','ban','role'])->where("`id`=".$id)->one();
    } 
    
    public function updateUser(){
        if($this->ban !== "y") {$this->ban = 'n';}
        $update_array = array('role'=>$this->role,'login'=>$this->login,'ban'=>$this->ban,'name'=>$this->name);
        //exit($this->password."==".$this->re_password);
        if($this->password == $this->re_password){
            $update_array['password'] = md5($this->password);
        }
        $auth = Yii::$app->authManager;
        $editor = $auth->getRole($this->role); // Получаем роль editor
        
        $auth->revoke($editor, $this->id); 
        $auth->assign($editor, $this->id); // назначение
        return $this->updateAll($update_array, ['id'=>$this->id]);
    }
    
    //============= implementation ===================

    public function getAuthKey(): string {
        
    }

    public function getId() {
        return $this->id;
    }

    public function validateAuthKey($authKey): bool {
        
    }

    public static function findIdentity($id): IdentityInterface {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null): IdentityInterface {
        
    }

}
