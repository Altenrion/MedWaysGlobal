/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(".choice").click(function(){
    var patient = $(this).attr('id');
    
    $.post( "PatientDB", { patient:patient } );
    $("#patient").html(patient);
    $("#patientdel").html(patient);

});


$(".thumbnail").click(function(){
    var image = $(this).attr('id');
    
    $.post( "Images", { image:image } );
    $("#image").html(image);
    $("#imagedel").html(image);

});

//  E4LYGPL5GFHRMFXDHT6W

