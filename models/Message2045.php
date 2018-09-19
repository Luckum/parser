<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message2045".
 *
 * @property int $Message_ID
 * @property int $User_ID
 * @property int $Subdivision_ID
 * @property int $Sub_Class_ID
 * @property int $Priority
 * @property string $Keyword
 * @property string $ncTitle
 * @property string $ncKeywords
 * @property string $ncDescription
 * @property int $Checked
 * @property string $IP
 * @property string $UserAgent
 * @property int $Parent_Message_ID
 * @property string $Created
 * @property string $LastUpdated
 * @property int $LastUser_ID
 * @property string $LastIP
 * @property string $LastUserAgent
 * @property int $fighter_1
 * @property int $fighter_2
 * @property int $event
 * @property int $winner
 * @property int $type
 * @property string $referee
 * @property string $win_type
 * @property int $win_round
 * @property string $win_time
 * @property string $video
 */
class Message2045 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message2045';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Created', 'LastUser_ID', 'type', 'referee', 'win_type', 'win_round', 'win_time'], 'required'],
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Priority', 'Parent_Message_ID', 'LastUser_ID', 'fighter_1', 'fighter_2', 'event', 'winner', 'type', 'win_round'], 'integer'],
            [['ncDescription'], 'string'],
            [['Created', 'LastUpdated'], 'safe'],
            [['Keyword', 'ncTitle', 'ncKeywords', 'UserAgent', 'LastUserAgent', 'referee', 'win_type', 'win_time', 'video'], 'string', 'max' => 255],
            [['Checked'], 'string', 'max' => 4],
            [['IP', 'LastIP'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Message_ID' => 'Message  ID',
            'User_ID' => 'User  ID',
            'Subdivision_ID' => 'Subdivision  ID',
            'Sub_Class_ID' => 'Sub  Class  ID',
            'Priority' => 'Priority',
            'Keyword' => 'Keyword',
            'ncTitle' => 'Nc Title',
            'ncKeywords' => 'Nc Keywords',
            'ncDescription' => 'Nc Description',
            'Checked' => 'Checked',
            'IP' => 'Ip',
            'UserAgent' => 'User Agent',
            'Parent_Message_ID' => 'Parent  Message  ID',
            'Created' => 'Created',
            'LastUpdated' => 'Last Updated',
            'LastUser_ID' => 'Last User  ID',
            'LastIP' => 'Last Ip',
            'LastUserAgent' => 'Last User Agent',
            'fighter_1' => 'Fighter 1',
            'fighter_2' => 'Fighter 2',
            'event' => 'Event',
            'winner' => 'Winner',
            'type' => 'Type',
            'referee' => 'Referee',
            'win_type' => 'Win Type',
            'win_round' => 'Win Round',
            'win_time' => 'Win Time',
            'video' => 'Video',
        ];
    }
}
