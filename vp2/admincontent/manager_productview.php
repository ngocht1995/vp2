<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_productinfo.php" ?>
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
$manager_product_view = new cmanager_product_view();
$Page =& $manager_product_view;

// Page init processing
$manager_product_view->Page_Init();

// Page main processing
$manager_product_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_product->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_product_view = new ew_Page("manager_product_view");

// page properties
manager_product_view.PageID = "view"; // page ID
var EW_PAGE_ID = manager_product_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
manager_product_view.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_product_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_product_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_product_view.ValidateRequired = false; // no JavaScript validation
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
<?php }  ?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="manager_productlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($manager_product->Export == "") { ?>

<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $manager_product->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->AllowList('manager_product_pic')) { ?>
<a href="manager_product_piclist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=manager_product&sanpham_id=<?php echo urlencode(strval($manager_product->sanpham_id->CurrentValue)) ?>"><img border="0" src="images/cmd_anh.gif"></a>
&nbsp;

<?php } ?>
<?php } ?>
</span></p>
<?php $manager_product_view->ShowMessage() ?>
<p>
<?php if ($manager_product->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_view->Pager)) $manager_product_view->Pager = new cNumericPager($manager_product_view->lStartRec, $manager_product_view->lDisplayRecs, $manager_product_view->lTotalRecs, $manager_product_view->lRecRange) ?>
<?php if ($manager_product_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có sản phẩm
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($manager_product->nguoidung_id->Visible) { // nguoidung_id ?>
	<tr<?php echo $manager_product->nguoidung_id->RowAttributes ?>>
		<td class="ewTableHeader">Tên công ty</td>
		<td<?php echo $manager_product->nguoidung_id->CellAttributes() ?>>
<div<?php echo $manager_product->nguoidung_id->ViewAttributes() ?>><?php echo $manager_product->nguoidung_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->ten_sanpham->Visible) { // ten_sanpham ?>
	<tr<?php echo $manager_product->ten_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Tên sản phẩm</td>
		<td<?php echo $manager_product->ten_sanpham->CellAttributes() ?>>
<div<?php echo $manager_product->ten_sanpham->ViewAttributes() ?>><?php echo $manager_product->ten_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->ma_sanpham->Visible) { // ma_sanpham ?>
	<tr<?php echo $manager_product->ma_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Mã số</td>
		<td<?php echo $manager_product->ma_sanpham->CellAttributes() ?>>
<div<?php echo $manager_product->ma_sanpham->ViewAttributes() ?>><?php echo $manager_product->ma_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<tr<?php echo $manager_product->nganhnghe_id->RowAttributes ?>>
		<td class="ewTableHeader">Loại sản phẩm</td>
		<td<?php echo $manager_product->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $manager_product->nganhnghe_id->ViewAttributes() ?>><?php echo $manager_product->nganhnghe_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->chung_nhan->Visible) { // chung_nhan ?>
	<tr<?php echo $manager_product->chung_nhan->RowAttributes ?>>
		<td class="ewTableHeader">Chứng nhận chất lượng</td>
		<td<?php echo $manager_product->chung_nhan->CellAttributes() ?>>
<div<?php echo $manager_product->chung_nhan->ViewAttributes() ?>><?php echo $manager_product->chung_nhan->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->nhan_hieu->Visible) { // nhan_hieu ?>
	<tr<?php echo $manager_product->nhan_hieu->RowAttributes ?>>
		<td class="ewTableHeader">Nhãn hiệu</td>
		<td<?php echo $manager_product->nhan_hieu->CellAttributes() ?>>
<div<?php echo $manager_product->nhan_hieu->ViewAttributes() ?>><?php echo $manager_product->nhan_hieu->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->xuat_su->Visible) { // xuat_su ?>
	<tr<?php echo $manager_product->xuat_su->RowAttributes ?>>
		<td class="ewTableHeader">Nơi sản xuất</td>
		<td<?php echo $manager_product->xuat_su->CellAttributes() ?>>
<div<?php echo $manager_product->xuat_su->ViewAttributes() ?>><?php echo $manager_product->xuat_su->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->tomtat_sanpham->Visible) { // tomtat_sanpham ?>
	<tr<?php echo $manager_product->tomtat_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn</td>
		<td<?php echo $manager_product->tomtat_sanpham->CellAttributes() ?>>
<div<?php echo $manager_product->tomtat_sanpham->ViewAttributes() ?>><?php echo $manager_product->tomtat_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->noidung_sanpham->Visible) { // noidung_sanpham ?>
	<tr<?php echo $manager_product->noidung_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $manager_product->noidung_sanpham->CellAttributes() ?>>
<div<?php echo $manager_product->noidung_sanpham->ViewAttributes() ?>><?php echo $manager_product->noidung_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->loai_tien->Visible) { // loai_tien ?>
	<tr<?php echo $manager_product->loai_tien->RowAttributes ?>>
		<td class="ewTableHeader">Loại tiền</td>
		<td<?php echo $manager_product->loai_tien->CellAttributes() ?>>
<div<?php echo $manager_product->loai_tien->ViewAttributes() ?>><?php echo $manager_product->loai_tien->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->donvi_tinh->Visible) { // donvi_tinh ?>
	<tr<?php echo $manager_product->donvi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Đơn vị tính</td>
		<td<?php echo $manager_product->donvi_tinh->CellAttributes() ?>>
<div<?php echo $manager_product->donvi_tinh->ViewAttributes() ?>><?php echo $manager_product->donvi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->gia_xuatcang->Visible) { // gia_xuatcang ?>
	<tr<?php echo $manager_product->gia_xuatcang->RowAttributes ?>>
		<td class="ewTableHeader">Giá xuất cảng</td>
		<td<?php echo $manager_product->gia_xuatcang->CellAttributes() ?>>
<div<?php echo $manager_product->gia_xuatcang->ViewAttributes() ?>><?php echo $manager_product->gia_xuatcang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->phuongthuc_ttoan->Visible) { // phuongthuc_ttoan ?>
	<tr<?php echo $manager_product->phuongthuc_ttoan->RowAttributes ?>>
		<td class="ewTableHeader">Phương thức TT</td>
		<td<?php echo $manager_product->phuongthuc_ttoan->CellAttributes() ?>>
<div<?php echo $manager_product->phuongthuc_ttoan->ViewAttributes() ?>><?php echo $manager_product->phuongthuc_ttoan->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->thoihan_giaohang->Visible) { // thoihan_giaohang ?>
	<tr<?php echo $manager_product->thoihan_giaohang->RowAttributes ?>>
		<td class="ewTableHeader">Thời hạn giao hàng</td>
		<td<?php echo $manager_product->thoihan_giaohang->CellAttributes() ?>>
<div<?php echo $manager_product->thoihan_giaohang->ViewAttributes() ?>><?php echo $manager_product->thoihan_giaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->soluong_tonkho->Visible) { // soluong_tonkho ?>
	<tr<?php echo $manager_product->soluong_tonkho->RowAttributes ?>>
		<td class="ewTableHeader">Số lượng nhỏ nhất</td>
		<td<?php echo $manager_product->soluong_tonkho->CellAttributes() ?>>
<div<?php echo $manager_product->soluong_tonkho->ViewAttributes() ?>><?php echo $manager_product->soluong_tonkho->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->tg_themsanpham->Visible) { // tg_themsanpham ?>
	<tr<?php echo $manager_product->tg_themsanpham->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $manager_product->tg_themsanpham->CellAttributes() ?>>
<div<?php echo $manager_product->tg_themsanpham->ViewAttributes() ?>><?php echo $manager_product->tg_themsanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->tg_suasanpham->Visible) { // tg_suasanpham ?>
	<tr<?php echo $manager_product->tg_suasanpham->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $manager_product->tg_suasanpham->CellAttributes() ?>>
<div<?php echo $manager_product->tg_suasanpham->ViewAttributes() ?>><?php echo $manager_product->tg_suasanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->so_lanxem->Visible) { // so_lanxem ?>
	<tr<?php echo $manager_product->so_lanxem->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $manager_product->so_lanxem->CellAttributes() ?>>
<div<?php echo $manager_product->so_lanxem->ViewAttributes() ?>><?php echo $manager_product->so_lanxem->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $manager_product->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $manager_product->trang_thai->CellAttributes() ?>>
<div<?php echo $manager_product->trang_thai->ViewAttributes() ?>><?php echo $manager_product->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $manager_product->xuatban->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $manager_product->xuatban->CellAttributes() ?>>
<div<?php echo $manager_product->xuatban->ViewAttributes() ?>><?php echo $manager_product->xuatban->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->thanhtoan_status->Visible) { // thanhtoan_status ?>
	<tr<?php echo $manager_product->thanhtoan_status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái thanh toán</td>
		<td<?php echo $manager_product->thanhtoan_status->CellAttributes() ?>>
<div<?php echo $manager_product->thanhtoan_status->ViewAttributes() ?>><?php echo $manager_product->thanhtoan_status->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($manager_product->don_gia->Visible) { // don_gia ?>
	<tr<?php echo $manager_product->don_gia->RowAttributes ?>>
		<td class="ewTableHeader">Đơn giá</td>
		<td<?php echo $manager_product->don_gia->CellAttributes() ?>>
<div<?php echo $manager_product->don_gia->ViewAttributes() ?>><?php echo $manager_product->don_gia->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($manager_product->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_view->Pager)) $manager_product_view->Pager = new cNumericPager($manager_product_view->lStartRec, $manager_product_view->lDisplayRecs, $manager_product_view->lTotalRecs, $manager_product_view->lRecRange) ?>
<?php if ($manager_product_view->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_view->PageUrl() ?>start=<?php echo $manager_product_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có sản phẩm
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($manager_product->Export == "") { ?>
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
class cmanager_product_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'manager_product';

	// Page Object Name
	var $PageObjName = 'manager_product_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_product;
		if ($manager_product->UseTokenInUrl) $PageUrl .= "t=" . $manager_product->TableVar . "&"; // add page token
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
		global $objForm, $manager_product;
		if ($manager_product->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_product->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_product->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_product_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_product"] = new cmanager_product();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_product', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_product;
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
			$this->Page_Terminate("manager_productlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("manager_productlist.php");
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
		global $manager_product;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["sanpham_id"] <> "") {
				$manager_product->sanpham_id->setQueryStringValue($_GET["sanpham_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$manager_product->CurrentAction = "I"; // Display form
			switch ($manager_product->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("manager_productlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($manager_product->sanpham_id->CurrentValue) == strval($rs->fields('sanpham_id'))) {
								$manager_product->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$sReturnUrl = "manager_productlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "manager_productlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$manager_product->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_product;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_product->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_product->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_product->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_product->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_product->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_product->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_product;

		// Call Recordset Selecting event
		$manager_product->Recordset_Selecting($manager_product->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_product->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_product->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_product;
		$sFilter = $manager_product->KeyFilter();

		// Call Row Selecting event
		$manager_product->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_product->CurrentFilter = $sFilter;
		$sSql = $manager_product->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_product->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_product;
		$manager_product->sanpham_id->setDbValue($rs->fields('sanpham_id'));
                $manager_product->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$manager_product->ten_sanpham->setDbValue($rs->fields('ten_sanpham'));
		$manager_product->ma_sanpham->setDbValue($rs->fields('ma_sanpham'));		
		$manager_product->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$manager_product->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$manager_product->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
		$manager_product->xuat_su->setDbValue($rs->fields('xuat_su'));
		$manager_product->tomtat_sanpham->setDbValue($rs->fields('tomtat_sanpham'));
		$manager_product->noidung_sanpham->setDbValue($rs->fields('noidung_sanpham'));
		$manager_product->loai_tien->setDbValue($rs->fields('loai_tien'));
		$manager_product->donvi_tinh->setDbValue($rs->fields('donvi_tinh'));
		$manager_product->gia_xuatcang->setDbValue($rs->fields('gia_xuatcang'));
		$manager_product->phuongthuc_ttoan->setDbValue($rs->fields('phuongthuc_ttoan'));
		$manager_product->thoihan_giaohang->setDbValue($rs->fields('thoihan_giaohang'));
		$manager_product->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));		
		$manager_product->tg_themsanpham->setDbValue($rs->fields('tg_themsanpham'));
		$manager_product->tg_suasanpham->setDbValue($rs->fields('tg_suasanpham'));
		$manager_product->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$manager_product->trang_thai->setDbValue($rs->fields('trang_thai'));
		$manager_product->xuatban->setDbValue($rs->fields('xuatban'));
                $manager_product->thanhtoan_status->setDbValue($rs->fields('thanhtoan_status'));
		$manager_product->don_gia->setDbValue($rs->fields('don_gia'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_product;

		// Call Row_Rendering event
		$manager_product->Row_Rendering();

		// Common render codes for all row types
              	// nguoidung_id

		$manager_product->nguoidung_id->CellCssStyle = "";
		$manager_product->nguoidung_id->CellCssClass = "";

		// ten_sanpham

		$manager_product->ten_sanpham->CellCssStyle = "";
		$manager_product->ten_sanpham->CellCssClass = "";

		// ma_sanpham
		$manager_product->ma_sanpham->CellCssStyle = "";
		$manager_product->ma_sanpham->CellCssClass = "";

		// tu_khoa
		$manager_product->tu_khoa->CellCssStyle = "";
		$manager_product->tu_khoa->CellCssClass = "";

		// nganhnghe_id
		$manager_product->nganhnghe_id->CellCssStyle = "";
		$manager_product->nganhnghe_id->CellCssClass = "";

		// chung_nhan
		$manager_product->chung_nhan->CellCssStyle = "";
		$manager_product->chung_nhan->CellCssClass = "";

		// nhan_hieu
		$manager_product->nhan_hieu->CellCssStyle = "";
		$manager_product->nhan_hieu->CellCssClass = "";

		// xuat_su
		$manager_product->xuat_su->CellCssStyle = "";
		$manager_product->xuat_su->CellCssClass = "";

		// tomtat_sanpham
		$manager_product->tomtat_sanpham->CellCssStyle = "";
		$manager_product->tomtat_sanpham->CellCssClass = "";

		// noidung_sanpham
		$manager_product->noidung_sanpham->CellCssStyle = "";
		$manager_product->noidung_sanpham->CellCssClass = "";

		// loai_tien
		$manager_product->loai_tien->CellCssStyle = "";
		$manager_product->loai_tien->CellCssClass = "";

		// donvi_tinh
		$manager_product->donvi_tinh->CellCssStyle = "";
		$manager_product->donvi_tinh->CellCssClass = "";

		// gia_xuatcang
		$manager_product->gia_xuatcang->CellCssStyle = "";
		$manager_product->gia_xuatcang->CellCssClass = "";

		// phuongthuc_ttoan
		$manager_product->phuongthuc_ttoan->CellCssStyle = "";
		$manager_product->phuongthuc_ttoan->CellCssClass = "";

		// thoihan_giaohang
		$manager_product->thoihan_giaohang->CellCssStyle = "";
		$manager_product->thoihan_giaohang->CellCssClass = "";

		// soluong_tonkho
		$manager_product->soluong_tonkho->CellCssStyle = "";
		$manager_product->soluong_tonkho->CellCssClass = "";

		// khanang_cungcap
		$manager_product->khanang_cungcap->CellCssStyle = "";
		$manager_product->khanang_cungcap->CellCssClass = "";

		// tg_themsanpham
		$manager_product->tg_themsanpham->CellCssStyle = "";
		$manager_product->tg_themsanpham->CellCssClass = "";

		// tg_suasanpham
		$manager_product->tg_suasanpham->CellCssStyle = "";
		$manager_product->tg_suasanpham->CellCssClass = "";

		// so_lanxem
		$manager_product->so_lanxem->CellCssStyle = "";
		$manager_product->so_lanxem->CellCssClass = "";

		// trang_thai
		$manager_product->trang_thai->CellCssStyle = "";
		$manager_product->trang_thai->CellCssClass = "";

		// xuatban
		$manager_product->xuatban->CellCssStyle = "";
		$manager_product->xuatban->CellCssClass = "";
                // thanhtoan_status
		$manager_product->thanhtoan_status->CellCssStyle = "";
		$manager_product->thanhtoan_status->CellCssClass = "";

		// don_gia
		$manager_product->don_gia->CellCssStyle = "";
		$manager_product->don_gia->CellCssClass = "";
		if ($manager_product->RowType == EW_ROWTYPE_VIEW) { // View row

                        // nguoidung_id
			if (strval($manager_product->nguoidung_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_congty` FROM `user` WHERE `nguoidung_id` = " . ew_AdjustSql($manager_product->nguoidung_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product->nguoidung_id->ViewValue = $rswrk->fields('ten_congty');
					$rswrk->Close();
				} else {
					$manager_product->nguoidung_id->ViewValue = $manager_product->nguoidung_id->CurrentValue;
				}
			} else {
				$manager_product->nguoidung_id->ViewValue = NULL;
			}
			$manager_product->nguoidung_id->CssStyle = "";
			$manager_product->nguoidung_id->CssClass = "";
			$manager_product->nguoidung_id->ViewCustomAttributes = "";

			// ten_sanpham
			$manager_product->ten_sanpham->ViewValue = $manager_product->ten_sanpham->CurrentValue;
			$manager_product->ten_sanpham->CssStyle = "";
			$manager_product->ten_sanpham->CssClass = "";
			$manager_product->ten_sanpham->ViewCustomAttributes = "";

			// ma_sanpham
			$manager_product->ma_sanpham->ViewValue = $manager_product->ma_sanpham->CurrentValue;
			$manager_product->ma_sanpham->CssStyle = "";
			$manager_product->ma_sanpham->CssClass = "";
			$manager_product->ma_sanpham->ViewCustomAttributes = "";

			// tu_khoa
			$manager_product->tu_khoa->ViewValue = $manager_product->tu_khoa->CurrentValue;
			$manager_product->tu_khoa->CssStyle = "";
			$manager_product->tu_khoa->CssClass = "";
			$manager_product->tu_khoa->ViewCustomAttributes = "";

			// nganhnghe_id
			if (strval($manager_product->nganhnghe_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($manager_product->nganhnghe_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
					$rswrk->Close();
				} else {
					$manager_product->nganhnghe_id->ViewValue = $manager_product->nganhnghe_id->CurrentValue;
				}
			} else {
				$manager_product->nganhnghe_id->ViewValue = NULL;
			}
			$manager_product->nganhnghe_id->CssStyle = "";
			$manager_product->nganhnghe_id->CssClass = "";
			$manager_product->nganhnghe_id->ViewCustomAttributes = "";

			// chung_nhan
			$manager_product->chung_nhan->ViewValue = $manager_product->chung_nhan->CurrentValue;
			$manager_product->chung_nhan->CssStyle = "";
			$manager_product->chung_nhan->CssClass = "";
			$manager_product->chung_nhan->ViewCustomAttributes = "";

			// nhan_hieu
			$manager_product->nhan_hieu->ViewValue = $manager_product->nhan_hieu->CurrentValue;
			$manager_product->nhan_hieu->CssStyle = "";
			$manager_product->nhan_hieu->CssClass = "";
			$manager_product->nhan_hieu->ViewCustomAttributes = "";

			// xuat_su
			if (strval($manager_product->xuat_su->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($manager_product->xuat_su->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product->xuat_su->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$manager_product->xuat_su->ViewValue = $manager_product->xuat_su->CurrentValue;
				}
			} else {
				$manager_product->xuat_su->ViewValue = NULL;
			}
			$manager_product->xuat_su->CssStyle = "";
			$manager_product->xuat_su->CssClass = "";
			$manager_product->xuat_su->ViewCustomAttributes = "";

			// tomtat_sanpham
			$manager_product->tomtat_sanpham->ViewValue = $manager_product->tomtat_sanpham->CurrentValue;
			$manager_product->tomtat_sanpham->CssStyle = "";
			$manager_product->tomtat_sanpham->CssClass = "";
			$manager_product->tomtat_sanpham->ViewCustomAttributes = "";

			// noidung_sanpham
			$manager_product->noidung_sanpham->ViewValue = $manager_product->noidung_sanpham->CurrentValue;
			$manager_product->noidung_sanpham->CssStyle = "";
			$manager_product->noidung_sanpham->CssClass = "";
			$manager_product->noidung_sanpham->ViewCustomAttributes = "";

			// loai_tien
			if (strval($manager_product->loai_tien->CurrentValue) <> "") {
				switch ($manager_product->loai_tien->CurrentValue) {
					case "0":
						$manager_product->loai_tien->ViewValue = "VND";
						break;
					case "1":
						$manager_product->loai_tien->ViewValue = "AUD";
						break;
					case "2":
						$manager_product->loai_tien->ViewValue = "EUR";
						break;
                                        case "3":
						$manager_product->loai_tien->ViewValue = "GBP";
						break;
					case "4":
						$manager_product->loai_tien->ViewValue = "JPY";
						break;
					case "5":
						$manager_product->loai_tien->ViewValue = "USD";
						break;
                                        case "6":
						$manager_product->loai_tien->ViewValue = "Khác";
						break;
					default:
						$manager_product->loai_tien->ViewValue = $manager_product->loai_tien->CurrentValue;
				}
			} else {
				$manager_product->loai_tien->ViewValue = NULL;
			}
			$manager_product->loai_tien->CssStyle = "";
			$manager_product->loai_tien->CssClass = "";
			$manager_product->loai_tien->ViewCustomAttributes = "";

			// donvi_tinh
			$manager_product->donvi_tinh->ViewValue = $manager_product->donvi_tinh->CurrentValue;
			$manager_product->donvi_tinh->CssStyle = "";
			$manager_product->donvi_tinh->CssClass = "";
			$manager_product->donvi_tinh->ViewCustomAttributes = "";

			// gia_xuatcang
			if (strval($manager_product->gia_xuatcang->CurrentValue) <> "") {
				switch ($manager_product->gia_xuatcang->CurrentValue) {
					case "1":
						$manager_product->gia_xuatcang->ViewValue = "CIF";
						break;
					case "2":
						$manager_product->gia_xuatcang->ViewValue = "FOB";
						break;
					case "3":
						$manager_product->gia_xuatcang->ViewValue = "Khác";
						break;
					default:
						$manager_product->gia_xuatcang->ViewValue = $manager_product->gia_xuatcang->CurrentValue;
				}
			} else {
				$manager_product->gia_xuatcang->ViewValue = NULL;
			}
			$manager_product->gia_xuatcang->CssStyle = "";
			$manager_product->gia_xuatcang->CssClass = "";
			$manager_product->gia_xuatcang->ViewCustomAttributes = "";

			// phuongthuc_ttoan
			if (strval($manager_product->phuongthuc_ttoan->CurrentValue) <> "") {
				$arwrk = explode(",", $manager_product->phuongthuc_ttoan->CurrentValue);
				$sSqlWrk = "SELECT `Payment_name` FROM `payment` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`Payment_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$manager_product->phuongthuc_ttoan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$manager_product->phuongthuc_ttoan->ViewValue .= $rswrk->fields('Payment_name');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $manager_product->phuongthuc_ttoan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$manager_product->phuongthuc_ttoan->ViewValue = $manager_product->phuongthuc_ttoan->CurrentValue;
				}
			} else {
				$manager_product->phuongthuc_ttoan->ViewValue = NULL;
			}
			$manager_product->phuongthuc_ttoan->CssStyle = "";
			$manager_product->phuongthuc_ttoan->CssClass = "";
			$manager_product->phuongthuc_ttoan->ViewCustomAttributes = "";

			// thoihan_giaohang
			$manager_product->thoihan_giaohang->ViewValue = $manager_product->thoihan_giaohang->CurrentValue;
			$manager_product->thoihan_giaohang->CssStyle = "";
			$manager_product->thoihan_giaohang->CssClass = "";
			$manager_product->thoihan_giaohang->ViewCustomAttributes = "";

			// soluong_tonkho
			$manager_product->soluong_tonkho->ViewValue = $manager_product->soluong_tonkho->CurrentValue;
			$manager_product->soluong_tonkho->CssStyle = "";
			$manager_product->soluong_tonkho->CssClass = "";
			$manager_product->soluong_tonkho->ViewCustomAttributes = "";

			// khanang_cungcap
			$manager_product->khanang_cungcap->ViewValue = $manager_product->khanang_cungcap->CurrentValue;
			$manager_product->khanang_cungcap->CssStyle = "";
			$manager_product->khanang_cungcap->CssClass = "";
			$manager_product->khanang_cungcap->ViewCustomAttributes = "";

			// tg_themsanpham
			$manager_product->tg_themsanpham->ViewValue = $manager_product->tg_themsanpham->CurrentValue;
			$manager_product->tg_themsanpham->ViewValue = ew_FormatDateTime($manager_product->tg_themsanpham->ViewValue, 7);
			$manager_product->tg_themsanpham->CssStyle = "";
			$manager_product->tg_themsanpham->CssClass = "";
			$manager_product->tg_themsanpham->ViewCustomAttributes = "";

			// tg_suasanpham
			$manager_product->tg_suasanpham->ViewValue = $manager_product->tg_suasanpham->CurrentValue;
			$manager_product->tg_suasanpham->ViewValue = ew_FormatDateTime($manager_product->tg_suasanpham->ViewValue, 7);
			$manager_product->tg_suasanpham->CssStyle = "";
			$manager_product->tg_suasanpham->CssClass = "";
			$manager_product->tg_suasanpham->ViewCustomAttributes = "";

			// so_lanxem
			$manager_product->so_lanxem->ViewValue = $manager_product->so_lanxem->CurrentValue;
			$manager_product->so_lanxem->CssStyle = "";
			$manager_product->so_lanxem->CssClass = "";
			$manager_product->so_lanxem->ViewCustomAttributes = "";

			// trang_thai
			if (strval($manager_product->trang_thai->CurrentValue) <> "") {
				switch ($manager_product->trang_thai->CurrentValue) {
					case "1":
						$manager_product->trang_thai->ViewValue = "Chưa kích hoạt";
						break;
					case "2":
						$manager_product->trang_thai->ViewValue = "Đã kích hoạt";
						break;
					default:
						$manager_product->trang_thai->ViewValue = $manager_product->trang_thai->CurrentValue;
				}
			} else {
				$manager_product->trang_thai->ViewValue = NULL;
			}
			$manager_product->trang_thai->CssStyle = "";
			$manager_product->trang_thai->CssClass = "";
			$manager_product->trang_thai->ViewCustomAttributes = "";

			// xuatban
			if (strval($manager_product->xuatban->CurrentValue) <> "") {
				switch ($manager_product->xuatban->CurrentValue) {
					case "0":
						$manager_product->xuatban->ViewValue = "Đang chờ";
						break;
					case "1":
						$manager_product->xuatban->ViewValue = "Xuất bản";
						break;
					default:
						$manager_product->xuatban->ViewValue = $manager_product->xuatban->CurrentValue;
				}
			} else {
				$manager_product->xuatban->ViewValue = NULL;
			}
			$manager_product->xuatban->CssStyle = "";
			$manager_product->xuatban->CssClass = "";
			$manager_product->xuatban->ViewCustomAttributes = "";
                         // thanhtoan_status
			if (strval($manager_product->thanhtoan_status->CurrentValue) <> "") {
				switch ($manager_product->thanhtoan_status->CurrentValue) {
					case "0":
						$manager_product->thanhtoan_status->ViewValue = "Không thanh toán trực tuyến";
						break;
					case "1":
						$manager_product->thanhtoan_status->ViewValue = "Có thanh toán trực tuyến";
						break;
					default:
						$manager_product->thanhtoan_status->ViewValue = $manager_product->thanhtoan_status->CurrentValue;
				}
			} else {
				$manager_product->thanhtoan_status->ViewValue = NULL;
			}
			$manager_product->thanhtoan_status->CssStyle = "";
			$manager_product->thanhtoan_status->CssClass = "";
			$manager_product->thanhtoan_status->ViewCustomAttributes = "";

			// don_gia
			$manager_product->don_gia->ViewValue = $manager_product->don_gia->CurrentValue;
			$manager_product->don_gia->CssStyle = "";
			$manager_product->don_gia->CssClass = "";
			$manager_product->don_gia->ViewCustomAttributes = "";

                        // nguoidung_id
			$manager_product->nguoidung_id->HrefValue = "";

			// ten_sanpham
			$manager_product->ten_sanpham->HrefValue = "";

			// ma_sanpham
			$manager_product->ma_sanpham->HrefValue = "";

			// tu_khoa
			$manager_product->tu_khoa->HrefValue = "";

			// nganhnghe_id
			$manager_product->nganhnghe_id->HrefValue = "";

			// chung_nhan
			$manager_product->chung_nhan->HrefValue = "";

			// nhan_hieu
			$manager_product->nhan_hieu->HrefValue = "";

			// xuat_su
			$manager_product->xuat_su->HrefValue = "";

			// tomtat_sanpham
			$manager_product->tomtat_sanpham->HrefValue = "";

			// noidung_sanpham
			$manager_product->noidung_sanpham->HrefValue = "";

			// loai_tien
			$manager_product->loai_tien->HrefValue = "";

			// donvi_tinh
			$manager_product->donvi_tinh->HrefValue = "";

			// gia_xuatcang
			$manager_product->gia_xuatcang->HrefValue = "";

			// phuongthuc_ttoan
			$manager_product->phuongthuc_ttoan->HrefValue = "";

			// thoihan_giaohang
			$manager_product->thoihan_giaohang->HrefValue = "";

			// soluong_tonkho
			$manager_product->soluong_tonkho->HrefValue = "";

			// khanang_cungcap
			$manager_product->khanang_cungcap->HrefValue = "";

			// tg_themsanpham
			$manager_product->tg_themsanpham->HrefValue = "";

			// tg_suasanpham
			$manager_product->tg_suasanpham->HrefValue = "";

			// so_lanxem
			$manager_product->so_lanxem->HrefValue = "";

			// trang_thai
			$manager_product->trang_thai->HrefValue = "";

			// xuatban
			$manager_product->xuatban->HrefValue = "";
                         // thanhtoan_status
			$manager_product->thanhtoan_status->HrefValue = "";

			// don_gia
			$manager_product->don_gia->HrefValue = "";
		}

		// Call Row Rendered event
		$manager_product->Row_Rendered();
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
