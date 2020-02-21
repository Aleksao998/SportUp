<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "telefon".
 *
 * @property int $id
 * @property int $trener_id
 * @property string $broj_telefona
 *
 * @property Trener $trener
 */
class Telefon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trener_id', 'broj_telefona'], 'required'],
            [['trener_id'], 'integer'],
            [['broj_telefona'], 'string', 'max' => 255],
            [['broj_telefona'], 'unique'],
            [['trener_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trener::className(), 'targetAttribute' => ['trener_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'trener_id' => 'Trener ID',
            'broj_telefona' => 'Broj Telefona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrener()
    {
        return $this->hasOne(Trener::className(), ['id' => 'trener_id']);
    }

    public function setTrenerId($id)
    {
      $this->trener_id=$id;
    }
    static function getTrenerPhone($id){
      $items= Telefon::find()
      ->where(['trener_id'=>$id])
      ->one();
      return $items;
    }
}
