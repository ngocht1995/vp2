<!-- hien thi service cac khoan sinh vien con thieu-->
        <?php if($arwrk[0]['code_ser'] =='SinhvienKSSV') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['SinhvienKSSVResult']['diffgram']['DocumentElement']['SinhvienKSSV']))
            {  
            $result = $result['SinhvienKSSVResult']['diffgram']['DocumentElement']['SinhvienKSSV'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             
          ?>
   <div id="result" class="tbl_bangdiem">        
                    <center><br>           
                    <h4 style="font-weight: bold">HOẠT ĐỘNG SINH VIÊN TRONG KHÁCH SẠN  </h4>
                    <?php  $_SESSION['header_title']  ='HOẠT ĐỘNG SINH VIÊN TRONG KHÁCH SẠN';
                           $_SESSION['title']  ='HoatDongSinhVienTrongKhachSan';
                    ?>
                      
                    </center><br>
               <form target="_blank" action="export_svkssv.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
      <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
<thead style="background-color:rgba(4, 99, 241, 0.73);">
                            <tr> 
                                    <th>Năm học</th>
                                    <th>Mã phòng</th>
                                    <th>Ngày vào</th>
                                    <th>Ngày ra</th>
                                    <th>Chỉ số điện khi vào</th>
                                    <th>Chỉ số nước lạnh khi vào</th>
                                    <th>Chỉ số nước nóng khi vào</th>
                                    <th>Chỉ số điện khi ra</th>
                                    <th>Chỉ số nước lạnh khi ra</th>
                                    <th>Chỉ số nước nóng khi ra</th>
                                    <th>Trạng thái</th>
                          
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaSinhVien'] <> null)
                         { ?>
                              <tr class="gradeX">
                                    <td class="center"><?php echo $result['NamHoc']; ?></td>
                                    <td class="center"> <a target="_blank" href="../tracuutt/ttsv_thongsodiennuoc.php?data=<?php echo $result['MaPhong']; ?>"><?php echo $result['MaPhong']; ?> </a></td>
                                    <td class="center"><?php echo $result['NgayVao']; ?></td>
                                    <td class="center">
                                        <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['NgayRa'];   
                                            ?> 
                                    </td>
                                    <td class="center"><?php echo $result['chiSoDienKhiVao']; ?></td>
                                    <td class="center"><?php echo $result['chiSoNuocLanhKhiVao']; ?></td>
                                    <td class="center"><?php echo $result['chiSoNuocNongKhiVao']; ?></td>
                                    <td class="center">
                                          <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['chiSoDienKhiRa'];   
                                            ?> 
                                    </td>
                                    <td class="center">
                                           <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['chiSoNuocLanhKhiRa'];   
                                            ?> 
                                    </td>
                                    <td class="center">
                                            <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['chiSoNuocNongKhiRa'];   
                                            ?> 
                                    </td>
                                    <td class="center">
                                         <?php 
                                            if ($status > 0)  
                                            echo "<b>".$result['TrangThai']."</b>";  
                                            else 
                                            echo $result['TrangThai'];   
                                            ?> 
                                    </td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                               if(trim($result[$i]['TrangThai']) == 'Đang ở') $status =1;
                               else $status =0  ;
                               $curYear = date('Y'); 
                               if ($curYear == substr($result[$i]['NamHoc'],-4))
                               $url="<a title=\"Click xem thông tin chi tiết điện nước theo tháng tại phòng\" style=\"font-size:12px;text-decoration:underline\" target=\"_blank\" href=\"../tracuutt/ttsv_thongsodiennuoc.php?data=".$result[$i]['MaPhong']."\">".$result[$i]['MaPhong']."</a>"; 
                               else
                               $url ="<span style=\"font-size:12px\">".$result[$i]['MaPhong']."</span>" ;      
                            ?>
                               
                               <tr class="gradeX">
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td>
                                    <td class="center">	
                                     <?php echo $url; ?>
                                    </td>
                                    <td class="center"><?php echo $result[$i]['NgayVao']; ?></td>
                                    <td class="center">
                                        <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['NgayRa'];   
                                            ?> 
                                    </td>
                                    <td class="center"> <?php echo $result[$i]['chiSoDienKhiVao'];?> </td>
                                    <td class="center"><?php echo $result[$i]['chiSoNuocLanhKhiVao']; ?></td>
                                    <td class="center"><?php echo $result[$i]['chiSoNuocNongKhiVao']; ?></td>
                                    <td class="center">
                                          <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['chiSoDienKhiRa'];   
                                            ?> 
                                    </td>
                                    <td class="center">
                                           <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['chiSoNuocLanhKhiRa'];   
                                            ?> 
                                    </td>
                                    <td class="center">
                                            <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['chiSoNuocNongKhiRa'];   
                                            ?> 
                                    </td>
                                    <td class="center">
                                         <?php 
                                            if ($status > 0)  
                                            echo "<b>".$result[$i]['TrangThai']."</b>";  
                                            else 
                                            echo $result[$i]['TrangThai'];   
                                            ?> 
                                    </td>
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                    </table>
                	 
           </div>
                 <div style="padding:30px 0px 10px 0px;" class="export"> 
                    <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                    </center>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
  <div class="error">
                <center>    
            <img src="../images/stop.png" alt="stop" class="error_picture">
            <h2 style="color:red;">Không tồn tại sinh viên trong khách sạn !</h2>
                </center>
            </div>
</div>
            <?php } ?>
      <?php }?>