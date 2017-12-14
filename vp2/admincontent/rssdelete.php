<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "rssinfo.php" ?>
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
$rss_delete = new crss_delete();
$Page =& $rss_delete;

// Page init processing
$rss_delete->Page_Init();

// Page main processing
$rss_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var rss_delete = new ew_Page("rss_delete");

// page properties
rss_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = rss_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
rss_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
rss_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
rss_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
rss_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $rss_delete->LoadRecordset();
$rss_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($rss_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$rss_delete->Page_Terminate("rsslist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Rss<br><br>
<a href="<?php echo $rss->getReturnUrl() ?>">Go Back</a></span></p>
<?php $rss_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="rss">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($rss_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $rss->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Rss Name</td>
		<td valign="top">Rss Order</td>
		<td valign="top">Rss State</td>
		<td valign="top">Rss Type</td>
	</tr>
	</thead>
	<tbody>
<?php
$rss_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$rss_delete->lRecCnt++;

	// Set row properties
	$rss->CssClass = "";
	$rss->CssStyle = "";
	$rss->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$rss_delete->LoadRowValues($rs);

	// Render row
	$rss_delete->RenderRow();
?>
	<tr<?php echo $rss->RowAttributes() ?>>
		<td<?php echo $rss->rss_name->CellAttributes() ?>>
<div<?php echo $rss->rss_name->ViewAttributes() ?>><?php echo $rss->rss_name->ListViewValue() ?></div></td>
		<td<?php echo $rss->rss_order->CellAttributes() ?>>
<div<?php echo $rss->rss_order->ViewAttributes() ?>><?php echo $rss->rss_order->ListViewValue() ?></div></td>
		<td<?php echo $rss->rss_state->CellAttributes() ?>>
<div<?php echo $rss->rss_state->ViewAttributes() ?>><?php echo $rss->rss_state->ListViewValue() ?></div></td>
		<td<?php echo $rss->rss_type->CellAttributes() ?>>
<div<?php echo $rss->rss_type->ViewAttributes() ?>><?php echo $rss->rss_type->ListViewValue() ?></div></td>
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
class crss_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'rss';

	// Page Object Name
	var $PageObjName = 'rss_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $rss;
		if ($rss->UseTokenInUrl) $PageUrl .= "t=" . $rss->TableVar . "&"; // add page token
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
		global $objForm, $rss;
		if ($rss->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($rss->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($rss->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function crss_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["rss"] = new crss();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'rss', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $rss;
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
			$this->Page_Terminate("rsslist.php");
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
		global $rss;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["rss_id"] <> "") {
			$rss->rss_id->setQueryStringValue($_GET["rss_id"]);
			if (!is_numeric($rss->rss_id->QueryStringValue))
				$this->Page_Terminate("rsslist.php"); // Prevent SQL injection, exit
			$sKey .= $rss->rss_id->QueryStringValue;
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
			$this->Page_Terminate("rsslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("rsslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`rss_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in rss class, rssinfo.php

		$rss->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$rss->CurrentAction = $_POST["a_delete"];
		} else {
			$rss->CurrentAction = "D"; // Delete record directly
		}
		switch ($rss->CurrentAction) {
			case "D": // Delete
				$rss->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($rss->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $rss;
		$DeleteRows = TRUE;
		$sWrkFilter = $rss->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in rss class, rssinfo.php

		$rss->CurrentFilter = $sWrkFilter;
		$sSql = $rss->SQL();
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
				$DeleteRows = $rss->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['rss_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($rss->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($rss->CancelMessage <> "") {
				$this->setMessage($rss->CancelMessage);
				$rss->CancelMessage = "";
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
				$rss->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $rss;

		// Call Recordset Selecting event
		$rss->Recordset_Selecting($rss->CurrentFilter);

		// Load list page SQL
		$sSql = $rss->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$rss->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $rss;
		$sFilter = $rss->KeyFilter();

		// Call Row Selecting event
		$rss->Row_Selecting($sFilter);

		// Load sql based on filter
		$rss->CurrentFilter = $sFilter;
		$sSql = $rss->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$rss->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $rss;
		$rss->rss_id->setDbValue($rs->fields('rss_id'));
		$rss->rss_name->setDbValue($rs->fields('rss_name'));
		$rss->rss_link->setDbValue($rs->fields('rss_link'));
		$rss->rss_order->setDbValue($rs->fields('rss_order'));
		$rss->rss_state->setDbValue($rs->fields('rss_state'));
		$rss->rss_type->setDbValue($rs->fields('rss_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $rss;

		// Call Row_Rendering event
		$rss->Row_Rendering();

		// Common render codes for all row types
		// rss_name

		$rss->rss_name->CellCssStyle = "";
		$rss->rss_name->CellCssClass = "";

		// rss_order
		$rss->rss_order->CellCssStyle = "";
		$rss->rss_order->CellCssClass = "";

		// rss_state
		$rss->rss_state->CellCssStyle = "";
		$rss->rss_state->CellCssClass = "";

		// rss_type
		$rss->rss_type->CellCssStyle = "";
		$rss->rss_type->CellCssClass = "";
		if ($rss->RowType == EW_ROWTYPE_VIEW) { // View row

			// rss_id
			$rss->rss_id->ViewValue = $rss->rss_id->CurrentValue;
			$rss->rss_id->CssStyle = "";
			$rss->rss_id->CssClass = "";
			$rss->rss_id->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->ViewValue = $rss->rss_name->CurrentValue;
			$rss->rss_name->CssStyle = "";
			$rss->rss_name->CssClass = "";
			$rss->rss_name->ViewCustomAttributes = "";

			// rss_link
			$rss->rss_link->ViewValue = $rss->rss_link->CurrentValue;
			$rss->rss_link->CssStyle = "";
			$rss->rss_link->CssClass = "";
			$rss->rss_link->ViewCustomAttributes = "";

			// rss_order
			$rss->rss_order->ViewValue = $rss->rss_order->CurrentValue;
			$rss->rss_order->CssStyle = "";
			$rss->rss_order->CssClass = "";
			$rss->rss_order->ViewCustomAttributes = "";

			// rss_state
			if (strval($rss->rss_state->CurrentValue) <> "") {
				switch ($rss->rss_state->CurrentValue) {
					case "0":
						$rss->rss_state->ViewValue = "Không hiển thị";
						break;
					case "1":
						$rss->rss_state->ViewValue = "Hiển thị";
						break;
					default:
						$rss->rss_state->ViewValue = $rss->rss_state->CurrentValue;
				}
			} else {
				$rss->rss_state->ViewValue = NULL;
			}
			$rss->rss_state->CssStyle = "";
			$rss->rss_state->CssClass = "";
			$rss->rss_state->ViewCustomAttributes = "";

			// rss_type
			if (strval($rss->rss_type->CurrentValue) <> "") {
				switch ($rss->rss_type->CurrentValue) {
					case "1":
						$rss->rss_type->ViewValue = "Chào mua";
						break;
					case "2":
						$rss->rss_type->ViewValue = "Chào bán";
						break;
					case "3":
						$rss->rss_type->ViewValue = "Sản phẩm";
						break;
					default:
						$rss->rss_type->ViewValue = $rss->rss_type->CurrentValue;
				}
			} else {
				$rss->rss_type->ViewValue = NULL;
			}
			$rss->rss_type->CssStyle = "";
			$rss->rss_type->CssClass = "";
			$rss->rss_type->ViewCustomAttributes = "";

			// rss_name
			$rss->rss_name->HrefValue = "";

			// rss_order
			$rss->rss_order->HrefValue = "";

			// rss_state
			$rss->rss_state->HrefValue = "";

			// rss_type
			$rss->rss_type->HrefValue = "";
		}

		// Call Row Rendered event
		$rss->Row_Rendered();
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
