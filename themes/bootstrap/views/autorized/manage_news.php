<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

?>

<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Создание записей</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Управление</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->



<section class="content">

    <div class="row ">

        <div class="col-sm-12 ">
            <div class="row ">

                <div class="col-md-6">
                    <div class="grid">
                        <div class="grid-header">
                            <i class="fa fa-calendar"></i>
                            <span class="grid-title">Создание новости</span>
                            <div class="pull-right grid-tools">
                                <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                                <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                                <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="grid-body">
                            <form role="form">
                                <div class="form-group">
                                    <label>Заголовок</label>
                                    <input type="text"  id="news_title" name="title" class="form-control" placeholder="Введите заголовок">
                                </div>
                                <div class="form-group">
                                    <label>Основной текст</label>
                                    <div id="news_content"></div>
                                </div>
                                <div class="btn-group">
                                    <button type="" id="save_news" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="grid">
                        <div class="grid-header">
                            <i class="fa fa-calendar"></i>
                            <span class="grid-title">Создание оповещения</span>
                            <div class="pull-right grid-tools">
                                <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                                <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                                <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="grid-body">
                            <form role="form">
                                <div class="form-group">
                                    <label>Заголовок</label>
                                    <input type="text"  id="notify_title" name="title" class="form-control" placeholder="Введите заголовок">
                                </div>
                                <div class="form-group">
                                    <label>Основной текст</label>
                                    <div id="notify_content"></div>
                                </div>
                                <div class="btn-group">

                                    <select id="notify_address" class=" btn btn-primary"  style="width:200px">
                                        <optgroup label="Адресат ">
                                            <option value="Dev">Разработчики</option>
                                            <option value="Users">Все пользователи</option>
                                            <option value="id">Пользователь (id)</option>
                                            <option value="Experts">Все эксперты</option>
                                            <option value="Exp">Эксперты 0</option>
                                            <option value="Exp1">Эксперты 1</option>
                                            <option value="Exp2">Эксперты 2</option>
                                            <option value="Exp3">Эксперты 3</option>
                                            <option value="Manager">Представители</option>
                                        </optgroup>
                                    </select>

                                    <input type="text" id="notify_user_id" class="form-control btn btn-primary" style="width:70px; color:#fff;" placeholder="ID">

                                    <select id="notify_type" class=" btn btn-primary"  style="width:150px">
                                        <optgroup label="Тип ">
                                            <option value="quick">Быстрый</option>
                                            <option value="sticky">Прилипающий</option>
                                        </optgroup>
                                    </select>

                                    <select id="notify_regular" class=" btn btn-primary"  style="width:150px">
                                        <optgroup label="Повтор ">
                                            <option value="regular">Регулярное</option>
                                            <option value="Once">Разовое</option>
                                        </optgroup>
                                    </select>

                                    <select id="notify_color" class=" btn btn-primary"  style="width:150px; margin-right: 5px;">
                                        <optgroup label="Цвет ">
                                            <option value="primary">Синий</option>
                                            <option value="warning">Рыжий</option>
                                            <option value="danger">Красный</option>
                                            <option value="succsess">Зеленый</option>
                                            <option value=" ">Черный</option>
                                        </optgroup>
                                    </select>
                                    <button type="" id="save_notify" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="grid">
                        <div class="grid-header">
                            <i class="fa fa-calendar"></i>
                            <span class="grid-title">Создание рассылки</span>
                            <div class="pull-right grid-tools">
                                <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                                <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                                <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="grid-body">
                            <form role="form">
                                <div class="form-group">
                                    <label>Заголовок</label>
                                    <input type="text"  id="mail_title" name="title" class="form-control" placeholder="Введите заголовок">
                                </div>
                                <div class="form-group">
                                    <label>Основной текст</label>
                                    <div id="mail_content"></div>
                                </div>
                                <div class="btn">

                                    <select id="mail_address" class=" btn btn-primary"  style="width:200px">
                                        <optgroup label="Адресат ">
                                            <option value="Dev">Разработчики</option>
                                            <option value="Exp">Эксперты 0</option>
                                            <option value="Exp1">Эксперты 1</option>
                                            <option value="Exp2">Эксперты 2</option>
                                            <option value="Exp3">Эксперты 3</option>
                                            <option value="Manager">Представители</option>
                                        </optgroup>
                                    </select>

                                    <input type="text" id="mail_user_id" class="form-control btn btn-primary" style="width:70px; color:#fff;" placeholder="ID">

                                    <button type="" id="save_mail" class="btn btn-primary">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--/col-->

    </div><!--/profile-->


<div ><img style="visibility: hidden" class="octocat" src="<?=Yii::app()->baseUrl?>/images/octocat-spinner2.svg" alt=""/></div>
    <script type="text/javascript">
        $('#save_news').click(function(){
            var NewsTitle = $("#news_title").val();
            var $obj = $("#news_content");
            var NewsContent = $obj.next().children(".note-editable").html();

            var NewsHolder = $obj.next().children(".note-editable");
            var NewsTitleHolder = $("#news_title");

            var Type = 'news';
            console.log(NewsTitle);
            console.log(NewsContent);

            $.ajax({
                type: 'post',
                url:  '<?=$this->createUrl('manageNews')?>' ,
                dataType : 'json',
                data: {type: Type ,title: NewsTitle, content:NewsContent },
                success: function(data){
                    if(data == 'fail'){
                    console.log('фэил');
                        setTimeout(function() {
                            NewsHolder.css({"background":"rgb(255, 207, 214)"});
                            NewsTitleHolder.css({"background":"rgb(255, 207, 214)"})
                        }, 100);
                    }
                    if(data == 'ok'){
                    console.log('олл окей');
                        setTimeout(function() {
                            NewsHolder.css({"background":"rgb(208, 255, 208)"});
                            NewsTitleHolder.css({"background":"rgb(208, 255, 208)"})
                        }, 100);
                    }
                }
            });


            return false;

        });
        $('#save_notify').click(function(){
            var NotyTitle = $("#notify_title").val();
                var $obj = $("#notify_content");
            var NotyContent = $obj.next().children(".note-editable").html();

            var NotyHolder = $obj.next().children(".note-editable");
            var NotyTitleHolder = $("#notify_title");

            var Type = 'notify';

            var NotifyType = $("#notify_type").val();
            var NotifyAddress = $("#notify_address").val();
            var NotifyUserId = $("#notify_user_id").val();
            var NotifyRegular = $("#notify_regular").val();
            var NotifyColor = $("#notify_color").val();

            console.log(NotifyAddress);
            console.log(NotifyUserId);
            console.log(NotifyType);

            console.log(NotifyRegular);
            console.log(NotifyColor);



            console.log(NotyTitle);
            console.log(NotyContent);

            $.ajax({
                type: 'post',
                url:  '<?=$this->createUrl('manageNews')?>' ,
                dataType : 'json',
                data: { type: Type ,
                        address: NotifyAddress,
                        user_id:NotifyUserId ,
                        notify_type:NotifyType,
                        repeat:NotifyRegular,
                        color:NotifyColor ,
                        title: NotyTitle,
                        content:NotyContent
                },

                success: function(data){
                    if(data == 'fail'){
                        console.log('фэил');
                        setTimeout(function() {
                            NotyHolder.css({"background":"rgb(255, 207, 214)"});
                            NotyTitleHolder.css({"background":"rgb(255, 207, 214)"})
                        }, 100);
                    }
                    if(data == 'ok'){
                        console.log('олл окей');
                        setTimeout(function() {
                            NotyHolder.css({"background":"rgb(208, 255, 208)"});
                            NotyTitleHolder.css({"background":"rgb(208, 255, 208)"})
                        }, 100);
                    }
                }
            });


            return false;

        });


        $('#save_mail').click(function(){
            var MailTitle = $("#mail_title").val();
                var $obj = $("#mail_content");
            var MailContent = $obj.next().children(".note-editable").html();

            var MailHolder = $obj.next().children(".note-editable");
            var MailTitleHolder = $("#mail_title");

            var MailAddress = $("#mail_address").val();
            var MailUserId = $("#mail_user_id").val();

            console.log(MailTitle);
            console.log(MailContent);
            console.log(MailAddress);
            console.log(MailUserId);


            $('.md-overlay').css({"visibility": "visible"});
            $('.octocat').css({"visibility": "visible","position":"fixed","width":"200px","display":"block","top":"50%","left":"50%", "margin-top":"-50px","margin-left": "-100px"});

            $.ajax({
                type: 'post',
                url:  '<?=$this->createUrl('manageMails')?>' ,
                dataType : 'json',
                data: { address: MailAddress,
                        user_id:MailUserId ,
                        title: MailTitle,
                        content:MailContent
                },

                success: function(data){
                    if(data == 'fail'){
                        console.log('фэил');
                        setTimeout(function() {
                            $('.md-overlay').css({"visibility": "hidden"});
                            $('.octocat').css({"visibility": "hidden"});
                            setTimeout(function() {
                                MailHolder.css({"background":"rgb(255, 207, 214)"});
                                MailTitleHolder.css({"background":"rgb(255, 207, 214)"})
                            }, 450);
                        }, 1100);
                    }
                    if(data == 'ok'){
                        console.log('олл окей');
                        setTimeout(function() {
                            $('.md-overlay').css({"visibility": "hidden"});
                            $('.octocat').css({"visibility": "hidden"});
                            setTimeout(function() {
                                MailHolder.css({"background":"rgb(208, 255, 208)"});
                                MailTitleHolder.css({"background":"rgb(208, 255, 208)"})
                            }, 450);
                        }, 1100);
                    }
                }
            });


            return false;

        });
    </script>

</section>