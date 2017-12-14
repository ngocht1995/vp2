<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UserAdmininfo.php" ?>
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
$UserAdmin_delete = new cUserAdmin_delete();
$Page =& $UserAdmin_delete;

// Page init processing
$UserAdmin_delete->Page_Init();

// Page main processing
$UserAdmin_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var UserAdmin_delete = new ew_Page("UserAdmin_delete");

// page properties
UserAdmin_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = UserAdmin_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
UserAdmin_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UserAdmin_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UserAdmin_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UserAdmin_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $UserAdmin_delete->LoadRecordset();
$UserAdmin_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($UserAdmin_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$UserAdmin_delete->Page_Terminate("UserAdminlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From CUSTOM VIEW: User Admin<br><br>
<a href="<?php echo $UserAdmin->getReturnUrl() ?>">Go Back</a></span></p>
<?php $UserAdmin_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="UserAdmin">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($UserAdmin_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $UserAdmin->TableCustomInnerHtml ?>
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
$UserAdmin_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$UserAdmin_delete->lRecCnt++;

	// Set row properties
	$UserAdmin->CssClass = "";
	$UserAdmin->CssStyle = "";
	$UserAdmin->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$UserAdmin_delete->LoadRowValues($rs);

	// Render row
	$UserAdmin_delete->RenderRow();
?>
	<tr<?php echo $UserAdmin->RowAttributes() ?>>
		<td<?php echo $UserAdmin->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UserAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UserAdmin->nguoidung_option->ListViewValue() ?></div></td>
		<td<?php echo $UserAdmin->tendangnhap->CellAttributes() ?>>
<div<?php echo $UserAdmin->tendangnhap->ViewAttributes() ?>><?php echo $UserAdmin->tendangnhap->ListViewValue() ?></div></td>
		<td<?php echo $UserAdmin->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UserAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UserAdmin->truycap_gannhat->ListViewValue() ?></div></td>
		<td<?php echo $UserAdmin->UserLevelID->CellAttributes() ?>>
<div<?php echo $UserAdmin->UserLevelID->ViewAttributes() ?>><?php echo $UserAdmin->UserLevelID->ListViewValue() ?></div></td>
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
class cUserAdmin_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'UserAdmin';

	// Page Object Name
	var $PageObjName = 'UserAdmin_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UserAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UserAdmin;
		if ($UserAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UserAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UserAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUserAdmin_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["UserAdmin"] = new cUserAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UserAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserAdmin;
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
			$this->Page_Terminate("UserAdminlist.php");
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
		global $UserAdmin;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["nguoidung_id"] <> "") {
			$UserAdmin->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			if (!is_numeric($UserAdmin->nguoidung_id->QueryStringValue))
				$this->Page_Terminate("UserAdminlist.php"); // Prevent SQL injection, exit
			$sKey .= $UserAdmin->nguoidung_id->QueryStringValue;
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
			$this->Page_Terminate("UserAdminlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("UserAdminlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`nguoidung_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in UserAdmin class, UserAdmininfo.php

		$UserAdmin->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$UserAdmin->CurrentAction = $_POST["a_delete"];
		} else {
			$UserAdmin->CurrentAction = "I"; // Display record
		}
		switch ($UserAdmin->CurrentAction) {
			case "D": // Delete
				$UserAdmin->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($UserAdmin->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $UserAdmin;
		$DeleteRows = TRUE;
		$sWrkFilter = $UserAdmin->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in UserAdmin class, UserAdmininfo.php

		$UserAdmin->CurrentFilter = $sWrkFilter;
		$sSql = $UserAdmin->SQL();
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
				$DeleteRows = $UserAdmin->Row_Deleting($row);
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
				$DeleteRows = $conn->Execute($UserAdmin->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($UserAdmin->CancelMessage <> "") {
				$this->setMessage($UserAdmin->CancelMessage);
				$UserAdmin->CancelMessage = "";
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
				$UserAdmin->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UserAdmin;

		// Call Recordset Selecting event
		$UserAdmin->Recordset_Selecting($UserAdmin->CurrentFilter);

		// Load list page SQL
		$sSql = $UserAdmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UserAdmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UserAdmin;
		$sFilter = $UserAdmin->KeyFilter();

		// Call Row Selecting event
		$UserAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UserAdmin->CurrentFilter = $sFilter;
		$sSql = $UserAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UserAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UserAdmin;
		$UserAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UserAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UserAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UserAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UserAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UserAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UserAdmin;

		// Call Row_Rendering event
		$UserAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UserAdmin->nguoidung_option->CellCssStyle = "";
		$UserAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UserAdmin->tendangnhap->CellCssStyle = "";
		$UserAdmin->tendangnhap->CellCssClass = "";

		// truycap_gannhat
		$UserAdmin->truycap_gannhat->CellCssStyle = "";
		$UserAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UserAdmin->UserLevelID->CellCssStyle = "";
		$UserAdmin->UserLevelID->CellCssClass = "";
		if ($UserAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UserAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UserAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UserAdmin->nguoidung_option->ViewValue = "Quan tri he thong";
						break;
					case "1":
						$UserAdmin->nguoidung_option->ViewValue = "Thanh vien dang ky";
						break;
					default:
						$UserAdmin->nguoidung_option->ViewValue = $UserAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UserAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UserAdmin->nguoidung_option->CssStyle = "";
			$UserAdmin->nguoidung_option->CssClass = "";
			$UserAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UserAdmin->tendangnhap->ViewValue = $UserAdmin->tendangnhap->CurrentValue;
			$UserAdmin->tendangnhap->CssStyle = "";
			$UserAdmin->tendangnhap->CssClass = "";
			$UserAdmin->tendangnhap->ViewCustomAttributes = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->ViewValue = $UserAdmin->truycap_gannhat->CurrentValue;
			$UserAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UserAdmin->truycap_gannhat->ViewValue, 11);
			$UserAdmin->truycap_gannhat->CssStyle = "";
			$UserAdmin->truycap_gannhat->CssClass = "";
			$UserAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UserAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UserAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UserAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UserAdmin->UserLevelID->ViewValue = $UserAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UserAdmin->UserLevelID->ViewValue = NULL;
			}
			$UserAdmin->UserLevelID->CssStyle = "";
			$UserAdmin->UserLevelID->CssClass = "";
			$UserAdmin->UserLevelID->ViewCustomAttributes = "";

			// nguoidung_option
			$UserAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UserAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UserAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UserAdmin->UserLevelID->HrefValue = "";
		}

		// Call Row Rendered event
		$UserAdmin->Row_Rendered();
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
