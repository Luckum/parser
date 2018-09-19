<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property int $link_id
 * @property string $name
 * @property string $date
 * @property string $place
 * @property string $keywords
 * @property string $description
 * @property string $title
 *
 * @property EvLinks $link
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_id', 'name', 'date'], 'required'],
            [['link_id'], 'integer'],
            [['keywords', 'description', 'title'], 'string'],
            [['name', 'date', 'place'], 'string', 'max' => 255],
            [['link_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvLinks::className(), 'targetAttribute' => ['link_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link_id' => 'Link ID',
            'name' => 'Name',
            'date' => 'Date',
            'place' => 'Place',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLink()
    {
        return $this->hasOne(EvLinks::className(), ['id' => 'link_id']);
    }
}
