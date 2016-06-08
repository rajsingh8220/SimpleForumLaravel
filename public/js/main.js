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
   
   $("#saveProfile").click(function(){
       var name = $("#name").val();
       var address = $("#address").val();
       var phone = $("#phone").val();
       
       $.ajax({
          type:"POST",
          url:url,
          data: {user_id:user_id,name:name,phone:phone, address:address, _token:token},
          success:function(msg){
              $("#edit_profile_result").html(msg);
              window.location.reload();
          },
          beforeSend:function(d){
              $("#edit_profile_result").html("Please Wait");
          }
       });
               
   })
});
