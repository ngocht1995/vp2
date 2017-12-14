<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "ew_emailinfo.php" ?>
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
$ew_email_edit = new cew_email_edit();
$Page =& $ew_email_edit;

// Page init processing
$ew_email_edit->Page_Init();

// Page main processing
$ew_email_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var ew_email_edit = new ew_Page("ew_email_edit");

// page properties
ew_email_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = ew_email_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
ew_email_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_SMTP_SERVER"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - SMTP SERVER");
		elm = fobj.elements["x" + infix + "_SERVER_PORT"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - SERVER PORT");
		elm = fobj.elements["x" + infix + "_SERVER_USERNAME"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - SERVER USERNAME");
		elm = fobj.elements["x" + infix + "_SERVER_PASSWORD"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - SERVER PASSWORD");
		elm = fobj.elements["x" + infix + "_SENDER_EMAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - SENDER EMAIL");
		elm = fobj.elements["x" + infix + "_RECIPIENT_EMAIL"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - RECIPIENT EMAIL");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
ew_email_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
ew_email_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
ew_email_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
ew_email_edit.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $ew_email->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa Email hệ thống</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $ew_email_edit->ShowMessage() ?>
<form name="few_emailedit" id="few_emailedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return ew_email_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="ew_email">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($ew_email->SMTP_SERVER->Visible) { // SMTP_SERVER ?>
	<tr<?php echo $ew_email->SMTP_SERVER->RowAttributes ?>>
		<td class="ewTableHeader">SMTP SERVER<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $ew_email->SMTP_SERVER->CellAttributes() ?>><span id="el_SMTP_SERVER">
<input type="text" name="x_SMTP_SERVER" id="x_SMTP_SERVER" size="50" maxlength="100" value="<?php echo $ew_email->SMTP_SERVER->EditValue ?>"<?php echo $ew_email->SMTP_SERVER->EditAttributes() ?>>
</span><?php echo $ew_email->SMTP_SERVER->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SERVER_PORT->Visible) { // SERVER_PORT ?>
	<tr<?php echo $ew_email->SERVER_PORT->RowAttributes ?>>
		<td class="ewTableHeader">SERVER PORT<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $ew_email->SERVER_PORT->CellAttributes() ?>><span id="el_SERVER_PORT">
<input type="text" name="x_SERVER_PORT" id="x_SERVER_PORT" size="30" maxlength="45" value="<?php echo $ew_email->SERVER_PORT->EditValue ?>"<?php echo $ew_email->SERVER_PORT->EditAttributes() ?>>
</span><?php echo $ew_email->SERVER_PORT->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SERVER_USERNAME->Visible) { // SERVER_USERNAME ?>
	<tr<?php echo $ew_email->SERVER_USERNAME->RowAttributes ?>>
		<td class="ewTableHeader">SERVER USERNAME<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $ew_email->SERVER_USERNAME->CellAttributes() ?>><span id="el_SERVER_USERNAME">
<input type="text" name="x_SERVER_USERNAME" id="x_SERVER_USERNAME" size="50" maxlength="55" value="<?php echo $ew_email->SERVER_USERNAME->EditValue ?>"<?php echo $ew_email->SERVER_USERNAME->EditAttributes() ?>>
</span><?php echo $ew_email->SERVER_USERNAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SERVER_PASSWORD->Visible) { // SERVER_PASSWORD ?>
	<tr<?php echo $ew_email->SERVER_PASSWORD->RowAttributes ?>>
		<td class="ewTableHeader">SERVER PASSWORD<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $ew_email->SERVER_PASSWORD->CellAttributes() ?>><span id="el_SERVER_PASSWORD">
<input type="text" name="x_SERVER_PASSWORD" id="x_SERVER_PASSWORD" size="50" maxlength="45" value="<?php echo $ew_email->SERVER_PASSWORD->EditValue ?>"<?php echo $ew_email->SERVER_PASSWORD->EditAttributes() ?>>
</span><?php echo $ew_email->SERVER_PASSWORD->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ew_email->SENDER_EMAIL->Visible) { // SENDER_EMAIL ?>
	<tr<?php echo $ew_email->SENDER_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader">SENDER EMAIL<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $ew_email->SENDER_EMAIL->CellAttributes() ?>><span id="el_SENDER_EMAIL">
<input type="text" name="x_SENDER_EMAIL" id="x_SENDER_EMAIL" size="50" maxlength="100" value="<?php echo $ew_email->SENDER_EMAIL->EditValue ?>"<?php echo $ew_email->SENDER_EMAIL->EditAttributes() ?>>
</span><?php echo $ew_email->SENDER_EMAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($ew_email->RECIPIENT_EMAIL->Visible) { // RECIPIENT_EMAIL ?>
	<tr<?php echo $ew_email->RECIPIENT_EMAIL->RowAttributes ?>>
		<td class="ewTableHeader">RECIPIENT EMAIL<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $ew_email->RECIPIENT_EMAIL->CellAttributes() ?>><span id="el_RECIPIENT_EMAIL">
<input type="text" name="x_RECIPIENT_EMAIL" id="x_RECIPIENT_EMAIL" size="50" maxlength="100" value="<?php echo $ew_email->RECIPIENT_EMAIL->EditValue ?>"<?php echo $ew_email->RECIPIENT_EMAIL->EditAttributes() ?>>
</span><?php echo $ew_email->RECIPIENT_EMAIL->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_id" id="x_id" value="<?php echo ew_HtmlEncode($ew_email->id->CurrentValue) ?>">
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
class cew_email_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'ew_email';

	// Page Object Name
	var $PageObjName = 'ew_email_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $ew_email;
		if ($ew_email->UseTokenInUrl) $PageUrl .= "t=" . $ew_email->TableVar . "&"; // add page token
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
		global $objForm, $ew_email;
		if ($ew_email->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($ew_email->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($ew_email->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cew_email_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["ew_email"] = new cew_email();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'ew_email', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $ew_email;
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
			$this->Page_Terminate("ew_emaillist.php");
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
		global $objForm, $gsFormError, $ew_email;

		// Load key from QueryString
		if (@$_GET["id"] <> "")
			$ew_email->id->setQueryStringValue($_GET["id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$ew_email->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$ew_email->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$ew_email->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($ew_email->id->CurrentValue == "")
			$this->Page_Terminate("ew_emaillist.php"); // Invalid key, return to list
		switch ($ew_email->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("Không có dữ liệu"); // No record found
					$this->Page_Terminate("ew_emaillist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$ew_email->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Sửa đổi thành công"); // Update success
					$sReturnUrl = $ew_email->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "ew_emailview.php")
						$sReturnUrl = $ew_email->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$ew_email->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $ew_email;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $ew_email;
		$ew_email->SMTP_SERVER->setFormValue($objForm->GetValue("x_SMTP_SERVER"));
		$ew_email->SERVER_PORT->setFormValue($objForm->GetValue("x_SERVER_PORT"));
		$ew_email->SERVER_USERNAME->setFormValue($objForm->GetValue("x_SERVER_USERNAME"));
		$ew_email->SERVER_PASSWORD->setFormValue($objForm->GetValue("x_SERVER_PASSWORD"));
		$ew_email->SENDER_EMAIL->setFormValue($objForm->GetValue("x_SENDER_EMAIL"));
		$ew_email->RECIPIENT_EMAIL->setFormValue($objForm->GetValue("x_RECIPIENT_EMAIL"));
		$ew_email->id->setFormValue($objForm->GetValue("x_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $ew_email;
		$ew_email->id->CurrentValue = $ew_email->id->FormValue;
		$this->LoadRow();
		$ew_email->SMTP_SERVER->CurrentValue = $ew_email->SMTP_SERVER->FormValue;
		$ew_email->SERVER_PORT->CurrentValue = $ew_email->SERVER_PORT->FormValue;
		$ew_email->SERVER_USERNAME->CurrentValue = $ew_email->SERVER_USERNAME->FormValue;
		$ew_email->SERVER_PASSWORD->CurrentValue = $ew_email->SERVER_PASSWORD->FormValue;
		$ew_email->SENDER_EMAIL->CurrentValue = $ew_email->SENDER_EMAIL->FormValue;
		$ew_email->RECIPIENT_EMAIL->CurrentValue = $ew_email->RECIPIENT_EMAIL->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $ew_email;
		$sFilter = $ew_email->KeyFilter();

		// Call Row Selecting event
		$ew_email->Row_Selecting($sFilter);

		// Load sql based on filter
		$ew_email->CurrentFilter = $sFilter;
		$sSql = $ew_email->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$ew_email->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $ew_email;
		$ew_email->id->setDbValue($rs->fields('id'));
		$ew_email->SMTP_SERVER->setDbValue($rs->fields('SMTP_SERVER'));
		$ew_email->SERVER_PORT->setDbValue($rs->fields('SERVER_PORT'));
		$ew_email->SERVER_USERNAME->setDbValue($rs->fields('SERVER_USERNAME'));
		$ew_email->SERVER_PASSWORD->setDbValue($rs->fields('SERVER_PASSWORD'));
		$ew_email->SENDER_EMAIL->setDbValue($rs->fields('SENDER_EMAIL'));
		$ew_email->RECIPIENT_EMAIL->setDbValue($rs->fields('RECIPIENT_EMAIL'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $ew_email;

		// Call Row_Rendering event
		$ew_email->Row_Rendering();

		// Common render codes for all row types
		// SMTP_SERVER

		$ew_email->SMTP_SERVER->CellCssStyle = "";
		$ew_email->SMTP_SERVER->CellCssClass = "";

		// SERVER_PORT
		$ew_email->SERVER_PORT->CellCssStyle = "";
		$ew_email->SERVER_PORT->CellCssClass = "";

		// SERVER_USERNAME
		$ew_email->SERVER_USERNAME->CellCssStyle = "";
		$ew_email->SERVER_USERNAME->CellCssClass = "";

		// SERVER_PASSWORD
		$ew_email->SERVER_PASSWORD->CellCssStyle = "";
		$ew_email->SERVER_PASSWORD->CellCssClass = "";

		// SENDER_EMAIL
		$ew_email->SENDER_EMAIL->CellCssStyle = "";
		$ew_email->SENDER_EMAIL->CellCssClass = "";

		// RECIPIENT_EMAIL
		$ew_email->RECIPIENT_EMAIL->CellCssStyle = "";
		$ew_email->RECIPIENT_EMAIL->CellCssClass = "";
		if ($ew_email->RowType == EW_ROWTYPE_VIEW) { // View row

			// SMTP_SERVER
			$ew_email->SMTP_SERVER->ViewValue = $ew_email->SMTP_SERVER->CurrentValue;
			$ew_email->SMTP_SERVER->CssStyle = "";
			$ew_email->SMTP_SERVER->CssClass = "";
			$ew_email->SMTP_SERVER->ViewCustomAttributes = "";

			// SERVER_PORT
			$ew_email->SERVER_PORT->ViewValue = $ew_email->SERVER_PORT->CurrentValue;
			$ew_email->SERVER_PORT->CssStyle = "";
			$ew_email->SERVER_PORT->CssClass = "";
			$ew_email->SERVER_PORT->ViewCustomAttributes = "";

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->ViewValue = $ew_email->SERVER_USERNAME->CurrentValue;
			$ew_email->SERVER_USERNAME->CssStyle = "";
			$ew_email->SERVER_USERNAME->CssClass = "";
			$ew_email->SERVER_USERNAME->ViewCustomAttributes = "";

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->ViewValue = $ew_email->SERVER_PASSWORD->CurrentValue;
			$ew_email->SERVER_PASSWORD->CssStyle = "";
			$ew_email->SERVER_PASSWORD->CssClass = "";
			$ew_email->SERVER_PASSWORD->ViewCustomAttributes = "";

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->ViewValue = $ew_email->SENDER_EMAIL->CurrentValue;
			$ew_email->SENDER_EMAIL->CssStyle = "";
			$ew_email->SENDER_EMAIL->CssClass = "";
			$ew_email->SENDER_EMAIL->ViewCustomAttributes = "";

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->ViewValue = $ew_email->RECIPIENT_EMAIL->CurrentValue;
			$ew_email->RECIPIENT_EMAIL->CssStyle = "";
			$ew_email->RECIPIENT_EMAIL->CssClass = "";
			$ew_email->RECIPIENT_EMAIL->ViewCustomAttributes = "";

			// SMTP_SERVER
			$ew_email->SMTP_SERVER->HrefValue = "";

			// SERVER_PORT
			$ew_email->SERVER_PORT->HrefValue = "";

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->HrefValue = "";

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->HrefValue = "";

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->HrefValue = "";

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->HrefValue = "";
		} elseif ($ew_email->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// SMTP_SERVER
			$ew_email->SMTP_SERVER->EditCustomAttributes = "";
			$ew_email->SMTP_SERVER->EditValue = ew_HtmlEncode($ew_email->SMTP_SERVER->CurrentValue);

			// SERVER_PORT
			$ew_email->SERVER_PORT->EditCustomAttributes = "";
			$ew_email->SERVER_PORT->EditValue = ew_HtmlEncode($ew_email->SERVER_PORT->CurrentValue);

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->EditCustomAttributes = "";
			$ew_email->SERVER_USERNAME->EditValue = ew_HtmlEncode($ew_email->SERVER_USERNAME->CurrentValue);

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->EditCustomAttributes = "";
			$ew_email->SERVER_PASSWORD->EditValue = ew_HtmlEncode($ew_email->SERVER_PASSWORD->CurrentValue);

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->EditCustomAttributes = "";
			$ew_email->SENDER_EMAIL->EditValue = ew_HtmlEncode($ew_email->SENDER_EMAIL->CurrentValue);

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->EditCustomAttributes = "";
			$ew_email->RECIPIENT_EMAIL->EditValue = ew_HtmlEncode($ew_email->RECIPIENT_EMAIL->CurrentValue);

			// Edit refer script
			// SMTP_SERVER

			$ew_email->SMTP_SERVER->HrefValue = "";

			// SERVER_PORT
			$ew_email->SERVER_PORT->HrefValue = "";

			// SERVER_USERNAME
			$ew_email->SERVER_USERNAME->HrefValue = "";

			// SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->HrefValue = "";

			// SENDER_EMAIL
			$ew_email->SENDER_EMAIL->HrefValue = "";

			// RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->HrefValue = "";
		}

		// Call Row Rendered event
		$ew_email->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $ew_email;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($ew_email->SMTP_SERVER->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - SMTP SERVER";
		}
		if ($ew_email->SERVER_PORT->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - SERVER PORT";
		}
		if ($ew_email->SERVER_USERNAME->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - SERVER USERNAME";
		}
		if ($ew_email->SERVER_PASSWORD->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - SERVER PASSWORD";
		}
		if ($ew_email->SENDER_EMAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - SENDER EMAIL";
		}
		if ($ew_email->RECIPIENT_EMAIL->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - RECIPIENT EMAIL";
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
		global $conn, $Security, $ew_email;
		$sFilter = $ew_email->KeyFilter();
		$ew_email->CurrentFilter = $sFilter;
		$sSql = $ew_email->SQL();
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

			// Field SMTP_SERVER
			$ew_email->SMTP_SERVER->SetDbValueDef($ew_email->SMTP_SERVER->CurrentValue, "");
			$rsnew['SMTP_SERVER'] =& $ew_email->SMTP_SERVER->DbValue;

			// Field SERVER_PORT
			$ew_email->SERVER_PORT->SetDbValueDef($ew_email->SERVER_PORT->CurrentValue, "");
			$rsnew['SERVER_PORT'] =& $ew_email->SERVER_PORT->DbValue;

			// Field SERVER_USERNAME
			$ew_email->SERVER_USERNAME->SetDbValueDef($ew_email->SERVER_USERNAME->CurrentValue, "");
			$rsnew['SERVER_USERNAME'] =& $ew_email->SERVER_USERNAME->DbValue;

			// Field SERVER_PASSWORD
			$ew_email->SERVER_PASSWORD->SetDbValueDef($ew_email->SERVER_PASSWORD->CurrentValue, "");
			$rsnew['SERVER_PASSWORD'] =& $ew_email->SERVER_PASSWORD->DbValue;

			// Field SENDER_EMAIL
			$ew_email->SENDER_EMAIL->SetDbValueDef($ew_email->SENDER_EMAIL->CurrentValue, "");
			$rsnew['SENDER_EMAIL'] =& $ew_email->SENDER_EMAIL->DbValue;

			// Field RECIPIENT_EMAIL
			$ew_email->RECIPIENT_EMAIL->SetDbValueDef($ew_email->RECIPIENT_EMAIL->CurrentValue, "");
			$rsnew['RECIPIENT_EMAIL'] =& $ew_email->RECIPIENT_EMAIL->DbValue;

			// Call Row Updating event
			$bUpdateRow = $ew_email->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($ew_email->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($ew_email->CancelMessage <> "") {
					$this->setMessage($ew_email->CancelMessage);
					$ew_email->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$ew_email->Row_Updated($rsold, $rsnew);
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
