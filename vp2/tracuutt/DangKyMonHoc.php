
<?php 
   if($arwrk[0]['code_ser'] =='MonHocDangKy') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
     if (isset($result['MonHocDangKyResult']['diffgram']['DocumentElement']['MonHocDangKy'])) 
        {
        $result = $result['MonHocDangKyResult']['diffgram']['DocumentElement']['MonHocDangKy'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        ?>
            <div id="result" class="tbl_bangdiem">     
           <h1 style="font-weight: bold;text-align: center">CÁC MÔN HỌC ĐĂNG KÝ </h1><br>
            <?php  $_SESSION['header_title']  ='CÁC MÔN HỌC ĐĂNG KÝ';
                   $_SESSION['title']  ='CacMonHocDangKy';
            ?>
            
            <center>                
 <table class="display table" >
    <tr>
        <td colspan="4" style="text-align: center">
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM RÚT GỌN';
                   $_SESSION['title']  ='BangDiem';
            ?> 
        </td>
    </tr>
    
            </center> 
 <form target="_blank" action="export_dkmh.php" method="post" onsubmit='$("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                   <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th class="sophieu" >Mã lớp</th>
                                    <th class="sophieu" >Mã môn</th>
                                    <th class="ngaythu">Tên môn học</th>
                                    <th class="noidung">Số t/c</th>
                                    <th class="sotien"  >Số tiền</th>
                                    <th class="hocky">Học kỳ</th>
                                    <th class="namhoc">Năm học</th>
                                    <th class="phieuhuy"> Trạng thái </th>

                            </tr>
                    </thead>
                  <?php 
                  if ($result['MaMonhoc'] <> null)
                         { 
                   ?>
                    <tbody>
                            <tr class="gradeX">
            <td style="color:brown"><?php
            if( $result['MaLop'] <> "") echo $result['MaLop'] ;
            else echo  $_SESSION['arraythongtin']['MaLop'] ;
            ?></td>  
            <td class="center" style="color:green"><?php echo $result['MaMonHoc']; ?></td>  
            <td style=""><?php echo $result['TenMonHoc']; ?></td>
            <td class="center"><?php echo $result['sotc']; ?></td>
            <td style="text-align: right;"><?php echo $result['HocPhi']; ?></td>
            <td class="center"><?php echo $result['HocKy']; ?></td>
            <td class="center"><?php echo $result['NamHoc']; ?></td> 
            <td class="center"><?php echo $result['TrangThai']; ?></td>    
                            </tr>
                   
                    </tbody>
                    <?php } else  { ?>
                     <tbody>
                            <?php for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                            <tr class="gradeX">
        <td style="color:brown"><?php
        if( $result[$i]['MaLop'] <> null) echo $result[$i]['MaLop'] ;
        else echo  $_SESSION['arraythongtin']['MaLop'] ;
        ?></td>  
        <td style="color:green" ><?php echo $result[$i]['MaMonHoc']; ?></td>  
        <td style=""><?php echo $result[$i]['TenMonHoc']; ?></td>
        <td class="center"><?php echo $result[$i]['sotc']; ?></td>
        <td style="text-align: right;color:brown"><?php echo $result[$i]['HocPhi']; ?></td>
        <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
        <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
        <td class="center"><?php echo $result[$i]['TrangThai']; ?></td>    
                            </tr>
                            <?php } ?>
                    </tbody>
                    <?php } ?>
                    </table>
                </div>
         <div class="export"> 
     <input type="hidden" id="datatodisplay" name="datatodisplay">
        <input id="export_excel" type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
            </form>
</div>
</div>
                <div style="clear:both"></div>
            <?php } else { ?>

 <div class="error">
   
        <img src="../images/error.jpg" alt="stop" class="error_picture">
<h2 style="color:red;">Không tồn tại môn học đã đăng ký !</h2>              
  </div>

     <?php } ?>
<?php } ?>