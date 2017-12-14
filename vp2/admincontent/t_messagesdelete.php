<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_messagesinfo.php" ?>
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
$t_messages_delete = new ct_messages_delete();
$Page =& $t_messages_delete;

// Page init processing
$t_messages_delete->Page_Init();

// Page main processing
$t_messages_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_messages_delete = new ew_Page("t_messages_delete");

// page properties
t_messages_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_messages_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_messages_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_messages_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_messages_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_messages_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_messages_delete->LoadRecordset();
$t_messages_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_messages_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_messages_delete->Page_Terminate("t_messageslist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: T Messages<br><br>
<a href="<?php echo $t_messages->getReturnUrl() ?>">Go Back</a></span></p>
<?php $t_messages_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_messages">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_messages_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_messages->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Name</td>
		<td valign="top">Public</td>
		<td valign="top">Datetime C</td>
		<td valign="top">Source</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_messages_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_messages_delete->lRecCnt++;

	// Set row properties
	$t_messages->CssClass = "";
	$t_messages->CssStyle = "";
	$t_messages->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_messages_delete->LoadRowValues($rs);

	// Render row
	$t_messages_delete->RenderRow();
?>
	<tr<?php echo $t_messages->RowAttributes() ?>>
		<td<?php echo $t_messages->Name->CellAttributes() ?>>
<div<?php echo $t_messages->Name->ViewAttributes() ?>><?php echo $t_messages->Name->ListViewValue() ?></div></td>
		<td<?php echo $t_messages->Public->CellAttributes() ?>>
<div<?php echo $t_messages->Public->ViewAttributes() ?>><?php echo $t_messages->Public->ListViewValue() ?></div></td>
		<td<?php echo $t_messages->Datetime_C->CellAttributes() ?>>
<div<?php echo $t_messages->Datetime_C->ViewAttributes() ?>><?php echo $t_messages->Datetime_C->ListViewValue() ?></div></td>
		<td<?php echo $t_messages->Source->CellAttributes() ?>>
<div<?php echo $t_messages->Source->ViewAttributes() ?>><?php echo $t_messages->Source->ListViewValue() ?></div></td>
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
class ct_messages_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_messages';

	// Page Object Name
	var $PageObjName = 't_messages_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_messages;
		if ($t_messages->UseTokenInUrl) $PageUrl .= "t=" . $t_messages->TableVar . "&"; // add page token
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
		global $objForm, $t_messages;
		if ($t_messages->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_messages->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_messages->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_messages_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_messages"] = new ct_messages();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_messages', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_messages;

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
		global $t_messages;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["Id_Messages"] <> "") {
			$t_messages->Id_Messages->setQueryStringValue($_GET["Id_Messages"]);
			if (!is_numeric($t_messages->Id_Messages->QueryStringValue))
				$this->Page_Terminate("t_messageslist.php"); // Prevent SQL injection, exit
			$sKey .= $t_messages->Id_Messages->QueryStringValue;
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
			$this->Page_Terminate("t_messageslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_messageslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`Id_Messages`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_messages class, t_messagesinfo.php

		$t_messages->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_messages->CurrentAction = $_POST["a_delete"];
		} else {
			$t_messages->CurrentAction = "D"; // Delete record directly
		}
		switch ($t_messages->CurrentAction) {
			case "D": // Delete
				$t_messages->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_messages->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_messages;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_messages->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_messages class, t_messagesinfo.php

		$t_messages->CurrentFilter = $sWrkFilter;
		$sSql = $t_messages->SQL();
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
				$DeleteRows = $t_messages->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['Id_Messages'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_messages->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_messages->CancelMessage <> "") {
				$this->setMessage($t_messages->CancelMessage);
				$t_messages->CancelMessage = "";
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
				$t_messages->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_messages;

		// Call Recordset Selecting event
		$t_messages->Recordset_Selecting($t_messages->CurrentFilter);

		// Load list page SQL
		$sSql = $t_messages->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_messages->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_messages;
		$sFilter = $t_messages->KeyFilter();

		// Call Row Selecting event
		$t_messages->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_messages->CurrentFilter = $sFilter;
		$sSql = $t_messages->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_messages->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_messages;
		$t_messages->Id_Messages->setDbValue($rs->fields('Id_Messages'));
		$t_messages->Name->setDbValue($rs->fields('Name'));
		$t_messages->Content->setDbValue($rs->fields('Content'));
		$t_messages->Doc->Upload->DbValue = $rs->fields('Doc');
		$t_messages->Public->setDbValue($rs->fields('Public'));
		$t_messages->Datetime_C->setDbValue($rs->fields('Datetime_C'));
		$t_messages->Source->setDbValue($rs->fields('Source'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_messages;

		// Call Row_Rendering event
		$t_messages->Row_Rendering();

		// Common render codes for all row types
		// Name

		$t_messages->Name->CellCssStyle = "";
		$t_messages->Name->CellCssClass = "";

		// Public
		$t_messages->Public->CellCssStyle = "";
		$t_messages->Public->CellCssClass = "";

		// Datetime_C
		$t_messages->Datetime_C->CellCssStyle = "";
		$t_messages->Datetime_C->CellCssClass = "";

		// Source
		$t_messages->Source->CellCssStyle = "";
		$t_messages->Source->CellCssClass = "";
		if ($t_messages->RowType == EW_ROWTYPE_VIEW) { // View row

			// Id_Messages
			$t_messages->Id_Messages->ViewValue = $t_messages->Id_Messages->CurrentValue;
			$t_messages->Id_Messages->CssStyle = "";
			$t_messages->Id_Messages->CssClass = "";
			$t_messages->Id_Messages->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->ViewValue = $t_messages->Name->CurrentValue;
			$t_messages->Name->CssStyle = "";
			$t_messages->Name->CssClass = "";
			$t_messages->Name->ViewCustomAttributes = "";

			// Doc
			if (!is_null($t_messages->Doc->Upload->DbValue)) {
				$t_messages->Doc->ViewValue = $t_messages->Doc->Upload->DbValue;
			} else {
				$t_messages->Doc->ViewValue = "";
			}
			$t_messages->Doc->CssStyle = "";
			$t_messages->Doc->CssClass = "";
			$t_messages->Doc->ViewCustomAttributes = "";

			// Public
			if (strval($t_messages->Public->CurrentValue) <> "") {
				switch ($t_messages->Public->CurrentValue) {
					case "0":
						$t_messages->Public->ViewValue = "Chua";
						break;
					case "1":
						$t_messages->Public->ViewValue = "Xu?t b?n";
						break;
					default:
						$t_messages->Public->ViewValue = $t_messages->Public->CurrentValue;
				}
			} else {
				$t_messages->Public->ViewValue = NULL;
			}
			$t_messages->Public->CssStyle = "";
			$t_messages->Public->CssClass = "";
			$t_messages->Public->ViewCustomAttributes = "";

			// Datetime_C
			$t_messages->Datetime_C->ViewValue = $t_messages->Datetime_C->CurrentValue;
			$t_messages->Datetime_C->ViewValue = ew_FormatDateTime($t_messages->Datetime_C->ViewValue, 7);
			$t_messages->Datetime_C->CssStyle = "";
			$t_messages->Datetime_C->CssClass = "";
			$t_messages->Datetime_C->ViewCustomAttributes = "";

			// Source
			$t_messages->Source->ViewValue = $t_messages->Source->CurrentValue;
			$t_messages->Source->CssStyle = "";
			$t_messages->Source->CssClass = "";
			$t_messages->Source->ViewCustomAttributes = "";

			// Name
			$t_messages->Name->HrefValue = "";

			// Public
			$t_messages->Public->HrefValue = "";

			// Datetime_C
			$t_messages->Datetime_C->HrefValue = "";

			// Source
			$t_messages->Source->HrefValue = "";
		}

		// Call Row Rendered event
		$t_messages->Row_Rendered();
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
