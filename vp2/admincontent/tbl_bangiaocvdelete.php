<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_bangiaocvinfo.php" ?>
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
$tbl_bangiaocv_delete = new ctbl_bangiaocv_delete();
$Page =& $tbl_bangiaocv_delete;

// Page init processing
$tbl_bangiaocv_delete->Page_Init();

// Page main processing
$tbl_bangiaocv_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_bangiaocv_delete = new ew_Page("tbl_bangiaocv_delete");

// page properties
tbl_bangiaocv_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = tbl_bangiaocv_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_bangiaocv_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_bangiaocv_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_bangiaocv_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_bangiaocv_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $tbl_bangiaocv_delete->LoadRecordset();
$tbl_bangiaocv_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($tbl_bangiaocv_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$tbl_bangiaocv_delete->Page_Terminate("tbl_bangiaocvlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Tbl Bangiaocv<br><br>
<a href="<?php echo $tbl_bangiaocv->getReturnUrl() ?>">Go Back</a></span></p>
<?php $tbl_bangiaocv_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_bangiaocv">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_bangiaocv_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $tbl_bangiaocv->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tieude Congviec</td>
		<td valign="top">Thoigian Diadiem</td>
		<td valign="top">Phamvi Doituong</td>
		<td valign="top">Doituong Thuchien</td>
		<td valign="top">Thoigian Ketthuc</td>
		<td valign="top">Thoigian Batdau</td>
		<td valign="top">Ghichu</td>
		<td valign="top">Trangthai</td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_bangiaocv_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$tbl_bangiaocv_delete->lRecCnt++;

	// Set row properties
	$tbl_bangiaocv->CssClass = "";
	$tbl_bangiaocv->CssStyle = "";
	$tbl_bangiaocv->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_bangiaocv_delete->LoadRowValues($rs);

	// Render row
	$tbl_bangiaocv_delete->RenderRow();
?>
	<tr<?php echo $tbl_bangiaocv->RowAttributes() ?>>
		<td<?php echo $tbl_bangiaocv->tieude_congviec->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->tieude_congviec->ViewAttributes() ?>><?php echo $tbl_bangiaocv->tieude_congviec->ListViewValue() ?></div></td>
		<td<?php echo $tbl_bangiaocv->thoigian_diadiem->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_diadiem->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_diadiem->ListViewValue() ?></div></td>
		<td<?php echo $tbl_bangiaocv->phamvi_doituong->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->phamvi_doituong->ViewAttributes() ?>><?php echo $tbl_bangiaocv->phamvi_doituong->ListViewValue() ?></div></td>
		<td<?php echo $tbl_bangiaocv->doituong_thuchien->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->doituong_thuchien->ViewAttributes() ?>><?php echo $tbl_bangiaocv->doituong_thuchien->ListViewValue() ?></div></td>
		<td<?php echo $tbl_bangiaocv->thoigian_ketthuc->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_ketthuc->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_ketthuc->ListViewValue() ?></div></td>
		<td<?php echo $tbl_bangiaocv->thoigian_batdau->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->thoigian_batdau->ViewAttributes() ?>><?php echo $tbl_bangiaocv->thoigian_batdau->ListViewValue() ?></div></td>
		<td<?php echo $tbl_bangiaocv->ghichu->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->ghichu->ViewAttributes() ?>><?php echo $tbl_bangiaocv->ghichu->ListViewValue() ?></div></td>
		<td<?php echo $tbl_bangiaocv->trangthai->CellAttributes() ?>>
<div<?php echo $tbl_bangiaocv->trangthai->ViewAttributes() ?>><?php echo $tbl_bangiaocv->trangthai->ListViewValue() ?></div></td>
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
class ctbl_bangiaocv_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'tbl_bangiaocv';

	// Page Object Name
	var $PageObjName = 'tbl_bangiaocv_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) $PageUrl .= "t=" . $tbl_bangiaocv->TableVar . "&"; // add page token
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
		global $objForm, $tbl_bangiaocv;
		if ($tbl_bangiaocv->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_bangiaocv->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_bangiaocv->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_bangiaocv_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_bangiaocv"] = new ctbl_bangiaocv();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_bangiaocv', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_bangiaocv;
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
			$this->Page_Terminate("tbl_bangiaocvlist.php");
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
		global $tbl_bangiaocv;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["bangiao_id"] <> "") {
			$tbl_bangiaocv->bangiao_id->setQueryStringValue($_GET["bangiao_id"]);
			if (!is_numeric($tbl_bangiaocv->bangiao_id->QueryStringValue))
				$this->Page_Terminate("tbl_bangiaocvlist.php"); // Prevent SQL injection, exit
			$sKey .= $tbl_bangiaocv->bangiao_id->QueryStringValue;
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
			$this->Page_Terminate("tbl_bangiaocvlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("tbl_bangiaocvlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`bangiao_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in tbl_bangiaocv class, tbl_bangiaocvinfo.php

		$tbl_bangiaocv->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_bangiaocv->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_bangiaocv->CurrentAction = "I"; // Display record
		}
		switch ($tbl_bangiaocv->CurrentAction) {
			case "D": // Delete
				$tbl_bangiaocv->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($tbl_bangiaocv->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $tbl_bangiaocv;
		$DeleteRows = TRUE;
		$sWrkFilter = $tbl_bangiaocv->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in tbl_bangiaocv class, tbl_bangiaocvinfo.php

		$tbl_bangiaocv->CurrentFilter = $sWrkFilter;
		$sSql = $tbl_bangiaocv->SQL();
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
				$DeleteRows = $tbl_bangiaocv->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['bangiao_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_bangiaocv->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_bangiaocv->CancelMessage <> "") {
				$this->setMessage($tbl_bangiaocv->CancelMessage);
				$tbl_bangiaocv->CancelMessage = "";
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
				$tbl_bangiaocv->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_bangiaocv;

		// Call Recordset Selecting event
		$tbl_bangiaocv->Recordset_Selecting($tbl_bangiaocv->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_bangiaocv->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_bangiaocv->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_bangiaocv;
		$sFilter = $tbl_bangiaocv->KeyFilter();

		// Call Row Selecting event
		$tbl_bangiaocv->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_bangiaocv->CurrentFilter = $sFilter;
		$sSql = $tbl_bangiaocv->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_bangiaocv->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_bangiaocv;
		$tbl_bangiaocv->bangiao_id->setDbValue($rs->fields('bangiao_id'));
		$tbl_bangiaocv->tieude_congviec->setDbValue($rs->fields('tieude_congviec'));
		$tbl_bangiaocv->thoigian_diadiem->setDbValue($rs->fields('thoigian_diadiem'));
		$tbl_bangiaocv->phamvi_doituong->setDbValue($rs->fields('phamvi_doituong'));
		$tbl_bangiaocv->doituong_thuchien->setDbValue($rs->fields('doituong_thuchien'));
		$tbl_bangiaocv->thoigian_ketthuc->setDbValue($rs->fields('thoigian_ketthuc'));
		$tbl_bangiaocv->thoigian_batdau->setDbValue($rs->fields('thoigian_batdau'));
		$tbl_bangiaocv->ghichu->setDbValue($rs->fields('ghichu'));
		$tbl_bangiaocv->trangthai->setDbValue($rs->fields('trangthai'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_bangiaocv;

		// Call Row_Rendering event
		$tbl_bangiaocv->Row_Rendering();

		// Common render codes for all row types
		// tieude_congviec

		$tbl_bangiaocv->tieude_congviec->CellCssStyle = "";
		$tbl_bangiaocv->tieude_congviec->CellCssClass = "";

		// thoigian_diadiem
		$tbl_bangiaocv->thoigian_diadiem->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_diadiem->CellCssClass = "";

		// phamvi_doituong
		$tbl_bangiaocv->phamvi_doituong->CellCssStyle = "";
		$tbl_bangiaocv->phamvi_doituong->CellCssClass = "";

		// doituong_thuchien
		$tbl_bangiaocv->doituong_thuchien->CellCssStyle = "";
		$tbl_bangiaocv->doituong_thuchien->CellCssClass = "";

		// thoigian_ketthuc
		$tbl_bangiaocv->thoigian_ketthuc->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_ketthuc->CellCssClass = "";

		// thoigian_batdau
		$tbl_bangiaocv->thoigian_batdau->CellCssStyle = "";
		$tbl_bangiaocv->thoigian_batdau->CellCssClass = "";

		// ghichu
		$tbl_bangiaocv->ghichu->CellCssStyle = "";
		$tbl_bangiaocv->ghichu->CellCssClass = "";

		// trangthai
		$tbl_bangiaocv->trangthai->CellCssStyle = "";
		$tbl_bangiaocv->trangthai->CellCssClass = "";
		if ($tbl_bangiaocv->RowType == EW_ROWTYPE_VIEW) { // View row

			// bangiao_id
			$tbl_bangiaocv->bangiao_id->ViewValue = $tbl_bangiaocv->bangiao_id->CurrentValue;
			$tbl_bangiaocv->bangiao_id->CssStyle = "";
			$tbl_bangiaocv->bangiao_id->CssClass = "";
			$tbl_bangiaocv->bangiao_id->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->ViewValue = $tbl_bangiaocv->tieude_congviec->CurrentValue;
			$tbl_bangiaocv->tieude_congviec->CssStyle = "";
			$tbl_bangiaocv->tieude_congviec->CssClass = "";
			$tbl_bangiaocv->tieude_congviec->ViewCustomAttributes = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->ViewValue = $tbl_bangiaocv->thoigian_diadiem->CurrentValue;
			$tbl_bangiaocv->thoigian_diadiem->CssStyle = "";
			$tbl_bangiaocv->thoigian_diadiem->CssClass = "";
			$tbl_bangiaocv->thoigian_diadiem->ViewCustomAttributes = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->ViewValue = $tbl_bangiaocv->phamvi_doituong->CurrentValue;
			$tbl_bangiaocv->phamvi_doituong->CssStyle = "";
			$tbl_bangiaocv->phamvi_doituong->CssClass = "";
			$tbl_bangiaocv->phamvi_doituong->ViewCustomAttributes = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->ViewValue = $tbl_bangiaocv->doituong_thuchien->CurrentValue;
			$tbl_bangiaocv->doituong_thuchien->CssStyle = "";
			$tbl_bangiaocv->doituong_thuchien->CssClass = "";
			$tbl_bangiaocv->doituong_thuchien->ViewCustomAttributes = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = $tbl_bangiaocv->thoigian_ketthuc->CurrentValue;
			$tbl_bangiaocv->thoigian_ketthuc->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_ketthuc->ViewValue, 7);
			$tbl_bangiaocv->thoigian_ketthuc->CssStyle = "";
			$tbl_bangiaocv->thoigian_ketthuc->CssClass = "";
			$tbl_bangiaocv->thoigian_ketthuc->ViewCustomAttributes = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->ViewValue = $tbl_bangiaocv->thoigian_batdau->CurrentValue;
			$tbl_bangiaocv->thoigian_batdau->ViewValue = ew_FormatDateTime($tbl_bangiaocv->thoigian_batdau->ViewValue, 7);
			$tbl_bangiaocv->thoigian_batdau->CssStyle = "";
			$tbl_bangiaocv->thoigian_batdau->CssClass = "";
			$tbl_bangiaocv->thoigian_batdau->ViewCustomAttributes = "";

			// ghichu
			$tbl_bangiaocv->ghichu->ViewValue = $tbl_bangiaocv->ghichu->CurrentValue;
			$tbl_bangiaocv->ghichu->CssStyle = "";
			$tbl_bangiaocv->ghichu->CssClass = "";
			$tbl_bangiaocv->ghichu->ViewCustomAttributes = "";

			// trangthai
			if (strval($tbl_bangiaocv->trangthai->CurrentValue) <> "") {
				switch ($tbl_bangiaocv->trangthai->CurrentValue) {
					case "0":
						$tbl_bangiaocv->trangthai->ViewValue = "Khong kich hoat";
						break;
					case "1":
						$tbl_bangiaocv->trangthai->ViewValue = "Kich hoat";
						break;
					default:
						$tbl_bangiaocv->trangthai->ViewValue = $tbl_bangiaocv->trangthai->CurrentValue;
				}
			} else {
				$tbl_bangiaocv->trangthai->ViewValue = NULL;
			}
			$tbl_bangiaocv->trangthai->CssStyle = "";
			$tbl_bangiaocv->trangthai->CssClass = "";
			$tbl_bangiaocv->trangthai->ViewCustomAttributes = "";

			// tieude_congviec
			$tbl_bangiaocv->tieude_congviec->HrefValue = "";

			// thoigian_diadiem
			$tbl_bangiaocv->thoigian_diadiem->HrefValue = "";

			// phamvi_doituong
			$tbl_bangiaocv->phamvi_doituong->HrefValue = "";

			// doituong_thuchien
			$tbl_bangiaocv->doituong_thuchien->HrefValue = "";

			// thoigian_ketthuc
			$tbl_bangiaocv->thoigian_ketthuc->HrefValue = "";

			// thoigian_batdau
			$tbl_bangiaocv->thoigian_batdau->HrefValue = "";

			// ghichu
			$tbl_bangiaocv->ghichu->HrefValue = "";

			// trangthai
			$tbl_bangiaocv->trangthai->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_bangiaocv->Row_Rendered();
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
