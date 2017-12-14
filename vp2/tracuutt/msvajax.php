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
 <style type="text/css" title="currentStyle">
                            @import "tracuutt/media/css/demo_page.css";
                            @import "tracuutt/media/css/demo_table.css";
                    </style>
                    <script type="text/javascript"  src="tracuutt/media/js/jquery.js" ></script>
                    <script type="text/javascript"  src="tracuutt/media/js/jquery.dataTables.js"/></script>
                    <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                    $('.dataTable').dataTable();
                                    
                            } );
                    </script>
                     <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                $('#tbldesdate').dataTable( {
                                    "aaSorting": [[1, "desc" ]]
                                } );
                                } );
                    </script>
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
<?php
global $content_ax;
$msv=KillChars(htmlspecialchars($_POST['msv'],ENT_QUOTES));
if ($msv <> null)
{
     $conn = ew_Connect();
    // xac dinh tham do hay 
    $today = date("Y-m-d H:i:s");    
    $sSqlWrk = "Select * From `t_setting` Where (set_id=2) And (set_active=1) And (t_setting.set_date_start<='$today') And (t_setting.set_date_end>='$today')";   
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    if ($rowswrk){
        $thamdo=true;
        $trangthai_thamdo = $arwrk[0]['set_status'];
       $GLOBALS['content_ax'] = $arwrk[0]['set_description'];
    } else 
    {
        $thamdo=false;
        $trangthai_thamdo = '';
        $content_ax ='';
      }  
    
    // end
        $ser_code=KillChars(htmlspecialchars($_REQUEST['ser_code'],ENT_QUOTES));
        $sSqlWrk = "Select * From `t_manager_services`";
        $sWhereWrk = "`active_ser` = 1 and services_id = ".$ser_code." order by `oder` asc ";
        if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
        $rswrk = $conn->Execute($sSqlWrk);
        $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
        if ($rswrk) $rswrk->Close();
        if($arwrk[0]['code_ser'] <> 'LichTrucNhat')  { $result= Get_arrayservice($msv,$arwrk[0]['code_ser']);}
        ?>
        <?php
        if($arwrk[0]['code_ser'] =='ThongTinSinhVien')
        {
        if (isset($result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'])) 
        { 
            $result = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            $data= $result['AnhSinhVien'];
            $file = Getimgservice($data,$msv);
        ?>
        <!-- <img src="<?php// echo $file ?>"> -->
        <div  class="thongtin" >
    <img class="anhthe"  src="<?php echo $file ?>" /><br/>
    <h2 class="msv"><?php echo $msv; ?></h2>

                                    
    <div class="sinhvien" align="left" >
                    <span class="hoten"><b> <?php echo $result['HoDem']." ".$result['Ten']; ?></b></span>                   
                    <br/>Ngày sinh: <span><?php echo $result['NgaySinh']; ?></span>
                    <br/>Giới tính: <span><?php echo $result['GioiTinh']; ?></span>
                    <br/>Lớp: <span><?php echo $result['MaLop'];?></span></li>
                    
                    <br/>Ngành học: <span><?php echo $result['TenNganh'];?></span>
                    <br/>Khóa học: <span><?php echo $result['TenKhoaHoc'];?></span>
                    <br/>Hệ đào tạo: <span><?php echo $result['TenHeDaoTao'];?></span>
                    <br/>Đào tạo: <span><?php echo $result['DaoTao'];?></span>
                    <br/>Tình trạng: <span><?php echo $result['TinhTrang'];?></span>                        
                    </div>
    </div>
        <?php } else { ?>

    <div style="text-align: center">
        <img src="../images/error.jpg" alt="stop" >
        <h2 style="color:red;">Không tồn tại sinh viên có mã sinh viên tương ứng !</h2>
        </div>

        <?php } 
        }
        ?>

        <!-- Tài chính Sinh viên

        -----------------------------------###------------------------------------------------------------------
        -->                  

        <!-- hien thi service cac khoan da nop -->

            <?php 
        if($arwrk[0]['code_ser'] =='CacKhoanDaNop') 
            {    
            //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['CacKhoanDaNopResult']['diffgram']['DocumentElement']['CacKhoanDaNop'])) 
            {
            $result = $result['CacKhoanDaNopResult']['diffgram']['DocumentElement']['CacKhoanDaNop'];
            //echo '<pre>'; print_r($result);echo '</pre>';
            $_SESSION['result'] = $result;
            $tong_tien=0;
            ?>
<div id="result" class="tbl_bangdiem">

                <center>           <br>
                <h2 style="font-weight: bold;">CÁC KHOẢN ĐÃ NỘP </h2>
                <?php  $_SESSION['header_title']  ='CÁC KHOẢN ĐÃ NỘP';
                        $_SESSION['title']  ='CacKhoanDaNop';
                ?>
                </center><br>
                <form  target="_blank" action="export.php" method="post" onsubmit='
                    $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                    <div id="ReportTable" >
<table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
        <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                                <tr> 
                                        <th class="ngaythu">Ngày thu</th>
                                        <th class="sophieu" >Số phiếu</th>
                                        <th class="noidung">Nội dung</th>
                                        <th class="sotien" >Số tiền</th>
                                        <th class="namhoc">Năm học</th>
                                        <th class="hocky">Học kỳ</th>
                                        <th class="phieuhuy"> Phiếu hủy </th>

                                </tr>
                        </thead>
                        <tbody>
                             <?php 
                   if ($result['SoPhieu'] <> null)
                         { 
                         $tong_tien= $tong_tien+($result['SoTien']);  
                       ?>
                         <tr class="gradeX">
                                        <td class="center"><?php echo date ( 'j/m/Y' ,strtotime ($result['NgayThu'])); ?></td>
                                        <td class="center"><?php echo $result['SoPhieu']; ?></td> 
                                        <td>
                                        <?php
                                        $string =  $result['NoiDung'];
                                        $a1 = strstr($string, '(', true);
                                        $a2= strstr($string, ')');
                                        if (($a1 == '') && ($a2 == ''))
                                            {
                                               $str = "- ".str_replace( ';', '<br/>- ', $string );
                                            }
                                        else
                                            {
                                                $ab=strstr ( strstr( $string, "(" ),')', true); // lấy chuỗi trong ()
                                                $ab1 = str_replace( ';', ',', $ab );  // loại bỏ ; thành ,
                                                $str = $a1.$ab1.$a2;  // ghép thành chuỗi ban đầu
                                                $str = "- ".str_replace( ';', '<br/>- ', $str );
                                            }
                                        echo $str;

                                        ?>
                                        </td>
                                        <td class="center"><?php echo display_number($result['SoTien']); ?></td>
                                        <td class="center"><?php echo $result['NamHoc']; ?></td>
                                        <td class="center"><?php echo $result['HocKy']; ?></td>
                                        <td class="center">
                                            <?php if ($result['Huy'] == 'false') {?>  
                                            <input readonly="true" disabled="disabled" type="checkbox" id="check1" >
                                            <?php } else {?>
                                            <input readonly="true" disabled="disabled" type="checkbox" id="check1" checked='true' >
                                            <?php } ?>
                                        </td>
                           </tr>
                         <?php } else { ?>      
                                <?php for($i =0; $i<Count($result); $i++)
                                {
                                $tong_tien= $tong_tien+($result[$i]['SoTien']);  
                                ?>
                                <tr class="gradeX">
                                        <td class="center"><?php echo date ( 'j/m/Y' ,strtotime ($result[$i]['NgayThu'])); ?></td>
                                        <td class="center"><?php echo $result[$i]['SoPhieu']; ?></td> 
                                        <td style="color:black">
                                        <?php
                                        $string =  $result[$i]['NoiDung'];
                                        $a1 = strstr($string, '(', true);
                                        $a2= strstr($string, ')');
                                        if (($a1 == '') && ($a2 == ''))
                                            {
                                               $str = "- ".str_replace( ';', '<br/>- ', $string );
                                            }
                                        else
                                            {
                                                $ab=strstr ( strstr( $string, "(" ),')', true);
                                                $ab1 = str_replace( ';', ',', $ab );
                                                $str = $a1.$ab1.$a2;
                                                $str = "- ".str_replace( ';', '<br/>- ', $str );
                                            }
                                        echo $str;
                                        ?>
                                            
                                        </td>
                                        <td class="center"><?php echo display_number($result[$i]['SoTien']); ?></td>
                                        <td class="center"><?php echo $result[$i]['NamHoc']; ?></td>
                                        <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                        <td class="center">
                                            <?php if ($result[$i]['Huy'] == 'false') {?>  
                                            <input readonly="true" disabled="disabled" type="checkbox" id="check1" >
                                            <?php } else {?>
                                            <input readonly="true" disabled="disabled" type="checkbox" id="check1" checked='true' >
                                            <?php } ?>
                                        </td>
                                </tr>
                                <?php } ?>
                           <?php } ?>
                        </tbody>      
                        </table>
                        
                    </div>
                    
                    <center>
                    <div style="padding:30px 0px 10px 0px;" class="expot"> 
                    <input type="hidden" id="datatodisplay" name="datatodisplay">
                    <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                    </center>
                    </div>
                </form>
                    <div style="clear:both">
                    </div>
                <?php } else { ?>

                    <div class="error">
    <center>
        <img src="../images/error.jpg" alt="stop" class="error_picture">
          <h2 style="color:red;">Không tồn khoản sinh viên đã nộp trên hệ thống!</h2>
                            </center>
                    </div>

            <?php } ?>
        <?php } ?>

        <!-- hien thi service cac khoan da chi -->
        <?php if($arwrk[0]['code_ser'] =='CacKhoanDaChi') 
            {    
            //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['CacKhoanDaChiResult']['diffgram']['DocumentElement']['CacKhoanDaChi'])) 
            {
            $result = $result['CacKhoanDaChiResult']['diffgram']['DocumentElement']['CacKhoanDaChi'];
            // echo '<pre>'; print_r($result);echo '</pre>';
            $_SESSION['result'] = $result;
            $tong_tien=0;
            ?>
            <div  id="result" class="tbl_bangdiem">
                <center>           
                <h2 style="font-weight: bold;color:black">CÁC KHOẢN ĐÃ CHI </h2>
                <?php  $_SESSION['header_title']  ='CÁC KHOẢN ĐÃ CHI';
                        $_SESSION['title']  ='CacKhoanDaChi';
                ?>
                </center>
                <form target="_blank" action="export_svdc.php" method="post" onsubmit='
                    $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                    <div id="ReportTable" >
                 <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                                <tr> 
                                        <th class="ngaythu">Ngày chi</th>
                                        <th class="sophieu" >Số phiếu</th>
                                        <th class="noidung">Nội dung</th>
                                        <th class="sotien" >Số tiền</th>
                                        <th class="namhoc">Năm học</th>
                                        <th class="hocky">Học kỳ</th>
                                        <th class="phieuhuy"> Phiếu hủy </th>

                                </tr>
                        </thead>
                        <tbody>
                                <?php for($i =0; $i<Count($result); $i++)
                                {
                                       $tong_tien= $tong_tien+($result[$i]['SoTien']);
                                ?>
                                <tr class="gradeX">
                                        <td class="center"><?php echo $result[$i]['NgayChi']; ?></td>
                                        <td class="center"><?php echo $result[$i]['SoPhieu']; ?></td>
                                        <td class="center"><?php echo $result[$i]['NoiDung']; ?></td>
                                        <td class="center"><?php echo $result[$i]['SoTien']; ?></td>
                                        <td class="center"><?php echo $result[$i]['namHoc']; ?></td>
                                        <td class="center" ><?php echo $result[$i]['hocKy']; ?></td>
                                        <td class="center">
                                            <?php if ($result[$i]['Huy'] == 'false') {?>  
                                            <input readonly="true" disabled="disabled" type="checkbox" id="check1" >
                                            <?php } else {?>
                                            <input readonly="true" disabled="disabled" type="checkbox" id="check1" checked='true' >
                                            <?php } ?>
                                        </td>

                                </tr>
                                <?php } ?>
                        </tbody>
                        </table>
                         <br/>
                   <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền: </b><?php echo display_number($tong_tien); ?> (VNĐ)</p></div>
                    </div>
                    <center>
                    <div style="padding:30px 0px 10px 0px; position: relative;top: 35px;height: 50px"> 
                    <input type="hidden" id="datatodisplay" name="datatodisplay">
                    <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                    </center>
                    </div>
                </form>
            </center>
            <?php 
            } else {
            ?>
                    <div class="notice">
                        <center>
                    <h2 style="line-height:130px;color:red;">Sinh viên không thuộc diện được chi trả!</h2>
                        </center>
                    </div>
        <?php }?>
        <?php } ?>

        <!-- hien thi service tien o khach san sinh vien-->
            <?php if($arwrk[0]['code_ser'] =='KSSVThieu') 
            {    

            if (isset($result['KSSVThieuResult']['diffgram']['DocumentElement']['KSSVThieu']))
            { 
            $result = $result['KSSVThieuResult']['diffgram']['DocumentElement']['KSSVThieu'];
            echo '<pre>'; print_r($result);echo '</pre>';
            } else  { echo  "Không tồn tại khoản ở khách sạn sinh viên";}
            ?>

            <?php }?>

        
         <!-- Hoc bong sinh vien
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/HocBongSinhVien.php" ?> 
         
            <!-- Sach qua han
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/Sachquahan.php" ?> 

        <!-- Cac Khoan Sinh Vien Thieu
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/KhoanSinhVienThieu.php" ?> 
        
         <!-- Cac Khoan Sinh Vien Thieu - Học kỳ phụ
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/KhoanSinhVienThieu_HKPhu.php" ?> 

        <!-- Cac Khoan Sinh viên thieu trong KSSV
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/NoTienKSSV.php" ?> 

        <!-- Cac Khoản Mien Giam Hoc Phi
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/MienGiamHocPhi.php" ?> 
        
        <!-- Cac Khoản Thu Trong Thời Gian Sinh Viên ở trong khách sạn
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/sudungdiennuockssv.php" ?> 


        <!-- Ho So Sinh Vien
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/HoSoSinhVien.php" ?> 


        <!-- Dang ky mon hoc
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/DangKyMonHoc.php" ?> 


        <!-- Điem cac mon hoc trong ky
        -----------------------------------###------------------------------------------------------------------
        --> 
         <?php require_once "../tracuutt/DiemMHTrongKy.php" ?> 
        
        <!-- Danh sach bang diem
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/BangDiem.php" ?> 
        
         <!-- Danh sach bang diem toan khoa
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/BangDiem_ToanKhoa.php" ?> 

        <!-- Danh sach diem ren luyen
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/DiemRenLuyen.php" ?>   


        <!-- Danh sach mon con no
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/MonSinhVienNoTrongKy.php" ?>   


        <!-- khung chưng trinh
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/KhungChuongTrinh.php" ?>  
        
       <!-- Năm xếp hạng đào tạo
        -----------------------------------###------------------------------------------------------------------
        -->  
        <?php require_once "../tracuutt/Namxephangdaotao.php" ?>   
       

        <!-- Khach san sinh vien
        -----------------------------------###------------------------------------------------------------------
        --> 
        <?php require_once "../tracuutt/intro_kssv.php" ?>  
        <?php require_once "../tracuutt/SinhVienKSSV.php" ?>   
        <?php require_once "../tracuutt/KSSVPhongTrong.php" ?>  


        <!-- Thoi khoa bieu
        -----------------------------------###------------------------------------------------------------------
        --> 
        <?php require_once "../tracuutt/ThoiKhoaBieuSV.php" ?>  
        
        
        <!-- Lich Thi HK
        -----------------------------------###------------------------------------------------------------------
        --> 
        <?php require_once "../tracuutt/LichThiHK.php" ?>  


        <!-- lich tru nhat
        -----------------------------------###------------------------------------------------------------------
        --> 
        <?php require_once "../tracuutt/LichTrucNhat.php" ?>  
        
 <?php
 /* Check thăm do mon hoc hungdq */
 Get_Survey($thamdo,$trangthai_thamdo);//
  } else {
 ?>

<div style="text-align: center">
        <img src="../images/error.jpg" alt="stop" class="error_picture">
            <h2 style="color:red;">Chưa nhập mã sinh viên !</h2>
     
</div>

<?php } ?>
