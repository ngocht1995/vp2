<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "linkinfo.php" ?>
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
$link_edit = new clink_edit();
$Page =& $link_edit;

// Page init processing
$link_edit->Page_Init();

// Page main processing
$link_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var link_edit = new ew_Page("link_edit");

// page properties
link_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = link_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
link_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_link_name"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập tên liên kết");
		elm = fobj.elements["x" + infix + "_link_url"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập đường dẫn liên kết");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
link_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
link_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
link_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
link_edit.ValidateRequired = false; // no JavaScript validation
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
                                                                    <a href="<?php echo $link->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý liên kết Website</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php $link_edit->ShowMessage() ?>
<form name="flinkedit" id="flinkedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return link_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="link">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($link->link_name->Visible) { // link_name ?>
	<tr<?php echo $link->link_name->RowAttributes ?>>
		<td class="ewTableHeader">Tên liên kết<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $link->link_name->CellAttributes() ?>><span id="el_link_name">
<input type="text" name="x_link_name" id="x_link_name" size="30" maxlength="45" value="<?php echo $link->link_name->EditValue ?>"<?php echo $link->link_name->EditAttributes() ?>>
</span><?php echo $link->link_name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($link->link_url->Visible) { // link_url ?>
	<tr<?php echo $link->link_url->RowAttributes ?>>
		<td class="ewTableHeader">Đường dẫn liên kết<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $link->link_url->CellAttributes() ?>><span id="el_link_url">
<input type="text" name="x_link_url" id="x_link_url" size="30" maxlength="255" value="<?php echo $link->link_url->EditValue ?>"<?php echo $link->link_url->EditAttributes() ?>>
</span><?php echo $link->link_url->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_link_id" id="x_link_id" value="<?php echo ew_HtmlEncode($link->link_id->CurrentValue) ?>">
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
class clink_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'link';

	// Page Object Name
	var $PageObjName = 'link_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $link;
		if ($link->UseTokenInUrl) $PageUrl .= "t=" . $link->TableVar . "&"; // add page token
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
		global $objForm, $link;
		if ($link->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($link->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($link->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function clink_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["link"] = new clink();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'link', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $link;
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
			$this->Page_Terminate("linklist.php");
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
		global $objForm, $gsFormError, $link;

		// Load key from QueryString
		if (@$_GET["link_id"] <> "")
			$link->link_id->setQueryStringValue($_GET["link_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$link->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$link->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$link->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($link->link_id->CurrentValue == "")
			$this->Page_Terminate("linklist.php"); // Invalid key, return to list
		switch ($link->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("linklist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$link->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Sửa thành công"); // Update success
					$sReturnUrl = $link->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "linkview.php")
						$sReturnUrl = $link->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$link->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $link;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $link;
		$link->link_name->setFormValue($objForm->GetValue("x_link_name"));
		$link->link_url->setFormValue($objForm->GetValue("x_link_url"));
		$link->link_id->setFormValue($objForm->GetValue("x_link_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $link;
		$link->link_id->CurrentValue = $link->link_id->FormValue;
		$this->LoadRow();
		$link->link_name->CurrentValue = $link->link_name->FormValue;
		$link->link_url->CurrentValue = $link->link_url->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $link;
		$sFilter = $link->KeyFilter();

		// Call Row Selecting event
		$link->Row_Selecting($sFilter);

		// Load sql based on filter
		$link->CurrentFilter = $sFilter;
		$sSql = $link->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$link->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $link;
		$link->link_id->setDbValue($rs->fields('link_id'));
		$link->link_name->setDbValue($rs->fields('link_name'));
		$link->link_url->setDbValue($rs->fields('link_url'));
		$link->link_status->setDbValue($rs->fields('link_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $link;

		// Call Row_Rendering event
		$link->Row_Rendering();

		// Common render codes for all row types
		// link_name

		$link->link_name->CellCssStyle = "";
		$link->link_name->CellCssClass = "";

		// link_url
		$link->link_url->CellCssStyle = "";
		$link->link_url->CellCssClass = "";
		if ($link->RowType == EW_ROWTYPE_VIEW) { // View row

			// link_name
			$link->link_name->ViewValue = $link->link_name->CurrentValue;
			$link->link_name->CssStyle = "";
			$link->link_name->CssClass = "";
			$link->link_name->ViewCustomAttributes = "";

			// link_url
			$link->link_url->ViewValue = $link->link_url->CurrentValue;
			$link->link_url->CssStyle = "";
			$link->link_url->CssClass = "";
			$link->link_url->ViewCustomAttributes = "";

			// link_name
			$link->link_name->HrefValue = "";

			// link_url
			$link->link_url->HrefValue = "";
		} elseif ($link->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// link_name
			$link->link_name->EditCustomAttributes = "";
			$link->link_name->EditValue = ew_HtmlEncode($link->link_name->CurrentValue);

			// link_url
			$link->link_url->EditCustomAttributes = "";
			$link->link_url->EditValue = ew_HtmlEncode($link->link_url->CurrentValue);

			// Edit refer script
			// link_name

			$link->link_name->HrefValue = "";

			// link_url
			$link->link_url->HrefValue = "";
		}

		// Call Row Rendered event
		$link->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $link;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($link->link_name->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Link Name";
		}
		if ($link->link_url->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Link Url";
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
		global $conn, $Security, $link;
		$sFilter = $link->KeyFilter();
		$link->CurrentFilter = $sFilter;
		$sSql = $link->SQL();
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

			// Field link_name
			$link->link_name->SetDbValueDef($link->link_name->CurrentValue, "");
			$rsnew['link_name'] =& $link->link_name->DbValue;

			// Field link_url
			$link->link_url->SetDbValueDef($link->link_url->CurrentValue, "");
			$rsnew['link_url'] =& $link->link_url->DbValue;

			// Call Row Updating event
			$bUpdateRow = $link->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($link->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($link->CancelMessage <> "") {
					$this->setMessage($link->CancelMessage);
					$link->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$link->Row_Updated($rsold, $rsnew);
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
