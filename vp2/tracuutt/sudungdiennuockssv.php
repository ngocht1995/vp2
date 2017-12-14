<!-- hien thi service cac khoan thu của sinh viên khi ở trong khách sạn-->
        <?php if($arwrk[0]['code_ser'] =='SuDungDienNuocKSSVTheoSinhVien') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['SuDungDienNuocKSSVTheoSinhVienResult']['diffgram']['DocumentElement']['SuDungDienNuocKSSVTheoSinhVien']))
            {  
            $result = $result['SuDungDienNuocKSSVTheoSinhVienResult']['diffgram']['DocumentElement']['SuDungDienNuocKSSVTheoSinhVien'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>
   <div id="result" class="tbl_bangdiem">
                    <center>   <br>        
                    <h4 style="font-weight: bold;">CÁC KHOẢN THU KHI SINH VIÊN Ở TRONG KHÁCH SẠN  </h4>
                    </center><br>
  <table class="display table">
    <tr>
        <td colspan="4" style="text-align: center;">
            <h2 class="phead_tientrinh">
                <b> </b>
            </h2>
        </td>
    </tr>
    <tr>
        <td><span style="font-weight: bold; " > Họ tên:</span></td><td><?php echo $_SESSION['arraythongtin']['HoTen'] ?></td>
        <td><span style="font-weight: bold; ">Tình trạng</span></td><td> <?php echo $_SESSION['arraythongtin']['TinhTrang'] ?></td>
    </tr>
    <tr>
        <td><span style="font-weight: bold; ">Ngày sinh:</span></td><td> <?php echo $_SESSION['arraythongtin']['NgaySinh'] ?></td>
        <td><span  style="font-weight: bold; ">Giới tính:</span></td><td> <?php echo $_SESSION['arraythongtin']['GioiTinh'] ?></td>
    </tr>
    <tr>
        <td><span style="font-weight: bold; ">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?></td>
        <td><span style="font-weight: bold; ">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="font-weight: bold; " class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="font-weight: bold; " class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
               <form target="_blank" action="export_cksvct.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
           
                     <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th>Mã Phòng</th>
                                    <th>Ngày Vào</th>
                                    <th>Ngày Ra</th>
                                    <th>Tiền Điện</th>
                                    <th>Tiền Nước</th>
                                    <th>Tiền Nước Nóng </th>
                                    <th>Tiền nhà </th>
                                    <th>Tổng tiền (ĐV:VNĐ)</th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaSinhVien'] <> null)
                         {
                      $tong_tien= $tong_tien+($result['TongCong']);
                   ?>
                              <tr class="gradeX">
                                    <td class="center"><?php echo $result['MaPhong']; ?></td>
                                    <td class="center"><?php echo date ( 'j/m/Y' ,strtotime ($result['NgayVao'])); ?></td>
                                    <td class="center"><?php echo date ( 'j/m/Y' ,strtotime ($result['NgayRa'])); ?></td>
                                    <td class="center"><?php echo display_number($result['TienDien']); ?></td>
                                    <td class="center"><?php echo display_number($result['TienNuocLanh']); ?></td>
                                    <td class="center"><?php echo display_number($result['TienNuocNong']); ?></td>
                                    <td class="center"><?php echo display_number($result['TienNha']); ?></td>
                                    <td class="center"><?php echo display_number($result['TongCong']); ?></td>
                                </tr>
                              
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien= $tong_tien+($result[$i]['TongCong']);
                            ?>
                               <tr class="gradeX">
                                     <td class="center"><?php echo $result[$i]['MaPhong']; ?></td>
                                    <td class="center"><?php echo date ( 'j-m-Y' ,strtotime ($result[$i]['NgayVao'])); ?></td>
                                    <td class="center"><?php echo date ( 'j-m-Y' ,strtotime ($result[$i]['NgayRa'])); ?></td>
                                    <td class="center"><?php echo display_number($result[$i]['TienDien']); ?></td>
                                    <td class="center"><?php echo display_number($result[$i]['TienNuocLanh']); ?></td>
                                    <td class="center"><?php echo display_number($result[$i]['TienNuocNong']); ?></td>
                                    <td class="center"><?php echo display_number($result[$i]['TienNha']); ?></td>
                                    <td class="center"><?php echo display_number($result[$i]['TongCong']); ?></td>
                                </tr>
                            <?php } ?>         
                     <?php  } ?>
                     </tbody>
                    </table>
                   
                   <br/>
                    <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền: </b><?php echo display_number($tong_tien); ?> (VNĐ)
                    <span style="font-style: italic">  
                    <?php
                      echo "(".docso($tong_tien)."VNĐ)";
                      ?>    
                   </span>
                </div>
                  
                <div style="padding:30px 0px 10px 0px">
                    <center>
           
                    </center>
                </div>
            </form>
            </div>
                <div style="clear:both"></div>

            <?php } else { ?>
             <div class="notice">
             <center>
            <h2 style="color:red;">Sinh viên không ở nội trú hoặc vẫn đang ở nên không có số liệu!</h2>
            </center>
            </div>

            <?php } ?>
      <?php }?>