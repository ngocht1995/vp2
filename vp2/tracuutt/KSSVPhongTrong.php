<!-- hien thi service cac phong trống trong khác sạn sinh viên-->
        <?php if($arwrk[0]['code_ser'] =='KssvPhongTrong') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['KssvPhongTrongResult']['diffgram']['DocumentElement']['KssvPhongTrong']))
            {  
            $result = $result['KssvPhongTrongResult']['diffgram']['DocumentElement']['KssvPhongTrong'];
           // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
  <div  id="result" class="tbl_bangdiem">
                    <center><br>           
                    <h2 style="font-weight: bold;">DANH SÁCH PHÒNG TRỐNG TRONG KSSV  </h2>
                    <?php  $_SESSION['header_title']  ='DANH SÁCH PHÒNG TRỐNG TRONG KSSV';
                           $_SESSION['title']  ='danhsachphongtrongkssv';
                    ?>
                      
                    </center><br>
               <form target="_blank" action="export_svkssv.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                <link rel="stylesheet" href="../css2/reveal.css">	 
  		<script type="text/javascript" src="../js2/jquery.reveal.js"></script>
		<style type="text/css">
			body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
			.big-link { display:block; text-align: center;color: #06f; }
		</style>    
 <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
            <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th> STT</th>
                                    <th> Mã phòng</th>
                                    <th> Loại phòng</th>
                                    <th> Số lượng</th>
                                    <th>Bạn cùng phòng</th>
                                   <!--  <th></th> -->
                                   
                          
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaPhong'] <> null)
                         { ?>
                              <tr class="gradeX">
                                    <td class="center"><?php echo '1'; ?></td>
                                    <td class="center"><?php echo $result['MaPhong']; ?></td>
                                    <td class="center"><?php echo $result['LoaiPhong']; ?></td>
                                    <td class="center"><?php echo $result['SoSVDangO']."/".$result['SoGiuong']; ?></td>
                                    <td class="center"><a> 
                                         <?php
                                            if (trim($result['SoSVDangO'])>0)
                                            echo  'D/s người trong phòng';
                                         ?>   
                                           </a></td>
                                  <!--   <td class="center"><a>Đặt phòng</a></td> -->
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                   
                               <tr class="gradeX">
                                    <td class="center"><?php echo $i+1; ?></td>
                                    <td class="center"><?php echo $result[$i]['MaPhong']; ?></td>
                                    <td class="center"><?php echo $result[$i]['LoaiPhong']; ?></td>
                                    <td class="center"><?php echo $result[$i]['SoSVDangO']."/".$result[$i]['SoGiuong']; ?></td>
                                    <td class="center">	
                                   <a href="#" class="big-link"  onClick="addHit('<?php echo $result[$i]['MaPhong']; ?>')" data-reveal-id="myModal">
                                     <?php  if ($result[$i]['SoSVDangO']  <> '0'  ) 
                                     { echo 'Bạn cùng phòng';}
                                     ?>
                                            </a>
                                      <script>
                                                        function addHit(data1)
                                                        {   
                                                            $.ajax({
                                                            type: "POST",
                                                            url: "ttsv_cungphong.php",
                                                            data: "data="+ data1,
                                                            success: function(msg){
                                                                 $(".reveal-modal").html(msg).show();
                                                            }
                                                            });
                                                        }
                                                        
                                         </script>
                                     
                                    </td>
                                   <!--  <td class="center"><a>Đặt phòng</a></td> -->
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                    </table>
              <div id="myModal" class="reveal-modal">
	              
			<a class="close-reveal-modal">&#215;</a>
		</div>
                </div>
      <div style="padding:30px 0px 10px 0px;" class="export"> 
                    <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">

                    </center>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
 <div class="notice">
            <img src="../images/stop.png" alt="stop" class="notice_picture">
            <h2 style="color:red;">Không tồn tại phòng trống trong khách sạn sinh viên !</h2>
            </div>

            <?php } ?>
      <?php }?>