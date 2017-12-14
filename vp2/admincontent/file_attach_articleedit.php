<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "file_attach_articleinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "intro_articleinfo.php" ?>
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
$file_attach_article_edit = new cfile_attach_article_edit();
$Page =& $file_attach_article_edit;

// Page init processing
$file_attach_article_edit->Page_Init();

// Page main processing
$file_attach_article_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var file_attach_article_edit = new ew_Page("file_attach_article_edit");

// page properties
file_attach_article_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = file_attach_article_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
file_attach_article_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_file_name"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập tên file");
                elm = fobj.elements["x" + infix + "_file_desc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập chú thích cho file");
		elm = fobj.elements["x" + infix + "_file_fullname"];
		aelm = fobj.elements["a" + infix + "_file_fullname"];
		var chk_file_fullname = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_file_fullname && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa chọn file đính kèm");
		elm = fobj.elements["x" + infix + "_file_fullname"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File không đúng định dạng.");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
file_attach_article_edit.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
file_attach_article_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
file_attach_article_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
file_attach_article_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
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
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $file_attach_article->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa file đính kèm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $file_attach_article_edit->ShowMessage() ?>
<form name="ffile_attach_articleedit" id="ffile_attach_articleedit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return file_attach_article_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="file_attach_article">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($file_attach_article->file_name->Visible) { // file_name ?>
	<tr<?php echo $file_attach_article->file_name->RowAttributes ?>>
		<td class="ewTableHeader">Tên file<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $file_attach_article->file_name->CellAttributes() ?>><span id="el_file_name">
<input type="text" name="x_file_name" id="x_file_name" size="30" maxlength="255" value="<?php echo $file_attach_article->file_name->EditValue ?>"<?php echo $file_attach_article->file_name->EditAttributes() ?>>
</span><?php echo $file_attach_article->file_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($file_attach_article->file_fullname->Visible) { // file_fullname ?>
	<tr<?php echo $file_attach_article->file_fullname->RowAttributes ?>>
		<td class="ewTableHeader">Đường dẫn file<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $file_attach_article->file_fullname->CellAttributes() ?>><span id="el_file_fullname">
<div id="old_x_file_fullname">
<?php if ($file_attach_article->file_fullname->HrefValue <> "") { ?>
<?php if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) { ?>
<a href="<?php echo $file_attach_article->file_fullname->HrefValue ?>" target="_parent"><?php echo $file_attach_article->file_fullname->EditValue ?></a>
<?php } elseif (!in_array($file_attach_article->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) { ?>
<?php echo $file_attach_article->file_fullname->EditValue ?>
<?php } elseif (!in_array($file_attach_article->CurrentAction, array("I", "edit", "gridedit"))) { ?>
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_file_fullname">
<?php if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) { ?>
<input type="radio" name="a_file_fullname" id="a_file_fullname" value="1" checked="checked">Bỏ qua&nbsp;
<input type="radio" name="a_file_fullname" id="a_file_fullname" value="2" disabled="disabled">Xóa&nbsp;
<input type="radio" name="a_file_fullname" id="a_file_fullname" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_file_fullname" id="a_file_fullname" value="3">
<?php } ?>
<input type="file" name="x_file_fullname" id="x_file_fullname" size="30" onchange="if (this.form.a_file_fullname[2]) this.form.a_file_fullname[2].checked=true;"<?php echo $file_attach_article->file_fullname->EditAttributes() ?>>
</div>
</span><?php echo $file_attach_article->file_fullname->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($file_attach_article->file_desc->Visible) { // file_desc ?>
	<tr<?php echo $file_attach_article->file_desc->RowAttributes ?>>
		<td class="ewTableHeader">Chú thích<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $file_attach_article->file_desc->CellAttributes() ?>><span id="el_file_desc">
<input type="text" name="x_file_desc" id="x_file_desc" size="30" maxlength="255" value="<?php echo $file_attach_article->file_desc->EditValue ?>"<?php echo $file_attach_article->file_desc->EditAttributes() ?>>
</span><?php echo $file_attach_article->file_desc->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_file_id" id="x_file_id" value="<?php echo ew_HtmlEncode($file_attach_article->file_id->CurrentValue) ?>">
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
class cfile_attach_article_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'file_attach_article';

	// Page Object Name
	var $PageObjName = 'file_attach_article_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $file_attach_article;
		if ($file_attach_article->UseTokenInUrl) $PageUrl .= "t=" . $file_attach_article->TableVar . "&"; // add page token
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
		global $objForm, $file_attach_article;
		if ($file_attach_article->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($file_attach_article->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($file_attach_article->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cfile_attach_article_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["file_attach_article"] = new cfile_attach_article();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['intro_article'] = new cintro_article();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'file_attach_article', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $file_attach_article;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("intro_article");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("file_attach_articlelist.php");
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
		global $objForm, $gsFormError, $file_attach_article;

		// Load key from QueryString
		if (@$_GET["file_id"] <> "")
			$file_attach_article->file_id->setQueryStringValue($_GET["file_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$file_attach_article->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$file_attach_article->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$file_attach_article->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($file_attach_article->file_id->CurrentValue == "")
			$this->Page_Terminate("file_attach_articlelist.php"); // Invalid key, return to list
		switch ($file_attach_article->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("file_attach_articlelist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$file_attach_article->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Sửa thành công"); // Update success
					$sReturnUrl = $file_attach_article->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "file_attach_articleview.php")
						$sReturnUrl = $file_attach_article->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$file_attach_article->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $file_attach_article;

		// Get upload data
			if ($file_attach_article->file_fullname->Upload->UploadFile()) {

				// No action required
			} else {
				echo $file_attach_article->file_fullname->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $file_attach_article;
		$file_attach_article->file_name->setFormValue($objForm->GetValue("x_file_name"));
		$file_attach_article->file_desc->setFormValue($objForm->GetValue("x_file_desc"));
		$file_attach_article->file_id->setFormValue($objForm->GetValue("x_file_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $file_attach_article;
		$file_attach_article->file_id->CurrentValue = $file_attach_article->file_id->FormValue;
		$this->LoadRow();
		$file_attach_article->file_name->CurrentValue = $file_attach_article->file_name->FormValue;
		$file_attach_article->file_desc->CurrentValue = $file_attach_article->file_desc->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $file_attach_article;
		$sFilter = $file_attach_article->KeyFilter();

		// Call Row Selecting event
		$file_attach_article->Row_Selecting($sFilter);

		// Load sql based on filter
		$file_attach_article->CurrentFilter = $sFilter;
		$sSql = $file_attach_article->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$file_attach_article->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $file_attach_article;
		$file_attach_article->file_id->setDbValue($rs->fields('file_id'));
		$file_attach_article->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$file_attach_article->file_name->setDbValue($rs->fields('file_name'));
		$file_attach_article->file_fullname->Upload->DbValue = $rs->fields('file_fullname');
		$file_attach_article->file_desc->setDbValue($rs->fields('file_desc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $file_attach_article;

		// Call Row_Rendering event
		$file_attach_article->Row_Rendering();

		// Common render codes for all row types
		// file_name

		$file_attach_article->file_name->CellCssStyle = "";
		$file_attach_article->file_name->CellCssClass = "";

		// file_fullname
		$file_attach_article->file_fullname->CellCssStyle = "";
		$file_attach_article->file_fullname->CellCssClass = "";

		// file_desc
		$file_attach_article->file_desc->CellCssStyle = "";
		$file_attach_article->file_desc->CellCssClass = "";
		if ($file_attach_article->RowType == EW_ROWTYPE_VIEW) { // View row

			// file_name
			$file_attach_article->file_name->ViewValue = $file_attach_article->file_name->CurrentValue;
			$file_attach_article->file_name->CssStyle = "";
			$file_attach_article->file_name->CssClass = "";
			$file_attach_article->file_name->ViewCustomAttributes = "";

			// file_fullname
			if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) {
				$file_attach_article->file_fullname->ViewValue = $file_attach_article->file_fullname->Upload->DbValue;
			} else {
				$file_attach_article->file_fullname->ViewValue = "";
			}
			$file_attach_article->file_fullname->CssStyle = "";
			$file_attach_article->file_fullname->CssClass = "";
			$file_attach_article->file_fullname->ViewCustomAttributes = "";

			// file_desc
			$file_attach_article->file_desc->ViewValue = $file_attach_article->file_desc->CurrentValue;
			$file_attach_article->file_desc->CssStyle = "";
			$file_attach_article->file_desc->CssClass = "";
			$file_attach_article->file_desc->ViewCustomAttributes = "";

			// file_name
			$file_attach_article->file_name->HrefValue = "";

			// file_fullname
			if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) {
				$file_attach_article->file_fullname->HrefValue = ew_UploadPathEx(FALSE, "attach/") . ((!empty($file_attach_article->file_fullname->ViewValue)) ? $file_attach_article->file_fullname->ViewValue : $file_attach_article->file_fullname->CurrentValue);
				if ($file_attach_article->Export <> "") $file_attach_article->file_fullname->HrefValue = ew_ConvertFullUrl($file_attach_article->file_fullname->HrefValue);
			} else {
				$file_attach_article->file_fullname->HrefValue = "";
			}

			// file_desc
			$file_attach_article->file_desc->HrefValue = "";
		} elseif ($file_attach_article->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// file_name
			$file_attach_article->file_name->EditCustomAttributes = "";
			$file_attach_article->file_name->EditValue = ew_HtmlEncode($file_attach_article->file_name->CurrentValue);

			// file_fullname
			$file_attach_article->file_fullname->EditCustomAttributes = "";
			if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) {
				$file_attach_article->file_fullname->EditValue = $file_attach_article->file_fullname->Upload->DbValue;
			} else {
				$file_attach_article->file_fullname->EditValue = "";
			}

			// file_desc
			$file_attach_article->file_desc->EditCustomAttributes = "";
			$file_attach_article->file_desc->EditValue = ew_HtmlEncode($file_attach_article->file_desc->CurrentValue);

			// Edit refer script
			// file_name

			$file_attach_article->file_name->HrefValue = "";

			// file_fullname
			if (!is_null($file_attach_article->file_fullname->Upload->DbValue)) {
				$file_attach_article->file_fullname->HrefValue = ew_UploadPathEx(FALSE, "attach/") . ((!empty($file_attach_article->file_fullname->EditValue)) ? $file_attach_article->file_fullname->EditValue : $file_attach_article->file_fullname->CurrentValue);
				if ($file_attach_article->Export <> "") $file_attach_article->file_fullname->HrefValue = ew_ConvertFullUrl($file_attach_article->file_fullname->HrefValue);
			} else {
				$file_attach_article->file_fullname->HrefValue = "";
			}

			// file_desc
			$file_attach_article->file_desc->HrefValue = "";
		}

		// Call Row Rendered event
		$file_attach_article->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $file_attach_article;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($file_attach_article->file_fullname->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($file_attach_article->file_fullname->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($file_attach_article->file_fullname->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($file_attach_article->file_name->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - File Name";
		}
		if ($file_attach_article->file_fullname->Upload->Action == "3" && is_null($file_attach_article->file_fullname->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - File Fullname";
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
		global $conn, $Security, $file_attach_article;
		$sFilter = $file_attach_article->KeyFilter();
		$file_attach_article->CurrentFilter = $sFilter;
		$sSql = $file_attach_article->SQL();
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

			// Field file_name
			$file_attach_article->file_name->SetDbValueDef($file_attach_article->file_name->CurrentValue, "");
			$rsnew['file_name'] =& $file_attach_article->file_name->DbValue;

			// Field file_fullname
			$file_attach_article->file_fullname->Upload->SaveToSession(); // Save file value to Session
			if ($file_attach_article->file_fullname->Upload->Action == "2" || $file_attach_article->file_fullname->Upload->Action == "3") { // Update/Remove
			$file_attach_article->file_fullname->Upload->DbValue = $rs->fields('file_fullname'); // Get original value
			if (is_null($file_attach_article->file_fullname->Upload->Value)) {
				$rsnew['file_fullname'] = NULL;
			} else {
				if ($file_attach_article->file_fullname->Upload->FileName == $file_attach_article->file_fullname->Upload->DbValue) { // Upload file name same as old file name
					$rsnew['file_fullname'] = $file_attach_article->file_fullname->Upload->FileName;
				} else {
					$rsnew['file_fullname'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, "attach/"), $file_attach_article->file_fullname->Upload->FileName);
				}
			}
			}

			// Field file_desc
			$file_attach_article->file_desc->SetDbValueDef($file_attach_article->file_desc->CurrentValue, NULL);
			$rsnew['file_desc'] =& $file_attach_article->file_desc->DbValue;

			// Call Row Updating event
			$bUpdateRow = $file_attach_article->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field file_fullname
			if (!is_null($file_attach_article->file_fullname->Upload->Value)) {
				if ($file_attach_article->file_fullname->Upload->FileName == $file_attach_article->file_fullname->Upload->DbValue) { // Overwrite if same file name
					$file_attach_article->file_fullname->Upload->SaveToFile("attach/", $rsnew['file_fullname'], TRUE);
					$file_attach_article->file_fullname->Upload->DbValue = ""; // No need to delete any more
				} else {
					$file_attach_article->file_fullname->Upload->SaveToFile("attach/", $rsnew['file_fullname'], FALSE);
				}
			}
			if ($file_attach_article->file_fullname->Upload->Action == "2" || $file_attach_article->file_fullname->Upload->Action == "3") { // Update/Remove
				if ($file_attach_article->file_fullname->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, "attach/") . $file_attach_article->file_fullname->Upload->DbValue);
			}
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($file_attach_article->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($file_attach_article->CancelMessage <> "") {
					$this->setMessage($file_attach_article->CancelMessage);
					$file_attach_article->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$file_attach_article->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field file_fullname
		$file_attach_article->file_fullname->Upload->RemoveFromSession(); // Remove file value from Session
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
