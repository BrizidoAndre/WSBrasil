<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "State".
 *
 * @property int $id
 * @property string $name
 * @property string $acronym
 *
 * @property City[] $cities
 * @property Neighborhood[] $neighborhoods
 * @property Realty[] $realties
 */
class State extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'State';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'acronym'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['acronym'], 'string', 'length' => 2],
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
            'acronym' => 'Acrônimo',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::class, ['state_id' => 'id']);
    }

    /**
     * Gets query for [[Neighborhoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNeighborhoods()
    {
        return $this->hasMany(Neighborhood::class, ['state_id' => 'id']);
    }

    /**
     * Gets query for [[Realties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['stateId' => 'id']);
    }

}
