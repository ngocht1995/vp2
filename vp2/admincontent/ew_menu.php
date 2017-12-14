<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
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
<?php

// Menu
define("EW_MENUBAR_VERTICAL_CLASSNAME", "ewMenuBarVertical", TRUE);
define("EW_MENUBAR_SUBMENU_CLASSNAME", "", TRUE);
define("EW_MENUBAR_RIGHTHOVER_IMAGE", "", TRUE);
?>
<?php
define("EW_SESSION_MENU_AR_USER_LEVEL_PRIV", "htsv_arUserLevelPriv", TRUE); // User Level Privilege Array
define("EW_SESSION_MENU_USER_LEVEL", "htsv_status_UserLevelValue", TRUE); // User level value
define("EW_MENU_ALLOW_ADMIN", 32, TRUE);

// Restore user level privilege
if (is_array(@$_SESSION[EW_SESSION_MENU_AR_USER_LEVEL_PRIV]))
	$arMenuUserLevelPriv = $_SESSION[EW_SESSION_MENU_AR_USER_LEVEL_PRIV];

// Check if menu item is allowed for current user level
function AllowListMenu($TableName) {
	global $arMenuUserLevelPriv;
	$userlevellist = "";
	if (function_exists("CurrentUserLevelList"))
		$userlevellist = CurrentUserLevelList(); // Get user level id list
	if (strval($userlevellist) == "") // Not defined, just get user level
		$userlevellist = CurrentUserLevel();
	if (IsLoggedIn()) {
		if (IsListItem($userlevellist, "-1")) {
			return TRUE;
		} else {
			$priv = 0;
			if (is_array($arMenuUserLevelPriv)) {
				foreach ($arMenuUserLevelPriv as $row) {
					if (strval($row[0]) == strval($TableName) &&
						IsListItem($userlevellist, $row[1])) {
						$thispriv = $row[2];
						if (is_null($thispriv)) $thispriv = 0;
						$thispriv = intval($thispriv);
						$priv = $priv | $thispriv;
					}
				}
			}
			return ($priv & 16);
		}
	} else {
		return FALSE;
	}
}
function IsListItem($list, $item) {
	if ($list == "") {
		return FALSE;
	} else {
		$ar = explode(",", $list);
		foreach ($ar as $level) {
			if (trim(strval($item)) == trim(strval($level)))
				return TRUE;
		}
		return FALSE;
	}
}

/**
 * Menu class - TuanDA
 */
Class menuitem {
	function ListMenu($text,$url,$allowed =true) {
		if ($allowed == true){
                echo "<li class=\"menu-item\"><a href=\"" . $url . "\" target=\"main-frame\">". $text . "</a></li>";
                }
        }
}

?>
 <?php $menu = new menuitem();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
<!--
var noHelp   = "<p align='center' style='color: #666'>Không có phần nội dung cho đến nay</p>";
var helpLang = "vi_vn";
//-->
</script>

<style type="text/css">
body {
  background: #80BDCB;
}
#tabbar-div {
  background: #278296;
  padding-left: 10px;
  height: 21px;
  padding-top: 0px;
}
#tabbar-div p {
  margin: 1px 0 0 0;
}
.tab-front {
  background: #80BDCB;
  line-height: 20px;
  font-weight: bold;
  padding: 4px 15px 4px 18px;
  border-right: 2px solid #335b64;
  cursor: hand;
  cursor: pointer;
}
.tab-back {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
}
.tab-hover {
  color: #F4FAFB;
  line-height: 20px;
  padding: 4px 15px 4px 18px;
  cursor: hand;
  cursor: pointer;
  background: #2F9DB5;
}
#top-div
{
  padding: 3px 0 2px;
  background: #BBDDE5;
  margin: 5px;
  text-align: center;
}
#main-div {
  border: 1px solid #345C65;
  padding: 5px;
  margin: 5px;
  background: #FFF;
}
#menu-list {
  padding: 0;
  margin: 0;
}
#menu-list ul {
  padding: 0;
  margin: 0;
  list-style-type: none;
  color: #335B64;
}
#menu-list li {
  padding-left: 16px;
  line-height: 16px;
  cursor: hand;
  cursor: pointer;
}
#main-div a:visited, #menu-list a:link, #menu-list a:hover {
  color: #335B64;
  text-decoration: none;
}
#menu-list a:active {
  color: #EB8A3D;
}
.explode {
  background: url(images/menu_minus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.collapse {
  background: url(images/menu_plus.gif) no-repeat 0px 3px;
  font-weight: bold;
}
.menu-item {
  background: url(images/menu_arrow.gif) no-repeat 0px 3px;
  font-weight: normal;
}
#help-title {
  font-size: 14px;
  color: #000080;
  margin: 5px 0;
  padding: 0px;
}
#help-content {
  margin: 0;
  padding: 0;
}
.tips {
  color: #CC0000;
}
.link {
  color: #000099;
}
</style>

</head>
<body>
<div id="tabbar-div">
<p><span style="float:right; padding: 3px 5px;" ><a href="javascript:toggleCollapse();"><img id="toggleImg" src="images/menu_minus.gif" width="9" height="9" border="0" alt="Đóng cửa" /></a></span>

  <span class="tab-front" id="menu-tab">MENU</span>
</p>
</div>
<div id="main-div">
<div id="menu-list">
<ul>
    <?php if (IsAdmin()) { ?>
	<li class="explode" key="02_tai_khoan" name="menu">Tài khoản
                <ul>
                   <?php
                    $menu->ListMenu("Thông tin tài khoản", "UserAdminview.php?nguoidung_id=".$Security->CurrentUserID(),AllowListMenu('UserAdmin'));
                    $menu->ListMenu("Thay đổi mật khẩu", "changepwd.php",IsLoggedIn());
                   ?>
		</ul>
        </li>
        <li class="explode" key="03_xuat_ban" name="menu">Quản lý đơn từ
                <ul>
                     <?php
                       $menu->ListMenu("Phiếu cá nhân", "tbl_phieucanhanlist.php",AllowListMenu('tbl_phieucanhan'));
                       $menu->ListMenu("Đơn xin miễn giảm học phí", "tbl_miengiamhocphilist.php",AllowListMenu('tbl_miengiamhocphi'));
                       $menu->ListMenu("Đơn xin cải thiện điểm", "tbl_doncaithiendiemlist.php",AllowListMenu('tbl_doncaithiendiem'));
                     ?>
		</ul>
        </li>        
        <li class="explode" key="04_danh_muc" name="menu">Quản lý danh mục
                <ul>
                     <?php
                        $menu->ListMenu("Quản lý chuyên mục thông tin", "subjectlist.php",AllowListMenu('subject'));
                        // $menu->ListMenu("Quản lý danh mục ngành hàng", "manager_careerlist.php",AllowListMenu('Nganhnghe'));
                        $menu->ListMenu("Quản lý chuyên mục quảng cáo", "subject_adlist.php",AllowListMenu('subject_ad'));
                     ?>
		</ul>
        </li>
        <li class="explode" key="05_tin" name="menu">Quản lý thông tin
                <ul>
                     <?php
                        $menu->ListMenu("Quản lý thông tin", "intro_articlelist.php",AllowListMenu('intro_article'));
                        $menu->ListMenu("Quản lý các công việc đang triển khai", "tbl_bangiaocvlist.php",AllowListMenu('tbl_bangiaocv'));
			//$menu->ListMenu("Quản lý tin khuyến mại", "Promotionallist.php",AllowListMenu('Promotional'));
                        $menu->ListMenu("Quản lý tin quảng cáo", "advertising_infolist.php",AllowListMenu('advertising_info'));
                     ?>
		</ul>
        </li>
        <li class="explode" key="06_quang_cao" name="menu">Quản lý 
                <ul>
                     <?php
                      //$menu->ListMenu("Quản lý bản tin liên hệ", "t_lienhelist.php",AllowListMenu('t_lienhe'));                        
                      //$menu->ListMenu("Quản lý bản tin phản hồi", "t_phanhoilist.php",AllowListMenu('t_phanhoi'));      
                        $menu->ListMenu("Quản lý banner, logo quảng cáo", "advertisinglist.php",AllowListMenu('advertising'));                        
                        $menu->ListMenu("Quản lý liên kết website", "linklist.php",AllowListMenu('link'));   
                     ?>
		</ul>
        </li>
     <li class="explode" key="06_quang_cao" name="menu">Quản lý hỏi đáp
                <ul>
                     <?php
                     
                        $menu->ListMenu("Quản lý câu hỏi", "t_questionlist.php?cmd=reset",AllowListMenu('t_questionlist'));                                           
                        $menu->ListMenu("Quản lý danh mục FAQ", "t_cat_questionlist.php",AllowListMenu('t_cat_questionlist'));                                            
                        $menu->ListMenu("Quản lý thông báo", "t_messageslist.php?cmd=reset",AllowListMenu('t_messageslist')); 
                        $menu->ListMenu("Quản lý nhóm câu hỏi", "t_question_grouplist.php?cmd=reset",AllowListMenu('t_question_group'));                        
                        $menu->ListMenu("Thống kê hỏi đáp", "StaticQuestions.php",AllowListMenu('t_question_group'));  
                        $menu->ListMenu("Cấu hình thời gian hỏi đáp", "t_setting_aws_queslist.php",AllowListMenu('t_setting_aws_ques'));  
                     ?>
		</ul>
        
        </li>
    <li class="explode" key="06_quang_cao" name="menu">Quản lý rao vặt
                <ul>
                     <?php
                        $menu->ListMenu("Quản lý chuyên mục rao vặt", "t_cat_adlist.php?cmd=reset",AllowListMenu('t_cat_adlist'));                        
                                            
                     ?>
                    <?php
                       $menu->ListMenu("Quản lý tin rao vặt", "t_adlist.php?cmd=reset",AllowListMenu('t_adlist'));                        

                    ?>
                    
		</ul>
        
        </li>
        <li class="explode" key="07_nguoi_dung" name="menu">Quản lý người dùng
                <ul>
                    <?php
                        $menu->ListMenu("Quản lý thành viên đăng ký", "UsersRegisteredlist.php",AllowListMenu('UsersRegistered'));
			$menu->ListMenu("Quản lý người dùng hệ thống", "UsersAdminlist.php",AllowListMenu('UsersAdmin'));
			$menu->ListMenu("Quản lý nhóm người dùng", "userlevelslist.php",IsSysAdmin());                        
                       ?>
		</ul>
        </li>
         <li class="explode" key="08_hethong" name="menu">Quản lý hệ thống
                <ul>
                    <?php
		        $menu->ListMenu("Quản lý thiết lập", "t_settinglist.php",AllowListMenu('t_setting'));
                        $menu->ListMenu("Quản lý hỗ trợ trực tuyến", "help_managerlist.php",AllowListMenu('help_manager'));
                        $menu->ListMenu("Quản lý điều lệ SGD", "termlist.php",AllowListMenu('term'));
                        $menu->ListMenu("Quản lý thông tin nhà quản lý SGD", "footerview.php",AllowListMenu('footer'));
                        $menu->ListMenu("Quản lý WebServies", "t_manager_serviceslist.php",AllowListMenu('t_manager_services'));
                        $menu->ListMenu("Quản lý RSS", "rsslist.php",AllowListMenu('rss'));
                        $menu->ListMenu("Quản lý Email hệ thống", "ew_emaillist.php",AllowListMenu('ew_email'));
                        $menu->ListMenu("Quản lý CSDL", "../backupdatabase/",IsSysAdmin());
                       ?>

		</ul>
        </li>
        <?php } else { ?>
        <li class="explode" key="02_homthu" name="menu">Quản lý hòm thư
                <ul>                    
                     <?php
                        $menu->ListMenu("Quản lý thư đã đọc", "Readlist.php",AllowListMenu('Read'));
			            $menu->ListMenu("Quản lý thư chưa đọc", "unreadlist.php",AllowListMenu('unread'));                        
                     ?>
		</ul>
        </li>
        <li class="explode" key="03_don_hang" name="menu">Quản lý đơn từ
                <ul>
                     <?php
                     if (CurrentParentUserID()== 3)
                          {$menu->ListMenu("Thông tin cá nhân", "tbl_phieucanhanview.php",AllowListMenu('tbl_phieucanhan')); }
                     else 
                         { $menu->ListMenu("Thông tin cá nhân", "tbl_phieucanhanlist.php",AllowListMenu('tbl_phieucanhan')); }
                     $menu->ListMenu("Đơn xin miễn giảm học phí", "tbl_miengiamhocphilist.php",AllowListMenu('tbl_miengiamhocphi'));
                     $menu->ListMenu("Đơn xin cải thiện điểm", "tbl_doncaithiendiemlist.php",AllowListMenu('tbl_doncaithiendiem'));
                     ?>
		</ul>
        </li>
          <li class="explode" key="04_danh_muc" name="menu">Quản lý danh mục
                <ul>
                     <?php
                        $menu->ListMenu("Quản lý chuyên mục thông tin", "subjectlist.php",AllowListMenu('subject'));
                        // $menu->ListMenu("Quản lý danh mục ngành hàng", "manager_careerlist.php",AllowListMenu('Nganhnghe'));
                        $menu->ListMenu("Quản lý chuyên mục quảng cáo", "subject_adlist.php",AllowListMenu('subject_ad'));
                     ?>
		</ul>
        </li>
        <li class="explode" key="05_tin" name="menu">Quản lý thông tin
                <ul>
                     <?php
                        $menu->ListMenu("Quản lý thông tin", "intro_articlelist.php",AllowListMenu('intro_article'));
			            $menu->ListMenu("Quản lý các công việc đang triển khai", "tbl_bangiaocvlist.php",AllowListMenu('tbl_bangiaocv'));
                        //$menu->ListMenu("Quản lý tin khuyến mại", "Promotionallist.php",AllowListMenu('Promotional'));
                        $menu->ListMenu("Quản lý tin quảng cáo", "advertising_infolist.php",AllowListMenu('advertising_info'));
						                                      
                                                                 
                                             
                     ?>
		</ul>
        </li>
        <li class="explode" key="06_quang_cao" name="menu">Quản lý 
                <ul>
                     <?php
                        $menu->ListMenu("Quản lý bản tin liên hệ", "t_lienhelist.php",AllowListMenu('t_lienhe'));                        
                        $menu->ListMenu("Quản lý bản tin phản hồi", "t_phanhoilist.php",AllowListMenu('t_phanhoi'));      
                        $menu->ListMenu("Quản lý banner, logo quảng cáo", "advertisinglist.php",AllowListMenu('advertising'));                        
                        $menu->ListMenu("Quản lý liên kết website", "linklist.php",AllowListMenu('link')); 
                      
                     ?>
		</ul>
        </li>
     <li class="explode" key="06_quang_cao" name="menu">Quản lý hỏi đáp
                <ul>
                     <?php
                       
                        $menu->ListMenu("Quản lý câu hỏi", "t_questionlist.php?cmd=reset",AllowListMenu('t_question'));                           
                        $menu->ListMenu("Quản lý danh mục FAQ", "t_cat_questionlist.php",AllowListMenu('t_cat_question'));                        
                        $menu->ListMenu("Quản lý nhóm câu hỏi", "t_question_grouplist.php?cmd=reset",AllowListMenu('t_question_group'));                        
                        $menu->ListMenu("Thống kê hỏi đáp", "StaticQuestions.php",AllowListMenu('t_question_group'));    
			$menu->ListMenu("Quản lý thiết lập thăm do", "t_settinglist.php",AllowListMenu('t_setting'));
                         $menu->ListMenu("Cấu hình thời gian hỏi đáp", "t_setting_aws_queslist.php",AllowListMenu('t_setting_aws_ques'));  
                                                 
                     ?>
		</ul>
        
        </li>

       <li class="explode" key="06_tai_khoan" name="menu">  Tài khoản     
           <ul>
                    <?php
                        $menu->ListMenu("Thông tin tài khoản","userview.php?nguoidung_id=".$Security->CurrentUserID(),AllowListMenu('user'));
			            $menu->ListMenu("Thông tin giới thiệu","intro_informationview.php?nguoidung_id=".$Security->CurrentUserID(),AllowListMenu('user'));
                        //$menu->ListMenu("Quản lý tài khoản giao dịch","payment_accountlist.php",AllowListMenu('payment_account'));
			           //$menu->ListMenu("Thay đổi mật khẩu","http://acc.hpu.edu.vn/redirect",IsLoggedIn());
                    ?>
                <li class="menu-item"><a href="http://acc.hpu.edu.vn/redirect" target="_blank">Thay đổi mật khẩu</a></li>
		</ul>
        </li>
        <?php } ?>  
</ul>
</div>
<div id="help-div" style="display:none">
<h1 id="help-title"></h1>
<div id="help-content"></div>
</div>
</div>
<script type="text/javascript" src="js/global.js"></script><script type="text/javascript" src="js/utils.js"></script><script type="text/javascript" src="js/transport.js"></script><script language="JavaScript">
<!--
var collapse_all = "Đóng cửa";
var expand_all = "Bắt đầu";
var collapse = true;

function toggleCollapse()
{
  var items = document.getElementsByTagName('LI');
  for (i = 0; i < items.length; i++)
  {
    if (collapse)
    {
      if (items[i].className == "explode")
      {
        toggleCollapseExpand(items[i], "collapse");
      }
    }
    else
    {
      if ( items[i].className == "collapse")
      {
        toggleCollapseExpand(items[i], "explode");
        ToggleHanlder.Reset();
      }
    }
  }

  collapse = !collapse;
  document.getElementById('toggleImg').src = collapse ? 'images/menu_minus.gif' : 'images/menu_plus.gif';
  document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
}

function toggleCollapseExpand(obj, status)
{
  if (obj.tagName.toLowerCase() == 'li' && obj.className != 'menu-item')
  {
    for (i = 0; i < obj.childNodes.length; i++)
    {
      if (obj.childNodes[i].tagName == "UL")
      {
        if (status == null)
        {
          if (obj.childNodes[1].style.display != "none")
          {
            obj.childNodes[1].style.display = "none";
            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
            obj.className = "collapse";
          }
          else
          {
            obj.childNodes[1].style.display = "block";
            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
            obj.className = "explode";
          }
          break;
        }
        else
        {
          if( status == "collapse")
          {
            ToggleHanlder.RecordState(obj.getAttribute("key"), "collapse");
            obj.className = "collapse";
          }
          else
          {
            ToggleHanlder.RecordState(obj.getAttribute("key"), "explode");
            obj.className = "explode";
          }
          obj.childNodes[1].style.display = (status == "explode") ? "block" : "none";
        }
      }
    }
  }
}
document.getElementById('menu-list').onclick = function(e)
{
  var obj = Utils.srcElement(e);
  toggleCollapseExpand(obj);
}

document.getElementById('tabbar-div').onmouseover=function(e)
{
  var obj = Utils.srcElement(e);

  if (obj.className == "tab-back")
  {
    obj.className = "tab-hover";
  }
}

document.getElementById('tabbar-div').onmouseout=function(e)
{
  var obj = Utils.srcElement(e);

  if (obj.className == "tab-hover")
  {
    obj.className = "tab-back";
  }
}

document.getElementById('tabbar-div').onclick=function(e)
{
  var obj = Utils.srcElement(e);

 // var mnuTab = document.getElementById('menu-tab');
  var hlpTab = document.getElementById('help-tab');
  var mnuDiv = document.getElementById('menu-list');
  var hlpDiv = document.getElementById('help-div');

  //if (obj.id == 'menu-tab')
//  {
//    mnuTab.className = 'tab-front';
//    hlpTab.className = 'tab-back';
//    mnuDiv.style.display = "block";
//    hlpDiv.style.display = "none";
//  }

  if (obj.id == 'help-tab')
  {
    mnuTab.className = 'tab-back';
    hlpTab.className = 'tab-front';
    mnuDiv.style.display = "none";
    hlpDiv.style.display = "block";

    loc = parent.frames['main-frame'].location.href;
    pos1 = loc.lastIndexOf("/");
    pos2 = loc.lastIndexOf("?");
    pos3 = loc.indexOf("act=");
    pos4 = loc.indexOf("&", pos3);

    filename = loc.substring(pos1 + 1, pos2 - 4);
    act = pos4 < 0 ? loc.substring(pos3 + 4) : loc.substring(pos3 + 4, pos4);
    loadHelp(filename, act);
  }
}

/**
 
 */
function createDocument()
{
  var xmlDoc;

  // create a DOM object
  if (window.ActiveXObject)
  {
    try
    {
      xmlDoc = new ActiveXObject("Msxml2.DOMDocument.6.0");
    }
    catch (e)
    {
      try
      {
        xmlDoc = new ActiveXObject("Msxml2.DOMDocument.5.0");
      }
      catch (e)
      {
        try
        {
          xmlDoc = new ActiveXObject("Msxml2.DOMDocument.4.0");
        }
        catch (e)
        {
          try
          {
            xmlDoc = new ActiveXObject("Msxml2.DOMDocument.3.0");
          }
          catch (e)
          {
            alert(e.message);
          }
        }
      }
    }
  }
  else
  {
    if (document.implementation && document.implementation.createDocument)
    {
      xmlDoc = document.implementation.createDocument("","doc",null);
    }
    else
    {
      alert("Create XML object is failed.");
    }
  }
  xmlDoc.async = false;

  return xmlDoc;
}


var ToggleHanlder = new Object();

Object.extend(ToggleHanlder ,{
  SourceObject : new Object(),
  CookieName   : 'Toggle_State',
  RecordState : function(name,state)
  {
    if(state == "collapse")
    {
      this.SourceObject[name] = state;
    }
    else
    {
      if(this.SourceObject[name])
      {
        delete(this.SourceObject[name]);
      }
    }
    var date = new Date();
    date.setTime(date.getTime() + 99999999);
    document.setCookie(this.CookieName, this.SourceObject.toJSONString(), date.toGMTString());
  },

  Reset :function()
  {
    var date = new Date();
    date.setTime(date.getTime() + 99999999);
    document.setCookie(this.CookieName, "{}" , date.toGMTString());
  },

  Load : function()
  {
    if (document.getCookie(this.CookieName) != null)
    {
      this.SourceObject = eval("("+ document.getCookie(this.CookieName) +")");
      var items = document.getElementsByTagName('LI');
      for (var i = 0; i < items.length; i++)
      {
        if ( items[0].getAttribute("name") == "menu")
        {
          for (var k in this.SourceObject)
          {
            if ( typeof(items[i]) == "object")
            {
              if (items[i].getAttribute('key') == k)
              {
                toggleCollapseExpand(items[i], this.SourceObject[k]);
                collapse = false;
              }
            }
          }
        }
     }
    }
    document.getElementById('toggleImg').src = collapse ? 'images/menu_minus.gif' : 'images/menu_plus.gif';
    document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
  }
});

ToggleHanlder.CookieName += "_1";
//初始化菜单状态
ToggleHanlder.Load();

//-->

</script>

</body>
</html>