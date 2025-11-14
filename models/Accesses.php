<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Accesses".
 *
 * @property int $id
 * @property int $realtyId
 * @property int|null $number
 *
 * @property Realty $realty
 */
class Accesses extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Accesses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'default', 'value' => 0],
            [['realtyId'], 'required'],
            [['realtyId', 'number'], 'integer'],
            [['realtyId'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::class, 'targetAttribute' => ['realtyId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'realtyId' => 'Realty ID',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[Realty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRealty()
    {
        return $this->hasOne(Realty::class, ['id' => 'realtyId']);
    }

}
