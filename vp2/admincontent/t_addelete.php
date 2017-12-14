<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_adinfo.php" ?>
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
$t_ad_delete = new ct_ad_delete();
$Page =& $t_ad_delete;

// Page init processing
$t_ad_delete->Page_Init();

// Page main processing
$t_ad_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_ad_delete = new ew_Page("t_ad_delete");

// page properties
t_ad_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_ad_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_ad_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_ad_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_ad_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_ad_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_ad_delete->LoadRecordset();
$t_ad_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_ad_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_ad_delete->Page_Terminate("t_adlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: T Ad<br><br>
<a href="<?php echo $t_ad->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_ad_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_ad">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_ad_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_ad->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Cat ID</td>
		<td valign="top">Title</td>
		<td valign="top">Date C</td>
		<td valign="top">Status</td>
		<td valign="top">N Click</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_ad_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_ad_delete->lRecCnt++;

	// Set row properties
	$t_ad->CssClass = "";
	$t_ad->CssStyle = "";
	$t_ad->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_ad_delete->LoadRowValues($rs);

	// Render row
	$t_ad_delete->RenderRow();
?>
	<tr<?php echo $t_ad->RowAttributes() ?>>
		<td<?php echo $t_ad->cat_ID->CellAttributes() ?>>
<div<?php echo $t_ad->cat_ID->ViewAttributes() ?>><?php echo $t_ad->cat_ID->ListViewValue() ?></div></td>
		<td<?php echo $t_ad->Title->CellAttributes() ?>>
<div<?php echo $t_ad->Title->ViewAttributes() ?>><?php echo $t_ad->Title->ListViewValue() ?></div></td>
		<td<?php echo $t_ad->date_c->CellAttributes() ?>>
<div<?php echo $t_ad->date_c->ViewAttributes() ?>><?php echo $t_ad->date_c->ListViewValue() ?></div></td>
		<td<?php echo $t_ad->status->CellAttributes() ?>>
<div<?php echo $t_ad->status->ViewAttributes() ?>><?php echo $t_ad->status->ListViewValue() ?></div></td>
		<td<?php echo $t_ad->n_click->CellAttributes() ?>>
<div<?php echo $t_ad->n_click->ViewAttributes() ?>><?php echo $t_ad->n_click->ListViewValue() ?></div></td>
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
class ct_ad_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_ad';

	// Page Object Name
	var $PageObjName = 't_ad_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_ad;
		if ($t_ad->UseTokenInUrl) $PageUrl .= "t=" . $t_ad->TableVar . "&"; // add page token
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
		global $objForm, $t_ad;
		if ($t_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_ad_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_ad"] = new ct_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_ad;

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
		global $t_ad;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["ad_ID"] <> "") {
			$t_ad->ad_ID->setQueryStringValue($_GET["ad_ID"]);
			if (!is_numeric($t_ad->ad_ID->QueryStringValue))
				$this->Page_Terminate("t_adlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_ad->ad_ID->QueryStringValue;
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
			$this->Page_Terminate("t_adlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_adlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`ad_ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_ad class, t_adinfo.php

		$t_ad->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_ad->CurrentAction = $_POST["a_delete"];
		} else {
			$t_ad->CurrentAction = "I"; // Display record
		}
		switch ($t_ad->CurrentAction) {
			case "D": // Delete
				$t_ad->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_ad->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_ad;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_ad->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_ad class, t_adinfo.php

		$t_ad->CurrentFilter = $sWrkFilter;
		$sSql = $t_ad->SQL();
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
				$DeleteRows = $t_ad->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['ad_ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_ad->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_ad->CancelMessage <> "") {
				$this->setMessage($t_ad->CancelMessage);
				$t_ad->CancelMessage = "";
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
				$t_ad->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_ad;

		// Call Recordset Selecting event
		$t_ad->Recordset_Selecting($t_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $t_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_ad;
		$sFilter = $t_ad->KeyFilter();

		// Call Row Selecting event
		$t_ad->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_ad->CurrentFilter = $sFilter;
		$sSql = $t_ad->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_ad->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_ad;
		$t_ad->ad_ID->setDbValue($rs->fields('ad_ID'));
		$t_ad->cat_ID->setDbValue($rs->fields('cat_ID'));
		$t_ad->Title->setDbValue($rs->fields('Title'));
		$t_ad->content->setDbValue($rs->fields('content'));
		$t_ad->date_c->setDbValue($rs->fields('date_c'));
		$t_ad->zemail->setDbValue($rs->fields('email'));
		$t_ad->name->setDbValue($rs->fields('name'));
		$t_ad->phone->setDbValue($rs->fields('phone'));
		$t_ad->status->setDbValue($rs->fields('status'));
		$t_ad->n_click->setDbValue($rs->fields('n_click'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_ad;

		// Call Row_Rendering event
		$t_ad->Row_Rendering();

		// Common render codes for all row types
		// cat_ID

		$t_ad->cat_ID->CellCssStyle = "";
		$t_ad->cat_ID->CellCssClass = "";

		// Title
		$t_ad->Title->CellCssStyle = "";
		$t_ad->Title->CellCssClass = "";

		// date_c
		$t_ad->date_c->CellCssStyle = "";
		$t_ad->date_c->CellCssClass = "";

		// status
		$t_ad->status->CellCssStyle = "";
		$t_ad->status->CellCssClass = "";

		// n_click
		$t_ad->n_click->CellCssStyle = "";
		$t_ad->n_click->CellCssClass = "";
		if ($t_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// ad_ID
			$t_ad->ad_ID->ViewValue = $t_ad->ad_ID->CurrentValue;
			$t_ad->ad_ID->CssStyle = "";
			$t_ad->ad_ID->CssClass = "";
			$t_ad->ad_ID->ViewCustomAttributes = "";

			// cat_ID
			if (strval($t_ad->cat_ID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `name` FROM `t_cat_ad` WHERE `ad_catID` = " . ew_AdjustSql($t_ad->cat_ID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$t_ad->cat_ID->ViewValue = $rswrk->fields('name');
					$rswrk->Close();
				} else {
					$t_ad->cat_ID->ViewValue = $t_ad->cat_ID->CurrentValue;
				}
			} else {
				$t_ad->cat_ID->ViewValue = NULL;
			}
			$t_ad->cat_ID->CssStyle = "";
			$t_ad->cat_ID->CssClass = "";
			$t_ad->cat_ID->ViewCustomAttributes = "";

			// Title
			$t_ad->Title->ViewValue = $t_ad->Title->CurrentValue;
			$t_ad->Title->CssStyle = "";
			$t_ad->Title->CssClass = "";
			$t_ad->Title->ViewCustomAttributes = "";

			// date_c
			$t_ad->date_c->ViewValue = $t_ad->date_c->CurrentValue;
			$t_ad->date_c->ViewValue = ew_FormatDateTime($t_ad->date_c->ViewValue, 7);
			$t_ad->date_c->CssStyle = "";
			$t_ad->date_c->CssClass = "";
			$t_ad->date_c->ViewCustomAttributes = "";

			// phone
			$t_ad->phone->ViewValue = $t_ad->phone->CurrentValue;
			$t_ad->phone->CssStyle = "";
			$t_ad->phone->CssClass = "";
			$t_ad->phone->ViewCustomAttributes = "";

			// status
			$t_ad->status->ViewValue = $t_ad->status->CurrentValue;
			$t_ad->status->CssStyle = "";
			$t_ad->status->CssClass = "";
			$t_ad->status->ViewCustomAttributes = "";

			// n_click
			$t_ad->n_click->ViewValue = $t_ad->n_click->CurrentValue;
			$t_ad->n_click->CssStyle = "";
			$t_ad->n_click->CssClass = "";
			$t_ad->n_click->ViewCustomAttributes = "";

			// cat_ID
			$t_ad->cat_ID->HrefValue = "";

			// Title
			$t_ad->Title->HrefValue = "";

			// date_c
			$t_ad->date_c->HrefValue = "";

			// status
			$t_ad->status->HrefValue = "";

			// n_click
			$t_ad->n_click->HrefValue = "";
		}

		// Call Row Rendered event
		$t_ad->Row_Rendered();
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
