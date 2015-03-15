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
class ThemeConfig extends BaseConfig
{
    public $site_theme;

    public function rules()
    {
        return [
            [['site_theme'], 'required'],
            [['site_theme'], 'string'],
            [['key'], 'string', 'max' => 64]
        ];
    }

    public function attributeLabels()
    {
        return [
            'site_theme' => '网站主题',
        ];
    }

    public function save()
    {
        parent::saveInternal('sys_site_theme', $this->site_theme);
    }
}
