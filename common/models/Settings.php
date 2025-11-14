<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%settings}}".
 *
 * @property int $id
 * @property string $key_name
 * @property string|null $type
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property SettingTranslations[] $settingTranslations
 */
class Settings extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TYPE_TEXT = 'text';
    const TYPE_EMAIL = 'email';
    const TYPE_PHONE = 'phone';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_JSON = 'json';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['type'], 'default', 'value' => 'text'],
            [['key_name'], 'required'],
            [['type'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['key_name'], 'string', 'max' => 255],
            ['type', 'in', 'range' => array_keys(self::optsType())],
            [['key_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key_name' => 'Key Name',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[SettingTranslations]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SettingTranslationsQuery
     */
    public function getSettingTranslations()
    {
        return $this->hasMany(SettingTranslations::class, ['setting_id' => 'id']);
    }

    /**
     * Get translation by language
     * @param string|null $lang
     * @return SettingTranslations|null
     */
    public function getTranslation($lang = null)
    {
        $lang = $lang ?: Yii::$app->language;
        return $this->hasOne(SettingTranslations::class, ['setting_id' => 'id'])
            ->andWhere(['language' => $lang]);
    }

    /**
     * Get value for current language
     * @param string|null $lang
     * @return string|null
     */
    public function getValue($lang = null)
    {
        $translation = $this->getTranslation($lang)->one();
        return $translation ? $translation->value : null;
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SettingsQuery(get_called_class());
    }


    /**
     * column type ENUM value labels
     * @return string[]
     */
    public static function optsType()
    {
        return [
            self::TYPE_TEXT => 'text',
            self::TYPE_EMAIL => 'email',
            self::TYPE_PHONE => 'phone',
            self::TYPE_TEXTAREA => 'textarea',
            self::TYPE_JSON => 'json',
        ];
    }



    /**
     * @return string
     */
    public function displayType()
    {
        return self::optsType()[$this->type];
    }

    /**
     * @return bool
     */
    public function isTypeText()
    {
        return $this->type === self::TYPE_TEXT;
    }

    public function setTypeToText()
    {
        $this->type = self::TYPE_TEXT;
    }

    /**
     * @return bool
     */
    public function isTypeEmail()
    {
        return $this->type === self::TYPE_EMAIL;
    }

    public function setTypeToEmail()
    {
        $this->type = self::TYPE_EMAIL;
    }

    /**
     * @return bool
     */
    public function isTypePhone()
    {
        return $this->type === self::TYPE_PHONE;
    }

    public function setTypeToPhone()
    {
        $this->type = self::TYPE_PHONE;
    }

    /**
     * @return bool
     */
    public function isTypeTextarea()
    {
        return $this->type === self::TYPE_TEXTAREA;
    }

    public function setTypeToTextarea()
    {
        $this->type = self::TYPE_TEXTAREA;
    }

    /**
     * @return bool
     */
    public function isTypeJson()
    {
        return $this->type === self::TYPE_JSON;
    }

    public function setTypeToJson()
    {
        $this->type = self::TYPE_JSON;
    }
}
