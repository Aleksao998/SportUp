<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lokacija".
 *
 * @property int $id
 * @property int $trener_id
 * @property string $lokacija
 * @property string $link_teretana
 *
 * @property Trener $trener
 */
class Lokacija extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lokacija';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trener_id', 'lokacija'], 'required'],
            [['trener_id'], 'integer'],
            [['lokacija'], 'string', 'max' => 255],
            [['link_teretana'], 'string', 'max' => 45],
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
            'lokacija' => 'Lokacija',
            'link_teretana' => 'Link Teretana',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrener()
    {
        return $this->hasOne(Trener::className(), ['id' => 'trener_id']);
    }
    /*Postavljanje id-a za trenera*/
    public function setTrenerId($id)
    {
      $this->trener_id=$id;
    }
    static function getAdresa(){
      $items= Lokacija::find()
      ->all();
      return $items;
    }
    static function getTrenerLocation($id){
      $items= Lokacija::find()
      ->where(['trener_id'=>$id])
      ->one();
      return $items;
    }
}
