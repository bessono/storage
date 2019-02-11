<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "costs".
 *
 * @property int $id
 * @property string $cost
 * @property string $description
 * @property string $can_change
 */
class Costs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'costs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['can_change'], 'string'],
            [['cost', 'description'], 'string', 'max' => 255],
            [['can_change','cost','description'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cost' => 'Cost',
            'description' => 'Description',
            'can_change' => 'Can Change',
        ];
    }
    
    public function addNewCost(){
        if($this->save()){
            return "Сохранение успешно";
        } else {
            Yii::debug("B@E".var_dump($this));
            return "Ошибка обратитесь к разработчику";
        }
    }
    
    public function deleteCost($id){
        $id = intval($id);
        if($this->deleteAll("`id`=".$id)){
            return "Удалено";
        } else {
            return "Ошибка удаления";
        }

    }

}
