<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "payment_accountinfo.php" ?>
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
$payment_account_delete = new cpayment_account_delete();
$Page =& $payment_account_delete;

// Page init processing
$payment_account_delete->Page_Init();

// Page main processing
$payment_account_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var payment_account_delete = new ew_Page("payment_account_delete");

// page properties
payment_account_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = payment_account_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
payment_account_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
payment_account_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
payment_account_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
payment_account_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $payment_account_delete->LoadRecordset();
$payment_account_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($payment_account_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$payment_account_delete->Page_Terminate("payment_accountlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Payment Account<br><br>
<a href="<?php echo $payment_account->getReturnUrl() ?>">Go Back</a></span></p>
<?php $payment_account_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="payment_account">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($payment_account_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $payment_account->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">User Id</td>
		<td valign="top">User Acount</td>
		<td valign="top">Payment Account Type</td>
	</tr>
	</thead>
	<tbody>
<?php
$payment_account_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$payment_account_delete->lRecCnt++;

	// Set row properties
	$payment_account->CssClass = "";
	$payment_account->CssStyle = "";
	$payment_account->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$payment_account_delete->LoadRowValues($rs);

	// Render row
	$payment_account_delete->RenderRow();
?>
	<tr<?php echo $payment_account->RowAttributes() ?>>
		<td<?php echo $payment_account->user_id->CellAttributes() ?>>
<div<?php echo $payment_account->user_id->ViewAttributes() ?>><?php echo $payment_account->user_id->ListViewValue() ?></div></td>
		<td<?php echo $payment_account->user_account->CellAttributes() ?>>
<div<?php echo $payment_account->user_account->ViewAttributes() ?>><?php echo $payment_account->user_account->ListViewValue() ?></div></td>
		<td<?php echo $payment_account->payment_account_type->CellAttributes() ?>>
<div<?php echo $payment_account->payment_account_type->ViewAttributes() ?>><?php echo $payment_account->payment_account_type->ListViewValue() ?></div></td>
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
class cpayment_account_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'payment_account';

	// Page Object Name
	var $PageObjName = 'payment_account_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $payment_account;
		if ($payment_account->UseTokenInUrl) $PageUrl .= "t=" . $payment_account->TableVar . "&"; // add page token
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
		global $objForm, $payment_account;
		if ($payment_account->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($payment_account->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($payment_account->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cpayment_account_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["payment_account"] = new cpayment_account();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'payment_account', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $payment_account;
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
			$this->Page_Terminate("payment_accountlist.php");
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
		global $payment_account;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["payment_account_id"] <> "") {
			$payment_account->payment_account_id->setQueryStringValue($_GET["payment_account_id"]);
			if (!is_numeric($payment_account->payment_account_id->QueryStringValue))
				$this->Page_Terminate("payment_accountlist.php"); // Prevent SQL injection, exit
			$sKey .= $payment_account->payment_account_id->QueryStringValue;
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
			$this->Page_Terminate("payment_accountlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("payment_accountlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`payment_account_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in payment_account class, payment_accountinfo.php

		$payment_account->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$payment_account->CurrentAction = $_POST["a_delete"];
		} else {
			//$payment_account->CurrentAction = "I"; // Display record
                    $payment_account->CurrentAction = "D"; // Delete Directly
		}
		switch ($payment_account->CurrentAction) {
			case "D": // Delete
				$payment_account->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($payment_account->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $payment_account;
		$DeleteRows = TRUE;
		$sWrkFilter = $payment_account->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in payment_account class, payment_accountinfo.php

		$payment_account->CurrentFilter = $sWrkFilter;
		$sSql = $payment_account->SQL();
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
				$DeleteRows = $payment_account->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['payment_account_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($payment_account->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($payment_account->CancelMessage <> "") {
				$this->setMessage($payment_account->CancelMessage);
				$payment_account->CancelMessage = "";
			} else {
				$this->setMessage("Xóa dữ liệu thành công");
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
				$payment_account->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $payment_account;

		// Call Recordset Selecting event
		$payment_account->Recordset_Selecting($payment_account->CurrentFilter);

		// Load list page SQL
		$sSql = $payment_account->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$payment_account->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $payment_account;
		$sFilter = $payment_account->KeyFilter();

		// Call Row Selecting event
		$payment_account->Row_Selecting($sFilter);

		// Load sql based on filter
		$payment_account->CurrentFilter = $sFilter;
		$sSql = $payment_account->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$payment_account->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $payment_account;
		$payment_account->payment_account_id->setDbValue($rs->fields('payment_account_id'));
		$payment_account->user_id->setDbValue($rs->fields('user_id'));
		$payment_account->user_account->setDbValue($rs->fields('user_account'));
		$payment_account->payment_account_type->setDbValue($rs->fields('payment_account_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $payment_account;

		// Call Row_Rendering event
		$payment_account->Row_Rendering();

		// Common render codes for all row types
		// user_id

		$payment_account->user_id->CellCssStyle = "";
		$payment_account->user_id->CellCssClass = "";

		// user_account
		$payment_account->user_account->CellCssStyle = "";
		$payment_account->user_account->CellCssClass = "";

		// payment_account_type
		$payment_account->payment_account_type->CellCssStyle = "";
		$payment_account->payment_account_type->CellCssClass = "";
		if ($payment_account->RowType == EW_ROWTYPE_VIEW) { // View row

			// user_id
			$payment_account->user_id->ViewValue = $payment_account->user_id->CurrentValue;
			if (strval($payment_account->user_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `tendangnhap`, `ten_congty` FROM `user` WHERE `nguoidung_id` = " . ew_AdjustSql($payment_account->user_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$payment_account->user_id->ViewValue = $rswrk->fields('tendangnhap');
					$payment_account->user_id->ViewValue .= ew_ValueSeparator(0) . $rswrk->fields('ten_congty');
					$rswrk->Close();
				} else {
					$payment_account->user_id->ViewValue = $payment_account->user_id->CurrentValue;
				}
			} else {
				$payment_account->user_id->ViewValue = NULL;
			}
			$payment_account->user_id->CssStyle = "";
			$payment_account->user_id->CssClass = "";
			$payment_account->user_id->ViewCustomAttributes = "";

			// user_account
			$payment_account->user_account->ViewValue = $payment_account->user_account->CurrentValue;
			$payment_account->user_account->CssStyle = "";
			$payment_account->user_account->CssClass = "";
			$payment_account->user_account->ViewCustomAttributes = "";

			// payment_account_type
			if (strval($payment_account->payment_account_type->CurrentValue) <> "") {
				switch ($payment_account->payment_account_type->CurrentValue) {
					case "1":
						$payment_account->payment_account_type->ViewValue = "Tai khoan Ngan luong";
						break;
					default:
						$payment_account->payment_account_type->ViewValue = $payment_account->payment_account_type->CurrentValue;
				}
			} else {
				$payment_account->payment_account_type->ViewValue = NULL;
			}
			$payment_account->payment_account_type->CssStyle = "";
			$payment_account->payment_account_type->CssClass = "";
			$payment_account->payment_account_type->ViewCustomAttributes = "";

			// user_id
			$payment_account->user_id->HrefValue = "";

			// user_account
			$payment_account->user_account->HrefValue = "";

			// payment_account_type
			$payment_account->payment_account_type->HrefValue = "";
		}

		// Call Row Rendered event
		$payment_account->Row_Rendered();
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
