<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "footerinfo.php" ?>
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
$footer_edit = new cfooter_edit();
$Page =& $footer_edit;

// Page init processing
$footer_edit->Page_Init();

// Page main processing
$footer_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var footer_edit = new ew_Page("footer_edit");

// page properties
footer_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = footer_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
footer_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_noi_dung"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Nội dung chân trang");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
footer_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
footer_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
footer_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
footer_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="UserAdminview.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa hiển thị chân trang</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $footer_edit->ShowMessage() ?>
<form name="ffooteredit" id="ffooteredit" action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="a_table" id="a_table" value="footer">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($footer->noi_dung->Visible) { // noi_dung ?>
	<tr<?php echo $footer->noi_dung->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung chân trang<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $footer->noi_dung->CellAttributes() ?>><span id="el_noi_dung">
<textarea name="x_noi_dung" id="x_noi_dung" cols="35" rows="4"<?php echo $footer->noi_dung->EditAttributes() ?>><?php echo $footer->noi_dung->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_noi_dung", function() {
	var oCKeditor = CKEDITOR.replace('x_noi_dung', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $footer->noi_dung->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_footer_id" id="x_footer_id" value="<?php echo ew_HtmlEncode($footer->footer_id->CurrentValue) ?>">
<p><center>
<input type="button" name="btnAction" id="btnAction" value="   Sửa   " onclick="ew_SubmitForm(footer_edit, this.form);">
</center>
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
class cfooter_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'footer';

	// Page Object Name
	var $PageObjName = 'footer_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $footer;
		if ($footer->UseTokenInUrl) $PageUrl .= "t=" . $footer->TableVar . "&"; // add page token
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
		global $objForm, $footer;
		if ($footer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($footer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($footer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cfooter_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["footer"] = new cfooter();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'footer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $footer;
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
			$this->Page_Terminate("footerview.php");
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
		global $objForm, $gsFormError, $footer;

		// Load key from QueryString
		if (@$_GET["footer_id"] <> "")
			$footer->footer_id->setQueryStringValue($_GET["footer_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$footer->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$footer->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$footer->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($footer->footer_id->CurrentValue == "")
			$this->Page_Terminate("UserAdminview.php"); // Invalid key, return to list
		switch ($footer->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("UserAdminview.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$footer->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Update success
					$sReturnUrl = $footer->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "footerview.php")
						$sReturnUrl = $footer->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$footer->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $footer;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $footer;
		$footer->noi_dung->setFormValue($objForm->GetValue("x_noi_dung"));
		$footer->footer_id->setFormValue($objForm->GetValue("x_footer_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $footer;
		$footer->footer_id->CurrentValue = $footer->footer_id->FormValue;
		$this->LoadRow();
		$footer->noi_dung->CurrentValue = $footer->noi_dung->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $footer;
		$sFilter = $footer->KeyFilter();

		// Call Row Selecting event
		$footer->Row_Selecting($sFilter);

		// Load sql based on filter
		$footer->CurrentFilter = $sFilter;
		$sSql = $footer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$footer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $footer;
		$footer->footer_id->setDbValue($rs->fields('footer_id'));
		$footer->noi_dung->setDbValue($rs->fields('noi_dung'));
		$footer->f_value->setDbValue($rs->fields('f_value'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $footer;

		// Call Row_Rendering event
		$footer->Row_Rendering();

		// Common render codes for all row types
		// noi_dung

		$footer->noi_dung->CellCssStyle = "";
		$footer->noi_dung->CellCssClass = "";
		if ($footer->RowType == EW_ROWTYPE_VIEW) { // View row

			// noi_dung
			$footer->noi_dung->ViewValue = $footer->noi_dung->CurrentValue;
			$footer->noi_dung->CssStyle = "";
			$footer->noi_dung->CssClass = "";
			$footer->noi_dung->ViewCustomAttributes = "";

			// noi_dung
			$footer->noi_dung->HrefValue = "";
		} elseif ($footer->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// noi_dung
			$footer->noi_dung->EditCustomAttributes = "";
			$footer->noi_dung->EditValue = ew_HtmlEncode($footer->noi_dung->CurrentValue);

			// Edit refer script
			// noi_dung

			$footer->noi_dung->HrefValue = "";
		}

		// Call Row Rendered event
		$footer->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $footer;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($footer->noi_dung->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nội dung chân trang";
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

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $footer;
		$sFilter = $footer->KeyFilter();
		$footer->CurrentFilter = $sFilter;
		$sSql = $footer->SQL();
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

			// Field noi_dung
			$footer->noi_dung->SetDbValueDef($footer->noi_dung->CurrentValue, "");
			$rsnew['noi_dung'] =& $footer->noi_dung->DbValue;

			// Call Row Updating event
			$bUpdateRow = $footer->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($footer->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($footer->CancelMessage <> "") {
					$this->setMessage($footer->CancelMessage);
					$footer->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$footer->Row_Updated($rsold, $rsnew);
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
