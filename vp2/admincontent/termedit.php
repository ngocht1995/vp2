<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "terminfo.php" ?>
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
$term_edit = new cterm_edit();
$Page =& $term_edit;

// Page init processing
$term_edit->Page_Init();

// Page main processing
$term_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var term_edit = new ew_Page("term_edit");

// page properties
term_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = term_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
term_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_term_content"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Nội dung điều lệ");
		elm = fobj.elements["x" + infix + "_term_name"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Tên điều lệ");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
term_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
term_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
term_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
term_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="termlist.php"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý điều lệ sàn giao dịch"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $term_edit->ShowMessage() ?>
<form name="ftermedit" id="ftermedit" action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="a_table" id="a_table" value="term">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($term->term_name->Visible) { // term_name ?>
	<tr<?php echo $term->term_name->RowAttributes ?>>
		<td class="ewTableHeader">Tên điều lệ<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $term->term_name->CellAttributes() ?>><span id="el_term_name">
<input type="text" name="x_term_name" id="x_term_name" size="30" maxlength="255" value="<?php echo $term->term_name->EditValue ?>"<?php echo $term->term_name->EditAttributes() ?>>
</span><?php echo $term->term_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($term->term_content->Visible) { // term_content ?>
	<tr<?php echo $term->term_content->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung điều lệ<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $term->term_content->CellAttributes() ?>><span id="el_term_content">
<textarea name="x_term_content" id="x_term_content" cols="50" rows="10"<?php echo $term->term_content->EditAttributes() ?>><?php echo $term->term_content->EditValue ?></textarea>
<script type="text/javascript">
<!--
ew_DHTMLEditors.push(new ew_DHTMLEditor("x_term_content", function() {
	var oCKeditor = CKEDITOR.replace('x_term_content', { width: 45*_width_multiplier, height: 4*_height_multiplier, autoUpdateElement: false, baseHref: 'ckeditor/'});
	this.active = true;
}));
-->
</script>
</span><?php echo $term->term_content->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_term_id" id="x_term_id" value="<?php echo ew_HtmlEncode($term->term_id->CurrentValue) ?>">
<p><center>
<input type="button" name="btnAction" id="btnAction" value="  <?php echo Lang_Text('Sửa');?>   " onclick="ew_SubmitForm(term_edit, this.form);">
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
class cterm_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'term';

	// Page Object Name
	var $PageObjName = 'term_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $term;
		if ($term->UseTokenInUrl) $PageUrl .= "t=" . $term->TableVar . "&"; // add page token
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
		global $objForm, $term;
		if ($term->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($term->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($term->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cterm_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["term"] = new cterm();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'term', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $term;
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
			$this->Page_Terminate("termlist.php");
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
		global $objForm, $gsFormError, $term;

		// Load key from QueryString
		if (@$_GET["term_id"] <> "")
			$term->term_id->setQueryStringValue($_GET["term_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$term->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$term->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$term->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($term->term_id->CurrentValue == "")
			$this->Page_Terminate("termlist.php"); // Invalid key, return to list
		switch ($term->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("termlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$term->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Update success
					$sReturnUrl = $term->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "termview.php")
						$sReturnUrl = $term->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$term->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $term;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $term;
		$term->term_content->setFormValue($objForm->GetValue("x_term_content"));
		$term->term_name->setFormValue($objForm->GetValue("x_term_name"));
		$term->term_id->setFormValue($objForm->GetValue("x_term_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $term;
		$term->term_id->CurrentValue = $term->term_id->FormValue;
		$this->LoadRow();
		$term->term_content->CurrentValue = $term->term_content->FormValue;
		$term->term_name->CurrentValue = $term->term_name->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $term;
		$sFilter = $term->KeyFilter();

		// Call Row Selecting event
		$term->Row_Selecting($sFilter);

		// Load sql based on filter
		$term->CurrentFilter = $sFilter;
		$sSql = $term->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$term->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $term;
		$term->term_id->setDbValue($rs->fields('term_id'));
		$term->term_content->setDbValue($rs->fields('term_content'));
		$term->term_name->setDbValue($rs->fields('term_name'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $term;

		// Call Row_Rendering event
		$term->Row_Rendering();

		// Common render codes for all row types
		// term_content

		$term->term_content->CellCssStyle = "";
		$term->term_content->CellCssClass = "";

		// term_name
		$term->term_name->CellCssStyle = "";
		$term->term_name->CellCssClass = "";
		if ($term->RowType == EW_ROWTYPE_VIEW) { // View row

			// term_content
			$term->term_content->ViewValue = $term->term_content->CurrentValue;
			$term->term_content->CssStyle = "";
			$term->term_content->CssClass = "";
			$term->term_content->ViewCustomAttributes = "";

			// term_name
			$term->term_name->ViewValue = $term->term_name->CurrentValue;
			$term->term_name->CssStyle = "";
			$term->term_name->CssClass = "";
			$term->term_name->ViewCustomAttributes = "";

			// term_content
			$term->term_content->HrefValue = "";


			// term_name
			$term->term_name->HrefValue = "";
		} elseif ($term->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// term_content
			$term->term_content->EditCustomAttributes = "";
			$term->term_content->EditValue = ew_HtmlEncode($term->term_content->CurrentValue);

			// term_name
			$term->term_name->EditCustomAttributes = "";
			$term->term_name->EditValue = ew_HtmlEncode($term->term_name->CurrentValue);

			// Edit refer script
			// term_content

			$term->term_content->HrefValue = "";

			// term_name
			$term->term_name->HrefValue = "";
		}

		// Call Row Rendered event
		$term->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $term;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($term->term_content->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Term Content";
		}
		if ($term->term_name->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Term Name";
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
		global $conn, $Security, $term;
		$sFilter = $term->KeyFilter();
			if ($term->term_name->CurrentValue <> "") { // Check field with unique index
			$sFilterChk = "(term_name = '" . ew_AdjustSql($term->term_name->CurrentValue) . "')";
			$sFilterChk .= " AND NOT (" . $sFilter . ")";
			$term->CurrentFilter = $sFilterChk;
			$sSqlChk = $term->SQL();
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$rsChk = $conn->Execute($sSqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "term_name", "Duplicate value '%v' for unique index '%f'");
				$sIdxErrMsg = str_replace("%v", $term->term_name->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);				
				$rsChk->Close();
				return FALSE;
			}
			$rsChk->Close();
		}
		$term->CurrentFilter = $sFilter;
		$sSql = $term->SQL();
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

			// Field term_content
			$term->term_content->SetDbValueDef($term->term_content->CurrentValue, "");
			$rsnew['term_content'] =& $term->term_content->DbValue;

			// Field term_name
			$term->term_name->SetDbValueDef($term->term_name->CurrentValue, "");
			$rsnew['term_name'] =& $term->term_name->DbValue;

			// Call Row Updating event
			$bUpdateRow = $term->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($term->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($term->CancelMessage <> "") {
					$this->setMessage($term->CancelMessage);
					$term->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$term->Row_Updated($rsold, $rsnew);
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
