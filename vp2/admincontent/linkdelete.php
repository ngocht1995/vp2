<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "linkinfo.php" ?>
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
$link_delete = new clink_delete();
$Page =& $link_delete;

// Page init processing
$link_delete->Page_Init();

// Page main processing
$link_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var link_delete = new ew_Page("link_delete");

// page properties
link_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = link_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
link_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
link_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
link_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
link_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $link_delete->LoadRecordset();
$link_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($link_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$link_delete->Page_Terminate("linklist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Link<br><br>
<a href="<?php echo $link->getReturnUrl() ?>">Go Back</a></span></p>
<?php $link_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="link">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($link_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $link->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Link Name</td>
		<td valign="top">Link Url</td>
		<td valign="top">Link Status</td>
	</tr>
	</thead>
	<tbody>
<?php
$link_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$link_delete->lRecCnt++;

	// Set row properties
	$link->CssClass = "";
	$link->CssStyle = "";
	$link->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$link_delete->LoadRowValues($rs);

	// Render row
	$link_delete->RenderRow();
?>
	<tr<?php echo $link->RowAttributes() ?>>
		<td<?php echo $link->link_name->CellAttributes() ?>>
<div<?php echo $link->link_name->ViewAttributes() ?>><?php echo $link->link_name->ListViewValue() ?></div></td>
		<td<?php echo $link->link_url->CellAttributes() ?>>
<div<?php echo $link->link_url->ViewAttributes() ?>><?php echo $link->link_url->ListViewValue() ?></div></td>
		<td<?php echo $link->link_status->CellAttributes() ?>>
<div<?php echo $link->link_status->ViewAttributes() ?>><?php echo $link->link_status->ListViewValue() ?></div></td>
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
class clink_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'link';

	// Page Object Name
	var $PageObjName = 'link_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $link;
		if ($link->UseTokenInUrl) $PageUrl .= "t=" . $link->TableVar . "&"; // add page token
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
		global $objForm, $link;
		if ($link->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($link->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($link->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function clink_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["link"] = new clink();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'link', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $link;
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
			$this->Page_Terminate("linklist.php");
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
		global $link;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["link_id"] <> "") {
			$link->link_id->setQueryStringValue($_GET["link_id"]);
			if (!is_numeric($link->link_id->QueryStringValue))
				$this->Page_Terminate("linklist.php"); // Prevent SQL injection, exit
			$sKey .= $link->link_id->QueryStringValue;
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
			$this->Page_Terminate("linklist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("linklist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`link_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in link class, linkinfo.php

		$link->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$link->CurrentAction = $_POST["a_delete"];
		} else {
			$link->CurrentAction = "D"; // Display record
		}
		switch ($link->CurrentAction) {
			case "D": // Delete
				$link->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa thành công"); // Set up success message
					$this->Page_Terminate($link->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $link;
		$DeleteRows = TRUE;
		$sWrkFilter = $link->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in link class, linkinfo.php

		$link->CurrentFilter = $sWrkFilter;
		$sSql = $link->SQL();
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
				$DeleteRows = $link->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['link_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($link->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($link->CancelMessage <> "") {
				$this->setMessage($link->CancelMessage);
				$link->CancelMessage = "";
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
				$link->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $link;

		// Call Recordset Selecting event
		$link->Recordset_Selecting($link->CurrentFilter);

		// Load list page SQL
		$sSql = $link->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$link->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $link;
		$sFilter = $link->KeyFilter();

		// Call Row Selecting event
		$link->Row_Selecting($sFilter);

		// Load sql based on filter
		$link->CurrentFilter = $sFilter;
		$sSql = $link->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$link->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $link;
		$link->link_id->setDbValue($rs->fields('link_id'));
		$link->link_name->setDbValue($rs->fields('link_name'));
		$link->link_url->setDbValue($rs->fields('link_url'));
		$link->link_status->setDbValue($rs->fields('link_status'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $link;

		// Call Row_Rendering event
		$link->Row_Rendering();

		// Common render codes for all row types
		// link_name

		$link->link_name->CellCssStyle = "";
		$link->link_name->CellCssClass = "";

		// link_url
		$link->link_url->CellCssStyle = "";
		$link->link_url->CellCssClass = "";

		// link_status
		$link->link_status->CellCssStyle = "";
		$link->link_status->CellCssClass = "";
		if ($link->RowType == EW_ROWTYPE_VIEW) { // View row

			// link_name
			$link->link_name->ViewValue = $link->link_name->CurrentValue;
			$link->link_name->CssStyle = "";
			$link->link_name->CssClass = "";
			$link->link_name->ViewCustomAttributes = "";

			// link_url
			$link->link_url->ViewValue = $link->link_url->CurrentValue;
			$link->link_url->CssStyle = "";
			$link->link_url->CssClass = "";
			$link->link_url->ViewCustomAttributes = "";

			// link_status
			if (strval($link->link_status->CurrentValue) <> "") {
				switch ($link->link_status->CurrentValue) {
					case "0":
						$link->link_status->ViewValue = "Kh�ng hi?n th?";
						break;
					case "1":
						$link->link_status->ViewValue = "Hi?n th?";
						break;
					default:
						$link->link_status->ViewValue = $link->link_status->CurrentValue;
				}
			} else {
				$link->link_status->ViewValue = NULL;
			}
			$link->link_status->CssStyle = "";
			$link->link_status->CssClass = "";
			$link->link_status->ViewCustomAttributes = "";

			// link_name
			$link->link_name->HrefValue = "";

			// link_url
			$link->link_url->HrefValue = "";

			// link_status
			$link->link_status->HrefValue = "";
		}

		// Call Row Rendered event
		$link->Row_Rendered();
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
