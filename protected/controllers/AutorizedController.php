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
            "sEmptyTable" => "Не найдено ничегошеньки",
            'sProcessing' => 'Загрузка...',
            'sInfo' => 'Показано от _START_ до _END_ из общих _TOTAL_',
            'sLengthMenu' => 'показано _MENU_ записей',
            'sSearch'=>'поиск',
            'sRefresh'=>'обновить',
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
                'actions'=>array('index','dashboard', 'profile','info','news','project','statistics','projects','experts','manageNotifies','manageNews','manageUsers','lockScreen'),
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

    /**
     * Главный метод страницы управления пользователями
     */
    public function actionManageUsers()
	{

        $criteria_man = new CDbCriteria();
        $criteria_man->condition = "roles='Manager' ";

        $count_man = Users::model()->count($criteria_man);
        $pages_man = new CPagination($count_man);
        $pages_man->pageSize = 10;
        $pages_man->applyLimit($criteria_man);

        $sort_man = new CSort();
        $sort_man->attributes = array('id','F_NAME','L_NAME','S_NAME','EMAIL','roles');
        $sort_man->applyOrder($criteria_man);

        $managers = Users::model()->findAll($criteria_man);


        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria' => $criteria_man,

            'pagination' => array(
                'pageSize' => Yii::app()->params['postsPerPage'],
            )
        ));


        $this->render('manage_users', array(
            'manags'=>$managers,
            'pags'=>$pages_man,
            'sortm'=>$sort_man,
            'dataProvider' => $dataProvider,
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

        if(!Yii::app()->user->isGuest){
            $data = $model->findProfileData(Yii::app()->user->id);
            $clean_data=$data[0];

            if(!is_null($clean_data['roles'])){
                $role = $this->cleanRole($data[0]['roles']);
            }

            $perc_prof = $this->CheckInfoPercentage($clean_data);

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
        foreach($arr as $ar_k=>$ar_v){

            if( $ar_k !== 'FIRST_LAVEL_APPROVAL' ||
                $ar_k !== 'SECOND_LAVEL_RATING'  ||
                $ar_k !== 'THIRD_LAVEL_RATING'   ){
                if(empty($ar_v) || $ar_v == "" || $ar_v == " " || is_null( $ar_v) ){
                    $key++;
                }
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
                var_dump($i_k);
                Yii::app()->end();

                echo json_encode('fail'); Yii::app()->end();  }
        }

        foreach ($proj_info[0] as $in_k=>$in_v) {

            if($in_k == 'FIRST_LAVEL_APPROVAL' || $in_k == 'FIRST_LAVEL_COMMENT' || $in_k == 'SECOND_LAVEL_RATING' || $in_k == 'THIRD_LAVEL_RATING' || $in_k == 'LONG_BUDGET' || $in_k == 'PRIVACY_P' ){
                $in_v = 'not_count';
            }
            if($in_v == null || $in_v == '' || $in_v == ' '){

                var_dump($i_k);
                Yii::app()->end();
                echo json_encode('fail'); Yii::app()->end();   }
        }



        $_POST['pk']=  $proj_info[0]['id'];
        $_POST['name']= 'FIRST_LAVEL_APPROVAL';
        $_POST['value']= '1';

        $this->forward('Autorized/updateProject',false);
        echo json_encode('ok');
            Yii::app()->end();

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
                'class' => 'EButtonColumn',
                'template' => '{edit}&nbsp;{delete}',
                'buttons' => array(

                    'edit' => array(
                        'label'=> 'Редактировать',
                        //здесь должен быть url для редактирования записи
                        'url' => '',
                    ),
                    'delete' => array(
                        //здесь должен быть url для удаления записи
                        'url' => 'Yii::app()->createUrl("/delete/$data->id")',
                    ),
                ),
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
//        $criteria->condition =  "roles='Manager' ";

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


        $columns = array('id','F_NAME','L_NAME','S_NAME','ID_DISTRICT','ID_UNIVER','ID_STAGE','roles');

        $cols = array(
           'id:number:#', 'F_NAME:text:Фамилия','L_NAME:text:Имя','S_NAME:text:Отчество',

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
                'value'=>'$this->getStage($data->ID_STAGE)',
            ),
            array(
                'name'=>'roles',
                'type'=>'text',
                'value'=>'$this->getRole($data->roles)',
            ),

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

        $columns = array('id','F_NAME','L_NAME','S_NAME','ID_DISTRICT','ID_UNIVER','ID_STAGE');

        $cols = array(
           'id:number:#', 'F_NAME:text:Фамилия','L_NAME:text:Имя','S_NAME:text:Отчество',

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
                'value'=>'$this->getStage($data->ID_STAGE)',
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

        $columns = array('ID_PROJECT','NAME','ID_DISTRICT','ID_UNIVER','ID_STAGE');

        $cols = array(
           'ID_PROJECT:number:#',
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
                'name'=>'Статус',
                'type'=>'text',
                'value'=>'$this->getStatus($data->ID_PROJECT)',
            ),
            array(
                'htmlOptions' => array('style' => 'width: 100px; text-align:center;'),
                'filterHtmlOptions' => array('style' => 'width: 100px;'),
                'class' => 'EButtonColumn',
                'template' => '{pdf_pr}&nbsp;{pdf_an}',
                'evaluateID'=>true,
                'buttons' => array(

//                    'email' => array
//                    (
//                        'label'=>'Send an e-mail to this user',
//                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/email.png',
//                        'click'=>"function(){
//                                    $.fn.yiiGridView.update('user-grid', {
//                                        type:'POST',
//                                        url:$(this).attr('href'),
//                                        success:function(data) {
//                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
//
//                                              $.fn.yiiGridView.update('user-grid');
//                                        }
//                                    })
//                                    return false;
//                              }
//                     ",
//                        'url'=>'Yii::app()->controller->createUrl("email",array("id"=>$data->primaryKey))',
//                    ),
                    'pdf_pr' => array(
                        'label'=> 'PDF Проекта',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/pdf_pr.png',
                        'url' => 'Yii::app()->baseUrl."/uploads/".$data->ROADMAP_PROJECT',
                        'options'=>array(
                            'target'=>'_blank',
                            'id'=>'"button_for_id_1".$data->ID_PROJECT ',

                        ),

                    ),
                    'pdf_an' => array(
                        'label'=> 'PDF Аннотации',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/pdf_an.png',
                        'url' => 'Yii::app()->baseUrl."/uploads/".$data->ROADMAP_PROJECT',
                        'options'=>array(
                            'target'=>'_blank',
                            'id'=>'"button_for_id_1".$data->ID_PROJECT ',

                        ),
                    ),
                ),
            ),
            array(
                'htmlOptions' => array('style' => 'width: 120px;  text-align:center; '),
                'filterHtmlOptions' => array('style' => 'width: 120px;'),
                'class' => 'EButtonColumn',
                'template' => '{check}&nbsp;{delete}',
                'buttons' => array(
                    'check' => array(
                        'label'=> 'Подтвердить',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/check.png',
                        'url' => '',
                    ),
//                    'edit' => array(
//                        'label'=> 'Редактировать',
//                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/edit.png',
//                        'url' => '',
//                    ),
                    'delete' => array(
                        'label'=> 'Заблокировать',
                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/buttons/delete.png',
                        'url' => 'Yii::app()->createUrl("/delete/$data->ID_PROJECT")',
                    ),
                ),
            ),
        );
        $user = Users::model()->findByPk(Yii::app()->user->id);


        /** Критерий поиска проектов по ролям  */
        $criteria = new CDbCriteria;
        $criteria->select = 't.ID_PROJECT,t.ROADMAP_PROJECT, t.ID_STAGE, t.NAME, us.ID_DISTRICT, us.ID_UNIVER ';
        $criteria->join = 'LEFT JOIN  `m_w_users` `us` ON us.id = t.ID_REPRESENTATIVE';

        switch(Yii::app()->user->role){

            /** Критерий для эксперта 1 уровня (по универу) */
            case 'Exp1' :
                $criteria->condition = 'us.ID_UNIVER = :univ AND FIRST_LAVEL_APPROVAL = 1' ;
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
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt',"Refresh")),
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
                'value'=>'$data->ExpCount)',
            ),
            array(
                'name'=>'Проекты',
                'type'=>'text',
                'value'=>'$data->ProjCount)',
            ),

        );

        $criteria = new CDbCriteria;
        $criteria->select = '  t.ID_PROJECT,t.ROADMAP_PROJECT, t.ID_STAGE, t.NAME, us.ID_DISTRICT, us.ID_UNIVER ';
        $criteria->condition =  "roles='Manager'  AND AKTIV_KEY='100'";

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('L_NAME', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('Users', $columns);
//        $sort->defaultOrder = 'id';

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