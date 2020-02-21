<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vrsta_treninga".
 *
 * @property string $mesto
 * @property int $id
 *
 * @property TrenerTrening[] $trenerTrenings
 */
class VrstaTreninga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vrsta_treninga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mesto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mesto' => 'Mesto',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrenerTrenings()
    {
        return $this->hasMany(TrenerTrening::className(), ['vrsta' => 'id']);
    }
}
/*
59 id = individualni
60 id = grupni
61 id = online
*/
