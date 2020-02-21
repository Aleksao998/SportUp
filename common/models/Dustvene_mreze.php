<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dustvene_mreze".
 *
 * @property int $id
 * @property int $trener_id
 * @property int $vrsta
 * @property string $link
 *
 * @property Trener $trener
 * @property VrsaDrustvenihMreza $vrsta0
 */
class Dustvene_mreze extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dustvene_mreze';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trener_id', 'vrsta', 'link'], 'required'],
            [['trener_id', 'vrsta'], 'integer'],
            [['link'], 'string', 'max' => 255],
            [['trener_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trener::className(), 'targetAttribute' => ['trener_id' => 'id']],
            [['vrsta'], 'exist', 'skipOnError' => true, 'targetClass' => VrsaDrustvenihMreza::className(), 'targetAttribute' => ['vrsta' => 'id']],
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
            'vrsta' => 'Vrsta',
            'link' => 'Link',
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
        return $this->hasOne(VrsaDrustvenihMreza::className(), ['id' => 'vrsta']);
    }

    public function setTrenerId($id)
    {
      $this->trener_id=$id;
    }

    public function setVrstaId($id1)
    {
      $this->vrsta=$id1;
    }
    static function getFacebook($i){
      $items= Dustvene_mreze::find()
      ->select('link')
      ->where(['trener_id'=>$i])
      ->andwhere(['vrsta'=>1])
      ->one();
      return $items;
    }
    static function getInstagram($i){
      $items= Dustvene_mreze::find()
      ->select('link')
      ->where(['trener_id'=>$i])
      ->andwhere(['vrsta'=>2])
      ->one();
      return $items;
    }
}
