<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "/admincontent/ewcfg6.php" ?>
<?php include "/admincontent/ewmysql6.php" ?>
<?php include "/admincontent/phpfn6.php" ?>
<?php include "/admincontent/userinfo.php" ?>
<?php include "/admincontent/userfn6.php" ?>
<?php include "/admincontent/lib/nusoap.php" ?>
<?php include "/admincontent/httpful/httpful-0.2.0.phar" ?>
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
	<div class="profile_details">
	<ul>
	<li class="dropdown profile_details_drop">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	<div class="profile_img">
	<span class="prfil-img">
	<img src="<?php echo $file ?>" alt="" style="width:60px;height:60px;border-radius:90px 90px 90px 90px"> </span> 
    <div class="user-name">
	<p> <?php echo $result['HoDem']." ".$result['Ten']; ?></p>
	<span><?php echo $msv; ?> </span>
	</div>
           <i class="fa fa-angle-down lnr"></i>
			<i class="fa fa-angle-up lnr"></i>    
	<div class="clearfix"></div>	
	</div></a>
	<ul class="dropdown-menu drp-mnu"                  
					<li>Ngày sinh: <span><?php echo $result['NgaySinh']; ?></li>
					<li>Giới tính: <span><?php echo $result['GioiTinh']; ?></li>
                    <li>Lớp: <span><?php echo $result['MaLop'];?></span></li>
					
					<li>Ngành học: <span><?php echo $result['TenNganh'];?></li>
					<li>Khóa học: <span><?php echo $result['TenKhoaHoc'];?></li>
                    <li>Hệ đào tạo: <span><?php echo $result['TenHeDaoTao'];?></li>
                    <li>Đào tạo: <span><?php echo $result['DaoTao'];?></li>
                	<li>Tình trạng: <span><?php echo $result['TinhTrang'];?></li>						
					</li>
					</ul>
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

<div class="profile_details">
<ul>
<li class="dropdown profile_details_drop">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<div class="profile_img">
<span class="prfil-img">
<img src="images/user_not_found.jpg" alt="" style="width:60px;height:60px;border-radius:90px 90px 90px 90px"> </span> 
<div class="user-name">
<p> Nguyễn Trần Vô Danh</p>
<span>?? :D ?? </span>
</div>
       <i class="fa fa-angle-down lnr"></i>
        <i class="fa fa-angle-up lnr"></i>    
<div class="clearfix"></div>	
</div></a>
<ul class="dropdown-menu drp-mnu" >                 
                <li>Không tìm thấy sinh viên trong cơ sở dữ liệu!</li>
                
</div>
<?php } ?>


