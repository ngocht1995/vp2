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
<?php include "../admincontent/httpful/httpful-0.2.0.phar" ?>
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
<?php
$msv=(htmlspecialchars($_POST['msv'],ENT_QUOTES));
date_default_timezone_set('UTC');
function objectToArray($d) {
    if (is_object($d)) {
      // Gets the properties of the given object
      // with get_object_vars function
      $d = get_object_vars($d);
    }
 
    if (is_array($d)) {
      /*
      * Return array converted to object
      * Using __FUNCTION__ (Magic constant)
      * for recursive call
      */
      return array_map(__FUNCTION__, $d);
    }
    else {
      // Return array
      return $d;
    }
  }
        
 function cmp($a, $b)
{
    global $array;
    return strcmp($a, $b);
}
use \Httpful\Request;
if ($msv <> "" || $msv <>null )
{   
           
            $uri = "http://thamdo.hpu.edu.vn/api/v1/thamdo/".$msv."";
            $response = Request::get($uri)->send();
            $array= $response->body;
            $monhocthamdo=objectToArray($array) ;
            //echo '<pre>'; print_r($monhocthamdo);echo '</pre>';
             $_SESSION['monhocthamdo'] = $monhocthamdo;
             
             
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
             
} 
// add thong tin tham do     
$result= Get_arrayservice($msv,'ThongTinSinhVien');
if (isset($result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'])) 
   { 
        $result = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
        $data= $result['AnhSinhVien'];
        $file = Getimgservice($data,$msv);
        $arraythongtin = array(
        "HoTen" =>$result['HoDem']." ".$result['Ten'],
        "NgaySinh" =>$result['NgaySinh'],
        "GioiTinh" => $result['GioiTinh'],
        "MaLop" => $result['MaLop'],
        "DiaChi" =>$result['DiaChi'],
        "DienThoai" => $result['DienThoai'],
        "TenNganh" => $result['TenNganh'],
        "DaoTao" => $result['DaoTao'],    
        "TenKhoaHoc" => $result['TenKhoaHoc'],
        "TenHeDaoTao" => $result['TenHeDaoTao'],
        "TinhTrang" => $result['TinhTrang'],
        "Email" => $result['Email'],
        "MaSinhVien" => $msv
        ) ;
        $_SESSION['arraythongtin'] = $arraythongtin;
  
 ?>
<!-- <img src="<?php// echo $file ?>"> -->
   <div  class="thongtin">
          <img class="sinhvien" style="width: 136px;hieght:143px" src="<?php echo $file ?>" />
                                        <br/>
                                        <?php// echo "MSV:".$msv; ?>
          <ol class="sinhvien">
          <li>Họ và tên: <span> <?php echo $result['HoDem']." ".$result['Ten']; ?></span></li>
          <li>Ngày sinh: <span><?php echo $result['NgaySinh']; ?></span></li>
          <li>Giới tính: <span><?php echo $result['GioiTinh']; ?></span></li>
                                        <li>Lớp: <span><?php echo $result['MaLop'];?></span></li>
          <!--<li>Địa chỉ: <span><?php// echo $result['DiaChi'];?></span></li> -->
          <!--<li>Điện thoại: <span><?php// echo $result['DienThoai'];?></span></li> -->
          <li>Ngành học: <span><?php echo $result['TenNganh'];?></span></li>
          <li>Khóa học: <span><?php echo $result['TenKhoaHoc'];?></span></li>
                                        <li>Hệ đào tạo: <span><?php echo $result['TenHeDaoTao'];?></span></li>
                                        <li>Đào tạo: <span><?php echo $result['DaoTao'];?></span></li>
                                        <!--<li>Email: <span><?php echo $result['Email'];?></span></li>-->
          <li>Tình trạng: <span><?php echo $result['TinhTrang'];?></span></li>            
          </ol>
    </div>
<?php
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$flag = true;
if(preg_match('/Chrome/i',$u_agent) && ($flag == true))
    {
  ?>

<script type="text/javascript">
$(document).ready(function(){
     $(".id_close").click(function () {
       $("#htht").html('<center style="margin-top:100px"><img  src="../images/common/ajax-loading.gif">...process...</center>');
       $.ajax({
            type: "POST",
            data: "msv="+$("#txtmsv").val()+"&ser_code=" + 1,
            url: "msvajax.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script> 

<?php
  $flag = false;
    } 
?>  
<?php 
 /* Check thăm do mon hoc hungdq */
 Get_Survey($thamdo,$trangthai_thamdo);//
} else { ?>

<div>
    <center>
    <h2 style="line-height:130px;color:red;">Chưa nhập mã sinh viên hoặc mã sinh viên không tồn tại !</h2>
    </center>
</div>

<?php } ?>


