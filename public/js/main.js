/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    //alert("dsf");
   $("#searchBox").keyup(function(){
     var key = $(this).val();
     $("#inner_title").html("Search Result for : '"+key+"'");
   });
   
   $("#uploadPic").click(function(){
    $.ajax({
          url:uploadURL,
          data:new FormData($("#upload_form")[0]),
          dataType:'json',
          async:false,
          type:'post',
          processData: false,
          contentType: false,
          success:function(response){
            $("#upload_profile_result").html(response);
            window.location.reload();
          },
          beforeSend:function(dd){
             $("#upload_profile_result").html('<img height="60" width="60" src="'+loadingIMG+'" />'); 
          }
        });
     });
 
 
   $("#saveProfile").click(function(){
       var name = $("#name").val();
       var address = $("#address").val();
       var phone = $("#phone").val();
       
       var education = $("#education").val();
       var profession = $("#profession").val();
       var about = $("#about").val();
       
       $.ajax({
          type:"POST",
          url:url,
          data: {user_id:user_id,name:name,phone:phone, 
                    address:address,education:education, 
                    about:about,
                    profession:profession, _token:token},
          success:function(msg){
              $("#edit_profile_result").html(msg);
              window.location.reload();
          },
          beforeSend:function(d){
              $("#edit_profile_result").html('<img height="60" width="60" src="'+loadingIMG+'" />');
          }
       });
               
   })
});
