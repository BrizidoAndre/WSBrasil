<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amenity_realty".
 *
 * @property int $id
 * @property int $realty_id
 * @property int $amenity_id
 *
 * @property Amenity $amenity
 * @property Realty $realty
 */
class AmenityRealty extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'amenity_realty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['realty_id', 'amenity_id'], 'required'],
            [['realty_id', 'amenity_id'], 'integer'],
            [['amenity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Amenity::class, 'targetAttribute' => ['amenity_id' => 'id']],
            [['realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::class, 'targetAttribute' => ['realty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'realty_id' => 'Realty ID',
            'amenity_id' => 'Amenity ID',
        ];
    }

    /**
     * Gets query for [[Amenity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmenity()
    {
        return $this->hasOne(Amenity::class, ['id' => 'amenity_id']);
    }

    /**
     * Gets query for [[Realty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealty()
    {
        return $this->hasOne(Realty::class, ['id' => 'realty_id']);
    }

}
