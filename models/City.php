<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "City".
 *
 * @property int $id
 * @property string $name
 * @property int $state_id
 *
 * @property Neighborhood[] $neighborhoods
 * @property Realty[] $realties
 * @property State $state
 */
class City extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'City';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'state_id'], 'required'],
            [['state_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::class, 'targetAttribute' => ['state_id' => 'id']],
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
            'state_id' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Neighborhoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNeighborhoods()
    {
        return $this->hasMany(Neighborhood::class, ['city_id' => 'id']);
    }

    /**
     * Gets query for [[Realties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['cityId' => 'id']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::class, ['id' => 'state_id']);
    }

}
