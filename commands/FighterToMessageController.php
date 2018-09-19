<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Fighter;
use app\models\Message2007;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FighterToMessageController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $fighters = Fighter::find()->where('image IS NOT NULL')->all();
        
        foreach ($fighters as $k => $val) {
            $message = Message2007::find()->where([
                'f_name_en' => $val->fname_en,
                'l_name_en' => $val->lname_en,
                'country_name' => $val->country,
                'myWeightCat_en' => $val->category_en,
                'victory_ko' => $val->v_ko,
                'victory_decision' => $val->v_d,
                'victory_submision' => $val->v_s
            ])->one();
            
            if ($message) {
                $message->image = $val->image;
                $message->save();
            }
            
            
            if ($k % 100 == 0) {
                echo $k . " records done\n";
            }
        }

        return ExitCode::OK;
    }
}