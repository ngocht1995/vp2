<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "payment_accountinfo.php" ?>
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
$payment_account_add = new cpayment_account_add();
$Page =& $payment_account_add;

// Page init processing
$payment_account_add->Page_Init();

// Page main processing
$payment_account_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var payment_account_add = new ew_Page("payment_account_add");

// page properties
payment_account_add.PageID = "add"; // page ID
var EW_PAGE_ID = payment_account_add.PageID; // for backward compatibility

// extend page with ValidateForm function
payment_account_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_user_account"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Tên tài khoản");
		elm = fobj.elements["x" + infix + "_payment_account_type"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Loại tài khoản");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
payment_account_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
payment_account_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
payment_account_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
payment_account_add.ValidateRequired = false; // no JavaScript validation
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
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<a href="<?php echo $payment_account->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm tài khoản giao dịch</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $payment_account_add->ShowMessage() ?>
<form name="fpayment_accountadd" id="fpayment_accountadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return payment_account_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="payment_account">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($payment_account->user_account->Visible) { // user_account ?>
	<tr<?php echo $payment_account->user_account->RowAttributes ?>>
		<td class="ewTableHeader">Tên tài khoản<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $payment_account->user_account->CellAttributes() ?>><span id="el_user_account">
<input type="text" name="x_user_account" id="x_user_account" size="30" maxlength="100" value="<?php echo $payment_account->user_account->EditValue ?>"<?php echo $payment_account->user_account->EditAttributes() ?>>
</span><?php echo $payment_account->user_account->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($payment_account->payment_account_type->Visible) { // payment_account_type ?>
	<tr<?php echo $payment_account->payment_account_type->RowAttributes ?>>
		<td class="ewTableHeader">Loại tài khoản<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $payment_account->payment_account_type->CellAttributes() ?>><span id="el_payment_account_type">
<select id="x_payment_account_type" name="x_payment_account_type"<?php echo $payment_account->payment_account_type->EditAttributes() ?>>
<?php
if (is_array($payment_account->payment_account_type->EditValue)) {
	$arwrk = $payment_account->payment_account_type->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($payment_account->payment_account_type->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $payment_account->payment_account_type->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Thêm    ">
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
class cpayment_account_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'payment_account';

	// Page Object Name
	var $PageObjName = 'payment_account_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $payment_account;
		if ($payment_account->UseTokenInUrl) $PageUrl .= "t=" . $payment_account->TableVar . "&"; // add page token
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
		global $objForm, $payment_account;
		if ($payment_account->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($payment_account->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($payment_account->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cpayment_account_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["payment_account"] = new cpayment_account();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'payment_account', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $payment_account;
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
		if (!$Security->CanAdd()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("payment_accountlist.php");
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
	var $x_ewPriv = 0;

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $payment_account;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["payment_account_id"] != "") {
		  $payment_account->payment_account_id->setQueryStringValue($_GET["payment_account_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $payment_account->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$payment_account->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $payment_account->CurrentAction = "C"; // Copy Record
		  } else {
		    $payment_account->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($payment_account->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("payment_accountlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$payment_account->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm tài khoản thành công"); // Set up success message
					$sReturnUrl = $payment_account->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "payment_accountview.php")
						$sReturnUrl = $payment_account->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$payment_account->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $payment_account;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $payment_account;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $payment_account;
		$payment_account->user_account->setFormValue($objForm->GetValue("x_user_account"));
		$payment_account->payment_account_type->setFormValue($objForm->GetValue("x_payment_account_type"));
		$payment_account->payment_account_id->setFormValue($objForm->GetValue("x_payment_account_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $payment_account;
		$payment_account->payment_account_id->CurrentValue = $payment_account->payment_account_id->FormValue;
                $payment_account->user_id->CurrentValue = $payment_account->user_id->FormValue;
		$payment_account->user_account->CurrentValue = $payment_account->user_account->FormValue;
		$payment_account->payment_account_type->CurrentValue = $payment_account->payment_account_type->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $payment_account;
		$sFilter = $payment_account->KeyFilter();

		// Call Row Selecting event
		$payment_account->Row_Selecting($sFilter);

		// Load sql based on filter
		$payment_account->CurrentFilter = $sFilter;
		$sSql = $payment_account->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$payment_account->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $payment_account;
		$payment_account->payment_account_id->setDbValue($rs->fields('payment_account_id'));
		$payment_account->user_id->setDbValue($rs->fields('user_id'));
		$payment_account->user_account->setDbValue($rs->fields('user_account'));
		$payment_account->payment_account_type->setDbValue($rs->fields('payment_account_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $payment_account;

		// Call Row_Rendering event
		$payment_account->Row_Rendering();

		// Common render codes for all row types
		// user_account

		$payment_account->user_account->CellCssStyle = "";
		$payment_account->user_account->CellCssClass = "";

		// payment_account_type
		$payment_account->payment_account_type->CellCssStyle = "";
		$payment_account->payment_account_type->CellCssClass = "";
		if ($payment_account->RowType == EW_ROWTYPE_VIEW) { // View row

			// user_account
			$payment_account->user_account->ViewValue = $payment_account->user_account->CurrentValue;
			$payment_account->user_account->CssStyle = "";
			$payment_account->user_account->CssClass = "";
			$payment_account->user_account->ViewCustomAttributes = "";

			// payment_account_type
			if (strval($payment_account->payment_account_type->CurrentValue) <> "") {
				switch ($payment_account->payment_account_type->CurrentValue) {
					case "1":
						$payment_account->payment_account_type->ViewValue = "Tai khoan Ngan luong";
						break;
					default:
						$payment_account->payment_account_type->ViewValue = $payment_account->payment_account_type->CurrentValue;
				}
			} else {
				$payment_account->payment_account_type->ViewValue = NULL;
			}
			$payment_account->payment_account_type->CssStyle = "";
			$payment_account->payment_account_type->CssClass = "";
			$payment_account->payment_account_type->ViewCustomAttributes = "";

			// user_account
			$payment_account->user_account->HrefValue = "";

			// payment_account_type
			$payment_account->payment_account_type->HrefValue = "";
		} elseif ($payment_account->RowType == EW_ROWTYPE_ADD) { // Add row

			// user_account
			$payment_account->user_account->EditCustomAttributes = "";
			$payment_account->user_account->EditValue = ew_HtmlEncode($payment_account->user_account->CurrentValue);

			// payment_account_type
			$payment_account->payment_account_type->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Tài khoản Ngân lượng");
			array_unshift($arwrk, array("", "Chọn"));
			$payment_account->payment_account_type->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$payment_account->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $payment_account;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($payment_account->user_account->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Acount";
		}
		if ($payment_account->payment_account_type->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Payment Account Type";
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

	// Add record
	function AddRow() {
		global $conn, $Security, $payment_account;
		$rsnew = array();

                // Field payment_account_type
		$payment_account->user_id->SetDbValueDef($payment_account->user_id->CurrentValue, $Security->CurrentUserID());
		$rsnew['user_id'] =& $payment_account->user_id->DbValue;

		// Field user_account
		$payment_account->user_account->SetDbValueDef($payment_account->user_account->CurrentValue, "");
		$rsnew['user_account'] =& $payment_account->user_account->DbValue;

		// Field payment_account_type
		$payment_account->payment_account_type->SetDbValueDef($payment_account->payment_account_type->CurrentValue, 0);
		$rsnew['payment_account_type'] =& $payment_account->payment_account_type->DbValue;

		// Call Row Inserting event
		$bInsertRow = $payment_account->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($payment_account->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($payment_account->CancelMessage <> "") {
				$this->setMessage($payment_account->CancelMessage);
				$payment_account->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$payment_account->payment_account_id->setDbValue($conn->Insert_ID());
			$rsnew['payment_account_id'] =& $payment_account->payment_account_id->DbValue;

			// Call Row Inserted event
			$payment_account->Row_Inserted($rsnew);
		}
		return $AddRow;
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
