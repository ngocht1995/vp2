<!-- hien thi service thoi khoa bieu sinh viên-->
 <?php if($arwrk[0]['code_ser'] =='TKB') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['TKBResult']['diffgram']['DocumentElement']['TKB']))
            {  
            $result = $result['TKBResult']['diffgram']['DocumentElement']['TKB'];
            // echo '<pre>'; print_r($result);echo '</pre>';  
            $_SESSION['result'] = $result;
            $kq_msv = mysql_query('SELECT MaSinhVien FROM tbl_tkb WHERE tbl_tkb.MaSinhVien='.$result[$i]['MaSinhVien'].''); 
            mysql_query('DELETE FROM tbl_tkb'); 
            mysql_query('ALTER TABLE tbl_tkb AUTO_INCREMENT = 1'); 
            for($i=0;$i<count ($result);$i++)
            {
            mysql_query("INSERT INTO tbl_tkb (TenGiaoVien, Magiaovien, MaSinhVien, MaLop, MaMonHoc, TenMonHoc, sotc, MaPhongHoc, NamHoc, HocKy, SoTuanHoc, TuanHocBatDau, TuNgay, NgayKetThuc, SoTiet, Thu2, Thu3, Thu4, Thu5, Thu6, Thu7, CN)
                        VALUES ('".$result[$i]['TenGiaoVien']."', '".$result[$i]['MaGiaoVien']."','".$result[$i]['MaSinhVien']."','".$result[$i]['MaLop']."', '".$result[$i]['MaMonHoc']."','".$result[$i]['TenMonHoc']."' ,'".$result[$i]['sotc']."','".$result[$i]['MaPhongHoc']."','"
                        .$result[$i]['NamHoc']."','".$result[$i]['HocKy']."','".$result[$i]['SoTuanHoc']."', '".$result[$i]['TuanHocBatDau']."', '".$result[$i]['TuNgay']."','".$result[$i]['NgayKetThuc']."', '".$result[$i]['SoTiet']."' ,'"
                        .$result[$i]['Thu2']."', '".$result[$i]['Thu3']."', '".$result[$i]['Thu4']."', '".$result[$i]['Thu5']."', '".$result[$i]['Thu6']."',  '".$result[$i]['Thu7']."',  '".$result[$i]['CN']."')");  

            }
                    for($i=0;$i<count ($result);$i++)
                    {
                       $sSqlWrk = "SELECT * FROM tbl_tkb";
                        $sWhereWrk = "MaMonHoc='".$result[$i]['MaMonHoc']."'";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                        $rswrk = $conn->Execute($sSqlWrk);
                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                        $rowswrk = count($arwrk);
                        if ($rswrk) $rswrk->Close(); 
                        // xac dinh giai doan
                            $st="";
                            $thu="";
                            for($j=0;$j<$rowswrk;$j++)
                             {       
                              if ($rowswrk > 1) mysql_query("UPDATE tbl_tkb SET flag='1' WHERE MaMonHoc='".$arwrk[0]['MaMonHoc']."'ORDER BY tkb_id DESC  LIMIT 1 ");
                                      $st=$st."Từ ngày: ".date ( 'j-m-Y' ,strtotime ($arwrk[$j]['TuNgay']))." đến:".date ( 'j-m-Y' ,strtotime ($arwrk[$j]['NgayKetThuc'])).";";
                                      //$st=$st."Từ ngày: ".$arwrk[$j]['TuNgay']." đến:".$arwrk[$j]['NgayKetThuc'].";";
                                       if (isset( $arwrk[$j]['Thu2']) && ( $arwrk[$j]['Thu2'] <> 0)) 
                                        {   
                                            $x= $arwrk[$j]['Thu2'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu=$thu."Thứ 2: tiết". $arwrk[$j]['Thu2']." - ".$x." && ";
                                        } 
                                        if (isset( $arwrk[$j]['Thu3']) && ( $arwrk[$j]['Thu3'] <> 0)) 
                                        {
                                            $x= $arwrk[$j]['Thu3'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu= $thu."Thứ 3: tiết ". $arwrk[$j]['Thu3']." - ".$x." && ";   
                                        }        
                                        if (isset( $arwrk[$j]['Thu4']) && ( $arwrk[$j]['Thu4'] <> 0))  
                                        {
                                            $x= $arwrk[$j]['Thu4'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu= $thu."Thứ 4: tiết ". $arwrk[$j]['Thu4']." - ".$x." && ";
                                        }

                                        if (isset( $arwrk[$j]['Thu5']) && ( $arwrk[$j]['Thu5'] <> 0))  
                                        {   
                                            $x= $arwrk[$j]['Thu5'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu= $thu."Thứ 5: tiết ". $arwrk[$j]['Thu5']." - ".$x." && ";
                                        }
                                        if (isset( $arwrk[$j]['Thu6']) && ( $arwrk[$j]['Thu6'] <> 0))  
                                        {
                                            $x= $arwrk[$j]['Thu6'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu= $thu."Thứ 6: tiết ". $arwrk[$j]['Thu6']." - ".$x." && ";
                                        }  

                                        if (isset( $arwrk[$j]['Thu7']) && ( $arwrk[$j]['Thu7'] <> 0)) 
                                        {
                                            $x= $arwrk[$j]['Thu7'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu= $thu."Thứ 7: tiết ". $arwrk[$j]['Thu7']." - ".$x." && ";
                                        }
                                        if (isset( $arwrk[$j]['CN']) && ( $arwrk[$j]['CN'] <> 0))      
                                        {
                                            $x= $arwrk[$j]['CN'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu= $thu."Chủ Nhật: ". $arwrk[$j]['CN']." - ".$x; " && ";
                                        } 
                                    $thu= $thu.";";     
                            }   
                              mysql_query("UPDATE tbl_tkb SET giaidoan1='".$st."', thu_tiet_gd1='".$thu."' WHERE MaMonHoc='".$result[$i]['MaMonHoc']."'");        
                    }
                  // mysql_query("DELETE FROM tbl_tkb WHERE flag='1'");
                       
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">THỜI KHÓA BIỂU NĂM HỌC <?php echo $result[0]['NamHoc'] ?>  HỌC KỲ  <?php echo $result[0]['HocKy'] ?></h2>
                    <?php  $_SESSION['header_title']  ='THỜI KHÓA BIỂU NĂM HỌC'.$result[0]['NamHoc'].' HỌC KỲ'.$result[0]['HocKy'];
                           $_SESSION['title']  ='thoikhoabieu';
                    ?>
                      
                    </center>
       <form target="_blank" action="export_tkb.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                <link rel="stylesheet" href="../css/reveal.css">	 
  		<script type="text/javascript" src="../js/jquery.reveal.js"></script>
		<style type="text/css">
			body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
			.big-link { display:block; text-align: center;color: #06f; }
                        ul.ulthoikhoabieu 
                           {  display: block;
                               clear: both; 
                             
                           }
                         ul.ulthoikhoabieu li 
                           {  
                               display:list-item;
                               list-style: disc;
                                 background: #bababa;
                              
                           }
		</style>                 
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px" >
                    <thead>
                            <tr> 
                                    <th class="center" style="text-align: center"> STT</th>
                                    <th class="center" style="text-align: center">Môn học</th>
                                    <th class="center" style="text-align: center">Số TC</th>
                                    <th class="center" style="text-align: center">Thời gian</th>      
                            </tr>
                    </thead>
                     <tbody>
           <?php 
              
                        $sSqlWrk = "SELECT * FROM tbl_tkb";
                        $sWhereWrk = "flag='0' GROUP BY MaMonHoc";
                        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                        $rswrk = $conn->Execute($sSqlWrk);
                        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                        $rowswrk = count($arwrk);
                        if ($rswrk) $rswrk->Close(); 
                          for($i=0;$i<$rowswrk;$i++)
                          {
                        ?>
                                <tr class="gradeX">
                                    <td align="center"><?php echo $i+1; ?></td>
                                    <td><b><?php echo $arwrk[$i]['TenMonHoc']; ?></b>
                                        <div style="padding-left: 10px;">
                                        <p>+<b>Mã môn: </b><?php echo $arwrk[$i]['MaMonHoc']; ?></p>   
                                        <p>+<b>Giảng viên: </b> <a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_GiaoVien/Tkb_GiaoVien_<?php echo $arwrk[$i]['Magiaovien'] ?>.html"><?php echo $arwrk[$i]['TenGiaoVien']; ?></a></p>
                                        <p>+<b>Lớp: </b><a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_Lop/Tkb_Lop_<?php echo trim($arwrk[$i]['MaLop']) ?>.html"><?php echo $arwrk[$i]['MaLop']; ?></a></p>
                                        <p>+<b>Phòng học: </b><a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_PhongHoc/Tkb_PhongHoc_<?php echo trim($arwrk[$i]['MaPhongHoc']) ?>.html"><?php echo $arwrk[$i]['MaPhongHoc']; ?></a></p>
<!--                                        <p>+<a class="tkba" target="_blank" href="../tracuutt/TKB_GiaiDoan.php?flag=1">Thời khóa biểu theo giai đoạn</a></p>-->
                                        </div>
                                    </td>
                                    <td align="center"><?php echo $arwrk[$i]['sotc']; ?></td>
                                    <td align="center">
                                        <?php // 
                                        $gd=spilt_string($arwrk[$i]['giaidoan1']) ;
                                        $thu_tiet=spilt_string($arwrk[$i]['thu_tiet_gd1']) ; 
                                             for($j=0;$j<count($thu_tiet);$j++)
                                             {
                                               
                                                echo rtrim($thu_tiet[$j],'&& ')."<br/><b>".$gd[$j]."</b><br/>";
                                                
                                             }
                                        
                                        ?>
                                    
                                    </td> 
                                </tr>  
                        <?php  }
                            ?>           
                          
                     </tbody>
                    </table>
              <div id="myModal" class="reveal-modal">
	              
			<a class="close-reveal-modal">&#215;</a>
		</div>
                </div>
                <div style="padding:30px 0px 10px 0px">
                    <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">

                    </center>
                </div>
      </form>
                <div style="clear:both">

            <?php } else { ?>    
                <div style="text-align: center">   
            <img src="../images/stop.png" alt="stop" style="border-radius: 25px;" >
            <h2 style="text-align: center">Không tồn tại thời khóa biểu của sinh viên !</h2>
                </div>


            <?php } ?>
      <?php }?>