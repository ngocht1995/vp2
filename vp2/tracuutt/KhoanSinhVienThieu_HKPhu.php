<!-- hien thi service cac khoan sinh vien con thieu-->
<style type="text/css">
table.sample {
	border-width: 1px;
	border-spacing: 0px;
	border-color: gray;
	border-collapse: separate;
    background-color: white;
    width: 100%;
}
table.sample th {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: white;

}
table.sample td {
	border-width: 1px;
	padding: 1px;
	border-style: solid;
	border-color: gray;
	background-color: white;
	
}
</style>
<div id="ReportTable1">
    <script language="javascript">
        function printform(divid) {
        var printContent = document.getElementById(divid);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();
        var printWindow = window.open(windowUrl, windowName, 'left=0;top=0,width=0,height=0,toolbar=0,scrollbars=1,status=0,location=0');

        printWindow.document.write(printContent.innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        }
 var mangso = ['không','một','hai','ba','bốn','năm','sáu','bảy','tám','chín'];
function dochangchuc(so,daydu)
{
    var chuoi = "";
    chuc = Math.floor(so/10);
    donvi = so%10;
    if (chuc>1) {
        chuoi = " " + mangso[chuc] + " mươi";
        if (donvi==1) {
            chuoi += " mốt";
        }
    } else if (chuc==1) {
        chuoi = " mười";
        if (donvi==1) {
            chuoi += " một";
        }
    } else if (daydu && donvi>0) {
        chuoi = " lẻ";
    }
    if (donvi==5 && chuc>=1) {
        chuoi += " lăm";
    } else if (donvi>1||(donvi==1&&chuc==0)) {
        chuoi += " " + mangso[ donvi ];
    }
    return chuoi;
}
function docblock(so,daydu)
{
    var chuoi = "";
    tram = Math.floor(so/100);
    so = so%100;
    if (daydu || tram>0) {
        chuoi = " " + mangso[tram] + " trăm";
        chuoi += dochangchuc(so,true);
    } else {
        chuoi = dochangchuc(so,false);
    }
    return chuoi;
}
function dochangtrieu(so,daydu)
{
    var chuoi = "";
    trieu = Math.floor(so/1000000);
    so = so%1000000;
    if (trieu>0) {
        chuoi = docblock(trieu,daydu) + " triệu";
        daydu = true;
    }
    nghin = Math.floor(so/1000);
    so = so%1000;
    if (nghin>0) {
        chuoi += docblock(nghin,daydu) + " nghìn";
        daydu = true;
    }
    if (so>0) {
        chuoi += docblock(so,daydu);
    }
    return chuoi;
}
function docso(so)
{
        if (so==0) return mangso[0];
    var chuoi = "", hauto = "";
    do {
        ty = so%1000000000;
        so = Math.floor(so/1000000000);
        if (so>0) {
            chuoi = dochangtrieu(ty,true) + hauto + chuoi;
        } else {
            chuoi = dochangtrieu(ty,false) + hauto + chuoi;
        }
        hauto = " tỷ";
    } while (so>0);
    return chuoi;
}        
        
   </script>
        <?php if($arwrk[0]['code_ser'] =='CacKhoanThieu-HKPhu') 
        {    
            $result= Get_arrayservice($msv,'HocLaiKyPhuThieuTien');
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['HocLaiKyPhuThieuTienResult']['diffgram']['DocumentElement']['HocLaiKyPhuThieuTien']))
            {  
            $result = $result['HocLaiKyPhuThieuTienResult']['diffgram']['DocumentElement']['HocLaiKyPhuThieuTien'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">CÁC KHOẢN SINH VIÊN CÒN THIẾU </h2>
                    <?php  $_SESSION['header_title']  ='CÁC KHOẢN SINH VIÊN CÒN THIẾU';
                           $_SESSION['title']  ='CacKhoanSinhVienConThieu';
                    ?>
                      
                    </center>

               <form target="_blank" action="export_cksvct.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                      <?php  if ($result['maSinhVien'] <> null)
                         { ?>
                       <center> 
                          <span> Năm học: </span> <?php echo $result['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result['hocKy']; ?>
                       </center>
                      <?php } else { ?>
                      <center> 
                          <span> Năm học: </span> <?php echo $result[0]['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result[0]['hocKy']; ?>
                       </center> 
                       <?php } ?>
                   <h2 style="font-weight: bold;color:black">Khoản học phí </h2>  
                  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px">
                    <thead>
                            <tr> 
                                    <th>Học phí</th>
                                    <th class="center">Số tiền quy định</th>
                                    <th class="center">STKTCS</th>
                                    <th class="center">Số tiền đã thu</th>
                                    <th class="center">Số tiền đã chi</th>
                                    <th class="center">Số tiền chuyển sang kỳ sau</th>
                                    <th class="center">Số tiền thiếu (ĐV:VNĐ)</th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['maSinhVien'] <> null)
                 {
                      $tong_tien= $tong_tien+($result['Thieu']);
                   ?>
                              <tr class="gradeX">
                                  <td style="width: 280px;"><b>+ Học phí học lại </b>
                                        <?php echo str_replace(";","<br/> - ",$result['ChiTietMonThieuTien']); ?>
                                    </td>
                                    <td align="center"><?php echo display_number($result['soTienQuyDinh']); ?></td>
                                    <td align="center"><?php echo $result['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo display_number($result['Thieu']); ?></td>
                                </tr>
                              
                 <?php } ?>
                <?php                 
                $result= Get_arrayservice($msv,'HocBoSungKyPhuThieuTien');
         //  echo '<h2>Fault</h2><pre>'; print_r($result);echo '</pre>';
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['HocBoSungKyPhuThieuTienResult']['diffgram']['DocumentElement']['HocBoSungKyPhuThieuTien']))
            {  
            $result = $result['HocBoSungKyPhuThieuTienResult']['diffgram']['DocumentElement']['HocBoSungKyPhuThieuTien'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;  
             ?> 
            <?php  
                   if ($result['maSinhVien'] <> null)
                     {
                      $tong_tien= $tong_tien+($result['Thieu']);
                   ?>
                              <tr class="gradeX">
                                  <td style="width: 280px;"><b>+ Học phí bổ sung </b>
                                        <?php echo str_replace(";","<br/> - ",$result['ChiTietMonThieuTien']); ?>
                                    </td>
                                    <td align="center"><?php echo display_number($result['soTienQuyDinh']); ?></td>
                                    <td align="center"><?php echo $result['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo display_number($result['Thieu']); ?></td>
                                </tr>  
                 <?php } ?>            
            <?php  }  ?>
                     </tbody>
                    </table>
                   
                   <br/>
           <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền học phí thiếu: </b><?php echo display_number($tong_tien); ?> (VNĐ)
                   <span style="font-style: italic">  
                    <?php
                      echo "(".docso($tong_tien)."VNĐ)";
                      ?>    
                   </span></p>
           </div> 

                </div>
                  
             
            </form>
   <div style="clear:both"></div>

            <?php } else { ?>
            <div>
             <center>
            <h2 style="line-height:130px;color:red;">Không tồn tại các khoản sinh viên còn thiếu học phí trong học kỳ phụ!</h2>
            </center>
            </div>
        <?php } 
        }
        ?>
   </div>
         
 