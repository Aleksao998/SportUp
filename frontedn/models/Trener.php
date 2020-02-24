<?php

namespace app\models;

use Yii;

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
 * @property Galerija[] $galerijas
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
            [['ime', 'prezime', 'slika', 'opis'], 'string', 'max' => 255],
            [['pol'], 'string', 'max' => 1],
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
    public function getDustveneMrezes()
    {
        return $this->hasMany(DustveneMreze::className(), ['trener_id' => 'id']);
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
    public function getGalerijas()
    {
        return $this->hasMany(Galerija::className(), ['trener_id' => 'id']);
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
}
