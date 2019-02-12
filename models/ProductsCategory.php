<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "products_category".
 *
 * @property int $id
 * @property int $parent
 * @property string $category_name
 * @property string $description
 * @property string $special_group
 */
class ProductsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    private $tree = "";

    public static function tableName()
    {
        return 'products_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['category_name', 'description'], 'string', 'max' => 255],
            [['parent'],'required'],
            [['category_name'],'required'],
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'category_name' => 'Category Name',
            'description' => 'Description',
            'special_group' => 'Special Group',
        ];
    }

    public function getCategoriesINArray(){
        $ids_categoryes = array('0'=>'Не пренадлежит ни к какой группе (станет главной группой)');
        $result = $this->find(['id','category_name'])->asArray()->all();
        foreach($result as $items){
            $ids_categoryes[$items['id']]=$items['category_name'];
        }
        return $ids_categoryes;
    }

    public function addCategory(){
        if($this->save()){
            return "Группа сохранена";
        } else {
            return "Ошибка сохранения";
        }
    }

    public function getGroupeTree(){
        $result = $this->find("id,category_name,parent")->asArray()->all();
        $this->makeGroupeTree($result);
        return $this->tree;
    }

    private function makeGroupeTree($tree_array, $parent = 0){
        $this->tree .= Html::beginTag("ul");
        foreach($tree_array as $items){
            if($items['parent'] == $parent){
                $this->tree .= Html::beginTag("li").
                            $items['category_name']."&nbsp". 
                            Html::a(
                                Html::beginTag("span",['class'=>'glyphicon glyphicon-pencil']).
                                Html::endTag("span")    
                                ,['products-category/edit-form','id'=>$items['id']]).
                            Html::endTag("li");
                $this->makeGroupeTree($tree_array,$items['id']);
            } 
        }
        $this->tree .= Html::endTag("ul");
    }

}
