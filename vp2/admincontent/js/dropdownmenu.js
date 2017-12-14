$(document).ready(function() { 

$("#navmenu li").hover(function(){

        $(this).find('ul:first').css({visibility: "visible",display: "none"}).show(200);
        },function(){ 
        $(this).find('ul:first').css({visibility: "hidden"}); 

        }); 
});  