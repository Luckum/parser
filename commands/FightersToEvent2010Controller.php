<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Event;
use app\models\EventFighter;
use app\models\Message2010;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FightersToEvent2010Controller extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $ef_model = EventFighter::find()->where(['is_main_card' => 1])->andWhere('id >= 190000')->groupBy('event_id')->all();
        
        foreach ($ef_model as $val) {
            $event = Message2010::find()->where(['Message_ID' => $val->event_id])->one();
            if ($event) {
                $event->main_card_fighter_1 = $val->fighter_1;
                $event->main_card_fighter_2 = $val->fighter_2;
                $event->main_card_winner = $val->winner;
                $event->referee = $val->referee;
                $event->win_round = $val->win_round;
                $event->win_type = $val->win_type;
                $event->win_time = $val->win_time;
                $event->save();
            }
            echo $val->id . " done\n";
        }

        return ExitCode::OK;
    }
}