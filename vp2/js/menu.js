       
                $(document).ready(function(){
                     $("#btn_menu").click(function () {
                        document.getElementById("header").style.display="block";
                        document.getElementById("table_menu").style.display="none";
                        document.getElementById("table_menu2").style.display="none"; 
                        document.getElementById("table_menu3").style.display="none"; 
                        document.getElementById("table_menu4").style.display="none"; 
                         document.getElementById("table_thongbao").style.display="none"; 


                    });
                  });
                
                 
                                    $(document).ready(function(){
                                      $("#bnttracuu").click(function () {
                                        var char =  $("#txtmsv").val();
                                       var frstchar = char.charAt(0);
                                             
                                          if(!isNaN(frstchar)) 
                                           {
                                        document.getElementById("header").style.display="none";
                                        document.getElementById("table_menu").style.display="none";
                                        document.getElementById("table_menu2").style.display="none";
                                        document.getElementById("table_menu3").style.display="none";
                                        document.getElementById("table_thongbao").style.display="block";                         
                                              $.ajax({
                                                type: "POST",
                                                data: "msv=" + $("#txtmsv").val(),
                                               url: "secure.php",
                                                success: function(msg){
                                                    if (msg != ''){
                                                       $("#htht").html(msg).show();
                                                       $("#default_profile").hide();
                                                    }
                                                    else{
                                                        $("#htht").html('<em>No item result</em>');
                                                    }
                                                }
                                                });
                                            }

                                           else
                                           {
                                               $("#htht2").html('<div class="gif"><img  src="../images/common/loading7.gif" class="loading-gif"><br>Đang tìm kiếm </div>');   

                                            document.getElementById("header").style.display="none";
                                            document.getElementById("table_menu").style.display="block";
                                            document.getElementById("table_menu2").style.display="none";
                                            document.getElementById("table_menu3").style.display="none";
                                            document.getElementById("table_thongbao").style.display="none";
                                                $.ajax({
                                                type: "POST",
                                                data: "msv_fullname=" + $("#txtmsv").val(),
                                                url: "tracuutt/secure_fullname.php",
                                                success: function(msg){
                                                    if (msg != ''){
                                                      $("#htht2").html(msg).show();
                      
                                                    }
                                                    else{
                                                        $("#htht2").html('<em>No item result</em>');
                                                    }
                                                }
                                            });
                                           } 


                                      });
                                      });
                                    
                   
                $(document).ready(function(){
                     $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                        document.getElementById("header").style.display="none";
                        document.getElementById("table_menu2").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                        document.getElementById("table_menu3").style.display="none";
                        document.getElementById("table_thongbao").style.display="none";
                       $("#htht2").html('<div class="gif"><img  src="../images/common/loading2.gif" class="loading-gif"><br>Đang tính tiền </div>');
                       $.ajax({
                            type: "POST",
                            data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                            url: "tracuutt/msvajax.php",
                            success: function(msg){
                                if (msg != ''){      
                                   $("#htht2").html(msg).show(); 

                                }
                                else{
                                    $("#htht2").html('<em>No item result</em>');
                                }
                            }
                        });
                    });
                  });
                  
    
                        $(document).ready(function(){
                            $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                            document.getElementById("header").style.display="none";
                            document.getElementById("table_menu2").style.display="none";
                            document.getElementById("table_menu3").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                        document.getElementById("table_thongbao").style.display="none";
                  $("#htht2").html('<div class="gif"><img  src="../images/common/loading3.gif" class="loading-gif"><br>Đang kiểm tra điểm </div>'); 
                                $.ajax({
                                    type: "POST",
                                    data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                                    url: "tracuutt/msvajax.php",
                                    success: function(msg){
                                        if (msg != ''){
                                            $("#htht2").html(msg).show();
                                        }
                                        else{
                                            $("#htht2").html('<em>No item result</em>');
                              }
                          }
                      });
                  });
                });
               
     
                        $(document).ready(function(){
                            $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                            document.getElementById("header").style.display="none";
                            document.getElementById("table_menu2").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                         document.getElementById("table_menu3").style.display="none";
                        document.getElementById("table_thongbao").style.display="none";
                                $("#htht2").html('<div class="gif"><img  src="../images/common/loading4.gif" class="loading-gif"><br>Đang kiểm tra </div>');
                                $.ajax({
                                    type: "POST",
                                    data: "msv="+$("#txtmsv").val()+"&ser_code=" + <?php echo $arwrk[$i]['services_id']; ?>,
                                    url: "tracuutt/msvajax.php",
                                    success: function(msg){
                                        if (msg != ''){
                                            $("#htht2").html(msg).show();
                                        }
                                        else{
                                            $("#htht2").html('<em>No item result</em>');
                              }
                          }
                      });
                  });
                });
                         