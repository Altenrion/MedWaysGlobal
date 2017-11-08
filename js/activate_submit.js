/**
 * Created with JetBrains PhpStorm.
 * User: User
 * Date: 11.08.14
 * Time: 15:01
 * To change this template use File | Settings | File Templates.
 */


    $(document).ready(function(){

        var succsess = $('div.response.alert-success');
        var error = $('div.response.alert-danger');


        $("#RegForm").validate({

            submitHandler: function (form) {

                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: $(form).serialize(),
                    dataType : 'json',
                    success: function(data){
                        if(data == 'email'){
                              succsess.css("display", "none");
                              error.css("display", "block");
                              error.html('Указанный email уже занят!');
                        }
                        if(data == 'succsess'){
                              error.css("display", "none");
                              succsess.css("display", "block");
                              succsess.html('Вы зарегистрированы. На указанный email отправлено письмо активации.');
                        }
                        if(data == 'fail'){
                            succsess.css("display", "none");
                            error.css("display", "block");
                            error.html('Произошла техническая ошибка. Приносим извенения.');
                        }


                    }

                });

                return false; // required to block normal submit since you used ajax

        }
        });


    $.validator.messages.required = "Заполните поле!";
    $.validator.messages.email = "Неверный формат email";
    $.validator.messages.url = "Неверный формат url, начните с http://";

        $('.resetPass').click(function (e) {
            e.preventDefault();

            alertify.prompt( 'Восстановление пароля', 'Введите email', ' '
                , function(evt, value) {

                    $.ajax({
                        type: 'post',
                        url: 'resetPass',
                        data: {email:value},
                        dataType : 'json',
                        success: function(data){
                            if(data.status == 'success'){
                                alertify.success('На указанную почту отправлено письмо с временным паролем');
                            }
                            if(data.status == 'fail'){
                                alertify.error('Указанный Вами e-mail не найден в системе');
                            }
                            if(data.status == 'error'){
                                alertify.error('При восстановлении пароля произошла ошибка');
                            }
                        }

                    });}, function() {
                console.error("user canseled password reset");
            });
        })


    });

