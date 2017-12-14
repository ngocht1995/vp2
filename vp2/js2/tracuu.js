$(document).ready(function(){
     $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
       $("#htht").html('<center style="margin-top:100px"><img  src="../images/common/ajax-loading.gif">...Đang tải...</center>');
       $.ajax({
            type: "POST",
            data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
            url: "msvajax.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });