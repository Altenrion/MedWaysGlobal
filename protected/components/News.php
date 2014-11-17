<?php
/**
 * Created by JetBrains PhpStorm.
 * User: n.v.barishev
 * Date: 11.09.14
 * Time: 13:50
 * To change this template use File | Settings | File Templates.
 */

class News {

    private $_title;
    private $_text;


    public function setNews($title,$content){

        $news = new NewsStorage;
        $news->title = $title;
        $news->content = $content;
        if($news->save()){
            return true;
        }
        else return false;
    }

    public function getNews($num=5){

        $condition = 'block = 0';
        if($num ==0){$limit = '-1';} else{$limit=$num;}


        $criteria = new CDbCriteria(array(
            'condition' => $condition,
            'order' => 'id DESC',
            'limit' => $limit,
        ));
        $news = NewsStorage::model()->findAll($criteria);

//        var_dump($news);

        if(!is_null($news)){
            return $news;
        }
        else {
            $html = '<div class="alert alert-info">
                        <strong></strong> Необходимая информация будет размещена в близжайшее время.
                    </div>';
            return $html;

            }

    }


}