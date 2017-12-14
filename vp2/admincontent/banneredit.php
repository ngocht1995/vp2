<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "bannerinfo.php" ?>
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
$banner_edit = new cbanner_edit();
$Page =& $banner_edit;

// Page init processing
$banner_edit->Page_Init();

// Page main processing
$banner_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var banner_edit = new ew_Page("banner_edit");

// page properties
banner_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = banner_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
banner_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_banner_pic"];
		aelm = fobj.elements["a" + infix + "_banner_pic"];
		var chk_banner_pic = (aelm && aelm[0])?(aelm[2].checked):true;
		if (elm && chk_banner_pic && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Banner Pic");
		elm = fobj.elements["x" + infix + "_banner_pic"];
		if (elm && !ew_CheckFileType(elm.value))
			return ew_OnError(this, elm, "File type is not allowed.");
		elm = fobj.elements["x" + infix + "_banner_url"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Banner Url");
		elm = fobj.elements["x" + infix + "_banner_type"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Banner Type");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
banner_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
banner_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
banner_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
banner_edit.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">Edit TABLE: Banner<br><br>
<a href="<?php echo $banner->getReturnUrl() ?>">Go Back</a></span></p>
<?php $banner_edit->ShowMessage() ?>
<form name="fbanneredit" id="fbanneredit" action="<?php echo ew_CurrentPage() ?>" method="post" enctype="multipart/form-data" onsubmit="return banner_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="banner">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($banner->banner_pic->Visible) { // banner_pic ?>
	<tr<?php echo $banner->banner_pic->RowAttributes ?>>
		<td class="ewTableHeader">Banner Pic<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $banner->banner_pic->CellAttributes() ?>><span id="el_banner_pic">
<div id="old_x_banner_pic">
<?php if ($banner->banner_pic->HrefValue <> "") { ?>
<?php if (!is_null($banner->banner_pic->Upload->DbValue)) { ?>
<a href="<?php echo $banner->banner_pic->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $banner->banner_pic->Upload->DbValue ?>" border=0<?php echo $banner->banner_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($banner->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($banner->banner_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $banner->banner_pic->Upload->DbValue ?>" border=0<?php echo $banner->banner_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($banner->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</div>
<div id="new_x_banner_pic">
<?php if (!is_null($banner->banner_pic->Upload->DbValue)) { ?>
<input type="radio" name="a_banner_pic" id="a_banner_pic" value="1" checked="checked">Keep&nbsp;
<input type="radio" name="a_banner_pic" id="a_banner_pic" value="2" disabled="disabled">Remove&nbsp;
<input type="radio" name="a_banner_pic" id="a_banner_pic" value="3">Replace<br>
<?php } else { ?>
<input type="hidden" name="a_banner_pic" id="a_banner_pic" value="3">
<?php } ?>
<input type="file" name="x_banner_pic" id="x_banner_pic" size="30" onchange="if (this.form.a_banner_pic[2]) this.form.a_banner_pic[2].checked=true;"<?php echo $banner->banner_pic->EditAttributes() ?>>
</div>
</span><?php echo $banner->banner_pic->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($banner->banner_url->Visible) { // banner_url ?>
	<tr<?php echo $banner->banner_url->RowAttributes ?>>
		<td class="ewTableHeader">Banner Url<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $banner->banner_url->CellAttributes() ?>><span id="el_banner_url">
<input type="text" name="x_banner_url" id="x_banner_url" size="30" maxlength="255" value="<?php echo $banner->banner_url->EditValue ?>"<?php echo $banner->banner_url->EditAttributes() ?>>
</span><?php echo $banner->banner_url->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($banner->banner_type->Visible) { // banner_type ?>
	<tr<?php echo $banner->banner_type->RowAttributes ?>>
		<td class="ewTableHeader">Banner Type<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $banner->banner_type->CellAttributes() ?>><span id="el_banner_type">
<select id="x_banner_type" name="x_banner_type"<?php echo $banner->banner_type->EditAttributes() ?>>
<?php
if (is_array($banner->banner_type->EditValue)) {
	$arwrk = $banner->banner_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($banner->banner_type->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $banner->banner_type->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_banner_id" id="x_banner_id" value="<?php echo ew_HtmlEncode($banner->banner_id->CurrentValue) ?>">
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
class cbanner_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'banner';

	// Page Object Name
	var $PageObjName = 'banner_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $banner;
		if ($banner->UseTokenInUrl) $PageUrl .= "t=" . $banner->TableVar . "&"; // add page token
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
		global $objForm, $banner;
		if ($banner->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($banner->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($banner->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cbanner_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["banner"] = new cbanner();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'banner', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $banner;
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
			$this->Page_Terminate("bannerlist.php");
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
		global $objForm, $gsFormError, $banner;

		// Load key from QueryString
		if (@$_GET["banner_id"] <> "")
			$banner->banner_id->setQueryStringValue($_GET["banner_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$banner->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->GetUploadFiles(); // Get upload files
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$banner->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$banner->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($banner->banner_id->CurrentValue == "")
			$this->Page_Terminate("bannerlist.php"); // Invalid key, return to list
		switch ($banner->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("bannerlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$banner->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Cập nhật thành công"); // Update success
					$sReturnUrl = $banner->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "bannerview.php")
						$sReturnUrl = $banner->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$banner->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $banner;

		// Get upload data
			if ($banner->banner_pic->Upload->UploadFile()) {

				// No action required
			} else {
				echo $banner->banner_pic->Upload->Message;
				$this->Page_Terminate();
				exit();
			}
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $banner;
		$banner->banner_url->setFormValue($objForm->GetValue("x_banner_url"));
		$banner->banner_type->setFormValue($objForm->GetValue("x_banner_type"));
		$banner->banner_id->setFormValue($objForm->GetValue("x_banner_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $banner;
		$banner->banner_id->CurrentValue = $banner->banner_id->FormValue;
		$this->LoadRow();
		$banner->banner_url->CurrentValue = $banner->banner_url->FormValue;
		$banner->banner_type->CurrentValue = $banner->banner_type->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $banner;
		$sFilter = $banner->KeyFilter();

		// Call Row Selecting event
		$banner->Row_Selecting($sFilter);

		// Load sql based on filter
		$banner->CurrentFilter = $sFilter;
		$sSql = $banner->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$banner->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $banner;
		$banner->banner_id->setDbValue($rs->fields('banner_id'));
		$banner->banner_pic->Upload->DbValue = $rs->fields('banner_pic');
		$banner->banner_url->setDbValue($rs->fields('banner_url'));
		$banner->banner_type->setDbValue($rs->fields('banner_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $banner;

		// Call Row_Rendering event
		$banner->Row_Rendering();

		// Common render codes for all row types
		// banner_pic

		$banner->banner_pic->CellCssStyle = "";
		$banner->banner_pic->CellCssClass = "";

		// banner_url
		$banner->banner_url->CellCssStyle = "";
		$banner->banner_url->CellCssClass = "";

		// banner_type
		$banner->banner_type->CellCssStyle = "";
		$banner->banner_type->CellCssClass = "";
		if ($banner->RowType == EW_ROWTYPE_VIEW) { // View row

			// banner_pic
			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->ViewValue = $banner->banner_pic->Upload->DbValue;
				$banner->banner_pic->ImageAlt = "";
			} else {
				$banner->banner_pic->ViewValue = "";
			}
			$banner->banner_pic->CssStyle = "";
			$banner->banner_pic->CssClass = "";
			$banner->banner_pic->ViewCustomAttributes = "";

			// banner_url
			$banner->banner_url->ViewValue = $banner->banner_url->CurrentValue;
			$banner->banner_url->CssStyle = "";
			$banner->banner_url->CssClass = "";
			$banner->banner_url->ViewCustomAttributes = "";

			// banner_type
			if (strval($banner->banner_type->CurrentValue) <> "") {
				switch ($banner->banner_type->CurrentValue) {
					case "0":
						$banner->banner_type->ViewValue = "Image";
						break;
					case "1":
						$banner->banner_type->ViewValue = "Flash";
						break;
					default:
						$banner->banner_type->ViewValue = $banner->banner_type->CurrentValue;
				}
			} else {
				$banner->banner_type->ViewValue = NULL;
			}
			$banner->banner_type->CssStyle = "";
			$banner->banner_type->CssClass = "";
			$banner->banner_type->ViewCustomAttributes = "";

			// banner_pic
			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($banner->banner_pic->ViewValue)) ? $banner->banner_pic->ViewValue : $banner->banner_pic->CurrentValue);
				if ($banner->Export <> "") $banner->banner_pic->HrefValue = ew_ConvertFullUrl($banner->banner_pic->HrefValue);
			} else {
				$banner->banner_pic->HrefValue = "";
			}

			// banner_url
			$banner->banner_url->HrefValue = "";

			// banner_type
			$banner->banner_type->HrefValue = "";
		} elseif ($banner->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// banner_pic
			$banner->banner_pic->EditCustomAttributes = "";
			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->EditValue = $banner->banner_pic->Upload->DbValue;
				$banner->banner_pic->ImageAlt = "";
			} else {
				$banner->banner_pic->EditValue = "";
			}

			// banner_url
			$banner->banner_url->EditCustomAttributes = "";
			$banner->banner_url->EditValue = ew_HtmlEncode($banner->banner_url->CurrentValue);

			// banner_type
			$banner->banner_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Image");
			$arwrk[] = array("1", "Flash");
			array_unshift($arwrk, array("", "Chọn"));
			$banner->banner_type->EditValue = $arwrk;

			// Edit refer script
			// banner_pic

			if (!is_null($banner->banner_pic->Upload->DbValue)) {
				$banner->banner_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($banner->banner_pic->EditValue)) ? $banner->banner_pic->EditValue : $banner->banner_pic->CurrentValue);
				if ($banner->Export <> "") $banner->banner_pic->HrefValue = ew_ConvertFullUrl($banner->banner_pic->HrefValue);
			} else {
				$banner->banner_pic->HrefValue = "";
			}

			// banner_url
			$banner->banner_url->HrefValue = "";

			// banner_type
			$banner->banner_type->HrefValue = "";
		}

		// Call Row Rendered event
		$banner->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $banner;

		// Initialize
		$gsFormError = "";
		if (!ew_CheckFileType($banner->banner_pic->Upload->FileName)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "File type is not allowed.";
		}
		if ($banner->banner_pic->Upload->FileSize > 0 && EW_MAX_FILE_SIZE > 0) {
			if ($banner->banner_pic->Upload->FileSize > EW_MAX_FILE_SIZE)
				$gsFormError .= str_replace("%s", EW_MAX_FILE_SIZE, "Kích thước file tối đa (%s bytes).");
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($banner->banner_pic->Upload->Action == "3" && is_null($banner->banner_pic->Upload->Value)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Banner Pic";
		}
		if ($banner->banner_url->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Banner Url";
		}
		if ($banner->banner_type->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Banner Type";
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
		global $conn, $Security, $banner;
		$sFilter = $banner->KeyFilter();
		$banner->CurrentFilter = $sFilter;
		$sSql = $banner->SQL();
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

			// Field banner_pic
			$banner->banner_pic->Upload->SaveToSession(); // Save file value to Session
			if ($banner->banner_pic->Upload->Action == "2" || $banner->banner_pic->Upload->Action == "3") { // Update/Remove
			$banner->banner_pic->Upload->DbValue = $rs->fields('banner_pic'); // Get original value
			if (is_null($banner->banner_pic->Upload->Value)) {
				$rsnew['banner_pic'] = NULL;
			} else {
				if ($banner->banner_pic->Upload->FileName == $banner->banner_pic->Upload->DbValue) { // Upload file name same as old file name
					$rsnew['banner_pic'] = $banner->banner_pic->Upload->FileName;
				} else {
					$rsnew['banner_pic'] = ew_UploadFileNameEx(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH), $banner->banner_pic->Upload->FileName);
				}
			}
			}

			// Field banner_url
			$banner->banner_url->SetDbValueDef($banner->banner_url->CurrentValue, "");
			$rsnew['banner_url'] =& $banner->banner_url->DbValue;

			// Field banner_type
			$banner->banner_type->SetDbValueDef($banner->banner_type->CurrentValue, 0);
			$rsnew['banner_type'] =& $banner->banner_type->DbValue;

			// Call Row Updating event
			$bUpdateRow = $banner->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {

			// Field banner_pic
			if (!is_null($banner->banner_pic->Upload->Value)) {
				if ($banner->banner_pic->Upload->FileName == $banner->banner_pic->Upload->DbValue) { // Overwrite if same file name
					$banner->banner_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['banner_pic'], TRUE);
					$banner->banner_pic->Upload->DbValue = ""; // No need to delete any more
				} else {
					$banner->banner_pic->Upload->SaveToFile(EW_UPLOAD_DEST_PATH, $rsnew['banner_pic'], FALSE);
				}
			}
			if ($banner->banner_pic->Upload->Action == "2" || $banner->banner_pic->Upload->Action == "3") { // Update/Remove
				if ($banner->banner_pic->Upload->DbValue <> "")
					@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $banner->banner_pic->Upload->DbValue);
			}
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($banner->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($banner->CancelMessage <> "") {
					$this->setMessage($banner->CancelMessage);
					$banner->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$banner->Row_Updated($rsold, $rsnew);
		$rs->Close();

		// Field banner_pic
		$banner->banner_pic->Upload->RemoveFromSession(); // Remove file value from Session
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
