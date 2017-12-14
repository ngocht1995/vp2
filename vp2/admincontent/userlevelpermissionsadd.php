<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userlevelpermissionsinfo.php" ?>
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
$userlevelpermissions_add = new cuserlevelpermissions_add();
$Page =& $userlevelpermissions_add;

// Page init processing
$userlevelpermissions_add->Page_Init();

// Page main processing
$userlevelpermissions_add->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userlevelpermissions_add = new ew_Page("userlevelpermissions_add");

// page properties
userlevelpermissions_add.PageID = "add"; // page ID
var EW_PAGE_ID = userlevelpermissions_add.PageID; // for backward compatibility

// extend page with ValidateForm function
userlevelpermissions_add.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_UserLevelID"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - User Level ID");
		elm = fobj.elements["x" + infix + "_UserLevelTableName"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - User Level Table Name");
		elm = fobj.elements["x" + infix + "_UserLevelPermission"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy nhập trường bắt buộc - User Level Permission");
		elm = fobj.elements["x" + infix + "_UserLevelPermission"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - User Level Permission");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
userlevelpermissions_add.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevelpermissions_add.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevelpermissions_add.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevelpermissions_add.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">Add to TABLE: Userlevelpermissions<br><br>
<a href="<?php echo $userlevelpermissions->getReturnUrl() ?>">Go Back</a></span></p>
<?php $userlevelpermissions_add->ShowMessage() ?>
<form name="fuserlevelpermissionsadd" id="fuserlevelpermissionsadd" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return userlevelpermissions_add.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="userlevelpermissions">
<input type="hidden" name="a_add" id="a_add" value="A">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($userlevelpermissions->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $userlevelpermissions->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">User Level ID<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $userlevelpermissions->UserLevelID->CellAttributes() ?>><span id="el_UserLevelID">
<select id="x_UserLevelID" name="x_UserLevelID"<?php echo $userlevelpermissions->UserLevelID->EditAttributes() ?>>
<?php
if (is_array($userlevelpermissions->UserLevelID->EditValue)) {
	$arwrk = $userlevelpermissions->UserLevelID->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($userlevelpermissions->UserLevelID->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld FROM `userlevels`";
$sWhereWrk = "";
if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
?>
<input type="hidden" name="s_x_UserLevelID" id="s_x_UserLevelID" value="<?php echo $sSqlWrk; ?>">
<input type="hidden" name="lft_x_UserLevelID" id="lft_x_UserLevelID" value="">
</span><?php echo $userlevelpermissions->UserLevelID->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($userlevelpermissions->UserLevelTableName->Visible) { // UserLevelTableName ?>
	<tr<?php echo $userlevelpermissions->UserLevelTableName->RowAttributes ?>>
		<td class="ewTableHeader">User Level Table Name<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $userlevelpermissions->UserLevelTableName->CellAttributes() ?>><span id="el_UserLevelTableName">
<input type="text" name="x_UserLevelTableName" id="x_UserLevelTableName" size="30" maxlength="80" value="<?php echo $userlevelpermissions->UserLevelTableName->EditValue ?>"<?php echo $userlevelpermissions->UserLevelTableName->EditAttributes() ?>>
</span><?php echo $userlevelpermissions->UserLevelTableName->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($userlevelpermissions->UserLevelPermission->Visible) { // UserLevelPermission ?>
	<tr<?php echo $userlevelpermissions->UserLevelPermission->RowAttributes ?>>
		<td class="ewTableHeader">User Level Permission<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $userlevelpermissions->UserLevelPermission->CellAttributes() ?>><span id="el_UserLevelPermission">
<input type="text" name="x_UserLevelPermission" id="x_UserLevelPermission" size="30" value="<?php echo $userlevelpermissions->UserLevelPermission->EditValue ?>"<?php echo $userlevelpermissions->UserLevelPermission->EditAttributes() ?>>
</span><?php echo $userlevelpermissions->UserLevelPermission->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="    Add    ">
</form>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_UserLevelID','x_UserLevelID',false]]);

//-->
</script>
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
class cuserlevelpermissions_add {

	// Page ID
	var $PageID = 'add';

	// Table Name
	var $TableName = 'userlevelpermissions';

	// Page Object Name
	var $PageObjName = 'userlevelpermissions_add';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $userlevelpermissions;
		if ($userlevelpermissions->UseTokenInUrl) $PageUrl .= "t=" . $userlevelpermissions->TableVar . "&"; // add page token
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
		global $objForm, $userlevelpermissions;
		if ($userlevelpermissions->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($userlevelpermissions->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($userlevelpermissions->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuserlevelpermissions_add() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevelpermissions"] = new cuserlevelpermissions();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'add', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'userlevelpermissions', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $userlevelpermissions;
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
		if (!$Security->CanAdmin()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
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
		global $objForm, $gsFormError, $userlevelpermissions;

		// Load key values from QueryString
		$bCopy = TRUE;
		if (@$_GET["UserLevelID"] != "") {
		  $userlevelpermissions->UserLevelID->setQueryStringValue($_GET["UserLevelID"]);
		} else {
		  $bCopy = FALSE;
		}
		if (@$_GET["UserLevelTableName"] != "") {
		  $userlevelpermissions->UserLevelTableName->setQueryStringValue($_GET["UserLevelTableName"]);
		} else {
		  $bCopy = FALSE;
		}

		// Create form object
		$objForm = new cFormObj();

		// Process form if post back
		if (@$_POST["a_add"] <> "") {
		   $userlevelpermissions->CurrentAction = $_POST["a_add"]; // Get form action
		  $this->LoadFormValues(); // Load form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$userlevelpermissions->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else { // Not post back
		  if ($bCopy) {
		    $userlevelpermissions->CurrentAction = "C"; // Copy Record
		  } else {
		    $userlevelpermissions->CurrentAction = "I"; // Display Blank Record
		    $this->LoadDefaultValues(); // Load default values
		  }
		}

		// Perform action based on action code
		switch ($userlevelpermissions->CurrentAction) {
		  case "I": // Blank record, no action required
				break;
		  case "C": // Copy an existing record
		   if (!$this->LoadRow()) { // Load record based on key
		      $this->setMessage("Không có dữ liệu"); // No record found
		      $this->Page_Terminate("userlevelpermissionslist.php"); // No matching record, return to list
		    }
				break;
		  case "A": // ' Add new record
				$userlevelpermissions->SendEmail = TRUE; // Send email on add success
		    if ($this->AddRow()) { // Add successful
		      $this->setMessage("Thêm mới thành công"); // Set up success message
					$sReturnUrl = $userlevelpermissions->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "userlevelpermissionsview.php")
						$sReturnUrl = $userlevelpermissions->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Clean up and return
		    } else {
		      $this->RestoreFormValues(); // Add failed, restore form values
		    }
		}

		// Render row based on row type
		$userlevelpermissions->RowType = EW_ROWTYPE_ADD;  // Render add type

		// Render row
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $userlevelpermissions;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $userlevelpermissions;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $userlevelpermissions;
		$userlevelpermissions->UserLevelID->setFormValue($objForm->GetValue("x_UserLevelID"));
		$userlevelpermissions->UserLevelTableName->setFormValue($objForm->GetValue("x_UserLevelTableName"));
		$userlevelpermissions->UserLevelPermission->setFormValue($objForm->GetValue("x_UserLevelPermission"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $userlevelpermissions;
		$userlevelpermissions->UserLevelID->CurrentValue = $userlevelpermissions->UserLevelID->FormValue;
		$userlevelpermissions->UserLevelTableName->CurrentValue = $userlevelpermissions->UserLevelTableName->FormValue;
		$userlevelpermissions->UserLevelPermission->CurrentValue = $userlevelpermissions->UserLevelPermission->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $userlevelpermissions;
		$sFilter = $userlevelpermissions->KeyFilter();

		// Call Row Selecting event
		$userlevelpermissions->Row_Selecting($sFilter);

		// Load sql based on filter
		$userlevelpermissions->CurrentFilter = $sFilter;
		$sSql = $userlevelpermissions->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$userlevelpermissions->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $userlevelpermissions;
		$userlevelpermissions->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$userlevelpermissions->UserLevelTableName->setDbValue($rs->fields('UserLevelTableName'));
		$userlevelpermissions->UserLevelPermission->setDbValue($rs->fields('UserLevelPermission'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $userlevelpermissions;

		// Call Row_Rendering event
		$userlevelpermissions->Row_Rendering();

		// Common render codes for all row types
		// UserLevelID

		$userlevelpermissions->UserLevelID->CellCssStyle = "";
		$userlevelpermissions->UserLevelID->CellCssClass = "";

		// UserLevelTableName
		$userlevelpermissions->UserLevelTableName->CellCssStyle = "";
		$userlevelpermissions->UserLevelTableName->CellCssClass = "";

		// UserLevelPermission
		$userlevelpermissions->UserLevelPermission->CellCssStyle = "";
		$userlevelpermissions->UserLevelPermission->CellCssClass = "";
		if ($userlevelpermissions->RowType == EW_ROWTYPE_VIEW) { // View row

			// UserLevelID
			if (strval($userlevelpermissions->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($userlevelpermissions->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$userlevelpermissions->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$userlevelpermissions->UserLevelID->ViewValue = $userlevelpermissions->UserLevelID->CurrentValue;
				}
			} else {
				$userlevelpermissions->UserLevelID->ViewValue = NULL;
			}
			$userlevelpermissions->UserLevelID->CssStyle = "";
			$userlevelpermissions->UserLevelID->CssClass = "";
			$userlevelpermissions->UserLevelID->ViewCustomAttributes = "";

			// UserLevelTableName
			$userlevelpermissions->UserLevelTableName->ViewValue = $userlevelpermissions->UserLevelTableName->CurrentValue;
			$userlevelpermissions->UserLevelTableName->CssStyle = "";
			$userlevelpermissions->UserLevelTableName->CssClass = "";
			$userlevelpermissions->UserLevelTableName->ViewCustomAttributes = "";

			// UserLevelPermission
			$userlevelpermissions->UserLevelPermission->ViewValue = $userlevelpermissions->UserLevelPermission->CurrentValue;
			$userlevelpermissions->UserLevelPermission->CssStyle = "";
			$userlevelpermissions->UserLevelPermission->CssClass = "";
			$userlevelpermissions->UserLevelPermission->ViewCustomAttributes = "";

			// UserLevelID
			$userlevelpermissions->UserLevelID->HrefValue = "";

			// UserLevelTableName
			$userlevelpermissions->UserLevelTableName->HrefValue = "";

			// UserLevelPermission
			$userlevelpermissions->UserLevelPermission->HrefValue = "";
		} elseif ($userlevelpermissions->RowType == EW_ROWTYPE_ADD) { // Add row

			// UserLevelID
			$userlevelpermissions->UserLevelID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			if (trim(strval($userlevelpermissions->UserLevelID->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`UserLevelID` = " . ew_AdjustSql($userlevelpermissions->UserLevelID->CurrentValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$userlevelpermissions->UserLevelID->EditValue = $arwrk;

			// UserLevelTableName
			$userlevelpermissions->UserLevelTableName->EditCustomAttributes = "";
			$userlevelpermissions->UserLevelTableName->EditValue = ew_HtmlEncode($userlevelpermissions->UserLevelTableName->CurrentValue);

			// UserLevelPermission
			$userlevelpermissions->UserLevelPermission->EditCustomAttributes = "";
			$userlevelpermissions->UserLevelPermission->EditValue = ew_HtmlEncode($userlevelpermissions->UserLevelPermission->CurrentValue);
		}

		// Call Row Rendered event
		$userlevelpermissions->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $userlevelpermissions;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($userlevelpermissions->UserLevelID->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Level ID";
		}
		if ($userlevelpermissions->UserLevelTableName->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Level Table Name";
		}
		if ($userlevelpermissions->UserLevelPermission->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - User Level Permission";
		}
		if (!ew_CheckInteger($userlevelpermissions->UserLevelPermission->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - User Level Permission";
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
		global $conn, $Security, $userlevelpermissions;

		// Check if key value entered
		if ($userlevelpermissions->UserLevelID->CurrentValue == "") {
			$this->setMessage("Invalid key value");
			return FALSE;
		}

		// Check if key value entered
		if ($userlevelpermissions->UserLevelTableName->CurrentValue == "") {
			$this->setMessage("Invalid key value");
			return FALSE;
		}

		// Check for duplicate key
		$bCheckKey = TRUE;
		$sFilter = $userlevelpermissions->KeyFilter();
		if ($bCheckKey) {
			$rsChk = $userlevelpermissions->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sKeyErrMsg = str_replace("%f", $sFilter, "Duplicate primary key: '%f'");
				$this->setMessage($sKeyErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// Field UserLevelID
		$userlevelpermissions->UserLevelID->SetDbValueDef($userlevelpermissions->UserLevelID->CurrentValue, 0);
		$rsnew['UserLevelID'] =& $userlevelpermissions->UserLevelID->DbValue;

		// Field UserLevelTableName
		$userlevelpermissions->UserLevelTableName->SetDbValueDef($userlevelpermissions->UserLevelTableName->CurrentValue, "");
		$rsnew['UserLevelTableName'] =& $userlevelpermissions->UserLevelTableName->DbValue;

		// Field UserLevelPermission
		$userlevelpermissions->UserLevelPermission->SetDbValueDef($userlevelpermissions->UserLevelPermission->CurrentValue, 0);
		$rsnew['UserLevelPermission'] =& $userlevelpermissions->UserLevelPermission->DbValue;

		// Call Row Inserting event
		$bInsertRow = $userlevelpermissions->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($userlevelpermissions->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($userlevelpermissions->CancelMessage <> "") {
				$this->setMessage($userlevelpermissions->CancelMessage);
				$userlevelpermissions->CancelMessage = "";
			} else {
				$this->setMessage("Thêm mới bị hủy bỏ");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {

			// Call Row Inserted event
			$userlevelpermissions->Row_Inserted($rsnew);
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
