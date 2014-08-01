

$(document).ready(function(){

    $("#login_form").validate({
        
       rules:{

           email:{
                email: true,

            },

           password:{
                required: true,
                minlength: 6,
                maxlength: 16,
            },
       },
       
       messages:{

           email:{
                email: "Укажите правильный email",

            },

           password:{
                required: true,
                minlength: "Пароль должен быть минимум 6 символа",
                maxlength: 16,
            },
        
       },


        
    });


}); //end of ready