<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\EvLinks;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GetEventLinkController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $base_url = "http://fighttime.ru/events/";
        for ($i = 65370; $i < 66000; $i ++) {
            $url = $base_url . $i;
            
            $exists = get_headers($url);
            if (strpos($exists[0], '404') === false) {
                $model = new EvLinks;
                $model->link = $url;
                $model->save();
            }
            if ($i % 100 == 0) {
                echo $i . " records done\n";
            }
        }

        return ExitCode::OK;
    }
}