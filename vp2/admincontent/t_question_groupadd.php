<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_question_groupinfo.php" ?>
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
$t_question_group_add = new ct_question_group_add();
$Page =& $t_question_group_add;

// Page init processing
$t_question_group_add->Page_Init();

// Page main processing
$t_question_group_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_group_add = new ew_Page("t_question_group_add");

// page properties
t_question_group_add.PageID = "add"; // page ID
var EW_PAGE_ID = t_question_group_add.PageID; // for backward compatibility

// extend page with ValidateForm function
t_question_group_add.ValidateForm = function(fobj) {
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
t_question_group_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_group_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_group_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_group_add.ValidateRequired = false; // no JavaScript validation
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
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $t_question_group->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thêm nhóm câu hỏi</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>
<?php $t_question_group_add->ShowMessage() ?>
<form name="ft_question_groupadd" id="ft_question_groupadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return t_question_group_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_question_group">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_question_group->NAME->Visible) { // NAME ?>
	<tr<?php echo $t_question_group->NAME->RowAttributes ?>>
		<td class="ewTableHeader">Tên nhóm: </td>
		<td<?php echo $t_question_group->NAME->CellAttributes() ?>><span id="el_NAME">
<input type="text" name="x_NAME" id="x_NAME" size="30" maxlength="255" value="<?php echo $t_question_group->NAME->EditValue ?>"<?php echo $t_question_group->NAME->EditAttributes() ?>>
</span><?php echo $t_question_group->NAME->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($t_question_group->Description->Visible) { // Description ?>
	<tr<?php echo $t_question_group->Description->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả:</td>
		<td<?php echo $t_question_group->Description->CellAttributes() ?>><span id="el_Description">
<textarea name="x_Description" id="x_Description" cols="30" rows="3"<?php echo $t_question_group->Description->EditAttributes() ?>><?php echo $t_question_group->Description->EditValue ?></textarea>
</span><?php echo $t_question_group->Description->CustomMsg ?></td>
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
class ct_question_group_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 't_question_group';

	// Page Object Name
	var $PageObjName = 't_question_group_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question_group;
		if ($t_question_group->UseTokenInUrl) $PageUrl .= "t=" . $t_question_group->TableVar . "&"; // add page token
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
		global $objForm, $t_question_group;
		if ($t_question_group->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question_group->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question_group->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_group_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question_group"] = new ct_question_group();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question_group', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question_group;

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
		global $objForm, $gsFormError, $t_question_group;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["ID"] != "") {
		  $t_question_group->ID->setQueryStringValue($_GET["ID"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $t_question_group->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_question_group->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $t_question_group->CurrentAction = "C"; // Copy Record
		  } else {
		    $t_question_group->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($t_question_group->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("No records found"); // No record found
		      $this->Page_Terminate("t_question_grouplist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$t_question_group->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Add succeeded"); // Set up success message
					$sReturnUrl = $t_question_group->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "t_question_groupview.php")
						$sReturnUrl = $t_question_group->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$t_question_group->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_question_group;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_question_group;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_question_group;
		$t_question_group->NAME->setFormValue($objForm->GetValue("x_NAME"));
		$t_question_group->Description->setFormValue($objForm->GetValue("x_Description"));
		$t_question_group->ID->setFormValue($objForm->GetValue("x_ID"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_question_group;
		$t_question_group->ID->CurrentValue = $t_question_group->ID->FormValue;
		$t_question_group->NAME->CurrentValue = $t_question_group->NAME->FormValue;
		$t_question_group->Description->CurrentValue = $t_question_group->Description->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question_group;
		$sFilter = $t_question_group->KeyFilter();

		// Call Row Selecting event
		$t_question_group->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question_group->CurrentFilter = $sFilter;
		$sSql = $t_question_group->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question_group->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question_group;
		$t_question_group->ID->setDbValue($rs->fields('ID'));
		$t_question_group->NAME->setDbValue($rs->fields('NAME'));
		$t_question_group->Description->setDbValue($rs->fields('Description'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question_group;

		// Call Row_Rendering event
		$t_question_group->Row_Rendering();

		// Common render codes for all row types
		// NAME

		$t_question_group->NAME->CellCssStyle = "";
		$t_question_group->NAME->CellCssClass = "";

		// Description
		$t_question_group->Description->CellCssStyle = "";
		$t_question_group->Description->CellCssClass = "";
		if ($t_question_group->RowType == EW_ROWTYPE_VIEW) { // View row

			// ID
			$t_question_group->ID->ViewValue = $t_question_group->ID->CurrentValue;
			$t_question_group->ID->CssStyle = "";
			$t_question_group->ID->CssClass = "";
			$t_question_group->ID->ViewCustomAttributes = "";

			// NAME
			$t_question_group->NAME->ViewValue = $t_question_group->NAME->CurrentValue;
			$t_question_group->NAME->CssStyle = "";
			$t_question_group->NAME->CssClass = "";
			$t_question_group->NAME->ViewCustomAttributes = "";

			// Description
			$t_question_group->Description->ViewValue = $t_question_group->Description->CurrentValue;
			$t_question_group->Description->CssStyle = "";
			$t_question_group->Description->CssClass = "";
			$t_question_group->Description->ViewCustomAttributes = "";

			// NAME
			$t_question_group->NAME->HrefValue = "";

			// Description
			$t_question_group->Description->HrefValue = "";
		} elseif ($t_question_group->RowType == EW_ROWTYPE_ADD) { // Add row

			// NAME
			$t_question_group->NAME->EditCustomAttributes = "";
			$t_question_group->NAME->EditValue = ew_HtmlEncode($t_question_group->NAME->CurrentValue);

			// Description
			$t_question_group->Description->EditCustomAttributes = "";
			$t_question_group->Description->EditValue = ew_HtmlEncode($t_question_group->Description->CurrentValue);
		}

		// Call Row Rendered event
		$t_question_group->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_question_group;

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
		global $conn, $Security, $t_question_group;
		$rsnew = array();

		// Field NAME
		$t_question_group->NAME->SetDbValueDef($t_question_group->NAME->CurrentValue, NULL);
		$rsnew['NAME'] =& $t_question_group->NAME->DbValue;

		// Field Description
		$t_question_group->Description->SetDbValueDef($t_question_group->Description->CurrentValue, NULL);
		$rsnew['Description'] =& $t_question_group->Description->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_question_group->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_question_group->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_question_group->CancelMessage <> "") {
				$this->setMessage($t_question_group->CancelMessage);
				$t_question_group->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_question_group->ID->setDbValue($conn->Insert_ID());
			$rsnew['ID'] =& $t_question_group->ID->DbValue;

			// Call Row Inserted event
			$t_question_group->Row_Inserted($rsnew);
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
