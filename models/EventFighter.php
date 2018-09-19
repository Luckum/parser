<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_fighter".
 *
 * @property int $id
 * @property int $event_id
 * @property int $fighter_1
 * @property int $fighter_2
 * @property int $winner
 * @property string $referee
 * @property string $win_type
 * @property int $win_round
 * @property string $win_time
 * @property int $is_main_card
 */
class EventFighter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_fighter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id'], 'required'],
            [['event_id', 'fighter_1', 'fighter_2', 'winner', 'win_round', 'is_main_card'], 'integer'],
            [['referee'], 'string', 'max' => 50],
            [['win_type'], 'string', 'max' => 255],
            [['win_time'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'fighter_1' => 'Fighter 1',
            'fighter_2' => 'Fighter 2',
            'winner' => 'Winner',
            'referee' => 'Referee',
            'win_type' => 'Win Type',
            'win_round' => 'Win Round',
            'win_time' => 'Win Time',
            'is_main_card' => 'Is Main Card',
        ];
    }
}
