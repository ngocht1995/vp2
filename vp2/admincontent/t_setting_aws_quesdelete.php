<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_setting_aws_quesinfo.php" ?>
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
$t_setting_aws_ques_delete = new ct_setting_aws_ques_delete();
$Page =& $t_setting_aws_ques_delete;

// Page init processing
$t_setting_aws_ques_delete->Page_Init();

// Page main processing
$t_setting_aws_ques_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_setting_aws_ques_delete = new ew_Page("t_setting_aws_ques_delete");

// page properties
t_setting_aws_ques_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_setting_aws_ques_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_setting_aws_ques_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_setting_aws_ques_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_setting_aws_ques_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_setting_aws_ques_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_setting_aws_ques_delete->LoadRecordset();
$t_setting_aws_ques_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_setting_aws_ques_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_setting_aws_ques_delete->Page_Terminate("t_setting_aws_queslist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: T Setting Aws Ques<br><br>
<a href="<?php echo $t_setting_aws_ques->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_setting_aws_ques_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_setting_aws_ques">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_setting_aws_ques_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_setting_aws_ques->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Year</td>
		<td valign="top">Type Setting</td>
		<td valign="top">Datetime</td>
		<td valign="top">Active</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_setting_aws_ques_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_setting_aws_ques_delete->lRecCnt++;

	// Set row properties
	$t_setting_aws_ques->CssClass = "";
	$t_setting_aws_ques->CssStyle = "";
	$t_setting_aws_ques->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_setting_aws_ques_delete->LoadRowValues($rs);

	// Render row
	$t_setting_aws_ques_delete->RenderRow();
?>
	<tr<?php echo $t_setting_aws_ques->RowAttributes() ?>>
		<td<?php echo $t_setting_aws_ques->year->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->year->ViewAttributes() ?>><?php echo $t_setting_aws_ques->year->ListViewValue() ?></div></td>
		<td<?php echo $t_setting_aws_ques->type_setting->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->type_setting->ViewAttributes() ?>><?php echo $t_setting_aws_ques->type_setting->ListViewValue() ?></div></td>
		<td<?php echo $t_setting_aws_ques->datetime->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->datetime->ViewAttributes() ?>><?php echo $t_setting_aws_ques->datetime->ListViewValue() ?></div></td>
		<td<?php echo $t_setting_aws_ques->active->CellAttributes() ?>>
<div<?php echo $t_setting_aws_ques->active->ViewAttributes() ?>><?php echo $t_setting_aws_ques->active->ListViewValue() ?></div></td>
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
class ct_setting_aws_ques_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_setting_aws_ques';

	// Page Object Name
	var $PageObjName = 't_setting_aws_ques_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) $PageUrl .= "t=" . $t_setting_aws_ques->TableVar . "&"; // add page token
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
		global $objForm, $t_setting_aws_ques;
		if ($t_setting_aws_ques->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_setting_aws_ques->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_setting_aws_ques->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_setting_aws_ques_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_setting_aws_ques"] = new ct_setting_aws_ques();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_setting_aws_ques', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_setting_aws_ques;
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
			$this->Page_Terminate("t_setting_aws_queslist.php");
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
		global $t_setting_aws_ques;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["id"] <> "") {
			$t_setting_aws_ques->id->setQueryStringValue($_GET["id"]);
			if (!is_numeric($t_setting_aws_ques->id->QueryStringValue))
				$this->Page_Terminate("t_setting_aws_queslist.php"); // Prevent SQL injection, exit
			$sKey .= $t_setting_aws_ques->id->QueryStringValue;
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
			$this->Page_Terminate("t_setting_aws_queslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_setting_aws_queslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_setting_aws_ques class, t_setting_aws_quesinfo.php

		$t_setting_aws_ques->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_setting_aws_ques->CurrentAction = $_POST["a_delete"];
		} else {
			$t_setting_aws_ques->CurrentAction = "I"; // Display record
		}
		switch ($t_setting_aws_ques->CurrentAction) {
			case "D": // Delete
				$t_setting_aws_ques->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_setting_aws_ques->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_setting_aws_ques;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_setting_aws_ques->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_setting_aws_ques class, t_setting_aws_quesinfo.php

		$t_setting_aws_ques->CurrentFilter = $sWrkFilter;
		$sSql = $t_setting_aws_ques->SQL();
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
				$DeleteRows = $t_setting_aws_ques->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_setting_aws_ques->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_setting_aws_ques->CancelMessage <> "") {
				$this->setMessage($t_setting_aws_ques->CancelMessage);
				$t_setting_aws_ques->CancelMessage = "";
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
				$t_setting_aws_ques->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_setting_aws_ques;

		// Call Recordset Selecting event
		$t_setting_aws_ques->Recordset_Selecting($t_setting_aws_ques->CurrentFilter);

		// Load list page SQL
		$sSql = $t_setting_aws_ques->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_setting_aws_ques->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_setting_aws_ques;
		$sFilter = $t_setting_aws_ques->KeyFilter();

		// Call Row Selecting event
		$t_setting_aws_ques->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_setting_aws_ques->CurrentFilter = $sFilter;
		$sSql = $t_setting_aws_ques->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_setting_aws_ques->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_setting_aws_ques;
		$t_setting_aws_ques->id->setDbValue($rs->fields('id'));
		$t_setting_aws_ques->year->setDbValue($rs->fields('year'));
		$t_setting_aws_ques->type_setting->setDbValue($rs->fields('type_setting'));
		$t_setting_aws_ques->datetime->setDbValue($rs->fields('datetime'));
		$t_setting_aws_ques->active->setDbValue($rs->fields('active'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_setting_aws_ques;

		// Call Row_Rendering event
		$t_setting_aws_ques->Row_Rendering();

		// Common render codes for all row types
		// year

		$t_setting_aws_ques->year->CellCssStyle = "";
		$t_setting_aws_ques->year->CellCssClass = "";

		// type_setting
		$t_setting_aws_ques->type_setting->CellCssStyle = "";
		$t_setting_aws_ques->type_setting->CellCssClass = "";

		// datetime
		$t_setting_aws_ques->datetime->CellCssStyle = "";
		$t_setting_aws_ques->datetime->CellCssClass = "";

		// active
		$t_setting_aws_ques->active->CellCssStyle = "";
		$t_setting_aws_ques->active->CellCssClass = "";
		if ($t_setting_aws_ques->RowType == EW_ROWTYPE_VIEW) { // View row

			// id
			$t_setting_aws_ques->id->ViewValue = $t_setting_aws_ques->id->CurrentValue;
			$t_setting_aws_ques->id->CssStyle = "";
			$t_setting_aws_ques->id->CssClass = "";
			$t_setting_aws_ques->id->ViewCustomAttributes = "";

			// year
			if (strval($t_setting_aws_ques->year->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->year->CurrentValue) {
					case "1":
						$t_setting_aws_ques->year->ViewValue = "2015";
						break;
					case "2":
						$t_setting_aws_ques->year->ViewValue = "2016";
						break;
					case "3":
						$t_setting_aws_ques->year->ViewValue = "2017";
						break;
					case "4":
						$t_setting_aws_ques->year->ViewValue = "2018";
						break;
					case "5":
						$t_setting_aws_ques->year->ViewValue = "2019";
						break;
					default:
						$t_setting_aws_ques->year->ViewValue = $t_setting_aws_ques->year->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->year->ViewValue = NULL;
			}
			$t_setting_aws_ques->year->CssStyle = "";
			$t_setting_aws_ques->year->CssClass = "";
			$t_setting_aws_ques->year->ViewCustomAttributes = "";

			// type_setting
			if (strval($t_setting_aws_ques->type_setting->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->type_setting->CurrentValue) {
					case "1":
						$t_setting_aws_ques->type_setting->ViewValue = "Thiet lap thoi gian khoa he thong dat cau hoi";
						break;
					case "2":
						$t_setting_aws_ques->type_setting->ViewValue = "Thiet lap thoi gian hen tra loi he thong";
						break;
					default:
						$t_setting_aws_ques->type_setting->ViewValue = $t_setting_aws_ques->type_setting->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->type_setting->ViewValue = NULL;
			}
			$t_setting_aws_ques->type_setting->CssStyle = "";
			$t_setting_aws_ques->type_setting->CssClass = "";
			$t_setting_aws_ques->type_setting->ViewCustomAttributes = "";

			// datetime
			$t_setting_aws_ques->datetime->ViewValue = $t_setting_aws_ques->datetime->CurrentValue;
			$t_setting_aws_ques->datetime->CssStyle = "";
			$t_setting_aws_ques->datetime->CssClass = "";
			$t_setting_aws_ques->datetime->ViewCustomAttributes = "";

			// active
			if (strval($t_setting_aws_ques->active->CurrentValue) <> "") {
				switch ($t_setting_aws_ques->active->CurrentValue) {
					case "0":
						$t_setting_aws_ques->active->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$t_setting_aws_ques->active->ViewValue = "Kich hoat";
						break;
					default:
						$t_setting_aws_ques->active->ViewValue = $t_setting_aws_ques->active->CurrentValue;
				}
			} else {
				$t_setting_aws_ques->active->ViewValue = NULL;
			}
			$t_setting_aws_ques->active->CssStyle = "";
			$t_setting_aws_ques->active->CssClass = "";
			$t_setting_aws_ques->active->ViewCustomAttributes = "";

			// year
			$t_setting_aws_ques->year->HrefValue = "";

			// type_setting
			$t_setting_aws_ques->type_setting->HrefValue = "";

			// datetime
			$t_setting_aws_ques->datetime->HrefValue = "";

			// active
			$t_setting_aws_ques->active->HrefValue = "";
		}

		// Call Row Rendered event
		$t_setting_aws_ques->Row_Rendered();
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
