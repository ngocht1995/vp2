<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "careerinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "manager_careerinfo.php" ?>
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
$career_edit = new ccareer_edit();
$Page =& $career_edit;

// Page init processing
$career_edit->Page_Init();

// Page main processing
$career_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var career_edit = new ew_Page("career_edit");

// page properties
career_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = career_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
career_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_nganhnghe_ten"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Nganhnghe Ten");
		elm = fobj.elements["x" + infix + "_nganhnghe_pic"];
		aelm = fobj.elements["a" + infix + "_nganhnghe_pic"];
		var chk_nganhnghe_pic = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_nganhnghe_pic && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Nganhnghe Pic");
		elm = fobj.elements["x" + infix + "_nganhnghe_pic"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
career_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
career_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
career_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $career->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa ngành nghề</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $career_edit->ShowMessage() ?>
<form name="fcareeredit" id="fcareeredit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return career_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="career">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($career->nganhnghe_ten->Visible) { // nganhnghe_ten ?>
	<tr<?php echo $career->nganhnghe_ten->RowAttributes ?>>
		<td class="ewTableHeader">Tên ngành nghề<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $career->nganhnghe_ten->CellAttributes() ?>><span id="el_nganhnghe_ten">
<input type="text" name="x_nganhnghe_ten" id="x_nganhnghe_ten" size="30" maxlength="100" value="<?php echo $career->nganhnghe_ten->EditValue ?>"<?php echo $career->nganhnghe_ten->EditAttributes() ?>>
</span><?php echo $career->nganhnghe_ten->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($career->nganhnghe_pic->Visible) { // nganhnghe_pic ?>
	<tr<?php echo $career->nganhnghe_pic->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $career->nganhnghe_pic->CellAttributes() ?>><span id="el_nganhnghe_pic">
<div id="old_x_nganhnghe_pic">
<?php if ($career->nganhnghe_pic->HrefValue <> "") { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<a href="<?php echo $career->nganhnghe_pic->HrefValue ?>" target="_blank"><img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<img src="career_nganhnghe_pic_bv.php?nganhnghe_id=<?php echo $career->nganhnghe_id->CurrentValue ?>" border=0<?php echo $career->nganhnghe_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($career->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_nganhnghe_pic">
<?php if (!is_null($career->nganhnghe_pic->Upload->DbValue)) { ?>
<input type="radio" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="1" checked="checked">Bỏ qua&nbsp;
<input type="radio" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="2" disabled="disabled">Xóa&nbsp;
<input type="radio" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="3">Thay thế<br>
<?php } else { ?>
<input type="hidden" name="a_nganhnghe_pic" id="a_nganhnghe_pic" value="3">
<?php } ?>
<input type="file" name="x_nganhnghe_pic" id="x_nganhnghe_pic" size="30" onchange="if (this.form.a_nganhnghe_pic[2]) this.form.a_nganhnghe_pic[2].checked=true;"<?php echo $career->nganhnghe_pic->EditAttributes() ?>>
</div>
</span><?php echo $career->nganhnghe_pic->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_nganhnghe_id" id="x_nganhnghe_id" value="<?php echo ew_HtmlEncode($career->nganhnghe_id->CurrentValue) ?>">
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
class ccareer_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'career';

	// Page Object Name
	var $PageObjName = 'career_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $career;
		if ($career->UseTokenInUrl) $PageUrl .= "t=" . $career->TableVar . "&"; // add page token
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
		global $objForm, $career;
		if ($career->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($career->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($career->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ccareer_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["career"] = new ccareer();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['Nganhnghe'] = new cNganhnghe();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'career', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $career;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel("Nganhnghe");
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("careerlist.php");
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
		global $objForm, $gsFormError, $career;

		// Load key from QueryString
		if (@$_GET["nganhnghe_id"] <> "")
			$career->nganhnghe_id->setQueryStringValue($_GET["nganhnghe_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$career->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$career->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$career->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($career->nganhnghe_id->CurrentValue == "")
			$this->Page_Terminate("careerlist.php"); // Invalid key, return to list
		switch ($career->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("careerlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$career->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Đã sửa"); // Update success
					$sReturnUrl = $career->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "careerview.php")
						$sReturnUrl = $career->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$career->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $career;

		// Get upload data
			if ($career->nganhnghe_pic->Upload->UploadFile()) {

				// No action required
			} else {
				echo $career->nganhnghe_pic->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $career;
		$career->nganhnghe_ten->setFormValue($objForm->GetValue("x_nganhnghe_ten"));
		$career->nganhnghe_id->setFormValue($objForm->GetValue("x_nganhnghe_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $career;
		$career->nganhnghe_id->CurrentValue = $career->nganhnghe_id->FormValue;
		$this->LoadRow();
		$career->nganhnghe_ten->CurrentValue = $career->nganhnghe_ten->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $career;
		$sFilter = $career->KeyFilter();

		// Call Row Selecting event
		$career->Row_Selecting($sFilter);

		// Load sql based on filter
		$career->CurrentFilter = $sFilter;
		$sSql = $career->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$career->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $career;
		$career->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$career->nganhnghe_ten->setDbValue($rs->fields('nganhnghe_ten'));
		$career->nganhnghe_pic->Upload->DbValue = $rs->fields('nganhnghe_pic');
		$career->nganhnghe_belongto->setDbValue($rs->fields('nganhnghe_belongto'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $career;

		// Call Row_Rendering event
		$career->Row_Rendering();

		// Common render codes for all row types
		// nganhnghe_ten

		$career->nganhnghe_ten->CellCssStyle = "";
		$career->nganhnghe_ten->CellCssClass = "";

		// nganhnghe_pic
		$career->nganhnghe_pic->CellCssStyle = "";
		$career->nganhnghe_pic->CellCssClass = "";
		if ($career->RowType == EW_ROWTYPE_VIEW) { // View row

			// nganhnghe_ten
			$career->nganhnghe_ten->ViewValue = $career->nganhnghe_ten->CurrentValue;
			$career->nganhnghe_ten->CssStyle = "";
			$career->nganhnghe_ten->CssClass = "";
			$career->nganhnghe_ten->ViewCustomAttributes = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->ViewValue = "Nganhnghe Pic";
				$career->nganhnghe_pic->ImageWidth = 20;
				$career->nganhnghe_pic->ImageHeight = 0;
				$career->nganhnghe_pic->ImageAlt = "";
			} else {
				$career->nganhnghe_pic->ViewValue = "";
			}
			$career->nganhnghe_pic->CssStyle = "";
			$career->nganhnghe_pic->CssClass = "";
			$career->nganhnghe_pic->ViewCustomAttributes = "";

			// nganhnghe_ten
			$career->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->HrefValue = "career_nganhnghe_pic_bv.php?nganhnghe_id=" . $career->nganhnghe_id->CurrentValue;
				if ($career->Export <> "") $career->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($career->nganhnghe_pic->HrefValue);
			} else {
				$career->nganhnghe_pic->HrefValue = "";
			}
		} elseif ($career->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// nganhnghe_ten
			$career->nganhnghe_ten->EditCustomAttributes = "";
			$career->nganhnghe_ten->EditValue = ew_HtmlEncode($career->nganhnghe_ten->CurrentValue);

			// nganhnghe_pic
			$career->nganhnghe_pic->EditCustomAttributes = "";
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->EditValue = "Nganhnghe Pic";
				$career->nganhnghe_pic->ImageWidth = 100;
				$career->nganhnghe_pic->ImageHeight = 0;
				$career->nganhnghe_pic->ImageAlt = "";
			} else {
				$career->nganhnghe_pic->EditValue = "";
			}

			// Edit refer script
			// nganhnghe_ten

			$career->nganhnghe_ten->HrefValue = "";

			// nganhnghe_pic
			if (!is_null($career->nganhnghe_pic->Upload->DbValue)) {
				$career->nganhnghe_pic->HrefValue = "career_nganhnghe_pic_bv.php?nganhnghe_id=" . $career->nganhnghe_id->CurrentValue;
				if ($career->Export <> "") $career->nganhnghe_pic->HrefValue = ew_ConvertFullUrl($career->nganhnghe_pic->HrefValue);
			} else {
				$career->nganhnghe_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$career->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $career;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($career->nganhnghe_pic->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($career->nganhnghe_pic->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($career->nganhnghe_pic->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($career->nganhnghe_ten->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nganhnghe Ten";
		}
		if ($career->nganhnghe_pic->Upload->Action == "3" && is_null($career->nganhnghe_pic->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Nganhnghe Pic";
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
		global $conn, $Security, $career;
		$sFilter = $career->KeyFilter();
		$career->CurrentFilter = $sFilter;
		$sSql = $career->SQL();
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

			// Field nganhnghe_ten
			$career->nganhnghe_ten->SetDbValueDef($career->nganhnghe_ten->CurrentValue, "");
			$rsnew['nganhnghe_ten'] =& $career->nganhnghe_ten->DbValue;

			// Field nganhnghe_pic
			$career->nganhnghe_pic->Upload->SaveToSession(); // Save file value to Session
			if ($career->nganhnghe_pic->Upload->Action == "2" || $career->nganhnghe_pic->Upload->Action == "3") { // Update/Remove
			if (is_null($career->nganhnghe_pic->Upload->Value)) {
				$rsnew['nganhnghe_pic'] = NULL;	
			} else {
				$rsnew['nganhnghe_pic'] = $career->nganhnghe_pic->Upload->Value;
			}
			}

			// Call Row Updating event
			$bUpdateRow = $career->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field nganhnghe_pic
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($career->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($career->CancelMessage <> "") {
					$this->setMessage($career->CancelMessage);
					$career->CancelMessage = "";
				} else {
					$this->setMessage("Cập nhật bị hủy bỏ");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$career->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field nganhnghe_pic
		$career->nganhnghe_pic->Upload->RemoveFromSession(); // Remove file value from Session
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
