<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_cat_questioninfo.php" ?>
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
$t_cat_question_add = new ct_cat_question_add();
$Page =& $t_cat_question_add;

// Page init processing
$t_cat_question_add->Page_Init();

// Page main processing
$t_cat_question_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_cat_question_add = new ew_Page("t_cat_question_add");

// page properties
t_cat_question_add.PageID = "add"; // page ID
var EW_PAGE_ID = t_cat_question_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_cat_question_add.ValidateForm = function(fobj) {
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
t_cat_question_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_cat_question_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_cat_question_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_cat_question_add.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $t_cat_question->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm danh mục</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $t_cat_question_add->ShowMessage() ?>
<form name="ft_cat_questionadd" id="ft_cat_questionadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_cat_question_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_cat_question">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_cat_question->name->Visible) { // name ?>
	<tr<?php echo $t_cat_question->name->RowAttributes ?>>
		<td class="ewTableHeader">Tên danh mục</td>
		<td<?php echo $t_cat_question->name->CellAttributes() ?>><span id="el_name">
<input type="text" name="x_name" id="x_name" size="30" maxlength="255" value="<?php echo $t_cat_question->name->EditValue ?>"<?php echo $t_cat_question->name->EditAttributes() ?>>
</span><?php echo $t_cat_question->name->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_cat_question->position->Visible) { // position ?>
    <tr<?php echo $t_cat_question->position->RowAttributes ?>>
        <td class="ewTableHeader">Vị trí</td>
        <td<?php echo $t_cat_question->position->CellAttributes() ?>><span id="el_position">
        <input type="text" name="x_position" id="x_position" size="30" value="<?php echo $t_cat_question->position->EditValue ?>"<?php echo $t_cat_question->position->EditAttributes() ?>>
        </span><?php echo $t_cat_question->position->CustomMsg ?></td>
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
class ct_cat_question_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 't_cat_question';

	// Page Object Name
	var $PageObjName = 't_cat_question_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_cat_question;
		if ($t_cat_question->UseTokenInUrl) $PageUrl .= "t=" . $t_cat_question->TableVar . "&"; // add page token
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
		global $objForm, $t_cat_question;
		if ($t_cat_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_cat_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_cat_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_cat_question_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_question"] = new ct_cat_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_cat_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_cat_question;

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
		global $objForm, $gsFormError, $t_cat_question;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["cat_question_id"] != "") {
		  $t_cat_question->cat_question_id->setQueryStringValue($_GET["cat_question_id"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_cat_question->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_cat_question->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_cat_question->CurrentAction = "C"; // Copy Record
		  } else {
		    $t_cat_question->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_cat_question->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("No records found"); // No record found
		      $this->Page_Terminate("t_cat_questionlist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_cat_question->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Add succeeded"); // Set up success message
					$sReturnUrl = $t_cat_question->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_cat_questionview.php")
						$sReturnUrl = $t_cat_question->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_cat_question->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_cat_question;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_cat_question;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_cat_question;
		$t_cat_question->name->setFormValue($objForm->GetValue("x_name"));
                $t_cat_question->position->setFormValue($objForm->GetValue("x_position"));
		$t_cat_question->cat_question_id->setFormValue($objForm->GetValue("x_cat_question_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_cat_question;
		$t_cat_question->cat_question_id->CurrentValue = $t_cat_question->cat_question_id->FormValue;
		$t_cat_question->name->CurrentValue = $t_cat_question->name->FormValue;
                $t_cat_question->position->CurrentValue = $t_cat_question->position->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_cat_question;
		$sFilter = $t_cat_question->KeyFilter();

		// Call Row Selecting event
		$t_cat_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_cat_question->CurrentFilter = $sFilter;
		$sSql = $t_cat_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_cat_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_cat_question;
		$t_cat_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_cat_question->name->setDbValue($rs->fields('name'));
                $t_cat_question->position->setDbValue($rs->fields('position'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_cat_question;

		// Call Row_Rendering event
		$t_cat_question->Row_Rendering();

		// Common render codes for all row types
		// name

		$t_cat_question->name->CellCssStyle = "";
		$t_cat_question->name->CellCssClass = "";
                // position
		$t_cat_question->position->CellCssStyle = "";
		$t_cat_question->position->CellCssClass = "";
		if ($t_cat_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// cat_question_id
			$t_cat_question->cat_question_id->ViewValue = $t_cat_question->cat_question_id->CurrentValue;
			$t_cat_question->cat_question_id->CssStyle = "";
			$t_cat_question->cat_question_id->CssClass = "";
			$t_cat_question->cat_question_id->ViewCustomAttributes = "";

			// name
			$t_cat_question->name->ViewValue = $t_cat_question->name->CurrentValue;
			$t_cat_question->name->CssStyle = "";
			$t_cat_question->name->CssClass = "";
			$t_cat_question->name->ViewCustomAttributes = "";
                        
                        // position
			$t_cat_question->position->ViewValue = $t_cat_question->position->CurrentValue;
			$t_cat_question->position->CssStyle = "";
			$t_cat_question->position->CssClass = "";
			$t_cat_question->position->ViewCustomAttributes = "";

			// name
			$t_cat_question->name->HrefValue = "";
		} elseif ($t_cat_question->RowType == EW_ROWTYPE_ADD) { // Add row

			// name
			$t_cat_question->name->EditCustomAttributes = "";
			$t_cat_question->name->EditValue = ew_HtmlEncode($t_cat_question->name->CurrentValue);
                        
                        // position
			$t_cat_question->position->EditCustomAttributes = "";
			$t_cat_question->position->EditValue = ew_HtmlEncode($t_cat_question->position->CurrentValue);
		}

		// Call Row Rendered event
		$t_cat_question->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_cat_question;

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

	// Add record
	function AddRow() {
		global $conn, $Security, $t_cat_question;
		$rsnew = array();

		// Field name
		$t_cat_question->name->SetDbValueDef($t_cat_question->name->CurrentValue, NULL);
		$rsnew['name'] =& $t_cat_question->name->DbValue;
                
                // Field position
		$t_cat_question->position->SetDbValueDef($t_cat_question->position->CurrentValue, NULL);
		$rsnew['position'] =& $t_cat_question->position->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_cat_question->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_cat_question->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_cat_question->CancelMessage <> "") {
				$this->setMessage($t_cat_question->CancelMessage);
				$t_cat_question->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_cat_question->cat_question_id->setDbValue($conn->Insert_ID());
			$rsnew['cat_question_id'] =& $t_cat_question->cat_question_id->DbValue;

			// Call Row Inserted event
			$t_cat_question->Row_Inserted($rsnew);
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
