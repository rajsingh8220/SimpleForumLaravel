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
});
