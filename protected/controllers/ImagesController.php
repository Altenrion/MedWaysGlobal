<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 18.08.14
 * Time: 13:43
 * To change this template use File | Settings | File Templates.
 */

class ImagesController extends Controller{

    public $image_name;
    public $user_id;


    public function actionIndex(){

            $this->render('index');
        }


    ############ Configuration ##############
    private $thumb_square_size  = 100 ;  //Thumbnails will be cropped to 200x200 pixels
    private $max_image_size     = 300; //Maximum image size (height and width)
    private $thumb_prefix	    = "thumb_"; //Normal thumb Prefix
    private $destination_folder = '';
//        Yii::getPathOfAlias('webroot.images.avatars');
//        'C:/wamp/www/ajax-image-upload-sample/uploads/'; //upload directory ends with / (slash)

    private $jpeg_quality 	    = 90; //jpeg quality
    ##########################################


    public function actionUploadPDF(){


        $user = new Users();
        $this->destination_folder = Yii::getPathOfAlias('webroot.uploads').DIRECTORY_SEPARATOR;
        $this->user_id = Yii::app()->user->id;

        if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            if(!isset($_FILES['pdf_file']) || !is_uploaded_file($_FILES['pdf_file']['tmp_name'])){
                echo "Image file is Missing!";
                Yii::app()->end();
            }

//
            $whitelist = array( ".pdf");
            $data = array();
            $error = true;

            //Проверяем разрешение файла
            foreach  ($whitelist as  $item) {
                if(preg_match("/$item\$/i",$_FILES['pdf_file']['name'])) $error = false;
            }

            //если нет ошибок, грузим файл
            if(!$error) {

                $new_file_name = 'roadmap_'.$this->user_id.'.pdf';
                $folder =  $this->destination_folder; //директория в которую будет загружен файл
                $uploadedFile =  $folder.$new_file_name;

                if(is_uploaded_file($_FILES['pdf_file']['tmp_name'])){
                    if(move_uploaded_file($_FILES['pdf_file']['tmp_name'],$uploadedFile)){
                        $data = $_FILES['pdf_file'];

                        /// Сохраняю инфу в таблицу с проектом.

                        $project = ProjectRegistry::model()->find("ID_REPRESENTATIVE='".$this->user_id."'");
//                        var_dump($project);
//                        Yii::app()->end();

                        if($project !== null){
                            $_POST['pk']= $project->ID_PROJECT;
                            $_POST['name']= 'ROADMAP_PROJECT';
                            $_POST['value']= $new_file_name;

                            $this->forward('Autorized/updateProject',false);

                            echo '<div class="alert alert-success">';
                            echo '<strong>Ваш документ успешно загружен!</strong>';
                            echo '</div>';

                            Yii::app()->end();
                        }
                        echo "Проект не создан, обратитесь в техническую поддержку.";
                        Yii::app()->end();


                    }
                    else {
                        echo "Во время загрузки файла произошла ошибка";
                        Yii::app()->end();

                    }
                }
                else {
                    echo "Файл не  загружен";
                    Yii::app()->end();
                }
            }
            else{

                echo 'Вы загружаете запрещенный тип файла';
                Yii::app()->end();
            }



        }

           echo '<div class="alert alert-success">';
           echo '<strong>Ваш документ успешно загружен!</strong>';
           echo '</div>';

           Yii::app()->end();

    }


    public function actionUpload(){


        $user = new Users();
        $this->destination_folder = Yii::getPathOfAlias('webroot.images.avatars').DIRECTORY_SEPARATOR;
        $this->user_id = Yii::app()->user->id;
//

        if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

            // check $_FILES['ImageFile'] not empty
            if(!isset($_FILES['image_file']) || !is_uploaded_file($_FILES['image_file']['tmp_name'])){

                echo "Изображение потеряно!";
                Yii::app()->end();
            }

            //uploaded file info we need to proceed
            $image_name = $_FILES['image_file']['name']; //file name
            $image_size = $_FILES['image_file']['size']; //file size
            $image_temp = $_FILES['image_file']['tmp_name']; //file temp

            $image_size_info 	= getimagesize($image_temp); //get image size

            if($image_size_info){
                $image_width 		= $image_size_info[0]; //image width
                $image_height 		= $image_size_info[1]; //image height
                $image_type 		= $image_size_info['mime']; //image type
            }else{
                echo "Убедитесь, что загружается изображение!";
                Yii::app()->end();
            }

            //switch statement below checks allowed image type
            //as well as creates new image from given file
            switch($image_type){
                case 'image/png':
                    $image_res =  imagecreatefrompng($image_temp); break;
                case 'image/gif':
                    $image_res =  imagecreatefromgif($image_temp); break;
                case 'image/jpeg': case 'image/pjpeg':
                $image_res = imagecreatefromjpeg($image_temp); break;
                default:
                    $image_res = false;
            }

            if($image_res){
                //Get file extension and name to construct new file name
                $image_info = pathinfo($image_name);
                $image_extension = strtolower($image_info["extension"]); //image extension
                $image_name_only = strtolower($image_info["filename"]);//file name only, no extension

                //create a random name for new image (Eg: fileName_3.jpg) ;
                $new_file_name = $image_name_only. '_' . $this->user_id . '.' . $image_extension;

                //folder path to save resized images and thumbnails
                $thumb_save_folder 	= $this->destination_folder . $this->thumb_prefix . $new_file_name;
                $image_save_folder 	= $this->destination_folder . $new_file_name;

                //call normal_resize_image() function to proportionally resize image
                if($this->normal_resize_image($image_res, $image_save_folder, $image_type, $this->max_image_size, $image_width, $image_height, $this->jpeg_quality))
                {
                    //call crop_image_square() function to create square thumbnails
                    if(!$this->crop_image_square($image_res, $thumb_save_folder, $image_type, $this->thumb_square_size, $image_width, $image_height, $this->jpeg_quality))
                    {
                        echo "При создании превью произошла ошибка";
                        Yii::app()->end();
                    }

/////////////////////////// переделать этот грязный способ на метод из трейта для всех контроллеров //////////////////////////
                    $_POST['pk']= Yii::app()->user->id;
                    $_POST['name']= 'AVATAR';
                    $_POST['value']= $new_file_name;

                    $this->forward('Autorized/updateProfile',false);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                    ///// Переприсваиваем к глобальному методу Yii::app()->user свойство ava с новой картинкой. /////
                    Yii::app()->user->setState('ava', $new_file_name );

                    /* We have succesfully resized and created thumbnail image
                    We can now output image to user's browser or store information in the database*/
                    echo '<div align="center">';
                    echo '<img src="'.Yii::app()->baseUrl.'/images/avatars/'.$this->thumb_prefix . $new_file_name.'" alt="Thumbnail">';
                    echo '<br />';
                    echo '<img src="'.Yii::app()->baseUrl.'/images/avatars/'. $new_file_name.'" alt="Resized Image">';
                    echo '</div>';
                }

                imagedestroy($image_res); //freeup memory
            }
        }

        
    }

    #####  This function will proportionally resize image #####
    public function normal_resize_image($source, $destination, $image_type, $max_size, $image_width, $image_height, $quality){

        if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize

        //do not resize if image is smaller than max size
        if($image_width <= $max_size && $image_height <= $max_size){
            if($this->save_image($source, $destination, $image_type, $quality)){
                return true;
            }
        }

        //Construct a proportional size of new image
        $image_scale	= min($max_size/$image_width, $max_size/$image_height);
        $new_width		= ceil($image_scale * $image_width);
        $new_height		= ceil($image_scale * $image_height);

        $new_canvas		= imagecreatetruecolor( $new_width, $new_height ); //Create a new true color image

        //Copy and resize part of an image with resampling
        if(imagecopyresampled($new_canvas, $source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height)){
            $this->save_image($new_canvas, $destination, $image_type, $quality); //save resized image
        }

        return true;
    }

##### This function corps image to create exact square, no matter what its original size! ######
    public function crop_image_square($source, $destination, $image_type, $square_size, $image_width, $image_height, $quality){
        if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize

        if( $image_width > $image_height )
        {
            $y_offset = 0;
            $x_offset = ($image_width - $image_height) / 2;
            $s_size 	= $image_width - ($x_offset * 2);
        }else{
            $x_offset = 0;
            $y_offset = ($image_height - $image_width) / 2;
            $s_size = $image_height - ($y_offset * 2);
        }
        $new_canvas	= imagecreatetruecolor( $square_size, $square_size); //Create a new true color image

        //Copy and resize part of an image with resampling
        if(imagecopyresampled($new_canvas, $source, 0, 0, $x_offset, $y_offset, $square_size, $square_size, $s_size, $s_size)){
            $this->save_image($new_canvas, $destination, $image_type, $quality);
        }

        return true;
    }

##### Saves image resource to file #####
    public function save_image($source, $destination, $image_type, $quality){
        switch(strtolower($image_type)){//determine mime type
            case 'image/png':
                imagepng($source, $destination); return true; //save png file
                break;
            case 'image/gif':
                imagegif($source, $destination); return true; //save gif file
                break;
            case 'image/jpeg': case 'image/pjpeg':
            imagejpeg($source, $destination, $quality); return true; //save jpeg file
            break;
            default: return false;
        }
    }




}