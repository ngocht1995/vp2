<!-- hien thi service hoc bong  cua sinh vien-->
        <?php if($arwrk[0]['code_ser'] =='HocBongSinhVien') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['HocBongSinhVienResult']['diffgram']['DocumentElement']['HocBongSinhVien']))
            {  
            $result = $result['HocBongSinhVienResult']['diffgram']['DocumentElement']['HocBongSinhVien'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
<div id="result" class="tbl_bangdiem">
<div id="ReportTable" >
<table style="width: 80%;margin-bottom: 20px;position: relative;left: 100px;color:white">
    <tr><br>
        <td colspan="4" style="text-align: center">
            <h2 class="phead_tientrinh">
                <b> Học Bổng Sinh Viên </b>
          
            </h2>
        </td>
    </tr>
    <tr>
        <td><span style="font-weight: bold; " > Họ tên:</span></td><td><?php echo $_SESSION['arraythongtin']['HoTen'] ?></td>
        <td><span style="font-weight: bold;">Tình trạng:</span></td><td> <?php echo $_SESSION['arraythongtin']['TinhTrang'] ?></td>
    </tr>
    <tr>
        <td><span style="font-weight: bold;">Ngày sinh:</span></td><td> <?php echo $_SESSION['arraythongtin']['NgaySinh'] ?></td>
        <td><span  style="font-weight: bold;">Giới tính:</span></td><td> <?php echo $_SESSION['arraythongtin']['GioiTinh'] ?></td>
    </tr>
    <tr>
        <td><span style="font-weight: bold;">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?></td>
        <td><span style="font-weight: bold;">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="font-weight: bold;" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="font-weight: bold;" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
               <form target="_blank"  method="post">

 
                           
      <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                     <th style="text-align: center" class="center"> Năm học  </th>
                                    <th style="text-align: center">Điểm trung bình <br/> trung học tập</th>
                                    <th style="text-align: center">Xếp loại <br/> học tập</th>
                                    <th style="text-align: center" class="center"> Xếp loại <br/> rèn luyện </th> 
                                    <th style="text-align: center" class="center"> Xếp loại <br/> học bổng </th> 
                                 
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['NamHoc'] <> null)
                         { ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo $result['NamHoc']; ?></td>
                                    <td align="center"><?php echo $result['diemTBCHT']; ?></td>
                                    <td align="center"><?php echo $result['XepLoaiHocTap']; ?></td>
                                    <td align="center"><?php echo $result['XepLoaiRenLuyen']; ?></td>
                                    <td align="center"><?php echo $result['XepLoaiHocBong']; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                               <tr class="gradeX">
                                    <td align="center"><?php echo $result[$i]['NamHoc']; ?></td>
                                    <td align="center"><?php echo $result[$i]['diemTBCHT']; ?></td>
                                    <td align="center"><?php echo $result[$i]['XepLoaiHocTap']; ?></td>
                                    <td align="center"><?php echo $result[$i]['XepLoaiRenLuyen']; ?></td>
                                    <td align="center"><?php echo $result[$i]['XepLoaiHocBong']; ?></td>
                               
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                    </table>
                </div>
                <div style="padding:30px 0px 10px 0px">
                    <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                
                    </center>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
             <div class="notice">
             <center>
               <img src="../images/stop.png" alt="stop" class="notice_picture">
            <h2 style="color:red;">Dữ liệu chưa được cập nhật !</h2>
             </center>
            </div>
</div>
            <?php } ?>
      <?php }?>