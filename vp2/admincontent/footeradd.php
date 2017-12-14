<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "footerinfo.php" ?>
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
$footer_add = new cfooter_add();
$Page =& $footer_add;

// Page init processing
$footer_add->Page_Init();

// Page main processing
$footer_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var footer_add = new ew_Page("footer_add");

// page properties
footer_add.PageID = "add"; // page ID
var EW_PAGE_ID = footer_add.PageID; // for backward compatibility

// extend page with ValidateForm function
footer_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_noi_dung"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - Noi Dung");
		elm = fobj.elements["x" + infix + "_f_value"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - F Value");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
footer_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
<?php if (EW_CLIENT_VALIDATE) { ?>
footer_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
footer_add.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<p><span class="phpmaker">Add to TABLE: Footer<br><br>
<a href="<?php echo $footer->getReturnUrl() ?>">Go Back</a></span></p>
<?php $footer_add->ShowMessage() ?>
<form name="ffooteradd" id="ffooteradd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return footer_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="footer">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($footer->noi_dung->Visible) { // noi_dung ?>
	<tr<?php echo $footer->noi_dung->RowAttributes ?>>
		<td class="ewTableHeader">Noi Dung<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $footer->noi_dung->CellAttributes() ?>><span id="el_noi_dung">
<textarea name="x_noi_dung" id="x_noi_dung" cols="35" rows="4"<?php echo $footer->noi_dung->EditAttributes() ?>><?php echo $footer->noi_dung->EditValue ?></textarea>
</span><?php echo $footer->noi_dung->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($footer->f_value->Visible) { // f_value ?>
	<tr<?php echo $footer->f_value->RowAttributes ?>>
		<td class="ewTableHeader">F Value<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $footer->f_value->CellAttributes() ?>><span id="el_f_value">
<input type="text" name="x_f_value" id="x_f_value" size="30" maxlength="20" value="<?php echo $footer->f_value->EditValue ?>"<?php echo $footer->f_value->EditAttributes() ?>>
</span><?php echo $footer->f_value->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Add    ">
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
class cfooter_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'footer';

	// Page Object Name
	var $PageObjName = 'footer_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $footer;
		if ($footer->UseTokenInUrl) $PageUrl .= "t=" . $footer->TableVar . "&"; // add page token
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
		global $objForm, $footer;
		if ($footer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($footer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($footer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cfooter_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["footer"] = new cfooter();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'footer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $footer;

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
		global $objForm, $gsFormError, $footer;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["footer_id"] != "") {
		  $footer->footer_id->setQueryStringValue($_GET["footer_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $footer->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$footer->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $footer->CurrentAction = "C"; // Copy Record
		  } else {
		    $footer->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($footer->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("footerlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$footer->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm mới thành công"); // Set up success message
					$sReturnUrl = $footer->getReturnUrl();
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$footer->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $footer;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $footer;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $footer;
		$footer->noi_dung->setFormValue($objForm->GetValue("x_noi_dung"));
		$footer->f_value->setFormValue($objForm->GetValue("x_f_value"));
		$footer->footer_id->setFormValue($objForm->GetValue("x_footer_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $footer;
		$footer->footer_id->CurrentValue = $footer->footer_id->FormValue;
		$footer->noi_dung->CurrentValue = $footer->noi_dung->FormValue;
		$footer->f_value->CurrentValue = $footer->f_value->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $footer;
		$sFilter = $footer->KeyFilter();

		// Call Row Selecting event
		$footer->Row_Selecting($sFilter);

		// Load sql based on filter
		$footer->CurrentFilter = $sFilter;
		$sSql = $footer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$footer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $footer;
		$footer->footer_id->setDbValue($rs->fields('footer_id'));
		$footer->noi_dung->setDbValue($rs->fields('noi_dung'));
		$footer->f_value->setDbValue($rs->fields('f_value'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $footer;

		// Call Row_Rendering event
		$footer->Row_Rendering();

		// Common render codes for all row types
		// noi_dung

		$footer->noi_dung->CellCssStyle = "";
		$footer->noi_dung->CellCssClass = "";

		// f_value
		$footer->f_value->CellCssStyle = "";
		$footer->f_value->CellCssClass = "";
		if ($footer->RowType == EW_ROWTYPE_VIEW) { // View row

			// noi_dung
			$footer->noi_dung->ViewValue = $footer->noi_dung->CurrentValue;
			$footer->noi_dung->CssStyle = "";
			$footer->noi_dung->CssClass = "";
			$footer->noi_dung->ViewCustomAttributes = "";

			// f_value
			$footer->f_value->ViewValue = $footer->f_value->CurrentValue;
			$footer->f_value->CssStyle = "";
			$footer->f_value->CssClass = "";
			$footer->f_value->ViewCustomAttributes = "";

			// noi_dung
			$footer->noi_dung->HrefValue = "";

			// f_value
			$footer->f_value->HrefValue = "";
		} elseif ($footer->RowType == EW_ROWTYPE_ADD) { // Add row

			// noi_dung
			$footer->noi_dung->EditCustomAttributes = "";
			$footer->noi_dung->EditValue = ew_HtmlEncode($footer->noi_dung->CurrentValue);

			// f_value
			$footer->f_value->EditCustomAttributes = "";
			$footer->f_value->EditValue = ew_HtmlEncode($footer->f_value->CurrentValue);
		}

		// Call Row Rendered event
		$footer->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $footer;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($footer->noi_dung->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Noi Dung";
		}
		if ($footer->f_value->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - F Value";
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
		global $conn, $Security, $footer;
		$rsnew = array();

		// Field noi_dung
		$footer->noi_dung->SetDbValueDef($footer->noi_dung->CurrentValue, "");
		$rsnew['noi_dung'] =& $footer->noi_dung->DbValue;

		// Field f_value
		$footer->f_value->SetDbValueDef($footer->f_value->CurrentValue, "");
		$rsnew['f_value'] =& $footer->f_value->DbValue;

		// Call Row Inserting event
		$bInsertRow = $footer->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($footer->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($footer->CancelMessage <> "") {
				$this->setMessage($footer->CancelMessage);
				$footer->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$footer->footer_id->setDbValue($conn->Insert_ID());
			$rsnew['footer_id'] =& $footer->footer_id->DbValue;

			// Call Row Inserted event
			$footer->Row_Inserted($rsnew);
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
