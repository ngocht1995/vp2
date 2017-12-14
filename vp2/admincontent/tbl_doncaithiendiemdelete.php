<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_doncaithiendieminfo.php" ?>
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
$tbl_doncaithiendiem_delete = new ctbl_doncaithiendiem_delete();
$Page =& $tbl_doncaithiendiem_delete;

// Page init processing
$tbl_doncaithiendiem_delete->Page_Init();

// Page main processing
$tbl_doncaithiendiem_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_doncaithiendiem_delete = new ew_Page("tbl_doncaithiendiem_delete");

// page properties
tbl_doncaithiendiem_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = tbl_doncaithiendiem_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_doncaithiendiem_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_doncaithiendiem_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_doncaithiendiem_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_doncaithiendiem_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $tbl_doncaithiendiem_delete->LoadRecordset();
$tbl_doncaithiendiem_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($tbl_doncaithiendiem_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$tbl_doncaithiendiem_delete->Page_Terminate("tbl_doncaithiendiemlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Tbl Doncaithiendiem<br><br>
<a href="<?php echo $tbl_doncaithiendiem->getReturnUrl() ?>">Go Back</a></span></p>
<?php $tbl_doncaithiendiem_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_doncaithiendiem">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_doncaithiendiem_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $tbl_doncaithiendiem->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Phieucaithiendiem Id</td>
		<td valign="top">Loaidon Id</td>
		<td valign="top">Nhomdon Id</td>
		<td valign="top">Msv</td>
		<td valign="top">Hoten Sinhvien</td>
		<td valign="top">Ngay Sinh</td>
		<td valign="top">Lop Sinhhoat</td>
		<td valign="top">So Dienthoai</td>
		<td valign="top">Lop Tinchi</td>
		<td valign="top">Hoc Ky</td>
		<td valign="top">Nam Hoc 1</td>
		<td valign="top">Nam Hoc 2</td>
		<td valign="top">Diem</td>
		<td valign="top">Monthi Lan 2</td>
		<td valign="top">Thoigian H</td>
		<td valign="top">Thoigian Phut</td>
		<td valign="top">Ngay Thi</td>
		<td valign="top">Ngay Tao Don</td>
		<td valign="top">Status</td>
		<td valign="top">Active</td>
		<td valign="top">Nguoidung Id</td>
		<td valign="top">Date Time Add</td>
		<td valign="top">Date Time Edit</td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_doncaithiendiem_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$tbl_doncaithiendiem_delete->lRecCnt++;

	// Set row properties
	$tbl_doncaithiendiem->CssClass = "";
	$tbl_doncaithiendiem->CssStyle = "";
	$tbl_doncaithiendiem->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_doncaithiendiem_delete->LoadRowValues($rs);

	// Render row
	$tbl_doncaithiendiem_delete->RenderRow();
?>
	<tr<?php echo $tbl_doncaithiendiem->RowAttributes() ?>>
		<td<?php echo $tbl_doncaithiendiem->phieucaithiendiem_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->phieucaithiendiem_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->phieucaithiendiem_id->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->loaidon_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->loaidon_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->loaidon_id->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->nhomdon_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nhomdon_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nhomdon_id->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->msv->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->msv->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->msv->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->hoten_sinhvien->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->hoten_sinhvien->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->hoten_sinhvien->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->ngay_sinh->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->ngay_sinh->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->ngay_sinh->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->lop_sinhhoat->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->lop_sinhhoat->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->lop_sinhhoat->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->so_dienthoai->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->so_dienthoai->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->so_dienthoai->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->lop_tinchi->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->lop_tinchi->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->lop_tinchi->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->hoc_ky->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->hoc_ky->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->hoc_ky->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->nam_hoc1->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nam_hoc1->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nam_hoc1->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->nam_hoc2->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nam_hoc2->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nam_hoc2->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->diem->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->diem->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->diem->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->monthi_lan2->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->monthi_lan2->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->monthi_lan2->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->thoigian_h->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->thoigian_h->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->thoigian_h->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->thoigian_phut->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->thoigian_phut->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->thoigian_phut->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->ngay_thi->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->ngay_thi->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->ngay_thi->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->ngay_tao_don->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->ngay_tao_don->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->ngay_tao_don->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->status->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->status->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->status->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->active->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->active->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->active->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->nguoidung_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nguoidung_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nguoidung_id->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->date_time_add->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->date_time_add->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->date_time_add->ListViewValue() ?></div></td>
		<td<?php echo $tbl_doncaithiendiem->date_time_edit->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->date_time_edit->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->date_time_edit->ListViewValue() ?></div></td>
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
class ctbl_doncaithiendiem_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'tbl_doncaithiendiem';

	// Page Object Name
	var $PageObjName = 'tbl_doncaithiendiem_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) $PageUrl .= "t=" . $tbl_doncaithiendiem->TableVar . "&"; // add page token
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
		global $objForm, $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_doncaithiendiem->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_doncaithiendiem->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_doncaithiendiem_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_doncaithiendiem"] = new ctbl_doncaithiendiem();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_doncaithiendiem', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_doncaithiendiem;
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
			$this->Page_Terminate("tbl_doncaithiendiemlist.php");
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
		global $tbl_doncaithiendiem;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["phieucaithiendiem_id"] <> "") {
			$tbl_doncaithiendiem->phieucaithiendiem_id->setQueryStringValue($_GET["phieucaithiendiem_id"]);
			if (!is_numeric($tbl_doncaithiendiem->phieucaithiendiem_id->QueryStringValue))
				$this->Page_Terminate("tbl_doncaithiendiemlist.php"); // Prevent SQL injection, exit
			$sKey .= $tbl_doncaithiendiem->phieucaithiendiem_id->QueryStringValue;
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
			$this->Page_Terminate("tbl_doncaithiendiemlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("tbl_doncaithiendiemlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`phieucaithiendiem_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in tbl_doncaithiendiem class, tbl_doncaithiendieminfo.php

		$tbl_doncaithiendiem->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_doncaithiendiem->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_doncaithiendiem->CurrentAction = "I"; // Display record
		}
		switch ($tbl_doncaithiendiem->CurrentAction) {
			case "D": // Delete
				$tbl_doncaithiendiem->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($tbl_doncaithiendiem->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $tbl_doncaithiendiem;
		$DeleteRows = TRUE;
		$sWrkFilter = $tbl_doncaithiendiem->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in tbl_doncaithiendiem class, tbl_doncaithiendieminfo.php

		$tbl_doncaithiendiem->CurrentFilter = $sWrkFilter;
		$sSql = $tbl_doncaithiendiem->SQL();
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
				$DeleteRows = $tbl_doncaithiendiem->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['phieucaithiendiem_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_doncaithiendiem->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_doncaithiendiem->CancelMessage <> "") {
				$this->setMessage($tbl_doncaithiendiem->CancelMessage);
				$tbl_doncaithiendiem->CancelMessage = "";
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
				$tbl_doncaithiendiem->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_doncaithiendiem;

		// Call Recordset Selecting event
		$tbl_doncaithiendiem->Recordset_Selecting($tbl_doncaithiendiem->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_doncaithiendiem->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_doncaithiendiem->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_doncaithiendiem;
		$sFilter = $tbl_doncaithiendiem->KeyFilter();

		// Call Row Selecting event
		$tbl_doncaithiendiem->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_doncaithiendiem->CurrentFilter = $sFilter;
		$sSql = $tbl_doncaithiendiem->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_doncaithiendiem->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->phieucaithiendiem_id->setDbValue($rs->fields('phieucaithiendiem_id'));
		$tbl_doncaithiendiem->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$tbl_doncaithiendiem->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$tbl_doncaithiendiem->msv->setDbValue($rs->fields('msv'));
		$tbl_doncaithiendiem->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$tbl_doncaithiendiem->ngay_sinh->setDbValue($rs->fields('ngay_sinh'));
		$tbl_doncaithiendiem->lop_sinhhoat->setDbValue($rs->fields('lop_sinhhoat'));
		$tbl_doncaithiendiem->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$tbl_doncaithiendiem->momthi_chinh->setDbValue($rs->fields('momthi_chinh'));
		$tbl_doncaithiendiem->lop_tinchi->setDbValue($rs->fields('lop_tinchi'));
		$tbl_doncaithiendiem->hoc_ky->setDbValue($rs->fields('hoc_ky'));
		$tbl_doncaithiendiem->nam_hoc1->setDbValue($rs->fields('nam_hoc1'));
		$tbl_doncaithiendiem->nam_hoc2->setDbValue($rs->fields('nam_hoc2'));
		$tbl_doncaithiendiem->diem->setDbValue($rs->fields('diem'));
		$tbl_doncaithiendiem->monthi_lan2->setDbValue($rs->fields('monthi_lan2'));
		$tbl_doncaithiendiem->thoigian_h->setDbValue($rs->fields('thoigian_h'));
		$tbl_doncaithiendiem->thoigian_phut->setDbValue($rs->fields('thoigian_phut'));
		$tbl_doncaithiendiem->ngay_thi->setDbValue($rs->fields('ngay_thi'));
		$tbl_doncaithiendiem->ngay_tao_don->setDbValue($rs->fields('ngay_tao_don'));
		$tbl_doncaithiendiem->status->setDbValue($rs->fields('status'));
		$tbl_doncaithiendiem->active->setDbValue($rs->fields('active'));
		$tbl_doncaithiendiem->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$tbl_doncaithiendiem->date_time_add->setDbValue($rs->fields('date_time_add'));
		$tbl_doncaithiendiem->date_time_edit->setDbValue($rs->fields('date_time_edit'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_doncaithiendiem;

		// Call Row_Rendering event
		$tbl_doncaithiendiem->Row_Rendering();

		// Common render codes for all row types
		// phieucaithiendiem_id

		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssStyle = "";
		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssClass = "";

		// loaidon_id
		$tbl_doncaithiendiem->loaidon_id->CellCssStyle = "";
		$tbl_doncaithiendiem->loaidon_id->CellCssClass = "";

		// nhomdon_id
		$tbl_doncaithiendiem->nhomdon_id->CellCssStyle = "";
		$tbl_doncaithiendiem->nhomdon_id->CellCssClass = "";

		// msv
		$tbl_doncaithiendiem->msv->CellCssStyle = "";
		$tbl_doncaithiendiem->msv->CellCssClass = "";

		// hoten_sinhvien
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssStyle = "";
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssClass = "";

		// ngay_sinh
		$tbl_doncaithiendiem->ngay_sinh->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_sinh->CellCssClass = "";

		// lop_sinhhoat
		$tbl_doncaithiendiem->lop_sinhhoat->CellCssStyle = "";
		$tbl_doncaithiendiem->lop_sinhhoat->CellCssClass = "";

		// so_dienthoai
		$tbl_doncaithiendiem->so_dienthoai->CellCssStyle = "";
		$tbl_doncaithiendiem->so_dienthoai->CellCssClass = "";

		// lop_tinchi
		$tbl_doncaithiendiem->lop_tinchi->CellCssStyle = "";
		$tbl_doncaithiendiem->lop_tinchi->CellCssClass = "";

		// hoc_ky
		$tbl_doncaithiendiem->hoc_ky->CellCssStyle = "";
		$tbl_doncaithiendiem->hoc_ky->CellCssClass = "";

		// nam_hoc1
		$tbl_doncaithiendiem->nam_hoc1->CellCssStyle = "";
		$tbl_doncaithiendiem->nam_hoc1->CellCssClass = "";

		// nam_hoc2
		$tbl_doncaithiendiem->nam_hoc2->CellCssStyle = "";
		$tbl_doncaithiendiem->nam_hoc2->CellCssClass = "";

		// diem
		$tbl_doncaithiendiem->diem->CellCssStyle = "";
		$tbl_doncaithiendiem->diem->CellCssClass = "";

		// monthi_lan2
		$tbl_doncaithiendiem->monthi_lan2->CellCssStyle = "";
		$tbl_doncaithiendiem->monthi_lan2->CellCssClass = "";

		// thoigian_h
		$tbl_doncaithiendiem->thoigian_h->CellCssStyle = "";
		$tbl_doncaithiendiem->thoigian_h->CellCssClass = "";

		// thoigian_phut
		$tbl_doncaithiendiem->thoigian_phut->CellCssStyle = "";
		$tbl_doncaithiendiem->thoigian_phut->CellCssClass = "";

		// ngay_thi
		$tbl_doncaithiendiem->ngay_thi->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_thi->CellCssClass = "";

		// ngay_tao_don
		$tbl_doncaithiendiem->ngay_tao_don->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_tao_don->CellCssClass = "";

		// status
		$tbl_doncaithiendiem->status->CellCssStyle = "";
		$tbl_doncaithiendiem->status->CellCssClass = "";

		// active
		$tbl_doncaithiendiem->active->CellCssStyle = "";
		$tbl_doncaithiendiem->active->CellCssClass = "";

		// nguoidung_id
		$tbl_doncaithiendiem->nguoidung_id->CellCssStyle = "";
		$tbl_doncaithiendiem->nguoidung_id->CellCssClass = "";

		// date_time_add
		$tbl_doncaithiendiem->date_time_add->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_add->CellCssClass = "";

		// date_time_edit
		$tbl_doncaithiendiem->date_time_edit->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_edit->CellCssClass = "";
		if ($tbl_doncaithiendiem->RowType == EW_ROWTYPE_VIEW) { // View row

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewValue = $tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue;
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssStyle = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssClass = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewCustomAttributes = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->ViewValue = $tbl_doncaithiendiem->loaidon_id->CurrentValue;
			$tbl_doncaithiendiem->loaidon_id->CssStyle = "";
			$tbl_doncaithiendiem->loaidon_id->CssClass = "";
			$tbl_doncaithiendiem->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->ViewValue = $tbl_doncaithiendiem->nhomdon_id->CurrentValue;
			$tbl_doncaithiendiem->nhomdon_id->CssStyle = "";
			$tbl_doncaithiendiem->nhomdon_id->CssClass = "";
			$tbl_doncaithiendiem->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_doncaithiendiem->msv->ViewValue = $tbl_doncaithiendiem->msv->CurrentValue;
			$tbl_doncaithiendiem->msv->CssStyle = "";
			$tbl_doncaithiendiem->msv->CssClass = "";
			$tbl_doncaithiendiem->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->ViewValue = $tbl_doncaithiendiem->hoten_sinhvien->CurrentValue;
			$tbl_doncaithiendiem->hoten_sinhvien->CssStyle = "";
			$tbl_doncaithiendiem->hoten_sinhvien->CssClass = "";
			$tbl_doncaithiendiem->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = $tbl_doncaithiendiem->ngay_sinh->CurrentValue;
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_sinh->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_sinh->CssStyle = "";
			$tbl_doncaithiendiem->ngay_sinh->CssClass = "";
			$tbl_doncaithiendiem->ngay_sinh->ViewCustomAttributes = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->ViewValue = $tbl_doncaithiendiem->lop_sinhhoat->CurrentValue;
			$tbl_doncaithiendiem->lop_sinhhoat->CssStyle = "";
			$tbl_doncaithiendiem->lop_sinhhoat->CssClass = "";
			$tbl_doncaithiendiem->lop_sinhhoat->ViewCustomAttributes = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->ViewValue = $tbl_doncaithiendiem->so_dienthoai->CurrentValue;
			$tbl_doncaithiendiem->so_dienthoai->CssStyle = "";
			$tbl_doncaithiendiem->so_dienthoai->CssClass = "";
			$tbl_doncaithiendiem->so_dienthoai->ViewCustomAttributes = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->ViewValue = $tbl_doncaithiendiem->lop_tinchi->CurrentValue;
			$tbl_doncaithiendiem->lop_tinchi->CssStyle = "";
			$tbl_doncaithiendiem->lop_tinchi->CssClass = "";
			$tbl_doncaithiendiem->lop_tinchi->ViewCustomAttributes = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->ViewValue = $tbl_doncaithiendiem->hoc_ky->CurrentValue;
			$tbl_doncaithiendiem->hoc_ky->CssStyle = "";
			$tbl_doncaithiendiem->hoc_ky->CssClass = "";
			$tbl_doncaithiendiem->hoc_ky->ViewCustomAttributes = "";

			// nam_hoc1
			if (strval($tbl_doncaithiendiem->nam_hoc1->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->nam_hoc1->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2010-2011";
						break;
					case "1":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2011-2012";
						break;
					case "2":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2012-2013";
						break;
					case "3":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2013-2014";
						break;
					case "4":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2014-2015";
						break;
					case "5":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2015-2016";
						break;
					case "6":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2017-2018";
						break;
					case "7":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2018-2019";
						break;
					case "8":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2019-2020";
						break;
					default:
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = $tbl_doncaithiendiem->nam_hoc1->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->nam_hoc1->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->nam_hoc1->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc1->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc1->ViewCustomAttributes = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->ViewValue = $tbl_doncaithiendiem->nam_hoc2->CurrentValue;
			$tbl_doncaithiendiem->nam_hoc2->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc2->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc2->ViewCustomAttributes = "";

			// diem
			$tbl_doncaithiendiem->diem->ViewValue = $tbl_doncaithiendiem->diem->CurrentValue;
			$tbl_doncaithiendiem->diem->CssStyle = "";
			$tbl_doncaithiendiem->diem->CssClass = "";
			$tbl_doncaithiendiem->diem->ViewCustomAttributes = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->ViewValue = $tbl_doncaithiendiem->monthi_lan2->CurrentValue;
			$tbl_doncaithiendiem->monthi_lan2->CssStyle = "";
			$tbl_doncaithiendiem->monthi_lan2->CssClass = "";
			$tbl_doncaithiendiem->monthi_lan2->ViewCustomAttributes = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->ViewValue = $tbl_doncaithiendiem->thoigian_h->CurrentValue;
			$tbl_doncaithiendiem->thoigian_h->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_h->CssClass = "";
			$tbl_doncaithiendiem->thoigian_h->ViewCustomAttributes = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->ViewValue = $tbl_doncaithiendiem->thoigian_phut->CurrentValue;
			$tbl_doncaithiendiem->thoigian_phut->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_phut->CssClass = "";
			$tbl_doncaithiendiem->thoigian_phut->ViewCustomAttributes = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->ViewValue = $tbl_doncaithiendiem->ngay_thi->CurrentValue;
			$tbl_doncaithiendiem->ngay_thi->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_thi->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_thi->CssStyle = "";
			$tbl_doncaithiendiem->ngay_thi->CssClass = "";
			$tbl_doncaithiendiem->ngay_thi->ViewCustomAttributes = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = $tbl_doncaithiendiem->ngay_tao_don->CurrentValue;
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_tao_don->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_tao_don->CssStyle = "";
			$tbl_doncaithiendiem->ngay_tao_don->CssClass = "";
			$tbl_doncaithiendiem->ngay_tao_don->ViewCustomAttributes = "";

			// status
			if (strval($tbl_doncaithiendiem->status->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->status->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->status->ViewValue = "khong xet duyet";
						break;
					case "1":
						$tbl_doncaithiendiem->status->ViewValue = "cho xet duyet";
						break;
					case "2":
						$tbl_doncaithiendiem->status->ViewValue = "dang xu ly";
						break;
					case "3":
						$tbl_doncaithiendiem->status->ViewValue = "ket thuc";
						break;
					default:
						$tbl_doncaithiendiem->status->ViewValue = $tbl_doncaithiendiem->status->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->status->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->status->CssStyle = "";
			$tbl_doncaithiendiem->status->CssClass = "";
			$tbl_doncaithiendiem->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_doncaithiendiem->active->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->active->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->active->ViewValue = "khong kich hoat";
						break;
					case "1":
						$tbl_doncaithiendiem->active->ViewValue = "kich hoat";
						break;
					default:
						$tbl_doncaithiendiem->active->ViewValue = $tbl_doncaithiendiem->active->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->active->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->active->CssStyle = "";
			$tbl_doncaithiendiem->active->CssClass = "";
			$tbl_doncaithiendiem->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->ViewValue = $tbl_doncaithiendiem->nguoidung_id->CurrentValue;
			$tbl_doncaithiendiem->nguoidung_id->CssStyle = "";
			$tbl_doncaithiendiem->nguoidung_id->CssClass = "";
			$tbl_doncaithiendiem->nguoidung_id->ViewCustomAttributes = "";

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->ViewValue = $tbl_doncaithiendiem->date_time_add->CurrentValue;
			$tbl_doncaithiendiem->date_time_add->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_add->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_add->CssStyle = "";
			$tbl_doncaithiendiem->date_time_add->CssClass = "";
			$tbl_doncaithiendiem->date_time_add->ViewCustomAttributes = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->ViewValue = $tbl_doncaithiendiem->date_time_edit->CurrentValue;
			$tbl_doncaithiendiem->date_time_edit->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_edit->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_edit->CssStyle = "";
			$tbl_doncaithiendiem->date_time_edit->CssClass = "";
			$tbl_doncaithiendiem->date_time_edit->ViewCustomAttributes = "";

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->HrefValue = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->HrefValue = "";

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->HrefValue = "";

			// msv
			$tbl_doncaithiendiem->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->HrefValue = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->HrefValue = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->HrefValue = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->HrefValue = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->HrefValue = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->HrefValue = "";

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->HrefValue = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->HrefValue = "";

			// diem
			$tbl_doncaithiendiem->diem->HrefValue = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->HrefValue = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->HrefValue = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->HrefValue = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->HrefValue = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->HrefValue = "";

			// status
			$tbl_doncaithiendiem->status->HrefValue = "";

			// active
			$tbl_doncaithiendiem->active->HrefValue = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->HrefValue = "";

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->HrefValue = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_doncaithiendiem->Row_Rendered();
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
