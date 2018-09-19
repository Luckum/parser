<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\EvLinks;
use app\models\FtLinks;
use app\models\Fighter;
use darkdrim\simplehtmldom\SimpleHTMLDom;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GetFighterDetailController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $f_links = FtLinks::find()->where('id > 104395 AND id < 105000')->all();
        
        foreach ($f_links as $k => $val) {
            $exists = get_headers($val->link);
            if (strpos($exists[0], '404') === false) {
                $model = new Fighter;
                $model->link_id = $val->id;
                $html = SimpleHTMLDom::file_get_html($val->link);
                if ($html) {
                    $keywords = $html->find("[name=keywords]", 0);
                    $description = $html->find("[name=description]", 0);
                    $title = $html->find("title", 0);
                    
                    $model->keywords = $keywords->content;
                    $model->description = $description->content;
                    $model->title = $title->plaintext;
        
                    $res = $html->find('[itemprop=name]', 0);
                    $str = $res->plaintext;
            
                    if ($str_pos_1 = strpos($str, '/')) {
                        $str_ru = substr($str, 0, $str_pos_1 - 1);
                        $str_en = substr($str, $str_pos_1 + 2);
                    } else {
                        $str_en = $str;
                        $str_ru = "";
                    }
            
                    if ($str_pos_2 = strpos($str_en, '(')) {
                        $nickname = substr($str_en, $str_pos_2);
                        $model->nickname = trim(trim($nickname, '('), ')');
                        $str_en = substr($str_en, 0, $str_pos_2 - 1);
                    }
                    
                    
                    $en_ar = explode(" ", $str_en);
                    $model->lname_en = array_pop($en_ar);
                    $model->fname_en = implode(" ", $en_ar);
                    
                    if (!empty($str_ru)) {
                        $ru_ar = explode(" ", $str_ru);
                        $model->lname_ru = array_pop($ru_ar);
                        $model->fname_ru = implode(" ", $ru_ar);
                    }
                    
                    $res = $html->find('.fighter-desc', 0);
                    if (isset($res)) {
                        $model->bio = $res->plaintext;
                    }
                    
                    $res = $html->find('[itemprop=nationality]', 0);
                    if (isset($res)) {
                        $model->country = $res->plaintext;
                    }
                    
                    $res = $html->find('.weight', 0);
                    if (isset($res)) {
                        $res = $res->find('.value', 0);
                        $weight = $res->plaintext;
                        $str_pos_1 = strpos($weight, 'кг');
                        $model->weight = substr($weight, 0, $str_pos_1);
                    }
                    
                    $res = $html->find('.height', 0);
                    if (isset($res)) {
                        $res = $res->find('.value', 0);
                        $height = $res->plaintext;
                        $str_pos_1 = strpos($height, 'см');
                        $model->height = substr($height, 0, $str_pos_1);
                    }
                    
                    $res = $html->find('.wclass', 0);
                    if (isset($res)) {
                        $ar = explode(" ", $res->plaintext);
                        $model->category_en = trim(array_pop($ar));
                        $res1 = $res->find('.value', 0);
                        if (isset($res1)) {
                            $model->category_ru = $res1->plaintext;
                        }
                    }
                    
                    $res = $html->find('.birthday', 0);
                    if (isset($res)) {
                        $ar = explode(" ", $res->plaintext);
                        $model->birthdate = trim(array_pop($ar));
                    }
                    
                    $res = $html->find('.wins', 0);
                    if (isset($res)) {
                        $res1 = $res->find('.count', 1);
                        $model->v_ko = $res1->plaintext;
                        $res1 = $res->find('.count', 2);
                        $model->v_d = $res1->plaintext;
                        $res1 = $res->find('.count', 3);
                        $model->v_s = $res1->plaintext;
                    }
                    
                    $res = $html->find('.loss', 0);
                    if (isset($res)) {
                        $res1 = $res->find('.count', 1);
                        $model->l_ko = $res1->plaintext;
                        $res1 = $res->find('.count', 2);
                        $model->l_d = $res1->plaintext;
                        $res1 = $res->find('.count', 3);
                        $model->l_s = $res1->plaintext;
                    }
                    
                    $res = $html->find('.draw', 0);
                    if (isset($res)) {
                        $res = $res->find('.count', 0);
                        $model->draw = $res->plaintext;
                    }
                }
                $model->save();
                if ($k % 100 == 0) {
                    echo $k . " records done\n";
                }
            }
        }

        return ExitCode::OK;
    }
}