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


<style type="text/css">
#header-div {
  background: #278296;
  border-bottom: 1px solid #FFF;
}

#logo-div {
  height: 50px;
  float: left;
}

#license-div {
  height: 50px;
  float: left;
  text-align:center;
  vertical-align:middle;
  line-height:50px;
}

#license-div a:visited, #license-div a:link {
  color: #EB8A3D;
}

#license-div a:hover {
  text-decoration: none;
  color: #EB8A3D;
}

#submenu-div {
  height: 80px;
}

#submenu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#submenu-div li {
  float: right;
  padding: 0 10px;
  margin: 3px 0;
  border-left: 1px solid #FFF;
}

#submenu-div a:visited, #submenu-div a:link {
  color: #FFF;
  text-decoration: none;
}

#submenu-div a:hover {
  color: #F5C29A;
}

#loading-div {
  clear: right;
  text-align: right;
  display: block;
}

#menu-div {
  background: #80BDCB;
  font-weight: bold;
  height: 24px;
  line-height:24px;
}

#menu-div ul {
  margin: 0;
  padding: 0;
  list-style-type: none;
}

#menu-div li {
  float: left;
  border-right: 1px solid #192E32;
  border-left:1px solid #BBDDE5;
}

#menu-div a:visited, #menu-div a:link {
  display:block;
  padding: 0 20px;
  text-decoration: none;
  color: #335B64;
  background:#9CCBD6;
}

#menu-div a:hover {
  color: #000;
  background:#80BDCB;
}

#submenu-div a.fix-submenu{clear:both; margin-left:5px; padding:1px 5px; *padding:3px 5px 5px; background:#DDEEF2; color:#278296;}
#submenu-div a.fix-submenu:hover{padding:1px 5px; *padding:3px 5px 5px; background:#FFF; color:#278296;}
#menu-div li.fix-spacel{width:30px; border-left:none;}
#menu-div li.fix-spacer{border-right:none;}
</style>
<script type="text/javascript" src="js/transport.js"></script><script type="text/javascript">
function web_address()
{
  var ne_add = parent.document.getElementById('main-frame');
  var ne_list = ne_add.contentWindow.document.getElementById('search_id').innerHTML;
  ne_list.replace('-', '');
  var arr = ne_list.split('-');
  window.open('help.php?al='+arr[arr.length - 1],'_blank');
}


/**

 */
function start_sendmail_Response(result)
{
  
  if (result.error == 0)
  {
    var str = '';
		if (result['content']['auth_str'])
		{
			str = '<a href="javascript:void(0);" target="_blank">' + result['content']['auth_str'];
			if (result['content']['auth_type'])
			{
				str += '[' + result['content']['auth_type'] + ']';
			}
			str += '</a> ';
		}

    document.getElementById('license-div').innerHTML = str;
  }
}

function modalDialog(url, name, width, height)
{
  if (width == undefined)
  {
    width = 400;
  }
  if (height == undefined)
  {
    height = 300;
  }

  if (window.showModalDialog)
  {
    window.showModalDialog(url, name, 'dialogWidth=' + (width) + 'px; dialogHeight=' + (height+5) + 'px; status=off');
  }
  else
  {
    x = (window.screen.width - width) / 2;
    y = (window.screen.height - height) / 2;

    window.open(url, name, 'height='+height+', width='+width+', left='+x+', top='+y+', toolbar=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, modal=yes');
  }
}

function ShowToDoList()
{
  try
  {
    var mainFrame = window.top.frames['main-frame'];
    mainFrame.window.showTodoList(adminId);
  }
  catch (ex)
  {
  }
}


var adminId = "1";
</script>
</head>   

<body>
<div id="header-div">

  <div id="logo-div" ><img src="images/img_logo.png" alt="" width="500px" /></div>
 
  <div id="submenu-div">
    <ul>      
      <li><a href="javascript:web_address();">Trợ giúp</a></li>
      <li><a href="../" target="_parent">Trang chủ</a></li>
      <li style=" color: white; ">
         <?php
            if (IsLoggedIn()) {
					//echo "Xin chào " . CurrentFullUserName() ; 
                                        $msv=(htmlspecialchars($_SESSION['msv_login'],ENT_QUOTES));
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
                                                "TenKhoaHoc" => $result['TenKhoaHoc'],
                                                "TenHeDaoTao" => $result['TenHeDaoTao'],
                                                "TinhTrang" => $result['TinhTrang'],
                                                "Email" => $result['Email'],
                                                "Anh" => $file,
                                                "MaSinhVien" => $msv
                                                ) ;
                                                $_SESSION['array_thongtin'] = $arraythongtin;
                                                echo "Xin chào " .  $_SESSION['array_thongtin']['HoTen'] ; 
                                               // print_r($result);
                                            

                                        } else { 
                                         echo "Xin chào " . CurrentFullUserName() ;
                                        } 
                      }
?>
          
      </li>
      <li style="border-left:none; color: white;">
          <?php
				$timezone  = 7; //(GMT +7:00)
				//Hiển thị ngày tháng tiếng Việt- TuanDA
 				$str_search = array ("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
				$str_replace = array ("Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy","Chủ nhật");
				$timenow = gmdate("D, d/m/Y - H:i:s", time() + 3600*($timezone));
				$timenow = str_replace( $str_search, $str_replace, $timenow);
				echo $timenow;
				?>

      </li>

    </ul>
    <div id="send_info" style="padding: 5px 10px 0 0; clear:right;text-align: right; color: #FF9900;width:40%;float: right;">            
      <?php
					if (IsLoggedIn()==1) {
					echo "<a href=\"logout.php\" style=\"text-decoration: none\" target=\"_top\" class=\"fix-submenu\"><font face=\"Verdana\" size=\"1\" color=\"#003399\">Thoát</font></a>";
					}
           // add code hungdq Block CSC
           $sSqlWrk = "DELETE FROM t_question WHERE (email= '' AND `content` = '') OR (email='sample@email.tst') OR (`content`=1)";   
           $rswrk = $conn->Execute($sSqlWrk);
           if ($rswrk) $rswrk->Close();
       ?>
        
    </div>
        <div id="load-div" style="padding: 5px 10px 0 0; text-align: right; color: #FF9900; display: none;width:40%;float:right;"><img src="images/top_loader.gif" width="16" height="16" alt="Yêu cầu của bạn đang được xử lý ..." style="vertical-align: middle" /> Yêu cầu của bạn đang được xử lý ...</div>
  </div>

</div>

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

    function AllowMenu($TableName) {
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


?>   
<div id="menu-div">
  <ul>
    <li class="fix-spacel">&nbsp;</li>
    <li><a href="../index.php" target="_parent">Trang chủ</a></li>
    <?php   if (AllowMenu('intro_article')) {?><li><a href="intro_articlelist.php" target="main-frame">Bài viết</a></li><?php } ; ?>
    <?php   if (AllowMenu('advertising_info')) {?><li><a href="advertising_infolist.php" target="main-frame">Tin quảng cáo</a></li><?php } ; ?>
    <?php   if (AllowMenu('UsersRegistered')) {?><li><a href="UsersRegisteredlist.php" target="main-frame">Thành viên</a></li><?php } ; ?>
    <li class="fix-spacer">&nbsp;</li>
  </ul>
  <br class="clear" />
</div>
</body>

</html>