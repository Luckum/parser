<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Event;
use app\models\EventFighter;
use app\models\Message2045;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FightersToEvent2045Controller extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $ef_model = EventFighter::find()->where(['is_main_card' => 0])->andWhere('id >= 225000')->all();
        
        foreach ($ef_model as $k => $val) {
            $event = new Message2045;
            $event->User_ID = 5;
            $event->Subdivision_ID = 231;
            $event->Sub_Class_ID = 240;
            $event->Priority = 150 + $k;
            $event->Created = date('Y-m-d H:i:s');
            $event->LastUser_ID = 0;
            $event->fighter_1 = $val->fighter_1;
            $event->fighter_2 = $val->fighter_2;
            $event->event = $val->event_id;
            $event->winner = $val->winner;
            $event->type = 1;
            $event->referee = $val->referee;
            $event->win_round = $val->win_round;
            $event->win_type = $val->win_type;
            $event->win_time = $val->win_time;
            $event->save();
            
            echo $val->id . " done\n";
        }

        return ExitCode::OK;
    }
}