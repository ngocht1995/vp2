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
$t_cat_ad_delete = new ct_cat_ad_delete();
$Page =& $t_cat_ad_delete;

// Page init processing
$t_cat_ad_delete->Page_Init();

// Page main processing
$t_cat_ad_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_cat_ad_delete = new ew_Page("t_cat_ad_delete");

// page properties
t_cat_ad_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_cat_ad_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_cat_ad_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_cat_ad_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_cat_ad_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_cat_ad_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_cat_ad_delete->LoadRecordset();
$t_cat_ad_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_cat_ad_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_cat_ad_delete->Page_Terminate("t_cat_adlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: T Cat Ad<br><br>
<a href="<?php echo $t_cat_ad->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_cat_ad_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_cat_ad">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_cat_ad_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_cat_ad->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Ad Cat ID</td>
		<td valign="top">Parentid</td>
		<td valign="top">Name</td>
		<td valign="top">Cat Order</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_cat_ad_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_cat_ad_delete->lRecCnt++;

	// Set row properties
	$t_cat_ad->CssClass = "";
	$t_cat_ad->CssStyle = "";
	$t_cat_ad->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_cat_ad_delete->LoadRowValues($rs);

	// Render row
	$t_cat_ad_delete->RenderRow();
?>
	<tr<?php echo $t_cat_ad->RowAttributes() ?>>
		<td<?php echo $t_cat_ad->ad_catID->CellAttributes() ?>>
<div<?php echo $t_cat_ad->ad_catID->ViewAttributes() ?>><?php echo $t_cat_ad->ad_catID->ListViewValue() ?></div></td>
		<td<?php echo $t_cat_ad->parentid->CellAttributes() ?>>
<div<?php echo $t_cat_ad->parentid->ViewAttributes() ?>><?php echo $t_cat_ad->parentid->ListViewValue() ?></div></td>
		<td<?php echo $t_cat_ad->name->CellAttributes() ?>>
<div<?php echo $t_cat_ad->name->ViewAttributes() ?>><?php echo $t_cat_ad->name->ListViewValue() ?></div></td>
		<td<?php echo $t_cat_ad->cat_order->CellAttributes() ?>>
<div<?php echo $t_cat_ad->cat_order->ViewAttributes() ?>><?php echo $t_cat_ad->cat_order->ListViewValue() ?></div></td>
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
class ct_cat_ad_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_cat_ad';

	// Page Object Name
	var $PageObjName = 't_cat_ad_delete';

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
	function ct_cat_ad_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_cat_ad"] = new ct_cat_ad();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

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
	var $lTotalRecs;
	var $lRecCnt;
	var $arRecKeys = array();

	// Page main processing
	function Page_Main() {
		global $t_cat_ad;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["ad_catID"] <> "") {
			$t_cat_ad->ad_catID->setQueryStringValue($_GET["ad_catID"]);
			if (!is_numeric($t_cat_ad->ad_catID->QueryStringValue))
				$this->Page_Terminate("t_cat_adlist.php"); // Prevent SQL injection, exit
			$sKey .= $t_cat_ad->ad_catID->QueryStringValue;
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
			$this->Page_Terminate("t_cat_adlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_cat_adlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`ad_catID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_cat_ad class, t_cat_adinfo.php

		$t_cat_ad->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_cat_ad->CurrentAction = $_POST["a_delete"];
		} else {
			$t_cat_ad->CurrentAction = "I"; // Display record
		}
		switch ($t_cat_ad->CurrentAction) {
			case "D": // Delete
				$t_cat_ad->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_cat_ad->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_cat_ad;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_cat_ad->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_cat_ad class, t_cat_adinfo.php

		$t_cat_ad->CurrentFilter = $sWrkFilter;
		$sSql = $t_cat_ad->SQL();
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
				$DeleteRows = $t_cat_ad->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['ad_catID'];
				@unlink(ew_UploadPathEx(TRUE, "upload/iconcat_ad/") . $row['cat_icon']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_cat_ad->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_cat_ad->CancelMessage <> "") {
				$this->setMessage($t_cat_ad->CancelMessage);
				$t_cat_ad->CancelMessage = "";
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
				$t_cat_ad->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_cat_ad;

		// Call Recordset Selecting event
		$t_cat_ad->Recordset_Selecting($t_cat_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $t_cat_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_cat_ad->Recordset_Selected($rs);
		return $rs;
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
		// ad_catID

		$t_cat_ad->ad_catID->CellCssStyle = "";
		$t_cat_ad->ad_catID->CellCssClass = "";

		// parentid
		$t_cat_ad->parentid->CellCssStyle = "";
		$t_cat_ad->parentid->CellCssClass = "";

		// name
		$t_cat_ad->name->CellCssStyle = "";
		$t_cat_ad->name->CellCssClass = "";

		// cat_order
		$t_cat_ad->cat_order->CellCssStyle = "";
		$t_cat_ad->cat_order->CellCssClass = "";
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

			// ad_catID
			$t_cat_ad->ad_catID->HrefValue = "";

			// parentid
			$t_cat_ad->parentid->HrefValue = "";

			// name
			$t_cat_ad->name->HrefValue = "";

			// cat_order
			$t_cat_ad->cat_order->HrefValue = "";
		}

		// Call Row Rendered event
		$t_cat_ad->Row_Rendered();
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
