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
<?php include "../admincontent/httpful/httpful-0.2.0.phar"?>
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
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="../js/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript">
$(function() {
	// Ẩn tất cả .accordion trừ accordion đầu tiên
	$("#accordiondemo .accordion").hide();
        $("#accordiondemo .thietlap").show();
	$("#accordiondemo h3").click(function(){
		$accordion = $(this).next();
		if ($accordion.is(':hidden') === true) {
			$("#accordiondemo .accordion").slideUp();
			$accordion.slideDown();
		} else {
			$accordion.slideUp();
		}
	});
});
</script>
<script language="javascript">
        function printform(divid) {
        var printContent = document.getElementById(divid);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();
        var printWindow = window.open(windowUrl, windowName, 'left=0;top=0,width=0,height=0,toolbar=0,scrollbars=1,status=0,location=1');

        printWindow.document.write(printContent.innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        }
</script>
<title>Văn phòng hỗ trợ sinh viên</title>
 <link rel="icon" type="text/css" href="../images/common/img_logo.png">
 </head> 
 <div id="ReportTable1">

 <?php  
    //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
 if(KillChars(htmlspecialchars($_GET['flag'],ENT_QUOTES)) <> '1')  
   {
      $result= Get_arrayservice($_SESSION['arraythongtin']['MaSinhVien'],'TKB');
      $no_tkb=0;
      //  echo '<pre>'; print_r($result);echo '</pre>';  
      if (isset($result['TKBResult']['diffgram']['DocumentElement']['TKB']))
            {  
            $result = $result['TKBResult']['diffgram']['DocumentElement']['TKB'];
            //echo '<pre>'; print_r($result);echo '</pre>';  
            $_SESSION['result'] = $result;
            $conn = ew_Connect();
            //$kq_msv = mysql_query('SELECT MaSinhVien FROM tbl_tkb WHERE tbl_tkb.MaSinhVien='.$result[$i]['MaSinhVien'].''); 
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
                        $hocky = $arwrk[0]['HocKy'];
                        $namhoc =  $arwrk[0]['NamHoc'];
                        $root_begin = date ( 'Y-m-j' ,strtotime ($arwrk[0]['TuNgay']));
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
                                        if (isset( $arwrk[$j]['CN']) && ( $arwrk[$j]['Cn'] <> 0))      
                                        {
                                            $x= $arwrk[$j]['CN'] +  $arwrk[$j]['SoTiet']-1;
                                            $thu= $thu."Chủ Nhật: ". $arwrk[$j]['CN']." - ".$x; " && ";
                                        } 
                                    $thu= $thu.";";     
                            }   
                              mysql_query("UPDATE tbl_tkb SET giaidoan1='".$st."', thu_tiet_gd1='".$thu."' WHERE MaMonHoc='".$result[$i]['MaMonHoc']."'");        
                    }
                  // mysql_query("DELETE FROM tbl_tkb WHERE flag='1'");
            }  
            else 
            {
                $no_tkb=1; // khong ton tai   thoi khoa bieu
            }
   }
          ?>  
 <table border='0' cellpadding='0' cellspacing='0' style='border:1px solid #99CCFF; border-collapse: collapse' bordercolor='#111111' width='100%'><tr height=3><td colspan=3></td></tr><tr><td width=3><td><table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%'>
<tr style='font-family: Tahoma; font-size: 13pt; font-weight: bold'>
    <td align='center' width=40%>TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG</td><td align='center' width=60%>THỜI KHÓA BIỂU CHI TIẾT SINH VIÊN <span style="text-transform:uppercase"><?PHP ECHO $_SESSION['arraythongtin']['HoTen'] ?></span></td></tr><tr>
<td width=40% style='font-family: Tahoma; font-size: 13pt; font-weight: bold' align='center'>VĂN PHÒNG HỖ TRỢ SINH VIÊN</td><td width=60% style='font-family: Tahoma; font-size: 11pt; font-weight: bold' align='center'>NĂM HỌC <?php echo $namhoc ?>. HỌC KỲ <?php echo $hocky ?></td></tr><tr height=10>
<td width=40% style='font-family: Tahoma; font-size: 13pt; font-weight: bold' align='center'></td><td width=60% style='font-family: Tahoma; font-size: 11pt; font-weight: bold' align='center'></td></tr></table>
<table border='0' cellpadding='0' cellspacing='0' width='100%' id='table1' bgcolor='#99CCFF'>
    <tr><td><b><a href='../home/index.php'>Trang chủ</a> &gt;&gt;<a id="alltkb" href='#'>Xem tất cả các giai đoạn</a></b></td> <td style="text-align:right"><input id="export_excel" onclick="printform('ReportTable1')" type="button" value="In ấn"></td></tr>
</table>

<?php 
$conn = ew_Connect();
$sSqlWrk = "SELECT MaMonHoc FROM tbl_tkb GROUP BY MaMonHoc";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ((count($arwrk)>0) && ($no_tkb == 0))
{
    //set color cho mon
    $c0 = "#ffcc99";
    $c1 = "#cccccc";
    $c2 = "#ffff99";
    $c3 = "#00ccff";
    $c4 = "#66ff99";
    $c5 = "#ffcc00";
    $c6 = "#d7ebff";
    $c7 = "#336699";
    $c9 = "#cccc33";
    $c10 = "#cc3399";

    for($i=0;$i<count($arwrk);$i++)
    {
    $bgcolour = ${"c$i"};
    mysql_query("UPDATE tbl_tkb SET color='".$bgcolour."' WHERE MaMonHoc='".$arwrk[$i]['MaMonHoc']."'");
    }  


    $i=0;
    $array = array();
    $batdau= array();
    $sSqlWrk = "SELECT TuNgay,NgayKetThuc FROM tbl_tkb ORDER BY TuNgay DESC";
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    $rowswrk = count($arwrk);
    if ($rswrk) $rswrk->Close(); 
    for($i=0;$i<count($arwrk);$i++)
    {
       // $tungay = date ( 'Y-m-j' ,strtotime ($arwrk[$i]['TuNgay']));
      //  $NgayKetThuc = date ( 'Y-m-j' ,strtotime ($arwrk[$i]['NgayKetThuc']));
        $tungay =$arwrk[$i]['TuNgay'];
        $NgayKetThuc =$arwrk[$i]['NgayKetThuc'];
        if(in_array($tungay,$array)== FALSE)
        {
            array_unshift($array,$tungay);

        }  
        if(in_array($NgayKetThuc,$array)== FALSE)
        {
            array_unshift($array,$NgayKetThuc);

        }  
       
    }
    function cmp($a, $b) {
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    usort($array, 'cmp');
 //   usort($batdau, 'cmp');
 // print_r($batdau);
 //    echo "<br/>";
 //   print_r($array);
 // print_r($giaidoan_end);
    //echo "<br/>";
    $max =count($array);
    for($j=0;$j<$max-1;$j++)
    {   
    $tong++;
    $khoanggd_1 = $array[$j];
    $tungay= $khoanggd_1;
    $khoanggd_2 = $array[$j+1];
    $new_date = strtotime ( '-1 day' , strtotime ( $array[$j+1]) ) ;
    $denngay = date ( 'Y-m-j' , $new_date );
    $title= "Từ ".date ( 'j-m-Y' ,strtotime ($tungay))." đến ".date ( 'j-m-Y' ,strtotime ($denngay))."";
    $sSql = "SELECT * FROM tbl_tkb WHERE 
        (tbl_tkb.TuNgay <= '".$khoanggd_1."' AND  tbl_tkb.NgayKetThuc >= '".$khoanggd_2."') 
        OR (tbl_tkb.TuNgay >= '".$khoanggd_1."' AND  tbl_tkb.NgayKetThuc <= '".$khoanggd_2."') 
        OR (tbl_tkb.NgayKetThuc > '".$khoanggd_1."' AND  tbl_tkb.NgayKetThuc <= '".$khoanggd_2."')
        OR (tbl_tkb.TuNgay >= '".$khoanggd_1."' AND  tbl_tkb.TuNgay < '".$khoanggd_2."')";    
    $rsw = $conn->Execute($sSql);
    $arw = ($rsw) ? $rsw->GetRows() : array();
    ?>

    <!-- Phân chia giai đoạn --> 
      <!-- thoi khoa bieu sang -->
    <div id="accordiondemo">
            <h3 style="font-family: Tahoma; font-size: 11pt;text-decoration: underline;height:28px;position: relative;padding-top:10px;background:url('../images/img_bggd.jpg') no-repeat;"><a href="#" style="color: black"><?php echo $tong  ?>. <span style="font-weight: normal">Giai đoạn <?php echo $tong  ?>:</span><?php echo $title; ?></a>&nbsp;&nbsp; <img src="../images/arrow_up_1.png" style="width:25px;position: absolute"></h3> 

    <div class="accordion">
    <table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse;font-size: 12px' bordercolor='#111111' width='100%'>
    <tr>
    <td width='50'  align='center' bgcolor='#bababa'>Ca</td>
    <td width='70' align='center' bgcolor='#bababa'>Tiết</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 2</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 3</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 4</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 5</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 6</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 7</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Chủ Nhật</td>
    </tr>

    <tr>
    <td align="center" bgcolor="#66FFFF" width="60">Sáng</td>
    <td align="left" bgcolor="#66FFFF" width="60">
        <table width="100%" style="border-collapse: collapse;border-spacing:0;height: 185px;">  
    <?php for($i=0;$i<6;$i++)
        {    
            switch ($i) 
            {
            case 0:
            $title = "6h30-7h15";
            break;
            case 1:
            $title = "7h20-8h05";
            break;
            case 2:
            $title = "8h10-8h55";
            break;
            case 3:
            $title = "9h05-9h50";
            break;
            case 4:
            $title = "9h55-10h40";
            break;
            case 5:
            $title = "10h45-11h30";
            break;
            }
        ?>
            <tr><td  border='1'  align="left" bgcolor="#66FFFF" style="border-bottom:1px #000 solid;font-size: 12px;text-align: center" width="120"> <a style="cursor: pointer" title="<?php echo $title  ?>">&nbsp;&nbsp;&nbsp;Tiết <?php echo $i+1 ?></a></td></tr>
    <?php } ?>
        </table>

    </td>
    <?php 
    $thu = array(0=>"Thu2",1=>"Thu3",2=>"Thu4",3=>"Thu5",4=>"Thu6",5=>"Thu7",6=>"CN");
    for($h=0;$h<7;$h++)
        {   
        ?>
    <td width='120' bgcolor='#66FFFF'>
        <table width="100%" style="border-collapse: collapse;border-spacing:0;height:185px;">
        <?php 
            $array_tkb= array();
            for($k=0;$k<count($arw);$k++)
                {
                        if( $arw[$k][$thu[$h]] <>0 ) 
                        { 
                        array_push($array_tkb,$k);   
                        }
                }  
            //   print_r($array_tkb);
            if (count ($array_tkb)>0)
            {     
                for($i=1;$i<=6;$i++)
                    {   
                            $tam = -1;
                            for($z=0;$z<count($array_tkb);$z++)
                            {  
                                if( $arw[$array_tkb[$z]][$thu[$h]]== $i) 
                                {
                                    $tam = $array_tkb[$z];

                                    break;
                                }
                            }
                        // if (($tam <> -1)&&($i==3)) $tyle_tr= "style=\"border-bottom:0px solid black\"";
                        //   else $tyle_tr= "style=\"border-bottom:1px solid black\"";
                        ?>
            <tr style="border-bottom:1px solid black">
        <?php  
            $style= "style=\"height:27px;background:#66FFFF\"";

                if ($tam <> -1)
                {   
                    $a1=$arw[$tam]['color'];
                    $i=$i+$arw[$tam]['SoTiet']-1;
                //  if (($tam==1)) $flag=1; else $flag=0;

            ?>    

        <td  style="background: <?php echo $a1 ?>;height:90px;"><span style="font-size: 11px;">
             Mã môn: <?php echo $arw[$tam]['MaMonHoc'] ?>
            <br/>Tên môn: <?php echo $arw[$tam]['TenMonHoc']; ?>
            <br/>Lớp:<a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_Lop/Tkb_Lop_<?php echo trim($arw[$tam]['MaLop']) ?>.html"><?php echo $arw[$tam]['MaLop']; ?></a>
            <br/>Phòng:  <a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_PhongHoc/Tkb_PhongHoc_<?php echo trim($arw[$tam]['MaPhongHoc']) ?>.html"><?php echo $arw[$tam]['MaPhongHoc']; ?></a>
            <br/>GV: <a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_GiaoVien/Tkb_GiaoVien_<?php echo $arw[$tam]['Magiaovien'] ?>.html"><?php echo $arw[$tam]['TenGiaoVien']; ?></a>
           
            </span>
        </td> 
                <?php } else{   
                    ?>
            <td <?php echo $style ?> ></td>
                <?php          
                        } ?>
            </tr>
                <?php 
                    }
            } else {  //thiet nagy chu nhat  ?>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66FFFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66FFFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66FFFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66FFFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66FFFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66FFFF" ></td> </tr>            
            <?php } ?>
                </table>
    </td>

    <?php } ?>

    </tr>
    </table>
    <!-- thoi khoa bieu chieu -->
    <table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse;font-size:12px' bordercolor='#111111' width='100%'>
    <tr>
    <td width='50' align='center' bgcolor='#C0C0C0'>Ca</td>
    <td width='70' align='center' bgcolor='#C0C0C0'>Tiết</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 2</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 3</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 4</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 5</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 6</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Thứ 7</td>
    <td width='120' align='center' bgcolor='#C0C0C0'>Chủ Nhật</td>
    </tr>

    <tr>
    <td align="center" bgcolor="#66CCFF" width="60">Chiều</td>
    <td align="left" bgcolor="#66CCFF" width="60">
        <table width="100%" style="border-collapse: collapse;border-spacing:0;height: 185px;">
    <?php for($i=0;$i<6;$i++)
        {  
                switch ($i) 
            {
            case 6:
            $title = "12h50-13h35";
            break;
            case 7:
            $title = "13h40-14h25";
            break;
            case 8:
            $title = "14h30-15h15";
            break;
            case 9:
            $title = "15h25-16h10";
            break;
            case 10:
            $title = "16h15-17h";
            break;
            case 11:
            $title = "17h05-17h50";
            break;
            }
        ?>
         <tr><td  border='1'  align="left" bgcolor="#66FFFF" style="border-bottom:1px #000 solid;text-align: center;font-size:12px" width="120"> <a style="cursor: pointer" title="<?php echo $title  ?>">&nbsp;&nbsp;&nbsp;Tiết <?php echo $i+1 ?></a></td></tr>
    <?php } ?>
        </table>

    </td>
    <?php 

    $thu = array(0=>"Thu2",1=>"Thu3",2=>"Thu4",3=>"Thu5",4=>"Thu6",5=>"Thu7",6=>"CN");
    for($h=0;$h<7;$h++)
                    {   

        ?>
    <td width='120' bgcolor='#66CCFF'>
       <table width="100%" style="border-collapse: collapse;border-spacing:0;height: 185px;">
                <?php 
                $array_tkb= array();
                for($k=0;$k<count($arw);$k++)
                    {
                            if( $arw[$k][$thu[$h]] <>0 ) 
                            { 
                            array_push($array_tkb,$k);   
                            }
                    }  

            if (count ($array_tkb)>0)
            {     
                for($i=7;$i<=12;$i++)
                    {   
                            $tam = -1;
                            for($z=0;$z<count($array_tkb);$z++)
                            {  
                                if( $arw[$array_tkb[$z]][$thu[$h]]== $i) 
                                {
                                    $tam = $array_tkb[$z];
                                    break;
                                }
                            }
                        ?>
                <tr style="border-bottom:1px solid black">
        <?php  
            $style= "style=\"height:27px;background:#66CCFF\"";
                if ($tam <> -1)
                {
                    $a1=$arw[$tam]['color'];
                    $a1=$arw[$tam]['color'];
                    $i=$i+$arw[$tam]['SoTiet']-1;

            ?>    
        <td style="background: <?php echo $a1 ?>;height:90px;"><span style="font-size: 11px;">
            Mã môn:<?php echo $arw[$tam]['MaMonHoc'] ?>
            <br/>Tên môn: <?php echo $arw[$tam]['TenMonHoc']; ?>
            <br/>Lớp:<a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_Lop/Tkb_Lop_<?php echo trim($arw[$tam]['MaLop']) ?>.html"><?php echo $arw[$tam]['MaLop']; ?></a>
            <br/>Phòng:  <a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_PhongHoc/Tkb_PhongHoc_<?php echo trim($arw[$tam]['MaPhongHoc']) ?>.html"><?php echo $arw[$tam]['MaPhongHoc']; ?></a>
            <br/>GV: <a class="tkba" target="_blank" href="http://hpu.edu.vn/thoikhoabieu/Tkb_GiaoVien/Tkb_GiaoVien_<?php echo $arw[$tam]['Magiaovien'] ?>.html"><?php echo $arw[$tam]['TenGiaoVien']; ?></a>
            </span>
        </td> 
                <?php } else{ ?>
            <td <?php echo $style ?> ></td>
                        <?php } ?>
            </tr>
                <?php 
                    }
            } else {  //thiet nagy chu nhat  ?>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66CCFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66CCFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66CCFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66CCFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66CCFF" ></td> </tr>
                <tr style="border-bottom:1px solid black"><td style="height:27px;background:#66CCFF" ></td> </tr>      
            <?php }?>
                </table>
    </td>

    <?php } ?>


    </tr>
    </table>
    </div>
    <script>
    $("a#alltkb").click(function () {
    $("#accordiondemo .accordion").show();
    });
    </script>
    </div>

    <!-- end phân chia giai đoạn -->

    <?php
         
        
    } 

    ?>

    <table border='0' cellpadding='0' cellspacing='0' width='100%' id='table1' bgcolor='#99CCFF'><tr><td><b><a href='../home/index.php'>Trang chủ</a> &gt;&gt;<a href='#' id="hidetkb">Ẩn thời khóa biểu</a></b></td></tr></table>

    <script>
    $("a#hidetkb").click(function () {
    $("#accordiondemo .accordion").hide();
    });
    </script>
    </div>
  
    <table border='0'><tr height=10><td></td></tr></table><table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%'>
    <tr style='font-family: Tahoma; font-size: 10pt;'>
    <td align='center' bgcolor='#99CCFF'>
    <b>Trường Đại học Dân lập Hải Phòng - Haiphong Private University </b><br/>
    Địa chỉ: Số 36 - Đường Dân Lập - Phường Dư Hàng Kênh - Quận Lê Chân - TP Hải Phòng<br/>
    Điện thoại: 031 3740577 - 031 3833802 - 031 3740578  Fax: 031.3740476  Email: webmaster@hpu.edu.vn<br/>
    Phát triển bởi  Trung tâm Thông tin thư viện 
    </tr>
    </table>
    <script language=JScript>
    function openURL(url)
    {
    window.open(url);
    }
    </script>
    </td><td width=3></td></tr><tr height=3><td colspan=3></td></tr>
    </table>
<?php } else { ?>
 
    <div>
            <center>   
        <img src="../images/stop.png" alt="stop" style="height:90px">
        <h2 style="line-height:130px;color:red;">Không tồn tại thời khóa biểu của sinh viên !</h2>
            </center>
    </div>
 
<?php } ?>
