<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "Promotionalinfo.php" ?>
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
$Promotional_delete = new cPromotional_delete();
$Page =& $Promotional_delete;

// Page init processing
$Promotional_delete->Page_Init();

// Page main processing
$Promotional_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var Promotional_delete = new ew_Page("Promotional_delete");

// page properties
Promotional_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = Promotional_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
Promotional_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
Promotional_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
Promotional_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
Promotional_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $Promotional_delete->LoadRecordset();
$Promotional_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($Promotional_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$Promotional_delete->Page_Terminate("Promotionallist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $Promotional->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa mục tin</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $Promotional_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="Promotional">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($Promotional_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $Promotional->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tiêu đề</td>
		<td valign="top">Thời gian nhập</td>
		<td valign="top">Số lượt xem</td>
		<td valign="top">Trạng thái</td>
		<td valign="top">Xuất bản</td>
	</tr>
	</thead>
	<tbody>
<?php
$Promotional_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$Promotional_delete->lRecCnt++;

	// Set row properties
	$Promotional->CssClass = "";
	$Promotional->CssStyle = "";
	$Promotional->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$Promotional_delete->LoadRowValues($rs);

	// Render row
	$Promotional_delete->RenderRow();
?>
	<tr<?php echo $Promotional->RowAttributes() ?>>
		<td<?php echo $Promotional->tieude_tintuc->CellAttributes() ?>>
<div<?php echo $Promotional->tieude_tintuc->ViewAttributes() ?>><?php echo $Promotional->tieude_tintuc->ListViewValue() ?></div></td>
		<td<?php echo $Promotional->thoigian_them->CellAttributes() ?>>
<div<?php echo $Promotional->thoigian_them->ViewAttributes() ?>><?php echo $Promotional->thoigian_them->ListViewValue() ?></div></td>
		<td<?php echo $Promotional->soluot_truynhap->CellAttributes() ?>>
<div<?php echo $Promotional->soluot_truynhap->ViewAttributes() ?>><?php echo $Promotional->soluot_truynhap->ListViewValue() ?></div></td>
		<td<?php echo $Promotional->trang_thai->CellAttributes() ?>>
<div<?php echo $Promotional->trang_thai->ViewAttributes() ?>><?php echo $Promotional->trang_thai->ListViewValue() ?></div></td>
		<td<?php echo $Promotional->xuatban->CellAttributes() ?>>
<div<?php echo $Promotional->xuatban->ViewAttributes() ?>><?php echo $Promotional->xuatban->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value=" Xóa tin ">
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
class cPromotional_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'Promotional';

	// Page Object Name
	var $PageObjName = 'Promotional_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $Promotional;
		if ($Promotional->UseTokenInUrl) $PageUrl .= "t=" . $Promotional->TableVar . "&"; // add page token
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
		global $objForm, $Promotional;
		if ($Promotional->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($Promotional->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($Promotional->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cPromotional_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["Promotional"] = new cPromotional();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'Promotional', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $Promotional;
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
			$this->Page_Terminate("Promotionallist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("Promotionallist.php");
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
		global $Promotional;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["tintuc_id"] <> "") {
			$Promotional->tintuc_id->setQueryStringValue($_GET["tintuc_id"]);
			if (!is_numeric($Promotional->tintuc_id->QueryStringValue))
				$this->Page_Terminate("Promotionallist.php"); // Prevent SQL injection, exit
			$sKey .= $Promotional->tintuc_id->QueryStringValue;
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
			$this->Page_Terminate("Promotionallist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("Promotionallist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`tintuc_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in Promotional class, Promotionalinfo.php

		$Promotional->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$Promotional->CurrentAction = $_POST["a_delete"];
		} else {
			$Promotional->CurrentAction = "I"; // Display record
		}
		switch ($Promotional->CurrentAction) {
			case "D": // Delete
				$Promotional->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xoa tin"); // Set up success message
					$this->Page_Terminate($Promotional->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $Promotional;
		$DeleteRows = TRUE;
		$sWrkFilter = $Promotional->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in Promotional class, Promotionalinfo.php

		$Promotional->CurrentFilter = $sWrkFilter;
		$sSql = $Promotional->SQL();
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
				$DeleteRows = $Promotional->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['tintuc_id'];
				@unlink(ew_UploadPathEx(TRUE, EW_UPLOAD_DEST_PATH) . $row['anh_tintuc']);
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($Promotional->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($Promotional->CancelMessage <> "") {
				$this->setMessage($Promotional->CancelMessage);
				$Promotional->CancelMessage = "";
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
				$Promotional->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $Promotional;

		// Call Recordset Selecting event
		$Promotional->Recordset_Selecting($Promotional->CurrentFilter);

		// Load list page SQL
		$sSql = $Promotional->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$Promotional->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Promotional;
		$sFilter = $Promotional->KeyFilter();

		// Call Row Selecting event
		$Promotional->Row_Selecting($sFilter);

		// Load sql based on filter
		$Promotional->CurrentFilter = $sFilter;
		$sSql = $Promotional->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$Promotional->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $Promotional;
		$Promotional->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$Promotional->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$Promotional->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$Promotional->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$Promotional->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$Promotional->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$Promotional->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$Promotional->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$Promotional->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$Promotional->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$Promotional->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$Promotional->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$Promotional->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$Promotional->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$Promotional->trang_thai->setDbValue($rs->fields('trang_thai'));
		$Promotional->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$Promotional->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Promotional;

		// Call Row_Rendering event
		$Promotional->Row_Rendering();

		// Common render codes for all row types
		// tieude_tintuc

		$Promotional->tieude_tintuc->CellCssStyle = "width: 340px; white-space: nowrap;";
		$Promotional->tieude_tintuc->CellCssClass = "";

		// thoigian_them
		$Promotional->thoigian_them->CellCssStyle = "width: 120px; white-space: nowrap;";
		$Promotional->thoigian_them->CellCssClass = "";

		// soluot_truynhap
		$Promotional->soluot_truynhap->CellCssStyle = "width: 120px; white-space: nowrap;";
		$Promotional->soluot_truynhap->CellCssClass = "";

		// trang_thai
		$Promotional->trang_thai->CellCssStyle = "width: 120px; white-space: nowrap;";
		$Promotional->trang_thai->CellCssClass = "";

		// xuatban
		$Promotional->xuatban->CellCssStyle = "white-space: nowrap;";
		$Promotional->xuatban->CellCssClass = "";
		if ($Promotional->RowType == EW_ROWTYPE_VIEW) { // View row

			// tieude_tintuc
			$Promotional->tieude_tintuc->ViewValue = $Promotional->tieude_tintuc->CurrentValue;
			$Promotional->tieude_tintuc->CssStyle = "";
			$Promotional->tieude_tintuc->CssClass = "";
			$Promotional->tieude_tintuc->ViewCustomAttributes = "";

			// thoigian_them
			$Promotional->thoigian_them->ViewValue = $Promotional->thoigian_them->CurrentValue;
			$Promotional->thoigian_them->ViewValue = ew_FormatDateTime($Promotional->thoigian_them->ViewValue, 7);
			$Promotional->thoigian_them->CssStyle = "";
			$Promotional->thoigian_them->CssClass = "";
			$Promotional->thoigian_them->ViewCustomAttributes = "";

			// soluot_truynhap
			$Promotional->soluot_truynhap->ViewValue = $Promotional->soluot_truynhap->CurrentValue;
			$Promotional->soluot_truynhap->CssStyle = "";
			$Promotional->soluot_truynhap->CssClass = "";
			$Promotional->soluot_truynhap->ViewCustomAttributes = "";

			// trang_thai
			if (strval($Promotional->trang_thai->CurrentValue) <> "") {
				switch ($Promotional->trang_thai->CurrentValue) {
					case "1":
						$Promotional->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$Promotional->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$Promotional->trang_thai->ViewValue = $Promotional->trang_thai->CurrentValue;
				}
			} else {
				$Promotional->trang_thai->ViewValue = NULL;
			}
			$Promotional->trang_thai->CssStyle = "";
			$Promotional->trang_thai->CssClass = "";
			$Promotional->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($Promotional->xuatban->CurrentValue) <> "") {
				switch ($Promotional->xuatban->CurrentValue) {
					case "0":
						$Promotional->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$Promotional->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$Promotional->xuatban->ViewValue = $Promotional->xuatban->CurrentValue;
				}
			} else {
				$Promotional->xuatban->ViewValue = NULL;
			}
			$Promotional->xuatban->CssStyle = "";
			$Promotional->xuatban->CssClass = "";
			$Promotional->xuatban->ViewCustomAttributes = "";

			// tieude_tintuc
			$Promotional->tieude_tintuc->HrefValue = "";

			// thoigian_them
			$Promotional->thoigian_them->HrefValue = "";

			// soluot_truynhap
			$Promotional->soluot_truynhap->HrefValue = "";

			// trang_thai
			$Promotional->trang_thai->HrefValue = "";

			// xuatban
			$Promotional->xuatban->HrefValue = "";
		}

		// Call Row Rendered event
		$Promotional->Row_Rendered();
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
