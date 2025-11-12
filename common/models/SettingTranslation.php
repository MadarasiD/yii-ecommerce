<?php
namespace common\models;

use yii\db\ActiveRecord;

class SettingTranslation extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%setting_translations}}';
    }
}
