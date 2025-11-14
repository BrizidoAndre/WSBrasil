<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Realty".
 *
 * @property int $id
 * @property string $address
 * @property int $offer_type
 * @property int $rooms_qt
 * @property int $toilet_qt
 * @property int $suite_qt
 * @property int $parkingspace_qt
 * @property float $value
 * @property string $comments
 * @property string $image_path
 * @property float $size
 * @property int $stateId
 * @property int $cityId
 * @property int $neighborhoodId
 * @property int $realtyTypeId
 *
 * @property Accesses[] $accesses
 * @property AmenityRealty[] $amenityRealties
 * @property City $city
 * @property Images[] $images
 * @property Neighborhood $neighborhood
 * @property RealtyType $realtyType
 * @property State $state
 */
class Realty extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Realty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'offer_type', 'rooms_qt', 'toilet_qt', 'suite_qt', 'parkingspace_qt', 'value', 'comments', 'size', 'stateId', 'cityId', 'neighborhoodId', 'realtyTypeId'], 'required'],
            [['offer_type', 'rooms_qt', 'toilet_qt', 'suite_qt', 'parkingspace_qt', 'stateId', 'cityId', 'neighborhoodId', 'realtyTypeId'], 'integer'],
            [['value', 'size'], 'number'],
            [['value', 'size'], 'number', 'min' => 1],
            [['rooms_qt', 'toilet_qt', 'suite_qt', 'parkingspace_qt'], 'number', 'min' => 0],
            [['comments'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['image_path'], 'string', 'max' => 552],
            [['cityId'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['cityId' => 'id']],
            [['neighborhoodId'], 'exist', 'skipOnError' => true, 'targetClass' => Neighborhood::class, 'targetAttribute' => ['neighborhoodId' => 'id']],
            [['realtyTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => RealtyType::class, 'targetAttribute' => ['realtyTypeId' => 'id']],
            [['stateId'], 'exist', 'skipOnError' => true, 'targetClass' => State::class, 'targetAttribute' => ['stateId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Endereço',
            'offer_type' => 'É aluguel?',
            'rooms_qt' => 'Nº Quartos',
            'toilet_qt' => 'Nº Banheiros',
            'suite_qt' => 'Nº Suítes',
            'parkingspace_qt' => 'Nº Vagas',
            'value' => 'Valor',
            'comments' => 'Comentários',
            'image_path' => 'Image Path',
            'size' => 'Tamanho',
            'stateId' => 'Estado',
            'cityId' => 'Cidade',
            'neighborhoodId' => 'Bairro',
            'realtyTypeId' => 'Tipo de imóvel',
        ];
    }

    /**
     * Gets query for [[Accesses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccesses()
    {
        return $this->hasMany(Accesses::class, ['realtyId' => 'id']);
    }

    /**
     * Gets query for [[AmenityRealties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmenityRealties()
    {
        return $this->hasMany(AmenityRealty::class, ['realty_id' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'cityId']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::class, ['realtyId' => 'id']);
    }

    /**
     * Gets query for [[Neighborhood]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNeighborhood()
    {
        return $this->hasOne(Neighborhood::class, ['id' => 'neighborhoodId']);
    }

    /**
     * Gets query for [[RealtyType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealtyType()
    {
        return $this->hasOne(RealtyType::class, ['id' => 'realtyTypeId']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::class, ['id' => 'stateId']);
    }

}
