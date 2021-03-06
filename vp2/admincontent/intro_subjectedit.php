<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "intro_subjectinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "subjectinfo.php" ?>
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
$intro_subject_edit = new cintro_subject_edit();
$Page =& $intro_subject_edit;

// Page init processing
$intro_subject_edit->Page_Init();

// Page main processing
$intro_subject_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var intro_subject_edit = new ew_Page("intro_subject_edit");

// page properties
intro_subject_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = intro_subject_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
intro_subject_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_ten_chuyenmuc"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Chưa nhập - Tên chuyên mục");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
intro_subject_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
intro_subject_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
intro_subject_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
intro_subject_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $intro_subject->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa Menu con</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $intro_subject_edit->ShowMessage() ?>
<form name="fintro_subjectedit" id="fintro_subjectedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return intro_subject_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="intro_subject">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($intro_subject->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<tr<?php echo $intro_subject->ten_chuyenmuc->RowAttributes ?>>
		<td class="ewTableHeader">Tên Menu con<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $intro_subject->ten_chuyenmuc->CellAttributes() ?>><span id="el_ten_chuyenmuc">
<input type="text" name="x_ten_chuyenmuc" id="x_ten_chuyenmuc" size="100" maxlength="100" value="<?php echo $intro_subject->ten_chuyenmuc->EditValue ?>"<?php echo $intro_subject->ten_chuyenmuc->EditAttributes() ?>>
</span><?php echo $intro_subject->ten_chuyenmuc->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($intro_subject->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $intro_subject->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự sắp xếp<span class="ewRequired"></span></td>
		<td<?php echo $intro_subject->thutu_sapxep->CellAttributes() ?>><span id="el_thutu_sapxep">
<input type="text" name="x_thutu_sapxep" id="x_thutu_sapxep" size="10" value="<?php echo $intro_subject->thutu_sapxep->EditValue ?>"<?php echo $intro_subject->thutu_sapxep->EditAttributes() ?>>
</span><?php echo $intro_subject->thutu_sapxep->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_chuyenmuc_id" id="x_chuyenmuc_id" value="<?php echo ew_HtmlEncode($intro_subject->chuyenmuc_id->CurrentValue) ?>">
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
class cintro_subject_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'intro_subject';

	// Page Object Name
	var $PageObjName = 'intro_subject_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $intro_subject;
		if ($intro_subject->UseTokenInUrl) $PageUrl .= "t=" . $intro_subject->TableVar . "&"; // add page token
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
		global $objForm, $intro_subject;
		if ($intro_subject->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($intro_subject->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($intro_subject->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cintro_subject_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["intro_subject"] = new cintro_subject();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['subject'] = new csubject();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'intro_subject', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $intro_subject;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("subject");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("intro_subjectlist.php");
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
		global $objForm, $gsFormError, $intro_subject;

		// Load key from QueryString
		if (@$_GET["chuyenmuc_id"] <> "")
			$intro_subject->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$intro_subject->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$intro_subject->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$intro_subject->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($intro_subject->chuyenmuc_id->CurrentValue == "")
			$this->Page_Terminate("intro_subjectlist.php"); // Invalid key, return to list
		switch ($intro_subject->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("intro_subjectlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$intro_subject->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Đã sửa"); // Update success
					$sReturnUrl = $intro_subject->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "intro_subjectview.php")
						$sReturnUrl = $intro_subject->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$intro_subject->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $intro_subject;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $intro_subject;
		$intro_subject->ten_chuyenmuc->setFormValue($objForm->GetValue("x_ten_chuyenmuc"));
                $intro_subject->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
		$intro_subject->chuyenmuc_id->setFormValue($objForm->GetValue("x_chuyenmuc_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $intro_subject;
		$intro_subject->chuyenmuc_id->CurrentValue = $intro_subject->chuyenmuc_id->FormValue;
		$this->LoadRow();
		$intro_subject->ten_chuyenmuc->CurrentValue = $intro_subject->ten_chuyenmuc->FormValue;
                $intro_subject->thutu_sapxep->CurrentValue = $intro_subject->thutu_sapxep->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $intro_subject;
		$sFilter = $intro_subject->KeyFilter();

		// Call Row Selecting event
		$intro_subject->Row_Selecting($sFilter);

		// Load sql based on filter
		$intro_subject->CurrentFilter = $sFilter;
		$sSql = $intro_subject->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$intro_subject->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $intro_subject;
		$intro_subject->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$intro_subject->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$intro_subject->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$intro_subject->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$intro_subject->trang_thai->setDbValue($rs->fields('trang_thai'));
		$intro_subject->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$intro_subject->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$intro_subject->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$intro_subject->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $intro_subject;

		// Call Row_Rendering event
		$intro_subject->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$intro_subject->ten_chuyenmuc->CellCssStyle = "";
		$intro_subject->ten_chuyenmuc->CellCssClass = "";
                // thutu_sapxep

		$intro_subject->thutu_sapxep->CellCssStyle = "";
		$intro_subject->thutu_sapxep->CellCssClass = "";
		if ($intro_subject->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->ViewValue = $intro_subject->ten_chuyenmuc->CurrentValue;
			$intro_subject->ten_chuyenmuc->CssStyle = "";
			$intro_subject->ten_chuyenmuc->CssClass = "";
			$intro_subject->ten_chuyenmuc->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->HrefValue = "";
                        // thutu_sapxep
			$intro_subject->ten_chuyenmuc->HrefValue = "";

                        $intro_subject->thutu_sapxep->ViewValue = $intro_subject->thutu_sapxep->CurrentValue;
			$intro_subject->thutu_sapxep->CssStyle = "";
			$intro_subject->thutu_sapxep->CssClass = "";
			$intro_subject->thutu_sapxep->ViewCustomAttributes = "";

			// thutu_sapxep
			$intro_subject->thutu_sapxep->HrefValue = "";
		} elseif ($intro_subject->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->EditCustomAttributes = "";
			$intro_subject->ten_chuyenmuc->EditValue = ew_HtmlEncode($intro_subject->ten_chuyenmuc->CurrentValue);

			// Edit refer script
			// ten_chuyenmuc

			$intro_subject->ten_chuyenmuc->HrefValue = "";
                         // thutu_sapxep
			$intro_subject->thutu_sapxep->EditCustomAttributes = "";
			$intro_subject->thutu_sapxep->EditValue = ew_HtmlEncode($intro_subject->thutu_sapxep->CurrentValue);

			// Edit refer script
			// thutu_sapxep

			$intro_subject->thutu_sapxep->HrefValue = "";
		}

		// Call Row Rendered event
		$intro_subject->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $intro_subject;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($intro_subject->ten_chuyenmuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Tên chuyên mục";
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
		global $conn, $Security, $intro_subject;
		$sFilter = $intro_subject->KeyFilter();
		$intro_subject->CurrentFilter = $sFilter;
		$sSql = $intro_subject->SQL();
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

			// Field ten_chuyenmuc
			$intro_subject->ten_chuyenmuc->SetDbValueDef($intro_subject->ten_chuyenmuc->CurrentValue, "");
			$rsnew['ten_chuyenmuc'] =& $intro_subject->ten_chuyenmuc->DbValue;
                         // Field thutu_sapxep
			$intro_subject->thutu_sapxep->SetDbValueDef($intro_subject->thutu_sapxep->CurrentValue, 0);
			$rsnew['thutu_sapxep'] =& $intro_subject->thutu_sapxep->DbValue;

			// Call Row Updating event
			$bUpdateRow = $intro_subject->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($intro_subject->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($intro_subject->CancelMessage <> "") {
					$this->setMessage($intro_subject->CancelMessage);
					$intro_subject->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$intro_subject->Row_Updated($rsold, $rsnew);
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
