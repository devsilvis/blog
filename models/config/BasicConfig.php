<?php

namespace app\models\config;

use Yii;
use app\models\Config;

/**
 * This is the model class for table "config".
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class BasicConfig extends BaseConfig
{
    public $site_name;
    public $site_description;

    public function rules()
    {
        return [
            [['site_name', 'site_description'], 'required'],
            [['site_name', 'site_description'], 'string'],
            [['key'], 'string', 'max' => 64]
        ];
    }

    public function attributeLabels()
    {
        return [
            'site_name'        => '网站名称',
            'site_description' => '网站描述',
        ];
    }

    public function save()
    {
        parent::saveInternal('sys_site_name', $this->site_name);
        parent::saveInternal('sys_seo_description', $this->site_description);
    }
}
