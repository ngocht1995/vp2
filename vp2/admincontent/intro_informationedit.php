<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_informationinfo.php" ?>
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
$intro_information_edit = new cintro_information_edit();
$Page =& $intro_information_edit;

// Page init processing
$intro_information_edit->Page_Init();

// Page main processing
$intro_information_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var intro_information_edit = new ew_Page("intro_information_edit");

// page properties
intro_information_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = intro_information_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
intro_information_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_logo_congty"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "Kiểu File không hợp lệ. Hãy chọn kiểu File ảnh.");
                elm = fobj.elements["x" + infix + "_anh_logo"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "Kiểu File không hợp lệ. Hãy chọn kiểu File ảnh.");
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
intro_information_edit.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
intro_information_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_information_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_information_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
<!--
_width_multiplier = 16;
_height_multiplier = 60;
var ew_DHTMLEditors = [];

// update value from editor to textarea
function ew_UpdateTextArea() {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
			var inst;
		for (inst in CKEDITOR.instances)
			CKEDITOR.instances[inst].updateElement();
	}
}

// update value from textarea to editor
function ew_UpdateDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.setData(inst.element.value);
	}
}

// focus editor
function ew_FocusDHTMLEditor(name) {
	if (typeof ew_DHTMLEditors != 'undefined' && typeof CKEDITOR != 'undefined') {
		var inst = CKEDITOR.instances[name];
		if (inst)
			inst.focus();
		}
	}


//-->
</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<a href="<?php echo $intro_information->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a>Sửa thông tin giới thiệu doanh nghiệp</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $intro_information_edit->ShowMessage() ?>
<form name="fintro_informationedit" id="fintro_informationedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return intro_information_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="intro_information">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($intro_information->logo_congty->Visible) { // logo_congty ?>
	<tr<?php echo $intro_information->logo_congty->RowAttributes ?>>
		<td class="ewTableHeader">Logo công ty</td>
		<td<?php echo $intro_information->logo_congty->CellAttributes() ?>><span id="el_logo_congty">
<div id="old_x_logo_congty">
<?php if ($intro_information->logo_congty->HrefValue <> "") { ?>
<?php if (!is_null($intro_information->logo_congty->Upload->DbValue)) { ?>
<img src="intro_information_logo_congty_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->logo_congty->ViewAttributes() ?>>
<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($intro_information->logo_congty->Upload->DbValue)) { ?>
<img src="intro_information_logo_congty_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->logo_congty->ViewAttributes() ?>>
<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_logo_congty">
<?php if (!is_null($intro_information->logo_congty->Upload->DbValue)) { ?>
<input type="radio" name="a_logo_congty" id="a_logo_congty" value="1" checked="checked">Bỏ qua&nbsp;
<input type="radio" name="a_logo_congty" id="a_logo_congty" value="2">Xóa&nbsp;
<input type="radio" name="a_logo_congty" id="a_logo_congty" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_logo_congty" id="a_logo_congty" value="3">
<?php } ?>
<input type="file" name="x_logo_congty" id="x_logo_congty" size="30" onchange="if (this.form.a_logo_congty[2]) this.form.a_logo_congty[2].checked=true;"<?php echo $intro_information->logo_congty->EditAttributes() ?>>
</div>
</span><?php echo $intro_information->logo_congty->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($intro_information->anh_logo->Visible) { // anh_logo ?>
	<tr<?php echo $intro_information->anh_logo->RowAttributes ?>>
		<td class="ewTableHeader">Banner shop công ty<span class="ewRequired"></span></td>
		<td<?php echo $intro_information->anh_logo->CellAttributes() ?>><span id="el_anh_logo">
<div id="old_x_anh_logo">
<?php if ($intro_information->anh_logo->HrefValue <> "") { ?>
<?php if (!is_null($intro_information->anh_logo->Upload->DbValue)) { ?>
<?php if ($intro_information->kieu_anh->CurrentValue <>"swf"){
 ?>
<img src="intro_information_anh_logo_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->anh_logo->ViewAttributes() ?>>
<?php }
else {?>
<embed pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="objflash"  width="600" src="flash_1.php?text=<?php echo $intro_information->nguoidung_id->CurrentValue ;?>"></embed>
 <?php } ?>

<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($intro_information->anh_logo->Upload->DbValue)) { ?>
<img src="intro_information_anh_logo_bv.php?nguoidung_id=<?php echo $intro_information->nguoidung_id->CurrentValue ?>" border=0<?php echo $intro_information->anh_logo->ViewAttributes() ?>>
<?php } elseif (!in_array($intro_information->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_anh_logo">
<?php if (!is_null($intro_information->anh_logo->Upload->DbValue)) { ?>
<input type="radio" name="a_anh_logo" id="a_anh_logo" value="1" checked="checked">Bỏ qua&nbsp;
<input type="radio" name="a_anh_logo" id="a_anh_logo" value="2" disabled="disabled">Xóa&nbsp;
<input type="radio" name="a_anh_logo" id="a_anh_logo" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_anh_logo" id="a_anh_logo" value="3">
<?php  } ?>
<input type="file" name="x_anh_logo" id="x_anh_logo" size="30" onchange="if (this.form.a_anh_logo[2]) this.form.a_anh_logo[2].checked=true;"<?php echo $intro_information->anh_logo->EditAttributes() ?>>
</div>
</span><?php echo $intro_information->anh_logo->CustomMsg ?></td>
	</tr>
<?php } ?>
<tr<?php echo $intro_information->kieu_anh->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu Banner<span class="ewRequired"></span></td>
		<td<?php echo $intro_information->kieu_anh->CellAttributes() ?>><span id="el_kieu_anh">
<select id="x_kieu_anh" name="x_kieu_anh"<?php echo $intro_information->kieu_anh->EditAttributes() ?>>
<?php
if (is_array($intro_information->kieu_anh->EditValue)) {
	$arwrk = $intro_information->kieu_anh->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($intro_information->kieu_anh->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $intro_information->kieu_anh->CustomMsg ?></td>
	</tr>
<?php if ($intro_information->gioi_thieu->Visible) { // gioi_thieu ?>
	<tr<?php echo $intro_information->gioi_thieu->RowAttributes ?>>
		<td class="ewTableHeader">Giới thiệu công ty</td>
		<td<?php echo $intro_information->gioi_thieu->CellAttributes() ?>><span id="el_gioi_thieu">
<textarea name="x_gioi_thieu" id="x_gioi_thieu" cols="160" rows="20"<?php echo $intro_information->gioi_thieu->EditAttributes() ?>><?php echo $intro_information->gioi_thieu->EditValue ?></textarea>
</span><?php echo $intro_information->gioi_thieu->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_nguoidung_id" id="x_nguoidung_id" value="<?php echo ew_HtmlEncode($intro_information->nguoidung_id->CurrentValue) ?>">
<p>
<div align = "center"><input type="submit" name="btnAction" id="btnAction" value="   Sửa   "></div>
</form>
<script type="text/javascript">
<!--
ew_CreateEditor();  // Create DHTML editor(s)

//-->
</script>
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
class cintro_information_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'intro_information';

	// Page Object Name
	var $PageObjName = 'intro_information_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_information;
		if ($intro_information->UseTokenInUrl) $PageUrl .= "t=" . $intro_information->TableVar . "&"; // add page token
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
		global $objForm, $intro_information;
		if ($intro_information->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_information->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_information->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_information_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_information"] = new cintro_information();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_information', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_information;
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
			$this->Page_Terminate("intro_informationlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("intro_informationlist.php");
		}

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
		global $objForm, $gsFormError, $intro_information;

		// Load key from QueryString
		if (@$_GET["nguoidung_id"] <> "")
			$intro_information->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$intro_information->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$intro_information->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$intro_information->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($intro_information->nguoidung_id->CurrentValue == "")
			$this->Page_Terminate("intro_informationlist.php"); // Invalid key, return to list
		switch ($intro_information->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("không có dữ liệu"); // No record found
					$this->Page_Terminate("intro_informationlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$intro_information->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Update success
					$sReturnUrl = $intro_information->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "intro_informationview.php")
						$sReturnUrl = $intro_information->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$intro_information->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $intro_information;

		// Get upload data
			if ($intro_information->logo_congty->Upload->UploadFile()) {

				// No action required
			} else {
				echo $intro_information->logo_congty->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
                        if ($intro_information->anh_logo->Upload->UploadFile()) {

				// No action required
			} else {
				echo $intro_information->anh_logo->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $intro_information;
		$intro_information->gioi_thieu->setFormValue($objForm->GetValue("x_gioi_thieu"));
		$intro_information->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
                $intro_information->kieu_anh->setFormValue($objForm->GetValue("x_kieu_anh"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $intro_information;
		$intro_information->nguoidung_id->CurrentValue = $intro_information->nguoidung_id->FormValue;
		$this->LoadRow();
		$intro_information->gioi_thieu->CurrentValue = $intro_information->gioi_thieu->FormValue;
                $intro_information->kieu_anh->CurrentValue = $intro_information->kieu_anh->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_information;
		$sFilter = $intro_information->KeyFilter();

		// Call Row Selecting event
		$intro_information->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_information->CurrentFilter = $sFilter;
		$sSql = $intro_information->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_information->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_information;
		$intro_information->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$intro_information->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$intro_information->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
                $intro_information->anh_logo->Upload->DbValue = $rs->fields('anh_logo');
		$intro_information->kieu_anh->setDbValue($rs->fields('kieu_anh'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_information;

		// Call Row_Rendering event
		$intro_information->Row_Rendering();

		// Common render codes for all row types
		// logo_congty

		$intro_information->logo_congty->CellCssStyle = "";
		$intro_information->logo_congty->CellCssClass = "";
                // anh_logo
		$intro_information->anh_logo->CellCssStyle = "";
		$intro_information->anh_logo->CellCssClass = "";

		// kieu_anh
		$intro_information->kieu_anh->CellCssStyle = "";
		$intro_information->kieu_anh->CellCssClass = "";

		// gioi_thieu
		$intro_information->gioi_thieu->CellCssStyle = "";
		$intro_information->gioi_thieu->CellCssClass = "";
		if ($intro_information->RowType == EW_ROWTYPE_VIEW) { // View row
                        // anh_logo
			if (!is_null($intro_information->anh_logo->Upload->DbValue)) {
				$intro_information->anh_logo->ViewValue = "Anh Logo";
				$intro_information->anh_logo->ImageWidth = 200;
				$intro_information->anh_logo->ImageHeight = 0;
				$intro_information->anh_logo->ImageAlt = "";
			} else {
				$intro_information->anh_logo->ViewValue = "";
			}
			$intro_information->anh_logo->CssStyle = "";
			$intro_information->anh_logo->CssClass = "";
			$intro_information->anh_logo->ViewCustomAttributes = "";

			// kieu_anh
			if (strval($intro_information->kieu_anh->CurrentValue) <> "") {
				switch ($intro_information->kieu_anh->CurrentValue) {
					case "Ảnh":
						$intro_information->kieu_anh->ViewValue = "Ảnh";
						break;
					case "swf":
						$intro_information->kieu_anh->ViewValue = "FLash";
						break;
					default:
						$intro_information->kieu_anh->ViewValue = $intro_information->kieu_anh->CurrentValue;
				}
			} else {
				$intro_information->kieu_anh->ViewValue = NULL;
			}
			$intro_information->kieu_anh->CssStyle = "";
			$intro_information->kieu_anh->CssClass = "";
			$intro_information->kieu_anh->ViewCustomAttributes = "";
			// logo_congty
			if (!is_null($intro_information->logo_congty->Upload->DbValue)) {
				$intro_information->logo_congty->ViewValue = "Logo công ty";
				$intro_information->logo_congty->ImageWidth = 150;
				$intro_information->logo_congty->ImageHeight = 0;
				$intro_information->logo_congty->ImageAlt = "";
			} else {
				$intro_information->logo_congty->ViewValue = "";
			}
			$intro_information->logo_congty->CssStyle = "";
			$intro_information->logo_congty->CssClass = "";
			$intro_information->logo_congty->ViewCustomAttributes = "";

			// gioi_thieu
			$intro_information->gioi_thieu->ViewValue = $intro_information->gioi_thieu->CurrentValue;
			$intro_information->gioi_thieu->CssStyle = "";
			$intro_information->gioi_thieu->CssClass = "";
			$intro_information->gioi_thieu->ViewCustomAttributes = "";
                        // anh_logo
                        $intro_information->anh_logo->HrefValue = "";

			// logo_congty
			$intro_information->logo_congty->HrefValue = "";

			// gioi_thieu
			$intro_information->gioi_thieu->HrefValue = "";
		} elseif ($intro_information->RowType == EW_ROWTYPE_EDIT) { // Edit row
                    // anh_logo
			$intro_information->anh_logo->EditCustomAttributes = "";
			if (!is_null($intro_information->anh_logo->Upload->DbValue)) {
				$intro_information->anh_logo->EditValue = "Anh Logo";
				$intro_information->anh_logo->ImageWidth = 600;
				$intro_information->anh_logo->ImageHeight = 0;
				$intro_information->anh_logo->ImageAlt = "";
			} else {
				$intro_information->anh_logo->EditValue = "";
			}

			// kieu_anh
			$intro_information->kieu_anh->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("Ảnh", "Ảnh");
			$arwrk[] = array("swf", "FLash");
			$intro_information->kieu_anh->EditValue = $arwrk;
			// logo_congty
			$intro_information->logo_congty->EditCustomAttributes = "";
			if (!is_null($intro_information->logo_congty->Upload->DbValue)) {
				$intro_information->logo_congty->EditValue = "Logo công ty";
				$intro_information->logo_congty->ImageWidth = 150;
				$intro_information->logo_congty->ImageHeight = 0;
				$intro_information->logo_congty->ImageAlt = "";
			} else {
				$intro_information->logo_congty->EditValue = "";
			}

			// gioi_thieu
			$intro_information->gioi_thieu->EditCustomAttributes = "";
			$intro_information->gioi_thieu->EditValue = ew_HtmlEncode($intro_information->gioi_thieu->CurrentValue);
                       // anh_logo
			$intro_information->anh_logo->HrefValue = "";
			// Edit refer script
			// logo_congty

			$intro_information->logo_congty->HrefValue = "";

			// gioi_thieu
			$intro_information->gioi_thieu->HrefValue = "";
		}

		// Call Row Rendered event
		$intro_information->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $intro_information;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($intro_information->logo_congty->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Kiểu File không hợp lệ.Hãy chọn kiểu File ảnh.";
		}
                if (!ew_CheckFileType($intro_information->anh_logo->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($intro_information->anh_logo->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($intro_information->anh_logo->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}
		if ($intro_information->logo_congty->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($intro_information->logo_congty->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Dung lượng File lớn nhất là (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");

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
		global $conn, $Security, $intro_information;
		$sFilter = $intro_information->KeyFilter();
		$intro_information->CurrentFilter = $sFilter;
		$sSql = $intro_information->SQL();
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

			// Field logo_congty
			$intro_information->logo_congty->Upload->SaveToSession(); // Save file value to Session
			if ($intro_information->logo_congty->Upload->Action == "2" || $intro_information->logo_congty->Upload->Action == "3") { // Update/Remove
			if (is_null($intro_information->logo_congty->Upload->Value)) {
				$rsnew['logo_congty'] = NULL;
			} else {
				$rsnew['logo_congty'] = $intro_information->logo_congty->Upload->Value;
			}
			}
                        // Field anh_logo
			$intro_information->anh_logo->Upload->SaveToSession(); // Save file value to Session
			if ($intro_information->anh_logo->Upload->Action == "2" || $intro_information->anh_logo->Upload->Action == "3") { // Update/Remove
			if (is_null($intro_information->anh_logo->Upload->Value)) {
				$rsnew['anh_logo'] = NULL;
			} else {
				$rsnew['anh_logo'] = $intro_information->anh_logo->Upload->Value;
			}
                        }
                        // Field kieu_anh
			$intro_information->kieu_anh->SetDbValueDef($intro_information->kieu_anh->CurrentValue, "");
			$rsnew['kieu_anh'] =& $intro_information->kieu_anh->DbValue;
			// Field gioi_thieu
			$intro_information->gioi_thieu->SetDbValueDef($intro_information->gioi_thieu->CurrentValue, NULL);
			$rsnew['gioi_thieu'] =& $intro_information->gioi_thieu->DbValue;

			// Call Row Updating event
			$bUpdateRow = $intro_information->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field logo_congty
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($intro_information->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($intro_information->CancelMessage <> "") {
					$this->setMessage($intro_information->CancelMessage);
					$intro_information->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$intro_information->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field logo_congty
		$intro_information->logo_congty->Upload->RemoveFromSession(); // Remove file value from Session
                $intro_information->anh_logo->Upload->RemoveFromSession(); // Remove file value from Session
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
