<?php

namespace app\models;

use Yii;

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

    public function getCategories(){
        return $this->find("id,category_name")->all();
    }

    public function addCategory(){
        if($this->save()){
            return "Группа сохранена";
        } else {
            return "Ошибка сохранения";
        }
    }

}
