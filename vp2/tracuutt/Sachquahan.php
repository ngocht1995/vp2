<!-- hien thi service sach qua han -->
        <?php if($arwrk[0]['code_ser'] =='BanDocQuaHan') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            $result= Get_arrayservice_book($msv,'BanDocQuaHan');
            if (isset($result['BanDocQuaHanResult']['diffgram']['DocumentElement']['BanDocQuaHan']))
            {  
            $result = $result['BanDocQuaHanResult']['diffgram']['DocumentElement']['BanDocQuaHan'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
                    <center>  
                    <br/>
                    <h2 style="font-weight: bold;color:black"> DANH SÁCH ẤN PHẨM ĐANG MƯỢN </h2>
                    <?php  
                           $_SESSION['header_title']  ='DANH SÁCH ẤN PHẨM ĐANG MƯỢN';
                           $_SESSION['title']  ='BanDocQuaHan';
                    ?>
                      
                    </center>
               <form target="_blank" action="export_msvntk.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 12px">
                    <thead>
                            <tr> 
                                    <th  width="5%"  style="text-align: center" class="center">STT</th>
                                    <th  width="15%" class="noidung center">Mã ấn phẩm</th>
                                    <th  width="30%"class="center"> Tên ấn phẩm </th> 
                                    <th  width="10%" class="noidung center">Ngày mượn</th>
                                    <th  width="10%"style="text-align: center" class="center"> Ngày phải trả</th>   
                                    <th  width="10%"class="noidung center">Số ngày quá hạn</th>
                                   <th   width="20%" style="text-align: center" class="center"> Ghi chú </th>   
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaBanDoc'] <> null)
                         { ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo 1; ?></td>
                                    <td><?php echo $result['MaAnPham']; ?></td>
                                    <td><?php echo $result['TenAnPham']; ?></td>
                                    <td><?php echo date ( 'j/m/Y' ,strtotime ($result['NgayMuonSach'])); ?></td>
                                    <td><?php echo date ( 'j/m/Y' ,strtotime ($result['NgayPhaiTra'])); ?></td>
                                    <td><?php echo $result['SoNgayQuaHan']; ?></td>
                                    <td><?php echo $result['GhiChu']; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                               <tr class="gradeX">
                                    <td align="center"><?php echo $i+1; ?></td>
                                    <td><?php echo $result[$i]['MaAnPham']; ?></td>
                                    <td><?php echo $result[$i]['TenAnPham']; ?></td>
                                    <td><?php echo date ( 'j/m/Y' ,strtotime ($result[$i]['NgayMuonSach'])); ?></td>
                                    <td><?php echo date ( 'j/m/Y' ,strtotime ($result[$i]['NgayPhaiTra'])); ?></td>
                                    <td><?php echo $result[$i]['SoNgayQuaHan']; ?></td>
                                    <td><?php echo $result[$i]['GhiChu']; ?></td>
                               
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                    </table>
                </div>
                <div style="padding:30px 0px 10px 0px">
                    <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
<!--                <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">-->
                    </center>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
            <div class="notice">  
            <h2 style="color:red;"> Hiện tại bạn không mượn sách thư viện. </h2>
            </div>

            <?php } ?>
      <?php }?>