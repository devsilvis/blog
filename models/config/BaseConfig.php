<?php

namespace app\models\config;

use app\core\base\BaseModel;
use Yii;
use app\models\Config;

class BaseConfig extends BaseModel
{

    protected function saveInternal($key, $value)
    {
        $config = Config::findOne(['key' => $key]);
        if($config === null){
            $config = new Config();
            $config->key = $key;
        }
        $config->value = $value;
        $config->save();
    }
}
