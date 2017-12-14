<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "orderinfo.php" ?>
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
$order_view = new corder_view();
$Page =& $order_view;

// Page init processing
$order_view->Page_Init();

// Page main processing
$order_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($order->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var order_view = new ew_Page("order_view");

// page properties
order_view.PageID = "view"; // page ID
var EW_PAGE_ID = order_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
order_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
order_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
order_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_view.ValidateRequired = false; // no JavaScript validation
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
<?php } ?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="orderlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Chi tiết đơn hàng</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate" style="border: solid black 1px">
<thead><!-- Table header -->
	<tr class="ewTableHeader">

        <td style=" text-align: center " width="80px">Mã đơn hàng</td>

	<td style=" text-align: center " width="80px">Tên người mua</td>

	<td style=" text-align: center " width="80px">Thời gian đặt hàng</td>

	<td style=" text-align: center " width="80px">Kiểu thanh toán</td>

	<td style=" text-align: center " width="80px">Thời gian thanh toán</td>

	<td style=" text-align: center " width="80px">Thời gian giao hàng</td>

	<td style=" text-align: center " width="80px">Số hóa đơn</td>

	<td style=" text-align: center " width="80px">Giá trị đơn hàng</td>

	<td style=" text-align: center " width="80px">Số tiền phải thanh toán</td>

	<td style=" text-align: center " width="80px">Trạng thái thanh toán</td>

	<td style=" text-align: center " width="80px">Trạng thái giao hàng</td>

	</tr>
</thead>
	<tr>
            <td<?php echo $order->c_madh->CellAttributes() ?>>
<div<?php echo $order->c_madh->ViewAttributes() ?>><?php echo $order->c_madh->ViewValue ?></div></td>
            <td<?php echo $order->c_ten_nguoimua->CellAttributes() ?>>
<div<?php echo $order->c_ten_nguoimua->ViewAttributes() ?>><?php echo $order->c_ten_nguoimua->ViewValue ?></div></td>
		<td<?php echo $order->c_time_order->CellAttributes() ?>>
<div<?php echo $order->c_time_order->ViewAttributes() ?>><?php echo $order->c_time_order->ViewValue ?></div></td>
		<td<?php echo $order->c_checkout_type->CellAttributes() ?>>
<div<?php echo $order->c_checkout_type->ViewAttributes() ?>><?php echo $order->c_checkout_type->ViewValue ?></div></td>
		<td<?php echo $order->c_time_checkout->CellAttributes() ?>>
<div<?php echo $order->c_time_checkout->ViewAttributes() ?>><?php echo $order->c_time_checkout->ViewValue ?></div></td>
		<td<?php echo $order->c_time_delivery->CellAttributes() ?>>
<div<?php echo $order->c_time_delivery->ViewAttributes() ?>><?php echo $order->c_time_delivery->ViewValue ?></div></td>
		<td<?php echo $order->c_so_hd->CellAttributes() ?>>
<div<?php echo $order->c_so_hd->ViewAttributes() ?>><?php echo $order->c_so_hd->ViewValue ?></div></td>
		<td<?php echo $order->c_tonggiatri->CellAttributes() ?>>
<div<?php echo $order->c_tonggiatri->ViewAttributes() ?>><?php echo $order->c_tonggiatri->ViewValue ?></div></td>
		<td<?php echo $order->c_tienthanhtoan->CellAttributes() ?>>
<div<?php echo $order->c_tienthanhtoan->ViewAttributes() ?>><?php echo $order->c_tienthanhtoan->ViewValue ?></div></td>
		<td<?php echo $order->c_status_thanhtoan->CellAttributes() ?>>
<div<?php echo $order->c_status_thanhtoan->ViewAttributes() ?>><?php echo $order->c_status_thanhtoan->ViewValue ?></div></td>
		<td<?php echo $order->c_status_giaohang->CellAttributes() ?>>
<div<?php echo $order->c_status_giaohang->ViewAttributes() ?>><?php echo $order->c_status_giaohang->ViewValue ?></div></td>
	</tr>
</table>
   
<br/>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Chi tiết</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br/>
<?php
$orderid=$_GET['order_id'];
$sSqlWrk = "Select products.sanpham_id,
  products.ten_sanpham,
  products.don_gia,
  order_detail.c_soluong  
From order_detail Inner Join
  products On products.sanpham_id = order_detail.sanpham_id
Where order_detail.order_id =".$orderid;
$rswrk = $conn->Execute($sSqlWrk);
$arwrkSP = ($rswrk) ? $rswrk->GetRows() : array();
$rowsSP = count($arwrkSP);
if ($rswrk) $rswrk->Close();
if ( $rowsSP>0) {?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate" style="border: solid black 1px">
<thead><!-- Table header -->
	<tr class="ewTableHeader">

        <td style=" text-align: center " width="30px"></td>

	<td style=" text-align: center " width="30px">STT</td>

	<td style=" text-align: center " width="300px">Tên hàng</td>

	<td style=" text-align: center " width="150px">Đơn giá</td>

	<td style=" text-align: center " width="150px">Số lượng</td>

        <td style=" text-align: center " width="150px">Thành tiền</td>

	<td style=" text-align: center " width="150px">Kiểu hàng</td>

	</tr>
</thead>
	<?php 
        $stt=0;
        for ($i=0; $i<$rowsSP;$i++)
        {
        $stt+=1;
            ?>
        <tr>
            <td style=" text-align: center ">
                <a href="productsview.php?sanpham_id=<?php echo $arwrkSP[$i]["sanpham_id"] ?>">Xem</a>
            </td>
            <td style=" text-align: center ">
                <?php echo $stt ?>
            </td>
            <td>
                <?php echo $arwrkSP[$i]["ten_sanpham"] ?>
            </td>
            <td style=" text-align: center ">
                <?php echo $arwrkSP[$i]["don_gia"] ?>
            </td>
            <td style=" text-align: center ">
                <?php echo $arwrkSP[$i]["c_soluong"] ?>
            </td>
            <td style=" text-align: center ">
                <?php echo $arwrkSP[$i]["don_gia"] * $arwrkSP[$i]["c_soluong"] ?>
            </td>
            <td style=" text-align: center ">
                <?php echo "Sản phẩm" ?>
            </td>
	</tr>
        <?php } ?>
</table>
<?php } else echo "Không có dữ liệu";?>

<?php if ($order->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class corder_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'order';

	// Page Object Name
	var $PageObjName = 'order_view';

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
	function corder_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["order"] = new corder();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

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
		if (!$Security->CanView()) {
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
	var $lDisplayRecs; // Number of display records
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs;
	var $lRecRange;
	var $lRecCnt;

	//
	// Page main processing
	//
	function Page_Main() {
		global $order;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["order_id"] <> "") {
				$order->order_id->setQueryStringValue($_GET["order_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$order->CurrentAction = "I"; // Display form
			switch ($order->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("orderlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($order->order_id->CurrentValue) == strval($rs->fields('order_id'))) {
								$order->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("No records found"); // Set no record message
						$sReturnUrl = "orderlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "orderlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$order->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $order;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$order->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$order->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $order->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$order->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$order->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$order->setStartRecordNumber($this->lStartRec);
		}
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
		$order->c_ten_nguoimua->setDbValue($rs->fields('c_ten_nguoimua'));
		$order->c_time_order->setDbValue($rs->fields('c_time_order'));
		$order->c_checkout_type->setDbValue($rs->fields('c_checkout_type'));
		$order->c_time_checkout->setDbValue($rs->fields('c_time_checkout'));
		$order->c_time_delivery->setDbValue($rs->fields('c_time_delivery'));
		$order->c_so_hd->setDbValue($rs->fields('c_so_hd'));
		$order->c_nguoinhan->setDbValue($rs->fields('c_nguoinhan'));
		$order->c_address_nh->setDbValue($rs->fields('c_address_nh'));
		$order->c_tel->setDbValue($rs->fields('c_tel'));
		$order->c_mobile->setDbValue($rs->fields('c_mobile'));
		$order->c_email->setDbValue($rs->fields('c_email'));
		$order->c_code->setDbValue($rs->fields('c_code'));
		$order->c_thoigianthichhop->setDbValue($rs->fields('c_thoigianthichhop'));
		$order->c_tonggiatri->setDbValue($rs->fields('c_tonggiatri'));
		$order->c_phivanchuyen->setDbValue($rs->fields('c_phivanchuyen'));
		$order->c_tienthanhtoan->setDbValue($rs->fields('c_tienthanhtoan'));
		$order->c_ghichu->setDbValue($rs->fields('c_ghichu'));
		$order->c_status_thanhtoan->setDbValue($rs->fields('c_status_thanhtoan'));
		$order->c_status_giaohang->setDbValue($rs->fields('c_status_giaohang'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $order;

		// Call Row_Rendering event
		$order->Row_Rendering();

		// Common render codes for all row types
		// c_madh

		$order->c_madh->CellCssStyle = "";
		$order->c_madh->CellCssClass = "";

		// c_ten_nguoimua
		$order->c_ten_nguoimua->CellCssStyle = "";
		$order->c_ten_nguoimua->CellCssClass = "";

		// c_time_order
		$order->c_time_order->CellCssStyle = "";
		$order->c_time_order->CellCssClass = "";

		// c_checkout_type
		$order->c_checkout_type->CellCssStyle = "";
		$order->c_checkout_type->CellCssClass = "";

		// c_time_checkout
		$order->c_time_checkout->CellCssStyle = "";
		$order->c_time_checkout->CellCssClass = "";

		// c_time_delivery
		$order->c_time_delivery->CellCssStyle = "";
		$order->c_time_delivery->CellCssClass = "";

		// c_so_hd
		$order->c_so_hd->CellCssStyle = "";
		$order->c_so_hd->CellCssClass = "";

		// c_nguoinhan
		$order->c_nguoinhan->CellCssStyle = "";
		$order->c_nguoinhan->CellCssClass = "";

		// c_address_nh
		$order->c_address_nh->CellCssStyle = "";
		$order->c_address_nh->CellCssClass = "";

		// c_tel
		$order->c_tel->CellCssStyle = "";
		$order->c_tel->CellCssClass = "";

		// c_mobile
		$order->c_mobile->CellCssStyle = "";
		$order->c_mobile->CellCssClass = "";

		// c_email
		$order->c_email->CellCssStyle = "";
		$order->c_email->CellCssClass = "";

		// c_code
		$order->c_code->CellCssStyle = "";
		$order->c_code->CellCssClass = "";

		// c_thoigianthichhop
		$order->c_thoigianthichhop->CellCssStyle = "";
		$order->c_thoigianthichhop->CellCssClass = "";

		// c_tonggiatri
		$order->c_tonggiatri->CellCssStyle = "";
		$order->c_tonggiatri->CellCssClass = "";

		// c_phivanchuyen
		$order->c_phivanchuyen->CellCssStyle = "";
		$order->c_phivanchuyen->CellCssClass = "";

		// c_tienthanhtoan
		$order->c_tienthanhtoan->CellCssStyle = "";
		$order->c_tienthanhtoan->CellCssClass = "";

		// c_ghichu
		$order->c_ghichu->CellCssStyle = "";
		$order->c_ghichu->CellCssClass = "";

		// c_status_thanhtoan
		$order->c_status_thanhtoan->CellCssStyle = "";
		$order->c_status_thanhtoan->CellCssClass = "";

		// c_status_giaohang
		$order->c_status_giaohang->CellCssStyle = "";
		$order->c_status_giaohang->CellCssClass = "";
		if ($order->RowType == EW_ROWTYPE_VIEW) { // View row

			// order_id
			$order->order_id->ViewValue = $order->order_id->CurrentValue;
			$order->order_id->CssStyle = "";
			$order->order_id->CssClass = "";
			$order->order_id->ViewCustomAttributes = "";

			// nguoidung_id
			$order->nguoidung_id->ViewValue = $order->nguoidung_id->CurrentValue;
			$order->nguoidung_id->CssStyle = "";
			$order->nguoidung_id->CssClass = "";
			$order->nguoidung_id->ViewCustomAttributes = "";

			// c_madh
			$order->c_madh->ViewValue = $order->c_madh->CurrentValue;
			$order->c_madh->CssStyle = "";
			$order->c_madh->CssClass = "";
			$order->c_madh->ViewCustomAttributes = "";

			// c_ten_nguoimua
			$order->c_ten_nguoimua->ViewValue = $order->c_ten_nguoimua->CurrentValue;
			$order->c_ten_nguoimua->CssStyle = "";
			$order->c_ten_nguoimua->CssClass = "";
			$order->c_ten_nguoimua->ViewCustomAttributes = "";

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
						$order->c_checkout_type->ViewValue = "ngan luong";
						break;
					case "1":
						$order->c_checkout_type->ViewValue = "Smartlink";
						break;
					case "2":
						$order->c_checkout_type->ViewValue = "Tien mat";
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

			// c_time_delivery
			$order->c_time_delivery->ViewValue = $order->c_time_delivery->CurrentValue;
			$order->c_time_delivery->ViewValue = ew_FormatDateTime($order->c_time_delivery->ViewValue, 7);
			$order->c_time_delivery->CssStyle = "";
			$order->c_time_delivery->CssClass = "";
			$order->c_time_delivery->ViewCustomAttributes = "";

			// c_so_hd
			$order->c_so_hd->ViewValue = $order->c_so_hd->CurrentValue;
			$order->c_so_hd->CssStyle = "";
			$order->c_so_hd->CssClass = "";
			$order->c_so_hd->ViewCustomAttributes = "";

			// c_nguoinhan
			$order->c_nguoinhan->ViewValue = $order->c_nguoinhan->CurrentValue;
			$order->c_nguoinhan->CssStyle = "";
			$order->c_nguoinhan->CssClass = "";
			$order->c_nguoinhan->ViewCustomAttributes = "";

			// c_address_nh
			$order->c_address_nh->ViewValue = $order->c_address_nh->CurrentValue;
			$order->c_address_nh->CssStyle = "";
			$order->c_address_nh->CssClass = "";
			$order->c_address_nh->ViewCustomAttributes = "";

			// c_tel
			$order->c_tel->ViewValue = $order->c_tel->CurrentValue;
			$order->c_tel->CssStyle = "";
			$order->c_tel->CssClass = "";
			$order->c_tel->ViewCustomAttributes = "";

			// c_mobile
			$order->c_mobile->ViewValue = $order->c_mobile->CurrentValue;
			$order->c_mobile->CssStyle = "";
			$order->c_mobile->CssClass = "";
			$order->c_mobile->ViewCustomAttributes = "";

			// c_email
			$order->c_email->ViewValue = $order->c_email->CurrentValue;
			$order->c_email->CssStyle = "";
			$order->c_email->CssClass = "";
			$order->c_email->ViewCustomAttributes = "";

			// c_code
			$order->c_code->ViewValue = $order->c_code->CurrentValue;
			$order->c_code->CssStyle = "";
			$order->c_code->CssClass = "";
			$order->c_code->ViewCustomAttributes = "";

			// c_thoigianthichhop
			$order->c_thoigianthichhop->ViewValue = $order->c_thoigianthichhop->CurrentValue;
			$order->c_thoigianthichhop->CssStyle = "";
			$order->c_thoigianthichhop->CssClass = "";
			$order->c_thoigianthichhop->ViewCustomAttributes = "";

			// c_tonggiatri
			$order->c_tonggiatri->ViewValue = $order->c_tonggiatri->CurrentValue;
			$order->c_tonggiatri->CssStyle = "";
			$order->c_tonggiatri->CssClass = "";
			$order->c_tonggiatri->ViewCustomAttributes = "";

			// c_phivanchuyen
			$order->c_phivanchuyen->ViewValue = $order->c_phivanchuyen->CurrentValue;
			$order->c_phivanchuyen->CssStyle = "";
			$order->c_phivanchuyen->CssClass = "";
			$order->c_phivanchuyen->ViewCustomAttributes = "";

			// c_tienthanhtoan
			$order->c_tienthanhtoan->ViewValue = $order->c_tienthanhtoan->CurrentValue;
			$order->c_tienthanhtoan->CssStyle = "";
			$order->c_tienthanhtoan->CssClass = "";
			$order->c_tienthanhtoan->ViewCustomAttributes = "";

			// c_ghichu
			$order->c_ghichu->ViewValue = $order->c_ghichu->CurrentValue;
			$order->c_ghichu->CssStyle = "";
			$order->c_ghichu->CssClass = "";
			$order->c_ghichu->ViewCustomAttributes = "";

			// c_status_thanhtoan
			if (strval($order->c_status_thanhtoan->CurrentValue) <> "") {
				switch ($order->c_status_thanhtoan->CurrentValue) {
					case "0":
						$order->c_status_thanhtoan->ViewValue = "Chua thanh toan";
						break;
					case "1":
						$order->c_status_thanhtoan->ViewValue = "Da Thanh toan";
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

			// c_status_giaohang
			if (strval($order->c_status_giaohang->CurrentValue) <> "") {
				switch ($order->c_status_giaohang->CurrentValue) {
					case "0":
						$order->c_status_giaohang->ViewValue = "Chua giao hang";
						break;
					case "1":
						$order->c_status_giaohang->ViewValue = "Da giao hang";
						break;
					default:
						$order->c_status_giaohang->ViewValue = $order->c_status_giaohang->CurrentValue;
				}
			} else {
				$order->c_status_giaohang->ViewValue = NULL;
			}
			$order->c_status_giaohang->CssStyle = "";
			$order->c_status_giaohang->CssClass = "";
			$order->c_status_giaohang->ViewCustomAttributes = "";

			// c_madh
			$order->c_madh->HrefValue = "";

			// c_ten_nguoimua
			$order->c_ten_nguoimua->HrefValue = "";

			// c_time_order
			$order->c_time_order->HrefValue = "";

			// c_checkout_type
			$order->c_checkout_type->HrefValue = "";

			// c_time_checkout
			$order->c_time_checkout->HrefValue = "";

			// c_time_delivery
			$order->c_time_delivery->HrefValue = "";

			// c_so_hd
			$order->c_so_hd->HrefValue = "";

			// c_nguoinhan
			$order->c_nguoinhan->HrefValue = "";

			// c_address_nh
			$order->c_address_nh->HrefValue = "";

			// c_tel
			$order->c_tel->HrefValue = "";

			// c_mobile
			$order->c_mobile->HrefValue = "";

			// c_email
			$order->c_email->HrefValue = "";

			// c_code
			$order->c_code->HrefValue = "";

			// c_thoigianthichhop
			$order->c_thoigianthichhop->HrefValue = "";

			// c_tonggiatri
			$order->c_tonggiatri->HrefValue = "";

			// c_phivanchuyen
			$order->c_phivanchuyen->HrefValue = "";

			// c_tienthanhtoan
			$order->c_tienthanhtoan->HrefValue = "";

			// c_ghichu
			$order->c_ghichu->HrefValue = "";

			// c_status_thanhtoan
			$order->c_status_thanhtoan->HrefValue = "";

			// c_status_giaohang
			$order->c_status_giaohang->HrefValue = "";
		}

		// Call Row Rendered event
		$order->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $order;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($order->nguoidung_id->CurrentValue);
			}
		}
		return TRUE;
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
