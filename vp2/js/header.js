
                        $(document).ready(function(){
                            $("#atracuu<?php echo $arwrk[$i]['services_id']; ?>").click(function () {
                            document.getElementById("header").style.display="none";
                            document.getElementById("table_menu2").style.display="none";
                        document.getElementById("table_menu").style.display="block";
                        document.getElementById("table_thongbao").style.display="none";
                        document.getElementById("table_menu3").style.display="none";
                                $("#htht2").html('<div class="gif"><img  src="../images/common/loading6.gif" class="loading-gif" style="width:300px;height:200px;"><br>Đang kiểm tra </div>');
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
      