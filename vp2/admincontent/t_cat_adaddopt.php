<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_cat_adinfo.php" ?>
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
$t_cat_ad_addopt = new ct_cat_ad_addopt();
$Page =& $t_cat_ad_addopt;

// Page init processing
$t_cat_ad_addopt->Page_Init();

// Page main processing
$t_cat_ad_addopt->Page_Main();
?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php $t_cat_ad_addopt->ShowMessage() ?>
<form name="ft_cat_adaddopt" id="ft_cat_adaddopt" action="t_cat_adaddopt.php" method="post" onsubmit="return t_cat_ad_addopt.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="t_cat_ad">
<input type="hidden" name="a_addopt" id="a_addopt" value="A">
<table class="ewTableAddOpt">
	<tr>
		<td>Parentid</td>
		<td><span id="el_parentid">
<select id="x_parentid" name="x_parentid"<?php echo $t_cat_ad->parentid->EditAttributes() ?>>
<?php
if (is_array($t_cat_ad->parentid->EditValue)) {
	$arwrk = $t_cat_ad->parentid->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_cat_ad->parentid->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
<?php
$sSqlWrk = "SELECT `ad_catID`, `name`, '' AS Disp2Fld FROM `t_cat_ad`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_parentid" id="s_x_parentid" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_parentid" id="lft_x_parentid" value="">
</span></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><span id="el_name">
<input type="text" name="x_name" id="x_name" size="30" maxlength="255" value="<?php echo $t_cat_ad->name->EditValue ?>"<?php echo $t_cat_ad->name->EditAttributes() ?>>
</span></td>
	</tr>
</table>
<p>
<!-- <input type="submit" name="btnAction" id="btnAction" value="    Add    "> -->
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php

//
// Page Class
//
class ct_cat_ad_addopt {

	// Page ID
	var $PageID = 'addopt';

	// Table Name
	var $TableName = 't_cat_ad';

	// Page Object Name
	var $PageObjName = 't_cat_ad_addopt';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_cat_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_cat_ad;
		if ($t_cat_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_cat_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_cat_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_cat_ad_addopt() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_ad"] = new ct_cat_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'addopt', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_cat_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_cat_ad;

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
		global $objForm, $gsFormError, $t_cat_ad;

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if ($objForm->GetValue("a_addopt") <> "") {
			$t_cat_ad->CurrentAction = $objForm->GetValue("a_addopt"); // Get form action
			$this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$t_cat_ad->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
			$t_cat_ad->CurrentAction = "I"; // Display Blank Record
			$this->LoadDefaultValues(); // Load default values
		}

		// Perform action based on action code
		switch ($t_cat_ad->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "A": // Add new record
				$t_cat_ad->SendEmail = TRUE; // Send email on add success
				if ($this->AddRow()) { // Add successful
					$XMLDoc = new cXMLDocument("root");
					$XMLDoc->Encoding = "utf-8";
					$XMLDoc->BeginRow("result");
					$XMLDoc->AddField("x_ad_catID", strval($t_cat_ad->ad_catID->DbValue));
					$XMLDoc->AddField("x_parentid", strval($t_cat_ad->parentid->FormValue));
					$XMLDoc->AddField("x_name", strval($t_cat_ad->name->FormValue));
					$XMLDoc->AddField("x_cat_order", strval($t_cat_ad->cat_order->FormValue));
					$XMLDoc->AddField("x_status", strval($t_cat_ad->status->FormValue));
					$XMLDoc->AddField("x_cat_descript", strval($t_cat_ad->cat_descript->FormValue));
					$XMLDoc->AddField("x_cat_icon", strval($t_cat_ad->cat_icon->FormValue));
					$XMLDoc->EndRow();
					ob_end_clean();
					header("Content-Type: text/xml");
					echo $XMLDoc->XML();
					$this->Page_Terminate();
					exit();
				} else {
					$this->RestoreFormValues(); // Add failed, restore form values
				}
		}

		// Render row
		$t_cat_ad->RowType = EW_ROWTYPE_ADD; // Render add type
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $t_cat_ad;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $t_cat_ad;
		$t_cat_ad->parentid->CurrentValue = 0;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $t_cat_ad;
		$t_cat_ad->parentid->setFormValue(ew_ConvertFromUtf8($objForm->GetValue("x_parentid")));
		$t_cat_ad->name->setFormValue(ew_ConvertFromUtf8($objForm->GetValue("x_name")));
		$t_cat_ad->ad_catID->setFormValue(ew_ConvertFromUtf8($objForm->GetValue("x_ad_catID")));
	}

	// Restore form values
	function RestoreFormValues() {
		global $t_cat_ad;
		$t_cat_ad->ad_catID->CurrentValue = ew_ConvertToUtf8($t_cat_ad->ad_catID->FormValue);
		$t_cat_ad->parentid->CurrentValue = ew_ConvertToUtf8($t_cat_ad->parentid->FormValue);
		$t_cat_ad->name->CurrentValue = ew_ConvertToUtf8($t_cat_ad->name->FormValue);
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_cat_ad;
		$sFilter = $t_cat_ad->KeyFilter();

		// Call Row Selecting event
		$t_cat_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_cat_ad->CurrentFilter = $sFilter;
		$sSql = $t_cat_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_cat_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_cat_ad;
		$t_cat_ad->ad_catID->setDbValue($rs->fields('ad_catID'));
		$t_cat_ad->parentid->setDbValue($rs->fields('parentid'));
		$t_cat_ad->name->setDbValue($rs->fields('name'));
		$t_cat_ad->cat_order->setDbValue($rs->fields('cat_order'));
		$t_cat_ad->status->setDbValue($rs->fields('status'));
		$t_cat_ad->cat_descript->setDbValue($rs->fields('cat_descript'));
		$t_cat_ad->cat_icon->Upload->DbValue = $rs->fields('cat_icon');
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_cat_ad;

		// Call Row_Rendering event
		$t_cat_ad->Row_Rendering();

		// Common render codes for all row types
		// parentid

		$t_cat_ad->parentid->CellCssStyle = "";
		$t_cat_ad->parentid->CellCssClass = "";

		// name
		$t_cat_ad->name->CellCssStyle = "";
		$t_cat_ad->name->CellCssClass = "";
		if ($t_cat_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_catID
			$t_cat_ad->ad_catID->ViewValue = $t_cat_ad->ad_catID->CurrentValue;
			$t_cat_ad->ad_catID->CssStyle = "";
			$t_cat_ad->ad_catID->CssClass = "";
			$t_cat_ad->ad_catID->ViewCustomAttributes = "";

			// parentid
			if (strval($t_cat_ad->parentid->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_cat_ad->parentid->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_cat_ad->parentid->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_cat_ad->parentid->ViewValue = $t_cat_ad->parentid->CurrentValue;
				}
			} else {
				$t_cat_ad->parentid->ViewValue = NULL;
			}
			$t_cat_ad->parentid->CssStyle = "";
			$t_cat_ad->parentid->CssClass = "";
			$t_cat_ad->parentid->ViewCustomAttributes = "";

			// name
			$t_cat_ad->name->ViewValue = $t_cat_ad->name->CurrentValue;
			$t_cat_ad->name->CssStyle = "";
			$t_cat_ad->name->CssClass = "";
			$t_cat_ad->name->ViewCustomAttributes = "";

			// cat_order
			$t_cat_ad->cat_order->ViewValue = $t_cat_ad->cat_order->CurrentValue;
			$t_cat_ad->cat_order->CssStyle = "";
			$t_cat_ad->cat_order->CssClass = "";
			$t_cat_ad->cat_order->ViewCustomAttributes = "";

			// status
			if (strval($t_cat_ad->status->CurrentValue) <> "") {
				switch ($t_cat_ad->status->CurrentValue) {
					case "0":
						$t_cat_ad->status->ViewValue = "Chua";
						break;
					case "1":
						$t_cat_ad->status->ViewValue = "Kích ho?t";
						break;
					default:
						$t_cat_ad->status->ViewValue = $t_cat_ad->status->CurrentValue;
				}
			} else {
				$t_cat_ad->status->ViewValue = NULL;
			}
			$t_cat_ad->status->CssStyle = "";
			$t_cat_ad->status->CssClass = "";
			$t_cat_ad->status->ViewCustomAttributes = "";

			// parentid
			$t_cat_ad->parentid->HrefValue = "";

			// name
			$t_cat_ad->name->HrefValue = "";
		} elseif ($t_cat_ad->RowType == EW_ROWTYPE_ADD) { // Add row

			// parentid
			$t_cat_ad->parentid->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `ad_catID`, `name`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_cat_ad`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Please Select"));
			$t_cat_ad->parentid->EditValue = $arwrk;

			// name
			$t_cat_ad->name->EditCustomAttributes = "";
			$t_cat_ad->name->EditValue = ew_HtmlEncode($t_cat_ad->name->CurrentValue);
		}

		// Call Row Rendered event
		$t_cat_ad->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $t_cat_ad;

		// Initialize
		$gsFormError = "";

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
		global $conn, $Security, $t_cat_ad;
		$rsnew = array();

		// Field parentid
		$t_cat_ad->parentid->SetDbValueDef($t_cat_ad->parentid->CurrentValue, NULL);
		$rsnew['parentid'] =& $t_cat_ad->parentid->DbValue;

		// Field name
		$t_cat_ad->name->SetDbValueDef($t_cat_ad->name->CurrentValue, NULL);
		$rsnew['name'] =& $t_cat_ad->name->DbValue;

		// Call Row Inserting event
		$bInsertRow = $t_cat_ad->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($t_cat_ad->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($t_cat_ad->CancelMessage <> "") {
				$this->setMessage($t_cat_ad->CancelMessage);
				$t_cat_ad->CancelMessage = "";
			} else {
				$this->setMessage("Insert cancelled");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$t_cat_ad->ad_catID->setDbValue($conn->Insert_ID());
			$rsnew['ad_catID'] =& $t_cat_ad->ad_catID->DbValue;

			// Call Row Inserted event
			$t_cat_ad->Row_Inserted($rsnew);
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

	// Custom validate event
	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
