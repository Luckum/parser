<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message2007".
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
 * @property string $myName_ru
 * @property string $myFoto
 * @property int $myCountry
 * @property int $sportType
 * @property string $myPromotion
 * @property string $myWeightCat_ru
 * @property double $myWeight
 * @property double $myGrouth
 * @property string $myName_en
 * @property string $birth_place
 * @property string $birth_date
 * @property string $myWeightCat_en
 * @property int $victory_ko
 * @property int $victory_decision
 * @property int $victory_submision
 * @property int $defeat_ko
 * @property int $defeat_decision
 * @property int $defeat_submision
 * @property int $draw
 * @property string $bio
 * @property string $video_1
 * @property string $video_2
 * @property string $video_3
 * @property int $twits_cnt
 * @property int $fb_cnt
 * @property int $vk_cnt
 * @property int $views
 * @property string $country_name
 * @property string $f_name_en
 * @property string $l_name_en
 * @property string $f_name_ru
 * @property string $l_name_ru
 * @property string $nickname
 */
class Message2007 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message2007';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Keyword', 'Created', 'LastUser_ID', 'myName_ru', 'sportType', 'myWeight', 'myGrouth', 'myName_en', 'f_name_en', 'l_name_en'], 'required'],
            [['User_ID', 'Subdivision_ID', 'Sub_Class_ID', 'Priority', 'Parent_Message_ID', 'LastUser_ID', 'myCountry', 'sportType', 'victory_ko', 'victory_decision', 'victory_submision', 'defeat_ko', 'defeat_decision', 'defeat_submision', 'draw', 'twits_cnt', 'fb_cnt', 'vk_cnt', 'views', 'Checked'], 'integer'],
            [['ncDescription', 'bio'], 'string'],
            [['Created', 'LastUpdated', 'birth_date', 'image'], 'safe'],
            [['myWeight', 'myGrouth'], 'number'],
            [['Keyword', 'ncTitle', 'ncKeywords', 'UserAgent', 'LastUserAgent', 'myName_ru', 'myFoto', 'myPromotion', 'myWeightCat_ru', 'myName_en', 'birth_place', 'myWeightCat_en', 'video_1', 'video_2', 'video_3', 'country_name', 'f_name_en', 'l_name_en', 'f_name_ru', 'l_name_ru', 'nickname'], 'string', 'max' => 255],
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
            'myName_ru' => 'My Name Ru',
            'myFoto' => 'My Foto',
            'myCountry' => 'My Country',
            'sportType' => 'Sport Type',
            'myPromotion' => 'My Promotion',
            'myWeightCat_ru' => 'My Weight Cat Ru',
            'myWeight' => 'My Weight',
            'myGrouth' => 'My Grouth',
            'myName_en' => 'My Name En',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'myWeightCat_en' => 'My Weight Cat En',
            'victory_ko' => 'Victory Ko',
            'victory_decision' => 'Victory Decision',
            'victory_submision' => 'Victory Submision',
            'defeat_ko' => 'Defeat Ko',
            'defeat_decision' => 'Defeat Decision',
            'defeat_submision' => 'Defeat Submision',
            'draw' => 'Draw',
            'bio' => 'Bio',
            'video_1' => 'Video 1',
            'video_2' => 'Video 2',
            'video_3' => 'Video 3',
            'twits_cnt' => 'Twits Cnt',
            'fb_cnt' => 'Fb Cnt',
            'vk_cnt' => 'Vk Cnt',
            'views' => 'Views',
            'country_name' => 'Country Name',
            'f_name_en' => 'F Name En',
            'l_name_en' => 'L Name En',
            'f_name_ru' => 'F Name Ru',
            'l_name_ru' => 'L Name Ru',
            'nickname' => 'Nickname',
        ];
    }
}
