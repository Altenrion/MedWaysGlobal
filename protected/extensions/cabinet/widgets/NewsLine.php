<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.09.14
 * Time: 23:42
 * To change this template use File | Settings | File Templates.
 */

class NewsLine extends CWidget{
    use MyTraits;

    public $count =2;
    public $news_line ;

    public function init(){

        $news = new News();

        $this->news_line = $news->getNews($this->count);



    }

    public function run(){

        $controller = Yii::app()->controller->id;

        $this->render('news_line',array(
            'news_line'=>$this->news_line,
            'controller'=>$controller,
        ));
    }

}