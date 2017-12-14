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
$userlevelpermissions_delete = new cuserlevelpermissions_delete();
$Page =& $userlevelpermissions_delete;

// Page init processing
$userlevelpermissions_delete->Page_Init();

// Page main processing
$userlevelpermissions_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var userlevelpermissions_delete = new ew_Page("userlevelpermissions_delete");

// page properties
userlevelpermissions_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = userlevelpermissions_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
userlevelpermissions_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
userlevelpermissions_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
userlevelpermissions_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
userlevelpermissions_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $userlevelpermissions_delete->LoadRecordset();
$userlevelpermissions_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($userlevelpermissions_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$userlevelpermissions_delete->Page_Terminate("userlevelpermissionslist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Userlevelpermissions<br><br>
<a href="<?php echo $userlevelpermissions->getReturnUrl() ?>">Go Back</a></span></p>
<?php $userlevelpermissions_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="userlevelpermissions">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($userlevelpermissions_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $userlevelpermissions->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">User Level ID</td>
		<td valign="top">User Level Table Name</td>
		<td valign="top">User Level Permission</td>
	</tr>
	</thead>
	<tbody>
<?php
$userlevelpermissions_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$userlevelpermissions_delete->lRecCnt++;

	// Set row properties
	$userlevelpermissions->CssClass = "";
	$userlevelpermissions->CssStyle = "";
	$userlevelpermissions->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$userlevelpermissions_delete->LoadRowValues($rs);

	// Render row
	$userlevelpermissions_delete->RenderRow();
?>
	<tr<?php echo $userlevelpermissions->RowAttributes() ?>>
		<td<?php echo $userlevelpermissions->UserLevelID->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelID->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelID->ListViewValue() ?></div></td>
		<td<?php echo $userlevelpermissions->UserLevelTableName->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelTableName->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelTableName->ListViewValue() ?></div></td>
		<td<?php echo $userlevelpermissions->UserLevelPermission->CellAttributes() ?>>
<div<?php echo $userlevelpermissions->UserLevelPermission->ViewAttributes() ?>><?php echo $userlevelpermissions->UserLevelPermission->ListViewValue() ?></div></td>
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
class cuserlevelpermissions_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'userlevelpermissions';

	// Page Object Name
	var $PageObjName = 'userlevelpermissions_delete';

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
	function cuserlevelpermissions_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["userlevelpermissions"] = new cuserlevelpermissions();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $userlevelpermissions;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["UserLevelID"] <> "") {
			$userlevelpermissions->UserLevelID->setQueryStringValue($_GET["UserLevelID"]);
			if (!is_numeric($userlevelpermissions->UserLevelID->QueryStringValue))
				$this->Page_Terminate("userlevelpermissionslist.php"); // Prevent SQL injection, exit
			$sKey .= $userlevelpermissions->UserLevelID->QueryStringValue;
		} else {
			$bSingleDelete = FALSE;
		}
		if (@$_GET["UserLevelTableName"] <> "") {
			$userlevelpermissions->UserLevelTableName->setQueryStringValue($_GET["UserLevelTableName"]);
			if ($sKey <> "") $sKey .= EW_COMPOSITE_KEY_SEPARATOR;
			$sKey .= $userlevelpermissions->UserLevelTableName->QueryStringValue;
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
			$this->Page_Terminate("userlevelpermissionslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";
			$arKeyFlds = explode(EW_COMPOSITE_KEY_SEPARATOR, trim($sKey)); // Split key by separator
			if (count($arKeyFlds) <> 2)
				$this->Page_Terminate($userlevelpermissions->getReturnUrl()); // Invalid key, exit

			// Set up key field
			$sKeyFld = $arKeyFlds[0];
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("userlevelpermissionslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`UserLevelID`=" . ew_AdjustSql($sKeyFld) . " AND ";

			// Set up key field
			$sKeyFld = $arKeyFlds[1];
			$sFilter .= "`UserLevelTableName`='" . ew_AdjustSql($sKeyFld) . "' AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in userlevelpermissions class, userlevelpermissionsinfo.php

		$userlevelpermissions->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$userlevelpermissions->CurrentAction = $_POST["a_delete"];
		} else {
			$userlevelpermissions->CurrentAction = "D"; // Delete record directly
		}
		switch ($userlevelpermissions->CurrentAction) {
			case "D": // Delete
				$userlevelpermissions->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($userlevelpermissions->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $userlevelpermissions;
		$DeleteRows = TRUE;
		$sWrkFilter = $userlevelpermissions->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in userlevelpermissions class, userlevelpermissionsinfo.php

		$userlevelpermissions->CurrentFilter = $sWrkFilter;
		$sSql = $userlevelpermissions->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("Không có dữ liệu"); // No record found
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
				$DeleteRows = $userlevelpermissions->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['UserLevelID'];
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['UserLevelTableName'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($userlevelpermissions->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($userlevelpermissions->CancelMessage <> "") {
				$this->setMessage($userlevelpermissions->CancelMessage);
				$userlevelpermissions->CancelMessage = "";
			} else {
				$this->setMessage("Xóa bị hủy bỏ");
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
				$userlevelpermissions->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $userlevelpermissions;

		// Call Recordset Selecting event
		$userlevelpermissions->Recordset_Selecting($userlevelpermissions->CurrentFilter);

		// Load list page SQL
		$sSql = $userlevelpermissions->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$userlevelpermissions->Recordset_Selected($rs);
		return $rs;
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
		}

		// Call Row Rendered event
		$userlevelpermissions->Row_Rendered();
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
