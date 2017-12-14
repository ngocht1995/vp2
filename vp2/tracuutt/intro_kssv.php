<style>

@media (max-width:414px){
  .intro_ks{
    width:370px;
  }
 } 
</style>
<!-- hien thi service thong tin khach san sinh vien-->
        <?php if($arwrk[0]['code_ser'] =='SoChoTrongKSSV') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['SoChoTrongKSSVResult']['diffgram']['DocumentElement']['SoChoTrongKSSV']))
            {  
            $result = $result['SoChoTrongKSSVResult']['diffgram']['DocumentElement']['SoChoTrongKSSV'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
   <div id="result" class="tbl_bangdiem">
<h4 style="padding: 5px 5px 5px 5px"><b> Thống kê hiện thời phòng tại khách sạn sinh viên </b></h4>
  <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th style="text-align: center" >STT</th>
                                    <th  style="text-align: center" >Loại phòng</th>
                                    <th  style="text-align: center" >Số SV đang ở</th>
                                    <th  style="text-align: center" >Số chỗ trống</th>  
                                    <th  style="text-align: center" >Tổng số chỗ</th> 
                            </tr>
                    </thead>
                     <tbody>
                         <?php 
                           for($i =0; $i<Count($result); $i++)
                               { 
                         ?>
                              <tr class="gradeX">
                                    <td class="center"><?php echo $i+1; ?></td>
                                    <td class="center"><?php echo $result[$i]['Loai']; ?></td>
                                    <td class="center"><?php echo $result[$i]['SoSVDangO']; ?></td>
                                    <td class="center"><?php echo $result[$i]['SoChoTrong']; ?></td>
                                    <td class="center"><?php echo $result[$i]['TongSoCho']; ?></td>
                                </tr>
                         <?php  } ?>
                     </tbody>
   </table>
<div style="clear: both"></div></div><br><br>
<div  id="result" class="tbl_bangdiem">
<h4 style="padding:5px"><b> Bảng giá sử dụng điện nước hiện thời tại khách sạn sinh viên</b></h4>
<table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th style="text-align: center" >STT</th>
                                    <th  style="text-align: center" >Giá điện</th>
                                    <th  style="text-align: center" >Giá nước lạnh</th>
                                    <th  style="text-align: center" >Giá nước nóng</th>  
                                    <th  style="text-align: center" >Giá phòng ở</th>
                                    <th  style="text-align: center" >Thời gian áp dụng</th> 
                            </tr>
                    </thead>
                     <tbody>
                         <?php 
                           $array_giatien= Get_arrayservice('1354020033','GiaDienNuocKSSV');
                           $array_giatien = $array_giatien['GiaDienNuocKSSVResult']['diffgram']['DocumentElement']['GiaDienNuocKSSV']; // mang tien tinh theo thoi gian
                           $max =Count($result);
                            
                         ?>
                              <tr class="gradeX">
    <td class="center"><?php echo 1; ?></td>
    <td class="center"><?php echo display_number($array_giatien[0]['giaDien'])."/số"; ?></td>
    <td class="center"><?php echo display_number($array_giatien[0]['giaNuocLanh'])."/khối"; ?></td>
    <td class="center"><?php echo display_number($array_giatien[0]['giaNuocNong'])."/khối"; ?></td>
    <td class="center"><?php echo display_number($array_giatien[0]['giaPhongO'])."/ngày"; ?></td>
    <td class="center"><?php echo date ('j/m/Y',strtotime($array_giatien[0]['apDungTuNgay'])); ?></td>
</tr>
                                </tr>
             
                     </tbody>
                      <tfoot style="background-color: green;color:white">
                                <tr>
                                    <th colspan="6">Đơn vị tính: VNĐ</th>
                                </tr>
                      </tfoot>
    </table>
<div style="clear: both"></div></div><br><br>
<div id="result" class="intro_ks">
    <?php echo $arwrk[0]['descript_ser'] ?>
</div>
            <?php } else { ?>
      <div class="notice">                   
            <h2 style="color:red;">Không có thông tin về khách sạn sinh viên !</h2>
            
            </div>

            <?php } ?>
      <?php }?>