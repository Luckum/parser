<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Event;
use app\models\Message2010;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class EventToMessageController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $events = Event::find()->where('id >= 38408')->all();
        
        foreach($events as $k => $val) {
            $message = new Message2010;
            $message->Message_ID = 39407 + $k;
            $message->User_ID = 5;
            $message->Subdivision_ID = 11;
            $message->Sub_Class_ID = 28;
            $message->Priority = 200 + $k;
            $message->Keyword = "";
            $message->ncTitle = $val->title;
            $message->ncKeywords = $val->keywords;
            $message->ncDescription = str_replace("FightTime", "MMABoxing", $val->description);
            $message->Checked = 1;
            $message->Parent_Message_ID = 0;
            $message->Created = date("Y-m-d H:i:s");
            $message->LastUser_ID = 5;
            $message->myDate = date("Y-m-d", strtotime($val->date) - 60*60*24);
            $message->myName = $val->name;
            $message->myType = 1;
            $message->myCountry_name = $val->place;
            $message->save();
            
            if ($val->id % 100 == 0) {
                echo $val->id . " records done\n";
            }
        }

        return ExitCode::OK;
    }
}