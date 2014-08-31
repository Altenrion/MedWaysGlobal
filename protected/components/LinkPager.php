<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 31.08.14
 * Time: 18:05
 * To change this template use File | Settings | File Templates.
 */

//Yii::import('webroot.framework.web.widgets.pagers.CLinkPager');

class LinkPager extends CLinkPager{

    public $header = '';
    public $prevPageLabel = '&laquo; назад';
    public $nextPageLabel = 'далее &raquo;';
    public $htmlOptions = array(
        'class'=>'paginator'
    );

    public function __construct($owner=null)
    {
        $this->cssFile = Yii::app()->theme->baseUrl . '/css/pager.css';
        parent::__construct($owner);
    }
}