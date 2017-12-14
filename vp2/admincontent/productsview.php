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
$products_view = new cproducts_view();
$Page =& $products_view;

// Page init processing
$products_view->Page_Init();

// Page main processing
$products_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($products->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var products_view = new ew_Page("products_view");

// page properties
products_view.PageID = "view"; // page ID
var EW_PAGE_ID = products_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
products_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
products_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
products_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
products_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="productslist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin sản phẩm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php if ($products->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<?php if ($products_view->ShowOptionLink()) { ?>
<a href="<?php echo $products->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<?php if ($products_view->ShowOptionLink()) { ?>
<a href="<?php echo $products->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<?php if ($products_view->ShowOptionLink()) { ?>
<a href="<?php echo $products->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->AllowList('products')) { ?>
<?php if ($products_view->ShowOptionLink()) { ?>
<a href="pic_productlist.php?<?php echo EW_TABLE_SHOW_MASTER ?>=products&sanpham_id=<?php echo urlencode(strval($products->sanpham_id->CurrentValue)) ?>"><img border="0" src="images/cmd_anh.gif"></a>
&nbsp;
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $products_view->ShowMessage() ?>
<p>
<?php if ($products->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($products_view->Pager)) $products_view->Pager = new cNumericPager($products_view->lStartRec, $products_view->lDisplayRecs, $products_view->lTotalRecs, $products_view->lRecRange) ?>
<?php if ($products_view->Pager->RecordCount > 0) { ?>
	<?php if ($products_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($products_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($products_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($products_view->sSrchWhere == "0=101") { ?>
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
<?php if ($products->ten_sanpham->Visible) { // ten_sanpham ?>
	<tr<?php echo $products->ten_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Tên sản phẩm</td>
		<td<?php echo $products->ten_sanpham->CellAttributes() ?>>
<div<?php echo $products->ten_sanpham->ViewAttributes() ?>><?php echo $products->ten_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->ma_sanpham->Visible) { // ma_sanpham ?>
	<tr<?php echo $products->ma_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Mã số</td>
		<td<?php echo $products->ma_sanpham->CellAttributes() ?>>
<div<?php echo $products->ma_sanpham->ViewAttributes() ?>><?php echo $products->ma_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->anh_to->Visible) { // anh_to ?>
	<tr<?php echo $products->anh_to->RowAttributes ?>>
		<td class="ewTableHeader">Ảnh</td>
		<td<?php echo $products->anh_to->CellAttributes() ?>>
<?php if ($products->anh_to->HrefValue <> "") { ?>
<?php if (!is_null($products->anh_to->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $products->anh_to->Upload->DbValue ?>" border=0<?php echo $products->anh_to->ViewAttributes() ?>>
<?php } elseif (!in_array($products->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($products->anh_to->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $products->anh_to->Upload->DbValue ?>" border=0<?php echo $products->anh_to->ViewAttributes() ?>>
<?php } elseif (!in_array($products->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>
<?php if ($products->nganhnghe_id->Visible) { // nganhnghe_id ?>
	<tr<?php echo $products->nganhnghe_id->RowAttributes ?>>
		<td class="ewTableHeader">Loại sản phẩm</td>
		<td<?php echo $products->nganhnghe_id->CellAttributes() ?>>
<div<?php echo $products->nganhnghe_id->ViewAttributes() ?>><?php echo $products->nganhnghe_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->chung_nhan->Visible) { // chung_nhan ?>
	<tr<?php echo $products->chung_nhan->RowAttributes ?>>
		<td class="ewTableHeader">Chứng nhận chất lượng</td>
		<td<?php echo $products->chung_nhan->CellAttributes() ?>>
<div<?php echo $products->chung_nhan->ViewAttributes() ?>><?php echo $products->chung_nhan->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->nhan_hieu->Visible) { // nhan_hieu ?>
	<tr<?php echo $products->nhan_hieu->RowAttributes ?>>
		<td class="ewTableHeader">Nhãn hiệu</td>
		<td<?php echo $products->nhan_hieu->CellAttributes() ?>>
<div<?php echo $products->nhan_hieu->ViewAttributes() ?>><?php echo $products->nhan_hieu->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->tomtat_sanpham->Visible) { // tomtat_sanpham ?>
	<tr<?php echo $products->tomtat_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Trích dẫn</td>
		<td<?php echo $products->tomtat_sanpham->CellAttributes() ?>>
<div<?php echo $products->tomtat_sanpham->ViewAttributes() ?>><?php echo $products->tomtat_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->noidung_sanpham->Visible) { // noidung_sanpham ?>
	<tr<?php echo $products->noidung_sanpham->RowAttributes ?>>
		<td class="ewTableHeader">Nội dung</td>
		<td<?php echo $products->noidung_sanpham->CellAttributes() ?>>
<div<?php echo $products->noidung_sanpham->ViewAttributes() ?>><?php echo $products->noidung_sanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->loai_tien->Visible) { // loai_tien ?>
	<tr<?php echo $products->loai_tien->RowAttributes ?>>
		<td class="ewTableHeader">Loại tiền</td>
		<td<?php echo $products->loai_tien->CellAttributes() ?>>
<div<?php echo $products->loai_tien->ViewAttributes() ?>><?php echo $products->loai_tien->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->donvi_tinh->Visible) { // donvi_tinh ?>
	<tr<?php echo $products->donvi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Đơn vị tính</td>
		<td<?php echo $products->donvi_tinh->CellAttributes() ?>>
<div<?php echo $products->donvi_tinh->ViewAttributes() ?>><?php echo $products->donvi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->gia_xuatcang->Visible) { // gia_xuatcang ?>
	<tr<?php echo $products->gia_xuatcang->RowAttributes ?>>
		<td class="ewTableHeader">Giá xuất cảng</td>
		<td<?php echo $products->gia_xuatcang->CellAttributes() ?>>
<div<?php echo $products->gia_xuatcang->ViewAttributes() ?>><?php echo $products->gia_xuatcang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->phuongthuc_ttoan->Visible) { // phuongthuc_ttoan ?>
	<tr<?php echo $products->phuongthuc_ttoan->RowAttributes ?>>
		<td class="ewTableHeader">Phương thức TT</td>
		<td<?php echo $products->phuongthuc_ttoan->CellAttributes() ?>>
<div<?php echo $products->phuongthuc_ttoan->ViewAttributes() ?>><?php echo $products->phuongthuc_ttoan->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->thoihan_giaohang->Visible) { // thoihan_giaohang ?>
	<tr<?php echo $products->thoihan_giaohang->RowAttributes ?>>
		<td class="ewTableHeader">Thời hạn giao hàng</td>
		<td<?php echo $products->thoihan_giaohang->CellAttributes() ?>>
<div<?php echo $products->thoihan_giaohang->ViewAttributes() ?>><?php echo $products->thoihan_giaohang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->soluong_tonkho->Visible) { // soluong_tonkho ?>
	<tr<?php echo $products->soluong_tonkho->RowAttributes ?>>
		<td class="ewTableHeader">Số lượng nhỏ nhất</td>
		<td<?php echo $products->soluong_tonkho->CellAttributes() ?>>
<div<?php echo $products->soluong_tonkho->ViewAttributes() ?>><?php echo $products->soluong_tonkho->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->tg_themsanpham->Visible) { // tg_themsanpham ?>
	<tr<?php echo $products->tg_themsanpham->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian nhập</td>
		<td<?php echo $products->tg_themsanpham->CellAttributes() ?>>
<div<?php echo $products->tg_themsanpham->ViewAttributes() ?>><?php echo $products->tg_themsanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->tg_suasanpham->Visible) { // tg_suasanpham ?>
	<tr<?php echo $products->tg_suasanpham->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian sửa</td>
		<td<?php echo $products->tg_suasanpham->CellAttributes() ?>>
<div<?php echo $products->tg_suasanpham->ViewAttributes() ?>><?php echo $products->tg_suasanpham->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->so_lanxem->Visible) { // so_lanxem ?>
	<tr<?php echo $products->so_lanxem->RowAttributes ?>>
		<td class="ewTableHeader">Số lần xem</td>
		<td<?php echo $products->so_lanxem->CellAttributes() ?>>
<div<?php echo $products->so_lanxem->ViewAttributes() ?>><?php echo $products->so_lanxem->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $products->trang_thai->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái</td>
		<td<?php echo $products->trang_thai->CellAttributes() ?>>
<div<?php echo $products->trang_thai->ViewAttributes() ?>><?php echo $products->trang_thai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->xuatban->Visible) { // xuatban ?>
	<tr<?php echo $products->xuatban->RowAttributes ?>>
		<td class="ewTableHeader">Xuất bản</td>
		<td<?php echo $products->xuatban->CellAttributes() ?>>
<div<?php echo $products->xuatban->ViewAttributes() ?>><?php echo $products->xuatban->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->sanpham_tieubieu->Visible) { // sanpham_tieubieu ?>
	<tr<?php echo $products->sanpham_tieubieu->RowAttributes ?>>
		<td class="ewTableHeader">Sanpham Tieubieu</td>
		<td<?php echo $products->sanpham_tieubieu->CellAttributes() ?>>
<div<?php echo $products->sanpham_tieubieu->ViewAttributes() ?>><?php echo $products->sanpham_tieubieu->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->xuat_su->Visible) { // xuat_su ?>
	<tr<?php echo $products->xuat_su->RowAttributes ?>>
		<td class="ewTableHeader">Xuất sứ</td>
		<td<?php echo $products->xuat_su->CellAttributes() ?>>
<div<?php echo $products->xuat_su->ViewAttributes() ?>><?php echo $products->xuat_su->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->comment_status->Visible) { // comment_status ?>
	<tr<?php echo $products->comment_status->RowAttributes ?>>
		<td class="ewTableHeader">Comment Status</td>
		<td<?php echo $products->comment_status->CellAttributes() ?>>
<div<?php echo $products->comment_status->ViewAttributes() ?>><?php echo $products->comment_status->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->don_gia->Visible) { // don_gia ?>
	<tr<?php echo $products->don_gia->RowAttributes ?>>
		<td class="ewTableHeader">Đơn giá</td>
		<td<?php echo $products->don_gia->CellAttributes() ?>>
<div<?php echo $products->don_gia->ViewAttributes() ?>><?php echo $products->don_gia->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->thanhtoan_status->Visible) { // thanhtoan_status ?>
	<tr<?php echo $products->thanhtoan_status->RowAttributes ?>>
		<td class="ewTableHeader">Trạng thái thanh toán</td>
		<td<?php echo $products->thanhtoan_status->CellAttributes() ?>>
<div<?php echo $products->thanhtoan_status->ViewAttributes() ?>><?php echo $products->thanhtoan_status->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->soluong_tonkho->Visible) { // soluong_tonkho ?>
	<tr<?php echo $products->soluong_tonkho->RowAttributes ?>>
		<td class="ewTableHeader">Số lượng tồn</td>
		<td<?php echo $products->soluong_tonkho->CellAttributes() ?>>
<div<?php echo $products->soluong_tonkho->ViewAttributes() ?>><?php echo $products->soluong_tonkho->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->khuyenmai_status->Visible) { // khuyenmai_status ?>
	<tr<?php echo $products->khuyenmai_status->RowAttributes ?>>
		<td class="ewTableHeader">Khuyến mại</td>
		<td<?php echo $products->khuyenmai_status->CellAttributes() ?>>
<div<?php echo $products->khuyenmai_status->ViewAttributes() ?>><?php echo $products->khuyenmai_status->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->km_date_begin->Visible) { // km_date_begin ?>
	<tr<?php echo $products->km_date_begin->RowAttributes ?>>
		<td class="ewTableHeader">Ngày bắt đầu khuyến mại</td>
		<td<?php echo $products->km_date_begin->CellAttributes() ?>>
<div<?php echo $products->km_date_begin->ViewAttributes() ?>><?php echo $products->km_date_begin->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($products->km_date_end->Visible) { // km_date_end ?>
	<tr<?php echo $products->km_date_end->RowAttributes ?>>
		<td class="ewTableHeader">Ngày kết thúc khuyến mại</td>
		<td<?php echo $products->km_date_end->CellAttributes() ?>>
<div<?php echo $products->km_date_end->ViewAttributes() ?>><?php echo $products->km_date_end->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($products->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($products_view->Pager)) $products_view->Pager = new cNumericPager($products_view->lStartRec, $products_view->lDisplayRecs, $products_view->lTotalRecs, $products_view->lRecRange) ?>
<?php if ($products_view->Pager->RecordCount > 0) { ?>
	<?php if ($products_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($products_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($products_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($products_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $products_view->PageUrl() ?>start=<?php echo $products_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($products_view->sSrchWhere == "0=101") { ?>
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
<?php if ($products->Export == "") { ?>
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
class cproducts_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'products';

	// Page Object Name
	var $PageObjName = 'products_view';

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
	function cproducts_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["products"] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

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
		if (!$Security->CanView()) {
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
		global $products;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["sanpham_id"] <> "") {
				$products->sanpham_id->setQueryStringValue($_GET["sanpham_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$products->CurrentAction = "I"; // Display form
			switch ($products->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("productslist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($products->sanpham_id->CurrentValue) == strval($rs->fields('sanpham_id'))) {
								$products->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "productslist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "productslist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$products->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $products;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$products->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$products->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $products->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$products->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$products->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$products->setStartRecordNumber($this->lStartRec);
		}
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
		$products->anh_to->Upload->DbValue = $rs->fields('anh_to');
		$products->anh_nho->Upload->DbValue = $rs->fields('anh_nho');
		$products->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$products->chung_nhan->setDbValue($rs->fields('chung_nhan'));
		$products->nhan_hieu->setDbValue($rs->fields('nhan_hieu'));
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
		$products->sanpham_tieubieu->setDbValue($rs->fields('sanpham_tieubieu'));
		$products->xuat_su->setDbValue($rs->fields('xuat_su'));
		$products->comment_status->setDbValue($rs->fields('comment_status'));
		$products->don_gia->setDbValue($rs->fields('don_gia'));
		$products->thanhtoan_status->setDbValue($rs->fields('thanhtoan_status'));
		$products->soluong_tonkho->setDbValue($rs->fields('soluong_tonkho'));
		$products->khuyenmai_status->setDbValue($rs->fields('khuyenmai_status'));
		$products->km_date_begin->setDbValue($rs->fields('km_date_begin'));
		$products->km_date_end->setDbValue($rs->fields('km_date_end'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $products;

		// Call Row_Rendering event
		$products->Row_Rendering();

		// Common render codes for all row types
		// ten_sanpham

		$products->ten_sanpham->CellCssStyle = "";
		$products->ten_sanpham->CellCssClass = "";

		// ma_sanpham
		$products->ma_sanpham->CellCssStyle = "";
		$products->ma_sanpham->CellCssClass = "";

		// anh_to
		$products->anh_to->CellCssStyle = "";
		$products->anh_to->CellCssClass = "";

		// nganhnghe_id
		$products->nganhnghe_id->CellCssStyle = "";
		$products->nganhnghe_id->CellCssClass = "";

		// chung_nhan
		$products->chung_nhan->CellCssStyle = "";
		$products->chung_nhan->CellCssClass = "";

		// nhan_hieu
		$products->nhan_hieu->CellCssStyle = "";
		$products->nhan_hieu->CellCssClass = "";

		// tomtat_sanpham
		$products->tomtat_sanpham->CellCssStyle = "";
		$products->tomtat_sanpham->CellCssClass = "";

		// noidung_sanpham
		$products->noidung_sanpham->CellCssStyle = "";
		$products->noidung_sanpham->CellCssClass = "";

		// loai_tien
		$products->loai_tien->CellCssStyle = "";
		$products->loai_tien->CellCssClass = "";

		// donvi_tinh
		$products->donvi_tinh->CellCssStyle = "";
		$products->donvi_tinh->CellCssClass = "";

		// gia_xuatcang
		$products->gia_xuatcang->CellCssStyle = "";
		$products->gia_xuatcang->CellCssClass = "";

		// phuongthuc_ttoan
		$products->phuongthuc_ttoan->CellCssStyle = "";
		$products->phuongthuc_ttoan->CellCssClass = "";

		// thoihan_giaohang
		$products->thoihan_giaohang->CellCssStyle = "";
		$products->thoihan_giaohang->CellCssClass = "";

		// soluong_tonkho
		$products->soluong_tonkho->CellCssStyle = "";
		$products->soluong_tonkho->CellCssClass = "";

		// tg_themsanpham
		$products->tg_themsanpham->CellCssStyle = "";
		$products->tg_themsanpham->CellCssClass = "";

		// tg_suasanpham
		$products->tg_suasanpham->CellCssStyle = "";
		$products->tg_suasanpham->CellCssClass = "";

		// so_lanxem
		$products->so_lanxem->CellCssStyle = "";
		$products->so_lanxem->CellCssClass = "";

		// trang_thai
		$products->trang_thai->CellCssStyle = "";
		$products->trang_thai->CellCssClass = "";

		// xuatban
		$products->xuatban->CellCssStyle = "";
		$products->xuatban->CellCssClass = "";

		// sanpham_tieubieu
		$products->sanpham_tieubieu->CellCssStyle = "";
		$products->sanpham_tieubieu->CellCssClass = "";

		// xuat_su
		$products->xuat_su->CellCssStyle = "";
		$products->xuat_su->CellCssClass = "";

		// comment_status
		$products->comment_status->CellCssStyle = "";
		$products->comment_status->CellCssClass = "";

		// don_gia
		$products->don_gia->CellCssStyle = "";
		$products->don_gia->CellCssClass = "";

		// thanhtoan_status
		$products->thanhtoan_status->CellCssStyle = "";
		$products->thanhtoan_status->CellCssClass = "";

		// soluong_tonkho
		$products->soluong_tonkho->CellCssStyle = "";
		$products->soluong_tonkho->CellCssClass = "";

		// khuyenmai_status
		$products->khuyenmai_status->CellCssStyle = "";
		$products->khuyenmai_status->CellCssClass = "";

		// km_date_begin
		$products->km_date_begin->CellCssStyle = "";
		$products->km_date_begin->CellCssClass = "";

		// km_date_end
		$products->km_date_end->CellCssStyle = "";
		$products->km_date_end->CellCssClass = "";
		if ($products->RowType == EW_ROWTYPE_VIEW) { // View row

			// ten_sanpham
			$products->ten_sanpham->ViewValue = $products->ten_sanpham->CurrentValue;
			$products->ten_sanpham->CssStyle = "";
			$products->ten_sanpham->CssClass = "";
			$products->ten_sanpham->ViewCustomAttributes = "";

			// ma_sanpham
			$products->ma_sanpham->ViewValue = $products->ma_sanpham->CurrentValue;
			$products->ma_sanpham->CssStyle = "";
			$products->ma_sanpham->CssClass = "";
			$products->ma_sanpham->ViewCustomAttributes = "";

			// anh_to
			if (!is_null($products->anh_to->Upload->DbValue)) {
				$products->anh_to->ViewValue = $products->anh_to->Upload->DbValue;
				$products->anh_to->ImageWidth = 300;
				$products->anh_to->ImageHeight = 0;
				$products->anh_to->ImageAlt = "";
			} else {
				$products->anh_to->ViewValue = "";
			}
			$products->anh_to->CssStyle = "";
			$products->anh_to->CssClass = "";
			$products->anh_to->ViewCustomAttributes = "";

			// anh_nho
			if (!is_null($products->anh_nho->Upload->DbValue)) {
				$products->anh_nho->ViewValue = $products->anh_nho->Upload->DbValue;
				$products->anh_nho->ImageWidth = 100;
				$products->anh_nho->ImageHeight = 0;
				$products->anh_nho->ImageAlt = "";
			} else {
				$products->anh_nho->ViewValue = "";
			}
			$products->anh_nho->CssStyle = "";
			$products->anh_nho->CssClass = "";
			$products->anh_nho->ViewCustomAttributes = "";

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

			// chung_nhan
			$products->chung_nhan->ViewValue = $products->chung_nhan->CurrentValue;
			$products->chung_nhan->CssStyle = "";
			$products->chung_nhan->CssClass = "";
			$products->chung_nhan->ViewCustomAttributes = "";

			// nhan_hieu
			$products->nhan_hieu->ViewValue = $products->nhan_hieu->CurrentValue;
			$products->nhan_hieu->CssStyle = "";
			$products->nhan_hieu->CssClass = "";
			$products->nhan_hieu->ViewCustomAttributes = "";

			// tomtat_sanpham
			$products->tomtat_sanpham->ViewValue = $products->tomtat_sanpham->CurrentValue;
			$products->tomtat_sanpham->CssStyle = "";
			$products->tomtat_sanpham->CssClass = "";
			$products->tomtat_sanpham->ViewCustomAttributes = "";

			// noidung_sanpham
			$products->noidung_sanpham->ViewValue = $products->noidung_sanpham->CurrentValue;
			$products->noidung_sanpham->CssStyle = "";
			$products->noidung_sanpham->CssClass = "";
			$products->noidung_sanpham->ViewCustomAttributes = "";

			// loai_tien
			if (strval($products->loai_tien->CurrentValue) <> "") {
				switch ($products->loai_tien->CurrentValue) {
					case "0":
						$products->loai_tien->ViewValue = "VND";
						break;
					case "1":
						$products->loai_tien->ViewValue = "USD";
						break;
					case "2":
						$products->loai_tien->ViewValue = "Khác";
						break;
					default:
						$products->loai_tien->ViewValue = $products->loai_tien->CurrentValue;
				}
			} else {
				$products->loai_tien->ViewValue = NULL;
			}
			$products->loai_tien->CssStyle = "";
			$products->loai_tien->CssClass = "";
			$products->loai_tien->ViewCustomAttributes = "";

			// donvi_tinh
			$products->donvi_tinh->ViewValue = $products->donvi_tinh->CurrentValue;
			$products->donvi_tinh->CssStyle = "";
			$products->donvi_tinh->CssClass = "";
			$products->donvi_tinh->ViewCustomAttributes = "";

			// gia_xuatcang
			if (strval($products->gia_xuatcang->CurrentValue) <> "") {
				switch ($products->gia_xuatcang->CurrentValue) {
					case "1":
						$products->gia_xuatcang->ViewValue = "CIF";
						break;
					case "2":
						$products->gia_xuatcang->ViewValue = "FOB";
						break;
					case "3":
						$products->gia_xuatcang->ViewValue = "Khác";
						break;
					default:
						$products->gia_xuatcang->ViewValue = $products->gia_xuatcang->CurrentValue;
				}
			} else {
				$products->gia_xuatcang->ViewValue = NULL;
			}
			$products->gia_xuatcang->CssStyle = "";
			$products->gia_xuatcang->CssClass = "";
			$products->gia_xuatcang->ViewCustomAttributes = "";

			// phuongthuc_ttoan
			if (strval($products->phuongthuc_ttoan->CurrentValue) <> "") {
				$arwrk = explode(",", $products->phuongthuc_ttoan->CurrentValue);
				$sSqlWrk = "SELECT `Payment_name` FROM `payment` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`Payment_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->phuongthuc_ttoan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$products->phuongthuc_ttoan->ViewValue .= $rswrk->fields('Payment_name');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $products->phuongthuc_ttoan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$products->phuongthuc_ttoan->ViewValue = $products->phuongthuc_ttoan->CurrentValue;
				}
			} else {
				$products->phuongthuc_ttoan->ViewValue = NULL;
			}
			$products->phuongthuc_ttoan->CssStyle = "";
			$products->phuongthuc_ttoan->CssClass = "";
			$products->phuongthuc_ttoan->ViewCustomAttributes = "";

			// thoihan_giaohang
			$products->thoihan_giaohang->ViewValue = $products->thoihan_giaohang->CurrentValue;
			$products->thoihan_giaohang->CssStyle = "";
			$products->thoihan_giaohang->CssClass = "";
			$products->thoihan_giaohang->ViewCustomAttributes = "";

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// tg_themsanpham
			$products->tg_themsanpham->ViewValue = $products->tg_themsanpham->CurrentValue;
			$products->tg_themsanpham->ViewValue = ew_FormatDateTime($products->tg_themsanpham->ViewValue, 7);
			$products->tg_themsanpham->CssStyle = "";
			$products->tg_themsanpham->CssClass = "";
			$products->tg_themsanpham->ViewCustomAttributes = "";

			// tg_suasanpham
			$products->tg_suasanpham->ViewValue = $products->tg_suasanpham->CurrentValue;
			$products->tg_suasanpham->ViewValue = ew_FormatDateTime($products->tg_suasanpham->ViewValue, 7);
			$products->tg_suasanpham->CssStyle = "";
			$products->tg_suasanpham->CssClass = "";
			$products->tg_suasanpham->ViewCustomAttributes = "";

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

			// sanpham_tieubieu
			if (strval($products->sanpham_tieubieu->CurrentValue) <> "") {
				switch ($products->sanpham_tieubieu->CurrentValue) {
					case "0":
						$products->sanpham_tieubieu->ViewValue = "Không tiêu biểu";
						break;
					case "1":
						$products->sanpham_tieubieu->ViewValue = "Tiêu biểu";
						break;
					default:
						$products->sanpham_tieubieu->ViewValue = $products->sanpham_tieubieu->CurrentValue;
				}
			} else {
				$products->sanpham_tieubieu->ViewValue = NULL;
			}
			$products->sanpham_tieubieu->CssStyle = "";
			$products->sanpham_tieubieu->CssClass = "";
			$products->sanpham_tieubieu->ViewCustomAttributes = "";

			// xuat_su
			if (strval($products->xuat_su->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($products->xuat_su->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$products->xuat_su->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$products->xuat_su->ViewValue = $products->xuat_su->CurrentValue;
				}
			} else {
				$products->xuat_su->ViewValue = NULL;
			}
			$products->xuat_su->CssStyle = "";
			$products->xuat_su->CssClass = "";
			$products->xuat_su->ViewCustomAttributes = "";

			// comment_status
			if (strval($products->comment_status->CurrentValue) <> "") {
				switch ($products->comment_status->CurrentValue) {
					case "0":
						$products->comment_status->ViewValue = "Không bình luận";
						break;
					case "1":
						$products->comment_status->ViewValue = "Cho bình luận";
						break;
					default:
						$products->comment_status->ViewValue = $products->comment_status->CurrentValue;
				}
			} else {
				$products->comment_status->ViewValue = NULL;
			}
			$products->comment_status->CssStyle = "";
			$products->comment_status->CssClass = "";
			$products->comment_status->ViewCustomAttributes = "";

			// don_gia
			$products->don_gia->ViewValue = $products->don_gia->CurrentValue;
			$products->don_gia->CssStyle = "";
			$products->don_gia->CssClass = "";
			$products->don_gia->ViewCustomAttributes = "";

			// thanhtoan_status
			if (strval($products->thanhtoan_status->CurrentValue) <> "") {
				switch ($products->thanhtoan_status->CurrentValue) {
					case "0":
						$products->thanhtoan_status->ViewValue = "Không thanh toán trực tuyến";
						break;
					case "1":
						$products->thanhtoan_status->ViewValue = "Có thanh toán trực tuyến";
						break;
					default:
						$products->thanhtoan_status->ViewValue = $products->thanhtoan_status->CurrentValue;
				}
			} else {
				$products->thanhtoan_status->ViewValue = NULL;
			}
			$products->thanhtoan_status->CssStyle = "";
			$products->thanhtoan_status->CssClass = "";
			$products->thanhtoan_status->ViewCustomAttributes = "";

			// soluong_tonkho
			$products->soluong_tonkho->ViewValue = $products->soluong_tonkho->CurrentValue;
			$products->soluong_tonkho->CssStyle = "";
			$products->soluong_tonkho->CssClass = "";
			$products->soluong_tonkho->ViewCustomAttributes = "";

			// khuyenmai_status
			if (strval($products->khuyenmai_status->CurrentValue) <> "") {
				switch ($products->khuyenmai_status->CurrentValue) {
					case "0":
						$products->khuyenmai_status->ViewValue = "Không khuyến mại";
						break;
					case "1":
						$products->khuyenmai_status->ViewValue = "Có khuyến mại";
						break;
					default:
						$products->khuyenmai_status->ViewValue = $products->khuyenmai_status->CurrentValue;
				}
			} else {
				$products->khuyenmai_status->ViewValue = NULL;
			}
			$products->khuyenmai_status->CssStyle = "";
			$products->khuyenmai_status->CssClass = "";
			$products->khuyenmai_status->ViewCustomAttributes = "";

			// km_date_begin
			$products->km_date_begin->ViewValue = $products->km_date_begin->CurrentValue;
			$products->km_date_begin->ViewValue = ew_FormatDateTime($products->km_date_begin->ViewValue, 7);
			$products->km_date_begin->CssStyle = "";
			$products->km_date_begin->CssClass = "";
			$products->km_date_begin->ViewCustomAttributes = "";

			// km_date_end
			$products->km_date_end->ViewValue = $products->km_date_end->CurrentValue;
			$products->km_date_end->ViewValue = ew_FormatDateTime($products->km_date_end->ViewValue, 7);
			$products->km_date_end->CssStyle = "";
			$products->km_date_end->CssClass = "";
			$products->km_date_end->ViewCustomAttributes = "";

			// ten_sanpham
			$products->ten_sanpham->HrefValue = "";

			// ma_sanpham
			$products->ma_sanpham->HrefValue = "";

			// anh_to
			$products->anh_to->HrefValue = "";

			// nganhnghe_id
			$products->nganhnghe_id->HrefValue = "";

			// chung_nhan
			$products->chung_nhan->HrefValue = "";

			// nhan_hieu
			$products->nhan_hieu->HrefValue = "";

			// tomtat_sanpham
			$products->tomtat_sanpham->HrefValue = "";

			// noidung_sanpham
			$products->noidung_sanpham->HrefValue = "";

			// loai_tien
			$products->loai_tien->HrefValue = "";

			// donvi_tinh
			$products->donvi_tinh->HrefValue = "";

			// gia_xuatcang
			$products->gia_xuatcang->HrefValue = "";

			// phuongthuc_ttoan
			$products->phuongthuc_ttoan->HrefValue = "";

			// thoihan_giaohang
			$products->thoihan_giaohang->HrefValue = "";

			// soluong_tonkho
			$products->soluong_tonkho->HrefValue = "";

			// tg_themsanpham
			$products->tg_themsanpham->HrefValue = "";

			// tg_suasanpham
			$products->tg_suasanpham->HrefValue = "";

			// so_lanxem
			$products->so_lanxem->HrefValue = "";

			// trang_thai
			$products->trang_thai->HrefValue = "";

			// xuatban
			$products->xuatban->HrefValue = "";

			// sanpham_tieubieu
			$products->sanpham_tieubieu->HrefValue = "";

			// xuat_su
			$products->xuat_su->HrefValue = "";

			// comment_status
			$products->comment_status->HrefValue = "";

			// don_gia
			$products->don_gia->HrefValue = "";

			// thanhtoan_status
			$products->thanhtoan_status->HrefValue = "";

			// soluong_tonkho
			$products->soluong_tonkho->HrefValue = "";

			// khuyenmai_status
			$products->khuyenmai_status->HrefValue = "";

			// km_date_begin
			$products->km_date_begin->HrefValue = "";

			// km_date_end
			$products->km_date_end->HrefValue = "";
		}

		// Call Row Rendered event
		$products->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $products;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($products->nguoidung_id->CurrentValue);
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
