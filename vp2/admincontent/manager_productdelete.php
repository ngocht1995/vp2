<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "productsinfo.php" ?>
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
$products_delete = new cproducts_delete();
$Page =& $products_delete;

// Page init processing
$products_delete->Page_Init();

// Page main processing
$products_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var products_delete = new ew_Page("products_delete");

// page properties
products_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = products_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
products_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
products_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
products_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
products_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $products_delete->LoadRecordset();
$products_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($products_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$products_delete->Page_Terminate("productslist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $products->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $products_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="products">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($products_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $products->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tên sản phẩm</td>
		<td valign="top">Loại sản phẩm</td>
		<td valign="top">Thời gian nhập</td>
		<td valign="top">Số lần xem</td>
		<td valign="top">Trạng thái</td>
		<td valign="top">Xuất bản</td>
	</tr>
	</thead>
	<tbody>
<?php
$products_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$products_delete->lRecCnt++;

	// Set row properties
	$products->CssClass = "";
	$products->CssStyle = "";
	$products->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$products_delete->LoadRowValues($rs);

	// Render row
	$products_delete->RenderRow();
?>
	<tr<?php echo $products->RowAttributes() ?>>
		<td<?php echo $products->ten_sanpham->CellAttributes() ?>>
<div<?php echo $products->ten_sanpham->ViewAttributes() ?>><?php echo $products->ten_sanpham->ListViewValue() ?></div></td>
		<td<?php echo $products->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $products->nganhnghe_id->ViewAttributes() ?>><?php echo $products->nganhnghe_id->ListViewValue() ?></div></td>
		<td<?php echo $products->tg_themsanpham->CellAttributes() ?>>
<div<?php echo $products->tg_themsanpham->ViewAttributes() ?>><?php echo $products->tg_themsanpham->ListViewValue() ?></div></td>
		<td<?php echo $products->so_lanxem->CellAttributes() ?>>
<div<?php echo $products->so_lanxem->ViewAttributes() ?>><?php echo $products->so_lanxem->ListViewValue() ?></div></td>
		<td<?php echo $products->trang_thai->CellAttributes() ?>>
<div<?php echo $products->trang_thai->ViewAttributes() ?>><?php echo $products->trang_thai->ListViewValue() ?></div></td>
		<td<?php echo $products->xuatban->CellAttributes() ?>>
<div<?php echo $products->xuatban->ViewAttributes() ?>><?php echo $products->xuatban->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value=" Xóa ">
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
class cproducts_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'products';

	// Page Object Name
	var $PageObjName = 'products_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $products;
		if ($products->UseTokenInUrl) $PageUrl .= "t=" . $products->TableVar . "&"; // add page token
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
		global $objForm, $products;
		if ($products->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($products->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($products->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cproducts_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["products"] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'products', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $products;
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
			$this->Page_Terminate("productslist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("productslist.php");
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
		global $products;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["sanpham_id"] <> "") {
			$products->sanpham_id->setQueryStringValue($_GET["sanpham_id"]);
			if (!is_numeric($products->sanpham_id->QueryStringValue))
				$this->Page_Terminate("productslist.php"); // Prevent SQL injection, exit
			$sKey .= $products->sanpham_id->QueryStringValue;
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
			$this->Page_Terminate("productslist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("productslist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`sanpham_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in products class, productsinfo.php

		$products->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$products->CurrentAction = $_POST["a_delete"];
		} else {
			$products->CurrentAction = "I"; // Display record
		}
		switch ($products->CurrentAction) {
			case "D": // Delete
				$products->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa sản phẩm"); // Set up success message
					$this->Page_Terminate($products->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $products;
		$DeleteRows = TRUE;
		$sWrkFilter = $products->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in products class, productsinfo.php

		$products->CurrentFilter = $sWrkFilter;
		$sSql = $products->SQL();
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
				$DeleteRows = $products->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['sanpham_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
			    $DeleteRows = $conn->Execute($products->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($products->CancelMessage <> "") {
				$this->setMessage($products->CancelMessage);
				$products->CancelMessage = "";
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
				$products->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $products;

		// Call Recordset Selecting event
		$products->Recordset_Selecting($products->CurrentFilter);

		// Load list page SQL
		$sSql = $products->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$products->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $products;
		$sFilter = $products->KeyFilter();

		// Call Row Selecting event
		$products->Row_Selecting($sFilter);

		// Load sql based on filter
		$products->CurrentFilter = $sFilter;
		$sSql = $products->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$products->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $products;
		$products->sanpham_id->setDbValue($rs->fields('sanpham_id'));
		$products->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$products->ten_sanpham->setDbValue($rs->fields('ten_sanpham'));
		$products->ma_sanpham->setDbValue($rs->fields('ma_sanpham'));		
		$products->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$products->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$products->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
		$products->xuat_su->setDbValue($rs->fields('xuat_su'));
		$products->tomtat_sanpham->setDbValue($rs->fields('tomtat_sanpham'));
		$products->noidung_sanpham->setDbValue($rs->fields('noidung_sanpham'));
		$products->loai_tien->setDbValue($rs->fields('loai_tien'));
		$products->donvi_tinh->setDbValue($rs->fields('donvi_tinh'));
		$products->gia_xuatcang->setDbValue($rs->fields('gia_xuatcang'));
		$products->phuongthuc_ttoan->setDbValue($rs->fields('phuongthuc_ttoan'));
		$products->thoihan_giaohang->setDbValue($rs->fields('thoihan_giaohang'));
		$products->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));		
		$products->tg_themsanpham->setDbValue($rs->fields('tg_themsanpham'));
		$products->tg_suasanpham->setDbValue($rs->fields('tg_suasanpham'));
		$products->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$products->trang_thai->setDbValue($rs->fields('trang_thai'));		
		$products->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $products;

		// Call Row_Rendering event
		$products->Row_Rendering();

		// Common render codes for all row types
		// ten_sanpham

		$products->ten_sanpham->CellCssStyle = "width: 200px; white-space: nowrap;";
		$products->ten_sanpham->CellCssClass = "";

		// nganhnghe_id
		$products->nganhnghe_id->CellCssStyle = "white-space: nowrap;";
		$products->nganhnghe_id->CellCssClass = "";

		// tg_themsanpham
		$products->tg_themsanpham->CellCssStyle = "white-space: nowrap;";
		$products->tg_themsanpham->CellCssClass = "";

		// so_lanxem
		$products->so_lanxem->CellCssStyle = "width: 100px; white-space: nowrap;";
		$products->so_lanxem->CellCssClass = "";

		// trang_thai
		$products->trang_thai->CellCssStyle = "width: 150px; white-space: nowrap;";
		$products->trang_thai->CellCssClass = "";

		// xuatban
		$products->xuatban->CellCssStyle = "width: 150px; white-space: nowrap;";
		$products->xuatban->CellCssClass = "";
		if ($products->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_sanpham
			$products->ten_sanpham->ViewValue = $products->ten_sanpham->CurrentValue;
			$products->ten_sanpham->CssStyle = "";
			$products->ten_sanpham->CssClass = "";
			$products->ten_sanpham->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($products->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($products->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$products->nganhnghe_id->ViewValue = $products->nganhnghe_id->CurrentValue;
				}
			} else {
				$products->nganhnghe_id->ViewValue = NULL;
			}
			$products->nganhnghe_id->CssStyle = "";
			$products->nganhnghe_id->CssClass = "";
			$products->nganhnghe_id->ViewCustomAttributes = "";

			// tg_themsanpham
			$products->tg_themsanpham->ViewValue = $products->tg_themsanpham->CurrentValue;
			$products->tg_themsanpham->ViewValue = ew_FormatDateTime($products->tg_themsanpham->ViewValue, 7);
			$products->tg_themsanpham->CssStyle = "";
			$products->tg_themsanpham->CssClass = "";
			$products->tg_themsanpham->ViewCustomAttributes = "";

			// so_lanxem
			$products->so_lanxem->ViewValue = $products->so_lanxem->CurrentValue;
			$products->so_lanxem->CssStyle = "";
			$products->so_lanxem->CssClass = "";
			$products->so_lanxem->ViewCustomAttributes = "";

			// trang_thai
			if (strval($products->trang_thai->CurrentValue) <> "") {
				switch ($products->trang_thai->CurrentValue) {
					case "1":
						$products->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$products->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$products->trang_thai->ViewValue = $products->trang_thai->CurrentValue;
				}
			} else {
				$products->trang_thai->ViewValue = NULL;
			}
			$products->trang_thai->CssStyle = "";
			$products->trang_thai->CssClass = "";
			$products->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($products->xuatban->CurrentValue) <> "") {
				switch ($products->xuatban->CurrentValue) {
					case "0":
						$products->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$products->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$products->xuatban->ViewValue = $products->xuatban->CurrentValue;
				}
			} else {
				$products->xuatban->ViewValue = NULL;
			}
			$products->xuatban->CssStyle = "";
			$products->xuatban->CssClass = "";
			$products->xuatban->ViewCustomAttributes = "";

			// ten_sanpham
			$products->ten_sanpham->HrefValue = "";

			// nganhnghe_id
			$products->nganhnghe_id->HrefValue = "";

			// tg_themsanpham
			$products->tg_themsanpham->HrefValue = "";

			// so_lanxem
			$products->so_lanxem->HrefValue = "";

			// trang_thai
			$products->trang_thai->HrefValue = "";

			// xuatban
			$products->xuatban->HrefValue = "";
		}

		// Call Row Rendered event
		$products->Row_Rendered();
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
