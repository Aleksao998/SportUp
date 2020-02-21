<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "korisnik".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $block
 *
 * @property Admin $admin
 * @property Chat[] $chats
 * @property Chat[] $chats0
 * @property Komentari[] $komentaris
 * @property Ocena[] $ocenas
 * @property Prijavljen[] $prijavljens
 * @property Trener $trener
 * @property Zabrana $zabrana
 */
class Korisnik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'korisnik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['block'], 'integer'],
            [['email', 'password'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'block' => Yii::t('app', 'Block'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['korisnik_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['korisnik_napisao' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats0()
    {
        return $this->hasMany(Chat::className(), ['korisnik_primio' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKomentaris()
    {
        return $this->hasMany(Komentari::className(), ['korisnik_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOcenas()
    {
        return $this->hasMany(Ocena::className(), ['korisnik_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrijavljens()
    {
        return $this->hasMany(Prijavljen::className(), ['korisnik_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrener()
    {
        return $this->hasOne(Trener::className(), ['korisnik_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZabrana()
    {
        return $this->hasOne(Zabrana::className(), ['korisnik_id' => 'id']);
    }
}
