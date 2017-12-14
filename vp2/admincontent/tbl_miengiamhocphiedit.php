<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_miengiamhocphiinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php include "securimage.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$tbl_miengiamhocphi_edit = new ctbl_miengiamhocphi_edit();
$Page =& $tbl_miengiamhocphi_edit;

// Page init processing
$tbl_miengiamhocphi_edit->Page_Init();

// Page main processing
$tbl_miengiamhocphi_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_miengiamhocphi_edit = new ew_Page("tbl_miengiamhocphi_edit");

// page properties
tbl_miengiamhocphi_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = tbl_miengiamhocphi_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_miengiamhocphi_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_msv"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Msv");
		elm = fobj.elements["x" + infix + "_ngay_thang_nam"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Ng�y th�ng");
		elm = fobj.elements["x" + infix + "_noi_sinh"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Noi Sinh");
		elm = fobj.elements["x" + infix + "_hoten_chame"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Hoten Chame");
		elm = fobj.elements["x" + infix + "_hokhau"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Hokhau");
		elm = fobj.elements["x" + infix + "_nganhhoc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Nganhhoc");
		elm = fobj.elements["x" + infix + "_doituong"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Doituong");
		elm = fobj.elements["x" + infix + "_datetime"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Datetime");
		elm = fobj.elements["x" + infix + "_datetime"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Datetime");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
tbl_miengiamhocphi_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_miengiamhocphi_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_miengiamhocphi_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_miengiamhocphi_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
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
<p>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Đơn xin miễm giảm học phí</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> 
<a href="<?php echo $tbl_miengiamhocphi->getReturnUrl() ?>"><b size="2" color="navy"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?>Trở về </b></a></span></p>
<?php $tbl_miengiamhocphi_edit->ShowMessage() ?>
<form name="ftbl_miengiamhocphiedit" id="ftbl_miengiamhocphiedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return tbl_miengiamhocphi_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_miengiamhocphi">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($tbl_miengiamhocphi->msv->Visible) { // msv ?>
	<tr<?php echo $tbl_miengiamhocphi->msv->RowAttributes ?>>
		<td class="ewTableHeader">Mã sinh viên<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->msv->CellAttributes() ?>><span id="el_msv">
                        <input disabled="true" type="text" name="x_msv" id="x_msv" size="30" maxlength="15" value="<?php echo $tbl_miengiamhocphi->msv->EditValue ?>"<?php echo $tbl_miengiamhocphi->msv->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->msv->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->hoten_sinhvien->Visible) { // hoten_sinhvien ?>
	<tr<?php echo $tbl_miengiamhocphi->hoten_sinhvien->RowAttributes ?>>
		<td class="ewTableHeader">Họ tên sinh viên</td>
		<td<?php echo $tbl_miengiamhocphi->hoten_sinhvien->CellAttributes() ?>><span id="el_hoten_sinhvien">
<input disabled="true" type="text" name="x_hoten_sinhvien" id="x_hoten_sinhvien" size="30" maxlength="50" value="<?php echo $tbl_miengiamhocphi->hoten_sinhvien->EditValue ?>"<?php echo $tbl_miengiamhocphi->hoten_sinhvien->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->hoten_sinhvien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->ngay_thang_nam->Visible) { // ngay_thang_nam ?>
	<tr<?php echo $tbl_miengiamhocphi->ngay_thang_nam->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tháng năm sinh<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->ngay_thang_nam->CellAttributes() ?>><span id="el_ngay_thang_nam">
<input disabled="true" type="text" name="x_ngay_thang_nam" id="x_ngay_thang_nam" size="30" maxlength="20" value="<?php echo $tbl_miengiamhocphi->ngay_thang_nam->EditValue ?>"<?php echo $tbl_miengiamhocphi->ngay_thang_nam->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->ngay_thang_nam->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->noi_sinh->Visible) { // noi_sinh ?>
	<tr<?php echo $tbl_miengiamhocphi->noi_sinh->RowAttributes ?>>
		<td class="ewTableHeader">Noi Sinh<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->noi_sinh->CellAttributes() ?>><span id="el_noi_sinh">
<input type="text" name="x_noi_sinh" id="x_noi_sinh" size="30" maxlength="200" value="<?php echo $tbl_miengiamhocphi->noi_sinh->EditValue ?>"<?php echo $tbl_miengiamhocphi->noi_sinh->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->noi_sinh->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->hoten_chame->Visible) { // hoten_chame ?>
	<tr<?php echo $tbl_miengiamhocphi->hoten_chame->RowAttributes ?>>
		<td class="ewTableHeader">Họ tên cha mẹ<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->hoten_chame->CellAttributes() ?>><span id="el_hoten_chame">
<input type="text" name="x_hoten_chame" id="x_hoten_chame" size="75" maxlength="200" value="<?php echo $tbl_miengiamhocphi->hoten_chame->EditValue ?>"<?php echo $tbl_miengiamhocphi->hoten_chame->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->hoten_chame->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->hokhau->Visible) { // hokhau ?>
	<tr<?php echo $tbl_miengiamhocphi->hokhau->RowAttributes ?>>
		<td class="ewTableHeader">Hộ khẩu thường chú<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->hokhau->CellAttributes() ?>><span id="el_hokhau">
<textarea name="x_hokhau" id="x_hokhau" cols="75" rows="2"<?php echo $tbl_miengiamhocphi->hokhau->EditAttributes() ?>><?php echo $tbl_miengiamhocphi->hokhau->EditValue ?></textarea>
</span><?php echo $tbl_miengiamhocphi->hokhau->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->nganhhoc->Visible) { // nganhhoc ?>
	<tr<?php echo $tbl_miengiamhocphi->nganhhoc->RowAttributes ?>>
		<td class="ewTableHeader">Ngành học<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->nganhhoc->CellAttributes() ?>><span id="el_nganhhoc">
<input type="text" name="x_nganhhoc" id="x_nganhhoc" size="30" maxlength="100" value="<?php echo $tbl_miengiamhocphi->nganhhoc->EditValue ?>"<?php echo $tbl_miengiamhocphi->nganhhoc->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->nganhhoc->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->doituong->Visible) { // doituong ?>
	<tr<?php echo $tbl_miengiamhocphi->doituong->RowAttributes ?>>
		<td class="ewTableHeader">Đối tượng<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->doituong->CellAttributes() ?>><span id="el_doituong">
<input type="text" name="x_doituong" id="x_doituong" size="75"  value="<?php echo $tbl_miengiamhocphi->doituong->EditValue ?>"<?php echo $tbl_miengiamhocphi->doituong->EditAttributes() ?>>
</span><?php echo $tbl_miengiamhocphi->doituong->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_miengiamhocphi->datetime->Visible) { // datetime ?>
	<tr<?php echo $tbl_miengiamhocphi->datetime->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tạo<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_miengiamhocphi->datetime->CellAttributes() ?>><span id="el_datetime">
<input disabled="true" type="text" name="x_datetime" id="x_datetime" value="<?php echo $tbl_miengiamhocphi->datetime->EditValue ?>"<?php echo $tbl_miengiamhocphi->datetime->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_datetime" name="cal_x_datetime" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_datetime", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_datetime" // ID of the button
});
</script>
</span><?php echo $tbl_miengiamhocphi->datetime->CustomMsg ?></td>
	</tr>
<?php } ?>
       <tr>
<td class="ewTableHeader">Mã xác nhận</td>
	<td>
		<img src="securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle">
		<a href="securimage_play.php" style="font-size: 13px"><img src="images/audio_icon.gif" id="audio" align="absmiddle" border="0"></a><br>
		<a href="#" onclick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">Tải lại ảnh</a><br>
		<input type="text" name="x_maxacnhan" id="x_maxacnhan" size="30" maxlength="4">
	</td>
        </tr>

</table>
</div>
</td></tr></table>
<input type="hidden" name="x_don_tchthp_id" id="x_don_tchthp_id" value="<?php echo ew_HtmlEncode($tbl_miengiamhocphi->don_tchthp_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="   Edit   ">
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
class ctbl_miengiamhocphi_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'tbl_miengiamhocphi';

	// Page Object Name
	var $PageObjName = 'tbl_miengiamhocphi_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) $PageUrl .= "t=" . $tbl_miengiamhocphi->TableVar . "&"; // add page token
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
		global $objForm, $tbl_miengiamhocphi;
		if ($tbl_miengiamhocphi->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_miengiamhocphi->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_miengiamhocphi->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_miengiamhocphi_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_miengiamhocphi"] = new ctbl_miengiamhocphi();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_miengiamhocphi', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_miengiamhocphi;
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
			$this->Page_Terminate("tbl_miengiamhocphilist.php");
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
		global $objForm, $gsFormError, $tbl_miengiamhocphi;

		// Load key from QueryString
		if (@$_GET["don_tchthp_id"] <> "")
			$tbl_miengiamhocphi->don_tchthp_id->setQueryStringValue($_GET["don_tchthp_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$tbl_miengiamhocphi->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$tbl_miengiamhocphi->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$tbl_miengiamhocphi->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_miengiamhocphi->don_tchthp_id->CurrentValue == "")
			$this->Page_Terminate("tbl_miengiamhocphilist.php"); // Invalid key, return to list
		switch ($tbl_miengiamhocphi->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("No records found"); // No record found
					$this->Page_Terminate("tbl_miengiamhocphilist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_miengiamhocphi->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Update succeeded"); // Update success
					$sReturnUrl = $tbl_miengiamhocphi->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "tbl_miengiamhocphiview.php")
						$sReturnUrl = $tbl_miengiamhocphi->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_miengiamhocphi->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_miengiamhocphi;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->msv->setFormValue($objForm->GetValue("x_msv"));
		$tbl_miengiamhocphi->hoten_sinhvien->setFormValue($objForm->GetValue("x_hoten_sinhvien"));
		$tbl_miengiamhocphi->ngay_thang_nam->setFormValue($objForm->GetValue("x_ngay_thang_nam"));
		$tbl_miengiamhocphi->noi_sinh->setFormValue($objForm->GetValue("x_noi_sinh"));
		$tbl_miengiamhocphi->hoten_chame->setFormValue($objForm->GetValue("x_hoten_chame"));
		$tbl_miengiamhocphi->hokhau->setFormValue($objForm->GetValue("x_hokhau"));
		$tbl_miengiamhocphi->nganhhoc->setFormValue($objForm->GetValue("x_nganhhoc"));
		$tbl_miengiamhocphi->doituong->setFormValue($objForm->GetValue("x_doituong"));
		$tbl_miengiamhocphi->datetime->setFormValue($objForm->GetValue("x_datetime"));
		$tbl_miengiamhocphi->datetime->CurrentValue = ew_UnFormatDateTime($tbl_miengiamhocphi->datetime->CurrentValue, 7);
		$tbl_miengiamhocphi->status->setFormValue($objForm->GetValue("x_status"));
		$tbl_miengiamhocphi->active->setFormValue($objForm->GetValue("x_active"));
		$tbl_miengiamhocphi->dateedit_edit->setFormValue($objForm->GetValue("x_dateedit_edit"));
		$tbl_miengiamhocphi->dateedit_edit->CurrentValue = ew_UnFormatDateTime($tbl_miengiamhocphi->dateedit_edit->CurrentValue, 7);
		$tbl_miengiamhocphi->don_tchthp_id->setFormValue($objForm->GetValue("x_don_tchthp_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->don_tchthp_id->CurrentValue = $tbl_miengiamhocphi->don_tchthp_id->FormValue;
		$this->LoadRow();
		$tbl_miengiamhocphi->msv->CurrentValue = $tbl_miengiamhocphi->msv->FormValue;
		$tbl_miengiamhocphi->hoten_sinhvien->CurrentValue = $tbl_miengiamhocphi->hoten_sinhvien->FormValue;
		$tbl_miengiamhocphi->ngay_thang_nam->CurrentValue = $tbl_miengiamhocphi->ngay_thang_nam->FormValue;
		$tbl_miengiamhocphi->noi_sinh->CurrentValue = $tbl_miengiamhocphi->noi_sinh->FormValue;
		$tbl_miengiamhocphi->hoten_chame->CurrentValue = $tbl_miengiamhocphi->hoten_chame->FormValue;
		$tbl_miengiamhocphi->hokhau->CurrentValue = $tbl_miengiamhocphi->hokhau->FormValue;
		$tbl_miengiamhocphi->nganhhoc->CurrentValue = $tbl_miengiamhocphi->nganhhoc->FormValue;
		$tbl_miengiamhocphi->doituong->CurrentValue = $tbl_miengiamhocphi->doituong->FormValue;
		$tbl_miengiamhocphi->datetime->CurrentValue = $tbl_miengiamhocphi->datetime->FormValue;
		$tbl_miengiamhocphi->datetime->CurrentValue = ew_UnFormatDateTime($tbl_miengiamhocphi->datetime->CurrentValue, 7);
		$tbl_miengiamhocphi->status->CurrentValue = $tbl_miengiamhocphi->status->FormValue;
		$tbl_miengiamhocphi->active->CurrentValue = $tbl_miengiamhocphi->active->FormValue;
		$tbl_miengiamhocphi->dateedit_edit->CurrentValue = $tbl_miengiamhocphi->dateedit_edit->FormValue;
		$tbl_miengiamhocphi->dateedit_edit->CurrentValue = ew_UnFormatDateTime($tbl_miengiamhocphi->dateedit_edit->CurrentValue, 7);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_miengiamhocphi;
		$sFilter = $tbl_miengiamhocphi->KeyFilter();

		// Call Row Selecting event
		$tbl_miengiamhocphi->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_miengiamhocphi->CurrentFilter = $sFilter;
		$sSql = $tbl_miengiamhocphi->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_miengiamhocphi->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_miengiamhocphi;
		$tbl_miengiamhocphi->don_tchthp_id->setDbValue($rs->fields('don_tchthp_id'));
		$tbl_miengiamhocphi->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$tbl_miengiamhocphi->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$tbl_miengiamhocphi->msv->setDbValue($rs->fields('msv'));
		$tbl_miengiamhocphi->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$tbl_miengiamhocphi->ngay_thang_nam->setDbValue($rs->fields('ngay_thang_nam'));
		$tbl_miengiamhocphi->noi_sinh->setDbValue($rs->fields('noi_sinh'));
		$tbl_miengiamhocphi->hoten_chame->setDbValue($rs->fields('hoten_chame'));
		$tbl_miengiamhocphi->hokhau->setDbValue($rs->fields('hokhau'));
		$tbl_miengiamhocphi->nganhhoc->setDbValue($rs->fields('nganhhoc'));
		$tbl_miengiamhocphi->doituong->setDbValue($rs->fields('doituong'));
		$tbl_miengiamhocphi->datetime->setDbValue($rs->fields('datetime'));
		$tbl_miengiamhocphi->status->setDbValue($rs->fields('status'));
		$tbl_miengiamhocphi->active->setDbValue($rs->fields('active'));
		$tbl_miengiamhocphi->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$tbl_miengiamhocphi->datetime_add->setDbValue($rs->fields('datetime_add'));
		$tbl_miengiamhocphi->dateedit_edit->setDbValue($rs->fields('dateedit_edit'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_miengiamhocphi;

		// Call Row_Rendering event
		$tbl_miengiamhocphi->Row_Rendering();

		// Common render codes for all row types
		// msv

		$tbl_miengiamhocphi->msv->CellCssStyle = "";
		$tbl_miengiamhocphi->msv->CellCssClass = "";

		// hoten_sinhvien
		$tbl_miengiamhocphi->hoten_sinhvien->CellCssStyle = "";
		$tbl_miengiamhocphi->hoten_sinhvien->CellCssClass = "";

		// ngay_thang_nam
		$tbl_miengiamhocphi->ngay_thang_nam->CellCssStyle = "";
		$tbl_miengiamhocphi->ngay_thang_nam->CellCssClass = "";

		// noi_sinh
		$tbl_miengiamhocphi->noi_sinh->CellCssStyle = "";
		$tbl_miengiamhocphi->noi_sinh->CellCssClass = "";

		// hoten_chame
		$tbl_miengiamhocphi->hoten_chame->CellCssStyle = "";
		$tbl_miengiamhocphi->hoten_chame->CellCssClass = "";

		// hokhau
		$tbl_miengiamhocphi->hokhau->CellCssStyle = "";
		$tbl_miengiamhocphi->hokhau->CellCssClass = "";

		// nganhhoc
		$tbl_miengiamhocphi->nganhhoc->CellCssStyle = "";
		$tbl_miengiamhocphi->nganhhoc->CellCssClass = "";

		// doituong
		$tbl_miengiamhocphi->doituong->CellCssStyle = "";
		$tbl_miengiamhocphi->doituong->CellCssClass = "";

		// datetime
		$tbl_miengiamhocphi->datetime->CellCssStyle = "";
		$tbl_miengiamhocphi->datetime->CellCssClass = "";

		// status
		$tbl_miengiamhocphi->status->CellCssStyle = "";
		$tbl_miengiamhocphi->status->CellCssClass = "";

		// active
		$tbl_miengiamhocphi->active->CellCssStyle = "";
		$tbl_miengiamhocphi->active->CellCssClass = "";

		// dateedit_edit
		$tbl_miengiamhocphi->dateedit_edit->CellCssStyle = "";
		$tbl_miengiamhocphi->dateedit_edit->CellCssClass = "";
		if ($tbl_miengiamhocphi->RowType == EW_ROWTYPE_VIEW) { // View row

			// don_tchthp_id
			$tbl_miengiamhocphi->don_tchthp_id->ViewValue = $tbl_miengiamhocphi->don_tchthp_id->CurrentValue;
			$tbl_miengiamhocphi->don_tchthp_id->CssStyle = "";
			$tbl_miengiamhocphi->don_tchthp_id->CssClass = "";
			$tbl_miengiamhocphi->don_tchthp_id->ViewCustomAttributes = "";

			// loaidon_id
			if (strval($tbl_miengiamhocphi->loaidon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->loaidon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "khong xu ly";
						break;
					case "1":
						$tbl_miengiamhocphi->loaidon_id->ViewValue = "Xu ly";
						break;
					default:
						$tbl_miengiamhocphi->loaidon_id->ViewValue = $tbl_miengiamhocphi->loaidon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->loaidon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->loaidon_id->CssStyle = "";
			$tbl_miengiamhocphi->loaidon_id->CssClass = "";
			$tbl_miengiamhocphi->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			if (strval($tbl_miengiamhocphi->nhomdon_id->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->nhomdon_id->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp1";
						break;
					case "1":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp2";
						break;
					case "2":
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = "vp3";
						break;
					default:
						$tbl_miengiamhocphi->nhomdon_id->ViewValue = $tbl_miengiamhocphi->nhomdon_id->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->nhomdon_id->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->nhomdon_id->CssStyle = "";
			$tbl_miengiamhocphi->nhomdon_id->CssClass = "";
			$tbl_miengiamhocphi->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_miengiamhocphi->msv->ViewValue = $tbl_miengiamhocphi->msv->CurrentValue;
			$tbl_miengiamhocphi->msv->CssStyle = "";
			$tbl_miengiamhocphi->msv->CssClass = "";
			$tbl_miengiamhocphi->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->ViewValue = $tbl_miengiamhocphi->hoten_sinhvien->CurrentValue;
			$tbl_miengiamhocphi->hoten_sinhvien->CssStyle = "";
			$tbl_miengiamhocphi->hoten_sinhvien->CssClass = "";
			$tbl_miengiamhocphi->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->ViewValue = $tbl_miengiamhocphi->ngay_thang_nam->CurrentValue;
			$tbl_miengiamhocphi->ngay_thang_nam->CssStyle = "";
			$tbl_miengiamhocphi->ngay_thang_nam->CssClass = "";
			$tbl_miengiamhocphi->ngay_thang_nam->ViewCustomAttributes = "";

			// noi_sinh
			$tbl_miengiamhocphi->noi_sinh->ViewValue = $tbl_miengiamhocphi->noi_sinh->CurrentValue;
			$tbl_miengiamhocphi->noi_sinh->CssStyle = "";
			$tbl_miengiamhocphi->noi_sinh->CssClass = "";
			$tbl_miengiamhocphi->noi_sinh->ViewCustomAttributes = "";

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->ViewValue = $tbl_miengiamhocphi->hoten_chame->CurrentValue;
			$tbl_miengiamhocphi->hoten_chame->CssStyle = "";
			$tbl_miengiamhocphi->hoten_chame->CssClass = "";
			$tbl_miengiamhocphi->hoten_chame->ViewCustomAttributes = "";

			// hokhau
			$tbl_miengiamhocphi->hokhau->ViewValue = $tbl_miengiamhocphi->hokhau->CurrentValue;
			$tbl_miengiamhocphi->hokhau->CssStyle = "";
			$tbl_miengiamhocphi->hokhau->CssClass = "";
			$tbl_miengiamhocphi->hokhau->ViewCustomAttributes = "";

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->ViewValue = $tbl_miengiamhocphi->nganhhoc->CurrentValue;
			$tbl_miengiamhocphi->nganhhoc->CssStyle = "";
			$tbl_miengiamhocphi->nganhhoc->CssClass = "";
			$tbl_miengiamhocphi->nganhhoc->ViewCustomAttributes = "";

			// doituong
			$tbl_miengiamhocphi->doituong->ViewValue = $tbl_miengiamhocphi->doituong->CurrentValue;
			$tbl_miengiamhocphi->doituong->CssStyle = "";
			$tbl_miengiamhocphi->doituong->CssClass = "";
			$tbl_miengiamhocphi->doituong->ViewCustomAttributes = "";

			// datetime
			$tbl_miengiamhocphi->datetime->ViewValue = $tbl_miengiamhocphi->datetime->CurrentValue;
			$tbl_miengiamhocphi->datetime->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime->ViewValue, 7);
			$tbl_miengiamhocphi->datetime->CssStyle = "";
			$tbl_miengiamhocphi->datetime->CssClass = "";
			$tbl_miengiamhocphi->datetime->ViewCustomAttributes = "";

			// status
			if (strval($tbl_miengiamhocphi->status->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->status->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->status->ViewValue = "Khong xet duyet";
						break;
					case "1":
						$tbl_miengiamhocphi->status->ViewValue = "Cho xet duyet";
						break;
					case "2":
						$tbl_miengiamhocphi->status->ViewValue = "dang xu ly";
						break;
					case "3 ":
						$tbl_miengiamhocphi->status->ViewValue = "Ket thuc";
						break;
					default:
						$tbl_miengiamhocphi->status->ViewValue = $tbl_miengiamhocphi->status->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->status->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->status->CssStyle = "";
			$tbl_miengiamhocphi->status->CssClass = "";
			$tbl_miengiamhocphi->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_miengiamhocphi->active->CurrentValue) <> "") {
				switch ($tbl_miengiamhocphi->active->CurrentValue) {
					case "0":
						$tbl_miengiamhocphi->active->ViewValue = "Chua xac nhan";
						break;
					case "1":
						$tbl_miengiamhocphi->active->ViewValue = "Xac nhan";
						break;
					case "":
						$tbl_miengiamhocphi->active->ViewValue = "";
						break;
					default:
						$tbl_miengiamhocphi->active->ViewValue = $tbl_miengiamhocphi->active->CurrentValue;
				}
			} else {
				$tbl_miengiamhocphi->active->ViewValue = NULL;
			}
			$tbl_miengiamhocphi->active->CssStyle = "";
			$tbl_miengiamhocphi->active->CssClass = "";
			$tbl_miengiamhocphi->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_miengiamhocphi->nguoidung_id->ViewValue = $tbl_miengiamhocphi->nguoidung_id->CurrentValue;
			$tbl_miengiamhocphi->nguoidung_id->CssStyle = "";
			$tbl_miengiamhocphi->nguoidung_id->CssClass = "";
			$tbl_miengiamhocphi->nguoidung_id->ViewCustomAttributes = "";

			// datetime_add
			$tbl_miengiamhocphi->datetime_add->ViewValue = $tbl_miengiamhocphi->datetime_add->CurrentValue;
			$tbl_miengiamhocphi->datetime_add->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->datetime_add->ViewValue, 7);
			$tbl_miengiamhocphi->datetime_add->CssStyle = "";
			$tbl_miengiamhocphi->datetime_add->CssClass = "";
			$tbl_miengiamhocphi->datetime_add->ViewCustomAttributes = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = $tbl_miengiamhocphi->dateedit_edit->CurrentValue;
			$tbl_miengiamhocphi->dateedit_edit->ViewValue = ew_FormatDateTime($tbl_miengiamhocphi->dateedit_edit->ViewValue, 7);
			$tbl_miengiamhocphi->dateedit_edit->CssStyle = "";
			$tbl_miengiamhocphi->dateedit_edit->CssClass = "";
			$tbl_miengiamhocphi->dateedit_edit->ViewCustomAttributes = "";

			// msv
			$tbl_miengiamhocphi->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->HrefValue = "";

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->HrefValue = "";

			// noi_sinh
			$tbl_miengiamhocphi->noi_sinh->HrefValue = "";

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->HrefValue = "";

			// hokhau
			$tbl_miengiamhocphi->hokhau->HrefValue = "";

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->HrefValue = "";

			// doituong
			$tbl_miengiamhocphi->doituong->HrefValue = "";

			// datetime
			$tbl_miengiamhocphi->datetime->HrefValue = "";

			// status
			$tbl_miengiamhocphi->status->HrefValue = "";

			// active
			$tbl_miengiamhocphi->active->HrefValue = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->HrefValue = "";
		} elseif ($tbl_miengiamhocphi->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// msv
			$tbl_miengiamhocphi->msv->EditCustomAttributes = "";
			$tbl_miengiamhocphi->msv->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->msv->CurrentValue);

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->EditCustomAttributes = "";
			$tbl_miengiamhocphi->hoten_sinhvien->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->hoten_sinhvien->CurrentValue);

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->EditCustomAttributes = "";
			$tbl_miengiamhocphi->ngay_thang_nam->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->ngay_thang_nam->CurrentValue);

			// noi_sinh
			$tbl_miengiamhocphi->noi_sinh->EditCustomAttributes = "";
			$tbl_miengiamhocphi->noi_sinh->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->noi_sinh->CurrentValue);

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->EditCustomAttributes = "";
			$tbl_miengiamhocphi->hoten_chame->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->hoten_chame->CurrentValue);

			// hokhau
			$tbl_miengiamhocphi->hokhau->EditCustomAttributes = "";
			$tbl_miengiamhocphi->hokhau->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->hokhau->CurrentValue);

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->EditCustomAttributes = "";
			$tbl_miengiamhocphi->nganhhoc->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->nganhhoc->CurrentValue);

			// doituong
			$tbl_miengiamhocphi->doituong->EditCustomAttributes = "";
			$tbl_miengiamhocphi->doituong->EditValue = ew_HtmlEncode($tbl_miengiamhocphi->doituong->CurrentValue);

			// datetime
			$tbl_miengiamhocphi->datetime->EditCustomAttributes = "";
			$tbl_miengiamhocphi->datetime->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_miengiamhocphi->datetime->CurrentValue, 7));

			// status
			$tbl_miengiamhocphi->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Khong xet duyet");
			$arwrk[] = array("1", "Cho xet duyet");
			$arwrk[] = array("2", "dang xu ly");
			$arwrk[] = array("3 ", "Ket thuc");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_miengiamhocphi->status->EditValue = $arwrk;

			// active
			$tbl_miengiamhocphi->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chua xac nhan");
			$arwrk[] = array("1", "Xac nhan");
			$arwrk[] = array("", "");
			array_unshift($arwrk, array("", "Please Select"));
			$tbl_miengiamhocphi->active->EditValue = $arwrk;

			// dateedit_edit
			// Edit refer script
			// msv

			$tbl_miengiamhocphi->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_miengiamhocphi->hoten_sinhvien->HrefValue = "";

			// ngay_thang_nam
			$tbl_miengiamhocphi->ngay_thang_nam->HrefValue = "";

			// noi_sinh
			$tbl_miengiamhocphi->noi_sinh->HrefValue = "";

			// hoten_chame
			$tbl_miengiamhocphi->hoten_chame->HrefValue = "";

			// hokhau
			$tbl_miengiamhocphi->hokhau->HrefValue = "";

			// nganhhoc
			$tbl_miengiamhocphi->nganhhoc->HrefValue = "";

			// doituong
			$tbl_miengiamhocphi->doituong->HrefValue = "";

			// datetime
			$tbl_miengiamhocphi->datetime->HrefValue = "";

			// status
			$tbl_miengiamhocphi->status->HrefValue = "";

			// active
			$tbl_miengiamhocphi->active->HrefValue = "";

			// dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_miengiamhocphi->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $tbl_miengiamhocphi;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		
		if ($tbl_miengiamhocphi->hoten_chame->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Hoten Chame";
		}
		if ($tbl_miengiamhocphi->hokhau->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Hokhau";
		}
		
		if ($tbl_miengiamhocphi->doituong->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Doituong";
		}
	
                $img = new Securimage();
  			$valid = $img->check($_POST['x_maxacnhan']);
  			if($valid == true) {

 			} else {
    			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Mã xác nhận không đúng";
 			}
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
		global $conn, $Security, $tbl_miengiamhocphi;
		$sFilter = $tbl_miengiamhocphi->KeyFilter();
		$tbl_miengiamhocphi->CurrentFilter = $sFilter;
		$sSql = $tbl_miengiamhocphi->SQL();
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
                        
                        // Field noi_sinh
			$tbl_miengiamhocphi->noi_sinh->SetDbValueDef($tbl_miengiamhocphi->noi_sinh->CurrentValue, NULL);
			$rsnew['noi_sinh'] =& $tbl_miengiamhocphi->noi_sinh->DbValue;
	
			// Field hoten_chame
			$tbl_miengiamhocphi->hoten_chame->SetDbValueDef($tbl_miengiamhocphi->hoten_chame->CurrentValue, NULL);
			$rsnew['hoten_chame'] =& $tbl_miengiamhocphi->hoten_chame->DbValue;

			// Field hokhau
			$tbl_miengiamhocphi->hokhau->SetDbValueDef($tbl_miengiamhocphi->hokhau->CurrentValue, NULL);
			$rsnew['hokhau'] =& $tbl_miengiamhocphi->hokhau->DbValue;


			// Field doituong
			$tbl_miengiamhocphi->doituong->SetDbValueDef($tbl_miengiamhocphi->doituong->CurrentValue, NULL);
			$rsnew['doituong'] =& $tbl_miengiamhocphi->doituong->DbValue;


			// Field dateedit_edit
			$tbl_miengiamhocphi->dateedit_edit->SetDbValueDef(ew_CurrentDateTime(), NULL);
			$rsnew['dateedit_edit'] =& $tbl_miengiamhocphi->dateedit_edit->DbValue;

			// Call Row Updating event
			$bUpdateRow = $tbl_miengiamhocphi->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($tbl_miengiamhocphi->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_miengiamhocphi->CancelMessage <> "") {
					$this->setMessage($tbl_miengiamhocphi->CancelMessage);
					$tbl_miengiamhocphi->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_miengiamhocphi->Row_Updated($rsold, $rsnew);
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
