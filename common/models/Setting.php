<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Setting extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%settings}}';
    }

    public function getTranslations()
    {
        return $this->hasMany(SettingTranslation::class, ['setting_id' => 'id']);
    }

    public function getTranslation($language = null)
    {
        $language = $language ?: Yii::$app->language;
        return $this->hasOne(SettingTranslation::class, ['setting_id' => 'id'])
            ->andWhere(['language' => $language]);
    }

    public function getValue($language = null)
    {
        return $this->translation?->value;
    }
}
