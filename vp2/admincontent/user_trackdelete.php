<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "user_trackinfo.php" ?>
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
$user_track_delete = new cuser_track_delete();
$Page =& $user_track_delete;

// Page init processing
$user_track_delete->Page_Init();

// Page main processing
$user_track_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var user_track_delete = new ew_Page("user_track_delete");

// page properties
user_track_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = user_track_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
user_track_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_track_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_track_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_track_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $user_track_delete->LoadRecordset();
$user_track_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($user_track_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$user_track_delete->Page_Terminate("user_tracklist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: User Track<br><br>
<a href="<?php echo $user_track->getReturnUrl() ?>">Go Back</a></span></p>
<?php $user_track_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="user_track">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($user_track_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $user_track->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Diachi Ip</td>
		<td valign="top">Tendangnhap</td>
		<td valign="top">Thoigian Dangnhap</td>
	</tr>
	</thead>
	<tbody>
<?php
$user_track_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$user_track_delete->lRecCnt++;

	// Set row properties
	$user_track->CssClass = "";
	$user_track->CssStyle = "";
	$user_track->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$user_track_delete->LoadRowValues($rs);

	// Render row
	$user_track_delete->RenderRow();
?>
	<tr<?php echo $user_track->RowAttributes() ?>>
		<td<?php echo $user_track->diachi_ip->CellAttributes() ?>>
<div<?php echo $user_track->diachi_ip->ViewAttributes() ?>><?php echo $user_track->diachi_ip->ListViewValue() ?></div></td>
		<td<?php echo $user_track->tendangnhap->CellAttributes() ?>>
<div<?php echo $user_track->tendangnhap->ViewAttributes() ?>><?php echo $user_track->tendangnhap->ListViewValue() ?></div></td>
		<td<?php echo $user_track->thoigian_dangnhap->CellAttributes() ?>>
<div<?php echo $user_track->thoigian_dangnhap->ViewAttributes() ?>><?php echo $user_track->thoigian_dangnhap->ListViewValue() ?></div></td>
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
class cuser_track_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'user_track';

	// Page Object Name
	var $PageObjName = 'user_track_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user_track;
		if ($user_track->UseTokenInUrl) $PageUrl .= "t=" . $user_track->TableVar . "&"; // add page token
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
		global $objForm, $user_track;
		if ($user_track->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user_track->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user_track->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_track_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["user_track"] = new cuser_track();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user_track', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user_track;
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
			$this->Page_Terminate("user_tracklist.php");
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
		global $user_track;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["user_track_id"] <> "") {
			$user_track->user_track_id->setQueryStringValue($_GET["user_track_id"]);
			if (!is_numeric($user_track->user_track_id->QueryStringValue))
				$this->Page_Terminate("user_tracklist.php"); // Prevent SQL injection, exit
			$sKey .= $user_track->user_track_id->QueryStringValue;
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
			$this->Page_Terminate("user_tracklist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("user_tracklist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`user_track_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in user_track class, user_trackinfo.php

		$user_track->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$user_track->CurrentAction = $_POST["a_delete"];
		} else {
			//$user_track->CurrentAction = "I"; // Display record
                    $user_track->CurrentAction = "D"; // Delete record directly
		}
		switch ($user_track->CurrentAction) {
			case "D": // Delete
				$user_track->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Xóa dữ liệu thành công"); // Set up success message
					$this->Page_Terminate($user_track->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $user_track;
		$DeleteRows = TRUE;
		$sWrkFilter = $user_track->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in user_track class, user_trackinfo.php

		$user_track->CurrentFilter = $sWrkFilter;
		$sSql = $user_track->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setMessage("Không tìm thấy dữ liệu"); // No record found
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
				$DeleteRows = $user_track->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['user_track_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($user_track->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($user_track->CancelMessage <> "") {
				$this->setMessage($user_track->CancelMessage);
				$user_track->CancelMessage = "";
			} else {
				$this->setMessage("Hủy bỏ xóa dữ liệu");
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
				$user_track->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user_track;

		// Call Recordset Selecting event
		$user_track->Recordset_Selecting($user_track->CurrentFilter);

		// Load list page SQL
		$sSql = $user_track->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user_track->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user_track;
		$sFilter = $user_track->KeyFilter();

		// Call Row Selecting event
		$user_track->Row_Selecting($sFilter);

		// Load sql based on filter
		$user_track->CurrentFilter = $sFilter;
		$sSql = $user_track->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user_track->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user_track;
		$user_track->diachi_ip->setDbValue($rs->fields('diachi_ip'));
		$user_track->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$user_track->thoigian_dangnhap->setDbValue($rs->fields('thoigian_dangnhap'));
		$user_track->user_track_id->setDbValue($rs->fields('user_track_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user_track;

		// Call Row_Rendering event
		$user_track->Row_Rendering();

		// Common render codes for all row types
		// diachi_ip

		$user_track->diachi_ip->CellCssStyle = "white-space: nowrap;";
		$user_track->diachi_ip->CellCssClass = "";

		// tendangnhap
		$user_track->tendangnhap->CellCssStyle = "white-space: nowrap;";
		$user_track->tendangnhap->CellCssClass = "";

		// thoigian_dangnhap
		$user_track->thoigian_dangnhap->CellCssStyle = "white-space: nowrap;";
		$user_track->thoigian_dangnhap->CellCssClass = "";
		if ($user_track->RowType == EW_ROWTYPE_VIEW) { // View row

			// diachi_ip
			$user_track->diachi_ip->ViewValue = $user_track->diachi_ip->CurrentValue;
			$user_track->diachi_ip->CssStyle = "";
			$user_track->diachi_ip->CssClass = "";
			$user_track->diachi_ip->ViewCustomAttributes = "";

			// tendangnhap
			$user_track->tendangnhap->ViewValue = $user_track->tendangnhap->CurrentValue;
			$user_track->tendangnhap->CssStyle = "";
			$user_track->tendangnhap->CssClass = "";
			$user_track->tendangnhap->ViewCustomAttributes = "";

			// thoigian_dangnhap
			$user_track->thoigian_dangnhap->ViewValue = $user_track->thoigian_dangnhap->CurrentValue;
			$user_track->thoigian_dangnhap->ViewValue = ew_FormatDateTime($user_track->thoigian_dangnhap->ViewValue, 7);
			$user_track->thoigian_dangnhap->CssStyle = "";
			$user_track->thoigian_dangnhap->CssClass = "";
			$user_track->thoigian_dangnhap->ViewCustomAttributes = "";

			// diachi_ip
			$user_track->diachi_ip->HrefValue = "";

			// tendangnhap
			$user_track->tendangnhap->HrefValue = "";

			// thoigian_dangnhap
			$user_track->thoigian_dangnhap->HrefValue = "";
		}

		// Call Row Rendered event
		$user_track->Row_Rendered();
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
