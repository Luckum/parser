<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fighter_number".
 *
 * @property int $id
 * @property int $sh_id
 * @property int $m_id
 */
class FighterNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fighter_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sh_id', 'm_id'], 'required'],
            [['sh_id', 'm_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sh_id' => 'Sh ID',
            'm_id' => 'M ID',
        ];
    }
}
