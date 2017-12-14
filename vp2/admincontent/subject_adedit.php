<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "subject_adinfo.php" ?>
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
$subject_ad_edit = new csubject_ad_edit();
$Page =& $subject_ad_edit;

// Page init processing
$subject_ad_edit->Page_Init();

// Page main processing
$subject_ad_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var subject_ad_edit = new ew_Page("subject_ad_edit");

// page properties
subject_ad_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = subject_ad_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
subject_ad_edit.ValidateForm = function(fobj) {
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
			return ew_OnError(this, elm, "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - <?php echo Lang_Text('Tên chuyên mục');?>(VI)");
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
subject_ad_edit.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
subject_ad_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
subject_ad_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
subject_ad_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $subject_ad->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Quản lý chuyên mục quảng cáo"); ?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $subject_ad_edit->ShowMessage() ?>
<form name="fsubject_adedit" id="fsubject_adedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return subject_ad_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="subject_ad">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($subject_ad->ten_chuyenmuc->Visible) { // ten_chuyenmuc ?>
	<tr<?php echo $subject_ad->ten_chuyenmuc->RowAttributes ?>>
		<td class="ewTableHeader"><?php echo Lang_Text('Tên chuyên mục');?>(VI)<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $subject_ad->ten_chuyenmuc->CellAttributes() ?>><span id="el_ten_chuyenmuc">
<input type="text" name="x_ten_chuyenmuc" id="x_ten_chuyenmuc" size="100" value="<?php echo $subject_ad->ten_chuyenmuc->EditValue ?>"<?php echo $subject_ad->ten_chuyenmuc->EditAttributes() ?>>
</span><?php echo $subject_ad->ten_chuyenmuc->CustomMsg ?></td>
	</tr>
<?php } ?>
        <?php if ($subject_ad->thutu_sapxep->Visible) { // thutu_sapxep ?>
	<tr<?php echo $subject_ad->thutu_sapxep->RowAttributes ?>>
		<td class="ewTableHeader">Thứ tự sắp xếp<span class="ewRequired"></span></td>
		<td<?php echo $subject_ad->thutu_sapxep->CellAttributes() ?>><span id="el_thutu_sapxep">
<input type="text" name="x_thutu_sapxep" id="x_thutu_sapxep" size="10" value="<?php echo $subject_ad->thutu_sapxep->EditValue ?>"<?php echo $subject_ad->thutu_sapxep->EditAttributes() ?>>
</span><?php echo $subject_ad->thutu_sapxep->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_chuyenmuc_id" id="x_chuyenmuc_id" value="<?php echo ew_HtmlEncode($subject_ad->chuyenmuc_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="   <?php echo Lang_Text('Sửa');?>   ">
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
class csubject_ad_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'subject_ad';

	// Page Object Name
	var $PageObjName = 'subject_ad_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $subject_ad;
		if ($subject_ad->UseTokenInUrl) $PageUrl .= "t=" . $subject_ad->TableVar . "&"; // add page token
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
		global $objForm, $subject_ad;
		if ($subject_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($subject_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($subject_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function csubject_ad_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["subject_ad"] = new csubject_ad();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'subject_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $subject_ad;
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
			$this->Page_Terminate("subject_adlist.php");
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
		global $objForm, $gsFormError, $subject_ad;

		// Load key from QueryString
		if (@$_GET["chuyenmuc_id"] <> "")
			$subject_ad->chuyenmuc_id->setQueryStringValue($_GET["chuyenmuc_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$subject_ad->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$subject_ad->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$subject_ad->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($subject_ad->chuyenmuc_id->CurrentValue == "")
			$this->Page_Terminate("subject_adlist.php"); // Invalid key, return to list
		switch ($subject_ad->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage(Lang_Text('Không có dữ liệu')); // No record found
					$this->Page_Terminate("subject_adlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$subject_ad->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage(Lang_Text('Cập nhật thành công')); // Update success
					$sReturnUrl = $subject_ad->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "subject_adview.php")
						$sReturnUrl = $subject_ad->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$subject_ad->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $subject_ad;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $subject_ad;
		$subject_ad->ten_chuyenmuc->setFormValue($objForm->GetValue("x_ten_chuyenmuc"));
		$subject_ad->ten_chuyenmuc_en->setFormValue($objForm->GetValue("x_ten_chuyenmuc_en"));
                 $subject_ad->thutu_sapxep->setFormValue($objForm->GetValue("x_thutu_sapxep"));
		$subject_ad->chuyenmuc_id->setFormValue($objForm->GetValue("x_chuyenmuc_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $subject_ad;
		$subject_ad->chuyenmuc_id->CurrentValue = $subject_ad->chuyenmuc_id->FormValue;
		$this->LoadRow();
		$subject_ad->ten_chuyenmuc->CurrentValue = $subject_ad->ten_chuyenmuc->FormValue;
		$subject_ad->ten_chuyenmuc_en->CurrentValue = $subject_ad->ten_chuyenmuc_en->FormValue;
                 $subject_ad->thutu_sapxep->CurrentValue = $subject_ad->thutu_sapxep->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $subject_ad;
		$sFilter = $subject_ad->KeyFilter();

		// Call Row Selecting event
		$subject_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$subject_ad->CurrentFilter = $sFilter;
		$sSql = $subject_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$subject_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $subject_ad;
		$subject_ad->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$subject_ad->ten_chuyenmuc->setDbValue($rs->fields('ten_chuyenmuc'));
		$subject_ad->ten_chuyenmuc_en->setDbValue($rs->fields('ten_chuyenmuc_en'));
		$subject_ad->chuyenmuc_belongto->setDbValue($rs->fields('chuyenmuc_belongto'));
		$subject_ad->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$subject_ad->trang_thai->setDbValue($rs->fields('trang_thai'));
		$subject_ad->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$subject_ad->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$subject_ad->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$subject_ad->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $subject_ad;

		// Call Row_Rendering event
		$subject_ad->Row_Rendering();

		// Common render codes for all row types
		// ten_chuyenmuc

		$subject_ad->ten_chuyenmuc->CellCssStyle = "";
		$subject_ad->ten_chuyenmuc->CellCssClass = "";
		
		// ten_chuyenmuc_en

		$subject_ad->ten_chuyenmuc_en->CellCssStyle = "";
		$subject_ad->ten_chuyenmuc_en->CellCssClass = "";
                 // thutu_sapxep

		$subject_ad->thutu_sapxep->CellCssStyle = "";
		$subject_ad->thutu_sapxep->CellCssClass = "";
		if ($subject_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_chuyenmuc
			$subject_ad->ten_chuyenmuc->ViewValue = $subject_ad->ten_chuyenmuc->CurrentValue;
			$subject_ad->ten_chuyenmuc->CssStyle = "";
			$subject_ad->ten_chuyenmuc->CssClass = "";
			$subject_ad->ten_chuyenmuc->ViewCustomAttributes = "";
			
			// ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->ViewValue = $subject_ad->ten_chuyenmuc_en->CurrentValue;
			$subject_ad->ten_chuyenmuc_en->CssStyle = "";
			$subject_ad->ten_chuyenmuc_en->CssClass = "";
			$subject_ad->ten_chuyenmuc_en->ViewCustomAttributes = "";

			// ten_chuyenmuc
			$subject_ad->ten_chuyenmuc->HrefValue = "";
			
			// ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->HrefValue = "";

                        $subject_ad->thutu_sapxep->ViewValue = $subject_ad->thutu_sapxep->CurrentValue;
			$subject_ad->thutu_sapxep->CssStyle = "";
			$subject_ad->thutu_sapxep->CssClass = "";
			$subject_ad->thutu_sapxep->ViewCustomAttributes = "";

			// thutu_sapxep
			$subject_ad->thutu_sapxep->HrefValue = "";
		} elseif ($subject_ad->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// ten_chuyenmuc
			$subject_ad->ten_chuyenmuc->EditCustomAttributes = "";
			$subject_ad->ten_chuyenmuc->EditValue = ew_HtmlEncode($subject_ad->ten_chuyenmuc->CurrentValue);
			
			// ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->EditCustomAttributes = "";
			$subject_ad->ten_chuyenmuc_en->EditValue = ew_HtmlEncode($subject_ad->ten_chuyenmuc_en->CurrentValue);

			// Edit refer script
			// ten_chuyenmuc

			$subject_ad->ten_chuyenmuc->HrefValue = "";
			
			// ten_chuyenmuc_en

			$subject_ad->ten_chuyenmuc_en->HrefValue = "";
                         // thutu_sapxep
			$subject_ad->thutu_sapxep->EditCustomAttributes = "";
			$subject_ad->thutu_sapxep->EditValue = ew_HtmlEncode($subject_ad->thutu_sapxep->CurrentValue);

			// Edit refer script
			// thutu_sapxep

			$subject_ad->thutu_sapxep->HrefValue = "";
		}

		// Call Row Rendered event
		$subject_ad->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $subject_ad;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		/*if ($subject_ad->ten_chuyenmuc->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - <?php echo Lang_Text('Tên chuyên mục');?>";
		}*/
		/*if ($subject_ad->ten_chuyenmuc_en->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - <?php echo Lang_Text('Tên chuyên mục');?>";
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
		global $conn, $Security, $subject_ad;
		$sFilter = $subject_ad->KeyFilter();
		$subject_ad->CurrentFilter = $sFilter;
		$sSql = $subject_ad->SQL();
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
			$subject_ad->ten_chuyenmuc->SetDbValueDef($subject_ad->ten_chuyenmuc->CurrentValue, "");
			$rsnew['ten_chuyenmuc'] =& $subject_ad->ten_chuyenmuc->DbValue;
			
			// Field ten_chuyenmuc_en
			$subject_ad->ten_chuyenmuc_en->SetDbValueDef($subject_ad->ten_chuyenmuc_en->CurrentValue, "");
			$rsnew['ten_chuyenmuc_en'] =& $subject_ad->ten_chuyenmuc_en->DbValue;
                        // Field thutu_sapxep
			$subject_ad->thutu_sapxep->SetDbValueDef($subject_ad->thutu_sapxep->CurrentValue, 0);
			$rsnew['thutu_sapxep'] =& $subject_ad->thutu_sapxep->DbValue;

			// Call Row Updating event
			$bUpdateRow = $subject_ad->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($subject_ad->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($subject_ad->CancelMessage <> "") {
					$this->setMessage($subject_ad->CancelMessage);
					$subject_ad->CancelMessage = "";
				} else {
					$this->setMessage(Lang_Text('Cập nhật bị huỷ bỏ'));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$subject_ad->Row_Updated($rsold, $rsnew);
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
