<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%setting_translations}}".
 *
 * @property int $id
 * @property int $setting_id
 * @property string $language
 * @property string|null $value
 *
 * @property Settings $setting
 */
class SettingTranslations extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%setting_translations}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'default', 'value' => null],
            [['setting_id', 'language'], 'required'],
            [['setting_id'], 'integer'],
            [['value'], 'string'],
            [['language'], 'string', 'max' => 2],
            [['setting_id'], 'exist', 'skipOnError' => true, 'targetClass' => Settings::class, 'targetAttribute' => ['setting_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'setting_id' => 'Setting ID',
            'language' => 'Language',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Setting]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SettingsQuery
     */
    public function getSetting()
    {
        return $this->hasOne(Settings::class, ['id' => 'setting_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SettingTranslationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SettingTranslationsQuery(get_called_class());
    }

}
