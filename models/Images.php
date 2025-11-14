<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Images".
 *
 * @property int $id
 * @property string $filepath
 * @property string $upload_date
 * @property int $isThumbnail
 * @property int $realtyId
 *
 * @property Realty $realty
 */
class Images extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filepath', 'upload_date', 'isThumbnail', 'realtyId'], 'required'],
            [['upload_date'], 'safe'],
            [['isThumbnail', 'realtyId'], 'integer'],
            [['filepath'], 'string', 'max' => 522],
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
            'filepath' => 'Filepath',
            'upload_date' => 'Upload Date',
            'isThumbnail' => 'Is Thumbnail',
            'realtyId' => 'Realty ID',
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
