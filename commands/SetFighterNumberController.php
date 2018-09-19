<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Fighter;
use app\models\FighterNumber;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SetFighterNumberController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $fighters = Fighter::find()->where('id >= 100000')->all();
        
        foreach($fighters as $k => $val) {
            $f_link = explode("/", $val->link->link);
            $sh_id = array_pop($f_link);
            
            $f_numb = new FighterNumber;
            $f_numb->sh_id = $sh_id;
            $f_numb->m_id = 999 + $val->id;
            $f_numb->save();
            
            echo $val->id . " records done\n";
        }

        return ExitCode::OK;
    }
}