

<?php 
   if($arwrk[0]['code_ser'] =='XepHangNam') 
        {   
?>

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
   </script>
    
    
<!-- xác định tiến trình học tập của sinh viên -->

<?php
 if (isset($result['XepHangNamResult']['diffgram']['DocumentElement']['XepHangNam'])) 
        {
        $nam_xephang = $result['XepHangNamResult']['diffgram']['DocumentElement']['XepHangNam'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        }
        
   $TBCTLXepLoai_TK= Get_arrayservice($msv,'TBCTLXepLoai_TK');
        if (isset($TBCTLXepLoai_TK['TBCTLXepLoai_TKResult']['diffgram']['DocumentElement']['TBCTLXepLoai_TK'])) 
         {
                $TBCTLXepLoai_TK =$TBCTLXepLoai_TK['TBCTLXepLoai_TKResult']['diffgram']['DocumentElement']['TBCTLXepLoai_TK'];
         }
?>
<!--
<DIV style="background: url('../images/img_bggd.jpg');padding:5px;margin-left: 3PX">
    <center>
<span style="color:#333366;font-weight: bold">Lựa chọn </span>
<select name="search_scores"  id="search_scores_id"  onchange="showstuff(this.value);">
                                        <option value="0">Chọn thang điểm </option>
                    <option value="container_so">Thang điểm 10 </option>
                    <option value="container1">Thang điểm 4</option>
                    
</select>
   </center>
</DIV>
-->
<script type="text/javascript" onchange="showstuff(this.value);">
function showstuff(element){
    document.getElementById("container1").style.display = element=="container1"?"block":"none";
    document.getElementById("container_so").style.display = element=="container_so"?"block":"none";
}
</script>



<div style="clear: both"></div>
<div class="clr"></div> 

<div id="result" class="tbl_bangdiem">
<table class="display table">
    <tr>
        <td colspan="4" style="text-align: center;">
            <h2 class="phead_tientrinh">
                <b>   TIẾN TRÌNH HỌC TẬP </b>
            </h2><br>
        </td><br>
    </tr>
    
</table>
<a style="font-style: italic;color: white;text-decoration: underline;" target="_blank" href="http://tv.hpu.edu.vn/TT-Thongtin-Thuvientintuc-2380-254-223-117-Cach-Tinh-Diem-Trung-Binh-Chung-Hoc-Tap-Va-Diem-Trung-Binh-Chung-Tich-Luy.html">(*Note: Xem cách tính điểm trung bình chung học tập và điểm trung bình chung tích lũy ở đây) </a>

<!-- <p style="font-style: italic;color: black;float:right;font-size: 10px;">
    Theo quy định: </br>
      
                    - Đối với hệ đại học sinh viên cần hoàn thành tối thiểu: 120 tín chỉ.<br>
                    - Đối với hệ cao đẳng sinh viên cần hoàn thành tối thiểu: 90 tín chỉ.<br/>
                    - Đối với hệ trung cấp sinh viên cần hoàn thành tối thiểu: 60 tín chỉ.<br/>
     
 </p> -->


<table class="sample" style="">
     <tr>
         <td colspan="5" >
           <p style="background-position:5px 5px;padding:5px 0px 0px 20px;" > 
                 <b>  Số tín chỉ tích lũy:<span>&nbsp; &nbsp;  <?php echo $nam_xephang['SoTinChiTichLuy'] ?></span></b>&nbsp;&nbsp;tín chỉ
           </p>   
        </td>
     </tr>
     <tr>
         <td colspan="5">
         <p style="background-position:5px 5px;padding:5px 0px 0px 20px;" > 
             <b>  Năm xếp hạng đào tạo sinh viên:<span> năm thứ <?php echo $nam_xephang['NamThu'] ?></span></b>
         </p>
         </td>
     </tr>
     <tr><style>td{width:150px} {</style>
         <td> </td>
         <td style="text-align: center" ><b>Thang điểm 10</b></td>
         <td style="text-align: center"> <b>Xếp loại</b></td>
         <td style="text-align: center"> <b>Thang điểm 4 </b></td>
         <td style="text-align: center"> <b>Xếp loại</b></td>
     </tr>
     <tr>  
         <td > 
              <p style="background-position:5px 5px;padding:5px 0px 0px 20px;" > 
              <b>  Điểm trung bình trung tích lũy </b> <i>(để xét điều kiện thực tập tốt nghiệp, điều kiện tốt nghiệp)</i>
              </p>
         </td>
         <td style="text-align: center"><?php echo round($TBCTLXepLoai_TK['Diem10'],2) ?></b>&nbsp; &nbsp;</td>
         <td style="text-align: center"> <?php echo $TBCTLXepLoai_TK['XepLoai10'] ?></td>
         <td style="text-align: center"> <?php echo round($TBCTLXepLoai_TK['Diem4'],2) ?></td>
         <td style="text-align: center"> <?php echo $TBCTLXepLoai_TK['XepLoai4'] ?></td>
     </tr>
      <tr>  
         <td style="width:40%"> <p style=";background-position:5px 5px;padding:5px 0px 0px 20px;" > 
                 <b> Điểm trung bình trung tích lũy toàn khóa </b> &nbsp;&nbsp; &nbsp;<i>(để xếp loại tốt nghiệp)</i>
              </p></td>
         <td style="text-align: center">
          <?php  if(round($TBCTLXepLoai_TK['TBTK_Diem10'],2) ==0 ) echo "Chưa tính"; else  echo round($TBCTLXepLoai_TK['TBTK_Diem10'],2) ?>
             </b>&nbsp; &nbsp;</td>
         <td style="text-align: center"> 
         <?php  if(round($TBCTLXepLoai_TK['TBTK_Diem10'],2) ==0 ) echo "Chưa xếp loại"; else echo $TBCTLXepLoai_TK['TBTK_XepLoai10'] ?>
         </td>
         <td style="text-align: center"> 
         <?php  if(round($TBCTLXepLoai_TK['TBTK_Diem4'],2) ==0 ) echo "Chưa tính"; else  echo round($TBCTLXepLoai_TK['TBTK_Diem4'],2) ?>
         </td>
         <td style="text-align: center"> 
          <?php  if(round($TBCTLXepLoai_TK['TBTK_Diem4'],2) ==0 ) echo "Chưa xếp loại"; else echo $TBCTLXepLoai_TK['TBTK_XepLoai4'] ?>
         </td>
     </tr>
     
 </table>
<!-- end  xác định tiến trình học tập cảu sinh viên -->

<!-- Biểu đồ kết quả học tập -->
<?php 
$msv=(htmlspecialchars($_POST['msv'],ENT_QUOTES));
$result= Get_arrayservice($msv,'TBCHTNamHocHKlan1');
$result_2= Get_arrayservice($msv,'TBCHTNamHocHKlan2');
 if (isset($result['TBCHTNamHocHKlan1Result']['diffgram']['DocumentElement']['TBCHTNamHocHKlan1'])) 
     {
        $kqht = $result['TBCHTNamHocHKlan1Result']['diffgram']['DocumentElement']['TBCHTNamHocHKlan1'];
       // echo '<pre>'; print_r($kqht);echo '</pre>';
       $kqht_lan2 = $result_2['TBCHTNamHocHKlan2Result']['diffgram']['DocumentElement']['TBCHTNamHocHKlan2'];
      // echo '<pre>'; print_r($kqht_lan2);echo '</pre>';
       
       $categories ="";
       $data_lan1="";
       $data_lan2="";
       $string_cate="";
       $string_lan1="";
       $string_lan2="";
       $string_so1="";
       $string_so2="";
       
       if (($kqht['NamHoc'] <> null) && ($kqht_lan2['NamHoc']) <> null)
       {
                $string_cate= $string_cate."'HK:".$kqht['HocKy']."<br/>".$kqht['NamHoc']."', ";
                $string_lan1 =$string_lan1."".round($kqht['Diem'],2).", ";
                $string_lan2 =$string_lan2."".round($kqht_lan2['Diem'],2).", ";
                $string_so1=$string_so1."".round($kqht['Diem'],2).", ";
                $string_so2=$string_so2."".round($kqht_lan2['Diem4'],2).", ";
  ?>      

                <p style="background-position:5px 5px;padding:5px 0px 0px 20px;" > 
                    <b>  Điểm trung bình trung học tập theo kỳ theo điểm thi lần 1</b>
                </p>
                <table class="sample">
                    <tr>
                        <td align="center"> Năm học</td>
                        <td align="center"> Học kỳ</td>
                        <td align="center"> Điểm <br/> (Thang điểm 10)</td>
                        <td align="center"> Xếp loại <br/> (Thang điểm 10)</td>
                        <td align="center"> Điểm <br/> (Thang điểm 4)</td>
                        <td align="center"> Xếp loại<br/> (Thang điểm 4)</td>
                    </tr>
                    <tr>
                    <td style="text-align: center"> <?php echo $kqht['NamHoc']  ?></td>
                    <td style="text-align: center"> <?php echo $kqht['HocKy']  ?></td>
                    <td style="text-align: center"> <?php echo round ($kqht['Diem'] , 2) ?></td>
                    <td style="text-align: center"> <?php echo $kqht['XepLoai10']  ?></td>
                    <td style="text-align: center"> <?php echo round ($kqht['Diem4'] , 2) ;  ?></td>
                    <td style="text-align: center"> <?php echo $kqht['XepLoai4']  ?></td>
                    </tr>
                </table>
                <p style="background-position:5px 5px;padding:5px 0px 0px 20px;" > 
                    <b>  Điểm trung bình trung học tập theo kỳ theo điểm thi lần 2</b>
                </p>
                <table class="sample">
                    <tr>
                        <td align="center"> Năm học</td>
                        <td align="center"> Học kỳ</td>
                        <td align="center"> Điểm <br/> (Thang điểm 10)</td>
                        <td align="center"> Xếp loại <br/> (Thang điểm 10)</td>
                        <td align="center"> Điểm <br/> (Thang điểm 4)</td>
                        <td align="center"> Xếp loại<br/> (Thang điểm 4)</td>
                    </tr>
                   
                    <tr>
                        <td style="text-align: center"> <?php echo $kqht_lan2['NamHoc']  ?></td>
                        <td style="text-align: center"> <?php echo $kqht_lan2['HocKy']  ?></td>
                        <td style="text-align: center"> <?php echo round ($kqht_lan2['Diem'] , 2)  ?></td>
                        <td style="text-align: center"> <?php echo $kqht_lan2['XepLoai10']  ?></td>
                        <td style="text-align: center"> <?php echo round ($kqht_lan2['Diem4'] , 2)  ?></td>
                        <td style="text-align: center"> <?php echo $kqht_lan2['XepLoai4'] ?></td>
                    </tr>

                </table>
                </div>   <?php  
        }
  
       else 
       {
            for($i=0;$i<count($kqht);$i++)
            {
                $string_cate= $string_cate."'HK:".$kqht[$i]['HocKy']."<br/>".$kqht[$i]['NamHoc']."', ";
                $string_lan1 =$string_lan1."".round($kqht[$i]['Diem'],2).", ";
                $string_lan2 =$string_lan2."".round($kqht_lan2[$i]['Diem'],2).", ";
                $string_so1=$string_so1."".round($kqht[$i]['Diem4'],2).", ";
                $string_so2=$string_so2."".round($kqht_lan2[$i]['Diem4'],2).", ";
             
             }  
?>
    <p style="background-position:5px 5px;padding:5px 0px 0px 20px;" > 
                    <b>  Điểm trung bình trung học tập theo kỳ (điểm thi lần 1)</b>
                </p>
                <table class="sample">
                    <tr>
                        <td align="center"> Năm học</td>
                        <td align="center"> Học kỳ</td>
                        <td align="center"> Điểm <br/> (Thang điểm 10)</td>
                        <td align="center"> Xếp loại <br/> (Thang điểm 10)</td>
                        <td align="center"> Điểm <br/> (Thang điểm 4)</td>
                        <td align="center"> Xếp loại<br/> (Thang điểm 4)</td>
                    </tr>
                    <?php 
                     for($i=0;$i<count($kqht);$i++)
                        {
                    ?>
                    <tr>
                        <td style="text-align: center"> <?php echo $kqht[$i]['NamHoc']  ?></td>
                        <td style="text-align: center"> <?php echo $kqht[$i]['HocKy']  ?></td>
                        <td style="text-align: center"> <?php echo round ($kqht[$i]['Diem'] , 2) ?></td>
                        <td style="text-align: center"> <?php echo $kqht[$i]['XepLoai10']  ?></td>
                        <td style="text-align: center"> <?php echo round ($kqht[$i]['Diem4'] , 2)?></td>
                        <td style="text-align: center"> <?php echo $kqht[$i]['XepLoai4']  ?></td>
                    </tr>
                    <?php } ?>
                </table>    
      
      <p style="background-position:5px 5px;padding:5px 0px 0px 20px;" > 
                    <b>  Điểm trung bình trung học tập theo kỳ (điểm thi lần 2):</b>
                </p>
                <table class="sample">
                    <tr>
                        <td align="center"> Năm học</td>
                        <td align="center"> Học kỳ</td>
                        <td align="center"> Điểm TB <br/> (Thang điểm 10)</td>
                        <td align="center"> Xếp loại <br/> (Thang điểm 10)</td>
                        <td align="center"> Điểm TB <br/> (Thang điểm 4)</td>
                        <td align="center"> Xếp loại<br/> (Thang điểm 4)</td>
                    </tr>
                    <?php 
                     for($i=0;$i<count($kqht_lan2);$i++)
                        {
                    ?>
                    <tr>
                        <td style="text-align: center"> <?php echo $kqht_lan2[$i]['NamHoc']  ?></td>
                        <td style="text-align: center"> <?php echo $kqht_lan2[$i]['HocKy']  ?></td>
                        <td style="text-align: center"> <?php echo round ($kqht_lan2[$i]['Diem'] , 2) ?></td>
                        <td style="text-align: center"> <?php echo $kqht_lan2[$i]['XepLoai10']  ?></td>
                        <td style="text-align: center"> <?php echo round ($kqht_lan2[$i]['Diem4'] , 2)  ?></td>
                        <td style="text-align: center"> <?php echo $kqht_lan2[$i]['XepLoai4']  ?></td>
                    </tr>
                    <?php } ?>
                </table>  <br>
                
<?php                 
       }   
   $categories= "categories: [".$string_cate."]";
   $data_lan1="data: [".$string_lan1."]";
   $data_lan2="data: [".$string_lan2."]";
   $data_so1="data: [".$string_so1."]";
   $data_so2="data: [".$string_so2."]";
   
    }
   
?>
<script src="../js/highcharts.js"></script>
<script src="../js/exporting.js"></script>    
<script type="text/javascript" src="../js/themes/grid.js"></script>

<script type="text/javascript">
$(function () {
    var chart;
         $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container1',
                type: 'line'
            },
            title: {
                text: 'Biểu đồ kết quả học tập theo thang điểm 4',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Học kỳ'
                },
                 <?php echo $categories; ?>
            },
            yAxis: {
                title: {
                    text: 'Điểm trung bình theo học kỳ '
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        'Học kỳ:'+this.x +': '+ this.y +'(Điểm trung bình môn)';
                }
            },
            legend: {
                layout: 'vertical',
                verticalAlign: 'top',
                x: 80,
                y: 30,
                borderWidth: 0
            },
            series: [{
                name: 'Điểm thi lần 1',
                <?php echo $data_so1; ?>
            }, 
               {
                name: 'Điểm thi lần 2',
                <?php echo $data_so2; ?>
            }]
        });

   }); 
});
        </script>

<div class="clr"></div> 
<div  id="container_so" class="container_so"></div>


<script type="text/javascript">
$(function () {
    var chart;
         $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_so',
                type: 'line'
            },
            title: {
                text: 'Biểu đồ kết quả học tập theo thang điểm 10',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Học kỳ'
                },
                 <?php echo $categories; ?>
            },
            yAxis: {
                title: {
                    text: 'Điểm trung bình theo học kỳ '
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        'Học kỳ:'+this.x +': '+ this.y +'(Điểm trung bình môn)';
                }
            },
            legend: {
                layout: 'vertical',
                verticalAlign: 'top',
                x: 80,
                y: 30,
                borderWidth: 0
            },
            series: [{
                name: 'Điểm thi lần 1',
                <?php echo $data_lan1; ?>
            }, 
               {
                name: 'Điểm thi lần 2',
                <?php echo $data_lan2; ?>
            }]
        });

   }); 
});
        </script>


<div class="clr"></div> <br>
<div id="container1" class="container1"></div>
<!-- begin bieu do mon hoc dang ky -->
<?php 
$result= Get_arrayservice($msv,'ThongKeMonHocHK');
 if (isset($result['ThongKeMonHocHKResult']['diffgram']['DocumentElement']['ThongKeMonHocHK'])) 
     {
        $thongke_monhochk = $result['ThongKeMonHocHKResult']['diffgram']['DocumentElement']['ThongKeMonHocHK'];
      // echo '<pre>'; print_r($kqht_lan2);echo '</pre>';
       $categories ="";$string_lan1="";$string_lan2="";$string_lan3="";$string_lan4="";
       $string_cate="";$data_lan1="";$data_lan2="";$data_lan3="";$data_lan4="";
       if (($thongke_monhochk['MaSinhVien'] <> null) && ($thongke_monhochk['MaSinhVien']) <> null)
       {
                $string_cate= $string_cate."'HK:".$thongke_monhochk['HocKy']."(".$thongke_monhochk['NamHoc'].")<br/> ".$thongke_monhochk['SoTC']." t/c ', ";
                $string_lan1 =$string_lan1."".$thongke_monhochk['DaQua'].", ";
                $string_lan2 =$string_lan2."".$thongke_monhochk['Chuaqua'].", ";
  
       }
       else 
       {
            for($i=0;$i<count($thongke_monhochk);$i++)
            {   
             
                $nam =substr($thongke_monhochk[$i]['NamHoc'],2,3)."".substr($thongke_monhochk[$i]['NamHoc'],-2);
                $string_cate= $string_cate."'HK:".$thongke_monhochk[$i]['HocKy']."(".$nam.")<br/> ".$thongke_monhochk[$i]['SoTC']." (tín chỉ)', ";
                $string_lan1 =$string_lan1."".$thongke_monhochk[$i]['DaQua'].", ";
                $string_lan2 =$string_lan2."".$thongke_monhochk[$i]['Chuaqua'].", ";
                $string_lan3 =$string_lan3."0, ";
             }
           
                
       }    
  $result= Get_arrayservice($msv,'SoMonHocTheoNamHocKyHienTai');
  if (isset($result['SoMonHocTheoNamHocKyHienTaiResult']['diffgram']['DocumentElement']['SoMonHocTheoNamHocKyHienTai'])) 
   {
  $thongke_namhientai = $result['SoMonHocTheoNamHocKyHienTaiResult']['diffgram']['DocumentElement']['SoMonHocTheoNamHocKyHienTai'];
  $nam =substr($thongke_namhientai['NamHoc'],2,3)."".substr($thongke_namhientai['NamHoc'],-2);
  $hk_hientai ="'HK:".$thongke_namhientai['HocKy']."(".$nam.")<br/>".$thongke_namhientai['TongTC']." (tín chỉ)'";
   }
   $categories= "categories: [".$string_cate."".$hk_hientai."]";
   $data_lan3="data: [".$string_lan3."".$thongke_namhientai['SoMon']."]";
   $data_lan1="data: [".$string_lan1."]";
   $data_lan2="data: [".$string_lan2."]";

    }

?>

<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
    
            title: {
                text: 'Tiến trình đăng ký môn học'
            },
    
            xAxis: {
                <?php echo $categories; ?>
            },
    
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Tổng số môn học đăng ký theo kỳ'
                }
            },
    
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>';
                     //  + 'Tổng số môn: '+ this.point.stackTotal;
                }
            },
    
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
    
            series: [{
                name: 'Số đã môn qua',
                <?php echo $data_lan1; ?>,
                stack: 'male'
            }, {
                name: 'Số môn chưa qua',
                 <?php echo $data_lan2; ?>,
                stack: 'male'
            }, {
                name: 'Số môn đang học',
                 <?php echo $data_lan3; ?>,
                stack: 'female'
            }]
        });
    });
    
});
        </script>
<br>
<div id="container" class="container"></div>
<div class="export"> 
    <center>
        <input id="export_excel" onclick="printform('ReportTable1')" type="button" value="&nbsp;&nbsp;&nbsp; In ấn &nbsp;&nbsp;&nbsp; ">
    </center>
</div>
</div>
     <?php } ?>

