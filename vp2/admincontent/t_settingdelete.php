<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_settinginfo.php" ?>
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
$t_setting_delete = new ct_setting_delete();
$Page =& $t_setting_delete;

// Page init processing
$t_setting_delete->Page_Init();

// Page main processing
$t_setting_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_delete = new ew_Page("t_setting_delete");

// page properties
t_setting_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_setting_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_setting_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_setting_delete->LoadRecordset();
$t_setting_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_setting_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_setting_delete->Page_Terminate("t_settinglist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: T Setting<br><br>
<a href="<?php echo $t_setting->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_setting_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_setting">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_setting_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_setting->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Set Id</td>
		<td valign="top">Set Type</td>
		<td valign="top">Set Status</td>
		<td valign="top">Set Date Start</td>
		<td valign="top">Set Date End</td>
		<td valign="top">Set Description</td>
		<td valign="top">Set Active</td>
		<td valign="top">Set Code</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_setting_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_setting_delete->lRecCnt++;

	// Set row properties
	$t_setting->CssClass = "";
	$t_setting->CssStyle = "";
	$t_setting->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_setting_delete->LoadRowValues($rs);

	// Render row
	$t_setting_delete->RenderRow();
?>
	<tr<?php echo $t_setting->RowAttributes() ?>>
		<td<?php echo $t_setting->set_id->CellAttributes() ?>>
<div<?php echo $t_setting->set_id->ViewAttributes() ?>><?php echo $t_setting->set_id->ListViewValue() ?></div></td>
		<td<?php echo $t_setting->set_type->CellAttributes() ?>>
<div<?php echo $t_setting->set_type->ViewAttributes() ?>><?php echo $t_setting->set_type->ListViewValue() ?></div></td>
		<td<?php echo $t_setting->set_status->CellAttributes() ?>>
<div<?php echo $t_setting->set_status->ViewAttributes() ?>><?php echo $t_setting->set_status->ListViewValue() ?></div></td>
		<td<?php echo $t_setting->set_date_start->CellAttributes() ?>>
<div<?php echo $t_setting->set_date_start->ViewAttributes() ?>><?php echo $t_setting->set_date_start->ListViewValue() ?></div></td>
		<td<?php echo $t_setting->set_date_end->CellAttributes() ?>>
<div<?php echo $t_setting->set_date_end->ViewAttributes() ?>><?php echo $t_setting->set_date_end->ListViewValue() ?></div></td>
		<td<?php echo $t_setting->set_description->CellAttributes() ?>>
<div<?php echo $t_setting->set_description->ViewAttributes() ?>><?php echo $t_setting->set_description->ListViewValue() ?></div></td>
		<td<?php echo $t_setting->set_active->CellAttributes() ?>>
<div<?php echo $t_setting->set_active->ViewAttributes() ?>><?php echo $t_setting->set_active->ListViewValue() ?></div></td>
		<td<?php echo $t_setting->set_code->CellAttributes() ?>>
<div<?php echo $t_setting->set_code->ViewAttributes() ?>><?php echo $t_setting->set_code->ListViewValue() ?></div></td>
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
class ct_setting_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_setting';

	// Page Object Name
	var $PageObjName = 't_setting_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting;
		if ($t_setting->UseTokenInUrl) $PageUrl .= "t=" . $t_setting->TableVar . "&"; // add page token
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
		global $objForm, $t_setting;
		if ($t_setting->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting"] = new ct_setting();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting;
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
			$this->Page_Terminate("t_settinglist.php");
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
		global $t_setting;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["set_id"] <> "") {
			$t_setting->set_id->setQueryStringValue($_GET["set_id"]);
			if (!is_numeric($t_setting->set_id->QueryStringValue))
				$this->Page_Terminate("t_settinglist.php"); // Prevent SQL injection, exit
			$sKey .= $t_setting->set_id->QueryStringValue;
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
			$this->Page_Terminate("t_settinglist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_settinglist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`set_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_setting class, t_settinginfo.php

		$t_setting->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_setting->CurrentAction = $_POST["a_delete"];
		} else {
			$t_setting->CurrentAction = "I"; // Display record
		}
		switch ($t_setting->CurrentAction) {
			case "D": // Delete
				$t_setting->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_setting->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_setting;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_setting->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_setting class, t_settinginfo.php

		$t_setting->CurrentFilter = $sWrkFilter;
		$sSql = $t_setting->SQL();
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
				$DeleteRows = $t_setting->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['set_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_setting->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_setting->CancelMessage <> "") {
				$this->setMessage($t_setting->CancelMessage);
				$t_setting->CancelMessage = "";
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
				$t_setting->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_setting;

		// Call Recordset Selecting event
		$t_setting->Recordset_Selecting($t_setting->CurrentFilter);

		// Load list page SQL
		$sSql = $t_setting->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_setting->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting;
		$sFilter = $t_setting->KeyFilter();

		// Call Row Selecting event
		$t_setting->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting->CurrentFilter = $sFilter;
		$sSql = $t_setting->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting;
		$t_setting->set_id->setDbValue($rs->fields('set_id'));
		$t_setting->set_type->setDbValue($rs->fields('set_type'));
		$t_setting->set_status->setDbValue($rs->fields('set_status'));
		$t_setting->set_date_start->setDbValue($rs->fields('set_date_start'));
		$t_setting->set_date_end->setDbValue($rs->fields('set_date_end'));
		$t_setting->set_description->setDbValue($rs->fields('set_description'));
		$t_setting->set_active->setDbValue($rs->fields('set_active'));
		$t_setting->set_code->setDbValue($rs->fields('set_code'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting;

		// Call Row_Rendering event
		$t_setting->Row_Rendering();

		// Common render codes for all row types
		// set_id

		$t_setting->set_id->CellCssStyle = "";
		$t_setting->set_id->CellCssClass = "";

		// set_type
		$t_setting->set_type->CellCssStyle = "";
		$t_setting->set_type->CellCssClass = "";

		// set_status
		$t_setting->set_status->CellCssStyle = "";
		$t_setting->set_status->CellCssClass = "";

		// set_date_start
		$t_setting->set_date_start->CellCssStyle = "";
		$t_setting->set_date_start->CellCssClass = "";

		// set_date_end
		$t_setting->set_date_end->CellCssStyle = "";
		$t_setting->set_date_end->CellCssClass = "";

		// set_description
		$t_setting->set_description->CellCssStyle = "";
		$t_setting->set_description->CellCssClass = "";

		// set_active
		$t_setting->set_active->CellCssStyle = "";
		$t_setting->set_active->CellCssClass = "";

		// set_code
		$t_setting->set_code->CellCssStyle = "";
		$t_setting->set_code->CellCssClass = "";
		if ($t_setting->RowType == EW_ROWTYPE_VIEW) { // View row

			// set_id
			$t_setting->set_id->ViewValue = $t_setting->set_id->CurrentValue;
			$t_setting->set_id->CssStyle = "";
			$t_setting->set_id->CssClass = "";
			$t_setting->set_id->ViewCustomAttributes = "";

			// set_type
			if (strval($t_setting->set_type->CurrentValue) <> "") {
				switch ($t_setting->set_type->CurrentValue) {
					case "1":
						$t_setting->set_type->ViewValue = "Cau hoi";
						break;
					case "2":
						$t_setting->set_type->ViewValue = "Tham do";
						break;
					default:
						$t_setting->set_type->ViewValue = $t_setting->set_type->CurrentValue;
				}
			} else {
				$t_setting->set_type->ViewValue = NULL;
			}
			$t_setting->set_type->CssStyle = "";
			$t_setting->set_type->CssClass = "";
			$t_setting->set_type->ViewCustomAttributes = "";

			// set_status
			if (strval($t_setting->set_status->CurrentValue) <> "") {
				switch ($t_setting->set_status->CurrentValue) {
					case "0":
						$t_setting->set_status->ViewValue = "Mac dinh";
						break;
					case "1":
						$t_setting->set_status->ViewValue = "Khoa cau hoi";
						break;
					case "2":
						$t_setting->set_status->ViewValue = "Thiet lap 2 trang thai tham do";
						break;
					case "3":
						$t_setting->set_status->ViewValue = "Thiet lap tham do theo thoi gian";
						break;
					case "4":
						$t_setting->set_status->ViewValue = "Thiet al tham do xac nhan";
						break;
					default:
						$t_setting->set_status->ViewValue = $t_setting->set_status->CurrentValue;
				}
			} else {
				$t_setting->set_status->ViewValue = NULL;
			}
			$t_setting->set_status->CssStyle = "";
			$t_setting->set_status->CssClass = "";
			$t_setting->set_status->ViewCustomAttributes = "";

			// set_date_start
			$t_setting->set_date_start->ViewValue = $t_setting->set_date_start->CurrentValue;
			$t_setting->set_date_start->ViewValue = ew_FormatDateTime($t_setting->set_date_start->ViewValue, 7);
			$t_setting->set_date_start->CssStyle = "";
			$t_setting->set_date_start->CssClass = "";
			$t_setting->set_date_start->ViewCustomAttributes = "";

			// set_date_end
			$t_setting->set_date_end->ViewValue = $t_setting->set_date_end->CurrentValue;
			$t_setting->set_date_end->ViewValue = ew_FormatDateTime($t_setting->set_date_end->ViewValue, 7);
			$t_setting->set_date_end->CssStyle = "";
			$t_setting->set_date_end->CssClass = "";
			$t_setting->set_date_end->ViewCustomAttributes = "";

			// set_description
			$t_setting->set_description->ViewValue = $t_setting->set_description->CurrentValue;
			$t_setting->set_description->CssStyle = "";
			$t_setting->set_description->CssClass = "";
			$t_setting->set_description->ViewCustomAttributes = "";

			// set_active
			if (strval($t_setting->set_active->CurrentValue) <> "") {
				switch ($t_setting->set_active->CurrentValue) {
					case "0":
						$t_setting->set_active->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_setting->set_active->ViewValue = "Kich hoat";
						break;
					default:
						$t_setting->set_active->ViewValue = $t_setting->set_active->CurrentValue;
				}
			} else {
				$t_setting->set_active->ViewValue = NULL;
			}
			$t_setting->set_active->CssStyle = "";
			$t_setting->set_active->CssClass = "";
			$t_setting->set_active->ViewCustomAttributes = "";

			// set_code
			$t_setting->set_code->ViewValue = $t_setting->set_code->CurrentValue;
			$t_setting->set_code->CssStyle = "";
			$t_setting->set_code->CssClass = "";
			$t_setting->set_code->ViewCustomAttributes = "";

			// set_id
			$t_setting->set_id->HrefValue = "";

			// set_type
			$t_setting->set_type->HrefValue = "";

			// set_status
			$t_setting->set_status->HrefValue = "";

			// set_date_start
			$t_setting->set_date_start->HrefValue = "";

			// set_date_end
			$t_setting->set_date_end->HrefValue = "";

			// set_description
			$t_setting->set_description->HrefValue = "";

			// set_active
			$t_setting->set_active->HrefValue = "";

			// set_code
			$t_setting->set_code->HrefValue = "";
		}

		// Call Row Rendered event
		$t_setting->Row_Rendered();
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
