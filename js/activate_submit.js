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

                alert('fuck');

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
                              succsess.html('Вы зарегестрированы. На указанный email отправлено письмо активации.');
                        }


                    }

                });

                return false; // required to block normal submit since you used ajax

        }
        });


    $.validator.messages.required = "Заполните поле!";
    $.validator.messages.email = "Неверный формат email";
    $.validator.messages.url = "Неверный формат url, начните с http://";


    });

