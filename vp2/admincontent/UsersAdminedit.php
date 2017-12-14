<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersAdmininfo.php" ?>
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
$UsersAdmin_edit = new cUsersAdmin_edit();
$Page =& $UsersAdmin_edit;

// Page init processing
$UsersAdmin_edit->Page_Init();

// Page main processing
$UsersAdmin_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript"><!--


// Create page object
var UsersAdmin_edit = new ew_Page("UsersAdmin_edit");

// page properties
UsersAdmin_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = UsersAdmin_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
UsersAdmin_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_hoten_nguoilienhe"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy điền họ tên người dùng");
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
UsersAdmin_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersAdmin_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersAdmin_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersAdmin_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//
--></script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
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
								<a href="<?php echo $UsersAdmin->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa người dùng hệ thống</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $UsersAdmin_edit->ShowMessage() ?>
<form name="fUsersAdminedit" id="fUsersAdminedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return UsersAdmin_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="UsersAdmin">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($UsersAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $UsersAdmin->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Thông tin người dùng</span></td>
		<td<?php echo $UsersAdmin->nguoidung_option->CellAttributes() ?>><span id="el_nguoidung_option">
<div<?php echo $UsersAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UsersAdmin->nguoidung_option->EditValue ?></div><input type="hidden" name="x_nguoidung_option" id="x_nguoidung_option" value="<?php echo ew_HtmlEncode($UsersAdmin->nguoidung_option->CurrentValue) ?>">
</span><?php echo $UsersAdmin->nguoidung_option->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $UsersAdmin->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tên đăng nhập</span></td>
		<td<?php echo $UsersAdmin->tendangnhap->CellAttributes() ?>><span id="el_tendangnhap">
<div<?php echo $UsersAdmin->tendangnhap->ViewAttributes() ?>><?php echo $UsersAdmin->tendangnhap->EditValue ?></div><input type="hidden" name="x_tendangnhap" id="x_tendangnhap" value="<?php echo ew_HtmlEncode($UsersAdmin->tendangnhap->CurrentValue) ?>">
</span><?php echo $UsersAdmin->tendangnhap->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $UsersAdmin->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $UsersAdmin->quocgia_id->CellAttributes() ?>><span id="el_quocgia_id">
<select id="x_quocgia_id" name="x_quocgia_id"<?php echo $UsersAdmin->quocgia_id->EditAttributes() ?>>
<?php
if (is_array($UsersAdmin->quocgia_id->EditValue)) {
	$arwrk = $UsersAdmin->quocgia_id->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersAdmin->quocgia_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $UsersAdmin->quocgia_id->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $UsersAdmin->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $UsersAdmin->gioi_tinh->CellAttributes() ?>><span id="el_gioi_tinh">
<select id="x_gioi_tinh" name="x_gioi_tinh"<?php echo $UsersAdmin->gioi_tinh->EditAttributes() ?>>
<?php
if (is_array($UsersAdmin->gioi_tinh->EditValue)) {
	$arwrk = $UsersAdmin->gioi_tinh->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersAdmin->gioi_tinh->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $UsersAdmin->gioi_tinh->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $UsersAdmin->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $UsersAdmin->hoten_nguoilienhe->CellAttributes() ?>><span id="el_hoten_nguoilienhe">
<input type="text" name="x_hoten_nguoilienhe" id="x_hoten_nguoilienhe" size="30" maxlength="90" value="<?php echo $UsersAdmin->hoten_nguoilienhe->EditValue ?>"<?php echo $UsersAdmin->hoten_nguoilienhe->EditAttributes() ?>>
</span><?php echo $UsersAdmin->hoten_nguoilienhe->CustomMsg ?>
</td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $UsersAdmin->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $UsersAdmin->nick_yahoo->CellAttributes() ?>><span id="el_nick_yahoo">
<input type="text" name="x_nick_yahoo" id="x_nick_yahoo" size="30" maxlength="150" value="<?php echo $UsersAdmin->nick_yahoo->EditValue ?>"<?php echo $UsersAdmin->nick_yahoo->EditAttributes() ?>>
</span><?php echo $UsersAdmin->nick_yahoo->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $UsersAdmin->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $UsersAdmin->nick_skype->CellAttributes() ?>><span id="el_nick_skype">
<input type="text" name="x_nick_skype" id="x_nick_skype" size="30" maxlength="150" value="<?php echo $UsersAdmin->nick_skype->EditValue ?>"<?php echo $UsersAdmin->nick_skype->EditAttributes() ?>>
</span><?php echo $UsersAdmin->nick_skype->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<tr<?php echo $UsersAdmin->truycap_gannhat->RowAttributes ?>>
		<td class="ewTableHeader">Truy cập gần nhất</span></td>
		<td<?php echo $UsersAdmin->truycap_gannhat->CellAttributes() ?>><span id="el_truycap_gannhat">
<div<?php echo $UsersAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersAdmin->truycap_gannhat->EditValue ?></div><input type="hidden" name="x_truycap_gannhat" id="x_truycap_gannhat" value="<?php echo ew_HtmlEncode($UsersAdmin->truycap_gannhat->CurrentValue) ?>">
</span><?php echo $UsersAdmin->truycap_gannhat->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($UsersAdmin->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UsersAdmin->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Cấp bậc</span></td>
		<td<?php echo $UsersAdmin->UserLevelID->CellAttributes() ?>><span id="el_UserLevelID">
<select id="x_UserLevelID" name="x_UserLevelID"<?php echo $UsersAdmin->UserLevelID->EditAttributes() ?>>
<?php
if (is_array($UsersAdmin->UserLevelID->EditValue)) {
	$arwrk = $UsersAdmin->UserLevelID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($UsersAdmin->UserLevelID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $UsersAdmin->UserLevelID->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_nguoidung_id" id="x_nguoidung_id" value="<?php echo ew_HtmlEncode($UsersAdmin->nguoidung_id->CurrentValue) ?>">
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
class cUsersAdmin_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'UsersAdmin';

	// Page Object Name
	var $PageObjName = 'UsersAdmin_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UsersAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersAdmin_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersAdmin"] = new cUsersAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersAdmin;
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
			$this->Page_Terminate("UsersAdminlist.php");
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
		global $objForm, $gsFormError, $UsersAdmin;

		// Load key from QueryString
		if (@$_GET["nguoidung_id"] <> "")
			$UsersAdmin->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$UsersAdmin->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$UsersAdmin->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$UsersAdmin->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($UsersAdmin->nguoidung_id->CurrentValue == "")
			$this->Page_Terminate("UsersAdminlist.php"); // Invalid key, return to list
		switch ($UsersAdmin->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không tìm thấy dữ liệu"); // No record found
					$this->Page_Terminate("UsersAdminlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$UsersAdmin->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Update success
					$sReturnUrl = $UsersAdmin->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "UsersAdminview.php")
						$sReturnUrl = $UsersAdmin->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$UsersAdmin->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $UsersAdmin;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $UsersAdmin;
		$UsersAdmin->nguoidung_option->setFormValue($objForm->GetValue("x_nguoidung_option"));
		$UsersAdmin->tendangnhap->setFormValue($objForm->GetValue("x_tendangnhap"));
		$UsersAdmin->truycap_gannhat->setFormValue($objForm->GetValue("x_truycap_gannhat"));
		$UsersAdmin->truycap_gannhat->CurrentValue = ew_UnFormatDateTime($UsersAdmin->truycap_gannhat->CurrentValue, 7);
		$UsersAdmin->UserLevelID->setFormValue($objForm->GetValue("x_UserLevelID"));
		$UsersAdmin->quocgia_id->setFormValue($objForm->GetValue("x_quocgia_id"));
		$UsersAdmin->gioi_tinh->setFormValue($objForm->GetValue("x_gioi_tinh"));
		$UsersAdmin->hoten_nguoilienhe->setFormValue($objForm->GetValue("x_hoten_nguoilienhe"));
		$UsersAdmin->nick_yahoo->setFormValue($objForm->GetValue("x_nick_yahoo"));
		$UsersAdmin->nick_skype->setFormValue($objForm->GetValue("x_nick_skype"));
		$UsersAdmin->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $UsersAdmin;
		$UsersAdmin->nguoidung_id->CurrentValue = $UsersAdmin->nguoidung_id->FormValue;
		$this->LoadRow();
		$UsersAdmin->nguoidung_option->CurrentValue = $UsersAdmin->nguoidung_option->FormValue;
		$UsersAdmin->tendangnhap->CurrentValue = $UsersAdmin->tendangnhap->FormValue;
		$UsersAdmin->truycap_gannhat->CurrentValue = $UsersAdmin->truycap_gannhat->FormValue;
		$UsersAdmin->truycap_gannhat->CurrentValue = ew_UnFormatDateTime($UsersAdmin->truycap_gannhat->CurrentValue, 7);
		$UsersAdmin->UserLevelID->CurrentValue = $UsersAdmin->UserLevelID->FormValue;
		$UsersAdmin->quocgia_id->CurrentValue = $UsersAdmin->quocgia_id->FormValue;
		$UsersAdmin->gioi_tinh->CurrentValue = $UsersAdmin->gioi_tinh->FormValue;
		$UsersAdmin->hoten_nguoilienhe->CurrentValue = $UsersAdmin->hoten_nguoilienhe->FormValue;
		$UsersAdmin->nick_yahoo->CurrentValue = $UsersAdmin->nick_yahoo->FormValue;
		$UsersAdmin->nick_skype->CurrentValue = $UsersAdmin->nick_skype->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UsersAdmin;
		$sFilter = $UsersAdmin->KeyFilter();

		// Call Row Selecting event
		$UsersAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UsersAdmin->CurrentFilter = $sFilter;
		$sSql = $UsersAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UsersAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UsersAdmin;
		$UsersAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UsersAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UsersAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UsersAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UsersAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UsersAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UsersAdmin->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UsersAdmin->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UsersAdmin->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UsersAdmin->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UsersAdmin->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersAdmin;

		// Call Row_Rendering event
		$UsersAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UsersAdmin->nguoidung_option->CellCssStyle = "";
		$UsersAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UsersAdmin->tendangnhap->CellCssStyle = "";
		$UsersAdmin->tendangnhap->CellCssClass = "";

		// truycap_gannhat
		$UsersAdmin->truycap_gannhat->CellCssStyle = "";
		$UsersAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UsersAdmin->UserLevelID->CellCssStyle = "";
		$UsersAdmin->UserLevelID->CellCssClass = "";

		// quocgia_id
		$UsersAdmin->quocgia_id->CellCssStyle = "";
		$UsersAdmin->quocgia_id->CellCssClass = "";

		// gioi_tinh
		$UsersAdmin->gioi_tinh->CellCssStyle = "";
		$UsersAdmin->gioi_tinh->CellCssClass = "";

		// hoten_nguoilienhe
		$UsersAdmin->hoten_nguoilienhe->CellCssStyle = "";
		$UsersAdmin->hoten_nguoilienhe->CellCssClass = "";

		// nick_yahoo
		$UsersAdmin->nick_yahoo->CellCssStyle = "";
		$UsersAdmin->nick_yahoo->CellCssClass = "";

		// nick_skype
		$UsersAdmin->nick_skype->CellCssStyle = "";
		$UsersAdmin->nick_skype->CellCssClass = "";
		if ($UsersAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UsersAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UsersAdmin->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersAdmin->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UsersAdmin->nguoidung_option->ViewValue = $UsersAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UsersAdmin->nguoidung_option->CssStyle = "";
			$UsersAdmin->nguoidung_option->CssClass = "";
			$UsersAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->ViewValue = $UsersAdmin->tendangnhap->CurrentValue;
			$UsersAdmin->tendangnhap->CssStyle = "";
			$UsersAdmin->tendangnhap->CssClass = "";
			$UsersAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->ViewValue = $UsersAdmin->truycap_gannhat->CurrentValue;
			$UsersAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UsersAdmin->truycap_gannhat->ViewValue, 11);
			$UsersAdmin->truycap_gannhat->CssStyle = "";
			$UsersAdmin->truycap_gannhat->CssClass = "";
			$UsersAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UsersAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersAdmin->UserLevelID->ViewValue = $UsersAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UsersAdmin->UserLevelID->ViewValue = NULL;
			}
			$UsersAdmin->UserLevelID->CssStyle = "";
			$UsersAdmin->UserLevelID->CssClass = "";
			$UsersAdmin->UserLevelID->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($UsersAdmin->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($UsersAdmin->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersAdmin->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$UsersAdmin->quocgia_id->ViewValue = $UsersAdmin->quocgia_id->CurrentValue;
				}
			} else {
				$UsersAdmin->quocgia_id->ViewValue = NULL;
			}
			$UsersAdmin->quocgia_id->CssStyle = "";
			$UsersAdmin->quocgia_id->CssClass = "";
			$UsersAdmin->quocgia_id->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($UsersAdmin->gioi_tinh->CurrentValue) <> "") {
				switch ($UsersAdmin->gioi_tinh->CurrentValue) {
					case "0":
						$UsersAdmin->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$UsersAdmin->gioi_tinh->ViewValue = "Nữ";
						break;
					default:
						$UsersAdmin->gioi_tinh->ViewValue = $UsersAdmin->gioi_tinh->CurrentValue;
				}
			} else {
				$UsersAdmin->gioi_tinh->ViewValue = NULL;
			}
			$UsersAdmin->gioi_tinh->CssStyle = "";
			$UsersAdmin->gioi_tinh->CssClass = "";
			$UsersAdmin->gioi_tinh->ViewCustomAttributes = "";

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->ViewValue = $UsersAdmin->hoten_nguoilienhe->CurrentValue;
			$UsersAdmin->hoten_nguoilienhe->CssStyle = "";
			$UsersAdmin->hoten_nguoilienhe->CssClass = "";
			$UsersAdmin->hoten_nguoilienhe->ViewCustomAttributes = "";

			// nick_yahoo
			$UsersAdmin->nick_yahoo->ViewValue = $UsersAdmin->nick_yahoo->CurrentValue;
			$UsersAdmin->nick_yahoo->CssStyle = "";
			$UsersAdmin->nick_yahoo->CssClass = "";
			$UsersAdmin->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$UsersAdmin->nick_skype->ViewValue = $UsersAdmin->nick_skype->CurrentValue;
			$UsersAdmin->nick_skype->CssStyle = "";
			$UsersAdmin->nick_skype->CssClass = "";
			$UsersAdmin->nick_skype->ViewCustomAttributes = "";

			// nguoidung_option
			$UsersAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UsersAdmin->UserLevelID->HrefValue = "";

			// quocgia_id
			$UsersAdmin->quocgia_id->HrefValue = "";

			// gioi_tinh
			$UsersAdmin->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->HrefValue = "";

			// nick_yahoo
			$UsersAdmin->nick_yahoo->HrefValue = "";

			// nick_skype
			$UsersAdmin->nick_skype->HrefValue = "";
		} elseif ($UsersAdmin->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// nguoidung_option
			$UsersAdmin->nguoidung_option->EditCustomAttributes = "";
			if (strval($UsersAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UsersAdmin->nguoidung_option->EditValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersAdmin->nguoidung_option->EditValue = "Thành viên đăng ký";
						break;
					default:
						$UsersAdmin->nguoidung_option->EditValue = $UsersAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersAdmin->nguoidung_option->EditValue = NULL;
			}
			$UsersAdmin->nguoidung_option->CssStyle = "";
			$UsersAdmin->nguoidung_option->CssClass = "";
			$UsersAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->EditCustomAttributes = "";
			$UsersAdmin->tendangnhap->EditValue = $UsersAdmin->tendangnhap->CurrentValue;
			$UsersAdmin->tendangnhap->CssStyle = "";
			$UsersAdmin->tendangnhap->CssClass = "";
			$UsersAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->EditCustomAttributes = "";
			$UsersAdmin->truycap_gannhat->EditValue = $UsersAdmin->truycap_gannhat->CurrentValue;
			$UsersAdmin->truycap_gannhat->EditValue = ew_FormatDateTime($UsersAdmin->truycap_gannhat->EditValue, 7);
			$UsersAdmin->truycap_gannhat->CssStyle = "";
			$UsersAdmin->truycap_gannhat->CssClass = "";
			$UsersAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			$UsersAdmin->UserLevelID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			$sWhereWrk = "`UserLevelID` not IN (-1,0,3,5)";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			//array_unshift($arwrk, array("", "Chọn"));
			$UsersAdmin->UserLevelID->EditValue = $arwrk;

			// quocgia_id
			$UsersAdmin->quocgia_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `country`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("VN", "Mặc định(VIETNAM)"));
			$UsersAdmin->quocgia_id->EditValue = $arwrk;

			// gioi_tinh
			$UsersAdmin->gioi_tinh->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Nam");
			$arwrk[] = array("1", "Nữ");
			//array_unshift($arwrk, array("", "Chọn"));
			$UsersAdmin->gioi_tinh->EditValue = $arwrk;

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->EditCustomAttributes = "";
			$UsersAdmin->hoten_nguoilienhe->EditValue = ew_HtmlEncode($UsersAdmin->hoten_nguoilienhe->CurrentValue);
			
			// nick_yahoo
			$UsersAdmin->nick_yahoo->EditCustomAttributes = "";
			$UsersAdmin->nick_yahoo->EditValue = ew_HtmlEncode($UsersAdmin->nick_yahoo->CurrentValue);

			// nick_skype
			$UsersAdmin->nick_skype->EditCustomAttributes = "";
			$UsersAdmin->nick_skype->EditValue = ew_HtmlEncode($UsersAdmin->nick_skype->CurrentValue);

			// Edit refer script
			// nguoidung_option

			$UsersAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UsersAdmin->UserLevelID->HrefValue = "";

			// quocgia_id
			$UsersAdmin->quocgia_id->HrefValue = "";

			// gioi_tinh
			$UsersAdmin->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->HrefValue = "";

			// nick_yahoo
			$UsersAdmin->nick_yahoo->HrefValue = "";

			// nick_skype
			$UsersAdmin->nick_skype->HrefValue = "";
		}

		// Call Row Rendered event
		$UsersAdmin->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $UsersAdmin;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($UsersAdmin->UserLevelID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Level ID";
		}
		if ($UsersAdmin->gioi_tinh->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Gioi Tinh";
		}
		if ($UsersAdmin->hoten_nguoilienhe->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Ho Nguoilienhe";
		}
*/
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

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $UsersAdmin;
		$sFilter = $UsersAdmin->KeyFilter();
			if ($UsersAdmin->tendangnhap->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(tendangnhap = '" . ew_AdjustSql($UsersAdmin->tendangnhap->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$UsersAdmin->CurrentFilter = $sFilterChk;
			$sSqlChk = $UsersAdmin->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "tendangnhap", "Tên đăng nhập '%v' đã tồn tại '%f'");
				$sIdxErrMsg = str_replace("%v", $UsersAdmin->tendangnhap->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);				
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$UsersAdmin->CurrentFilter = $sFilter;
		$sSql = $UsersAdmin->SQL();
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

			// Field UserLevelID
			$UsersAdmin->UserLevelID->SetDbValueDef($UsersAdmin->UserLevelID->CurrentValue, 4);
			$rsnew['UserLevelID'] =& $UsersAdmin->UserLevelID->DbValue;

			// Field quocgia_id
			$UsersAdmin->quocgia_id->SetDbValueDef($UsersAdmin->quocgia_id->CurrentValue, NULL);
			$rsnew['quocgia_id'] =& $UsersAdmin->quocgia_id->DbValue;

			// Field gioi_tinh
			$UsersAdmin->gioi_tinh->SetDbValueDef($UsersAdmin->gioi_tinh->CurrentValue, 0);
			$rsnew['gioi_tinh'] =& $UsersAdmin->gioi_tinh->DbValue;

			// Field hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->SetDbValueDef($UsersAdmin->hoten_nguoilienhe->CurrentValue, "");
			$rsnew['hoten_nguoilienhe'] =& $UsersAdmin->hoten_nguoilienhe->DbValue;

			// Field nick_yahoo
			$UsersAdmin->nick_yahoo->SetDbValueDef($UsersAdmin->nick_yahoo->CurrentValue, NULL);
			$rsnew['nick_yahoo'] =& $UsersAdmin->nick_yahoo->DbValue;

			// Field nick_skype
			$UsersAdmin->nick_skype->SetDbValueDef($UsersAdmin->nick_skype->CurrentValue, NULL);
			$rsnew['nick_skype'] =& $UsersAdmin->nick_skype->DbValue;

			// Call Row Updating event
			$bUpdateRow = $UsersAdmin->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($UsersAdmin->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($UsersAdmin->CancelMessage <> "") {
					$this->setMessage($UsersAdmin->CancelMessage);
					$UsersAdmin->CancelMessage = "";
				} else {
					$this->setMessage("Chỉnh sửa bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$UsersAdmin->Row_Updated($rsold, $rsnew);
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
	