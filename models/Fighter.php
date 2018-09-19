<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fighter".
 *
 * @property int $id
 * @property int $link_id
 * @property string $fname_en
 * @property string $lname_en
 * @property string $fname_ru
 * @property string $lname_ru
 * @property string $nickname
 * @property string $country
 * @property string $weight
 * @property string $height
 * @property string $city
 * @property string $birthdate
 * @property string $category_en
 * @property string $category_ru
 * @property int $v_ko
 * @property int $v_s
 * @property int $v_d
 * @property int $l_ko
 * @property int $l_s
 * @property int $l_d
 * @property int $draw
 * @property string $bio
 * @property string $keywords
 * @property string $description
 * @property string $title
 *
 * @property FtLinks $link
 */
class Fighter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fighter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link_id', 'fname_en', 'lname_en', 'v_ko', 'v_s', 'v_d', 'l_ko', 'l_s', 'l_d', 'draw'], 'required'],
            [['link_id', 'v_ko', 'v_s', 'v_d', 'l_ko', 'l_s', 'l_d', 'draw'], 'integer'],
            [['weight', 'height'], 'number'],
            [['birthdate'], 'safe'],
            [['bio', 'keywords', 'description', 'title', 'image'], 'string'],
            [['fname_en', 'lname_en', 'fname_ru', 'lname_ru', 'nickname', 'country', 'city'], 'string', 'max' => 255],
            [['category_en', 'category_ru'], 'string', 'max' => 100],
            [['link_id'], 'exist', 'skipOnError' => true, 'targetClass' => FtLinks::className(), 'targetAttribute' => ['link_id' => 'id']],
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
            'fname_en' => 'Fname En',
            'lname_en' => 'Lname En',
            'fname_ru' => 'Fname Ru',
            'lname_ru' => 'Lname Ru',
            'nickname' => 'Nickname',
            'country' => 'Country',
            'weight' => 'Weight',
            'height' => 'Height',
            'city' => 'City',
            'birthdate' => 'Birthdate',
            'category_en' => 'Category En',
            'category_ru' => 'Category Ru',
            'v_ko' => 'V Ko',
            'v_s' => 'V S',
            'v_d' => 'V D',
            'l_ko' => 'L Ko',
            'l_s' => 'L S',
            'l_d' => 'L D',
            'draw' => 'Draw',
            'bio' => 'Bio',
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
        return $this->hasOne(FtLinks::className(), ['id' => 'link_id']);
    }
}
