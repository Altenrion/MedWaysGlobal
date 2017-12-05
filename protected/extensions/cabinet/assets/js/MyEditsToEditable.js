/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 16.08.14
 * Time: 14:16
 * To change this template use File | Settings | File Templates.
 */


$(document).ready(function () {

    function scroll_to_bottom(speed) {
        var height= $("body").height();
        $("html,body").animate({"scrollTop":height},speed);
    }

    $("#saveNewPass").click(function(e){
        e.preventDefault();

        $old_passwd = $("#oldPasswd").val();
        $new_passwd = $("#newPasswd").val();

        $.ajax({
            type: 'post',
            url: 'updatePass',
            data: {oldPass:$old_passwd, newPass:$new_passwd},
            dataType : 'json',
            success: function(data){
                console.log(data);
                if(data.status == 'success'){
                    alertify.success('Ваш пароль успешно обновлен');
                    setTimeout(function(){
                        window.location.replace('http://'+window.location.host +"/ShowCase/login");
                    }, 2000);

                }
                if(data.status == 'fail'){
                    console.log(data.status);

                    alertify.error('Вы указали неверный пароль');
                }
                if(data.status == 'error'){
                    alertify.error('При изменении пароля произошла ошибка');
                }
            }

        });
        console.log($old_passwd, $new_passwd);
    });


    $('.enable-edition').click(function (e) {
       e.preventDefault();

        var $links = $(this).closest(".grid-body").find('a')
            .filter(function () {return $(this).hasClass("editable");});

        $links.editable('toggleDisabled');
        console.log("edit clicked again");
    });


    /** Метод для отправки проекта на экспертизу */

    $('#Pull').click(function(){
//        console.log('Я тут');
//        console.log(Url);

        $('#Pull>i').addClass('fa-spinner fa-spin');
        $.ajax({
            type: 'post',
            url:  Url,
            dataType : 'json',
            success: function(data){
                if(data == 'fail'){

                    setTimeout(function() {
                        $('#Pull>i').removeClass('fa-spinner fa-spin').addClass('fa-times');
                        $('#Pull_Modal').modal('show')
                    }, 1500);

                }
                if(data == 'ok'){
                    setTimeout(function() {
                        $('#Pull>i').removeClass('fa-spinner fa-spin');
                            setTimeout(function(){
                                scroll_to_bottom(1500);
                                setTimeout(function(){
                                    $('#first_check').css('color','green');
                                    $('#first_check>i').removeClass('fa-spinner fa-spin').addClass('fa-check');
                                },1500);
                            },250);


                        $('#exp_check>i').removeClass('fa fa-times').addClass('fa fa-spinner fa-spin');
                    }, 1500);
                }



            }

        });

    });

    $(".create-project").on("click", function(e){
        e.preventDefault();


        $.ajax({
            type: 'post',
            url: 'createNewProject',
            // data: {:$old_passwd, newPass:$new_passwd},
            dataType : 'json',
            success: function(data){
                console.log(data);
                if(data.status == 'success'){
                    alertify.success('Новый проект успешно создан. Заполните нужные поля и подайте его на участие. Удачи в Эстафете');
                    setTimeout(function(){
                        window.location.replace('http://'+window.location.host +"/Autorized/project");
                    }, 3500);
                }
                if(data.status == 'fail'){
                    console.log(data.status);

                    alertify.error('У вас есть активный проект для текущего периода Эстафеты');
                }
                if(data.status == 'error'){
                    alertify.error('При создании проекта произшла ошибка. Напишите об этом организаторам, приложив скриншот');
                }
            },
            error:function(){
                alertify.error('При создании проекта произшла ошибка. Напишите об этом организаторам, приложив скриншот');
            }
        });




    });

    var pathname = window.location.pathname;
    if(pathname == "/Autorized/project"){
        $(".grid-header a[data-widget='collapse']:not(:first)").trigger("click");
    }
});