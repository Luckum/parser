<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\imagine\Image;
use app\models\FtLinks;
use app\models\Fighter;

class GetPhotoController extends Controller
{
    public function actionIndex()
    {
        $baseUrl = 'https://fighttime.ru/images/fightbase/fighters/';
        $ft_links = FtLinks::find()->where('id >= 90000 AND id < 104406')->all();
        
        foreach ($ft_links as $k => $v) {
            $val = explode("/", $v->link);
            $url = $baseUrl . $val[4] . '.jpg';
            
            $exists = get_headers($url);
            if (strpos($exists[0], '404') === false) {
                $file = dirname(__FILE__) . "/images/" . $val[4] . ".jpg";
                $fileName = dirname(__FILE__) . "/images_r/" . $val[4] . ".jpg";
                copy($url, $file);
                
                if (filesize($file) > 0) {
                    $image = Image::getImagine();
                    $image = $image->open($file);

                    $size = $image->getSize();
                    $size = $size->heighten(405);

                    $image->resize($size)->save($fileName);
                    if (isset($v->fighters[0])) {
                        $fighter = $v->fighters[0];
                        $fighter->image = $val[4] . ".jpg";
                        $fighter->save();
                    }
                }
            }
            if ($v->id % 100 == 0) {
                echo $v->id . " record done\n";
            }
        }
        
        /*$url = 'https://fighttime.ru/images/fightbase/fighters/3.jpg';
        $file = dirname(__FILE__) . "/images/image.jpg";
        $fileName = dirname(__FILE__) . "/images_r/image-r.jpg";
        copy($url, $file);
        
        $image = Image::getImagine();
        $image = $image->open($file);

        $size = $image->getSize();
        $size = $size->heighten(405);

        $image->resize($size)->save($fileName);*/
        
        return ExitCode::OK;
    }
}