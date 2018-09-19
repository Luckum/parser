<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message2010".
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
 * @property string $myDate
 * @property string $myName
 * @property int $myCountry
 * @property string $myCity
 * @property int $myType
 * @property string $myText
 * @property int $main_card_fighter_1
 * @property int $main_card_fighter_2
 * @property string $bet_link
 * @property string $buy_link
 * @property string $tags
 * @property int $main_card_winner
 * @property string $win_type
 * @property int $twits_cnt
 * @property int $fb_cnt
 * @property int $vk_cnt
 * @property int $type
 * @property string $referee
 * @property int $win_round
 * @property string $win_time
 * @property string $video
 * @property string $myCountry_name
 */
class Message2010 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message2010';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Created', 'LastUser_ID', 'myName', 'myType'], 'required'],
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Priority', 'Parent_Message_ID', 'LastUser_ID', 'myCountry', 'myType', 'main_card_fighter_1', 'main_card_fighter_2', 'main_card_winner', 'twits_cnt', 'fb_cnt', 'vk_cnt', 'type', 'win_round', 'Checked'], 'integer'],
            [['ncDescription', 'myText'], 'string'],
            [['Created', 'LastUpdated', 'myDate'], 'safe'],
            [['Keyword', 'ncTitle', 'ncKeywords', 'UserAgent', 'LastUserAgent', 'myName', 'myCity', 'bet_link', 'buy_link', 'tags', 'win_type', 'referee', 'win_time', 'video', 'myCountry_name'], 'string', 'max' => 255],
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
            'myDate' => 'My Date',
            'myName' => 'My Name',
            'myCountry' => 'My Country',
            'myCity' => 'My City',
            'myType' => 'My Type',
            'myText' => 'My Text',
            'main_card_fighter_1' => 'Main Card Fighter 1',
            'main_card_fighter_2' => 'Main Card Fighter 2',
            'bet_link' => 'Bet Link',
            'buy_link' => 'Buy Link',
            'tags' => 'Tags',
            'main_card_winner' => 'Main Card Winner',
            'win_type' => 'Win Type',
            'twits_cnt' => 'Twits Cnt',
            'fb_cnt' => 'Fb Cnt',
            'vk_cnt' => 'Vk Cnt',
            'type' => 'Type',
            'referee' => 'Referee',
            'win_round' => 'Win Round',
            'win_time' => 'Win Time',
            'video' => 'Video',
            'myCountry_name' => 'My Country Name',
        ];
    }
}
