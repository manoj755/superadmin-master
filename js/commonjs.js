/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
   $('body').delegate('.list-group-item','click',function(){
       $(this).addClass('active');
       $('.list-group .list-group-item').not($(this)).removeClass('active');
   });
  
});

