<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\EvLinks;
use app\models\FtLinks;
use app\models\Event;
use app\models\EventFighter;
use darkdrim\simplehtmldom\SimpleHTMLDom;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GetEventDetailController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $base_url = "http://fighttime.ru/fighters/";
        $e_links = EvLinks::find()->where('id > 38450')->all();
        //$e_links = EvLinks::find()->where('id = 1646')->all();
        
        foreach ($e_links as $k => $val) {
            $exists = get_headers($val->link);
            //print_r($exists);
            if (strpos($exists[0], '404') === false) {
                if (strpos($exists[0], '301') !== false && strpos($exists[15], 'Location') !== false) {
                    //$val->link = substr($exists[15], 10);
                
                    //$model = new Event;
                    //$model->link_id = $val->id;
                    $model = Event::find()->where(['link_id' => $val->id])->one();
                    $html = SimpleHTMLDom::file_get_html($val->link);
                    if ($html) {
                        /*$keywords = $html->find("[name=keywords]", 0);
                        $description = $html->find("[name=description]", 0);
                        $title = $html->find("title", 0);
                        
                        $model->keywords = $keywords->content;
                        $model->description = $description->content;
                        $model->title = $title->plaintext;
            
                        $res = $html->find('[itemprop=name]', 0);
                        $model->name = $res->plaintext;
                
                        $res = $html->find('[itemprop=startDate]', 0);
                        $model->date = $res->content;
                        
                        $res = $html->find('[itemprop=location]', 0);
                        if (isset($res)) {
                            $model->place = $res->plaintext;
                        }*/
                        
                        $html = $html->find('#fb-events-item-table', 0);
                        if (isset($html)) {
                            $fighters_1 = $fighters_2 = $fighters_1_result = $win_type = $referee = $win_round = $win_time = [];
                            $res = $html->find('[itemprop=subEvent]');
                            if (isset($res)) {
                                foreach ($res as $elm) {
                                    $res2 = $elm->find('.first_fighter_name', 0);
                                    if (isset($res2)) {
                                        $res3 = $res2->find('a', 0);
                                        if (isset($res3)) {
                                            $value = $res3->href;
                                            $f_1_exp = explode("/", $value);
                                            $f_1_lnk = $base_url . $f_1_exp[2];
                                            $f_base = FtLinks::find()->where(['link' => $f_1_lnk])->one();
                                            if ($f_base && isset($f_base->fighter)) {
                                                $fighters_1[] = 999 + $f_base->fighter->id;
                                            } else {
                                                $fighters_1[] = 0;
                                            }
                                        } else {
                                            $fighters_1[] = 0;
                                        }
                                        
                                    }
                                    
                                    
                                    $res2 = $elm->find('.second_fighter_name', 0);
                                    if (isset($res2)) {
                                        $res3 = $res2->find('a', 0);
                                        if (isset($res3)) {
                                            $value = $res3->href;
                                            $f_1_exp = explode("/", $value);
                                            $f_1_lnk = $base_url . $f_1_exp[2];
                                            $f_base = FtLinks::find()->where(['link' => $f_1_lnk])->one();
                                            if ($f_base && isset($f_base->fighter)) {
                                                $fighters_2[] = 999 + $f_base->fighter->id;
                                            } else {
                                                $fighters_2[] = 0;
                                            }
                                        } else {
                                            $fighters_2[] = 0;
                                        }
                                    }
                                    
                                    
                                    $res2 = $elm->find('.round', 0);
                                    if (isset($res2)) {
                                        $win_round[] = $res2->plaintext;
                                    }
                                    
                                    $res2 = $elm->find('.time', 0);
                                    if (isset($res2)) {
                                        $win_time[] = $res2->plaintext;
                                    }
                                }
                            }
                            
                            $res = $html->find('.fighters_result');
                            if (isset($res)) {
                                foreach ($res as $elm) {
                                    $value = $elm->find('.first_fighters_result', 0);
                                    $win = $value->find('.win', 0);
                                    if (isset($win)) {
                                        $fighters_1_result[] = 1;
                                        continue;
                                    }
                                    $loss = $value->find('.loss', 0);
                                    if (isset($loss)) {
                                        $fighters_1_result[] = 2;
                                        continue;
                                    }
                                    $draw = $value->find('.draw', 0);
                                    if (isset($draw)) {
                                        $fighters_1_result[] = 0;
                                    }
                                }
                            }
                            
                            $res = $html->find('.fifth');
                            if (isset($res)) {
                                foreach ($res as $elm) {
                                    $outcome = $method = $referee_s = '';
                                    $res2 = $elm->find('.outcome', 0);
                                    if (isset($res2)) {
                                        $outcome = $res2->plaintext;
                                    }
                                    $res2 = $elm->find('.method', 0);
                                    if (isset($res2)) {
                                        $method = ' (' . $res2->plaintext . ')';
                                    }
                                    $win_type[] = $outcome . $method;
                                    $res2 = $elm->find('.referee', 0);
                                    if (isset($res2)) {
                                        $referee_s = $res2->plaintext;
                                        $ar = explode(":", $referee_s);
                                        $referee_s = trim(array_pop($ar));
                                    }
                                    $referee[] = $referee_s;
                                }
                            }
                            
                            if (count($fighters_1)) {
                                foreach ($fighters_1 as $k => $rec) {
                                    if ($model) {
                                        $ef_model = new EventFighter;
                                        $ef_model->event_id = 999 + $model->id;
                                        $ef_model->fighter_1 = $rec;
                                        $ef_model->fighter_2 = isset($fighters_2[$k]) ? $fighters_2[$k] : 0;
                                        $ef_model->winner = isset($fighters_1_result[$k]) ? ($fighters_1_result[$k] == 1 ? $rec : ($fighters_1_result[$k] == 2 ? $fighters_2[$k] : 0)) : 0;
                                        $ef_model->referee = isset($referee[$k]) ? $referee[$k] : '';
                                        $ef_model->win_type = isset($win_type[$k]) ? $win_type[$k] : '';
                                        $ef_model->win_round = isset($win_round[$k]) ? $win_round[$k] : 0;
                                        $ef_model->win_time = isset($win_time[$k]) ? $win_time[$k] : '';
                                        if ($k == 0) {
                                            $ef_model->is_main_card = 1;
                                        }
                                        $ef_model->save();
                                    }
                                    $ef_model = new EventFighter;
                                    $ef_model->event_id = 999 + $model->id;
                                    $ef_model->fighter_1 = $rec;
                                    $ef_model->fighter_2 = isset($fighters_2[$k]) ? $fighters_2[$k] : 0;
                                    $ef_model->winner = isset($fighters_1_result[$k]) ? ($fighters_1_result[$k] == 1 ? $rec : ($fighters_1_result[$k] == 2 ? $fighters_2[$k] : 0)) : 0;
                                    $ef_model->referee = isset($referee[$k]) ? $referee[$k] : '';
                                    $ef_model->win_type = isset($win_type[$k]) ? $win_type[$k] : '';
                                    $ef_model->win_round = isset($win_round[$k]) ? $win_round[$k] : 0;
                                    $ef_model->win_time = isset($win_time[$k]) ? $win_time[$k] : '';
                                    if ($k == 0) {
                                        $ef_model->is_main_card = 1;
                                    }
                                    $ef_model->save();
                                }
                            }
                        }
                    }
                    //$model->save();
                    
                    echo $val->id . " done\n";
                } else {
                    echo $val->id . " 301\n";
                }
            } else {
                echo $val->id . " 404\n";
            }
        }

        return ExitCode::OK;
    }
}