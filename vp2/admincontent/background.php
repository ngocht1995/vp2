<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php include "../admincontent/lib/nusoap.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$default = new cdefault();
$Page =& $default;

// Page init processing
$default->Page_Init();

// Page main processing
$default->Page_Main();
?>
<?php

//
// Page Class
//
class cdefault {

	// Page ID
	var $PageID = 'default';

	// Page Object Name
	var $PageObjName = 'default';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show Message
	function ShowMessage() {
		if ($this->getMessage() <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate Page request
	function IsPageRequest() {
		return TRUE;
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cdefault() {
		global $conn;

		// Initialize user table object
		$GLOBALS["user"] = new cuser;

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'default', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user;
		global $Security;
		$Security = new cAdvancedSecurity();

		// Global page loading event (in userfn6.php)
		Page_Loading();

		// Page load event, used in current page
		$this->Page_Load();
	}

	//
	//  Page_Terminate
	//  - called when exit page
	//  - if URL specified, redirect to the URL
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page unload event, used in current page
		$this->Page_Unload();

		// Global page unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close Connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			ob_end_clean();
			header("Location: $url");
		}
		exit();
	}

	// Page main processing
	function Page_Main() {
		global $Security;
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		$Security->LoadUserLevel(); // load User Level

	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<style>
    .anhsinhvien {
        float: left;
        margin-top: 35px;
        margin-right:20px;
        margin-left:20px;
        padding:1px;   
    }
    ol.thongtinsinhvien {
        list-style: disc;
    }
     ol.thongtinsinhvien li 
     {
         font-weight: 600;
         padding-top: 3px;
     }
     ol.thongtinsinhvien li span {
         font-size: normal;
     }
     h2.h2thongtincanhan {
         text-decoration: underline;
         color: navy;
         padding:10px;
     } 
     SPAN.spantieude {
         font-weight: 600;
         color: navy;
     }
</style>
</head>   
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
<body>
  <div style="  ">
      <?php 
  if ((CurrentParentUserID() == 3) && isset($_SESSION['array_thongtin']))
     {
      $result = $_SESSION['array_thongtin'] ;
      $file = $result['Anh'];
      ?>
     <div  class="thongtin">
           <img class="anhsinhvien" style="width: 136px;hieght:143px;border: 1px  #000 solid" src="<?php echo $file ?>" />
                                        <br/>
                                        <?php// echo "MSV:".$msv; ?>
                                        <ol class="thongtinsinhvien">
					<li>Họ và tên: <span> <?php echo $result['HoTen']; ?></span></li>
					<li>Ngày sinh: <span><?php echo $result['NgaySinh']; ?></span></li>
					<li>Giới tính: <span><?php echo $result['GioiTinh']; ?></span></li>
                                        <li>Lớp: <span><?php echo $result['MaLop'];?></span></li>
					<li>Địa chỉ: <span><?php echo $result['DiaChi'];?></span></li>
					<li>Điện thoại: <span><?php echo $result['DienThoai'];?></span></li>
					<li>Ngành học: <span><?php echo $result['TenNganh'];?></span></li>
					<li>Khóa học: <span><?php echo $result['TenKhoaHoc'];?></span></li>
                                        <li>Hệ đào tạo: <span><?php echo $result['TenHeDaoTao'];?></span></li>
                                        <li>Email: <span><?php echo $result['Email'];?></span></li>
					<li>Tình trạng: <span><?php echo $result['TinhTrang'];?></span></li>						
					</ol>
    </div>
     <?php
$sSqlWrk = "Select * From tbl_phieucanhan where  (active=1) and  (msv= ". $_SESSION['arraythongtin']['MaSinhVien'].") LIMIT 0,1";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
     ?>
   <fieldset>
            <legend> <h2 class="h2thongtincanhan"> Thông tin cá nhân</h2></legend>
            <table border="1"  style="width: 100%">
          <tr>
              <td style="width: 25%"><span class="spantieude">CMND</span></td>
              <td style="width:30%"><?php echo $arwrk[0]['chungminh_nhandan'] ?></td>
              <td style="width: 15%"><span class="spantieude">Ngày cấp</span></td>
              <td style="width: 30%"><?php echo $arwrk[0]['ngaycap_chungminh'] ?>   <span clas="spantieude">Nơi cấp</span>  <?php echo $arwrk[0]['noi_cap']?> </td>
          </tr>
           <tr>
              <td><span class="spantieude">Dân tộc </span></td>
              <td><?php echo $arwrk[0]['dan_toc'] ?></td>
              <td><span class="spantieude">Tôn giáo</span></td>
              <td>   <?php echo $arwrk[0]['ton_giao']?></td>
          </tr>
          <tr>
              <td><span class="spantieude">Hộ khẩu thường trú </span></td>
              <td><?php echo $arwrk[0]['hokhau_thuongtru'] ?></td>
              <td><span class="spantieude">Chỗ ở hiện tại</span></td>
              <td>  <?php echo $arwrk[0]['htlt_odau'] ?></td>
          </tr>
           <tr>
              <td><span class="spantieude">Năng kiếu cá nhân</span></td>
              <td>  <?php echo $arwrk[0]['nangkhieucanhan'] ?></td>
              <td><span class="spantieude">Cấp bậc chức vụ hiện tại</span></td>
              <td>  <?php echo $arwrk[0]['capbac_chucvu_dang'] ?></td>
          </tr>
          <tr>
              <td><span class="spantieude">Số điện thoại liên hệ khi cần</span></td>
              <td><?php echo $arwrk[0]['dtdc_khicanlh'] ?></td>
              <td><span class="spantieude">Ngày vào đảng</span></td>
              <td><?php echo $arwrk[0]['ngayvaodang'] ?></td>
          </tr>
           <tr>
              <td><span class="spantieude">Họ tên bố</span></td>
              <td><?php echo $arwrk[0]['hoten_bo'] ?></td>
              <td><span class="spantieude">Họ tên mẹ</span></td>
              <td><?php echo $arwrk[0]['hoten_me'] ?></td>
          </tr>
          <tr>
              <td><span class="spantieude">Năm sinh bố</span></td>
              <td><?php echo $arwrk[0]['namsinh_bo'] ?></td>
              <td><span class="spantieude">Năm sinh mẹ</span></td>
              <td><?php echo $arwrk[0]['namsinh_me'] ?></td>
          </tr>
           <tr>
              <td><span class="spantieude">Nghề nghiệp bố</span></td>
              <td><?php echo $arwrk[0]['chucvu_bo'] ?></td>
              <td><span class="spantieude">Nghề nghiệp mẹ</span></td>
               <td><?php echo $arwrk[0]['chucvu_me'] ?></td>
          </tr>
          <tr>
              <td><span class="spantieude">Số điện thoại bố</span></td>
               <td><?php echo $arwrk[0]['dt_bo'] ?></td>
              <td><span class="spantieude">Số điện thoại mẹ</span></td>
               <td><?php echo $arwrk[0]['dt_me'] ?></td>
          </tr>
           <tr>
               <td><span class="spantieude">Số điện thoại gia đình khi cần liên hệ</span></td>
               <td><?php echo $arwrk[0]['sdt_lienhegd'] ?></td>
               <td><span class="spantieude">Gia đình chính sách:</span></td>
               <td><?php echo $arwrk[0]['sdt_lienhegd'] ?></td>
          </tr>
      </table>
    </fieldset>
     
</div>
 <?php } ?>
</body>

</html>