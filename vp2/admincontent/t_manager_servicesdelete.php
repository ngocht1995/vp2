<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_manager_servicesinfo.php" ?>
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
$t_manager_services_delete = new ct_manager_services_delete();
$Page =& $t_manager_services_delete;

// Page init processing
$t_manager_services_delete->Page_Init();

// Page main processing
$t_manager_services_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_manager_services_delete = new ew_Page("t_manager_services_delete");

// page properties
t_manager_services_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_manager_services_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_manager_services_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_manager_services_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_manager_services_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_manager_services_delete.ValidateRequired = false; // no JavaScript validation
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
<?php

// Load records for display
$rs = $t_manager_services_delete->LoadRecordset();
$t_manager_services_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_manager_services_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_manager_services_delete->Page_Terminate("t_manager_serviceslist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: T Manager Services<br><br>
<a href="<?php echo $t_manager_services->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_manager_services_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_manager_services">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_manager_services_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_manager_services->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Services Id</td>
		<td valign="top">Name Ser</td>
		<td valign="top">Code Ser</td>
		<td valign="top">Active Ser</td>
		<td valign="top">Oder</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_manager_services_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_manager_services_delete->lRecCnt++;

	// Set row properties
	$t_manager_services->CssClass = "";
	$t_manager_services->CssStyle = "";
	$t_manager_services->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_manager_services_delete->LoadRowValues($rs);

	// Render row
	$t_manager_services_delete->RenderRow();
?>
	<tr<?php echo $t_manager_services->RowAttributes() ?>>
		<td<?php echo $t_manager_services->services_id->CellAttributes() ?>>
<div<?php echo $t_manager_services->services_id->ViewAttributes() ?>><?php echo $t_manager_services->services_id->ListViewValue() ?></div></td>
		<td<?php echo $t_manager_services->name_ser->CellAttributes() ?>>
<div<?php echo $t_manager_services->name_ser->ViewAttributes() ?>><?php echo $t_manager_services->name_ser->ListViewValue() ?></div></td>
		<td<?php echo $t_manager_services->code_ser->CellAttributes() ?>>
<div<?php echo $t_manager_services->code_ser->ViewAttributes() ?>><?php echo $t_manager_services->code_ser->ListViewValue() ?></div></td>
		<td<?php echo $t_manager_services->active_ser->CellAttributes() ?>>
<div<?php echo $t_manager_services->active_ser->ViewAttributes() ?>><?php echo $t_manager_services->active_ser->ListViewValue() ?></div></td>
		<td<?php echo $t_manager_services->oder->CellAttributes() ?>>
<div<?php echo $t_manager_services->oder->ViewAttributes() ?>><?php echo $t_manager_services->oder->ListViewValue() ?></div></td>
	</tr>
<?php
	$rs->MoveNext();
}
$rs->Close();
?>
</tbody>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="Action" id="Action" value="Confirm Delete">
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
class ct_manager_services_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_manager_services';

	// Page Object Name
	var $PageObjName = 't_manager_services_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_manager_services;
		if ($t_manager_services->UseTokenInUrl) $PageUrl .= "t=" . $t_manager_services->TableVar . "&"; // add page token
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
		global $objForm, $t_manager_services;
		if ($t_manager_services->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_manager_services->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_manager_services->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_manager_services_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_manager_services"] = new ct_manager_services();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_manager_services', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_manager_services;
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
		if (!$Security->CanDelete()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("t_manager_serviceslist.php");
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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $t_manager_services;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["services_id"] <> "") {
			$t_manager_services->services_id->setQueryStringValue($_GET["services_id"]);
			if (!is_numeric($t_manager_services->services_id->QueryStringValue))
				$this->Page_Terminate("t_manager_serviceslist.php"); // Prevent SQL injection, exit
			$sKey .= $t_manager_services->services_id->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if ($bSingleDelete) {
			$nKeySelected = 1; // Set up key selected count
			$this->arRecKeys[0] = $sKey;
		} else {
			if (isset($_POST["key_m"])) { // Key in form
				$nKeySelected = count($_POST["key_m"]); // Set up key selected count
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
			}
		}
		if ($nKeySelected <= 0)
			$this->Page_Terminate("t_manager_serviceslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_manager_serviceslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`services_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_manager_services class, t_manager_servicesinfo.php

		$t_manager_services->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_manager_services->CurrentAction = $_POST["a_delete"];
		} else {
			$t_manager_services->CurrentAction = "I"; // Display record
		}
		switch ($t_manager_services->CurrentAction) {
			case "D": // Delete
				$t_manager_services->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_manager_services->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_manager_services;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_manager_services->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_manager_services class, t_manager_servicesinfo.php

		$t_manager_services->CurrentFilter = $sWrkFilter;
		$sSql = $t_manager_services->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("No records found"); // No record found
			$rs->Close();
			return FALSE;
		}
		$conn->BeginTrans();

		// Clone old rows
		$rsold = ($rs) ? $rs->GetRows() : array();
		if ($rs) $rs->Close();

		// Call row deleting event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$DeleteRows = $t_manager_services->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['services_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_manager_services->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_manager_services->CancelMessage <> "") {
				$this->setMessage($t_manager_services->CancelMessage);
				$t_manager_services->CancelMessage = "";
			} else {
				$this->setMessage("Delete cancelled");
			}
		}
		if ($DeleteRows) {
			$conn->CommitTrans(); // Commit the changes
		} else {
			$conn->RollbackTrans(); // Rollback changes
		}

		// Call recordset deleted event
		if ($DeleteRows) {
			foreach ($rsold as $row) {
				$t_manager_services->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_manager_services;

		// Call Recordset Selecting event
		$t_manager_services->Recordset_Selecting($t_manager_services->CurrentFilter);

		// Load list page SQL
		$sSql = $t_manager_services->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_manager_services->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_manager_services;
		$sFilter = $t_manager_services->KeyFilter();

		// Call Row Selecting event
		$t_manager_services->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_manager_services->CurrentFilter = $sFilter;
		$sSql = $t_manager_services->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_manager_services->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_manager_services;
		$t_manager_services->services_id->setDbValue($rs->fields('services_id'));
		$t_manager_services->name_ser->setDbValue($rs->fields('name_ser'));
		$t_manager_services->code_ser->setDbValue($rs->fields('code_ser'));
		$t_manager_services->descript_ser->setDbValue($rs->fields('descript_ser'));
		$t_manager_services->active_ser->setDbValue($rs->fields('active_ser'));
		$t_manager_services->user_add->setDbValue($rs->fields('user_add'));
		$t_manager_services->datime_add->setDbValue($rs->fields('datime_add'));
		$t_manager_services->user_edit->setDbValue($rs->fields('user_edit'));
		$t_manager_services->datime_edit->setDbValue($rs->fields('datime_edit'));
		$t_manager_services->oder->setDbValue($rs->fields('oder'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_manager_services;

		// Call Row_Rendering event
		$t_manager_services->Row_Rendering();

		// Common render codes for all row types
		// services_id

		$t_manager_services->services_id->CellCssStyle = "";
		$t_manager_services->services_id->CellCssClass = "";

		// name_ser
		$t_manager_services->name_ser->CellCssStyle = "";
		$t_manager_services->name_ser->CellCssClass = "";

		// code_ser
		$t_manager_services->code_ser->CellCssStyle = "";
		$t_manager_services->code_ser->CellCssClass = "";

		// active_ser
		$t_manager_services->active_ser->CellCssStyle = "";
		$t_manager_services->active_ser->CellCssClass = "";

		// oder
		$t_manager_services->oder->CellCssStyle = "";
		$t_manager_services->oder->CellCssClass = "";
		if ($t_manager_services->RowType == EW_ROWTYPE_VIEW) { // View row

			// services_id
			$t_manager_services->services_id->ViewValue = $t_manager_services->services_id->CurrentValue;
			$t_manager_services->services_id->CssStyle = "";
			$t_manager_services->services_id->CssClass = "";
			$t_manager_services->services_id->ViewCustomAttributes = "";

			// name_ser
			$t_manager_services->name_ser->ViewValue = $t_manager_services->name_ser->CurrentValue;
			$t_manager_services->name_ser->CssStyle = "";
			$t_manager_services->name_ser->CssClass = "";
			$t_manager_services->name_ser->ViewCustomAttributes = "";

			// code_ser
			$t_manager_services->code_ser->ViewValue = $t_manager_services->code_ser->CurrentValue;
			$t_manager_services->code_ser->CssStyle = "";
			$t_manager_services->code_ser->CssClass = "";
			$t_manager_services->code_ser->ViewCustomAttributes = "";

			// active_ser
			if (strval($t_manager_services->active_ser->CurrentValue) <> "") {
				switch ($t_manager_services->active_ser->CurrentValue) {
					case "0":
						$t_manager_services->active_ser->ViewValue = "khong kich hoat";
						break;
					case "1":
						$t_manager_services->active_ser->ViewValue = "kich hoat";
						break;
					default:
						$t_manager_services->active_ser->ViewValue = $t_manager_services->active_ser->CurrentValue;
				}
			} else {
				$t_manager_services->active_ser->ViewValue = NULL;
			}
			$t_manager_services->active_ser->CssStyle = "";
			$t_manager_services->active_ser->CssClass = "";
			$t_manager_services->active_ser->ViewCustomAttributes = "";

			// user_add
			$t_manager_services->user_add->ViewValue = $t_manager_services->user_add->CurrentValue;
			$t_manager_services->user_add->CssStyle = "";
			$t_manager_services->user_add->CssClass = "";
			$t_manager_services->user_add->ViewCustomAttributes = "";

			// datime_add
			$t_manager_services->datime_add->ViewValue = $t_manager_services->datime_add->CurrentValue;
			$t_manager_services->datime_add->ViewValue = ew_FormatDateTime($t_manager_services->datime_add->ViewValue, 7);
			$t_manager_services->datime_add->CssStyle = "";
			$t_manager_services->datime_add->CssClass = "";
			$t_manager_services->datime_add->ViewCustomAttributes = "";

			// user_edit
			$t_manager_services->user_edit->ViewValue = $t_manager_services->user_edit->CurrentValue;
			$t_manager_services->user_edit->CssStyle = "";
			$t_manager_services->user_edit->CssClass = "";
			$t_manager_services->user_edit->ViewCustomAttributes = "";

			// datime_edit
			$t_manager_services->datime_edit->ViewValue = $t_manager_services->datime_edit->CurrentValue;
			$t_manager_services->datime_edit->ViewValue = ew_FormatDateTime($t_manager_services->datime_edit->ViewValue, 7);
			$t_manager_services->datime_edit->CssStyle = "";
			$t_manager_services->datime_edit->CssClass = "";
			$t_manager_services->datime_edit->ViewCustomAttributes = "";

			// oder
			$t_manager_services->oder->ViewValue = $t_manager_services->oder->CurrentValue;
			$t_manager_services->oder->CssStyle = "";
			$t_manager_services->oder->CssClass = "";
			$t_manager_services->oder->ViewCustomAttributes = "";

			// services_id
			$t_manager_services->services_id->HrefValue = "";

			// name_ser
			$t_manager_services->name_ser->HrefValue = "";

			// code_ser
			$t_manager_services->code_ser->HrefValue = "";

			// active_ser
			$t_manager_services->active_ser->HrefValue = "";

			// oder
			$t_manager_services->oder->HrefValue = "";
		}

		// Call Row Rendered event
		$t_manager_services->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}
}
?>
