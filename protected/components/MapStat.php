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
    private $_generate;

    public function __construct(Users $user_model, $dest_folder ,$overlay ){

        $this->_model = new $user_model;
        $this->_destination = $dest_folder;
        $this->_overlay=$overlay;
    }

    public function getProjectsPointsData(){
        $model = $this->_model;
        $points = $model->getDistrictProjectsPoints();
        foreach ($points as $p) {
            $clean[$p['ID_DISTRICT']] = $p['NUM'];
        }

        $this->_points = $clean;
        $this->_generate = $this->_destination.'in_p.png';
    }

    public function getUniversPointsData(){
        $model = $this->_model;
        $points = $model->getDistrictUniversPoints();
        foreach ($points as $p) {
            $clean[$p['ID_DISTRICT']] = $p['NUM'];
        }
        $this->_points = $clean;
        $this->_generate = $this->_destination.'in_a.png';
    }



    public function generateMapPoints(){
        $src = $this->_overlay;
        $size_img = getimagesize($src);

        $w = $size_img[0];        $h = $size_img[1];

        $image = imagecreatetruecolor( $w, $h ) or die('Cannot create image');

        //Цвета
        $white = 0xffffff;        $black = 0x000000;        $red = 0xff0000;

        //Cам текст
        $text =  array( 1=>'0',
                        2=>'0',
                        3=>'0',
                        4=>'0',
                        5=>'0',
                        6=>'0',
                        7=>'0',
                        8=>'0',
                        9=>'0'
                );

        foreach ($this->_points as $p_k=>$p_v) {
            $text[$p_k]= $p_v;
        }

        //Шрифт
        $font =  Yii::getPathOfAlias('webroot.type.fontello').DIRECTORY_SEPARATOR.'arial.ttf';  // - обязательно надо указать путь до шрифта
        $fontsize = 21; // размер шрифта, gd1 - в пикселях, gd2 - в пунктах

        //Централизация шрифта
        $sz = imagettfbbox( $fontsize, 0 , $font , $text[1]);

        $x=array(
            1=>'284',
            2=>'238',
            3=>'540',
            4=>'1443',
            5=>'1099',
            6=>'727',
            7=>'445',
            8=>'137',
            9=>'55',
        );

        $this->correct_coordinates($x,$text);

        $y=array(
            1=>'282',
            2=>'414',
            3=>'232',
            4=>'236',
            5=>'389',
            6=>'381',
            7=>'376',
            8=>'508',
            9=>'377',
        );

        //Делаем изображение прозрачным
        imagesavealpha($image,true);
        imagefill($image, 1, 1, imagecolorallocatealpha( $image, 255, 255, 255, 127 ) );
        imagecolortransparent($image, $black);

        imagettftext( $image, $fontsize, 0, $x[1], $y[1], $red, $font, $text[1]);
        imagettftext( $image, $fontsize, 0, $x[2], $y[2], $red, $font, $text[2] );
        imagettftext( $image, $fontsize, 0, $x[3], $y[3], $red, $font, $text[3] );
        imagettftext( $image, $fontsize, 0, $x[4], $y[4], $red, $font, $text[4] );
        imagettftext( $image, $fontsize, 0, $x[5], $y[5], $red, $font, $text[5] );
        imagettftext( $image, $fontsize, 0, $x[6], $y[6], $red, $font, $text[6] );
        imagettftext( $image, $fontsize, 0, $x[7], $y[7], $red, $font, $text[7] );
        imagettftext( $image, $fontsize, 0, $x[8], $y[8], $red, $font, $text[8] );
        imagettftext( $image, $fontsize, 0, $x[9], $y[9], $red, $font, $text[9]);

        //Выводим изображение
        header('Content-type: image/png');

        imagepng($image,$this->_generate);
        imagedestroy($image);

    }

    public function correct_coordinates(&$x,$text){
        foreach($text as $t_k=>$t_v){
            if(strlen($t_v)== 1){
                $x[$t_k]=$x[$t_k]+9;
            }

            if(strlen($t_v)== 3){
                $x[$t_k]=$x[$t_k]-7;
            }
        }
    }







}