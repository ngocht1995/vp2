<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "unreadinfo.php" ?>
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
$unread_edit = new cunread_edit();
$Page =& $unread_edit;

// Page init processing
$unread_edit->Page_Init();

// Page main processing
$unread_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var unread_edit = new ew_Page("unread_edit");

// page properties
unread_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = unread_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
unread_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
unread_edit.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
unread_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
unread_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
unread_edit.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">Edit CUSTOM VIEW: Thu Chưa xem<br><br>
<a href="<?php echo $unread->getReturnUrl() ?>">Go Back</a></span></p>
<?php $unread_edit->ShowMessage() ?>
<form name="funreadedit" id="funreadedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return unread_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="unread">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_thu_id" id="x_thu_id" value="<?php echo ew_HtmlEncode($unread->thu_id->CurrentValue) ?>">
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
class cunread_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'unread';

	// Page Object Name
	var $PageObjName = 'unread_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $unread;
		if ($unread->UseTokenInUrl) $PageUrl .= "t=" . $unread->TableVar . "&"; // add page token
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
		global $objForm, $unread;
		if ($unread->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($unread->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($unread->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cunread_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["unread"] = new cunread();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'unread', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $unread;
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
			$this->Page_Terminate("unreadlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("unreadlist.php");
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
		global $objForm, $gsFormError, $unread;

		// Load key from QueryString
		if (@$_GET["thu_id"] <> "")
			$unread->thu_id->setQueryStringValue($_GET["thu_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$unread->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$unread->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$unread->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($unread->thu_id->CurrentValue == "")
			$this->Page_Terminate("unreadlist.php"); // Invalid key, return to list
		switch ($unread->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("unreadlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$unread->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Update success
					$sReturnUrl = $unread->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "unreadview.php")
						$sReturnUrl = $unread->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$unread->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $unread;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $unread;
		$unread->thu_id->setFormValue($objForm->GetValue("x_thu_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $unread;
		$unread->thu_id->CurrentValue = $unread->thu_id->FormValue;
		$this->LoadRow();
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $unread;
		$sFilter = $unread->KeyFilter();

		// Call Row Selecting event
		$unread->Row_Selecting($sFilter);

		// Load sql based on filter
		$unread->CurrentFilter = $sFilter;
		$sSql = $unread->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$unread->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $unread;
		$unread->thu_id->setDbValue($rs->fields('thu_id'));
		$unread->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$unread->tieu_de->setDbValue($rs->fields('tieu_de'));
		$unread->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$unread->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$unread->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$unread->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$unread->diachi_email->setDbValue($rs->fields('diachi_email'));
		$unread->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$unread->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$unread->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$unread->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$unread->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$unread->so_fax->setDbValue($rs->fields('so_fax'));
		$unread->dia_chi->setDbValue($rs->fields('dia_chi'));
		$unread->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$unread->trang_thai->setDbValue($rs->fields('trang_thai'));
		$unread->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $unread;

		// Call Row_Rendering event
		$unread->Row_Rendering();

		// Common render codes for all row types
		if ($unread->RowType == EW_ROWTYPE_VIEW) { // View row
		} elseif ($unread->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// Edit refer script
		}

		// Call Row Rendered event
		$unread->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $unread;

		// Initialize
		$gsFormError = "";

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
		global $conn, $Security, $unread;
		$sFilter = $unread->KeyFilter();
		$unread->CurrentFilter = $sFilter;
		$sSql = $unread->SQL();
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

			// Call Row Updating event
			$bUpdateRow = $unread->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($unread->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($unread->CancelMessage <> "") {
					$this->setMessage($unread->CancelMessage);
					$unread->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$unread->Row_Updated($rsold, $rsnew);
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
