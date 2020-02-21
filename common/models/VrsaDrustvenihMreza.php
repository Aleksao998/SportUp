<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vrsa_drustvenih_mreza".
 *
 * @property int $id
 * @property string $naziv
 *
 * @property DustveneMreze[] $dustveneMrezes
 */
class VrsaDrustvenihMreza extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vrsa_drustvenih_mreza';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naziv'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'naziv' => 'Naziv',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDustveneMrezes()
    {
        return $this->hasMany(DustveneMreze::className(), ['vrsta' => 'id']);
    }
}
