<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Event;
use app\models\EventNumber;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SetEventNumberController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $events = Event::find()->where('id >= 30000')->all();
        
        foreach($events as $k => $val) {
            $ev_link = explode("/", $val->link->link);
            $sh_id = array_pop($ev_link);
            
            $ev_numb = new EventNumber;
            $ev_numb->sh_id = $sh_id;
            $ev_numb->m_id = 999 + $val->id;
            $ev_numb->save();
            
            echo $val->id . " records done\n";
        }

        return ExitCode::OK;
    }
}