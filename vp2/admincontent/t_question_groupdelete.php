<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_question_groupinfo.php" ?>
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
$t_question_group_delete = new ct_question_group_delete();
$Page =& $t_question_group_delete;

// Page init processing
$t_question_group_delete->Page_Init();

// Page main processing
$t_question_group_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_group_delete = new ew_Page("t_question_group_delete");

// page properties
t_question_group_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = t_question_group_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_question_group_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_group_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_group_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_group_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $t_question_group_delete->LoadRecordset();
$t_question_group_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($t_question_group_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$t_question_group_delete->Page_Terminate("t_question_grouplist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $t_question_group->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa nhóm câu hỏi</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							
</table>
<?php $t_question_group_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="t_question_group">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($t_question_group_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $t_question_group->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Mã nhóm</td>
		<td valign="top">Tên nhóm</td>
		<td valign="top">Mô tả</td>
	</tr>
	</thead>
	<tbody>
<?php
$t_question_group_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$t_question_group_delete->lRecCnt++;

	// Set row properties
	$t_question_group->CssClass = "";
	$t_question_group->CssStyle = "";
	$t_question_group->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$t_question_group_delete->LoadRowValues($rs);

	// Render row
	$t_question_group_delete->RenderRow();
?>
	<tr<?php echo $t_question_group->RowAttributes() ?>>
		<td<?php echo $t_question_group->ID->CellAttributes() ?>>
<div<?php echo $t_question_group->ID->ViewAttributes() ?>><?php echo $t_question_group->ID->ListViewValue() ?></div></td>
		<td<?php echo $t_question_group->NAME->CellAttributes() ?>>
<div<?php echo $t_question_group->NAME->ViewAttributes() ?>><?php echo $t_question_group->NAME->ListViewValue() ?></div></td>
		<td<?php echo $t_question_group->Description->CellAttributes() ?>>
<div<?php echo $t_question_group->Description->ViewAttributes() ?>><?php echo $t_question_group->Description->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="Xác nhận xóa">
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
class ct_question_group_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 't_question_group';

	// Page Object Name
	var $PageObjName = 't_question_group_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question_group;
		if ($t_question_group->UseTokenInUrl) $PageUrl .= "t=" . $t_question_group->TableVar . "&"; // add page token
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
		global $objForm, $t_question_group;
		if ($t_question_group->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question_group->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question_group->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_group_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question_group"] = new ct_question_group();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question_group', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question_group;

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
		global $t_question_group;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["ID"] <> "") {
			$t_question_group->ID->setQueryStringValue($_GET["ID"]);
			if (!is_numeric($t_question_group->ID->QueryStringValue))
				$this->Page_Terminate("t_question_grouplist.php"); // Prevent SQL injection, exit
			$sKey .= $t_question_group->ID->QueryStringValue;
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
			$this->Page_Terminate("t_question_grouplist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("t_question_grouplist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`ID`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in t_question_group class, t_question_groupinfo.php

		$t_question_group->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$t_question_group->CurrentAction = $_POST["a_delete"];
		} else {
			$t_question_group->CurrentAction = "I"; // Display record
		}
		switch ($t_question_group->CurrentAction) {
			case "D": // Delete
				$t_question_group->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($t_question_group->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $t_question_group;
		$DeleteRows = TRUE;
		$sWrkFilter = $t_question_group->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in t_question_group class, t_question_groupinfo.php

		$t_question_group->CurrentFilter = $sWrkFilter;
		$sSql = $t_question_group->SQL();
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
				$DeleteRows = $t_question_group->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['ID'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($t_question_group->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($t_question_group->CancelMessage <> "") {
				$this->setMessage($t_question_group->CancelMessage);
				$t_question_group->CancelMessage = "";
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
				$t_question_group->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_question_group;

		// Call Recordset Selecting event
		$t_question_group->Recordset_Selecting($t_question_group->CurrentFilter);

		// Load list page SQL
		$sSql = $t_question_group->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_question_group->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question_group;
		$sFilter = $t_question_group->KeyFilter();

		// Call Row Selecting event
		$t_question_group->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question_group->CurrentFilter = $sFilter;
		$sSql = $t_question_group->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question_group->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question_group;
		$t_question_group->ID->setDbValue($rs->fields('ID'));
		$t_question_group->NAME->setDbValue($rs->fields('NAME'));
		$t_question_group->Description->setDbValue($rs->fields('Description'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question_group;

		// Call Row_Rendering event
		$t_question_group->Row_Rendering();

		// Common render codes for all row types
		// ID

		$t_question_group->ID->CellCssStyle = "";
		$t_question_group->ID->CellCssClass = "";

		// NAME
		$t_question_group->NAME->CellCssStyle = "";
		$t_question_group->NAME->CellCssClass = "";

		// Description
		$t_question_group->Description->CellCssStyle = "";
		$t_question_group->Description->CellCssClass = "";
		if ($t_question_group->RowType == EW_ROWTYPE_VIEW) { // View row

			// ID
			$t_question_group->ID->ViewValue = $t_question_group->ID->CurrentValue;
			$t_question_group->ID->CssStyle = "";
			$t_question_group->ID->CssClass = "";
			$t_question_group->ID->ViewCustomAttributes = "";

			// NAME
			$t_question_group->NAME->ViewValue = $t_question_group->NAME->CurrentValue;
			$t_question_group->NAME->CssStyle = "";
			$t_question_group->NAME->CssClass = "";
			$t_question_group->NAME->ViewCustomAttributes = "";

			// Description
			$t_question_group->Description->ViewValue = $t_question_group->Description->CurrentValue;
			$t_question_group->Description->CssStyle = "";
			$t_question_group->Description->CssClass = "";
			$t_question_group->Description->ViewCustomAttributes = "";

			// ID
			$t_question_group->ID->HrefValue = "";

			// NAME
			$t_question_group->NAME->HrefValue = "";

			// Description
			$t_question_group->Description->HrefValue = "";
		}

		// Call Row Rendered event
		$t_question_group->Row_Rendered();
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
