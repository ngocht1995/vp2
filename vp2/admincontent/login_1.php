<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php

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
$login = new clogin();
$Page =& $login;

// Page init processing
$login->Page_Init();

// Page main processing
$login->Page_Main();
?>
<meta charset="utf8">

<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<script type="text/javascript">
<!--
var login = new ew_Page("login");

// extend page with ValidateForm function
login.ValidateForm = function(fobj)
{
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (!ew_HasValue(fobj.username))
		return ew_OnError(this, fobj.username, "Hãy điền tên tài khoản");
	if (!ew_HasValue(fobj.password))
		return ew_OnError(this, fobj.password, "Hãy điền mật khẩu");

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	return true;
}

// extend page with Form_CustomValidate function
login.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// requires js validation
<?php if (EW_CLIENT_VALIDATE) { ?>
login.ValidateRequired = true;
<?php } else { ?>
login.ValidateRequired = false;
<?php } ?>

//-->
</script>
  
<?php include ("../include/header.php");?>
<div id="mainWap">
<div id="header"> <span><img src="../images/img_logo.png" height="68px"/></span>
          <ul class="logo">
            <li >Văn phòng</li>
            <li class="last">Hỗ trợ sinh viên</li>
          </ul>
        <ul class="search">
          <form action="" method="get">
            <li>
                <input name="txtSearch" class="search" type="text" />
              </li>
          </form>
        </ul>
		
      </div>
      <!-- End header -->
          <div class="quancaoleft"><a href="#"><img src="../images/quangcao.gif" /></a></div>  
        <!-- End left -->
		<hr />
        <div class="clr"></div>
      <div id="center">	
<?php include ("../include/top.php");?>        
<?php include ("../include/menu_navi.php");?>
		  	<samp> <img  width="906px" src="../images/bgr_07.gif"  /></samp>
			<div class="clr"></div>
                        <div id="noidung" style="">
			 <div id="pageBody" class="clearfix" >

                             <div id="primarylogin" >
                                   

                                    <div id="noidunglogin">
                                        <div style="height: 32px; background: #336699;"><center><h3 class="dangnhaphethong">Đăng Nhập Hệ Thống</h3></center></div>        
                            <form action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return login.ValidateForm(this);">
                            <?php $login->ShowMessage() ?>
                            <center>
                                <table id="tbllogin" style="margin-top:15px;">
                                        <tr>
                                        <td class="txtlogin"><p>Tên đăng nhập</p></td>
                                        <td><input type="text" name="username" id="username" class="tencongty" height="20px;"  style="width:300px;" value="<?php echo $login->sUsername ?>"></td>
                                        </tr>
                                        <tr>
                                        <td class="txtlogin"><p>Mật khẩu</p></td>
                                        <td><input type="password" name="password" id="password" class="tencongty" height="20px;" style="width:300px;"></td>
                                        </tr>
                                    </table>
                                </center>
                                <div id="questionlogin">
                                        <p ><input type="radio" name="rememberme" id="rememberme" value="a"<?php if ($login->sLoginType == "a") { ?> checked="checked"<?php } ?>><span class="spanlogin">Tự động đăng nhập cho đến khi đăng xuất hoàn toàn</span></p>
                                        <p><input type="radio" name="rememberme" id="rememberme" value="u"<?php if ($login->sLoginType == "u") { ?>  checked="checked"<?php } ?>><span class="spanlogin">Lưu tài khoản và mật khẩu</span></p>
                                        <p ><input type="radio" name="rememberme" id="rememberme" value=""<?php if ($login->sLoginType == "") { ?> checked="checked"<?php } ?>><span class="spanlogin">Luôn hỏi tài khoản và mật khẩu</span></p>
                                        <p class="prow"><input name="Button1" type="submit" value="Đăng nhập" style="background:#0158a0;font-weight:600;color:white;padding: 2px;" /></p>
                                        <p><a href="forgetpwd.php"><span id="quenmatkhau" > Quên mật khẩu ?</span></a> <a href="register.php"><span id="dangkythanhvien">Đăng ký thành viên</span></a></p>

                                </div>
                            </form>
                                          <div style="height: 32px; background: #336699;"></div>     
                                    <!--end noidunglogin--> </div>

                                </div>
       
  <!-- end page body--></div>
			 <div id="right">
			  
<div class="clr"></div>	
 <?php include ("../include/footer.php");?>


<?php

//
// Page Class
//
class clogin {

	// Page ID
	var $PageID = 'login';

	// Page Object Name
	var $PageObjName = 'login';

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
	function clogin() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'login', TRUE);

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
	var $sUsername;
	var $sLoginType;

	//
	// Page main processing
	//
	function Page_Main() {
		global $Security, $gsFormError, $conn;
		$sLastUrl = $Security->LastUrl(); // Get Last Url
		if ($sLastUrl == "")
                   $sLastUrl = "mess.php?mess=noact";
		if (!$Security->IsLoggedIn())
			$Security->AutoLogin();
		$Security->LoadUserLevel(); // Load user level
		if ($_SESSION['user'] <> "") {
                        // check nguoi dung
                        if ( $_SESSION['status']=='1') 
                        {
                            $sql_kiemtra = 'SELECT tendangnhap FROM user WHERE user.tendangnhap="'.$_SESSION['user'].'"'; 
                            $rswrk = $conn->Execute($sql_kiemtra);
                             $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                             if (COUNT($arwrk)==0) 
                             {
                                   $sql_insert= mysql_query('INSERT INTO user (tendangnhap, hoten_nguoilienhe, UserLevelID, xacthuc_boisan, thanhvien_tieubieu, nguoidung_option,ten_congty) VALUES ("'.$_SESSION['user'].'","'.$_SESSION['hovaten'].'",3,1,1,1,"'.$_SESSION['msv_login'].'")');
                             }
                        }
			// Setup variables
			$this->sUsername = $_SESSION['user'];;
		        $sPassword = '123456';
			$this->sLoginType = strtolower(@$_POST["rememberme"]);
			$bValidate = $this->ValidateForm($this->sUsername, $sPassword);
			if (!$bValidate)
				$this->setMessage($gsFormError);
		} else {
			if ($Security->IsLoggedIn()) {
				if ($this->getMessage() == "")
					$this->Page_Terminate($sLastUrl); // Return to last accessed page
			}
			$bValidate = FALSE;

			// Restore settings
			$this->sUsername = @$_COOKIE[EW_PROJECT_NAME]['UserName'];
			if (@$_COOKIE[EW_PROJECT_NAME]['AutoLogin'] == "autologin") {
				$this->sLoginType = "a";
			} elseif (@$_COOKIE[EW_PROJECT_NAME]['AutoLogin'] == "rememberusername") {
				$this->sLoginType = "u";
			} else {
				$this->sLoginType = "";
			}
		}
		if ($bValidate) {
			$bValidPwd = FALSE;

			// Call loggin in event
			$bValidate = $this->User_LoggingIn($this->sUsername, $sPassword);
			if ($bValidate) {
				$bValidPwd = $Security->ValidateUser($this->sUsername, $sPassword);
				if (!$bValidPwd)
					$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Sai tài khoản hoặc mật khẩu</font></div>"); // Invalid User ID/password
			} else {
				if ($this->getMessage() == "")
					$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Đăng nhập thất bại</font></div>"); // Login cancelled
			}
			if ($bValidPwd) {
				//Edit by TuanDA
				global $conn, $Security, $user;
                                //Update user_track
				$sSql1 = "insert into user_track (diachi_ip, tendangnhap, thoigian_dangnhap) values  ('" . $_SERVER['REMOTE_ADDR'] . "', '". $this->sUsername . "', '" . ew_GMT7DateTime() . "')";
                                $sSql2 = "update user set user.truycap_gannhat ='" .ew_GMT7DateTime() . "' where nguoidung_id =". $Security->CurrentUserID;
                              	$conn->Execute($sSql1);
                                $conn->Execute($sSql2);
				// Write cookies
				$expirytime = time() + 365*24*60*60; // Change cookie expiry time here
				if ($this->sLoginType == "a") { // Auto login
					setcookie(EW_PROJECT_NAME . '[AutoLogin]',  "autologin", $expirytime); // Set up autologin cookies
					setcookie(EW_PROJECT_NAME . '[UserName]', $this->sUsername, $expirytime); // Set up user name cookies
					setcookie(EW_PROJECT_NAME . '[Password]', TEAencrypt($sPassword, EW_RANDOM_KEY), $expirytime); // Set up password cookies
				} elseif ($this->sLoginType == "u") { // Remember user name
					setcookie(EW_PROJECT_NAME . '[AutoLogin]', "rememberusername", $expirytime); // Set up remember user name cookies
					setcookie(EW_PROJECT_NAME . '[UserName]', $this->sUsername, $expirytime); // Set up user name cookies			
				} else {
					setcookie(EW_PROJECT_NAME . '[AutoLogin]', "", $expirytime); // Clear autologin cookies
				}

				// Call loggedin event
				$this->User_LoggedIn($this->sUsername);  
                                If (IsAdmin())
                                $this->Page_Terminate('index.php');                                
                                else $this->Page_Terminate('../home/index.php');    
                                    
				 // Return to last accessed URL
			} else {

				// Call user login error event
				$this->User_LoginError($this->sUsername, $sPassword);
			}
		}
	}

	//
	// Validate form
	//
	function ValidateForm($usr, $pwd) {
		global $gsFormError;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		/*if (trim($usr) == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy điền tên tài khoản";
		}
		if (trim($pwd) == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy điền mật khẩu";
		}*/

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form Custom Validate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// User Logging In event
	function User_LoggingIn($usr, $pwd) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// User Logged In event
	function User_LoggedIn($usr) {

		//echo "User Logged In";
	}

	// User Login Error event
	function User_LoginError($usr, $pwd) {

		//echo "User Login Error";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
