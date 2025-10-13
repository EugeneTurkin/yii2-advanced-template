<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "device".
 *
 * @property string $serial_number
 * @property string|null $store_name
 * @property string $created_at
 *
 * @property Store $storeName
 */
class Device extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_name'], 'default', 'value' => null],
            [['serial_number'], 'required'],
            [['created_at'], 'safe'],
            [['serial_number', 'store_name'], 'string', 'max' => 255],
            [['serial_number'], 'unique'],
            [['store_name'], 'exist', 'skipOnError' => true, 'targetClass' => Store::class, 'targetAttribute' => ['store_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'serial_number' => 'Serial Number',
            'store_name' => 'Store Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[StoreName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStoreName()
    {
        return $this->hasOne(Store::class, ['name' => 'store_name']);
    }

}
