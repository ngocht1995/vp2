<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Readinfo.php" ?>
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
$Read_delete = new cRead_delete();
$Page =& $Read_delete;

// Page init processing
$Read_delete->Page_Init();

// Page main processing
$Read_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var Read_delete = new ew_Page("Read_delete");

// page properties
Read_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = Read_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
Read_delete.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Read_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Read_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Read_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $Read_delete->LoadRecordset();
$Read_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($Read_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$Read_delete->Page_Terminate("Readlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $Read->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem nội dung thư liên hệ</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table><br>

<?php $Read_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="Read">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($Read_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $Read->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tiêu đề</td>
		<td valign="top">Người liên hệ</td>
		<td valign="top">Email</td>
		<td valign="top">Ngày gửi</td>
		<td valign="top">Ngày đọc</td>
	</tr>
	</thead>
	<tbody>
<?php
$Read_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$Read_delete->lRecCnt++;

	// Set row properties
	$Read->CssClass = "";
	$Read->CssStyle = "";
	$Read->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$Read_delete->LoadRowValues($rs);

	// Render row
	$Read_delete->RenderRow();
?>
	<tr<?php echo $Read->RowAttributes() ?>>
		<td<?php echo $Read->tieu_de->CellAttributes() ?>>
<div<?php echo $Read->tieu_de->ViewAttributes() ?>><?php echo $Read->tieu_de->ListViewValue() ?></div></td>
		<td<?php echo $Read->nguoi_lienhe->CellAttributes() ?>>
<div<?php echo $Read->nguoi_lienhe->ViewAttributes() ?>><?php echo $Read->nguoi_lienhe->ListViewValue() ?></div></td>
		<td<?php echo $Read->diachi_email->CellAttributes() ?>>
<div<?php echo $Read->diachi_email->ViewAttributes() ?>><?php echo $Read->diachi_email->ListViewValue() ?></div></td>
		<td<?php echo $Read->ngay_gui->CellAttributes() ?>>
<div<?php echo $Read->ngay_gui->ViewAttributes() ?>><?php echo $Read->ngay_gui->ListViewValue() ?></div></td>
		<td<?php echo $Read->ngay_doc->CellAttributes() ?>>
<div<?php echo $Read->ngay_doc->ViewAttributes() ?>><?php echo $Read->ngay_doc->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value="  Xóa  ">
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
class cRead_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'Read';

	// Page Object Name
	var $PageObjName = 'Read_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Read;
		if ($Read->UseTokenInUrl) $PageUrl .= "t=" . $Read->TableVar . "&"; // add page token
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
		global $objForm, $Read;
		if ($Read->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Read->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Read->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cRead_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["Read"] = new cRead();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Read', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Read;
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
			$this->Page_Terminate("Readlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("Readlist.php");
		}

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
		global $Read;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["thu_id"] <> "") {
			$Read->thu_id->setQueryStringValue($_GET["thu_id"]);
			if (!is_numeric($Read->thu_id->QueryStringValue))
				$this->Page_Terminate("Readlist.php"); // Prevent SQL injection, exit
			$sKey .= $Read->thu_id->QueryStringValue;
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
			$this->Page_Terminate("Readlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("Readlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`thu_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in Read class, Readinfo.php

		$Read->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$Read->CurrentAction = $_POST["a_delete"];
		} else {
			$Read->CurrentAction = "I"; // Display record
		}
		switch ($Read->CurrentAction) {
			case "D": // Delete
				$Read->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa thư"); // Set up success message
					$this->Page_Terminate($Read->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $Read;
		$DeleteRows = TRUE;
		$sWrkFilter = $Read->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in Read class, Readinfo.php

		$Read->CurrentFilter = $sWrkFilter;
		$sSql = $Read->SQL();
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
				$DeleteRows = $Read->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['thu_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($Read->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($Read->CancelMessage <> "") {
				$this->setMessage($Read->CancelMessage);
				$Read->CancelMessage = "";
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
				$Read->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Read;

		// Call Recordset Selecting event
		$Read->Recordset_Selecting($Read->CurrentFilter);

		// Load list page SQL
		$sSql = $Read->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Read->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Read;
		$sFilter = $Read->KeyFilter();

		// Call Row Selecting event
		$Read->Row_Selecting($sFilter);

		// Load sql based on filter
		$Read->CurrentFilter = $sFilter;
		$sSql = $Read->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Read->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Read;
		$Read->thu_id->setDbValue($rs->fields('thu_id'));
		$Read->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$Read->tieu_de->setDbValue($rs->fields('tieu_de'));
		$Read->noidung_lienhe->setDbValue($rs->fields('noidung_lienhe'));
		$Read->nguoi_lienhe->setDbValue($rs->fields('nguoi_lienhe'));
		$Read->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$Read->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$Read->diachi_email->setDbValue($rs->fields('diachi_email'));
		$Read->ma_quocgia_tel->setDbValue($rs->fields('ma_quocgia_tel'));
		$Read->ma_vung_tel->setDbValue($rs->fields('ma_vung_tel'));
		$Read->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$Read->ma_quocgia_fax->setDbValue($rs->fields('ma_quocgia_fax'));
		$Read->ma_vung_fax->setDbValue($rs->fields('ma_vung_fax'));
		$Read->so_fax->setDbValue($rs->fields('so_fax'));
		$Read->dia_chi->setDbValue($rs->fields('dia_chi'));
		$Read->trang_thai->setDbValue($rs->fields('trang_thai'));
		$Read->ngay_gui->setDbValue($rs->fields('ngay_gui'));
		$Read->ngay_doc->setDbValue($rs->fields('ngay_doc'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Read;

		// Call Row_Rendering event
		$Read->Row_Rendering();

		// Common render codes for all row types
		// tieu_de

		$Read->tieu_de->CellCssStyle = "width: 250px; white-space: nowrap;";
		$Read->tieu_de->CellCssClass = "";

		// nguoi_lienhe
		$Read->nguoi_lienhe->CellCssStyle = "width: 150px; white-space: nowrap;";
		$Read->nguoi_lienhe->CellCssClass = "";

		// diachi_email
		$Read->diachi_email->CellCssStyle = "width: 150px; white-space: nowrap;";
		$Read->diachi_email->CellCssClass = "";

		// ngay_gui
		$Read->ngay_gui->CellCssStyle = "width: 100px; white-space: nowrap;";
		$Read->ngay_gui->CellCssClass = "";

		// ngay_doc
		$Read->ngay_doc->CellCssStyle = "white-space: nowrap;";
		$Read->ngay_doc->CellCssClass = "";
		if ($Read->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieu_de
			$Read->tieu_de->ViewValue = $Read->tieu_de->CurrentValue;
			$Read->tieu_de->CssStyle = "";
			$Read->tieu_de->CssClass = "";
			$Read->tieu_de->ViewCustomAttributes = "";

			// nguoi_lienhe
			$Read->nguoi_lienhe->ViewValue = $Read->nguoi_lienhe->CurrentValue;
			$Read->nguoi_lienhe->CssStyle = "";
			$Read->nguoi_lienhe->CssClass = "";
			$Read->nguoi_lienhe->ViewCustomAttributes = "";

			// diachi_email
			$Read->diachi_email->ViewValue = $Read->diachi_email->CurrentValue;
			$Read->diachi_email->CssStyle = "";
			$Read->diachi_email->CssClass = "";
			$Read->diachi_email->ViewCustomAttributes = "";

			// ngay_gui
			$Read->ngay_gui->ViewValue = $Read->ngay_gui->CurrentValue;
			$Read->ngay_gui->ViewValue = ew_FormatDateTime($Read->ngay_gui->ViewValue, 7);
			$Read->ngay_gui->CssStyle = "";
			$Read->ngay_gui->CssClass = "";
			$Read->ngay_gui->ViewCustomAttributes = "";

			// ngay_doc
			$Read->ngay_doc->ViewValue = $Read->ngay_doc->CurrentValue;
			$Read->ngay_doc->ViewValue = ew_FormatDateTime($Read->ngay_doc->ViewValue, 7);
			$Read->ngay_doc->CssStyle = "";
			$Read->ngay_doc->CssClass = "";
			$Read->ngay_doc->ViewCustomAttributes = "";

			// tieu_de
			$Read->tieu_de->HrefValue = "";

			// nguoi_lienhe
			$Read->nguoi_lienhe->HrefValue = "";

			// diachi_email
			$Read->diachi_email->HrefValue = "";

			// ngay_gui
			$Read->ngay_gui->HrefValue = "";

			// ngay_doc
			$Read->ngay_doc->HrefValue = "";
		}

		// Call Row Rendered event
		$Read->Row_Rendered();
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
