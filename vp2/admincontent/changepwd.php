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
$changepwd = new cchangepwd();
$Page =& $changepwd;

// Page init processing
$changepwd->Page_Init();

// Page main processing
$changepwd->Page_Main();
?>
<?php include "header.php" ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<script type="text/javascript">
<!--
var changepwd = new ew_Page("changepwd");

// extend page with ValidateForm function
changepwd.ValidateForm = function(fobj)
{
	if (!this.ValidateRequired)
		return true; // ignore validation
	if  (!ew_HasValue(fobj.opwd))
		return ew_OnError(this, fobj.opwd, "Hãy điền mật khẩu cũ");
	if  (!ew_HasValue(fobj.npwd))
		return ew_OnError(this, fobj.npwd, "Hãy điền mật khẩu mới");
	if  (fobj.npwd.value != fobj.cpwd.value)
		return ew_OnError(this, fobj.cpwd, "Mật khẩu xác nhận không đúng");

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	return true;
}

// extend page with Form_CustomValidate function
changepwd.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// requires js validation
<?php if (EW_CLIENT_VALIDATE) { ?>
changepwd.ValidateRequired = true;
<?php } else { ?>
changepwd.ValidateRequired = false;
<?php } ?>

//-->
</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thay đổi mật khẩu</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $changepwd->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return changepwd.ValidateForm(this);">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr>
		<td class="ewTableHeader">Mật khẩu cũ</td>
		<td><span class="phpmaker"><input type="password" name="opwd" id="opwd" size="56"></span></td>
	</tr>
	<tr>
		<td class="ewTableHeader">Mật khẩu mới</td>
		<td><span class="phpmaker"><input type="password" name="npwd" id="npwd" size="56"></span></td>
	</tr>
	<tr>
		<td class="ewTableHeader">Nhập lại mật khẩu mới</td>
		<td><span class="phpmaker"><input type="password" name="cpwd" id="cpwd" size="56"></span></td>
	</tr>
</table>
</div>
</td></tr></table><br>
<div align = "center"><input type="submit" name="submit" id="submit" value="Đổi mật khẩu"></div>
</form>
<br>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cchangepwd {

	// Page ID
	var $PageID = 'changepwd';

	// Page Object Name
	var $PageObjName = 'changepwd';

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
	function cchangepwd() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'changepwd', TRUE);

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
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		//if (!$Security->IsLoggedIn() || $Security->IsSysAdmin())
			//$this->Page_Terminate("login.php");
		//$Security->LoadCurrentUserLevel("user");

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

	// 
	// Page main processing
	//
	function Page_Main() {
		global $conn, $Security, $gsFormError, $user;
		if (!ew_IsHttpPost())
			return;
		$bPwdUpdated = FALSE;

		// Setup variables
		$sUsername = $Security->CurrentUserName();
		$sOPwd = ew_StripSlashes(@$_POST["opwd"]);
		$sNPwd = ew_StripSlashes(@$_POST["npwd"]);
		$sCPwd = ew_StripSlashes(@$_POST["cpwd"]);
		if ($this->ValidateForm($sOPwd, $sNPwd, $sCPwd)) {
			$sFilter = "(tendangnhap = '" . ew_AdjustSql($sUsername) . "')";

			// Set up filter (Sql Where Clause) and get Return SQL
			// SQL constructor in user class, userinfo.php

			$user->CurrentFilter = $sFilter;
			$sSql = $user->SQL();
			if ($rs = $conn->Execute($sSql)) {
				if (!$rs->EOF) {
					if ((EW_MD5_PASSWORD && md5($sOPwd) == $rs->fields('mat_khau')) ||
						(!EW_MD5_PASSWORD && $sOPwd == $rs->fields('mat_khau'))) {
						$rsnew = array('mat_khau' => $sNPwd); // Change Password
                                                $sEmail = $rs->fields('tendangnhap');
                                                $sten_congty = $rs->fields('ten_congty');
						$rs->Close();
						$conn->raiseErrorFn = 'ew_ErrorFn';
						$bValidPwd = $conn->Execute($user->UpdateSQL($rsnew));
						$conn->raiseErrorFn = '';
						if ($bValidPwd)
							$bPwdUpdated = TRUE;
					}	else {
						$this->setMessage("Mật khẩu không hợp lệ");
					}
				} else {
					$rs->Close();
				}
			}
		}
		if ($bPwdUpdated) {
                    if (@$sEmail <> "") {

				// Load Email Content
				$Email = new cEmail();
				$Email->Load("txt/changepwd.txt");
				$Email->ReplaceSender(EW_SENDER_EMAIL); // Replace Sender
				$Email->ReplaceRecipient($sEmail); // Replace Recipient
                                $Email->ReplaceSubject($sten_congty);
				$Email->ReplaceContent('<!--$Password-->', $sNPwd);                                
				$Args = array();
				$Args["rs"] =& $rsnew;
				if ($this->Email_Sending($Email, $Args))
					$bEmailSent = $Email->Send();
			}
                        if ($bEmailSent) {
                            if (IsAdmin()) {
                                $this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Mật khẩu thay đổi thành công</font></div>"); // set up message
                                $this->Page_Terminate("UserAdminview.php"); // exit page and clean up
                            }else{
                                $this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Mật khẩu thay đổi thành công</font></div>"); // set up message
                                $this->Page_Terminate("userview.php"); // exit page and clean up
                            }
                        }else{
                             if (IsAdmin()) {
                                $this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Mật khẩu thay đổi thành công</font></div>"); // set up message
                                $this->Page_Terminate("UserAdminview.php"); // exit page and clean up
                            }else{
                            $this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Lỗi khi gửi email</font></div>"); // Set up error message
                            }
                        }
		} else {
			$this->setMessage($gsFormError);
		}
	}

	// 
	// Validate form
	//
	function ValidateForm($opwd, $npwd, $cpwd) {

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		global $gsFormError;
		$gsFormError = "";
		if ($opwd == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy điền mật khẩu cũ";
		}
		if ($npwd == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy điền mật khẩu mới";
		}
		if ($npwd <> $cpwd) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Mật khẩu nhập lại không đúng";
		}

		// Return validate result
		$valid = ($gsFormError == "");

		// Call Form Custom Validate event
		$sFormCustomError = "";
		$valid = $valid && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $valid;
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
