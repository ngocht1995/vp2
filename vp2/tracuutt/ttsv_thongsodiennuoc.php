<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
<?php include "../admincontent/lib/nusoap.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Văn phòng hỗ trợ trực tuyến</title>
    <link rel="icon" type="text/css" href="../images/common/img_logo.png">
<?php
   
Function Getimgservice1 ($data,$mssv) 
  {
        // begin display images
        //Save a Base64 Encoded Canvas image to a png file using PHP 
        $img = str_replace('data:image/jpg;base64,', '', $data);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file =  $mssv.'.jpg';
        $success = file_put_contents($file, $data);
        //print $success ? $file : 'Unable to save the file.';
        return $file;
  }
$maphong=  KillChars(htmlspecialchars($_GET['data'],ENT_QUOTES)) ;
$current = getdate();
$end_nam =$current['year']-1;
$end_nam =$end_nam."-08";  
$result= Get_arrayservice_id('Maphong',$maphong,'PhongSV');   
        if (isset($result['PhongSVResult']['diffgram']['DocumentElement']['PhongSV'])) 
        {
            $result = $result['PhongSVResult']['diffgram']['DocumentElement']['PhongSV'];
           
        ?>
 
<center>
    <table style="width:900px" cellpadding="0" cellspacing="0" border="0">
              <tr>

                  <td colspan="3" style="vertical-align: top;vertical-align: central;">  
                       <img src="img_logo.png" height="78px" style="float:left">
                       <center>  
                         BỘ GIÁO DỤC ĐÀO TẠO </br>
                         <SPAN style="font-weight: bold;border-bottom: 1px solid #000000; padding-bottom:2px;"> TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG</SPAN>
                        </center>
                   </td>
                  <td colspan="4" style="vertical-align: top;vertical-align: central;">
                      <center>
                          <B>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</B></br>
                          <SPAN style="border-bottom: 1px solid #000000; padding-bottom:2px;"> Độc lập - Tự do - Hạnh phúc </SPAN>
                     </center>
                  </td> 
                  
              </tr>   
  </table> 
    <h2>Thông Tin Sử Dụng Điện Nước Theo Tháng Tại Phòng <?PHP ECHO $maphong ?> Trong Khách Sạn Sinh Viên</h2>
    <div style="color:#3e5783;font-size: 18px;margin-bottom: 5px;">Danh sách các bạn cùng phòng</div>
<table>
    <tr>
       <?php  
          for($i=0;$i < count ($result);$i++) 
               {
                    $data = $result[$i]['AnhSinhVien'];
                    $file = Getimgservice1($data,$result[$i]['MaSinhVien']);
             ?>
        <td> 
            <div><img height="160" width="120" id="sinhvien" class="sinhvien" src="<?php echo $file ?>" /></div>
            <div>
            <p style="width: 150px;font-size: 11px;color:navy"> <?php echo $result[$i]['HoDem']." ".$result[$i]['Ten']?> </p>
            <p style="width: 150px;font-size: 11px;color:navy">Lớp: <?php echo $result[$i]['MaLop']?> <p>
            <p style="width: 150px;font-size: 11px;color:navy">MSV: <?php echo $result[$i]['MaSinhVien']?> <p>     
            </div>  
        </td>   
          <?php    
               }
          ?>
    </tr>
</table>
 </center>   
 <?php 
 } else {
?>
  <center> 
     <table style="width:900px" cellpadding="0" cellspacing="0" border="0">
              <tr>

                  <td colspan="3" style="vertical-align: top;vertical-align: central;">  
                       <img src="img_logo.png" height="78px" style="float:left">
                       <center>  
                         BỘ GIÁO DỤC ĐÀO TẠO </br>
                         <SPAN style="font-weight: bold;border-bottom: 1px solid #000000; padding-bottom:2px;"> TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG</SPAN>
                        </center>
                   </td>
                  <td colspan="4" style="vertical-align: top;vertical-align: central;">
                      <center>
                          <B>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</B></br>
                          <SPAN style="border-bottom: 1px solid #000000; padding-bottom:2px;"> Độc lập - Tự do - Hạnh phúc </SPAN>
                     </center>
                  </td> 
                  
              </tr>   
  </table> 
    <h2>THÔNG TIN HOẠT ĐỘNG TẠI PHÒNG <?PHP ECHO $maphong ?> TRONG KHÁCH SẠN SINH VIÊN</h2>
<?php   
   }
?>     
 </center>   
<div class="clr"></div>	

<!-- end  xác định tiến trình học tập cảu sinh viên -->

<script type="text/javascript" src="../js2/jquery.min_highcharts.js"></script>
<script src="../js2/highcharts.js"></script>
<script src="../js2/exporting.js"></script>
<?php 
if (isset($maphong))
{   
     $result= Get_arrayservice_id('maphong',$maphong,'DienNuocKSSVTheoThang'); 
      if (isset($result['DienNuocKSSVTheoThangResult']['diffgram']['DocumentElement']['DienNuocKSSVTheoThang'])) 
      {
       $thongtin = $result['DienNuocKSSVTheoThangResult']['diffgram']['DocumentElement']['DienNuocKSSVTheoThang']; 
       $categories ="";
       $data_nuoclanh="";
       $data_nuocnong="";
       $data_dien="";
       $string_cate="";
       $string_nuoclanh="";
       $string_nuocnong=""; 
       $string_datadien="";
       $status_dien=0;
       $status_nuoclanh=0;
       $status_nuocnong=0;
       
       if (($thongtin['MaPhong'] <> null))
       {
               $thang_nam_end = $thongtin['Nam']."-".$thongtin['Thang']; 
                if (strtotime ($thang_nam_end) >= strtotime($end_nam))
                {
                $string_cate= $string_cate."'T".$thongtin['Thang']."-".$thongtin['Nam']."', ";
                $data_dien =$data_dien."".$thongtin['ChiSoDien'].", ";
                $data_nuoclanh =$data_nuoclanh."".$thongtin['ChiSoNuocLanh'].", ";
                $data_nuocnong =$data_nuocnong."".$thongtin['ChiSoNuocNong'].", ";
                 }
       }
       else 
       {    
            for($i=0;$i<count($thongtin);$i++)
            {
                $thang_nam_end = $thongtin[$i]['Nam']."-".$thongtin[$i]['Thang']; 
                if (strtotime ($thang_nam_end) >= strtotime($end_nam))
                    {  
                    // thong so dien
                    $delta_dien= (int)$thongtin[$i]['ChiSoDien'] - (int)$thongtin[$i-1]['ChiSoDien'];
                  //  echo $delta_dien; echo "<br/>";
                    $data_dien =$data_dien."".$thongtin[$i]['ChiSoDien'].", ";
                   if ($status_dien==0)
                    {
                            if (($delta_dien < (360*2)) &&  ($delta_dien >= 0))
                            { 
                                $canhbao_dien ="null"; 
                                $status_dien=0;
                               
                            }
                            else 
                            { 
                                $status_dien=1;
                                $canhbao_dien =
                                "{
                                    y: ".$thongtin[$i]['ChiSoDien'].",
                                    marker: {
                                        symbol: 'url(../images/sun.png)'
                                    }
                                }";    
                            }
                    } 
                    else
                    {
                          $canhbao_dien =$thongtin[$i]['ChiSoDien']; 
                    }   
                   // if ($status_dien==1) $data_dien_warning = substr($data_dien_warning,0,-6)."".$canhbao_dien.", ";
                   $data_dien_warning = $data_dien_warning."".$canhbao_dien.", ";
                    // thong so nuoc lanh
                    $delta_nuoclanh= (int)$thongtin[$i]['ChiSoNuocLanh'] - (int)$thongtin[$i-1]['ChiSoNuocLanh'];
                    $data_nuoclanh =$data_nuoclanh."".$thongtin[$i]['ChiSoNuocLanh'].", ";
                    if ($status_nuoclanh==0)
                    {
                            if (($delta_nuoclanh) < (6*4*2) &&  ($delta_nuoclanh >= 0))
                            { 
                            $canhbao_nuoclanh ="null"; 
                            $status_nuoclanh=0;
                            }
                            else 
                            { 
                            $canhbao_nuoclanh =
                                "{
                                    y: ".$thongtin[$i]['ChiSoNuocLanh'].",
                                    marker: {
                                        symbol: 'url(../images/sun.png)'
                                    }
                                }";  
                                $status_nuoclanh=1;
                            }
                     }
                     else
                     {
                          $canhbao_nuoclanh =$thongtin[$i]['ChiSoNuocLanh']; 
                     }    
                   //  if ($status_nuoclanh==1)$data_nuoclanh_warning = substr($data_nuoclanh_warning,0,-6)."".$canhbao_nuoclanh.", ";
                    $data_nuoclanh_warning = $data_nuoclanh_warning."".$canhbao_nuoclanh.", ";
                    // thong so nuoc nong
                    $delta_nuocnong= (int)$thongtin[$i]['ChiSoNuocNong'] - (int)$thongtin[$i-1]['ChiSoNuocNong'];
                    $data_nuocnong =$data_nuocnong."".$thongtin[$i]['ChiSoNuocNong'].", ";
                    If ($status_nuocnong ==0)
                    {
                        if (($delta_nuocnong) < (6*4*2) &&  ($delta_nuocnong >= 0))
                        {
                            $canhbao_nuocnong ="null";
                            $status_nuocnong = 0;
                        }
                        else 
                        { 
                            $canhbao_nuocnong =
                            "{
                                y: ".$thongtin[$i]['ChiSoNuocNong'].",
                                marker: {
                                    symbol: 'url(../images/sun.png)'
                                }
                            }"; 
                            $status_nuocnong=1;
                            }
                    } else 
                    {
                           $canhbao_nuocnong =$thongtin[$i]['ChiSoNuocNong']; 
                    }    
                    // if ($status_nuocnong==1) $data_nuocnong_warning = substr($data_nuocnong_warning,0-6)."".$canhbao_nuocnong.", ";
                     $data_nuocnong_warning = $data_nuocnong_warning."".$canhbao_nuocnong.", ";
                    // thoi diem
                    $string_cate= $string_cate."'T".$thongtin[$i]['Thang']."-".$thongtin[$i]['Nam']."<br/>SD:".$delta_dien." (số)', ";
                    $string_cate1= $string_cate1."'T".$thongtin[$i]['Thang']."-".$thongtin[$i]['Nam']."<br/>SD:".$delta_nuoclanh." (khối)', ";
                    $string_cate2= $string_cate2."'T".$thongtin[$i]['Thang']."-".$thongtin[$i]['Nam']."<br/>SD:".$delta_nuocnong." (khối)', ";
                    }
             }
                
       }    
      $categories= "categories: [".$string_cate."]";
      $categories1= "categories: [".$string_cate1."]";
      $categories2= "categories: [".$string_cate2."]";
      
      $string_nuoclanh="data: [".$data_nuoclanh."]"; echo "<br/>";
      $string_nuoclanh_warning = "data: [".$data_nuoclanh_warning."]";
      
      $string_nuocnong="data: [".$data_nuocnong."]";   echo "<br/>"; 
      $string_nuocnong_warning = "data: [".$data_nuocnong_warning."]"; 
      
      $string_datadien="data: [".$data_dien."]";   echo "<br/>";
      $string_datadien_warning = "data: [".$data_dien_warning."]"; 
      
//      //    $string_datadien= "data: [12446, 12523, 12599, 12696, 12727, 12765, 12798, 12864]";
//          $string_datadien1= "data: [null, null, null, null, null, null, 12798, {
//                    y: 12864,
//                    marker: {
//                        symbol: 'url(http://www.highcharts.com/demo/gfx/sun.png)'
//                    }
//                }]";
      }
     
?>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_dien',
                type: 'line',
                marginRight: 130,
                marginBottom: 15
            },
            title: {
                text: 'Biểu đồ sử dụng điện theo tháng tại phòng',
                x: -20 //center
            },
            subtitle: {
                text: 'Đơn vị tính: 1 số điện là 1 KWh = 1000 Wh',
                x: -20
            },
            xAxis: {
                 <?php echo $categories; ?>
            },
            yAxis: {
                title: {
                    text: 'Chỉ số điện sử dụng'
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
                        this.x +'<br/>SCTN: '+ this.y +' (số)';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [
           {
                name: 'Chỉ số điện',
                <?php echo $string_datadien; ?>
            }, {
                name: 'Cảnh báo',
                <?php echo $string_datadien_warning; ?>
            }]
        });
    });
    
});
</script>


<div id="container_dien" style="width:1024px; height: 250px; margin: 0 auto"></div>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_nuoclanh',
                type: 'line',
                marginRight: 130,
                marginBottom: 15
            },
            title: {
                text: 'Biểu đồ sử dụng nước lạnh theo tháng tại phòng',
                x: -20 //center
            },
            subtitle: {
                text: 'Đơn vị tính: 1 lít = 0,001m3 = 1dm3 =1 000 cm3',
                x: -20
            },
            xAxis: {
                 <?php echo $categories1; ?>
            },
            yAxis: {
                title: {
                    text: 'Chỉ số nước lạnh sử dụng'
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
                        this.x +'<br>SCTN: '+ this.y +' (khối)';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [ {
                name: 'Chỉ số nước lạnh',
                color: '#0066FF',
                <?php echo $string_nuoclanh; ?>
            },{
                name: 'cảnh báo',
                color: '#C94141',
                <?php echo $string_nuoclanh_warning; ?>
            }]
        });
    });
    
});
		</script>
<div id="container_nuoclanh" style="width:1024px; height: 250px; margin: 0 auto"></div>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container_nuocnong',
                type: 'line',
                marginRight: 130,
                marginBottom: 15
            },
            title: {
                text: 'Biểu đồ sử dụng nước nóng theo tháng tại phòng',
                x: -20 //center
            },
            subtitle: {
                text: '1 lít = 0,001m3 = 1dm3 =1 000 cm3',
                x: -20
            },
            xAxis: {
                 <?php echo $categories2; ?>
            },
            yAxis: {
                title: {
                    text: 'Chỉ số nước nóng sử dụng'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#111111'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +'<br/>SCTN: '+ this.y +' (khối)';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [ {
                name: 'Chỉ số nước nóng',
                color: 'green',
                <?php echo $string_nuocnong; ?>
            },
            {   
                 name: 'Cảnh báo',
                 color: '#C94141',
                <?php echo $string_nuocnong_warning; ?>
            }]
        });
    });
    
});
		</script>
<div id="container_nuocnong" style="width:1024px; min-height:250px; margin: 0 auto"></div>
	
<?php } else {?>

  <div>
            <center>
            <h2 style="line-height:130px;color:red;">Chưa xác định được mã phòng</h2>
            </center>
    </div>
<?php } ?>
