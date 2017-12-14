<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersAdmininfo.php" ?>
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
$UsersAdmin_delete = new cUsersAdmin_delete();
$Page =& $UsersAdmin_delete;

// Page init processing
$UsersAdmin_delete->Page_Init();

// Page main processing
$UsersAdmin_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var UsersAdmin_delete = new ew_Page("UsersAdmin_delete");

// page properties
UsersAdmin_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = UsersAdmin_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
UsersAdmin_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersAdmin_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersAdmin_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersAdmin_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $UsersAdmin_delete->LoadRecordset();
$UsersAdmin_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($UsersAdmin_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$UsersAdmin_delete->Page_Terminate("UsersAdminlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From CUSTOM VIEW: Users Admin<br><br>
<a href="<?php echo $UsersAdmin->getReturnUrl() ?>">Go Back</a></span></p>
<?php $UsersAdmin_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="UsersAdmin">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($UsersAdmin_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $UsersAdmin->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Nguoidung Option</td>
		<td valign="top">Tendangnhap</td>
		<td valign="top">Truycap Gannhat</td>
		<td valign="top">User Level ID</td>
	</tr>
	</thead>
	<tbody>
<?php
$UsersAdmin_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$UsersAdmin_delete->lRecCnt++;

	// Set row properties
	$UsersAdmin->CssClass = "";
	$UsersAdmin->CssStyle = "";
	$UsersAdmin->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$UsersAdmin_delete->LoadRowValues($rs);

	// Render row
	$UsersAdmin_delete->RenderRow();
?>
	<tr<?php echo $UsersAdmin->RowAttributes() ?>>
		<td<?php echo $UsersAdmin->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UsersAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UsersAdmin->nguoidung_option->ListViewValue() ?></div></td>
		<td<?php echo $UsersAdmin->tendangnhap->CellAttributes() ?>>
<div<?php echo $UsersAdmin->tendangnhap->ViewAttributes() ?>><?php echo $UsersAdmin->tendangnhap->ListViewValue() ?></div></td>
		<td<?php echo $UsersAdmin->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UsersAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersAdmin->truycap_gannhat->ListViewValue() ?></div></td>
		<td<?php echo $UsersAdmin->UserLevelID->CellAttributes() ?>>
<div<?php echo $UsersAdmin->UserLevelID->ViewAttributes() ?>><?php echo $UsersAdmin->UserLevelID->ListViewValue() ?></div></td>
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
class cUsersAdmin_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'UsersAdmin';

	// Page Object Name
	var $PageObjName = 'UsersAdmin_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UsersAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersAdmin_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersAdmin"] = new cUsersAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersAdmin;
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
			$this->Page_Terminate("UsersAdminlist.php");
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
		global $UsersAdmin;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["nguoidung_id"] <> "") {
			$UsersAdmin->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			if (!is_numeric($UsersAdmin->nguoidung_id->QueryStringValue))
				$this->Page_Terminate("UsersAdminlist.php"); // Prevent SQL injection, exit
			$sKey .= $UsersAdmin->nguoidung_id->QueryStringValue;
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
			$this->Page_Terminate("UsersAdminlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("UsersAdminlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`nguoidung_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in UsersAdmin class, UsersAdmininfo.php

		$UsersAdmin->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$UsersAdmin->CurrentAction = $_POST["a_delete"];
		} else {
			$UsersAdmin->CurrentAction = "D"; // Delete record directly
		}
		switch ($UsersAdmin->CurrentAction) {
			case "D": // Delete
				$UsersAdmin->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($UsersAdmin->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $UsersAdmin;
		$DeleteRows = TRUE;
		$sWrkFilter = $UsersAdmin->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in UsersAdmin class, UsersAdmininfo.php

		$UsersAdmin->CurrentFilter = $sWrkFilter;
		$sSql = $UsersAdmin->SQL();
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
				$DeleteRows = $UsersAdmin->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['nguoidung_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($UsersAdmin->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($UsersAdmin->CancelMessage <> "") {
				$this->setMessage($UsersAdmin->CancelMessage);
				$UsersAdmin->CancelMessage = "";
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
				$UsersAdmin->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UsersAdmin;

		// Call Recordset Selecting event
		$UsersAdmin->Recordset_Selecting($UsersAdmin->CurrentFilter);

		// Load list page SQL
		$sSql = $UsersAdmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UsersAdmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UsersAdmin;
		$sFilter = $UsersAdmin->KeyFilter();

		// Call Row Selecting event
		$UsersAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UsersAdmin->CurrentFilter = $sFilter;
		$sSql = $UsersAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UsersAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UsersAdmin;
		$UsersAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UsersAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UsersAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UsersAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UsersAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UsersAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersAdmin;

		// Call Row_Rendering event
		$UsersAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UsersAdmin->nguoidung_option->CellCssStyle = "";
		$UsersAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UsersAdmin->tendangnhap->CellCssStyle = "";
		$UsersAdmin->tendangnhap->CellCssClass = "";

		// truycap_gannhat
		$UsersAdmin->truycap_gannhat->CellCssStyle = "";
		$UsersAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UsersAdmin->UserLevelID->CellCssStyle = "";
		$UsersAdmin->UserLevelID->CellCssClass = "";
		if ($UsersAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UsersAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UsersAdmin->nguoidung_option->ViewValue = "Quan tri he thong";
						break;
					case "1":
						$UsersAdmin->nguoidung_option->ViewValue = "Thanh vien dang ky";
						break;
					default:
						$UsersAdmin->nguoidung_option->ViewValue = $UsersAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UsersAdmin->nguoidung_option->CssStyle = "";
			$UsersAdmin->nguoidung_option->CssClass = "";
			$UsersAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->ViewValue = $UsersAdmin->tendangnhap->CurrentValue;
			$UsersAdmin->tendangnhap->CssStyle = "";
			$UsersAdmin->tendangnhap->CssClass = "";
			$UsersAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->ViewValue = $UsersAdmin->truycap_gannhat->CurrentValue;
			$UsersAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UsersAdmin->truycap_gannhat->ViewValue, 11);
			$UsersAdmin->truycap_gannhat->CssStyle = "";
			$UsersAdmin->truycap_gannhat->CssClass = "";
			$UsersAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UsersAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersAdmin->UserLevelID->ViewValue = $UsersAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UsersAdmin->UserLevelID->ViewValue = NULL;
			}
			$UsersAdmin->UserLevelID->CssStyle = "";
			$UsersAdmin->UserLevelID->CssClass = "";
			$UsersAdmin->UserLevelID->ViewCustomAttributes = "";

			// nguoidung_option
			$UsersAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UsersAdmin->UserLevelID->HrefValue = "";
		}

		// Call Row Rendered event
		$UsersAdmin->Row_Rendered();
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
