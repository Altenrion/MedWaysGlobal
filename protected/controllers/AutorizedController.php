<?php

class AutorizedController extends Controller
{

    use MyTraits;

    public $layout = '//layouts/Cabinet';

    public $defaultAction = 'index';

    public $TableOptions = array(
        'bStateSave' => false,
        'bPaginate' => true,
        'oLanguage' => array(
            "sEmptyTable" => "Записей не найдено",
            'sProcessing' => 'Загрузка...',
            'sInfo' => 'Показано от _START_ до _END_ из общих _TOTAL_',
            'sLengthMenu' => ' _MENU_ записей на странице',
            'sSearch' => 'поиск',
            'sRefresh' => 'обновить',
            'sZeroRecords' => 'Записей нет',
            'sInfoEmpty' => 'Показано 0 записей',
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
                'actions' => array('index', 'dashboard', 'profile', 'info', 'news', 'project', 'statistics', 'projects', 'experts', 'manageNotifies', 'manageNews', 'manageUsers', 'lockScreen', 'updateProject', 'updateProfile'),
                'users' => array('?'),
            ),
            array('allow',
                'actions' => array('profile', 'news', 'info', 'project'),
                'roles' => array('Dev', 'Manager', 'Exp', 'Exp1', 'Exp2', 'Exp3', 'Moder', 'Moder1', 'Admin'),
            ),
            array('allow',
                'actions' => array('project', 'statistics'),
                'roles' => array('Manager'),
            ),
            array('allow',
                'actions' => array('dashboard', 'manage_news', 'manage_notifies'),
                'roles' => array('Dev'),
            ),
            array('allow',
                'actions' => array('projects', 'statistics', 'mailsCrosslist'),
                'roles' => array('Moder1', 'Exp1', 'Exp2', 'Exp3', 'Dev', 'Admin',),
            ),
            array('deny',
                'actions' => array('index', 'dashboard', 'profile', 'info', 'news', 'project', 'statistics', 'projects'),
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionUpdatePass(){
        if (isset($_POST['oldPass'])) {



            $oldPass = $_POST['oldPass'];
            $newPass = $_POST['newPass'];

            $user = Yii::app()->user;

            $db_user = Users::model()->findByAttributes(array('EMAIL' => $user->email));
            if($db_user){

                $encryptedPass = $db_user::encrypting($oldPass);
                if($encryptedPass !== $db_user->password){
                    echo json_encode(array("status"=>"fail", "pass"=>$encryptedPass));
                    Yii::app()->end();
                }

                $new_password = $newPass;
                $db_user->password = $new_password;
                $db_user->updated_pass = 1;
                $db_user->updated_date = date("Y-m-d H:i:s");

                if ($db_user->save()) {


                    $tpl_file = Yii::getPathOfAlias('webroot.downloads') . DIRECTORY_SEPARATOR . 'mail_mail.php';
                    $tpl = file_get_contents($tpl_file);
                    $mail = $tpl;

                    $title = "Изменение пароля";
                    $content = "Здравствуйте $db_user->L_NAME $db_user->S_NAME! Ваш пароль успешно изменен.  
                    Ваш новый пароль : $new_password. <br/><br/> Желаем успехов в эстафете.";

                    $mail = strtr($mail, array(
                        "{title}" => $title,
                        "{content}" => $content,
                    ));
                    $message = new YiiMailMessage;
                    $message->setBody($mail, 'text/html');
                    $message->subject = 'Vuznauka 2018 - Изменение пароля';
                    $message->addTo($db_user->EMAIL);
                    $message->from = Yii::app()->params['adminEmail'];

                    Yii::app()->mail->send($message);

                    Yii::app()->user->logout();

                    echo json_encode(array("status"=>"success")); die();
                }
            }
        }
        echo json_encode(array("status"=>"error"));
        Yii::app()->end();

    }


    public function actionStatistics()
    {
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_GET['chart'])) {

                $chart = new RegistrationChart();
                $chart_data = $chart->compileJsonData();

                echo CJSON::encode($chart_data);
                Yii::app()->end();
            }

            echo CJSON::encode('hi');
            Yii::app()->end();
        }
        $charts = new StatisticCharts();

        $topFive = $charts->getUniversData();
        $stagesData = $charts->getStagesData();
        $managersData = $charts->getManagersData();
        $moneyData = $charts->getMoneyData();
        $projectsTableInfo = $this->getProjRegInfo();
        $projectgetExpFinalDisposition = $this->getProjExpFinalDisposition();

        $this->render('statistics', array(
            'topUnivers' => $topFive,
            'stagesData' => $stagesData,
            'managersData' => $managersData,
            'moneyData' => $moneyData,
            'projData' => $projectsTableInfo,
            'projectgetExpFinalDisposition' => $projectgetExpFinalDisposition
        ));
    }

    public function getProjRegInfo()
    {
        $total_districts = Yii::app()->db->createCommand("SELECT * from m_w_district limit 8")->queryAll();


        $sql_for_projects = "SELECT st.NAME_STAGE as ' ',";
        foreach ($total_districts as $total_district) {
            $total_projects_strings[] = "
            (SELECT count(*) 
                FROM m_w_project_registry as pr
                LEFT JOIN m_w_users as u ON pr.ID_REPRESENTATIVE = u.id
                where u.id IS NOT NULL
            AND pr.ID_STAGE = st.ID_STAGE
            AND u.ID_DISTRICT = {$total_district['ID_DISTRICT']}
            AND u.REG_DATE > '". Yii::app()->params['eventStartDate']."'
            ) as '{$total_district['NAME']}'";

            $pushed_projects_strings[] = "
            (SELECT count(*) 
                FROM m_w_project_registry as pr
                LEFT JOIN m_w_users as u ON pr.ID_REPRESENTATIVE = u.id
                where u.id IS NOT NULL
            AND pr.ID_STAGE = st.ID_STAGE
            AND pr.FIRST_LAVEL_APPROVAL = 3
            AND u.ID_DISTRICT = {$total_district['ID_DISTRICT']}
            AND u.REG_DATE > '". Yii::app()->params['eventStartDate']."'
            ) as '{$total_district['NAME']}'";

            $verified_projects_strings[] = "
            (SELECT count(*) 
                FROM m_w_project_registry as pr
                LEFT JOIN m_w_users as u ON pr.ID_REPRESENTATIVE = u.id
                where u.id IS NOT NULL
            AND pr.ID_STAGE = st.ID_STAGE
            AND pr.FIRST_LAVEL_APPROVAL = 3
            AND pr.SECOND_LAVEL_RATING IS NOT NULL
            AND u.ID_DISTRICT = {$total_district['ID_DISTRICT']}
            AND u.REG_DATE > '". Yii::app()->params['eventStartDate']."'
            ) as '{$total_district['NAME']}'";

        }
        $sql_for_total_projects = $sql_for_projects . implode(",", $total_projects_strings) . " from m_w_stage as st";
        $sql_for_pushed_projects_projects = $sql_for_projects . implode(",", $pushed_projects_strings) . " from m_w_stage as st";
        $sql_for_verified_projects_projects = $sql_for_projects . implode(",", $verified_projects_strings) . " from m_w_stage as st";


        $total_projects = Yii::app()->db->createCommand($sql_for_total_projects)->queryAll();
        $pushed_projects = Yii::app()->db->createCommand($sql_for_pushed_projects_projects)->queryAll();
        $verified_projects = Yii::app()->db->createCommand($sql_for_verified_projects_projects)->queryAll();

        foreach ($total_projects as $k => $row) {
            foreach ($row as $kk => $item) {
                if (is_numeric($item)) {
                    $total_projects[$k][$kk] = $total_projects[$k][$kk] . " / " . $pushed_projects[$k][$kk] . " / " . $verified_projects[$k][$kk];
                }
            }
        }

        return $total_projects;

    }

    public function getProjExpFinalDisposition()
    {

        for ($district = 1; $district <= 8; $district++) {
            for ($platform = 1; $platform <= 14; $platform++) {
                $criteriaConditionArray[] = "(SELECT ID_PROJECT FROM `m_w_project_registry` as pr
                        JOIN m_w_users as u ON pr.ID_REPRESENTATIVE = u.id
                        WHERE SECOND_LAVEL_RATING IS NOT NULL   
                        AND pr.REG_DATE > '". Yii::app()->params['eventStartDate']."'
                        AND u.ID_DISTRICT = " . $district . "
                        AND pr.ID_STAGE = " . $platform . "
                        ORDER BY SECOND_LAVEL_RATING DESC LIMIT 3) ";
            }
        }
        $projects_ids = Yii::app()->db->createCommand(implode(" UNION ", $criteriaConditionArray))->queryAll();

        $ids = array();
        if (!empty($projects_ids)) {
            foreach ($projects_ids as $projects_id) {
                $ids[] = $projects_id['ID_PROJECT'];
            }
        }

        $sql_for_projects = "SELECT st.NAME_STAGE as 'платформа', 
        (SELECT count(*) 
        	FROM m_w_project_registry as pr
            	LEFT JOIN m_w_users as u ON pr.ID_REPRESENTATIVE = u.id
                where u.id IS NOT NULL
                AND pr.ID_STAGE = st.ID_STAGE
                AND pr.FIRST_LAVEL_APPROVAL = 3
                AND pr.SECOND_LAVEL_RATING IS NOT NULL
                AND u.ID_DISTRICT IN (1,2,3,4,5,6,7,8)
                AND pr.ID_PROJECT IN (" . implode(" , ", empty($ids)? array(1):$ids) . ")
                AND u.REG_DATE > '". Yii::app()->params['eventStartDate']."') 
            	as 'кол-во проектов',
            (SELECT count(*) from m_w_users as u WHERE u.roles = 'Exp3' 
                AND u.ID_STAGE = st.ID_STAGE
             	AND u.AKTIV_KEY = '100'
            	) as 'кол-во фед экспертов'
                       
 			from m_w_stage as st";

        $data = Yii::app()->db->createCommand($sql_for_projects)->queryAll();
        return $data;
    }

    public function getExpertsMarks()
    {
        $sql_for_projects = "SELECT u.F_NAME, u.L_NAME, u.S_NAME, u.EMAIL,
        (SELECT st.NAME_STAGE from m_w_stage as st where st.ID_STAGE = u.ID_STAGE) as stage,
        IFNULL((select count(*) as num 
            from m_w_third_lavel_marks as ma 
            where ma.ID_EXPERT = u.id 
            and ma.ID_PROJECT IN (
                SELECT reg.ID_PROJECT from m_w_project_registry as reg 
                where reg.REG_DATE >  '".Yii::app()->params['eventStartDate']."'
            )
            GROUP BY ma.ID_EXPERT), 0) 
        as marks
        FROM m_w_users as u
        WHERE u.roles = 'Exp3' AND u.AKTIV_KEY = '100'";

        $data = Yii::app()->db->createCommand($sql_for_projects)->queryAll();
        return $data;
    }

    public function actionExportExpertsMarks()
    {

        $data[] = array('Список экспертов', 'email', 'платформа', 'кол-во проверенных проектов');

        foreach ($this->getExpertsMarks() as $list) {
            $data[] = array($list['F_NAME'] . ' ' . $list['L_NAME'] . ' ' . $list['S_NAME'], $list['EMAIL'], $list['stage'], $list['marks']);
        }
        Yii::import('application.extensions.phpexcel.JPhpExcel');

        $xls = new JPhpExcel('UTF-8', false, 'Main page');
        $xls->addArray($data);
        $xls->generateXML('Federal-experts-activity-' . date('Y-m-d'));

    }

    public function actionExportExpertsMarksDetails()
    {
        $export_content = Yii::app()->getRequest()->getParam('content');

        $total_stages = Yii::app()->db->createCommand("SELECT * from m_w_stage")->queryAll();

        foreach ($total_stages as $k => $stage) {

            $data[] = array($stage['NAME_STAGE']);

            switch ($export_content) {
                case 'marks'    :
                    $stage_marks = $this->getFederalMarksForStage($stage['ID_STAGE']);
                    break;
                case 'comments' :
                    $stage_marks = $this->getFederalCommentsForStage($stage['ID_STAGE']);
                    break;
            }

            if(empty($stage_marks)){
                continue;
            }
            $data[] = array_keys(reset($stage_marks));
            foreach ($stage_marks as $stage_mark) {
                $data[] = $stage_mark;
            }
        }

        Yii::import('application.extensions.phpexcel.JPhpExcel');

        $xls = new JPhpExcel('UTF-8', false, 'Main page');
        $xls->addArray($data);
        $xls->generateXML('Federal-experts-detailed-' . $export_content . '-' . date('Y-m-d'));

    }


    private function getFederalMarksForStage($stageId)
    {

        $federal_stage_experts = Yii::app()->db->createCommand("SELECT DISTINCT 
            ma.ID_EXPERT as 'id',
            CONCAT(u.F_NAME, ' ', u.L_NAME, ' ', u.S_NAME ) as 'name'
            from m_w_third_lavel_marks as ma
            JOIN m_w_project_registry as pr on pr.ID_PROJECT = ma.ID_PROJECT
            JOIN m_w_users as u on u.id = ma.ID_EXPERT
            
            WHERE u.roles = 'Exp3' 
            AND pr.ID_STAGE= " . $stageId . "
            AND pr.REG_DATE > '". Yii::app()->params['eventStartDate']."' ")->queryAll();

        foreach ($federal_stage_experts as $expert) {
            $projects_sql_strings[] = "MAX(IFNULL((case when ID_EXPERT = " . $expert['id'] . " then ma.TOTAL_MARK end),0)) AS  '" . $expert['name'] . "'";
        }

        $projects_sql = "SELECT 
            ma.ID_PROJECT as 'project id' ,
            pr.NAME as 'project name',
            pr.THIRD_LAVEL_RATING as 'total mark', 
            " . implode(', ', $projects_sql_strings) . "
            
            from m_w_third_lavel_marks as ma
            JOIN m_w_project_registry as pr on pr.ID_PROJECT = ma.ID_PROJECT
            
            WHERE pr.REG_DATE > '". Yii::app()->params['eventStartDate']."' AND pr.THIRD_LAVEL_RATING IS NOT NULL AND pr.ID_STAGE = " . $stageId . "
            GROUP BY ma.ID_PROJECT;";

        $federal_stage_projects = Yii::app()->db->createCommand($projects_sql)->queryAll();

        return $federal_stage_projects;

    }

    private function getFederalCommentsForStage($stageId)
    {
        $federal_stage_experts = Yii::app()->db->createCommand("SELECT DISTINCT 
            ma.ID_EXPERT as 'id',
            CONCAT(u.F_NAME, ' ', u.L_NAME, ' ', u.S_NAME ) as 'name'
            from m_w_third_lavel_marks as ma
            JOIN m_w_project_registry as pr on pr.ID_PROJECT = ma.ID_PROJECT
            JOIN m_w_users as u on u.id = ma.ID_EXPERT
            
            WHERE u.roles = 'Exp3' 
            AND pr.ID_STAGE= " . $stageId . "
            AND pr.REG_DATE > '". Yii::app()->params['eventStartDate']."' ")->queryAll();

        foreach ($federal_stage_experts as $expert) {
            $projects_sql_strings[] = "
            MAX(IFNULL((case when ID_EXPERT = " . $expert['id'] . " then cs.text end),0)) AS  '" . $expert['name'] . "'";
        }

        $projects_sql = "SELECT 
            ma.ID_PROJECT as 'project id' ,
            pr.NAME as 'project name',
            pr.THIRD_LAVEL_RATING as 'total mark', 
            " . implode(', ', $projects_sql_strings) . "
            
            from m_w_third_lavel_marks as ma
            
            JOIN m_w_comment_storage as cs
                on cs.author_id = ma.ID_EXPERT AND cs.project_id = ma.ID_PROJECT
            JOIN m_w_project_registry as pr 
                on pr.ID_PROJECT = ma.ID_PROJECT
            
            WHERE pr.REG_DATE > '". Yii::app()->params['eventStartDate']."' AND pr.THIRD_LAVEL_RATING IS NOT NULL AND pr.ID_STAGE = " . $stageId . "
            GROUP BY ma.ID_PROJECT;";

        $federal_stage_projects = Yii::app()->db->createCommand($projects_sql)->queryAll();

        return $federal_stage_projects;

    }


    public function actionDashboard()
    {

        $this->render('dashboard');
    }

    public function actionExperts()
    {
        $this->render('experts');
    }

    public static function projectViewConf($project, $obj){

        $config = array(
            'mod_one' => '',
            'mod_two' => '',
            'mod_three' => '',
            'mod_four' => '',
            'no_edit' => false,
            'no_buttons' => false,
            'finished' => false
        );

        switch ($project['FIRST_LAVEL_APPROVAL']) {

            case '1':
                $config['mod_one'] = $obj->statusOk();
                $config['mod_two'] = $obj->statusSpinner();
                $config['no_edit'] = true;
                break;
            case '2':
                $config['mod_one'] = $obj->statusSpinner();
                $config['mod_two'] = $obj->statusFail();
                break;
            case '3':
                $config['mod_one'] = $obj->statusOk();
                $config['mod_two'] = $obj->statusOk();
                $config['no_edit'] = true;
                $config['no_buttons'] = true;
                break;
            case '9':
                $config['mod_one'] = $obj->statusFail();
                $config['mod_two'] = $obj->statusFail();
                break;
            default:
                $config['mod_one'] = $obj->statusSpinner();
                $config['mod_two'] = $obj->statusSpinner();
                break;
        }

        $config['mod_three'] = (!is_null($project['SECOND_LAVEL_RATING']) ? $obj->statusOk() : $obj->statusSpinner());
        $config['mod_four'] =  (!is_null($project['THIRD_LAVEL_RATING']) ?  $obj->statusOk() : $obj->statusSpinner());
        $config['finished'] =  ($project['REG_DATE'] <  Yii::app()->params['eventStartDate'] ? true : false);

        return $config;
    }

    public function actionCreateNewProject(){

        $user = Yii::app()->user;

        $active_projects = ProjectRegistry::model()->findAllByAttributes(array('ID_REPRESENTATIVE' => $user->id), 'REG_DATE>:reg_date', array('reg_date'=> Yii::app()->params['eventStartDate']));

        if(!empty($active_projects)){
            echo json_encode(array("status"=>"fail")); die();
        }

        if(empty($active_projects) && in_array($user->role, array('Manager', 'Dev'))) {

            $new_project = new ProjectRegistry();

            $new_project->ID_REPRESENTATIVE = $user->id;

            if($new_project->save()){
                echo json_encode(array("status"=>"success")); die();
            }
        }

        echo json_encode(array("status"=>"error")); die();

    }

    public function actionProject()
    {
        $model = new ProjectRegistry;
        $data = $model->findProjectData(Yii::app()->user->id);

//        var_dump($data); die();

        $this->render('project', array(
            'data' => $data,
            'model' => $model,
        ));
    }

    public function actionUnlockScreen()
    {
        {
            $model = new LoginForm;

            // collect user input data
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login()) {
                    Yii::app()->user->setState('lock', 'unlocked');
                    $this->redirect(Yii::app()->createUrl('Autorized/profile'));
                }
            }
            $this->renderPartial('lockScreen', array('model' => $model));
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
        if (Yii::app()->request->isAjaxRequest) {

            if (Yii::app()->request->getPost('type') == 'news') {
                $news = new News;
                $title = Yii::app()->request->getPost('title');
                $text = Yii::app()->request->getPost('content');

                if ($title != '' && $text != '<p><br></p>') {
                    if ($news->setNews($title, $text)) {
                        echo CJSON::encode('ok');
                        Yii::app()->end();
                    }
                } else {
                    echo CJSON::encode('fail');
                    Yii::app()->end();
                }


            }
            if (Yii::app()->request->getPost('type') == 'notify') {
                $notify = new Notify();

                $address = Yii::app()->request->getPost('address');
                $user_id = Yii::app()->request->getPost('user_id');


                $title = Yii::app()->request->getPost('title');
                $text = Yii::app()->request->getPost('content');

                $type = Yii::app()->request->getPost('notify_type');
                $repeat = Yii::app()->request->getPost('repeat');
                $color = Yii::app()->request->getPost('color');

                if ($title != '' && $text != '<p><br></p>') {
                    if ($notify->SetNotify($address, $user_id, $title, $text, $type, $repeat, $color)) {
                        echo CJSON::encode('ok');
                        Yii::app()->end();
                    }
                } else {
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
    public function setSortColumns(array $columns)
    {
        $this->sortColumns = $columns;
    }

    /**
     * Метод для присваевания полей таблицы. Не используется.
     * @param array $columns
     */
    public function setTableColumns(array $columns)
    {
        $cols = $columns['simple_cols'];

        if (isset($columns['button_cols'])) {
            $button_column = array('class' => 'EButtonColumn');

            $template = '';
            foreach ($columns['button_cols'] as $but_k => $but_v) {
                $template .= '{' . $but_v . '}&nbsp;';
            }
            $button_column['template'] = $template;

            $buttons = array();
            foreach ($columns['button_cols'] as $but_k => $but_v) {

                switch ($but_v) {
                    case 'email'        :
                        $button = array(
                            'label' => '<i class="fa fa-envelope"></i>',
                            'url' => 'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
                            'options' => array(
                                'rel' => 'tooltip',
                                'data-toggle' => 'tooltip',
                                'title' => 'Отправить сообщение',),
                        );
                        break;

                    case 'showNotify'   :
                        $button = array(
                            'label' => '<i class="fa fa-pencil"></i>',
                            'url' => 'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
                            'options' => array(
                                'rel' => 'tooltip',
                                'data-toggle' => 'tooltip',
                                'title' => 'Отправить сообщение',),
                        );
                        break;
                    case  'update'      :
                        $button = array(
                            'label' => ' <a href="#"><i class="fa fa-check bg-green action"></i></a>',
                            'url' => 'Yii::app()->createUrl("/edit/$data->id")',
                        );
                        break;
                    case  'delete'      :
                        $button = array(
                            'url' => 'Yii::app()->createUrl("/delete/$data->id")',
                        );
                        break;
                }
                $buttons[$but_v] = $button;
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

        $projectData = ProjectRegistry::model()->findByPk($Project);
        $managerData = Users::model()->findByPk($projectData->ID_REPRESENTATIVE);
        $criteries = CJSON::decode(CJSON::encode(Creities::model()->findAll()));
        $answers = CrAnswers::model()->findAll();

        foreach ($criteries as $cr_k => $cr_v) {
            $answ[$cr_k] = CJSON::decode(CJSON::encode(CrAnswers::model()->findAll('ID_CRITERIA=' . ++$cr_k)));
        }

        $this->render('manage_project', array(
            'project' => $projectData,
            'manager' => $managerData,
            'criteries' => $criteries,
            'answers' => $answ
        ));
    }

    /**
     * Главный метод страницы управления пользователями
     */
    public function actionManageUsers()
    {

        $this->render('manage_users', array());
    }

    /**
     * Метод блокировки экрана
     */
    public function actionLockScreen()
    {
        Yii::app()->user->setState('lock', 'locked');

        $this->renderPartial('lockScreen');
    }

    public function actionUpdateProject()
    {
        $edit = new EditableSaver('ProjectRegistry');
        $edit->scenario = 'update';
        $edit->update();
    }

    public function actionUpdateProfile()
    {
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

        if (!Yii::app()->user->isGuest) {
            $data = $model->findProfileData(Yii::app()->user->id);

            $clean_data = $data[0];

            if (!is_null($clean_data['roles'])) {
                $role = $this->cleanRole($data[0]['roles']);
            }

            $perc_prof = $this->CheckInfoPercentage($clean_data);

            $perc_proj = $count_quest = $count_proj = '0';

            if ($this->checkRole(array('Moder', 'Moder1', 'Exp', 'Exp1', 'Exp2', 'Exp3'))) {

                $criteria = $this->getProjectByCriteria();
                $proj = ProjectRegistry::model()->findAll($criteria);
                $count_proj = count($proj);

            }

            if ($this->checkRole(array('Dev'))) {
                $data_quest = Questions::model()->findAll();
                $count_quest = count($data_quest);
            }

            if ($this->checkRole(array('Manager'))) {
                $datap = $proj->findProjectData(Yii::app()->user->id);
                $clean_datap = $datap[0];
                $perc_proj = $this->CheckInfoPercentage($clean_datap);
            }

        } else {
            $this->redirect(Yii::app()->createUrl('showCase/login'));

        }
        $this->render('profile', array(
            'data' => $clean_data,
            'model' => $model,
            'role' => $role,
            'messages' => $messsages,
            'perc_prof' => $perc_prof,
            'perc_proj' => $perc_proj,
            'count_quest' => $count_quest,
            'count_proj' => $count_proj,
        ));
    }

    /**
     * Метод для виджета показывающего процент заполненности информации
     *
     * @param $arr
     * @return float
     */
    public function CheckInfoPercentage($arr)
    {
        $key = 0;
        unset($arr['PRIVACY']);

        foreach ($arr as $ar_k => $ar_v) {

            if ($ar_k == 'FIRST_LAVEL_APPROVAL' || $ar_k == 'SECOND_LAVEL_RATING' || $ar_k == 'FIRST_LAVEL_COMMENT' || $ar_k == 'LONG_BUDGET' || $ar_k == 'THIRD_LAVEL_RATING' || $ar_k == 'PRIVACY') {
                $ar_v = 'not_count';
            }

            if (empty($ar_v) || $ar_v == "" || $ar_v == " " || is_null($ar_v)) {
                $key++;

            }
        }

        $num = count($arr);

        $percentage = (($num - $key) / $num) * 100;

        return $percentage;
    }

    /**
     * Метод проверки заполненности данных в профиле и проекте,
     * при регистрации проекта в эстафету.
     */
    public function actionCheckFullInfo()
    {
        $user = new Users();
        $project = new ProjectRegistry();

        $user_info = $user->findProfileData(Yii::app()->user->id);
        $proj_info = $project->findProjectData(Yii::app()->user->id);

        foreach ($user_info[0] as $i_k => $i_v) {
            if ($i_k == 'PRIVACY' || $i_k == 'ID_STAGE' || $i_k == 'AVATAR') {
                $i_v = 'not_count';
            }

            if ($i_v == null || $i_v == '' || $i_v == ' ') {

                echo json_encode('fail');
                Yii::app()->end();
            }
        }

        foreach ($proj_info[0] as $in_k => $in_v) {

            if ($in_k == 'FIRST_LAVEL_APPROVAL' || $in_k == 'FIRST_LAVEL_COMMENT' || $in_k == 'SECOND_LAVEL_RATING' || $in_k == 'THIRD_LAVEL_RATING' || $in_k == 'LONG_BUDGET' || $in_k == 'PRIVACY_P') {
                $in_v = 'not_count';
            }
            if ($in_v == null || $in_v == '' || $in_v == ' ') {

                echo json_encode('fail');
                Yii::app()->end();
            }
        }

        $this->Update('ProjectRegistry', array('pk' => $proj_info[0]['id'],
            'name' => 'FIRST_LAVEL_APPROVAL',
            'value' => '1',
        ));

        echo json_encode('ok');
        Yii::app()->end();

    }

    /** Метод для верификации проектов */
    public function actionVerifyProject()
    {

        $id = Yii::app()->request->getPost('id');
        $status = Yii::app()->request->getPost('status');

        /** проверка на дублирование оценки  */

        $check = ProjectRegistry::model()->find('ID_PROJECT=:id_project', array(
            'id_project' => $id
        ));

        if ($check->FIRST_LAVEL_APPROVAL == 3) {
            echo json_encode('verified');
            Yii::app()->end();
        }

        if (isset($id)) {
            $this->Update('ProjectRegistry', array('pk' => $id,
                'name' => 'FIRST_LAVEL_APPROVAL',
                'value' => $status,
            ));
            echo json_encode('ok');
            Yii::app()->end();
        } else {
            echo json_encode('fail');
            Yii::app()->end();
        }
    }

    /** Метод для оценки проекта Экспертами 2 и 3 ур */
    public function actionEvaluateProject()
    {
        $level = $marks = '';
        if (isset($_POST['level'])) {
            $level = $_POST['level'];
        }

        switch ($level) {
            case 'second':
                $marks_c = 'SecondLavelMarks';
                break;
            case 'third' :
                $marks_c = 'ThirdLavelMarks';
                break;
        }

        /** проверка на дублирование оценки  */
        $check = $marks_c::model()->findAll('ID_EXPERT=:id_expert AND ID_PROJECT=:id_project', array(
            ':id_expert' => Yii::app()->user->id,
            'id_project' => $_POST['id']
        ));

        if (count($check) > 0) {
            echo json_encode('evaluated');
            Yii::app()->end();
        }

        if (isset($_POST['mark_1']) && isset($_POST['mark_10'])) {

            $marks = new $marks_c;
            $marks->ID_EXPERT = Yii::app()->user->id;
            $marks->ID_PROJECT = $_POST['id'];
            unset($_POST['id']);
            unset($_POST['level']);

            foreach ($_POST as $mark_k => $mark_v) {
                $marks->$mark_k = $mark_v;
            }
            $marks->TOTAL_MARK = array_sum($_POST);

            if ($marks->save()) {

                /**  Триггер для подсчета средней оценки в таблицу проектов. */
                $trigger = $this->mark_trigger($level, $marks->ID_PROJECT, $marks->TOTAL_MARK);

                if ($trigger) {
                    echo json_encode('ok');
                    Yii::app()->end();
                } else {
                    echo json_encode('fail');
                    Yii::app()->end();
                }

            } else {
                echo json_encode('fail');
                Yii::app()->end();
            }
        }
    }

    /**  Метод для фиксирования среднего значения оценки в таблицу проекта.  */
    public function mark_trigger($level, $id_project, $total)
    {
        switch ($level) {
            case 'second':
                $marks_c = 'SecondLavelMarks';
                $field = 'SECOND_LAVEL_RATING';
                break;
            case 'third' :
                $marks_c = 'ThirdLavelMarks';
                $field = 'THIRD_LAVEL_RATING';
                break;
        }
        $mark = ProjectRegistry::model()->find('ID_PROJECT=:id_project', array(':id_project' => $id_project));

        $average = array();

        $existace_marks = $marks_c::model()->findAll('ID_PROJECT=' . $id_project);

        if (count($existace_marks) < 1) {
            $average_mark = $total;

        } else {
            foreach ($existace_marks as $mark_k => $mark_v) {
                $average[] = $mark_v->TOTAL_MARK;
            }
            $average_mark = round(array_sum($average) / count($average));
        }
        $mark->$field = $average_mark;

        if ($mark->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function actionManageMails()
    {

        $address = Yii::app()->request->getPost('address');
        $user_id = Yii::app()->request->getPost('user_id');
        $title = Yii::app()->request->getPost('title');
        $content = Yii::app()->request->getPost('content');

        $tpl_file = Yii::getPathOfAlias('webroot.downloads') . DIRECTORY_SEPARATOR . 'mail_mail.php';
        $tpl = file_get_contents($tpl_file);
        $mail = $tpl;

        $ending = "С уважением, <br> Администрация Vuznauka.ru";

        $mail = strtr($mail, array(
            "{title}" => $title,
            "{content}" => $content,
            "{ending}" => $ending
        ));

        $cheker = 0;

        if ($user_id == '') {
            $emails = Users::model()->findAll("roles='" . $address . "'");

            foreach ($emails as $email) {
                $message = new YiiMailMessage;
                $message->setBody($mail, 'text/html');
                $message->subject = 'Этафета вузовской науки';
                $message->from = Yii::app()->params['adminEmail'];
                $message->addTo($email->EMAIL);
                if (!Yii::app()->mail->send($message)) {
                    $cheker++;
                }
            }

        } else {
            $email = Users::model()->findByPk($user_id);

            $message = new YiiMailMessage;
            $message->setBody($mail, 'text/html');
            $message->subject = 'Этафета вузовской науки';
            $message->from = Yii::app()->params['adminEmail'];
            $message->addTo($email->EMAIL);
            if (!Yii::app()->mail->send($message)) {
                $cheker++;
            }
        }
        if ($cheker != 0) {
            echo json_encode('fail');
            Yii::app()->end();
        } else {
            echo json_encode('ok');
            Yii::app()->end();
        }
    }

    public function actionMailsCrosslist()
    {

        $tpl_file = Yii::getPathOfAlias('webroot.downloads') . DIRECTORY_SEPARATOR . 'mail_mail.php';
        $tpl = file_get_contents($tpl_file);
        $mail = $tpl;

        $content = "
        <p style='text-align:justify'>На сайте <a href='www.vuznauka2018.ru'>www.vuznauka2018.ru</a> уже началась подача проектов на Общероссийское научно-практическое мероприятие «Эстафета вузовской науки ─ 2018» (далее Эстафета) – это многоэтапный проект, направленный на содействие в реализации Стратегии развития медицинской науки в Российской Федерации на период до 2025 года и программы по созданию карты российской науки в медицинской области.</p> 
        <p style='text-align:justify'>Организаторы Эстафеты: Министерство здравоохранения Российской Федерации, Министерство образования и науки Российской Федерации, Совет ректоров медицинских и фармацевтических вузов России, Российская академия наук, Первый Московский государственный медицинский университет имени И.М. Сеченова (Сеченовский Университет) Минздрава России, Межрегиональная общественная организация «Федерация представителей молодежных научных обществ медицинских высших учебных заведений», Общероссийская общественная организация «Российский союз молодых ученых».</p> 
        <p style='text-align:justify'>Участники Эстафеты научные и научно-педагогические работники, исследовательские коллективы, научные и образовательные организации, осуществляющие свою деятельность в области медицины до 35 лет. Возможно участие других Вузов, при условии включения в авторский коллектив сотрудников организаций, осуществляющих свою деятельность в области медицины.</p>
        <p style='text-align:justify'>Цель Эстафеты заключается в поддержке ведущих научных коллективов, осуществляющих исследовательскую деятельность в приоритетных направлениях развития медицинской науки, ориентированных на создание высокотехнологичных инновационных продуктов, обеспечивающих сохранение и укрепление здоровья населения; интеграция научно-инновационного опыта, образовательной деятельности и лечебного процесса.</p> 
        <p style='text-align:justify'>Эстафета проходит в три этапа. Первый стартовый этап - открытие Эстафеты: освещение результатов мероприятия предыдущего года и уточнение задач на текущий год. К участию путем информирования руководства приглашаются все медицинские высшие учебные заведения Российской Федерации и образовательные организации высшего образования, осуществляющие свою деятельность в области медицины. </p>
        <p style='text-align:justify'>Для сбора заявок участников, открыта возможность подачи информации о своих работах в системе расположенной по адресу <a href='www.vuznauka2018.ru'>www.vuznauka2018.ru</a>.  Через систему подаются заявки и идет регистрация экспертов ВУЗа, для проведения отбора работ на 1 этапе (вузовском). Второй региональный этап проводится на уровне Федеральных округов России. В рамках федерального округа определяется площадка проведения регионального этапа (один из медицинских вузов округа победитель по количеству заявок предыдущего года). Перечень базовых вузов, курирующих мероприятие в округах, формируется согласно результатам второго этапа Эстафеты предыдущего года. На площадке вуза, определенного по вышеописанному алгоритму, проводится подведение итогов регионального этапа. В результате реализации регионального этапа определяются центры лидерства, ведущие научные и научно-педагогические коллективы, осуществляющие научно-исследовательскую деятельность в приоритетных направлениях.  Научно-инновационные проекты, победившие в региональном этапе, участвуют в третьем финальном этапе Эстафеты. Вуз, максимальное количество проектов которого победило на региональном этапе, становится площадкой второго этапа Эстафеты следующего года.</p> 
        <p style='text-align:justify'>Третий этап – очный (финал). Работы, прошедшие в финал, представляют проект на площадке организатора - Первого МГМУ им И.М.Сеченова (Сеченовский Университет), где проводится торжественная церемония награждения.</p>
        <p style='text-align:justify'>К участию в финале привлекаются зарубежные ученые, инвестиционные компании, государственные корпорации, промышленные предприятия, технопарки.</p>
        <p style='text-align:justify'>Для участия в Конкурсе все проекты регистрируются в базе данных проектов, размещенной на сайте: <a href='www.vuznauka2018.ru'>www.vuznauka2018.ru</a>.  Регистрация проектов уже открыта. Заявки принимаются до 09 января 2018 года. Участники Конкурса самостоятельно выбирают научную платформу при подаче проекта.</p>
        <p style='text-align:justify'>Все документы, регламентирующие проведение Конкурса, размещаются на сайтах: <a href='www.sechenov.ru'>www.sechenov.ru</a>, <a href='www.vuznauka2018.ru'>www.vuznauka2018.ru</a> и <a href='www.vuznauka.confreg.org'>www.vuznauka.confreg.org</a>. </p></br>
        
        <p style='text-align:justify'>27-28 февраля 2018 года на площадке Первого МГМУ им. И.М. Сеченова Минздрава России состоится Финал Эстафеты в рамках Международного медицинского форума «Вузовская наука. Инновации». Дополнительная информация на сайте: www.vuznauka.confreg.org</p></br>
        
        <p style='text-align:justify'>Будем рады видеть Вас в числе участников!</p></br>
        
        <p style='text-align:justify'>Приложения: <br>
            <ul>
                <li>1. Письмо в вузы,</li>
                <li>2. Положение об Эстафете вузовской науки</li>
            </ul> 
         </p></br></br></br>
        ";

        $ending = "С уважением, <br>
            Технический секретариат<br>
            тел.: +7 (499) 390-34-38, +7 (926) 848-23-58<br>
            факс: +7 (499) 137-34-79<br>
            e-mail: vuznauka@confreg.org<br>";


        $subject = "ЭСТАФЕТА ВУЗОВСКОЙ НАУКИ: открыта подача проектов";
        $title = "Уважаемые коллеги!";

        $mail = strtr($mail, array(
            "{title}" => $title,
            "{content}" => $content,
            "{ending}" => $ending
        ));


        $cheker = 0;
        $users = Users::model()->findAll(array("condition"=>"AKTIV_KEY =  100"));

        if(!empty($users) && is_array($users)){

//            foreach ($users as $user) {
            try {
                $email = "landerfeld@gmail.com";
                $user_id = 111;
                $mail_name = "common_email_notification";

//                $email = $user["EMAIL"];

                $message = new YiiMailMessage;
                $message->setBody($mail, 'text/html');
                $message->subject = $subject;
                $message->from = Yii::app()->params['adminEmail'];
                $message->addTo($email);
                $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot.downloads') . DIRECTORY_SEPARATOR . 'Estafeta_polojenie_2018.pdf'));
                $message->attach(Swift_Attachment::fromPath(Yii::getPathOfAlias('webroot.downloads') . DIRECTORY_SEPARATOR . 'univercity_letter.pdf'));

                if (!Yii::app()->mail->send($message)) {



                    $sql = "INSERT into m_w_dispatch_mails (user_id, mail_name) values ($user_id, $mail_name)";


//                    $parameters = array(
//                        ":user_id"=>$user_id,
//                        ":mail_name"=>$mail_name
//                    );
                    $dd = Yii::app()->db->createCommand($sql)->executeAll();

                    var_dump($dd); die();

                    $cheker++;
                }

            } catch (Exception $e) {
                echo 'Error: ',  $e->getMessage(), "\n"; die();
            }

//        }
        }

        if ($cheker != 0) {
            echo json_encode('fail');
            Yii::app()->end();
        } else {
            echo json_encode('ok');
            Yii::app()->end();
        }
    }



    /**
     * Метод для отрисовки таблицы новостей
     */
    public function actionNewsList()
    {
        $columns = array('id', 'title', 'content');

        $cols = array('id:number:#', 'title:text:Заголовок',
            array(
                'name' => 'Текст',
                'type' => 'text',
                'value' => 'substr($data->content  , 0, 150).\'... \'',
            ),
            array(
                'name' => 'mail',
                'type' => 'raw',
                'value' => 'Yii::app()->controller->widget(\'editable.Editable\', array(
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
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id' => 'NewsStorage',
            'dataProvider' => $dataProvider,
            'ajaxUrl' => $this->createUrl('NewsList'),
            'columns' => $cols,
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
            $this->renderPartial('_NewsList', array('widget' => $widget,), false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы оповещений
     */
    public function actionNotifiesList()
    {
        $columns = array('id', 'title', 'text', 'address');

        $cols = array('id:number:#', 'title:text:Заголовок', 'text:text:Текст', 'address:text:Адресат', 'user_id:number:ID пользователя',
            array(
                'class' => 'EButtonColumn',
                'template' => '{edit}&nbsp;{delete}',
                'buttons' => array(

                    'edit' => array(
                        'label' => 'Редактировать',
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
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id' => 'NotificationStorage',
            'dataProvider' => $dataProvider,
            'ajaxUrl' => $this->createUrl('NotifiesList'),
            'columns' => $cols,
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_NotifiesList', array('widget' => $widget,), false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы Эксертов
     */
    public function actionExpertsList()
    {

        $columns = array('id', 'AVATAR', 'EMAIL', 'F_NAME', 'L_NAME', 'S_NAME', 'ID_DISTRICT', 'ID_UNIVER', 'ID_STAGE', 'roles');

        $cols = array(
            array(
                'name' => 'id',
                'type' => 'raw',
                'value' => '$data->id',
                'htmlOptions' => array('style' => 'text-align: left; width: 40px;')
            ),
            array(
                'name' => 'Фото',
                'type' => 'html',
                'value' => 'is_null($data->AVATAR)? (CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_new.png\',"",array("style"=>"width:40px;height:40px;")))
                 : CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_\'.$data->AVATAR,"",array("style"=>"width:40px;height:40px;"))',

            ),
            'EMAIL:text:email', 'F_NAME:text:Фамилия', 'L_NAME:text:Имя', 'S_NAME:text:Отчество',

            array(
                'name' => 'ID_DISTRICT',
                'type' => 'text',
                'value' => '$this->getDistrict($data->ID_DISTRICT)',
            ),
            array(
                'name' => 'ID_UNIVER',
                'type' => 'raw',
                'value' => '$this->getUniver($data->ID_UNIVER)',
            ),

            array(
                'name' => 'ID_STAGE',
                'type' => 'raw',

                'value' => 'Yii::app()->controller->widget(\'editable.Editable\', array(
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
                'name' => 'roles',
                'type' => 'raw',

                'value' => 'Yii::app()->controller->widget(\'editable.Editable\', array(
                                    \'type\'      => \'select\',
                                    \'name\'      => \'roles\',
                                    \'htmlOptions\' => array(\'class\'=>\'ExpEdit\'),
                                    \'pk\'        => $data[\'id\'],
                                    \'text\'      => CHtml::encode($this->getRole($data->roles)),
                                    \'url\'       => Yii::app()->createUrl(\'Autorized/updateProfile\'),
                                    \'source\'    => array( \'Exp\' => \'Эксперт не авторизован\', \'Exp2\' => \'Экспертиза региональная\', \'Exp3\' => \'Экспертиза федеральная\'),
                                    \'title\'     => \'Выберите роль\',
                                    \'placement\' => \'top\',
                                    \'options\' => array( \'disabled\'=>false,  \'showbuttons\'=>false),  ),true);',
            ),


        );

        $criteria = new CDbCriteria;
        $criteria->condition = "roles='Exp' OR roles='Exp1' OR roles='Exp2' OR roles='Exp3' AND AKTIV_KEY='100'";

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('F_NAME', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('Users', $columns);
        $sort->defaultOrder = 'id';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id' => 'Experts',
            'dataProvider' => $dataProvider,
            'ajaxUrl' => $this->createUrl('ExpertsList'),
            'columns' => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt', "Refresh")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_ExpertsList', array('widget' => $widget,), false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы Эксертов
     */
    public function actionModersList()
    {

        $columns = array('id', 'AVATAR', 'EMAIL', 'F_NAME', 'L_NAME', 'S_NAME', 'ID_DISTRICT', 'ID_UNIVER', 'roles');

        $cols = array(
            array(
                'name' => 'id',
                'type' => 'raw',
                'value' => '$data->id',
                'htmlOptions' => array('style' => 'text-align: left; width: 40px;')
            ),
            array(
                'name' => 'Фото',
                'type' => 'html',
                'value' => 'is_null($data->AVATAR)? (CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_new.png\',"",array("style"=>"width:40px;height:40px;")))
                 : CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_\'.$data->AVATAR,"",array("style"=>"width:40px;height:40px;"))',

            ),
            'EMAIL:text:email', 'F_NAME:text:Фамилия', 'L_NAME:text:Имя', 'S_NAME:text:Отчество',

            array(
                'name' => 'ID_DISTRICT',
                'type' => 'text',
                'value' => '$this->getDistrict($data->ID_DISTRICT)',
            ),
            array(
                'name' => 'ID_UNIVER',
                'type' => 'raw',
                'value' => '$this->getUniver($data->ID_UNIVER)',
            ),
            array(
                'name' => 'roles',
                'type' => 'raw',

                'value' => 'Yii::app()->controller->widget(\'editable.Editable\', array(
                                    \'type\'      => \'select\',
                                    \'name\'      => \'roles\',
                                    \'htmlOptions\' => array(\'class\'=>\'ModerEdit\'),
                                    \'pk\'        => $data[\'id\'],
                                    \'text\'      => CHtml::encode($this->getRole($data->roles)),
                                    \'url\'       => Yii::app()->createUrl(\'Autorized/updateProfile\'),
                                    \'source\'    => array( \'Moder\' => \'Эксперт не авторизован\', \'Moder1\' => \'Экспертиза вузовская\'),
                                    \'title\'     => \'Выберите роль\',
                                    \'placement\' => \'top\',
                                    \'options\' => array( \'disabled\'=>false,  \'showbuttons\'=>false),  ),true);',
            )

        );

        $criteria = new CDbCriteria;
        $criteria->condition = "roles IN ('Moder', 'Moder1')  AND AKTIV_KEY='100'";

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('F_NAME', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('Users', $columns);
        $sort->defaultOrder = 'id';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id' => 'Moders',
            'dataProvider' => $dataProvider,
            'ajaxUrl' => $this->createUrl('ModersList'),
            'columns' => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt', "Refresh")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_ExpertsList', array('widget' => $widget,), false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы Представителей
     */
    public function actionManagersList()
    {

        $columns = array('id', 'AVATAR', 'F_NAME', 'L_NAME', 'S_NAME', 'ID_DISTRICT', 'ID_UNIVER', 'ID_STAGE');

        $cols = array(
            array(
                'name' => 'id',
                'type' => 'raw',
                'value' => '$data->id',
                'htmlOptions' => array('style' => 'text-align: left; width: 40px;')
            ),
            array(
                'name' => 'Фото',
                'type' => 'html',
                'value' => 'is_null($data->AVATAR)? (CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_new.png\',"",array("style"=>"width:40px;height:40px;")))
                 : CHtml::image(Yii::app()->baseUrl.\'/images/avatars/thumb_\'.$data->AVATAR,"",array("style"=>"width:40px;height:40px;"))',

            ),
            'EMAIL:text:email', 'F_NAME:text:Фамилия', 'L_NAME:text:Имя', 'S_NAME:text:Отчество',

            array(
                'name' => 'ID_DISTRICT',
                'type' => 'text',
                'value' => '$this->getDistrict($data->ID_DISTRICT)',
            ),
            array(
                'name' => 'ID_UNIVER',
                'type' => 'text',
                'value' => '$this->getUniver($data->ID_UNIVER)',
            ),
            array(
                'name' => 'ID_STAGE',
                'type' => 'text',
                'value' => '$this->getStageFromProject($data->id)',
            ),

        );

        $criteria = new CDbCriteria;

        $criteria->condition = "roles='Manager'  AND AKTIV_KEY='100' 
        AND id IN (SELECT ID_REPRESENTATIVE from m_w_project_registry where REG_DATE > '". Yii::app()->params['eventStartDate'] ."') ";


        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('F_NAME', $_REQUEST['sSearch']);
        }

        $sort = new EDTSort('Users', $columns);
        $sort->defaultOrder = 'id';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id' => 'Managers',
            'dataProvider' => $dataProvider,
            'ajaxUrl' => $this->createUrl('ManagersList'),
            'columns' => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt', "Refresh")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_ManagersList', array('widget' => $widget,), false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы Проектов экспертам
     */
    public function actionExpertProjectsList()
    {

        $columns = array('ID_PROJECT', 'NAME', 'ID_DISTRICT', 'ID_UNIVER', 'ID_STAGE', 'FIRST_LAVEL_APPROVAL');

        $cols = array(
            array(
                'name' => 'ID_PROJECT',
                'type' => 'number',
                'value' => '$data->ID_PROJECT',
                'htmlOptions' => array('class' => 'id-left')
            ),
            array(
                'name' => 'NAME',
                'type' => 'raw',
                'value' => '$data->NAME',
                'htmlOptions' => array('class' => 'project-name-left')
            ),
            array(
                'name' => 'ID_DISTRICT',
                'type' => 'text',
                'value' => '$this->getDistrict( $data->ID_DISTRICT)',
                'htmlOptions' => array('class' => 'district-left'),

            ),
            array(
                'name' => 'ID_UNIVER',
                'type' => 'text',
                'value' => '$this->getUniver($data->ID_UNIVER)',
                'htmlOptions' => array('class' => 'univer-left')
            ),
            array(
                'name' => 'ID_STAGE',
                'type' => 'text',
                'value' => '$this->getStage($data->ID_STAGE)',
            ),
            array(
                'name' => 'FIRST_LAVEL_APPROVAL',
                'type' => 'text',
                'value' => '$this->getStatus($data->ID_PROJECT)',
                'htmlOptions' => array('class' => 'status-left')

            ),

        );


        /** Критерий поиска проектов по ролям  */
        $criteria = $this->getProjectByCriteria();

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('NAME', $_REQUEST['sSearch'], true, 'OR');
            $criteria->addSearchCondition('ID_PROJECT', $_REQUEST['sSearch'], true, 'OR');
        }

        $sort = new EDTSort('ProjectRegistry', $columns);
        $sort->defaultOrder = 'ID_PROJECT';

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('ProjectRegistry', array(
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
        ));

        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id' => 'ProjectRegistry',
            'dataProvider' => $dataProvider,
            'ajaxUrl' => $this->createUrl('ExpertProjectsList'),
            'columns' => $cols,

            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt', "Обновить")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_ExpertProjectsList', array('widget' => $widget,), false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


    }

    /**
     * Метод для отрисовки таблицы Представителей
     */
    public function actionJuliaList()
    {

        $columns = array('ID_UNIVER', 'ID_DISTRICT');

        $cols = array(

            array(
                'name' => 'ID_UNIVER',
                'type' => 'text',
                'value' => '$this->getUniver($data->ID_UNIVER)',
            ),
            array(
                'name' => 'ID_DISTRICT',
                'type' => 'text',
                'value' => '$this->getDistrict($data->ID_DISTRICT)',
            ),

            array(
                'name' => 'Эксперты',
                'type' => 'text',
                'value' => '$data->ExpCount',
            ),
            array(
                'name' => 'Проекты',
                'type' => 'text',
                'value' => '$data->ProjCount',
            ),
            array(
                'name' => 'Координаторы',
                'type' => 'text',
                'value' => '$data->UniverModer',
            ),

        );

        $criteria = new CDbCriteria;
        $criteria->select = "t.ID_UNIVER ,t.ID_DISTRICT ,
        (SELECT COUNT(DISTINCT id) FROM `m_w_users` WHERE roles IN ('Exp','Exp1','Exp2','Exp3') AND ID_UNIVER = t.ID_UNIVER ) as ExpCount,
        (SELECT COUNT(DISTINCT id) FROM m_w_users as u  Where roles IN ('Manager') AND ID_UNIVER = t.ID_UNIVER AND u.REG_DATE > '" .Yii::app()->params['eventStartDate']. "' ) as ProjCount,
        (SELECT COUNT(DISTINCT id) FROM m_w_users as u  Where roles IN ('Moder', 'Moder1') AND ID_UNIVER = t.ID_UNIVER ) as UniverModer";
        $criteria->condition = "AKTIV_KEY='100' AND ID_UNIVER is not NULL AND ID_DISTRICT is not NULL AND t.REG_DATE > '" .Yii::app()->params['eventStartDate']."'";
        $criteria->group = 'ID_UNIVER';

        if (isset($_REQUEST['sSearch']) && isset($_REQUEST['sSearch']{0})) {
            $criteria->addSearchCondition('ID_DISTRICT', $_REQUEST['sSearch'], true, 'OR');
        }

        $sort = new EDTSort('Users', $columns);

        $pagination = new EDTPagination();

        $dataProvider = new CActiveDataProvider('Users', array(
            'criteria' => $criteria,
            'pagination' => $pagination,
            'sort' => $sort,
        ));
        $widget = $this->createWidget('ext.edatatables.EDataTables', array(
            'id' => 'JuliaList',
            'dataProvider' => $dataProvider,
            'ajaxUrl' => $this->createUrl('JuliaList'),
            'columns' => $cols,
            'buttons' => array(
                'refresh' => array(
                    'tagName' => 'a',
                    'label' => '<i class="fa fa-refresh "></i>',
                    'htmlClass' => 'btn',
                    'htmlOptions' => array('rel' => 'tooltip', 'title' => Yii::t('EDataTables.edt', "Refresh")),
                    'init' => 'js:function(){}',
                    'callback' => 'js:function(e){e.data.that.eDataTables("refresh"); return false;}',
                ),
            ),
            'options' => $this->TableOptions,
        ));

        if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
            $this->renderPartial('_JuliaList', array('widget' => $widget,), false, false);
            return;
        } else {
            echo json_encode($widget->getFormattedData(intval($_REQUEST['sEcho'])));
            Yii::app()->end();
        }


//        select t.ID_UNIVER ,t.ID_DISTRICT ,
//        (SELECT COUNT(DISTINCT id) FROM `m_w_users` WHERE roles IN ('Exp','Exp1','Exp2','Exp3') AND ID_UNIVER = t.ID_UNIVER ) as ExpCount,
//        (SELECT COUNT(DISTINCT id) FROM m_w_users as u  Where roles IN ('Manager') AND ID_UNIVER = t.ID_UNIVER AND u.REG_DATE > '2016-09-01' ) as ProjCount,
//        (SELECT COUNT(DISTINCT id) FROM m_w_users as u  Where roles IN ('Moder') AND ID_UNIVER = t.ID_UNIVER ) as UniverModer
//        FROM m_w_users as t
//
//        where AKTIV_KEY='100' AND ID_UNIVER is not NULL AND ID_DISTRICT is not NULL
//        GROUP BY ID_UNIVER

    }

    /** Метод получения критериев поиска проектов по ролям  */
    public function getProjectByCriteria()
    {

        $user = Users::model()->findByPk(Yii::app()->user->id);

        $criteria = new CDbCriteria;

        //todo повменять ID_DISTRICT, ID_UNIVER,  на название через SQL замену
        $criteria->select = 't.ID_PROJECT, t.ROADMAP_PROJECT, t.ID_STAGE, t.NAME, us.ID_DISTRICT, us.ID_UNIVER ';
        $criteria->join = 'LEFT JOIN  `m_w_users` `us` ON us.id = t.ID_REPRESENTATIVE';

        $criteriaCondition = "t.REG_DATE > '" .Yii::app()->params['eventStartDate']."'";
        $criteriaParams = array();

        switch (Yii::app()->user->role) {

            /** Критерий для эксперта 1 уровня (по универу) */
            case 'Moder' :
            case 'Moder1' :
                $criteriaCondition .= " AND us.ID_UNIVER = :univ AND FIRST_LAVEL_APPROVAL IN ('1', '3', '9') AND us.REG_DATE > '" .Yii::app()->params['eventStartDate']."' ";
                $criteriaParams = array(":univ" => $user['ID_UNIVER']);
                break;

            /** Критерий для хз кого*/
            case 'Exp1' :
                $criteriaCondition .= ' AND   
                (us.ID_UNIVER = :univ 
                AND 
                (FIRST_LAVEL_APPROVAL = 1 OR us.ID_UNIVER = :univ) 
                AND 
                (FIRST_LAVEL_APPROVAL = 9 OR us.ID_UNIVER = :univ) 
                AND 
                FIRST_LAVEL_APPROVAL = 3)';
                $criteriaParams = array(":univ" => $user['ID_UNIVER']);
                break;

            /** Критерий для эксперта 2 уровня (по платформе и округу)*/
            case 'Exp2' :
                $criteriaCondition .= ' AND t.ID_STAGE = :stage AND us.ID_DISTRICT = :dist AND FIRST_LAVEL_APPROVAL = 3';
                $criteriaParams = array(":stage" => $user['ID_STAGE'], ":dist" => $user['ID_DISTRICT']);
                break;

            /** Критерий для эксперта 3 уровня (по платформе) */
            case 'Exp3' :
                $criteriaCondition .= ' AND  t.ID_STAGE = :stage ';

                for ($i = 1; $i <= 8; $i++) {
                    $criteriaConditionArray[] = "(SELECT ID_PROJECT FROM `m_w_project_registry` as pr
                        JOIN m_w_users as u ON pr.ID_REPRESENTATIVE = u.id
                        WHERE SECOND_LAVEL_RATING IS NOT NULL   
                        AND pr.REG_DATE > '" .Yii::app()->params['eventStartDate']. "' 
                        AND pr.ID_STAGE = :stage AND u.ID_DISTRICT = " . $i . " ORDER BY SECOND_LAVEL_RATING DESC LIMIT 3) ";
                }
                $projects_ids = Yii::app()->db->createCommand(implode(" UNION ", $criteriaConditionArray))->bindParam(":stage", $user['ID_STAGE'], PDO::PARAM_STR)->queryAll();

                $ids = array();
                if (!empty($projects_ids)) {
                    foreach ($projects_ids as $projects_id) {
                        $ids[] = $projects_id['ID_PROJECT'];
                    }
                }
                $criteriaCondition .= !empty($ids) ? ' AND t.ID_PROJECT IN (' . implode(" , ", $ids) . ')' : " AND t.ID_PROJECT = 0";

                $criteriaParams = array(":stage" => $user['ID_STAGE']);
                break;

            /** Критерий для разработчика */
            case 'Dev' :
                break;
        }

        $criteria->condition = $criteriaCondition;
        $criteria->params = $criteriaParams;

        return $criteria;
    }

    public function actionSaveProjectComment()
    {
        if (isset($_POST['comment'])) {
            $comment = new CommentStorage();
            $comment->text = $_POST['comment'];
            $comment->project_id = $_POST['project_id'];
            $comment->author_id = Yii::app()->user->id;
            if ($comment->save()) {
                echo json_encode('ok');
                Yii::app()->end();
            } else {
                echo json_encode('fail');
                Yii::app()->end();
            }

        }
    }

    public function actionGetSpecialities()
    {
        echo CJSON::encode(Editable::source(Speciality::model()->findAll(), 'ID_SPECIALITY', 'NAME'));
    }

    public function actionGetUniversities()
    {

        $district = Users::model()->find('id=' . Yii::app()->user->id);
        $d = $district->ID_DISTRICT;
        echo CJSON::encode(Editable::source(University::model()->findAll('ID_DISTRICT=' . $d), 'ID_UNIVER', 'NAME_UNIVER'));
    }

    public function actionGetDistricts()
    {
        echo CJSON::encode(Editable::source(District::model()->findAll(), 'ID_DISTRICT', 'NAME'));
    }

    public function actionGetStages()
    {
        echo CJSON::encode(Editable::source(Stage::model()->findAll(), 'ID_STAGE', 'NAME_STAGE'));
    }

    public function actionGetPhases()
    {
        echo CJSON::encode(Editable::source(Phase::model()->findAll(), 'ID_PHASE', 'NAME'));
    }

    public function actionGetBudget()
    {
        echo CJSON::encode(Editable::source(Budget::model()->findAll(), 'ID_BUDGET', 'NAME'));
    }

    public function actionGetBrowser()
    {
        echo Browser::getBrowsers();
    }

    /**
     * Метод получения аватара
     * @return string
     */
    public function getAvatar()
    {
        if (is_null(Yii::app()->user->getState('ava'))) {
            $ava = 'new.png';
        } else {
            $ava = 'thumb_' . Yii::app()->user->ava;
        }

        return $ava;
    }

    /**
     * Метод показывающий кол-во дней в проекте
     * @param $date
     * @return int
     */
    public function DaysIn($date)
    {
        $dnei_nazad = (int)((strtotime($date) - time()) / 86400) * -1;
        return $dnei_nazad;
    }

    /**
     * Метод преобразующий роль пользователя в профиле
     * @param $role
     * @return string
     */
    public function cleanRole($role)
    {
        switch ($role) {
            case 'Dev':
                $clean_role = 'Разработчик';
                break;
            case 'Admin':
                $clean_role = 'Администратор';
                break;
            case 'Manager':
                $clean_role = 'Руководитель проекта';
                break;
            case 'Moder':
            case 'Moder1':
                $clean_role = 'Координатор от вуза';
                break;
            case 'Exp':
            case 'Exp1':
            case 'Exp2':
            case 'Exp3':
                $clean_role = 'Эксперт';
                break;
        }
        return $clean_role;
    }

    /**
     * Метод формирующий номер Проекта
     * @param $id
     * @return string
     */
    public function MakeOrder($id)
    {
        if (strlen($id) == 1) {
            $order = '000' . $id;
        }
        if (strlen($id) == 2) {
            $order = '00' . $id;
        }
        if (strlen($id) == 3) {
            $order = '0' . $id;
        }
        if (strlen($id) == 4) {
            $order = $id;
        }
        return $order;
    }

    public function statusOk()
    {
        return '<i class="fa fa-check" style="color:green;"></i>';
    }

    public function statusFail()
    {
        return '<i class="fa fa-times"></i>';
    }

    public function statusSpinner()
    {
        return '<i class="fa fa-spinnerx"></i>';
    }
}