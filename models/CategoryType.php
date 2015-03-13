<?php

namespace app\models;

use app\core\base\BaseActiveRecord;
use Yii;

/**
 * This is the model class for table "category_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class CategoryType extends BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
