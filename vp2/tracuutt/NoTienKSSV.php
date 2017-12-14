<!-- hien thi service cac khoan sinh vien còn nợ trong KSSV-->
        <?php if($arwrk[0]['code_ser'] =='NoTienKSSV') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['NoTienKSSVResult']['diffgram']['DocumentElement']['NoTienKSSV']))
            {  
            $result = $result['NoTienKSSVResult']['diffgram']['DocumentElement']['NoTienKSSV'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>
                    <center>           
                    <h4 style="font-weight: bold;color:black">KHOẢN NỢ KHÁCH SẠN SINH VIÊN </h4>  
                    </center>
               <form target="_blank" action="export_cksvct.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" > 
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                  
                                    <th>Tên khoản</th>
                                    <th>Số tiền quy định</th>
                                    <th>Số tiền thay đổi</th>
                                    <th>Số tiền miễn giảm</th>
                                    <th>Số tiền kỳ trước chuyển sang</th>
                                    <th>Số tiền đã thu</th>
                                    <th>Số tiền phải chi</th>
                                    <th>Số tiền đã chi</th>
                                    <th>Số tiền chuyển sang kỳ sau</th>
                                    <th>Số tiền còn thiếu (VNĐ)</th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['maSinhVien'] <> null)
                         { 
                      $tong_tien= $tong_tien+($result['Thieu']);
                   ?>
                              <tr class="gradeX">
                                   
                                    <td><?php echo $result['Ten']; ?></td>
                                    <td class="center"<?php echo display_number($result['soTienQuyDinh']); ?></td>
                                    <td class="center"><?php echo $result['SoTienThayDoi']; ?></td>
                                    <td class="center"><?php echo $result['soTienMienGiam']; ?></td>
                                    <td class="center"<?php echo $result['SoTienKyTruocChuyenSang']; ?></td>
                                    <td class="center"<?php echo  display_number($result['SoTienDaThu']); ?></td>
                                    <td class="center"<?php echo $result['SoTienPhaiChi']; ?></td>
                                    <td class="center"<?php echo $result['SoTienDaChi']; ?></td>
                                    <td class="center"<?php echo $result['SoTienChuyenSangKySau']; ?></td>
                                    <td class="center"<?php echo display_number($result['Thieu']); ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien= $tong_tien+($result[$i]['Thieu']);
                            ?>
                               <tr class="gradeX">
                                    <td class="center"><?php echo $result[$i]['namHoc']; ?></td>
                                    <td class="center"><?php echo $result[$i]['Ten']; ?></td>
                                    <td class="center"<?php echo display_number($result[$i]['soTienQuyDinh']); ?></td>
                                    <td class="center"><?php echo $result[$i]['SoTienThayDoi']; ?></td>
                                    <td class="center"><?php echo $result[$i]['soTienMienGiam']; ?></td>
                                    <td class="center"<?php echo $result[$i]['SoTienKyTruocChuyenSang']; ?></td>
                                    <td class="center"<?php echo  display_number($result[$i]['SoTienDaThu']); ?></td>
                                    <td class="center"<?php echo $result[$i]['SoTienPhaiChi']; ?></td>
                                    <td class="center"<?php echo $result[$i]['SoTienDaChi']; ?></td>
                                    <td class="center"<?php echo $result[$i]['SoTienChuyenSangKySau']; ?></td>
                                    <td class="center"<?php echo display_number($result[$i]['Thieu']); ?></td>
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                    </table>
                     <br/>
                   <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền thiếu: </b><?php echo display_number($tong_tien); ?> (VNĐ)</p></div>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
            <div class="notice">
                <center>
            <h2 style="color:red;">Sinh viên không nợ tiền KSSV!</h2>
              </center>
            </div>

            <?php } ?>
      <?php }?>