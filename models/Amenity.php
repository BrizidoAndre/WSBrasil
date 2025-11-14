<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Amenity".
 *
 * @property int $id
 * @property string $name
 *
 * @property AmenityRealty[] $amenityRealties
 */
class Amenity extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Amenity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nome',
        ];
    }

    /**
     * Gets query for [[AmenityRealties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmenityRealties()
    {
        return $this->hasMany(AmenityRealty::class, ['amenity_id' => 'id']);
    }

}
