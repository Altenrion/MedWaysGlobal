<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 31.08.14
 * Time: 18:38
 * To change this template use File | Settings | File Templates.
 */

Yii::import('zii.widgets.grid.CGridView');

class GridView extends CGridView
{
    public $enableHistory = false;
    public $summaryText = '{start}&ndash;{end} из {count}';
    public $pager= array(
        'class' => 'LinkPager',
    );

    public function __construct($owner=null)
    {
        $this->cssFile = Yii::app()->theme->baseUrl . '/css/gridview.css';
        parent::__construct($owner);
    }
}