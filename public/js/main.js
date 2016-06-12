/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
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
   
   
    
    $("#submitComment").click(function(){
        var question_id = $("#question_id").val();
        var comment = $("#comment").val();
        if(comment==''){
            $("#result_message").html("<b style='color:red;'>Please Enter Comment</b>");
        }else{
            $.ajax({
                type:"POST",
                url:commentURL,
                dataType: 'json',
                data: {user_id:user_id,question_id:question_id,comment:comment,_token:token},
                success:function(msg){
                    $("#result_message").html("<b style='color:green;'>Successfully Posted</b>");
                    $("#commentForm").hide(200);
                    $('#comments_div').append('<div class="alert alert-info">'+comment+'</div>');
                    $("#comment").val() = "";
                },
                beforeSend:function(d){
                    $("#result_message").html('<img height="60" width="60" src="'+loadingIMG+'" />');
                }
             });  
        }
        
    });
          
});
