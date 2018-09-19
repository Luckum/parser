<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message2000".
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
 * @property string $newsType
 * @property string $myTitle
 * @property string $myPhoto
 * @property string $myText
 * @property string $myTags
 * @property int $myViews
 * @property int $myPop
 * @property string $oldAuthor
 * @property string $exFoto
 * @property int $toSlider
 * @property string $Date
 * @property string $EnTags
 * @property string $Video
 * @property int $main_news
 * @property int $big_thumb
 * @property string $myFighter_1
 * @property string $myFighter_2
 * @property int $twits_cnt
 * @property int $fb_cnt
 * @property int $vk_cnt
 * @property int $exclusive
 */
class Message2000 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message2000';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Keyword', 'Created', 'LastUser_ID', 'newsType', 'myTitle', 'myPhoto', 'Date', 'exclusive'], 'required'],
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Priority', 'Parent_Message_ID', 'LastUser_ID', 'myViews', 'twits_cnt', 'fb_cnt', 'vk_cnt'], 'integer'],
            [['ncDescription', 'newsType', 'myText', 'Video'], 'string'],
            [['Created', 'LastUpdated', 'Date'], 'safe'],
            [['Keyword', 'ncTitle', 'ncKeywords', 'UserAgent', 'LastUserAgent', 'myTitle', 'myPhoto', 'myTags', 'oldAuthor', 'exFoto', 'EnTags', 'myFighter_1', 'myFighter_2'], 'string', 'max' => 255],
            [['Checked', 'myPop', 'toSlider', 'main_news', 'big_thumb', 'exclusive'], 'string', 'max' => 4],
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
            'newsType' => 'News Type',
            'myTitle' => 'My Title',
            'myPhoto' => 'My Photo',
            'myText' => 'My Text',
            'myTags' => 'My Tags',
            'myViews' => 'My Views',
            'myPop' => 'My Pop',
            'oldAuthor' => 'Old Author',
            'exFoto' => 'Ex Foto',
            'toSlider' => 'To Slider',
            'Date' => 'Date',
            'EnTags' => 'En Tags',
            'Video' => 'Video',
            'main_news' => 'Main News',
            'big_thumb' => 'Big Thumb',
            'myFighter_1' => 'My Fighter 1',
            'myFighter_2' => 'My Fighter 2',
            'twits_cnt' => 'Twits Cnt',
            'fb_cnt' => 'Fb Cnt',
            'vk_cnt' => 'Vk Cnt',
            'exclusive' => 'Exclusive',
        ];
    }
}
