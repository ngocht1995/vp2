<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "orderinfo.php" ?>
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
$order_delete = new corder_delete();
$Page =& $order_delete;

// Page init processing
$order_delete->Page_Init();

// Page main processing
$order_delete->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var order_delete = new ew_Page("order_delete");

// page properties
order_delete.PageID = "delete"; // page ID
var EW_PAGE_ID = order_delete.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
order_delete.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
order_delete.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
order_delete.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_delete.ValidateRequired = false; // no JavaScript validation
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
$rs = $order_delete->LoadRecordset();
$order_deletelTotalRecs = $rs->RecordCount(); // Get record count
if ($order_deletelTotalRecs <= 0) { // No record found, exit
	$rs->Close();
	$order_delete->Page_Terminate("orderlist.php"); // Return to list
}
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $order->getReturnUrl() ?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xóa giao dịch thanh toán trực tuyến</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php $order_delete->ShowMessage() ?>
<form action="<?php echo ew_CurrentPage() ?>" method="post">
<p>
<input type="hidden" name="t" id="t" value="order">
<input type="hidden" name="a_delete" id="a_delete" value="D">
<?php foreach ($order_delete->arRecKeys as $key) { ?>
<input type="hidden" name="key_m[]" id="key_m[]" value="<?php echo ew_HtmlEncode($key) ?>">
<?php } ?>
<table class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
<?php echo $order->TableCustomInnerHtml ?>
	<thead>
	<tr class="ewTableHeader">
		<td valign="top">Tên sản phẩm</td>
		<td valign="top">Số lượng</td>
		<td valign="top">Đơn giá</td>
		<td valign="top">Thời gian đặt hàng</td>
		<td valign="top">Kiểu thanh toán</td>
		<td valign="top">Thời gian thanh toán</td>
		<td valign="top">Mã đơn hàng</td>
		<td valign="top">Tổng tiền</td>
		<td valign="top">Trạng thái thanh toán</td>
		<td valign="top">Đối tác</td>
	</tr>
	</thead>
	<tbody>
<?php
$order_delete->lRecCnt = 0;
$i = 0;
while (!$rs->EOF) {
	$order_delete->lRecCnt++;

	// Set row properties
	$order->CssClass = "";
	$order->CssStyle = "";
	$order->RowType = EW_ROWTYPE_VIEW; // View

	// Get the field contents
	$order_delete->LoadRowValues($rs);

	// Render row
	$order_delete->RenderRow();
?>
	<tr<?php echo $order->RowAttributes() ?>>
		<td<?php echo $order->c_sanpham_id->CellAttributes() ?>>
<div<?php echo $order->c_sanpham_id->ViewAttributes() ?>><?php echo $order->c_sanpham_id->ListViewValue() ?></div></td>
		<td<?php echo $order->c_soluong->CellAttributes() ?>>
<div<?php echo $order->c_soluong->ViewAttributes() ?>><?php echo $order->c_soluong->ListViewValue() ?></div></td>
		<td<?php echo $order->c_dongia->CellAttributes() ?>>
<div<?php echo $order->c_dongia->ViewAttributes() ?>><?php echo $order->c_dongia->ListViewValue() ?></div></td>
		<td<?php echo $order->c_time_order->CellAttributes() ?>>
<div<?php echo $order->c_time_order->ViewAttributes() ?>><?php echo $order->c_time_order->ListViewValue() ?></div></td>
		<td<?php echo $order->c_checkout_type->CellAttributes() ?>>
<div<?php echo $order->c_checkout_type->ViewAttributes() ?>><?php echo $order->c_checkout_type->ListViewValue() ?></div></td>
		<td<?php echo $order->c_time_checkout->CellAttributes() ?>>
<div<?php echo $order->c_time_checkout->ViewAttributes() ?>><?php echo $order->c_time_checkout->ListViewValue() ?></div></td>
		<td<?php echo $order->c_so_hd->CellAttributes() ?>>
<div<?php echo $order->c_so_hd->ViewAttributes() ?>><?php echo $order->c_so_hd->ListViewValue() ?></div></td>
		<td<?php echo $order->c_tonggiatri->CellAttributes() ?>>
<div<?php echo $order->c_tonggiatri->ViewAttributes() ?>><?php echo $order->c_tonggiatri->ListViewValue() ?></div></td>
		<td<?php echo $order->c_status_thanhtoan->CellAttributes() ?>>
<div<?php echo $order->c_status_thanhtoan->ViewAttributes() ?>><?php echo $order->c_status_thanhtoan->ListViewValue() ?></div></td>
		<td<?php echo $order->c_doitac->CellAttributes() ?>>
<div<?php echo $order->c_doitac->ViewAttributes() ?>><?php echo $order->c_doitac->ListViewValue() ?></div></td>
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
<input type="submit" name="Action" id="Action" value=" Xóa đơn hàng  ">
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
class corder_delete {

	// Page ID
	var $PageID = 'delete';

	// Table Name
	var $TableName = 'order';

	// Page Object Name
	var $PageObjName = 'order_delete';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $order;
		if ($order->UseTokenInUrl) $PageUrl .= "t=" . $order->TableVar . "&"; // add page token
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
		global $objForm, $order;
		if ($order->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($order->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($order->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function corder_delete() {
		global $conn;

		// Initialize table object
		$GLOBALS["order"] = new corder();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'delete', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'order', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $order;
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
			$this->Page_Terminate("orderlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "You do not have the right permission to view the page";
			$this->Page_Terminate("orderlist.php");
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
		global $order;

		// Load Key Parameters
		$sKey = "";
		$bSingleDelete = TRUE; // Initialize as single delete
		$nKeySelected = 0; // Initialize selected key count
		$sFilter = "";
		if (@$_GET["order_id"] <> "") {
			$order->order_id->setQueryStringValue($_GET["order_id"]);
			if (!is_numeric($order->order_id->QueryStringValue))
				$this->Page_Terminate("orderlist.php"); // Prevent SQL injection, exit
			$sKey .= $order->order_id->QueryStringValue;
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
			$this->Page_Terminate("orderlist.php"); // No key specified, return to list

		// Build filter
		foreach ($this->arRecKeys as $sKey) {
			$sFilter .= "(";

			// Set up key field
			$sKeyFld = $sKey;
			if (!is_numeric($sKeyFld))
				$this->Page_Terminate("orderlist.php"); // Prevent SQL injection, return to list
			$sFilter .= "`order_id`=" . ew_AdjustSql($sKeyFld) . " AND ";
			if (substr($sFilter, -5) == " AND ") $sFilter = substr($sFilter, 0, strlen($sFilter)-5) . ") OR ";
		}
		if (substr($sFilter, -4) == " OR ") $sFilter = substr($sFilter, 0, strlen($sFilter)-4);

		// Set up filter (SQL WhHERE clause) and get return SQL
		// SQL constructor in SQL constructor in order class, orderinfo.php

		$order->CurrentFilter = $sFilter;

		// Get action
		if (@$_POST["a_delete"] <> "") {
			$order->CurrentAction = $_POST["a_delete"];
		} else {
			$order->CurrentAction = "I"; // Display record
		}
		switch ($order->CurrentAction) {
			case "D": // Delete
				$order->SendEmail = TRUE; // Send email on delete success
				if ($this->DeleteRows()) { // delete rows
					$this->setMessage("Đã xóa đơn hàng"); // Set up success message
					$this->Page_Terminate($order->getReturnUrl()); // Return to caller
				}
		}
	}

	//
	//  Function DeleteRows
	//  - Delete Records based on current filter
	//
	function DeleteRows() {
		global $conn, $Security, $order;
		$DeleteRows = TRUE;
		$sWrkFilter = $order->CurrentFilter;

		// Set up filter (Sql Where Clause) and get Return SQL
		// SQL constructor in order class, orderinfo.php

		$order->CurrentFilter = $sWrkFilter;
		$sSql = $order->SQL();
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
				$DeleteRows = $order->Row_Deleting($row);
				if (!$DeleteRows) break;
			}
		}
		if ($DeleteRows) {
			$sKey = "";
			foreach ($rsold as $row) {
				$sThisKey = "";
				if ($sThisKey <> "") $sThisKey .= EW_COMPOSITE_KEY_SEPARATOR;
				$sThisKey .= $row['order_id'];
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$DeleteRows = $conn->Execute($order->DeleteSQL($row)); // Delete
				$conn->raiseErrorFn = '';
				if ($DeleteRows === FALSE)
					break;
				if ($sKey <> "") $sKey .= ", ";
				$sKey .= $sThisKey;
			}
		} else {

			// Set up error message
			if ($order->CancelMessage <> "") {
				$this->setMessage($order->CancelMessage);
				$order->CancelMessage = "";
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
				$order->Row_Deleted($row);
			}	
		}
		return $DeleteRows;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $order;

		// Call Recordset Selecting event
		$order->Recordset_Selecting($order->CurrentFilter);

		// Load list page SQL
		$sSql = $order->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$order->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $order;
		$sFilter = $order->KeyFilter();

		// Call Row Selecting event
		$order->Row_Selecting($sFilter);

		// Load sql based on filter
		$order->CurrentFilter = $sFilter;
		$sSql = $order->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$order->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $order;
		$order->order_id->setDbValue($rs->fields('order_id'));
		$order->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$order->c_madh->setDbValue($rs->fields('c_madh'));
		$order->c_sanpham_id->setDbValue($rs->fields('c_sanpham_id'));
		$order->c_soluong->setDbValue($rs->fields('c_soluong'));
		$order->c_dongia->setDbValue($rs->fields('c_dongia'));
		$order->c_time_order->setDbValue($rs->fields('c_time_order'));
		$order->c_checkout_type->setDbValue($rs->fields('c_checkout_type'));
		$order->c_time_checkout->setDbValue($rs->fields('c_time_checkout'));
		$order->c_so_hd->setDbValue($rs->fields('c_so_hd'));
		$order->c_tonggiatri->setDbValue($rs->fields('c_tonggiatri'));
		$order->c_status_thanhtoan->setDbValue($rs->fields('c_status_thanhtoan'));
		$order->c_doitac->setDbValue($rs->fields('c_doitac'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $order;

		// Call Row_Rendering event
		$order->Row_Rendering();

		// Common render codes for all row types
		// c_sanpham_id

		$order->c_sanpham_id->CellCssStyle = "";
		$order->c_sanpham_id->CellCssClass = "";

		// c_soluong
		$order->c_soluong->CellCssStyle = "";
		$order->c_soluong->CellCssClass = "";

		// c_dongia
		$order->c_dongia->CellCssStyle = "";
		$order->c_dongia->CellCssClass = "";

		// c_time_order
		$order->c_time_order->CellCssStyle = "";
		$order->c_time_order->CellCssClass = "";

		// c_checkout_type
		$order->c_checkout_type->CellCssStyle = "";
		$order->c_checkout_type->CellCssClass = "";

		// c_time_checkout
		$order->c_time_checkout->CellCssStyle = "";
		$order->c_time_checkout->CellCssClass = "";

		// c_so_hd
		$order->c_so_hd->CellCssStyle = "";
		$order->c_so_hd->CellCssClass = "";

		// c_tonggiatri
		$order->c_tonggiatri->CellCssStyle = "";
		$order->c_tonggiatri->CellCssClass = "";

		// c_status_thanhtoan
		$order->c_status_thanhtoan->CellCssStyle = "";
		$order->c_status_thanhtoan->CellCssClass = "";

		// c_doitac
		$order->c_doitac->CellCssStyle = "";
		$order->c_doitac->CellCssClass = "";
		if ($order->RowType == EW_ROWTYPE_VIEW) { // View row

			// c_sanpham_id
			if (strval($order->c_sanpham_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_sanpham` FROM `products` WHERE `sanpham_id` = " . ew_AdjustSql($order->c_sanpham_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$order->c_sanpham_id->ViewValue = $rswrk->fields('ten_sanpham');
					$rswrk->Close();
				} else {
					$order->c_sanpham_id->ViewValue = $order->c_sanpham_id->CurrentValue;
				}
			} else {
				$order->c_sanpham_id->ViewValue = NULL;
			}
			$order->c_sanpham_id->CssStyle = "";
			$order->c_sanpham_id->CssClass = "";
			$order->c_sanpham_id->ViewCustomAttributes = "";

			// c_soluong
			$order->c_soluong->ViewValue = $order->c_soluong->CurrentValue;
			$order->c_soluong->CssStyle = "";
			$order->c_soluong->CssClass = "";
			$order->c_soluong->ViewCustomAttributes = "";

			// c_dongia
			$order->c_dongia->ViewValue = $order->c_dongia->CurrentValue;
			$order->c_dongia->CssStyle = "";
			$order->c_dongia->CssClass = "";
			$order->c_dongia->ViewCustomAttributes = "";

			// c_time_order
			$order->c_time_order->ViewValue = $order->c_time_order->CurrentValue;
			$order->c_time_order->ViewValue = ew_FormatDateTime($order->c_time_order->ViewValue, 7);
			$order->c_time_order->CssStyle = "";
			$order->c_time_order->CssClass = "";
			$order->c_time_order->ViewCustomAttributes = "";

			// c_checkout_type
			if (strval($order->c_checkout_type->CurrentValue) <> "") {
				switch ($order->c_checkout_type->CurrentValue) {
					case "0":
						$order->c_checkout_type->ViewValue = "Tạm giữ";
						break;
					case "1":
						$order->c_checkout_type->ViewValue = "Thanh toán ngay";
						break;
					default:
						$order->c_checkout_type->ViewValue = $order->c_checkout_type->CurrentValue;
				}
			} else {
				$order->c_checkout_type->ViewValue = NULL;
			}
			$order->c_checkout_type->CssStyle = "";
			$order->c_checkout_type->CssClass = "";
			$order->c_checkout_type->ViewCustomAttributes = "";

			// c_time_checkout
			$order->c_time_checkout->ViewValue = $order->c_time_checkout->CurrentValue;
			$order->c_time_checkout->ViewValue = ew_FormatDateTime($order->c_time_checkout->ViewValue, 7);
			$order->c_time_checkout->CssStyle = "";
			$order->c_time_checkout->CssClass = "";
			$order->c_time_checkout->ViewCustomAttributes = "";

			// c_so_hd
			$order->c_so_hd->ViewValue = $order->c_so_hd->CurrentValue;
			$order->c_so_hd->CssStyle = "";
			$order->c_so_hd->CssClass = "";
			$order->c_so_hd->ViewCustomAttributes = "";

			// c_tonggiatri
			$order->c_tonggiatri->ViewValue = $order->c_tonggiatri->CurrentValue;
			$order->c_tonggiatri->CssStyle = "";
			$order->c_tonggiatri->CssClass = "";
			$order->c_tonggiatri->ViewCustomAttributes = "";

			// c_status_thanhtoan
			if (strval($order->c_status_thanhtoan->CurrentValue) <> "") {
				switch ($order->c_status_thanhtoan->CurrentValue) {
					case "0":
						$order->c_status_thanhtoan->ViewValue = "Chưa hoàn thành";
						break;
					case "1":
						$order->c_status_thanhtoan->ViewValue = "Hoàn thành";
						break;
					default:
						$order->c_status_thanhtoan->ViewValue = $order->c_status_thanhtoan->CurrentValue;
				}
			} else {
				$order->c_status_thanhtoan->ViewValue = NULL;
			}
			$order->c_status_thanhtoan->CssStyle = "";
			$order->c_status_thanhtoan->CssClass = "";
			$order->c_status_thanhtoan->ViewCustomAttributes = "";

			// c_doitac
			$order->c_doitac->ViewValue = $order->c_doitac->CurrentValue;
			$order->c_doitac->CssStyle = "";
			$order->c_doitac->CssClass = "";
			$order->c_doitac->ViewCustomAttributes = "";

			// c_sanpham_id
			$order->c_sanpham_id->HrefValue = "";

			// c_soluong
			$order->c_soluong->HrefValue = "";

			// c_dongia
			$order->c_dongia->HrefValue = "";

			// c_time_order
			$order->c_time_order->HrefValue = "";

			// c_checkout_type
			$order->c_checkout_type->HrefValue = "";

			// c_time_checkout
			$order->c_time_checkout->HrefValue = "";

			// c_so_hd
			$order->c_so_hd->HrefValue = "";

			// c_tonggiatri
			$order->c_tonggiatri->HrefValue = "";

			// c_status_thanhtoan
			$order->c_status_thanhtoan->HrefValue = "";

			// c_doitac
			$order->c_doitac->HrefValue = "";
		}

		// Call Row Rendered event
		$order->Row_Rendered();
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
