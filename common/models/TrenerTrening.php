<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trener_trening".
 *
 * @property int $trener_id
 * @property int $vrsta
 * @property int $cena_1termin
 * @property int $cena_12termina
 * @property string $opis
 * @property int $cena_godDana
 *
 * @property Trener $trener
 * @property VrstaTreninga $vrsta0
 */
class TrenerTrening extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trener_trening';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trener_id', 'vrsta', 'cena_1termin', 'cena_12termina', 'cena_godDana'], 'required'],
            [['trener_id', 'vrsta', 'cena_1termin', 'cena_12termina', 'cena_godDana'], 'integer'],
            [['opis'], 'string', 'max' => 45],
            [['trener_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trener::className(), 'targetAttribute' => ['trener_id' => 'id']],
            [['vrsta'], 'exist', 'skipOnError' => true, 'targetClass' => VrstaTreninga::className(), 'targetAttribute' => ['vrsta' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'trener_id' => 'Trener ID',
            'vrsta' => 'Vrsta',
            'cena_1termin' => 'Cena 1termin',
            'cena_12termina' => 'Cena 12termina',
            'opis' => 'Opis',
            'cena_godDana' => 'Cena God Dana',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrener()
    {
        return $this->hasOne(Trener::className(), ['id' => 'trener_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVrsta0()
    {
        return $this->hasOne(VrstaTreninga::className(), ['id' => 'vrsta']);
    }
    public function setTrenerId($id)
    {
      $this->trener_id=$id;
    }
    public function setVrsta($id)
    {
      $this->vrsta=$id;
    }
    static function getIndividualni($i){
      $items= TrenerTrening::find()
      ->where(['trener_id'=>$i])
      ->andwhere(['vrsta'=>59])
      ->one();
      return $items;
    }
    static function getGrupni($i){
      $items= TrenerTrening::find()
      ->where(['trener_id'=>$i])
      ->andwhere(['vrsta'=>60])
      ->one();
      return $items;
    }
    static function getOnline($i){
      $items= TrenerTrening::find()
      ->where(['trener_id'=>$i])
      ->andwhere(['vrsta'=>61])
      ->one();
      return $items;
    }
}
