<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UserAdmininfo.php" ?>
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
$UserAdmin_edit = new cUserAdmin_edit();
$Page =& $UserAdmin_edit;

// Page init processing
$UserAdmin_edit->Page_Init();

// Page main processing
$UserAdmin_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var UserAdmin_edit = new ew_Page("UserAdmin_edit");

// page properties
UserAdmin_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = UserAdmin_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
UserAdmin_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tendangnhap"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy điền thông tin trường bắt buộc - Tên đăng nhập");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
UserAdmin_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UserAdmin_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UserAdmin_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UserAdmin_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<a href="<?php echo $UserAdmin->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a>&nbsp;Sửa thông tin cá nhân</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $UserAdmin_edit->ShowMessage() ?>
<form name="fUserAdminedit" id="fUserAdminedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return UserAdmin_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="UserAdmin">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($UserAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $UserAdmin->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Loại người dùng</td>
		<td<?php echo $UserAdmin->nguoidung_option->CellAttributes() ?>><span id="el_nguoidung_option">
<div<?php echo $UserAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UserAdmin->nguoidung_option->EditValue ?></div><input type="hidden" name="x_nguoidung_option" id="x_nguoidung_option" value="<?php echo ew_HtmlEncode($UserAdmin->nguoidung_option->CurrentValue) ?>">
</span><?php echo $UserAdmin->nguoidung_option->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $UserAdmin->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tên đăng nhập<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UserAdmin->tendangnhap->CellAttributes() ?>><span id="el_tendangnhap">
<input type="text" name="x_tendangnhap" id="x_tendangnhap" size="30" maxlength="150" value="<?php echo $UserAdmin->tendangnhap->EditValue ?>"<?php echo $UserAdmin->tendangnhap->EditAttributes() ?>>
</span><?php echo $UserAdmin->tendangnhap->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $UserAdmin->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UserAdmin->hoten_nguoilienhe->CellAttributes() ?>><span id="el_hoten_nguoilienhe">
<input type="text" name="x_hoten_nguoilienhe" id="x_hoten_nguoilienhe" size="30" maxlength="90" value="<?php echo $UserAdmin->hoten_nguoilienhe->EditValue ?>"<?php echo $UserAdmin->hoten_nguoilienhe->EditAttributes() ?>>
</span><?php echo $UserAdmin->hoten_nguoilienhe->CustomMsg ?>
</td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $UserAdmin->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</span></td>
		<td<?php echo $UserAdmin->gioi_tinh->CellAttributes() ?>><span id="el_gioi_tinh">
<select id="x_gioi_tinh" name="x_gioi_tinh"<?php echo $UserAdmin->gioi_tinh->EditAttributes() ?>>
<?php
if (is_array($UserAdmin->gioi_tinh->EditValue)) {
	$arwrk = $UserAdmin->gioi_tinh->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UserAdmin->gioi_tinh->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $UserAdmin->gioi_tinh->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $UserAdmin->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $UserAdmin->quocgia_id->CellAttributes() ?>><span id="el_quocgia_id">
<select id="x_quocgia_id" name="x_quocgia_id"<?php echo $UserAdmin->quocgia_id->EditAttributes() ?>>
<?php
if (is_array($UserAdmin->quocgia_id->EditValue)) {
	$arwrk = $UserAdmin->quocgia_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UserAdmin->quocgia_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $UserAdmin->quocgia_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $UserAdmin->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $UserAdmin->nick_yahoo->CellAttributes() ?>><span id="el_nick_yahoo">
<input type="text" name="x_nick_yahoo" id="x_nick_yahoo" size="30" maxlength="150" value="<?php echo $UserAdmin->nick_yahoo->EditValue ?>"<?php echo $UserAdmin->nick_yahoo->EditAttributes() ?>>
</span><?php echo $UserAdmin->nick_yahoo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $UserAdmin->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $UserAdmin->nick_skype->CellAttributes() ?>><span id="el_nick_skype">
<input type="text" name="x_nick_skype" id="x_nick_skype" size="30" maxlength="150" value="<?php echo $UserAdmin->nick_skype->EditValue ?>"<?php echo $UserAdmin->nick_skype->EditAttributes() ?>>
</span><?php echo $UserAdmin->nick_skype->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<tr<?php echo $UserAdmin->truycap_gannhat->RowAttributes ?>>
		<td class="ewTableHeader">Truy cập gần nhất</td>
		<td<?php echo $UserAdmin->truycap_gannhat->CellAttributes() ?>><span id="el_truycap_gannhat">
<div<?php echo $UserAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UserAdmin->truycap_gannhat->EditValue ?></div><input type="hidden" name="x_truycap_gannhat" id="x_truycap_gannhat" value="<?php echo ew_HtmlEncode($UserAdmin->truycap_gannhat->CurrentValue) ?>">
</span><?php echo $UserAdmin->truycap_gannhat->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UserAdmin->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UserAdmin->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Cấp bậc</td>
		<td<?php echo $UserAdmin->UserLevelID->CellAttributes() ?>><span id="el_UserLevelID">
<div<?php echo $UserAdmin->UserLevelID->ViewAttributes() ?>><?php echo $UserAdmin->UserLevelID->EditValue ?></div><input type="hidden" name="x_UserLevelID" id="x_UserLevelID" value="<?php echo ew_HtmlEncode($UserAdmin->UserLevelID->CurrentValue) ?>">
</span><?php echo $UserAdmin->UserLevelID->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_nguoidung_id" id="x_nguoidung_id" value="<?php echo ew_HtmlEncode($UserAdmin->nguoidung_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="   Sửa   ">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cUserAdmin_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'UserAdmin';

	// Page Object Name
	var $PageObjName = 'UserAdmin_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UserAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UserAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UserAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUserAdmin_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["UserAdmin"] = new cUserAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UserAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserAdmin;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("UserAdminlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

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
		global $objForm, $gsFormError, $UserAdmin;

		// Load key from QueryString
		if (@$_GET["nguoidung_id"] <> "")
			$UserAdmin->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$UserAdmin->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$UserAdmin->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$UserAdmin->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($UserAdmin->nguoidung_id->CurrentValue == "")
			$this->Page_Terminate("UserAdminlist.php"); // Invalid key, return to list
		switch ($UserAdmin->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("UserAdminlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$UserAdmin->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Sửa thông tin cá nhân thành công"); // Update success
					$sReturnUrl = $UserAdmin->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "UserAdminview.php")
						$sReturnUrl = $UserAdmin->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$UserAdmin->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $UserAdmin;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $UserAdmin;
		$UserAdmin->nguoidung_option->setFormValue($objForm->GetValue("x_nguoidung_option"));
		$UserAdmin->tendangnhap->setFormValue($objForm->GetValue("x_tendangnhap"));
		$UserAdmin->truycap_gannhat->setFormValue($objForm->GetValue("x_truycap_gannhat"));
		$UserAdmin->truycap_gannhat->CurrentValue = ew_UnFormatDateTime($UserAdmin->truycap_gannhat->CurrentValue, 7);
		$UserAdmin->UserLevelID->setFormValue($objForm->GetValue("x_UserLevelID"));
		$UserAdmin->hoten_nguoilienhe->setFormValue($objForm->GetValue("x_hoten_nguoilienhe"));
		$UserAdmin->gioi_tinh->setFormValue($objForm->GetValue("x_gioi_tinh"));
		$UserAdmin->quocgia_id->setFormValue($objForm->GetValue("x_quocgia_id"));
		$UserAdmin->nick_yahoo->setFormValue($objForm->GetValue("x_nick_yahoo"));
		$UserAdmin->nick_skype->setFormValue($objForm->GetValue("x_nick_skype"));
		$UserAdmin->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $UserAdmin;
		$UserAdmin->nguoidung_id->CurrentValue = $UserAdmin->nguoidung_id->FormValue;
		$this->LoadRow();
		$UserAdmin->nguoidung_option->CurrentValue = $UserAdmin->nguoidung_option->FormValue;
		$UserAdmin->tendangnhap->CurrentValue = $UserAdmin->tendangnhap->FormValue;
		$UserAdmin->truycap_gannhat->CurrentValue = $UserAdmin->truycap_gannhat->FormValue;
		$UserAdmin->truycap_gannhat->CurrentValue = ew_UnFormatDateTime($UserAdmin->truycap_gannhat->CurrentValue, 7);
		$UserAdmin->UserLevelID->CurrentValue = $UserAdmin->UserLevelID->FormValue;
		$UserAdmin->hoten_nguoilienhe->CurrentValue = $UserAdmin->hoten_nguoilienhe->FormValue;
		$UserAdmin->gioi_tinh->CurrentValue = $UserAdmin->gioi_tinh->FormValue;
		$UserAdmin->quocgia_id->CurrentValue = $UserAdmin->quocgia_id->FormValue;
		$UserAdmin->nick_yahoo->CurrentValue = $UserAdmin->nick_yahoo->FormValue;
		$UserAdmin->nick_skype->CurrentValue = $UserAdmin->nick_skype->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UserAdmin;
		$sFilter = $UserAdmin->KeyFilter();

		// Call Row Selecting event
		$UserAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UserAdmin->CurrentFilter = $sFilter;
		$sSql = $UserAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UserAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UserAdmin;
		$UserAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UserAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UserAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UserAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UserAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UserAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UserAdmin->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UserAdmin->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UserAdmin->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UserAdmin->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UserAdmin->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UserAdmin;

		// Call Row_Rendering event
		$UserAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UserAdmin->nguoidung_option->CellCssStyle = "";
		$UserAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UserAdmin->tendangnhap->CellCssStyle = "";
		$UserAdmin->tendangnhap->CellCssClass = "";

		// truycap_gannhat
		$UserAdmin->truycap_gannhat->CellCssStyle = "";
		$UserAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UserAdmin->UserLevelID->CellCssStyle = "";
		$UserAdmin->UserLevelID->CellCssClass = "";
                
		// hoten_nguoilienhe
		$UserAdmin->hoten_nguoilienhe->CellCssStyle = "";
		$UserAdmin->hoten_nguoilienhe->CellCssClass = "";

		// gioi_tinh
		$UserAdmin->gioi_tinh->CellCssStyle = "";
		$UserAdmin->gioi_tinh->CellCssClass = "";

		// quocgia_id
		$UserAdmin->quocgia_id->CellCssStyle = "";
		$UserAdmin->quocgia_id->CellCssClass = "";

		// nick_yahoo
		$UserAdmin->nick_yahoo->CellCssStyle = "";
		$UserAdmin->nick_yahoo->CellCssClass = "";

		// nick_skype
		$UserAdmin->nick_skype->CellCssStyle = "";
		$UserAdmin->nick_skype->CellCssClass = "";
		if ($UserAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UserAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UserAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UserAdmin->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UserAdmin->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UserAdmin->nguoidung_option->ViewValue = $UserAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UserAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UserAdmin->nguoidung_option->CssStyle = "";
			$UserAdmin->nguoidung_option->CssClass = "";
			$UserAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UserAdmin->tendangnhap->ViewValue = $UserAdmin->tendangnhap->CurrentValue;
			$UserAdmin->tendangnhap->CssStyle = "";
			$UserAdmin->tendangnhap->CssClass = "";
			$UserAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->ViewValue = $UserAdmin->truycap_gannhat->CurrentValue;
			$UserAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UserAdmin->truycap_gannhat->ViewValue, 11);
			$UserAdmin->truycap_gannhat->CssStyle = "";
			$UserAdmin->truycap_gannhat->CssClass = "";
			$UserAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UserAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UserAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UserAdmin->UserLevelID->ViewValue = $UserAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UserAdmin->UserLevelID->ViewValue = NULL;
			}
			$UserAdmin->UserLevelID->CssStyle = "";
			$UserAdmin->UserLevelID->CssClass = "";
			$UserAdmin->UserLevelID->ViewCustomAttributes = "";
			
			// hoten_nguoilienhe
			$UserAdmin->hoten_nguoilienhe->ViewValue = $UserAdmin->hoten_nguoilienhe->CurrentValue;
			$UserAdmin->hoten_nguoilienhe->CssStyle = "";
			$UserAdmin->hoten_nguoilienhe->CssClass = "";
			$UserAdmin->hoten_nguoilienhe->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($UserAdmin->gioi_tinh->CurrentValue) <> "") {
				switch ($UserAdmin->gioi_tinh->CurrentValue) {
					case "0":
						$UserAdmin->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$UserAdmin->gioi_tinh->ViewValue = "Nữ";
						break;
					default:
						$UserAdmin->gioi_tinh->ViewValue = $UserAdmin->gioi_tinh->CurrentValue;
				}
			} else {
				$UserAdmin->gioi_tinh->ViewValue = NULL;
			}
			$UserAdmin->gioi_tinh->CssStyle = "";
			$UserAdmin->gioi_tinh->CssClass = "";
			$UserAdmin->gioi_tinh->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($UserAdmin->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($UserAdmin->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$UserAdmin->quocgia_id->ViewValue = $UserAdmin->quocgia_id->CurrentValue;
				}
			} else {
				$UserAdmin->quocgia_id->ViewValue = NULL;
			}
			$UserAdmin->quocgia_id->CssStyle = "";
			$UserAdmin->quocgia_id->CssClass = "";
			$UserAdmin->quocgia_id->ViewCustomAttributes = "";

			// nick_yahoo
			$UserAdmin->nick_yahoo->ViewValue = $UserAdmin->nick_yahoo->CurrentValue;
			$UserAdmin->nick_yahoo->CssStyle = "";
			$UserAdmin->nick_yahoo->CssClass = "";
			$UserAdmin->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$UserAdmin->nick_skype->ViewValue = $UserAdmin->nick_skype->CurrentValue;
			$UserAdmin->nick_skype->CssStyle = "";
			$UserAdmin->nick_skype->CssClass = "";
			$UserAdmin->nick_skype->ViewCustomAttributes = "";
			
			// nguoidung_option
			$UserAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UserAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UserAdmin->UserLevelID->HrefValue = "";

			// hoten_nguoilienhe
			$UserAdmin->hoten_nguoilienhe->HrefValue = "";

			// gioi_tinh
			$UserAdmin->gioi_tinh->HrefValue = "";

			// quocgia_id
			$UserAdmin->quocgia_id->HrefValue = "";

			// nick_yahoo
			$UserAdmin->nick_yahoo->HrefValue = "";

			// nick_skype
			$UserAdmin->nick_skype->HrefValue = "";
		} elseif ($UserAdmin->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// nguoidung_option
			$UserAdmin->nguoidung_option->EditCustomAttributes = "";
			if (strval($UserAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UserAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UserAdmin->nguoidung_option->EditValue = "Quản lý hệ thống";
						break;
					case "1":
						$UserAdmin->nguoidung_option->EditValue = "Thành viên đăng ký";
						break;
					default:
						$UserAdmin->nguoidung_option->EditValue = $UserAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UserAdmin->nguoidung_option->EditValue = NULL;
			}
			$UserAdmin->nguoidung_option->CssStyle = "";
			$UserAdmin->nguoidung_option->CssClass = "";
			$UserAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UserAdmin->tendangnhap->EditCustomAttributes = "";
			$UserAdmin->tendangnhap->EditValue = ew_HtmlEncode($UserAdmin->tendangnhap->CurrentValue);

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->EditCustomAttributes = "";
			$UserAdmin->truycap_gannhat->EditValue = $UserAdmin->truycap_gannhat->CurrentValue;
			$UserAdmin->truycap_gannhat->EditValue = ew_FormatDateTime($UserAdmin->truycap_gannhat->EditValue, 7);
			$UserAdmin->truycap_gannhat->CssStyle = "";
			$UserAdmin->truycap_gannhat->CssClass = "";
			$UserAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			$UserAdmin->UserLevelID->EditCustomAttributes = "";
			if (strval($UserAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UserAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->UserLevelID->EditValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UserAdmin->UserLevelID->EditValue = $UserAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UserAdmin->UserLevelID->EditValue = NULL;
			}
			$UserAdmin->UserLevelID->CssStyle = "";
			$UserAdmin->UserLevelID->CssClass = "";
			$UserAdmin->UserLevelID->ViewCustomAttributes = "";
                        
			// hoten_nguoilienhe
			$UserAdmin->hoten_nguoilienhe->EditCustomAttributes = "";
			$UserAdmin->hoten_nguoilienhe->EditValue = ew_HtmlEncode($UserAdmin->hoten_nguoilienhe->CurrentValue);
			
			// gioi_tinh
			$UserAdmin->gioi_tinh->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Nam");
			$arwrk[] = array("1", "Nữ");
			//array_unshift($arwrk, array("", "Chọn"));
			$UserAdmin->gioi_tinh->EditValue = $arwrk;

			// quocgia_id
			$UserAdmin->quocgia_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `country`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("VN", "Mặc định(VIETNAM)"));
			$UserAdmin->quocgia_id->EditValue = $arwrk;

			// nick_yahoo
			$UserAdmin->nick_yahoo->EditCustomAttributes = "";
			$UserAdmin->nick_yahoo->EditValue = ew_HtmlEncode($UserAdmin->nick_yahoo->CurrentValue);

			// nick_skype
			$UserAdmin->nick_skype->EditCustomAttributes = "";
			$UserAdmin->nick_skype->EditValue = ew_HtmlEncode($UserAdmin->nick_skype->CurrentValue);
			// Edit refer script
			// nguoidung_option

			$UserAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UserAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UserAdmin->UserLevelID->HrefValue = "";
			// hoten_nguoilienhe
			$UserAdmin->hoten_nguoilienhe->HrefValue = "";

			// gioi_tinh
			$UserAdmin->gioi_tinh->HrefValue = "";

			// quocgia_id
			$UserAdmin->quocgia_id->HrefValue = "";

			// nick_yahoo
			$UserAdmin->nick_yahoo->HrefValue = "";

			// nick_skype
			$UserAdmin->nick_skype->HrefValue = "";
		}

		// Call Row Rendered event
		$UserAdmin->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $UserAdmin;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($UserAdmin->tendangnhap->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy điền thông tin trường bắt buộc - Tên đăng nhập";
		}
		if ($UserAdmin->hoten_nguoilienhe->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy điền họ";
		}*/

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	function EditRow() {
		global $conn, $Security, $UserAdmin;
		$sFilter = $UserAdmin->KeyFilter();
			if ($UserAdmin->tendangnhap->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(tendangnhap = '" . ew_AdjustSql($UserAdmin->tendangnhap->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$UserAdmin->CurrentFilter = $sFilterChk;
			$sSqlChk = $UserAdmin->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "tendangnhap", "Duplicate value '%v' for unique index '%f'");
				$sIdxErrMsg = str_replace("%v", $UserAdmin->tendangnhap->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);				
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$UserAdmin->CurrentFilter = $sFilter;
		$sSql = $UserAdmin->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// Field tendangnhap
			$UserAdmin->tendangnhap->SetDbValueDef($UserAdmin->tendangnhap->CurrentValue, "");
			$rsnew['tendangnhap'] =& $UserAdmin->tendangnhap->DbValue;

			// Field hoten_nguoilienhe
			$UserAdmin->hoten_nguoilienhe->SetDbValueDef($UserAdmin->hoten_nguoilienhe->CurrentValue, "");
			$rsnew['hoten_nguoilienhe'] =& $UserAdmin->hoten_nguoilienhe->DbValue;

			// Field gioi_tinh
			$UserAdmin->gioi_tinh->SetDbValueDef($UserAdmin->gioi_tinh->CurrentValue, 0);
			$rsnew['gioi_tinh'] =& $UserAdmin->gioi_tinh->DbValue;

			// Field quocgia_id
			$UserAdmin->quocgia_id->SetDbValueDef($UserAdmin->quocgia_id->CurrentValue, NULL);
			$rsnew['quocgia_id'] =& $UserAdmin->quocgia_id->DbValue;

			// Field nick_yahoo
			$UserAdmin->nick_yahoo->SetDbValueDef($UserAdmin->nick_yahoo->CurrentValue, NULL);
			$rsnew['nick_yahoo'] =& $UserAdmin->nick_yahoo->DbValue;

			// Field nick_skype
			$UserAdmin->nick_skype->SetDbValueDef($UserAdmin->nick_skype->CurrentValue, NULL);
			$rsnew['nick_skype'] =& $UserAdmin->nick_skype->DbValue;

			// Call Row Updating event
			$bUpdateRow = $UserAdmin->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($UserAdmin->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($UserAdmin->CancelMessage <> "") {
					$this->setMessage($UserAdmin->CancelMessage);
					$UserAdmin->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$UserAdmin->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>