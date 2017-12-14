<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
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


  

 <?php include "../include/header.php" ?>

    <div id="mainWap">
<div id="header"> <span><img src="../images/img_logo.png" height="68px"/></span>
          <ul class="logo">
            <li >Văn phòng</li>
            <li class="last">Hỗ trợ sinh viên</li>
          </ul>
        
      </div>
      <!-- End header -->
          <div class="quancaoleft"><a href="#"><img src="../images/quangcao.gif" /></a></div>  
        <!-- End left -->
		<hr />
        <div class="clr"></div>
		
      <div id="center">
            <div class="top">
                <h1>Chất lượng đào tạo là sự sống còn của nhà trường!</h1>
                <ul>
                <li><a href="#">Đăng nhập</a></li> | <li><a href="#">Đăng ký</a></li></ul>
            </div>
         <?php include ("../include/menu_navi.php");?>
          <samp><img  width="906px" src="../images/bgr_07.gif"  /></samp>
			<span class="span1">Cam kết giải đáp thắc mắc trong vòng <span class="style2">2 ngày làm việc</span></span>
			<div class="clr"></div>
			<div id="noidung">
                            <div id="left">
                                <h1>MENU</h1>
                                <ul>
                                    <li class="fist"><a href="#">Mẫu đơn xác nhận</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Phụ huynh</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li ><a href="#">Khiếu lại</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>              
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li><a href="#">Đăng ký học tín chỉ</a></li>
                                    <li class="last"></li>
                                </ul>
                                <!-- end left -->
                            </div>
                             <!-- right -->
                             <div id="right">
                                <ul> <li class="maudon" >HỆ THỐNG ĐẶT CÂU HỎI</li></ul>
                                 <div id="content">
                                     <form method="post" action="#">
						<table  cellpadding="0" cellspacing="0" border="0" width="100%" class="cauhoi">
						<tr><td width="35%" class="cauhoiHeader" >Phản hổi</td><td  width="65%" class="cauhoiHeader">Đặt câu hỏi</td></tr>
						<tr><td colspan="2" height="10px"></td></tr>
						<tr>
							<td align="center" ><span class="style3">Mời bạn đăng nhập <br /> 
						    để sử dụng hệ thống</span> <br />
								<a href="#">Đăng nhập</a>| <a href="#">Đăng ký</a>						  </td>
							<td  class="cauhoi">
								<input type="text"  name="txtMail" value="Mail" /><br />
								<input type="text" name="txtTen" value="Tên" /><br />
								<input type="text" name="txtSoDienThoai" value="Số điện thoại" /><br />
								 <textarea name="txtnoidung" >Nội dung </textarea><br />
							</td>
						</tr>
						<tr><td align="center" valign="bottom"><a href="#"><img src="images/suport_14.gif" /></a><a href="#"><img src="images/face_17.gif" /> </a><a href="#"><img src="images/yahoo_11.gif" /></a></td><td style="padding:0 0 0 0px;" align="left">Nkd absd B <br />Nhập mã <br /><input type="text"  name="txtMail" value="Mail" /> <input name="btnGui" type="submit" id="btnGui" value="Gửi câu hỏi" /></td></tr>
					</table>
					</form>
                                     
                                      <!-- end content --> 
                                 </div>
                               
                             
<?php include ("../include/footer.php");?>