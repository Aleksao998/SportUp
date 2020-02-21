<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "trener".
 *
 * @property int $id
 * @property int $korisnik_id
 * @property string $ime
 * @property string $prezime
 * @property string $slika
 * @property string $opis
 * @property string $pol
 * @property int $godiste
 * @property int $godine_iskustva
 * @property string $drzava
 * @property string $grad
 *
 * @property DustveneMreze[] $dustveneMrezes
 * @property Email[] $emails
 * @property Galerija $galerija
 * @property Komentari[] $komentaris
 * @property Lokacija[] $lokacijas
 * @property Ocena[] $ocenas
 * @property Prijavljen[] $prijavljens
 * @property Telefon[] $telefons
 * @property User $korisnik
 * @property TrenerTrening[] $trenerTrenings
 */
class Trener extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trener';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['korisnik_id', 'ime', 'prezime', 'pol', 'godiste', 'drzava', 'grad'], 'required'],
            [['korisnik_id', 'godiste', 'godine_iskustva'], 'integer'],
            [['ime', 'prezime'], 'string', 'max' => 255],
  	    [['opis'], 'string'],
            [['slika'], 'file',  'extensions' => 'png, jpg'],
            [['pol'], 'string', 'max' => 255],
            [['drzava', 'grad'], 'string', 'max' => 45],
            [['korisnik_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['korisnik_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'korisnik_id' => 'Korisnik ID',
            'ime' => 'Ime',
            'prezime' => 'Prezime',
            'slika' => 'Slika',
            'opis' => 'Opis',
            'pol' => 'Pol',
            'godiste' => 'Godiste',
            'godine_iskustva' => 'Godine Iskustva',
            'drzava' => 'Drzava',
            'grad' => 'Grad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

     public function upload() {

       if ($this->validate()) {

           $this->slika->saveAs('uploads/' . $this->slika->baseName . '.' . $this->slika->extension);
           return true;
       } else {
           return false;
       }

   }
    public function getDustveneMrezes()
    {
        return $this->hasMany(DustveneMreze::className(), ['trener_id' => 'id']);
    }

    public function getDrzava()
    {
      return $this->drzava;
    }
    public function getTrenerId()
    {
      return $this->getPrimaryKey();
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['trener_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalerija()
    {
        return $this->hasOne(Galerija::className(), ['trener_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomentaris()
    {
        return $this->hasMany(Komentari::className(), ['trenet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokacijas()
    {
        return $this->hasMany(Lokacija::className(), ['trener_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcenas()
    {
        return $this->hasMany(Ocena::className(), ['trener_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrijavljens()
    {
        return $this->hasMany(Prijavljen::className(), ['trener_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTelefons()
    {
        return $this->hasMany(Telefon::className(), ['trener_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKorisnik()
    {
        return $this->hasOne(User::className(), ['id' => 'korisnik_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrenerTrenings()
    {
        return $this->hasMany(TrenerTrening::className(), ['trener_id' => 'id']);
    }
    public function setKorisnik_id($id)
    {
      $this->korisnik_id=$id;
    }
    static function getAllAdressTrener(){
      $items= Trener::find()
      ->all();
      return $items;
    }
    static function getBazaTrenera(){
      $items= Trener::find()
      ->orderby('ime')
      ->all();
      return $items;
    }
    static function getBazaTrenera2($i){
      $items= Trener::find()
      ->where(['id'=>$i])
      ->one();
      return $items;
    }

    static function getBazaTreneraSortNameDesc(){
      $items= Trener::find()
      ->orderby(['ime'=> SORT_DESC])
      ->all();
      return $items;
    }
    static function getId($i){
      $items= Trener::find()
      ->select('id')
      ->where(['id'=>$i])
      ->one();
      return $items;
    }
    static function getKorisnikId($i){
      $items= Trener::find()
      ->select('korisnik_id')
      ->where(['id'=>$i])
      ->one();
      return $items;
    }
    static function getIdFromKorisnikId($i){
      $items= Trener::find()
      ->select('id')
      ->where(['korisnik_id'=>$i])
      ->one();
      return $items;
    }
    public function setGodiste($id)
    {
      $this->godiste=$id;
    }
}
