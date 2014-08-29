<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 29.08.14
 * Time: 10:38
 * To change this template use File | Settings | File Templates.
 */

class MapStat {

    /*
     * 1) мы создаем свойства
     * 2) получаем цифры
     * 3) присваеваем цифры
     * 4) генерим 2 изображения
     *
     */

    private $_points = array();
    private $_destination;
    private $_model;
    private $_overlay;

    public function __construct(Users $user_model, $destination ,$overlay ){

        $this->_model = new $user_model;
        $this->_destination = $destination;
        $this->_overlay=$overlay;
    }

    public function getProjectsPointsData(){
        $model = $this->_model;
        $points = $model->getDistrictProjectsPoints();
        $this->_points = $points;
    }

    public function getUniversPointsData(){
        $model = $this->_model;
        $points = $model->getDistrictUniversPoints();
        $this->_points = $points;
    }

    public function generateMapPoints(){
        $src = $this->_overlay;
        $size_img = getimagesize($src);

        $w = $size_img[0];
        $h = $size_img[1];
        $image = imagecreatetruecolor( $w, $h ) or die('Cannot create image');

        //Цвета
        $white = 0xffffff;
        $black = 0x000000;
        $red = 0xff0000;


        //Cам текст
        $text =  [ 1=>'2', 2=>'333', 3=>'4', 4=>'555', 5=>'62', 6=>'77', 7=>'8', 8=>'777', 9=>'11' ];



        //Шрифт
        $font = realpath('arial.ttf'); // - обязательно надо указать путь до шрифта
        $fontsize = 21; // размер шрифта, gd1 - в пикселях, gd2 - в пунктах



    }








}