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
$forgetpwd = new cforgetpwd();
$Page =& $forgetpwd;

// Page init processing
$forgetpwd->Page_Init();

// Page main processing
$forgetpwd->Page_Main();
?>
<?php include ("../include/header.php");?>
<div id="layout">
<div id="header" class="clearfix">
<div id="logo" class="clearfix">
<form >
<a href="../home/index.php">
<img src="../images/common/img_logo.gif"/>
</a>
</form>
</div>
<div id="divheader_right" class="clearfix">
<?php include "../include/linetop.php" ?>
<?php  include "../include/nganluong.php"; ?>
<!-- end header_right--></div>
<!-- divhearder--></div>
<div id="tabsninhthuan" class="clearfix">
    <?php $_SESSION['tab']=0;?>
    <?php include "../include/tab.php" ?>
    <?php include "../include/search.php" ?>
  <!-- eand tapthainguyen--></div>
 
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<script type="text/javascript">
<!--
var forgetpwd = new ew_Page("forgetpwd");

// extend page with ValidateForm function
forgetpwd.ValidateForm = function(fobj)
{
	if (!this.ValidateRequired)
		return true; // ignore validation
	if  (!ew_HasValue(fobj.email))
		return ew_OnError(this, fobj.email, "Hãy điền địa chỉ Email!");
	if  (!ew_CheckEmail(fobj.email.value))
		return ew_OnError(this, fobj.email, "Địa chỉ Email không hợp lệ!");

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	return true;
}

// extend page with Form_CustomValidate function
forgetpwd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// requires js validation
<?php if (EW_CLIENT_VALIDATE) { ?>
forgetpwd.ValidateRequired = true;
<?php } else { ?>
forgetpwd.ValidateRequired = false;
<?php } ?>

//-->
</script>
  <div id="pageBody" class="clearfix" >
      <div id="primarylogin" >
            <h2>LẤY LẠI MẬT KHẨU</h2>
             <?php $forgetpwd->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return forgetpwd.ValidateForm(this);">
    <center style="padding-top: 30px;">
    <table id="tbllogin">
              <tr>
                <td class="txtlogin"><p>Email:</p></td>
		<td><input type="text" name="email" id="email" class="tencongty" size="60" style="width:320px;" value="<?php ew_HtmlEncode($forgetpwd->sEmail) ?>" maxlength="50"></td>
              </tr>
    </table>

        <p class="prow"><input type="submit" name="submit" id="submit" value="Lấy lại mật khẩu"></p>
        <p class="prow"><a href="login.php"><span id="dangkythanhvien">Quay trở lại trang đăng nhập</span></a></p>
    </center>
</form>
      </div>
  <!-- end page body--></div>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<?php include "../include/footer.php" ?>
<?php

//
// Page Class
//
class cforgetpwd {

	// Page ID
	var $PageID = 'forgetpwd';

	// Page Object Name
	var $PageObjName = 'forgetpwd';

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
	function cforgetpwd() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'forgetpwd', TRUE);

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
	var $sEmail = "";

	//
	// Page main processing
	//
	function Page_Main() {
		global $conn, $gsFormError, $user;
		if (ew_IsHttpPost()) {
			$bValidEmail = FALSE;
			$bEmailSent = FALSE;

			// Setup variables
			$sEmail = $_POST["email"];
			if ($this->ValidateForm($sEmail)) {

				// Set up filter (SQL WHERE clause) and get Return SQL
				// SQL constructor in user class, userinfo.php

				$sFilter = '`tendangnhap` = ' . ew_QuotedValue($sEmail, EW_DATATYPE_STRING);
				$user->CurrentFilter = $sFilter;
				$sSql = $user->SQL();
				if ($RsUser = $conn->Execute($sSql)) {
					if (!$RsUser->EOF) {
						$sUserName = $RsUser->fields('tendangnhap');
						$sPassword = $RsUser->fields('mat_khau');
                                                $sten_congty = $RsUser->fields('ten_congty');
                                                if (EW_MD5_PASSWORD) {
							$rsnew = array('mat_khau' => $sPassword); // Reset the password
							$conn->Execute($user->UpdateSQL($rsnew));
						}
						$bValidEmail = TRUE;
					} else {
						$this->setMessage("Invalid Email");
					}
					if ($bValidEmail) {
						$Email = new cEmail();
						$Email->Load("txt/forgetpwd.txt");
						$Email->ReplaceSender(EW_SENDER_EMAIL); // Replace Sender
						$Email->ReplaceRecipient($sEmail); // Replace Recipient
                                                $Email->ReplaceSubject(strval($sten_congty));
						$Email->ReplaceContent('<!--$UserName-->', $sUserName);
						$Email->ReplaceContent('<!--$Password-->', strval($sPassword));
						$Args = array();
						$Args["rs"] =& $rsnew;
						if ($this->Email_Sending($Email, $Args))
							$bEmailSent = $Email->Send();
					}
					$RsUser->Close();
				}
				if ($bEmailSent) {
					$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Mật khẩu đã được gửi tới Email của bạn</font></div>"); // Set success message
					$this->Page_Terminate("login.php"); // Return to login page
				} elseif ($bValidEmail) {
					$this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Lỗi khi gửi email</font></div>"); // Set up error message
				}
			} else {
				$this->setMessage($gsFormError);
			}
		}
	}

	//
	// Validate form
	//
	function ValidateForm($email) {
		global $gsFormError;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		/*if ($email == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy điền địa chỉ Email!";
		}
		if (!ew_CheckEmail($email)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Địa chỉ Email không hợp lệ!";
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

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
