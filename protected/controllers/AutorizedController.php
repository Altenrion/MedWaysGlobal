<?php

class AutorizedController extends Controller
{

    use MyTraits;

    public  $layout = '//layouts/Cabinet';
    public $defaultAction = 'index';
    public $TableOptions= array(
        'bStateSave'    => false,
        'bPaginate'     => true,
        'oLanguage'     => array(
            "sEmptyTable" => "Записей не найдено",
            'sProcessing' => 'Загрузка...',
            'sInfo' => 'Показано от _START_ до _END_ из общих _TOTAL_',
            'sLengthMenu' => ' _MENU_ записей на странице',
            'sSearch'=>'поиск',
            'sRefresh'=>'обновить',
            'sZeroRecords'=>'Записей нет',
            'sInfoEmpty'=>'Показано 0 записей',
            'oPaginate' => array(

                'sFirst' => '&laquo;',
                'sPrevious' => '&laquo; назад',
                'sNext' => 'далее &raquo;',
                'sLast' => '&raquo;',

            ),

        ),
    );

    public function filters()
    {
        return array(
            'accessControl',
        );
    }


    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('index','dashboard', 'profile','info','news','project','statistics','projects','experts','manageNotifies','manageNews','manageUsers','lockScreen','updateProject','updateProfile'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('profile','news','info','project'),
                'roles'=>array('Dev','Manager','Exp','Exp1','Exp2','Exp3'),
            ),
            array('allow',
                'actions'=>array('project'),
                'roles'=>array('Manager'),
            ),
            array('allow',
                'actions'=>array('dashboard','manage_news','manage_notifies'),
                'roles'=>array('Dev'),
            ),
            array('allow',
                'actions'=>array('projects','statistics'),
                'roles'=>array('Exp1','Exp2','Exp3','Dev',),
            ),

            array('deny',
                'actions'=>array('index','dashboard', 'profile','info','news','project','statistics','projects'),
                'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionStatistics()
	{

		$this->render('statistics');
	}

    public function actionDashboard()
	{

		$this->render('dashboard');
	}


    public function actionExperts()
	{
        $this->render('experts');
  	}


	public function actionProject()
	{
        $model = new ProjectRegistry;
        if(!Yii::app()->user->isGuest){
            $data = $model->findProjectData(Yii::app()->user->id);
        }

        $this->render('project',array(
            'data'=>$data,
            'model'=>$model,
        ));
	}

    public function actionUnlockScreen()
    {
        {
            $model=new LoginForm;

            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login()){
                    Yii::app()->user->setState('lock','unlocked');
                    $this->redirect(Yii::app()->createUrl('Autorized/profile'));
                }
            }
            $this->renderPartial('lockScreen',array('model'=>$model));
        }

    }
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('ShowCase/login'));
    }




	public function actionInfo()
	{
		$this->render('info');
	}

    public function actionProjects()
	{
		$this->render('projects');
	}

	public function actionNews()
	{
		$this->render('news');
	}

    public function actionManageNews()
	{
        if( Yii::app()->request->isAjaxRequest) {

            if( Yii::app()->request->getPost('type') == 'news'){
                $news = new News;
                $title = Yii::app()->request->getPost('title');
                $text = Yii::app()->request->getPost('content');

                if($title != '' && $text != '<p><br></p>'){
                    if($news->setNews($title,$text)){
                        echo CJSON::encode('ok');
                        Yii::app()->end();
                    }
                }
                else {
                    echo CJSON::encode('fail');
                    Yii::app()->end();
                }


            }
            if( Yii::app()->request->getPost('type') == 'notify'){
                $notify = new Notify();

                $address = Yii::app()->request->getPost('address');
                $user_id = Yii::app()->request->getPost('user_id');


                $title = Yii::app()->request->getPost('title');
                $text = Yii::app()->request->getPost('content');

                $type = Yii::app()->request->getPost('notify_type');
                $repeat = Yii::app()->request->getPost('repeat');
                $color = Yii::app()->request->getPost('color');

                if($title != '' && $text != '<p><br></p>'){
                    if($notify->SetNotify($address,$user_id,$title,$text,$type,$repeat,$color)){
                        echo CJSON::encode('ok');
                        Yii::app()->end();
                    }
                }
                else {
                    echo CJSON::encode('fail');
                    Yii::app()->end();
                }
            }
//            var_dump($_POST);
            Yii::app()->end();
        }

		$this->render('manage_news');
	}

    /**
     * Метод для присваевания полей сортировки. Не используется.
     * @param array $columns
     */
    public function setSortColumns(array $columns){
        $this->sortColumns = $columns;
    }

    /**
     * Метод для присваевания полей таблицы. Не используется.
     * @param array $columns
     */
    public function setTableColumns(array $columns){
        $cols = $columns['simple_cols'];

        if(isset($columns['button_cols'])){
            $button_column =  array( 'class' => 'EButtonColumn' );

            $template = '';
            foreach($columns['button_cols'] as $but_k=>$but_v){
                $template .= '{'.$but_v.'}&nbsp;';
            }
            $button_column['template'] = $template;

            $buttons = array();
            foreach($columns['button_cols'] as $but_k=>$but_v){

                switch ($but_v){
                    case 'email'        : $button = array(
                        'label'=>'<i class="fa fa-envelope"></i>',
                        'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
                        'options' => array(
                            'rel' => 'tooltip',
                            'data-toggle' => 'tooltip',
                            'title'       => 'Отправить сообщение', ),
                    );
                        break;

                    case 'showNotify'   : $button = array(
                        'label'=>'<i class="fa fa-pencil"></i>',
                        'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
                        'options' => array(
                            'rel' => 'tooltip',
                            'data-toggle' => 'tooltip',
                            'title'       => 'Отправить сообщение', ),
                    );
                        break;
                    case  'update'      : $button =  array(
                        'label'=> ' <a href="#"><i class="fa fa-check bg-green action"></i></a>',
                        'url' => 'Yii::app()->createUrl("/edit/$data->id")',
                    );
                        break;
                    case  'delete'      : $button = array(
                        'url' => 'Yii::app()->createUrl("/delete/$data->id")',
                    );
                        break;


                }

                $buttons[$but_v]= $button;
            }
            $button_column['buttons'] = $buttons;
            $cols[] = $button_column;

            $this->tableColumns = $cols;

        }
    }






    public function actionManageNotifies()
	{



        $this->render('manage_notifies');
	}

    public function actionManageProject($Project)
	{
//        var_dump($Project);

        $projectData = ProjectRegistry::model()->findByPk($Project);
//        var_dump($projectData);
        $managerData = Users::model()->findByPk($projectData->ID_REPRESENTATIVE);
//        var_dump($managerData);


        $this->render('manage_project',array(
            'project'=>$projectData,
            'manager'=>$managerData,
        ));
	}

    /**
     * Главный метод страницы управления пользователями
     */
    public function actionManageUsers()
	{

        $this->render('manage_users', array(
        ));
	}


    /**
     * Метод блокировки экрана
     */
    public function actionLockScreen()
	{
        Yii::app()->user->setState('lock','locked');

		$this->renderPartial('lockScreen');
	}


    public function actionUpdateProject(){
        $edit = new EditableSaver('ProjectRegistry');
        $edit->scenario = 'update';
        $edit->update();
    }

    public function actionUpdateProfile(){
        $edit = new EditableSaver('Users');
        $edit->scenario = 'update';
        $edit->update();
    }


    /**
     * Метод Профиля пользователя
     */
    public function actionProfile()
	{
        $role = '';
        $messsages = array();
        $model = new Users;
        $proj = new ProjectRegistry;

        if(!Yii::app()->user->isGuest){
            $data = $model->findProfileData(Yii::app()->user->id);

            $clean_data=$data[0];

            if(!is_null($clean_data['roles'])){
                $role = $this->cleanRole($data[0]['roles']);
            }

            $perc_prof = $this->CheckInfoPercentage($clean_data);

            $perc_proj = $count_quest = $count_proj = '0';

            if($this->checkRole(array('Exp','Exp1','Exp2','Exp3'))){

                $criteria = $this->getProjectByCriteria();
                $proj = ProjectRegistry::model()->findAll($criteria);
                $count_proj = count($proj);

            }

            if($this->checkRole(array('Dev'))){
                $data_quest = Questions::model()->findAll();
                $count_quest = count($data_quest);
            }

            if($this->checkRole(array('Manager'))){
                $datap =  $proj->findProjectData(Yii::app()->user->id);
                $clean_datap=$datap[0];
                $perc_proj = $this->CheckInfoPercentage($clean_datap);
            }
        }
        else{
            $this->redirect(Yii::app()->createUrl('showCase/login'));
        }
        $this->render('profile',array(
            'data'=>$clean_data,
            'model'=>$model,
            'role'=>$role,
            'messages'=>$messsages,
            'perc_prof'=>$perc_prof,
            'perc_proj'=>$perc_proj,
            'count_quest'=>$count_quest,
            'count_proj'=>$count_proj,
        ));
	}


    /**
     * Метод для виджета показывающего процент заполненности информации
     *
     * @param $arr
     * @return float
     */
    public function CheckInfoPercentage($arr){
        $key = 0;
        unset($arr['PRIVACY']);

        foreach($arr as $ar_k=>$ar_v){

                if( $ar_k == 'FIRST_LAVEL_APPROVAL' || $ar_k == 'SECOND_LAVEL_RATING' || $ar_k == 'FIRST_LAVEL_COMMENT' || $ar_k == 'LONG_BUDGET'  || $ar_k == 'THIRD_LAVEL_RATING'  || $ar_k == 'PRIVACY'   ){
                    $ar_v = 'not_count';
                }

                if(empty($ar_v) || $ar_v == "" || $ar_v == " " || is_null( $ar_v) ){
                    $key++;

                }
            }

        $num = count($arr);

        $percentage = (($num - $key)/$num)*100;

        return $percentage;
    }

    /**
     * Метод проверки заполненности данных в профиле и проекте,
     * при регистрации проекта в эстафету.
     */
     public function actionCheckFullInfo(){
        $user = new Users();
        $project= new ProjectRegistry();

        $user_info = $user->findProfileData(Yii::app()->user->id);
        $proj_info = $project->findProjectData(Yii::app()->user->id);

        foreach($user_info[0] as $i_k=>$i_v){
            if($i_k == 'PRIVACY' || $i_k == 'ID_STAGE' || $i_k == 'AVATAR' ){
                $i_v = 'not_count';
            }

            if($i_v == null || $i_v == '' || $i_v == ' '){

                echo json_encode('fail'); Yii::app()->end();  }
        }

        foreach ($proj_info[0] as $in_k=>$in_v) {

            if($in_k == 'FIRST_LAVEL_APPROVAL' || $in_k == 'FIRST_LAVEL_COMMENT' || $in_k == 'SECOND_LAVEL_RATING' || $in_k == 'THIRD_LAVEL_RATING' || $in_k == 'LONG_BUDGET' || $in_k == 'PRIVACY_P' ){
                $in_v = 'not_count';
            }
            if($in_v == null || $in_v == '' || $in_v == ' '){

                echo json_encode('fail'); Yii::app()->end();   }
        }

         $this->Update('ProjectRegistry',array('pk'=>$proj_info[0]['id'],
                                                'name'=>'FIRST_LAVEL_APPROVAL',
                                                'value'=>'1',
                                         ));

        echo json_encode('ok'); Yii::app()->end();

    }

    /** Метод для верификации проектов */
    public function actionVerifyProject(){

        $id = Yii::app()->request->getPost('id');
        $status = Yii::app()->request->getPost('status');

        /** проверка на дублирование оценки  */

        $check = ProjectRegistry::model()->find('ID_PROJECT=:id_project',array(
                                                        'id_project'=>$id
                                                    ));

        if($check->FIRST_LAVEL_APPROVAL == 3 ){
            echo json_encode('verified'); Yii::app()->end();
        }

        if(isset($id)){
            $this->Update('ProjectRegistry',array(  'pk'=>$id,
                                                    'name'=>'FIRST_LAVEL_APPROVAL',
                                                    'value'=>$status,
                                                ));
            echo json_encode('ok');Yii::app()->end();
        }
        else{
            echo json_encode('fail'); Yii::app()->end();
        }
    }

    /** Метод для оценки проекта Экспертами 2 и 3 ур */
    public function actionEvaluateProject(){
        $level = $marks = '';
        if(isset($_POST['level'])){ $level = $_POST['level']; }

        switch($level){
            case 'second': $marks_c = 'SecondLavelMarks'; break;
            case 'third' : $marks_c = 'ThirdLavelMarks' ; break;
        }

        /** проверка на дублирование оценки  */
        $check = $marks_c::model()->findAll('ID_EXPERT=:id_expert AND ID_PROJECT=:id_project',array(
                                                                ':id_expert'=>Yii::app()->user->id,
                                                                'id_project'=>$_POST['id']
                                                            ));

        if(count($check) > 0){
            echo json_encode('evaluated'); Yii::app()->end();
        }

        if(isset($_POST['mark_1']) && isset($_POST['mark_10'])){

            $marks = new $marks_c;
            $marks->ID_EXPERT = Yii::app()->user->id;
            $marks->ID_PROJECT = $_POST['id'];
                unset($_POST['id']);
                unset($_POST['level']);

            foreach($_POST as $mark_k=>$mark_v){
                $marks->$mark_k = $mark_v;
            }
            $marks->TOTAL_MARK = array_sum($_POST);


            /**  Триггер для подсчета средней оценки в таблицу проектов. */

            $trigger = $this->mark_trigger($level,$marks->ID_PROJECT, $marks->TOTAL_MARK);

//            var_dump($trigger);
//            Yii::app()->end();
            if($marks->save() && $trigger){
                echo json_encode('ok');Yii::app()->end();
            }
            else{
                echo json_encode('fail'); Yii::app()->end();
            }
        }
    }

    /**  Метод для фиксирования среднего значения оценки в таблицу проекта.  */
    public function mark_trigger($level,$id_project,$total){
        switch($level){
            case 'second': $field = 'SECOND_LAVEL_RATING'; break;
            case 'third' : $field = 'THIRD_LAVEL_RATING' ; break;
        }
        $mark = ProjectRegistry::model()->find('ID_PROJECT=:id_project',array(':id_project'=>$id_project));
        $current_mark = $mark->$field;
        $average_mark = ($current_mark + $total) / 2;
        $mark->$field = round($average_mark);

//        var_dump($mark);
//        Yii::app()->end();

        if($mark->save()){
            return true ;
        }
        else{
            return false;
        }
    }


    public function actionManageMails(){

//        var_dump($_POST);
//        Yii::app()->end();

        $address = Yii::app()->request->getPost('address');
        $user_id = Yii::app()->request->getPost('user_id');
        $title = Yii::app()->request->getPost('title');
        $content = Yii::app()->request->getPost('content');

        $tpl_file = Yii::getPathOfAlias('webroot.downloads').DIRECTORY_SEPARATOR.'mail_mail.php';
        $tpl = file_get_contents($tpl_file);
        $mail = $tpl;

        $mail = strtr($mail, array(
            "{title}"   => $title,
            "{content}" => $content,
        ));

        $cheker = 0;

        if($user_id == ''){
            $emails = Users::model()->findAll("roles='".$address."'");

            foreach($emails as $email ){
                $message = new YiiMailMessage;
                $message->setBody($mail, 'text/html');
                $message->subject = 'Важные новости - Этафета вузовской науки';
                $message->from = Yii::app()->params['adminEmail'];
                $message->addTo($email->EMAIL);
                if(!Yii::app()->mail->send($message)){
                    $cheker++;
                }
            }

        }
        else{
            $email = Users::model()->findByPk($user_id);

            $message = new YiiMailMessage;
            $message->setBody($mail, 'text/html');
            $message->subject = 'Важные новости - Этафета вузовской науки';
            $message->from = Yii::app()->params['adminEmail'];
            $message->addTo($email->EMAIL);
            if(!Yii::app()->mail->send($message)){
                $cheker++;
            }
        }
        if($cheker != 0 ){
            echo json_encode('fail');  Yii::app()->end();
        }else{
            echo json_encode('ok');  Yii::app()->end();
        }
    }

    /**
     * Метод для отрисовки таблицы новостей
     */
    public function actionNewsList(){
        $columns = array('id','title','content');

        $cols = array( 'id:number:#', 'title:text:Заголовок',
            array(
                'name'=>'Текст',
                'type'=>'text',
                'value'=>'substr($data->content  , 0, 150).\'... \'',
            ),
            array(
                'name'=>'mail',
                'type'=>'raw',
                'value'=>'Yii::app()->controller->widget(\'editable.Editable\', array(
                                    \'type\'      => \'select\',
                                    \'name\'      => $data[\'id\'],
                                    \'htmlOptions\' => array(\'class\'=>\'ExpEdit\'),
                                    \'pk\'        => $data[\'id\'],
                                    \'text\'       => \'Отправить\',
                                    \'url\'       => Yii::app()->createUrl(\'Autorized/sendNewsMail\'),
                                    \'source\'    => array( \'Manager\'=>\'Руководители\' ,\'Exp\' => \'Эксперт0\', \'Exp1\' => \'Эксперт1\', \'Exp2\' => \'Эксперт2\', \'Exp3\' => \'Эксперт3\'),
                                    \'title\'     => \'Адресат рассылки\',
                                    \'placement\' => \'top\',
                                    \'options\' => array( \'disabled\'=>false,  \'showbuttons\'=>false),  ),true);',
            ),
        );

        $criteria = new CDbCriteria;

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('content', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('NewsStorage', $columns);
        $sort->defaultOrder = 'id';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('NewsStorage', array(
            'criteria'      => $criteria,
            'pagination'    => $pagination,
            'sort'          => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id'            => 'NewsStorage',
            'dataProvider'  => $dataProvider,
            'ajaxUrl'       => $this->createUrl('NewsList'),
            'columns'       => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => 'Обновить'),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_NewsList', array('widget' => $widget,),false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы оповещений
     */
    public function actionNotifiesList(){
        $columns = array('id','title','text','address');

        $cols = array( 'id:number:#', 'title:text:Заголовок','text:text:Текст','address:text:Адресат','user_id:number:ID пользователя',
            array(
                'class' => 'EButtonColumn',
                'template' => '{edit}&nbsp;{delete}',
                'buttons' => array(

                    'edit' => array(
                        'label'=> 'Редактировать',
                        'url' => '',
                    ),
                    'delete' => array(
                        'url' => 'Yii::app()->createUrl("/delete/$data->id")',
                    ),
                ),
            ),
        );

        $criteria = new CDbCriteria;

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('text', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('NotificationStorage', $columns);
        $sort->defaultOrder = 'id';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('NotificationStorage', array(
            'criteria'      => $criteria,
            'pagination'    => $pagination,
            'sort'          => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id'            => 'NotificationStorage',
            'dataProvider'  => $dataProvider,
            'ajaxUrl'       => $this->createUrl('NotifiesList'),
            'columns'       => $cols,
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_NotifiesList', array('widget' => $widget,),false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }


    /**
     * Метод для отрисовки таблицы Эксертов
     */
    public function actionExpertsList(){

        $columns = array('id','AVATAR','EMAIL','F_NAME','L_NAME','S_NAME','ID_DISTRICT','ID_UNIVER','ID_STAGE','roles');

        $cols = array(
            array(
                'name'=>'id',
                'type'=>'raw',
                'value'=>'$data->id',
                'htmlOptions' => array('style' => 'text-align: left; width: 40px;')
            ),
            array(
                'name'=>'Фото',
                'type'=>'html',
                'value'=>'CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_\'.$data->AVATAR,"",array("style"=>"width:40px;height:40px;"))',

            ),
            'EMAIL:text:email','F_NAME:text:Фамилия','L_NAME:text:Имя','S_NAME:text:Отчество',

            array(
                'name'=>'ID_DISTRICT',
                'type'=>'text',
                'value'=>'$this->getDistrict($data->ID_DISTRICT)',
            ),
            array(
                'name'=>'ID_UNIVER',
                'type'=>'raw',
                'value'=>'$this->getUniver($data->ID_UNIVER)',
            ),

            array(
                'name'=>'ID_STAGE',
                'type'=>'raw',

                'value'=>'Yii::app()->controller->widget(\'editable.Editable\', array(
                                    \'type\'      => \'select\',
                                    \'name\'      => \'ID_STAGE\',
                                    \'htmlOptions\' => array(\'class\'=>\'ExpEdit\'),
                                    \'pk\'        => $data[\'id\'],
                                    \'text\'      => (is_null($data->ID_STAGE)? \'не выбрано\' : CHtml::encode($this->getStage($data->ID_STAGE))),
                                    \'url\'       => Yii::app()->createUrl(\'Autorized/updateProfile\'),
                                    \'source\'    => $this->getStagesList(),
                                    \'title\'     => \'Выберите платформу\',
                                    \'placement\' => \'top\',
                                    \'options\' => array( \'disabled\'=>false,  \'showbuttons\'=>false),  ),true);',
            ),
            array(
                'name'=>'roles',
                'type'=>'raw',

                'value'=>'Yii::app()->controller->widget(\'editable.Editable\', array(
                                    \'type\'      => \'select\',
                                    \'name\'      => \'roles\',
                                    \'htmlOptions\' => array(\'class\'=>\'ExpEdit\'),
                                    \'pk\'        => $data[\'id\'],
                                    \'text\'      => CHtml::encode($this->getRole($data->roles)),
                                    \'url\'       => Yii::app()->createUrl(\'Autorized/updateProfile\'),
                                    \'source\'    => array( \'Exp\' => \'Эксперт0\', \'Exp1\' => \'Эксперт1\', \'Exp2\' => \'Эксперт2\', \'Exp3\' => \'Эксперт3\'),
                                    \'title\'     => \'Выберите роль\',
                                    \'placement\' => \'top\',
                                    \'options\' => array( \'disabled\'=>false,  \'showbuttons\'=>false),  ),true);',
            ),


        );

        $criteria = new CDbCriteria;
        $criteria->condition =  "roles='Exp' OR roles='Exp1' OR roles='Exp2' OR roles='Exp3' AND AKTIV_KEY='100'";

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('L_NAME', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('Users', $columns);
        $sort->defaultOrder = 'id';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria'      => $criteria,
            'pagination'    => $pagination,
            'sort'          => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id'            => 'Experts',
            'dataProvider'  => $dataProvider,
            'ajaxUrl'       => $this->createUrl('ExpertsList'),
            'columns'       => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt',"Refresh")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_ExpertsList', array('widget' => $widget,),false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы Представителей
     */
    public function actionManagersList(){

        $columns = array('id','AVATAR','F_NAME','L_NAME','S_NAME','ID_DISTRICT','ID_UNIVER','ID_STAGE');

        $cols = array(
            array(
                'name'=>'id',
                'type'=>'raw',
                'value'=>'$data->id',
                'htmlOptions' => array('style' => 'text-align: left; width: 40px;')
            ),
            array(
                'name'=>'Фото',
                'type'=>'html',
                'value'=>'CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_\'.$data->AVATAR,"",array("style"=>"width:40px;height:40px;"))',

            ),
            'F_NAME:text:Фамилия','L_NAME:text:Имя','S_NAME:text:Отчество',

            array(
                'name'=>'ID_DISTRICT',
                'type'=>'text',
                'value'=>'$this->getDistrict($data->ID_DISTRICT)',
            ),
            array(
                'name'=>'ID_UNIVER',
                'type'=>'text',
                'value'=>'$this->getUniver($data->ID_UNIVER)',
            ),
            array(
                'name'=>'ID_STAGE',
                'type'=>'text',
                'value'=>'$this->getStageFromProject($data->id)',
            ),

        );

        $criteria = new CDbCriteria;
        $criteria->condition =  "roles='Manager'  AND AKTIV_KEY='100'";

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('L_NAME', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('Users', $columns);
        $sort->defaultOrder = 'id';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria'      => $criteria,
            'pagination'    => $pagination,
            'sort'          => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id'            => 'Managers',
            'dataProvider'  => $dataProvider,
            'ajaxUrl'       => $this->createUrl('ManagersList'),
            'columns'       => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt',"Refresh")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_ManagersList', array('widget' => $widget,),false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }



    /**
     * Метод для отрисовки таблицы Проектов экспертам
     */
    public function actionExpertProjectsList(){

        $columns = array('ID_PROJECT','NAME','ID_DISTRICT','ID_UNIVER','ID_STAGE','status');

        $cols = array(
            array(
                'name'=>'ID_PROJECT',
                'type'=>'number',
                'value'=>'$data->ID_PROJECT',
                'htmlOptions'=>array('class'=> 'text-left')
            ),
            'NAME:text:Название',


            array(
                'name'=>'ID_DISTRICT',
                'type'=>'text',
                'value'=>'$this->getDistrict( $data->ID_DISTRICT)',
            ),
            array(
                'name'=>'ID_UNIVER',
                'type'=>'text',
                'value'=>'$this->getUniver($data->ID_UNIVER)',
            ),
            array(
                'name'=>'ID_STAGE',
                'type'=>'text',
                'value'=>'$this->getStage($data->ID_STAGE)',
            ),
            array(
                'name'=>'status',
                'type'=>'text',
                'value'=>'$this->getStatus($data->ID_PROJECT)',
            ),
//            array(
//                'htmlOptions' => array('style' => 'width: 100px; text-align:center;'),
//                'filterHtmlOptions' => array('style' => 'width: 100px;'),
//                'class' => 'EButtonColumn',
//                'template' => '{pdf_pr}&nbsp;{pdf_an}',
//                'evaluateID'=>true,
//                'buttons' => array(
//
////                    'email' => array
////                    (
////                        'label'=>'Send an e-mail to this user',
////                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/email.png',
////                        'click'=>"function(){
////                                    $.fn.yiiGridView.update('user-grid', {
////                                        type:'POST',
////                                        url:$(this).attr('href'),
////                                        success:function(data) {
////                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
////
////                                              $.fn.yiiGridView.update('user-grid');
////                                        }
////                                    })
////                                    return false;
////                              }
////                     ",
////                        'url'=>'Yii::app()->controller->createUrl("email",array("id"=>$data->primaryKey))',
////                    ),
//                    'pdf_pr' => array(
//                        'label'=> 'PDF Проекта',
//                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/pdf_pr.png',
//                        'url' => 'Yii::app()->baseUrl."/uploads/".$data->ROADMAP_PROJECT',
//                        'options'=>array(
//                            'target'=>'_blank',
//                            'id'=>'"button_for_id_1".$data->ID_PROJECT ',
//
//                        ),
//
//                    ),
//                    'pdf_an' => array(
//                        'label'=> 'PDF Аннотации',
//                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/pdf_an.png',
//                        'url' => 'Yii::app()->baseUrl."/uploads/".$data->ROADMAP_PROJECT',
//                        'options'=>array(
//                            'target'=>'_blank',
//                            'id'=>'"button_for_id_1".$data->ID_PROJECT ',
//
//                        ),
//                    ),
//                ),
//            ),

        );



        /** Критерий поиска проектов по ролям  */
        $criteria = $this->getProjectByCriteria();

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('NAME', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('ProjectRegistry', $columns);
        $sort->defaultOrder = 'ID_PROJECT';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('ProjectRegistry', array(
            'criteria'      => $criteria,
            'pagination'    => $pagination,
            'sort'          => $sort,
        ));

        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id'            => 'ProjectRegistry',
            'dataProvider'  => $dataProvider,
            'ajaxUrl'       => $this->createUrl('ExpertProjectsList'),
            'columns'       => $cols,

            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt',"Обновить")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_ExpertProjectsList', array('widget' => $widget,),false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы Представителей
     */
    public function actionJuliaList(){

        $columns = array('ID_UNIVER','ID_DISTRICT');

        $cols = array(

            array(
                'name'=>'ID_UNIVER',
                'type'=>'text',
                'value'=>'$this->getUniver($data->ID_UNIVER)',
            ),
            array(
                'name'=>'ID_DISTRICT',
                'type'=>'text',
                'value'=>'$this->getDistrict($data->ID_DISTRICT)',
            ),

            array(
                'name'=>'Эксперты',
                'type'=>'text',
                'value'=>'$data->ExpCount',
            ),
            array(
                'name'=>'Проекты',
                'type'=>'text',
                'value'=>'$data->ProjCount',
            ),

        );

        $criteria = new CDbCriteria;
        $criteria->select = 't.ID_UNIVER ,t.ID_DISTRICT ,
        (SELECT COUNT(DISTINCT id) FROM `m_w_users` WHERE roles IN ("Exp","Exp1","Exp2","Exp3") AND ID_UNIVER = t.ID_UNIVER ) as ExpCount,
        (SELECT COUNT(DISTINCT id) FROM m_w_users as u  Where roles IN ("Manager") AND ID_UNIVER = t.ID_UNIVER ) as ProjCount';
        $criteria->condition =  "AKTIV_KEY='100' AND ID_UNIVER is not NULL AND ID_DISTRICT is not NULL";
        $criteria->group = 'ID_UNIVER';

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('ID_DISTRICT', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('Users', $columns);

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria'      => $criteria,
            'pagination'    => $pagination,
            'sort'          => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id'            => 'JuliaList',
            'dataProvider'  => $dataProvider,
            'ajaxUrl'       => $this->createUrl('JuliaList'),
            'columns'       => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt',"Refresh")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_JuliaList', array('widget' => $widget,),false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /** Метод получения критериев поиска проектов по ролям  */
    public function getProjectByCriteria(){

        $user = Users::model()->findByPk(Yii::app()->user->id);

        $criteria = new CDbCriteria;
        $criteria->select = 't.ID_PROJECT,t.ROADMAP_PROJECT, t.ID_STAGE, t.NAME, us.ID_DISTRICT, us.ID_UNIVER ';
        $criteria->join = 'LEFT JOIN  `m_w_users` `us` ON us.id = t.ID_REPRESENTATIVE';

        switch(Yii::app()->user->role){

            /** Критерий для эксперта 1 уровня (по универу) */
            case 'Exp' :
                $criteria->condition = 'us.ID_UNIVER = :univ AND FIRST_LAVEL_APPROVAL = 1' ;
                $criteria->params = array(":univ" => $user['ID_UNIVER']);
                break;

            /** Критерий для эксперта 1 уровня (по универу) */
            case 'Exp1' :
                $criteria->condition = 'us.ID_UNIVER = :univ AND FIRST_LAVEL_APPROVAL = 1 OR us.ID_UNIVER = :univ AND FIRST_LAVEL_APPROVAL = 9 OR us.ID_UNIVER = :univ AND FIRST_LAVEL_APPROVAL = 3' ;
                $criteria->params = array(":univ" => $user['ID_UNIVER']);
                break;

            /** Критерий для эксперта 2 уровня (по платформе и округу)*/
            case 'Exp2' :
                $criteria->condition = 't.ID_STAGE = :stage AND us.ID_DISTRICT = :dist';
                $criteria->params = array(":stage" => $user['ID_STAGE'], ":dist" => $user['ID_DISTRICT']);
                break;

            /** Критерий для эксперта 3 уровня (по платформе) */
            case 'Exp3' :
                $criteria->condition = 't.ID_STAGE = :stage';
                $criteria->params = array(":stage" => $user['ID_STAGE']);
                break;

            /** Критерий для разработчика */
            case 'Dev' :
                break;
        }

        return $criteria;
    }


    public function actionGetSpecialities(){
        echo CJSON::encode(Editable::source(Speciality::model()->findAll(), 'ID_SPECIALITY', 'NAME'));
    }
    public function actionGetUniversities(){

     $district = Users::model()->find('id='.Yii::app()->user->id);
     $d = $district->ID_DISTRICT;
        echo CJSON::encode(Editable::source(University::model()->findAll('ID_DISTRICT='.$d), 'ID_UNIVER', 'NAME_UNIVER'));
    }
    public function actionGetDistricts(){
        echo CJSON::encode(Editable::source(District::model()->findAll(), 'ID_DISTRICT', 'NAME'));
    }
    public function actionGetStages(){
        echo CJSON::encode(Editable::source(Stage::model()->findAll(), 'ID_STAGE', 'NAME_STAGE'));
    }
    public function actionGetPhases(){
        echo CJSON::encode(Editable::source(Phase::model()->findAll(), 'ID_PHASE', 'NAME'));
    }

    public function actionGetBudget(){
        echo CJSON::encode(Editable::source(Budget::model()->findAll(), 'ID_BUDGET', 'NAME'));
    }
    public function actionGetBrowser(){
        echo Browser::getBrowsers();
    }

    /**
     * Метод получения аватара
     * @return string
     */
    public function getAvatar(){
        if(is_null(Yii::app()->user->getState('ava'))){
            $ava = 'new.png';
        }
        else{ $ava = 'thumb_'.Yii::app()->user->ava;
        }

        return $ava;
    }


    /**
     * Метод показывающий кол-во дней в проекте
     * @param $date
     * @return int
     */
    public function DaysIn($date){
        $dnei_nazad = (int)((strtotime($date) - time())/86400) * -1;
        return $dnei_nazad;
    }

    /**
     * Метод преобразующий роль пользователя в профиле
     * @param $role
     * @return string
     */
    public function cleanRole($role){
        switch($role){
            case 'Dev': $clean_role = 'Разработчик'; break;
            case 'Manager': $clean_role = 'Руководитель проекта'; break;
            case 'Exp':
            case 'Exp1':
            case 'Exp2':
            case 'Exp3': $clean_role = 'Эксперт'; break;
        }
        return $clean_role;
    }

    /**
     * Метод формирующий номер Проекта
     * @param $id
     * @return string
     */
    public function MakeOrder($id){
        if(strlen($id)==1){$order = '000'.$id;}
        if(strlen($id)==2){$order = '00'.$id;}
        if(strlen($id)==3){$order = '0'.$id;}
        if(strlen($id)==4){$order = $id;}
        return $order;
    }

    public function statusOk(){
        return '<i class="fa fa-check" style="color:green;"></i>';
    }

    public  function statusFail(){
        return '<i class="fa fa-times"></i>';
    }

    public function statusSpinner(){
        return '<i class="fa fa-spinner fa-spin"></i>';
    }
}