<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property integer $contents
 * @property integer $sort_num
 * @property integer $type
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'sort_num', 'type'], 'required'],
            [['parent_id', 'contents', 'sort_num', 'type'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'description' => 'Description',
            'contents' => 'Contents',
            'sort_num' => 'Sort Num',
            'type' => 'Type',
        ];
    }
}
