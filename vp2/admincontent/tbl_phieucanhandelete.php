<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_phieucanhaninfo.php" ?>
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
$tbl_phieucanhan_delete = new ctbl_phieucanhan_delete();
$Page =& $tbl_phieucanhan_delete;

// Page init processing
$tbl_phieucanhan_delete->Page_Init();

// Page main processing
$tbl_phieucanhan_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_phieucanhan_delete = new ew_Page("tbl_phieucanhan_delete");

// page properties
tbl_phieucanhan_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = tbl_phieucanhan_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_phieucanhan_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_phieucanhan_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_phieucanhan_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_phieucanhan_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $tbl_phieucanhan_delete->LoadRecordset();
$tbl_phieucanhan_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($tbl_phieucanhan_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$tbl_phieucanhan_delete->Page_Terminate("tbl_phieucanhanlist.php"); // Return to list
}
?>
<p><span class="phpmaker">Delete From TABLE: Tbl Phieucanhan<br><br>
<a href="<?php echo $tbl_phieucanhan->getReturnUrl() ?>">Go Back</a></span></p>
<?php $tbl_phieucanhan_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="tbl_phieucanhan">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($tbl_phieucanhan_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $tbl_phieucanhan->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Phieucanhan Id</td>
		<td valign="top">Chuyenmucphieu Id</td>
		<td valign="top">Msv</td>
		<td valign="top">E Mail</td>
		<td valign="top">Hoten</td>
		<td valign="top">Nganh Hoc</td>
		<td valign="top">Lop</td>
		<td valign="top">Khoa Hoc</td>
		<td valign="top">He Daotao</td>
		<td valign="top">Tinh Trang</td>
		<td valign="top">Chungminh Nhandan</td>
		<td valign="top">Ngaycap Chungminh</td>
		<td valign="top">Noi Cap</td>
		<td valign="top">Dan Toc</td>
		<td valign="top">Ton Giao</td>
		<td valign="top">Ngayvaodang</td>
		<td valign="top">Hoten Bo</td>
		<td valign="top">Namsinh Bo</td>
		<td valign="top">Dt Bo</td>
		<td valign="top">Hoten Me</td>
		<td valign="top">Namsinh Me</td>
		<td valign="top">Dt Me</td>
		<td valign="top">Chucvu Bo</td>
		<td valign="top">Chucvu Me</td>
		<td valign="top">Sdt Lienhegd</td>
		<td valign="top">Datetime Add</td>
		<td valign="top">Datetime Edit</td>
		<td valign="top">Active</td>
	</tr>
	</thead>
	<tbody>
<?php
$tbl_phieucanhan_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$tbl_phieucanhan_delete->lRecCnt++;

	// Set row properties
	$tbl_phieucanhan->CssClass = "";
	$tbl_phieucanhan->CssStyle = "";
	$tbl_phieucanhan->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$tbl_phieucanhan_delete->LoadRowValues($rs);

	// Render row
	$tbl_phieucanhan_delete->RenderRow();
?>
	<tr<?php echo $tbl_phieucanhan->RowAttributes() ?>>
		<td<?php echo $tbl_phieucanhan->phieucanhan_id->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->phieucanhan_id->ViewAttributes() ?>><?php echo $tbl_phieucanhan->phieucanhan_id->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->chuyenmucphieu_id->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->chuyenmucphieu_id->ViewAttributes() ?>><?php echo $tbl_phieucanhan->chuyenmucphieu_id->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->msv->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->msv->ViewAttributes() ?>><?php echo $tbl_phieucanhan->msv->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->e_mail->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->e_mail->ViewAttributes() ?>><?php echo $tbl_phieucanhan->e_mail->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->hoten->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->hoten->ViewAttributes() ?>><?php echo $tbl_phieucanhan->hoten->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->nganh_hoc->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->nganh_hoc->ViewAttributes() ?>><?php echo $tbl_phieucanhan->nganh_hoc->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->lop->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->lop->ViewAttributes() ?>><?php echo $tbl_phieucanhan->lop->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->khoa_hoc->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->khoa_hoc->ViewAttributes() ?>><?php echo $tbl_phieucanhan->khoa_hoc->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->he_daotao->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->he_daotao->ViewAttributes() ?>><?php echo $tbl_phieucanhan->he_daotao->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->tinh_trang->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->tinh_trang->ViewAttributes() ?>><?php echo $tbl_phieucanhan->tinh_trang->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->chungminh_nhandan->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->chungminh_nhandan->ViewAttributes() ?>><?php echo $tbl_phieucanhan->chungminh_nhandan->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->ngaycap_chungminh->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->ngaycap_chungminh->ViewAttributes() ?>><?php echo $tbl_phieucanhan->ngaycap_chungminh->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->noi_cap->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->noi_cap->ViewAttributes() ?>><?php echo $tbl_phieucanhan->noi_cap->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->dan_toc->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->dan_toc->ViewAttributes() ?>><?php echo $tbl_phieucanhan->dan_toc->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->ton_giao->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->ton_giao->ViewAttributes() ?>><?php echo $tbl_phieucanhan->ton_giao->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->ngayvaodang->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->ngayvaodang->ViewAttributes() ?>><?php echo $tbl_phieucanhan->ngayvaodang->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->hoten_bo->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->hoten_bo->ViewAttributes() ?>><?php echo $tbl_phieucanhan->hoten_bo->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->namsinh_bo->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->namsinh_bo->ViewAttributes() ?>><?php echo $tbl_phieucanhan->namsinh_bo->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->dt_bo->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->dt_bo->ViewAttributes() ?>><?php echo $tbl_phieucanhan->dt_bo->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->hoten_me->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->hoten_me->ViewAttributes() ?>><?php echo $tbl_phieucanhan->hoten_me->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->namsinh_me->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->namsinh_me->ViewAttributes() ?>><?php echo $tbl_phieucanhan->namsinh_me->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->dt_me->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->dt_me->ViewAttributes() ?>><?php echo $tbl_phieucanhan->dt_me->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->chucvu_bo->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->chucvu_bo->ViewAttributes() ?>><?php echo $tbl_phieucanhan->chucvu_bo->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->chucvu_me->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->chucvu_me->ViewAttributes() ?>><?php echo $tbl_phieucanhan->chucvu_me->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->sdt_lienhegd->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->sdt_lienhegd->ViewAttributes() ?>><?php echo $tbl_phieucanhan->sdt_lienhegd->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->datetime_add->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->datetime_add->ViewAttributes() ?>><?php echo $tbl_phieucanhan->datetime_add->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->datetime_edit->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->datetime_edit->ViewAttributes() ?>><?php echo $tbl_phieucanhan->datetime_edit->ListViewValue() ?></div></td>
		<td<?php echo $tbl_phieucanhan->active->CellAttributes() ?>>
<div<?php echo $tbl_phieucanhan->active->ViewAttributes() ?>><?php echo $tbl_phieucanhan->active->ListViewValue() ?></div></td>
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
class ctbl_phieucanhan_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'tbl_phieucanhan';

	// Page Object Name
	var $PageObjName = 'tbl_phieucanhan_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_phieucanhan;
		if ($tbl_phieucanhan->UseTokenInUrl) $PageUrl .= "t=" . $tbl_phieucanhan->TableVar . "&"; // add page token
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
		global $objForm, $tbl_phieucanhan;
		if ($tbl_phieucanhan->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_phieucanhan->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_phieucanhan->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_phieucanhan_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_phieucanhan"] = new ctbl_phieucanhan();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_phieucanhan', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_phieucanhan;
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
			$this->Page_Terminate("tbl_phieucanhanlist.php");
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
		global $tbl_phieucanhan;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["phieucanhan_id"] <> "") {
			$tbl_phieucanhan->phieucanhan_id->setQueryStringValue($_GET["phieucanhan_id"]);
			if (!is_numeric($tbl_phieucanhan->phieucanhan_id->QueryStringValue))
				$this->Page_Terminate("tbl_phieucanhanlist.php"); // Prevent SQL injection, exit
			$sKey .= $tbl_phieucanhan->phieucanhan_id->QueryStringValue;
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
			$this->Page_Terminate("tbl_phieucanhanlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("tbl_phieucanhanlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`phieucanhan_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in tbl_phieucanhan class, tbl_phieucanhaninfo.php

		$tbl_phieucanhan->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$tbl_phieucanhan->CurrentAction = $_POST["a_delete"];
		} else {
			$tbl_phieucanhan->CurrentAction = "I"; // Display record
		}
		switch ($tbl_phieucanhan->CurrentAction) {
			case "D": // Delete
				$tbl_phieucanhan->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Delete succeeded"); // Set up success message
					$this->Page_Terminate($tbl_phieucanhan->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $tbl_phieucanhan;
		$DeleteRows = TRUE;
		$sWrkFilter = $tbl_phieucanhan->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in tbl_phieucanhan class, tbl_phieucanhaninfo.php

		$tbl_phieucanhan->CurrentFilter = $sWrkFilter;
		$sSql = $tbl_phieucanhan->SQL();
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
				$DeleteRows = $tbl_phieucanhan->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['phieucanhan_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($tbl_phieucanhan->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($tbl_phieucanhan->CancelMessage <> "") {
				$this->setMessage($tbl_phieucanhan->CancelMessage);
				$tbl_phieucanhan->CancelMessage = "";
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
				$tbl_phieucanhan->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_phieucanhan;

		// Call Recordset Selecting event
		$tbl_phieucanhan->Recordset_Selecting($tbl_phieucanhan->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_phieucanhan->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_phieucanhan->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_phieucanhan;
		$sFilter = $tbl_phieucanhan->KeyFilter();

		// Call Row Selecting event
		$tbl_phieucanhan->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_phieucanhan->CurrentFilter = $sFilter;
		$sSql = $tbl_phieucanhan->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_phieucanhan->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_phieucanhan;
		$tbl_phieucanhan->phieucanhan_id->setDbValue($rs->fields('phieucanhan_id'));
		$tbl_phieucanhan->chuyenmucphieu_id->setDbValue($rs->fields('chuyenmucphieu_id'));
		$tbl_phieucanhan->msv->setDbValue($rs->fields('msv'));
		$tbl_phieucanhan->e_mail->setDbValue($rs->fields('e_mail'));
		$tbl_phieucanhan->hoten->setDbValue($rs->fields('hoten'));
		$tbl_phieucanhan->nganh_hoc->setDbValue($rs->fields('nganh_hoc'));
		$tbl_phieucanhan->lop->setDbValue($rs->fields('lop'));
		$tbl_phieucanhan->khoa_hoc->setDbValue($rs->fields('khoa_hoc'));
		$tbl_phieucanhan->he_daotao->setDbValue($rs->fields('he_daotao'));
		$tbl_phieucanhan->tinh_trang->setDbValue($rs->fields('tinh_trang'));
		$tbl_phieucanhan->chungminh_nhandan->setDbValue($rs->fields('chungminh_nhandan'));
		$tbl_phieucanhan->ngaycap_chungminh->setDbValue($rs->fields('ngaycap_chungminh'));
		$tbl_phieucanhan->hokhau_tt->setDbValue($rs->fields('hokhau_tt'));
		$tbl_phieucanhan->noi_cap->setDbValue($rs->fields('noi_cap'));
		$tbl_phieucanhan->dan_toc->setDbValue($rs->fields('dan_toc'));
		$tbl_phieucanhan->ton_giao->setDbValue($rs->fields('ton_giao'));
		$tbl_phieucanhan->capbac_chucvu_dang->setDbValue($rs->fields('capbac_chucvu_dang'));
		$tbl_phieucanhan->htlt_odau->setDbValue($rs->fields('htlt_odau'));
		$tbl_phieucanhan->ngayvaodang->setDbValue($rs->fields('ngayvaodang'));
		$tbl_phieucanhan->nangkhieucanhan->setDbValue($rs->fields('nangkhieucanhan'));
		$tbl_phieucanhan->dtdc_khicanlh->setDbValue($rs->fields('dtdc_khicanlh'));
		$tbl_phieucanhan->hoten_bo->setDbValue($rs->fields('hoten_bo'));
		$tbl_phieucanhan->namsinh_bo->setDbValue($rs->fields('namsinh_bo'));
		$tbl_phieucanhan->dt_bo->setDbValue($rs->fields('dt_bo'));
		$tbl_phieucanhan->hoten_me->setDbValue($rs->fields('hoten_me'));
		$tbl_phieucanhan->namsinh_me->setDbValue($rs->fields('namsinh_me'));
		$tbl_phieucanhan->dt_me->setDbValue($rs->fields('dt_me'));
		$tbl_phieucanhan->gdchinhsach->setDbValue($rs->fields('gdchinhsach'));
		$tbl_phieucanhan->chucvu_bo->setDbValue($rs->fields('chucvu_bo'));
		$tbl_phieucanhan->chucvu_me->setDbValue($rs->fields('chucvu_me'));
		$tbl_phieucanhan->sdt_lienhegd->setDbValue($rs->fields('sdt_lienhegd'));
		$tbl_phieucanhan->datetime_add->setDbValue($rs->fields('datetime_add'));
		$tbl_phieucanhan->datetime_edit->setDbValue($rs->fields('datetime_edit'));
		$tbl_phieucanhan->active->setDbValue($rs->fields('active'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_phieucanhan;

		// Call Row_Rendering event
		$tbl_phieucanhan->Row_Rendering();

		// Common render codes for all row types
		// phieucanhan_id

		$tbl_phieucanhan->phieucanhan_id->CellCssStyle = "";
		$tbl_phieucanhan->phieucanhan_id->CellCssClass = "";

		// chuyenmucphieu_id
		$tbl_phieucanhan->chuyenmucphieu_id->CellCssStyle = "";
		$tbl_phieucanhan->chuyenmucphieu_id->CellCssClass = "";

		// msv
		$tbl_phieucanhan->msv->CellCssStyle = "";
		$tbl_phieucanhan->msv->CellCssClass = "";

		// e_mail
		$tbl_phieucanhan->e_mail->CellCssStyle = "";
		$tbl_phieucanhan->e_mail->CellCssClass = "";

		// hoten
		$tbl_phieucanhan->hoten->CellCssStyle = "";
		$tbl_phieucanhan->hoten->CellCssClass = "";

		// nganh_hoc
		$tbl_phieucanhan->nganh_hoc->CellCssStyle = "";
		$tbl_phieucanhan->nganh_hoc->CellCssClass = "";

		// lop
		$tbl_phieucanhan->lop->CellCssStyle = "";
		$tbl_phieucanhan->lop->CellCssClass = "";

		// khoa_hoc
		$tbl_phieucanhan->khoa_hoc->CellCssStyle = "";
		$tbl_phieucanhan->khoa_hoc->CellCssClass = "";

		// he_daotao
		$tbl_phieucanhan->he_daotao->CellCssStyle = "";
		$tbl_phieucanhan->he_daotao->CellCssClass = "";

		// tinh_trang
		$tbl_phieucanhan->tinh_trang->CellCssStyle = "";
		$tbl_phieucanhan->tinh_trang->CellCssClass = "";

		// chungminh_nhandan
		$tbl_phieucanhan->chungminh_nhandan->CellCssStyle = "";
		$tbl_phieucanhan->chungminh_nhandan->CellCssClass = "";

		// ngaycap_chungminh
		$tbl_phieucanhan->ngaycap_chungminh->CellCssStyle = "";
		$tbl_phieucanhan->ngaycap_chungminh->CellCssClass = "";

		// noi_cap
		$tbl_phieucanhan->noi_cap->CellCssStyle = "";
		$tbl_phieucanhan->noi_cap->CellCssClass = "";

		// dan_toc
		$tbl_phieucanhan->dan_toc->CellCssStyle = "";
		$tbl_phieucanhan->dan_toc->CellCssClass = "";

		// ton_giao
		$tbl_phieucanhan->ton_giao->CellCssStyle = "";
		$tbl_phieucanhan->ton_giao->CellCssClass = "";

		// ngayvaodang
		$tbl_phieucanhan->ngayvaodang->CellCssStyle = "";
		$tbl_phieucanhan->ngayvaodang->CellCssClass = "";

		// hoten_bo
		$tbl_phieucanhan->hoten_bo->CellCssStyle = "";
		$tbl_phieucanhan->hoten_bo->CellCssClass = "";

		// namsinh_bo
		$tbl_phieucanhan->namsinh_bo->CellCssStyle = "";
		$tbl_phieucanhan->namsinh_bo->CellCssClass = "";

		// dt_bo
		$tbl_phieucanhan->dt_bo->CellCssStyle = "";
		$tbl_phieucanhan->dt_bo->CellCssClass = "";

		// hoten_me
		$tbl_phieucanhan->hoten_me->CellCssStyle = "";
		$tbl_phieucanhan->hoten_me->CellCssClass = "";

		// namsinh_me
		$tbl_phieucanhan->namsinh_me->CellCssStyle = "";
		$tbl_phieucanhan->namsinh_me->CellCssClass = "";

		// dt_me
		$tbl_phieucanhan->dt_me->CellCssStyle = "";
		$tbl_phieucanhan->dt_me->CellCssClass = "";

		// chucvu_bo
		$tbl_phieucanhan->chucvu_bo->CellCssStyle = "";
		$tbl_phieucanhan->chucvu_bo->CellCssClass = "";

		// chucvu_me
		$tbl_phieucanhan->chucvu_me->CellCssStyle = "";
		$tbl_phieucanhan->chucvu_me->CellCssClass = "";

		// sdt_lienhegd
		$tbl_phieucanhan->sdt_lienhegd->CellCssStyle = "";
		$tbl_phieucanhan->sdt_lienhegd->CellCssClass = "";

		// datetime_add
		$tbl_phieucanhan->datetime_add->CellCssStyle = "";
		$tbl_phieucanhan->datetime_add->CellCssClass = "";

		// datetime_edit
		$tbl_phieucanhan->datetime_edit->CellCssStyle = "";
		$tbl_phieucanhan->datetime_edit->CellCssClass = "";

		// active
		$tbl_phieucanhan->active->CellCssStyle = "";
		$tbl_phieucanhan->active->CellCssClass = "";
		if ($tbl_phieucanhan->RowType == EW_ROWTYPE_VIEW) { // View row

			// phieucanhan_id
			$tbl_phieucanhan->phieucanhan_id->ViewValue = $tbl_phieucanhan->phieucanhan_id->CurrentValue;
			$tbl_phieucanhan->phieucanhan_id->CssStyle = "";
			$tbl_phieucanhan->phieucanhan_id->CssClass = "";
			$tbl_phieucanhan->phieucanhan_id->ViewCustomAttributes = "";

			// chuyenmucphieu_id
			$tbl_phieucanhan->chuyenmucphieu_id->ViewValue = $tbl_phieucanhan->chuyenmucphieu_id->CurrentValue;
			$tbl_phieucanhan->chuyenmucphieu_id->CssStyle = "";
			$tbl_phieucanhan->chuyenmucphieu_id->CssClass = "";
			$tbl_phieucanhan->chuyenmucphieu_id->ViewCustomAttributes = "";

			// msv
			$tbl_phieucanhan->msv->ViewValue = $tbl_phieucanhan->msv->CurrentValue;
			$tbl_phieucanhan->msv->CssStyle = "";
			$tbl_phieucanhan->msv->CssClass = "";
			$tbl_phieucanhan->msv->ViewCustomAttributes = "";

			// e_mail
			$tbl_phieucanhan->e_mail->ViewValue = $tbl_phieucanhan->e_mail->CurrentValue;
			$tbl_phieucanhan->e_mail->CssStyle = "";
			$tbl_phieucanhan->e_mail->CssClass = "";
			$tbl_phieucanhan->e_mail->ViewCustomAttributes = "";

			// hoten
			$tbl_phieucanhan->hoten->ViewValue = $tbl_phieucanhan->hoten->CurrentValue;
			$tbl_phieucanhan->hoten->CssStyle = "";
			$tbl_phieucanhan->hoten->CssClass = "";
			$tbl_phieucanhan->hoten->ViewCustomAttributes = "";

			// nganh_hoc
			$tbl_phieucanhan->nganh_hoc->ViewValue = $tbl_phieucanhan->nganh_hoc->CurrentValue;
			$tbl_phieucanhan->nganh_hoc->CssStyle = "";
			$tbl_phieucanhan->nganh_hoc->CssClass = "";
			$tbl_phieucanhan->nganh_hoc->ViewCustomAttributes = "";

			// lop
			$tbl_phieucanhan->lop->ViewValue = $tbl_phieucanhan->lop->CurrentValue;
			$tbl_phieucanhan->lop->CssStyle = "";
			$tbl_phieucanhan->lop->CssClass = "";
			$tbl_phieucanhan->lop->ViewCustomAttributes = "";

			// khoa_hoc
			$tbl_phieucanhan->khoa_hoc->ViewValue = $tbl_phieucanhan->khoa_hoc->CurrentValue;
			$tbl_phieucanhan->khoa_hoc->CssStyle = "";
			$tbl_phieucanhan->khoa_hoc->CssClass = "";
			$tbl_phieucanhan->khoa_hoc->ViewCustomAttributes = "";

			// he_daotao
			$tbl_phieucanhan->he_daotao->ViewValue = $tbl_phieucanhan->he_daotao->CurrentValue;
			$tbl_phieucanhan->he_daotao->CssStyle = "";
			$tbl_phieucanhan->he_daotao->CssClass = "";
			$tbl_phieucanhan->he_daotao->ViewCustomAttributes = "";

			// tinh_trang
			$tbl_phieucanhan->tinh_trang->ViewValue = $tbl_phieucanhan->tinh_trang->CurrentValue;
			$tbl_phieucanhan->tinh_trang->CssStyle = "";
			$tbl_phieucanhan->tinh_trang->CssClass = "";
			$tbl_phieucanhan->tinh_trang->ViewCustomAttributes = "";

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->ViewValue = $tbl_phieucanhan->chungminh_nhandan->CurrentValue;
			$tbl_phieucanhan->chungminh_nhandan->CssStyle = "";
			$tbl_phieucanhan->chungminh_nhandan->CssClass = "";
			$tbl_phieucanhan->chungminh_nhandan->ViewCustomAttributes = "";

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->ViewValue = $tbl_phieucanhan->ngaycap_chungminh->CurrentValue;
			$tbl_phieucanhan->ngaycap_chungminh->CssStyle = "";
			$tbl_phieucanhan->ngaycap_chungminh->CssClass = "";
			$tbl_phieucanhan->ngaycap_chungminh->ViewCustomAttributes = "";

			// noi_cap
			$tbl_phieucanhan->noi_cap->ViewValue = $tbl_phieucanhan->noi_cap->CurrentValue;
			$tbl_phieucanhan->noi_cap->CssStyle = "";
			$tbl_phieucanhan->noi_cap->CssClass = "";
			$tbl_phieucanhan->noi_cap->ViewCustomAttributes = "";

			// dan_toc
			$tbl_phieucanhan->dan_toc->ViewValue = $tbl_phieucanhan->dan_toc->CurrentValue;
			$tbl_phieucanhan->dan_toc->CssStyle = "";
			$tbl_phieucanhan->dan_toc->CssClass = "";
			$tbl_phieucanhan->dan_toc->ViewCustomAttributes = "";

			// ton_giao
			$tbl_phieucanhan->ton_giao->ViewValue = $tbl_phieucanhan->ton_giao->CurrentValue;
			$tbl_phieucanhan->ton_giao->CssStyle = "";
			$tbl_phieucanhan->ton_giao->CssClass = "";
			$tbl_phieucanhan->ton_giao->ViewCustomAttributes = "";

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->ViewValue = $tbl_phieucanhan->ngayvaodang->CurrentValue;
			$tbl_phieucanhan->ngayvaodang->ViewValue = ew_FormatDateTime($tbl_phieucanhan->ngayvaodang->ViewValue, 7);
			$tbl_phieucanhan->ngayvaodang->CssStyle = "";
			$tbl_phieucanhan->ngayvaodang->CssClass = "";
			$tbl_phieucanhan->ngayvaodang->ViewCustomAttributes = "";

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->ViewValue = $tbl_phieucanhan->hoten_bo->CurrentValue;
			$tbl_phieucanhan->hoten_bo->CssStyle = "";
			$tbl_phieucanhan->hoten_bo->CssClass = "";
			$tbl_phieucanhan->hoten_bo->ViewCustomAttributes = "";

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->ViewValue = $tbl_phieucanhan->namsinh_bo->CurrentValue;
			$tbl_phieucanhan->namsinh_bo->CssStyle = "";
			$tbl_phieucanhan->namsinh_bo->CssClass = "";
			$tbl_phieucanhan->namsinh_bo->ViewCustomAttributes = "";

			// dt_bo
			$tbl_phieucanhan->dt_bo->ViewValue = $tbl_phieucanhan->dt_bo->CurrentValue;
			$tbl_phieucanhan->dt_bo->CssStyle = "";
			$tbl_phieucanhan->dt_bo->CssClass = "";
			$tbl_phieucanhan->dt_bo->ViewCustomAttributes = "";

			// hoten_me
			$tbl_phieucanhan->hoten_me->ViewValue = $tbl_phieucanhan->hoten_me->CurrentValue;
			$tbl_phieucanhan->hoten_me->CssStyle = "";
			$tbl_phieucanhan->hoten_me->CssClass = "";
			$tbl_phieucanhan->hoten_me->ViewCustomAttributes = "";

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->ViewValue = $tbl_phieucanhan->namsinh_me->CurrentValue;
			$tbl_phieucanhan->namsinh_me->CssStyle = "";
			$tbl_phieucanhan->namsinh_me->CssClass = "";
			$tbl_phieucanhan->namsinh_me->ViewCustomAttributes = "";

			// dt_me
			$tbl_phieucanhan->dt_me->ViewValue = $tbl_phieucanhan->dt_me->CurrentValue;
			$tbl_phieucanhan->dt_me->CssStyle = "";
			$tbl_phieucanhan->dt_me->CssClass = "";
			$tbl_phieucanhan->dt_me->ViewCustomAttributes = "";

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->ViewValue = $tbl_phieucanhan->chucvu_bo->CurrentValue;
			$tbl_phieucanhan->chucvu_bo->CssStyle = "";
			$tbl_phieucanhan->chucvu_bo->CssClass = "";
			$tbl_phieucanhan->chucvu_bo->ViewCustomAttributes = "";

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->ViewValue = $tbl_phieucanhan->chucvu_me->CurrentValue;
			$tbl_phieucanhan->chucvu_me->CssStyle = "";
			$tbl_phieucanhan->chucvu_me->CssClass = "";
			$tbl_phieucanhan->chucvu_me->ViewCustomAttributes = "";

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->ViewValue = $tbl_phieucanhan->sdt_lienhegd->CurrentValue;
			$tbl_phieucanhan->sdt_lienhegd->CssStyle = "";
			$tbl_phieucanhan->sdt_lienhegd->CssClass = "";
			$tbl_phieucanhan->sdt_lienhegd->ViewCustomAttributes = "";

			// datetime_add
			$tbl_phieucanhan->datetime_add->ViewValue = $tbl_phieucanhan->datetime_add->CurrentValue;
			$tbl_phieucanhan->datetime_add->ViewValue = ew_FormatDateTime($tbl_phieucanhan->datetime_add->ViewValue, 7);
			$tbl_phieucanhan->datetime_add->CssStyle = "";
			$tbl_phieucanhan->datetime_add->CssClass = "";
			$tbl_phieucanhan->datetime_add->ViewCustomAttributes = "";

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->ViewValue = $tbl_phieucanhan->datetime_edit->CurrentValue;
			$tbl_phieucanhan->datetime_edit->ViewValue = ew_FormatDateTime($tbl_phieucanhan->datetime_edit->ViewValue, 7);
			$tbl_phieucanhan->datetime_edit->CssStyle = "";
			$tbl_phieucanhan->datetime_edit->CssClass = "";
			$tbl_phieucanhan->datetime_edit->ViewCustomAttributes = "";

			// active
			if (strval($tbl_phieucanhan->active->CurrentValue) <> "") {
				switch ($tbl_phieucanhan->active->CurrentValue) {
					case "0":
						$tbl_phieucanhan->active->ViewValue = "khong kich hoat";
						break;
					case "1":
						$tbl_phieucanhan->active->ViewValue = "kich hoat";
						break;
					default:
						$tbl_phieucanhan->active->ViewValue = $tbl_phieucanhan->active->CurrentValue;
				}
			} else {
				$tbl_phieucanhan->active->ViewValue = NULL;
			}
			$tbl_phieucanhan->active->CssStyle = "";
			$tbl_phieucanhan->active->CssClass = "";
			$tbl_phieucanhan->active->ViewCustomAttributes = "";

			// phieucanhan_id
			$tbl_phieucanhan->phieucanhan_id->HrefValue = "";

			// chuyenmucphieu_id
			$tbl_phieucanhan->chuyenmucphieu_id->HrefValue = "";

			// msv
			$tbl_phieucanhan->msv->HrefValue = "";

			// e_mail
			$tbl_phieucanhan->e_mail->HrefValue = "";

			// hoten
			$tbl_phieucanhan->hoten->HrefValue = "";

			// nganh_hoc
			$tbl_phieucanhan->nganh_hoc->HrefValue = "";

			// lop
			$tbl_phieucanhan->lop->HrefValue = "";

			// khoa_hoc
			$tbl_phieucanhan->khoa_hoc->HrefValue = "";

			// he_daotao
			$tbl_phieucanhan->he_daotao->HrefValue = "";

			// tinh_trang
			$tbl_phieucanhan->tinh_trang->HrefValue = "";

			// chungminh_nhandan
			$tbl_phieucanhan->chungminh_nhandan->HrefValue = "";

			// ngaycap_chungminh
			$tbl_phieucanhan->ngaycap_chungminh->HrefValue = "";

			// noi_cap
			$tbl_phieucanhan->noi_cap->HrefValue = "";

			// dan_toc
			$tbl_phieucanhan->dan_toc->HrefValue = "";

			// ton_giao
			$tbl_phieucanhan->ton_giao->HrefValue = "";

			// ngayvaodang
			$tbl_phieucanhan->ngayvaodang->HrefValue = "";

			// hoten_bo
			$tbl_phieucanhan->hoten_bo->HrefValue = "";

			// namsinh_bo
			$tbl_phieucanhan->namsinh_bo->HrefValue = "";

			// dt_bo
			$tbl_phieucanhan->dt_bo->HrefValue = "";

			// hoten_me
			$tbl_phieucanhan->hoten_me->HrefValue = "";

			// namsinh_me
			$tbl_phieucanhan->namsinh_me->HrefValue = "";

			// dt_me
			$tbl_phieucanhan->dt_me->HrefValue = "";

			// chucvu_bo
			$tbl_phieucanhan->chucvu_bo->HrefValue = "";

			// chucvu_me
			$tbl_phieucanhan->chucvu_me->HrefValue = "";

			// sdt_lienhegd
			$tbl_phieucanhan->sdt_lienhegd->HrefValue = "";

			// datetime_add
			$tbl_phieucanhan->datetime_add->HrefValue = "";

			// datetime_edit
			$tbl_phieucanhan->datetime_edit->HrefValue = "";

			// active
			$tbl_phieucanhan->active->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_phieucanhan->Row_Rendered();
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
