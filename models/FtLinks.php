<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ft_links".
 *
 * @property int $id
 * @property string $link
 *
 * @property Fighter[] $fighters
 */
class FtLinks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ft_links';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link'], 'required'],
            [['link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFighter()
    {
        return $this->hasOne(Fighter::className(), ['link_id' => 'id']);
    }
}
