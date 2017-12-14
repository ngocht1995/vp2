
<?php 
   if($arwrk[0]['code_ser'] =='DiemMonHocTrongKy') 
     { 
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
                        if (isset($result['DiemMonHocTrongKyResult']['diffgram']['DocumentElement']['DiemMonHocTrongKy'])) 
                            {
                            $result = $result['DiemMonHocTrongKyResult']['diffgram']['DocumentElement']['DiemMonHocTrongKy'];
                            //echo '<pre>'; print_r($result);echo '</pre>';
                            $_SESSION['result'] = $result;
                            ?>
                                <center>           
                                <h1 style="font-weight: bold;color:black">Điểm Các Môn Học Trong Kỳ </h1>
                                <?php  $_SESSION['header_title']  ='Điểm Các Môn Học Trong Kỳ';
                                    $_SESSION['title']  ='DQTMonHocDangKy';
                                ?>
                                </center>
                                <form target="_blank" action="export_dkmh.php" method="post" onsubmit='
                                    $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                                    <div id="ReportTable" >
                                        <table cellpadding="0" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px;" >
                                         <style type="text/css"> table.display thead th{padding:0px;}</style>
                                         <thead style="background-color:rgba(4, 99, 241, 0.73); color:white;">                                         
                                                <tr> 

                                                        <th class="sophieu">Mã môn</th>
                                                        <th class="ngaythu">Tên môn</th>
                                                       <!--  <th class="sotien" >Tỉ lệ <br/> điểm</th> -->
                                                        <th class="sotien" >ĐQT</th>
                                                        <th class="noidung">Thi1</th>
                                                        <th class="noidung">ĐTH1</th>
                                                        <th class="noidung">Thi2</th>
                                                        <th class="noidung">ĐTH2 </th>
                                                        <th class="ngaythu">Cấm thi</th>
                                                        <th class="sotien" >Vi phạm</th>
                                                        <th class="sotien" >Học lại</th>
                                                       <!--  <th class="sotien" >Thăm dò</th> -->
                                                </tr>
                                        </thead>
                                    <?php 
                                    if ($result['MaMonHoc'] <> null)
                                            { 
                                    ?>
                                        <tbody>
                                                <tr class="gradeX">
                                                        <td  class="center"><?php echo $result['MaMonHoc']; ?></td>  
                                                        <td><b><?php echo $result['TenMonHoc']; ?></b></td> 
                                                       <!--  <td class="center"><?php echo $result['TyLeDiem']; ?></td>   -->
                                                        <td class="center"><?php echo $result['DQT']; ?></td>
                                                        <td class="center"><?php echo $result['DiemThiL1']; ?></td>
                                                        <td class="center"><?php echo $result['DiemTHL1']; ?></td>
                                                        <td class="center"><?php echo $result['DiemThiL2']; ?></td>
                                                        <td class="center"><?php echo $result['DiemTHL2']; ?></td>
                                                        <td class="center"><?php echo $result['CamThiLan1']; ?></td>
                                                        <td class="center"><?php echo $result['ViPham']; ?></td>
                                                        <td class="center"><?php echo $result['PhaiHocLai']; ?></td> 
                                                        <!-- <td class="center"><?php echo $result['PhaiHocLai']; ?></td>    -->
                                                </tr>
                                        </tbody>
                                        <?php } else { ?>
                                            <tbody>
                                                
                                                <?php 
                                                 $monhocthamdo =  $_SESSION['monhocthamdo'] ; 
                                                for($i =0; $i<Count($result); $i++)
                                                {
                                                       for($j=0;$j<count($monhocthamdo);$j++)
                                                        { 
                                                            
                                                         if ( $monhocthamdo[$j]['mamon'] = $result[$i]['MaMonHoc'] )
                                                             {
                                                             $thamdo = "Chưa phản hồi" ;
                                                             $url ="http://thamdo.hpu.edu.vn/thamdo/".$monhocthamdo[$i]['survey_id']."/monhoc/".$monhocthamdo[$i]['id']."";
                                                             }
                                                             else 
                                                             {
                                                             $thamdo = "Đã phản hồi" ; 
                                                             $url ="";
                                                             }    
                                                          
                                                        }
      
                                                ?>
                                                <tr class="gradeX">
                                                        <td class="center"><?php echo $result[$i]['MaMonHoc']; ?></td>  
                                                        <td><?php echo $result[$i]['TenMonHoc']; ?></td>  
                                                        <!-- <td ><?php echo $result[$i]['TyLeDiem']; ?></td>   -->
                                                        <td class="center"><?php echo $result[$i]['DQT']; ?></td>
                                                        <td class="center"><?php echo $result[$i]['DiemThiL1']; ?></td>
                                                        <td class="center"><?php echo $result[$i]['DiemTHL1']; ?></td>
                                                        <td class="center"><?php echo $result[$i]['DiemThiL2']; ?></td>
                                                        <td class="center"><?php echo $result[$i]['DiemTHL2']; ?></td>   
                                                        <td class="center"><?php echo $result[$i]['CamThiLan1']; ?></td>
                                                        <td class="center"><?php echo $result[$i]['ViPham']; ?></td>
                                                        <td class="center"><?php echo $result[$i]['PhaiHocLai']; ?></td> 
                                                        <!-- <td class="center"><a target="_blank"  href="<?php echo $url ?>"><?php echo $thamdo ?> </a></td> -->
                                                </tr>
                                                <?php } ?>
                                            </tbody>    
                                        <?php } ?>
                                        </table>
                                    </div>

                                </form>

                                    <div style="clear:both">

                               <?php// include "thamdo_include.php" ?>          
                                <?php } else { ?>

                                    <div>
                                    <center>
                                    <h2 style="line-height:130px;color:red;"> Chưa có điểm kỳ hiện tại !</h2>
                                    </center>
                                    </div>

                        <?php } ?>
        
              
<?php } ?>    
                  
<?php

/* Check thăm do mon hoc hungdq 
Get_Survey($thamdo,$trangthai_thamdo);*/

     ?>